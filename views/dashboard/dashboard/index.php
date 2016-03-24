<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            if ($showProfilePostForm) {
                echo \humhub\modules\post\widgets\Form::widget(['contentContainer' => \Yii::$app->user->getIdentity()]);
            }
            ?>

            <?php
            echo humhub\modules\content\widgets\Stream::widget([
                'streamAction' => '//dashboard/dashboard/stream',
                'showFilters' => false,
                'messageStreamEmpty' => Yii::t('DashboardModule.views_dashboard_index',
                    '<b>Your dashboard is empty!</b><br>Post
					something on your profile or join some spaces!'),
            ]);
            ?>
        </div>
        <div class="col-md-4">

            <div class="row">
                <div class="col-xs-12" id="quotes">
                    <div class="panel panel-default panel-teachingquotes">
                        <img src="<?php echo $this->theme->getBaseUrl() . '/img/tc-apple.png'?>" style="">
                        <?php echo $this->render('../../quotes/quotes'); ?>
                    </div>
                </div>
            </div>

            <?php
            echo \humhub\modules\dashboard\widgets\Sidebar::widget(['widgets' => [
                [\humhub\modules\activity\widgets\Stream::className(),
                    ['streamAction' => '/dashboard/dashboard/stream'], ['sortOrder' => 150]]
            ]]);
            ?>
        </div>
    </div>
</div>


<!-- Render: First Use Modal -->
<?php echo $this->render('_first-use-modal.php'); ?>


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