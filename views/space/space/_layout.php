<div class="container space-layout-container">
    <div class="row">
        <div class="col-md-12">
            <?php $this->widget('application.modules_core.space.widgets.SpaceHeaderWidget', array('space' => $this->getSpace())); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 layout-nav-container">
            <?php $this->widget('application.modules_core.space.widgets.SpaceMenuWidget', array('space' => $this->getSpace())); ?>
            <?php $this->widget('application.modules_core.space.widgets.SpaceAdminMenuWidget', array('space' => $this->getSpace())); ?>
            <br/>
        </div>

        <?php if (isset($this->hideSidebar) && $this->hideSidebar) : ?>
            <div class="col-md-10 layout-content-container">
                <?php echo $content; ?>
            </div>
        <?php else: ?>
            <div class="col-md-6 layout-content-container">
                <?php echo $content; ?>
            </div>
            <div class="col-md-4 layout-sidebar-container">
                <?php
                $this->widget('application.modules_core.space.widgets.SpaceSidebarWidget', array(
                    'widgets' => array(
                        array('application.modules_core.activity.widgets.ActivityStreamWidget', array('streamAction' => '//dashboard/dashboard/stream')),
                        array('application.modules_core.space.widgets.SpaceMemberWidget', array('space' => $this->getSpace()), array('sortOrder' => 200)),
                    )
                ));
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
