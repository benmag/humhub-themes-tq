<div class="panel panel-default">
    <div class="panel-body" id="contentFormBody">

        <?php echo CHtml::form('', 'POST'); ?>

        <ul id="contentFormError">
        </ul>

        <?php echo $form; ?>

        <?php

        /* Modify textarea for mention input */
        $this->widget('application.widgets.HEditorWidget', array(
            'id' => 'contentForm_message',
        ));

        ?>

        <div id="notifyUserContainer" class="form-group hidden" style="margin-top: 15px;">
            <input type="text" value="" id="notifyUserInput" name="notifyUserInput"/>

            <?php

            $userSearchUrl = $this->createUrl('//user/search/json', array('keyword' => '-keywordPlaceholder-'));;
            if (get_class($contentContainer) == 'Space') {
                $userSearchUrl = $this->createUrl('//space/space/searchMemberJson', array('sguid' => $this->contentContainer->guid, 'keyword' => '-keywordPlaceholder-'));;
            }

            /* add UserPickerWidget to notify members */
            $this->widget('application.modules_core.user.widgets.UserPickerWidget', array(
                'inputId' => 'notifyUserInput',
                'userSearchUrl' => $userSearchUrl,
                'maxUsers' => 10,
                'userGuid' => Yii::app()->user->guid,
                'placeholderText' => Yii::t('WallModule.widgets_views_contentForm', 'Add a member to notify'),
                'focus' => true,
            ));
            ?>
        </div>

        <?php
        /**  
         * If they're looking at a Space or User, use default functionality.
         * If they're on the dashboard, implement "post to space" selector.
         *
         * Once we've established they are on a "post to space" page and check 
         * if the user is a member of more than one group. If the user is only 
         * in one space, we prefill the fields and the select box is hidden.
         * If the user is in multiple spaces, we set up our listeners and disable
         * the post button until a selection is made
         */
        $userSpaces = SpaceMembership::GetUserSpaces();
        $showSpacePicker = (count($userSpaces) > 1) ? true : false;


        // Use default behaviour when in a Space or Profile
        if(Yii::app()->params['currentSpace'] || Yii::app()->params['currentUser']) {
            echo CHtml::hiddenField("containerGuid", $contentContainer->guid);
            echo CHtml::hiddenField("containerClass", get_class($contentContainer));
        } else if(count($userSpaces) == 0) { // if the user isn't in any spaces hide post area ?>
            <script type="text/javascript">
                $(function() {
                    $("#contentFormBody").hide();
                });
            </script>
        <?php } else { // Use new when not in a space
            echo CHtml::hiddenField("containerGuid", ($showSpacePicker ? "" : $userSpaces[0]->guid));
            echo CHtml::hiddenField("containerClass", "Space");
            ?>
            <script type="text/javascript">
                function post_to_space_enablePostSubmit() { // Disable button
                    $("#post_submit_button").removeAttr("disabled");
                    $("#post_to_space_message").hide();
                }

                function post_to_space_disablePostSubmit() { // Enable button
                    $("#post_submit_button").prop('disabled', true);
                    $("#post_to_space_message").show();
                }

                function post_to_space_selectSpace(guid) {
                    $("#containerGuid").val(guid);
                    $("#post_to_space_message").hide();
                    $.cookie('_post_to_space', guid, { path: '/', expires: 5 * 365 });
                    post_to_space_enablePostSubmit();
                }

                // Watch the space select box and changes the values containerGuid 
                $( "#post_to_space" ).change(function() {
                    if(this.value != "") { // Enable post submission
                        post_to_space_selectSpace(this.value);
                    } else { // Disable post submission
                        $.removeCookie('_post_to_space', { path: '/' });
                        post_to_space_disablePostSubmit();
                    }
                });


                // _post_to_space cookie not available, if not, dump cookie
                if($('#post_to_space option[value="'+ $.cookie('_post_to_space') +'"]').length == 0) {
                    $.removeCookie('_post_to_space', { path: '/' });
                }

                <?php if($showSpacePicker) { ?>
                // On load, if the user is in more than one space, disable post button 
                $(function() {
                    if($.cookie('_post_to_space')) {
                        $('#post_to_space option[value="'+ $.cookie('_post_to_space') +'"]').attr("selected", "selected");
                        post_to_space_selectSpace($.cookie('_post_to_space'));
                    } else {
                        post_to_space_disablePostSubmit();
                    }
                })
                <?php } ?>

            </script>
        <?php } ?>

        <div class="contentForm_options">
            <p id="post_to_space_message" style="display:none; color:red;">Select a circle to post your message into.</p>
            <hr>
            <div class="btn_container">

                <div id="postform-loader" class="loader loader-postform hidden">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>

                <?php
                $url = CHtml::normalizeUrl(Yii::app()->createUrl($submitUrl));
                echo HHtml::ajaxSubmitButton($submitButtonText, $url, array(
                        'type' => 'POST',
                        'dataType' => 'json',
                        'beforeSend' => "function() {
                    $('.contentForm').removeClass('error');
                    $('#contentFormError').hide();
                    $('#contentFormError').empty();
                }",
                        'beforeSend' => 'function(){ $("#contentFormError").hide(); $("#contentFormError li").remove(); $(".contentForm_options .btn").hide(); $("#postform-loader").removeClass("hidden"); }',
                        'success' => "function(response) {
                    if (response.success) {

                        // application.modules_core.wall function
                        currentStream.prependEntry(response.wallEntryId);

                        // Reset Form (Empty State)
                        jQuery('.contentForm_options').hide();
                        $('.contentForm').filter(':text').val('');
                        $('.contentForm').filter('textarea').val('').trigger('autosize.resize');
                        $('.contentForm').attr('checked', false);
                        $('.userInput').remove(); // used by UserPickerWidget
                        $('#notifyUserContainer').addClass('hidden');
                        $('#notifyUserInput').val('');
                        $('.label-public').addClass('hidden');
                        $('#contentFrom_files').val('');
                        $('#public').attr('checked', false);
                        $('#contentForm_message_contenteditable').html('" . CHtml::encode(Yii::t("WallModule.widgets_views_contentForm", "What's on your mind?")) . "');
                        $('#contentForm_message_contenteditable').addClass('atwho-placeholder');

                        // Notify FileUploadButtonWidget to clear (by providing uploaderId)
                        resetUploader('contentFormFiles');

                    } else {

                        $('#contentFormError').show();

                        $.each(response.errors, function(fieldName, errorMessage){

                            // Mark Fields as Error
                            fieldId = 'contentForm_'+fieldName;
                            $('#'+fieldId).addClass('error');

                            $.each(errorMessage, function(key, msg) {
                                $('#contentFormError').append('<li><i class=\"icon-warning-sign\"></i> '+msg+'</li>');
                            });

                        });

                    }

                     $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');
             }",
                    ), array('id' => "post_submit_button", 'class' => 'btn btn-info')
                );
                ?>
                <?php
                // Creates Uploading Button
                $this->widget('application.modules_core.file.widgets.FileUploadButtonWidget', array(
                    'uploaderId' => 'contentFormFiles',
                    'fileListFieldName' => 'fileList',
                ));
                ?>
                <script>
                    $('#fileUploaderButton_contentFormFiles').bind('fileuploaddone', function (e, data) {
                        $('.btn_container').show();
                    });
                    
                    $('#fileUploaderButton_contentFormFiles').bind('fileuploadprogressall', function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        if (progress != 100) {
                            // Fix: remove focus from upload button to hide tooltip
                            $('#post_submit_button').focus();

                            // hide form buttons
                            $('.btn_container').hide();
                        }
                    });
                </script>


                <!-- public checkbox -->
                <?php echo CHtml::checkbox("visibility", "", array('id' => 'contentForm_visibility', 'class' => 'contentForm hidden')); ?>

                <!-- content sharing -->
                <div class="pull-right">

                    <span class="label label-success label-public hidden"><?php echo Yii::t('WallModule.widgets_views_contentForm', 'Public'); ?></span>

                    <ul class="nav nav-pills preferences" style="right: 0; top: 5px;">
                        <li class="dropdown">
                            <a class="dropdown-toggle" style="padding: 5px 10px;" data-toggle="dropdown" href="#"><i
                                    class="fa fa-cogs"></i></a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:notifyUser();"><i
                                            class="fa fa-bell"></i> <?php echo Yii::t('WallModule.widgets_views_contentForm', 'Notify members'); ?>
                                    </a>
                                </li>
                                <?php if (get_class($this->contentContainer) == 'Space' && $this->contentContainer->canShare()): /* can create public content */ ?>
                                    <li>
                                        <a id="contentForm_visibility_entry" href="javascript:changeVisibility();"><i
                                                class="fa fa-unlock"></i> <?php echo Yii::t('WallModule.widgets_views_contentForm', 'Make public'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>


                </div>

            </div>

            <?php
            // Creates a list of already uploaded Files
            $this->widget('application.modules_core.file.widgets.FileUploadListWidget', array(
                'uploaderId' => 'contentFormFiles'
            ));
            ?>

        </div>
        <!-- /contentForm_Options -->
        <?php echo CHtml::endForm(); ?>
    </div>
    <!-- /panel body -->
</div> <!-- /panel -->

<div class="clearFloats"></div>

<script type="text/javascript">

    // Hide options by default
    jQuery('.contentForm_options').hide();
    $('#contentFormError').hide();

    // Remove info text from the textinput
    jQuery('#contentFormBody').click(function () {

        // Hide options by default
        jQuery('.contentForm_options').fadeIn();

    });

    function changeVisibility() {
        if ($('#contentForm_visibility').attr('checked') != 'checked') {
            $('#contentForm_visibility').attr('checked', 'checked');
            $('#contentForm_visibility_entry').html('<i class="fa fa-lock"></i> <?php echo Yii::t('WallModule.widgets_views_contentForm', 'Make private'); ?>');
            $('.label-public').removeClass('hidden');
        } else {
            $('#contentForm_visibility').removeAttr('checked');
            $('#contentForm_visibility_entry').html('<i class="fa fa-unlock"></i> <?php echo Yii::t('WallModule.widgets_views_contentForm', 'Make public'); ?>');
            $('.label-public').addClass('hidden');
        }
    }

    function notifyUser() {
        $('#notifyUserContainer').removeClass('hidden');
        $('#notifyUserInput_tag_input_field').focus();
    }

    // set the size for one row (Firefox)
    $('textarea').css({height: '36px'});

    // add autosize function to input
    $('.autosize').autosize();

</script>