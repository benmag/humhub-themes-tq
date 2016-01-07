<?php
use yii\helpers\Html;
use yii\helpers\Url;
use humhub\models\Setting;
$user = Yii::$app->user->getIdentity();
?>

<?php if (Yii::$app->user->isGuest): ?>

    <a href="<?php echo $this->createUrl('//user/auth/login'); ?>" class="btn btn-enter" data-toggle="modal" data-target="#globalModal">Sign in / up</a>


<?php else: ?>
    <ul class="nav">
        <li class="dropdown account">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="user-title pull-left hidden-xs">
                    <strong><?php echo Html::encode( $user->getDisplayName() ); ?></strong><br/><span class="truncate"><?php echo Html::encode($user->profile->title); ?></span>
                </div>
				
    			<div class="profile-size-sm profile-img-navbar">
                    <img id="user-account-image profile-size-sm" class="img-rounded"
                         src="<?php echo $user->getProfileImage()->getUrl(); ?>"
                         height="32" width="32" alt="32x32" data-src="holder.js/32x32"/>
                    <div class="profile-overlay-img profile-overlay-img-sm"></div>
                </div>

                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="<?php echo URL::to(['user/profile', 'uguid' => Yii::$app->user->getId()]); ?>"><i
                            class="fa fa-user"></i> <?php echo Yii::t('base', 'My profile'); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URL::to(['user/account/edit']); ?>"><i
                            class="fa fa-edit"></i> <?php echo Yii::t('base', 'Account settings'); ?>
                    </a>
                </li>

                <?php if (Yii::$app->user->isAdmin()) : ?>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to(['//admin/index']); ?>"><i
                                class="fa fa-cogs"></i> <?php echo Yii::t('base', 'Administration'); ?>
                        </a>
                    </li>
                <?php endif; ?>


                <!-- if the current user has admin rights -->
                <?php if (humhub\models\Setting::Get('needApproval', 'authentication_internal') && (Yii::$app->user->isAdmin() || Yii::$app->user->canApproveUsers())) : ?>
                    <li>
                        <a href="<?php echo $this->createUrl('//admin/approval') ?>"><i
                                class="fa fa-check-circle"></i> <?php echo Yii::t('base', 'User Approvals'); ?>
                        </a>
                    </li>
                <?php endif; ?>


                <?php if (!isset(Yii::$app->session['ntlm']) || Yii::$app->session['ntlm'] == false) : ?>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::to('/user/auth/logout') ?>"><i
                                class="fa fa-sign-out"></i> <?php echo Yii::t('base', 'Logout'); ?>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
    </ul>
<?php endif; ?>