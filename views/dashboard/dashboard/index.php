<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            if ($showProfilePostForm) {
                echo \humhub\modules\post\widgets\Form::widget(['contentContainer' => Yii::$app->user->getIdentity()]);
            }
            ?>
            <?php
                echo \humhub\modules\content\widgets\Stream::widget([
                    'streamAction' => '/dashboard/dashboard/stream',
                    'showFilters' => false,
                    'messageStreamEmpty' => \Yii::t('DashboardModule.views_dashboard_index', '<b>Your dashboard is empty!</b><br>Post something on your profile or join some spaces!'),
                ]);
            ?>
        </div>
        <div class="col-md-4">

            <div class="row">
                <div class="col-xs-12" id="quotes">
					<div class="panel panel-default panel-teachingquotes">
                        <img src="<?php echo $this->theme->baseUrl; ?>/img/tc-apple.png" style="">
                        <?php echo $this->renderFile($this->theme->basePath  . '/views/quotes/quotes.php'); ?>
                    </div>
                </div>
            </div>
            <?php
                echo \humhub\modules\activity\widgets\Stream::widget(['streamAction' => '/dashboard/dashboard/stream']);
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
                                <img class="img-responsive" src="<?php echo $this->theme->baseUrl; ?>/img/tc-welcome.png">
								<p>TeachConnect is an altruistic network of pre-service, current and experienced teachers across Queensland. It’s free and always will be - because it’s owned by you, the teachers. TeachConnect is a simple idea - a platform to let you talk to other teachers and to benefit from the experiences of others.</p>
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
                                <img class="img-responsive" src="<?php echo $this->theme->baseUrl; ?>/img/tc-community-1.png">

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
                                <img class="img-responsive"  src="<?php echo $this->theme->baseUrl; ?>/img/tc-community-2.png">

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