<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            if ($showProfilePostForm) {
                $this->widget('application.modules_core.post.widgets.PostFormWidget', array('contentContainer' => Yii::app()->user->model));
            }
            ?>

            <?php
				$this->widget('application.modules_core.wall.widgets.StreamWidget', array(
					'streamAction' => '//dashboard/dashboard/stream',
					'showFilters' => false,
					'messageStreamEmpty' => Yii::t('DashboardModule.views_dashboard_index', '<b>Your dashboard is empty!</b><br>Post
					something on your profile or join some spaces!'),
				));
            ?>
        </div>
        <div class="col-md-4">
        	
            <div class="row">
                <div class="col-xs-12" id="quotes">
					<div class="panel panel-default panel-teachingquotes">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-apple.png" style="">
                        <div class="owl-carousel">
                            <div>
                                <p>The greatest sign of success for a teacher... is to be able to say,
                                    'The children are now working as if I did not exist.'</p>
                                <small>Maria Montessori</small>
                            </div>
    
                            <div>
                                <p>Here is an essential principal of education: to teach details is to bring confusion; to
                                    establish the relationship between things is to bring knowledge.</p>
                                <small>Maria Montessori</small>
                            </div>
    
                            <div>
                                <p>The child can only develop fully by means of experience in his environment. We call
                                    such experience ‘work’.</p>
                                <small>Maria Montessori</small>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>

            <?php
				$this->widget('application.modules_core.dashboard.widgets.DashboardSidebarWidget', array(
					'widgets' => array(
						array('application.modules_core.activity.widgets.ActivityStreamWidget', array('streamAction' =>
						'//dashboard/dashboard/stream'), array('sortOrder' => 10)),
					)
				));
            ?>
        </div>
    </div>
</div>


<!-- First Use Modal -->
<div class="modal fade" id="modalFirstUse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-instructions">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
            	
                <div id="owl-fader" class="owl-carousel owl-theme">
                    <div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="circle-bg general-bg"><span class="icon icon-owl"></span></div>
                                <h2>Welcome to Teach Connect</h2>
                                <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-welcome.png">

                                <p>TeachConnect is completely free altruistic network of all the teachers in QLD that
                                    are going to educate the next generation. We're trying to do everything that we can
                                    to setup the site with a positive culture, to remind teachers of the importance and
                                    the possibilities of education. And at the same time remove ourselves from having a
                                    presence - we're trying to facilitate, not control this service.</p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-primary customNextBtn">
                                    Communicate with your Private Mentorship Circle <span
                                        class="icon icon-arrow-right"></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="circle-bg mentorcircle-bg"><span class="icon icon-circle"></span></div>
                                <h2>Your Private Mentorship Circle</h2>
                                <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-community-1.png">

                                <p>Your mentorship circle is a private space for you to ask questions & obtain feedback
                                    about topics that arise during your teaching placement.</p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-primary customNextBtn">
                                        Find Answers from your Public Community <span class="icon icon-arrow-right"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="circle-bg community-bg"><span class="icon icon-qanda"></span></div>
                                <h2>Your Public Community</h2>
                                <img class="img-responsive"  src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-community-2.png">

                                <p>We’re building up a searchable repository of teaching knowledge for you to ask for,
                                    find and discuss valuable information.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    Get Started!
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    // Owl Carousel Script - for rotating quotations
    $(document).ready(function () {
		
        // Only show welcome modal on first view
        if($.cookie('_viewed_welcome_modal') == undefined) {

            $.cookie('_viewed_welcome_modal', true, { path: '/', expires: 5 * 365 });
            // $.removeCookie('_viewed_welcome_modal', { path: '/' });
            $('#modalFirstUse').modal('show');
        }

        $(".panel-teachingquotes .owl-carousel").owlCarousel({
            animateOut: 'fadeOutDown',
            animateIn: 'fadeInDown',
            items:1,
            margin:30,
            stagePadding:30,
            fluidSpeed:50,
            autoplay:true,
            loop:true,
            dots: true,
            nav: false
        });
        
        // Owl Carousel for Instructions on first use in modal - initiate when modal is opened
        $('#modalFirstUse').on('shown.bs.modal', function () {
            $(".modal .owl-carousel").owlCarousel({
                items: 1,
                loop: false,
                dots: true,
                nav:false
            });

            // Custom next button on modal
            $('.customNextBtn').click(function () {
                $(".modal .owl-carousel").trigger('next.owl.carousel');
            })
        });

    });

</script>