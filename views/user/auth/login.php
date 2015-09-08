<?php
/**
 * Login and registration page by AuthController
 *
 * @property CFormModel $model is the login form.
 * @property CFormModel $registerModel is the registration form.
 * @property Boolean $canRegister indicates that anonymous registrations are enabled.
 *
 * @package humhub.modules_core.user.views
 * @since 0.5
 */
$this->pageTitle = Yii::t('UserModule.views_auth_login', '<strong>Please</strong> sign in');
?>

<div class="container-fluid text-center login-container-home">

	<nav class="navbar navbar-fixed-top topbar" id="topbar-first">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="topbar-brand">
          	<?php $this->widget('application.widgets.LogoWidget', array()); ?>
          </div>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a onclick="$('#about').animatescroll({padding:50, scrollSpeed:1000,easing:'easeInOutCirc'});">
                	What is Teach Connect</a></li>
                <li><a onclick="$('#community').animatescroll({padding:50, scrollSpeed:1000,easing:'easeInOutCirc'});">
                	What the Community Offers</a></li>
                <li><a onclick="$('#contact').animatescroll({padding:50, scrollSpeed:1000,easing:'easeInOutCirc'});">
                	Contact Us</a></li>
                <li>
                    <form class="navbar-form navbar-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegister">
                            Join the Community
                        </button>
                    </form>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="jumbotron text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="signin-form col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
            
            	<img class="img-responsive visible-xs banner-small" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/home-banner-small.png">
            
                <h1><strong>Connecting teachers</strong> to help<br>educate the next generation.</h1>
                                
                <?php
                    $form = $this->beginWidget('CActiveForm', array('id' => 'account-login-form','enableAjaxValidation' => false,
                ));
                ?>

                <div class="form-group">
                    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'id' =>
                    'login_username', 'placeholder' => Yii::t('UserModule.views_auth_login', 'Enter your username or email'))); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'id' =>
                    'login_password', 'placeholder' => Yii::t('UserModule.views_auth_login', 'Enter your password')));?>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <?php echo CHtml::submitButton(Yii::t('UserModule.views_auth_login', 'Sign in'), array('class' =>
                        'btn btn-large btn-primary')); ?>
                    </div>
                    <?php echo $form->error($model, 'username'); ?>
					<?php echo $form->error($model, 'password'); ?>
                </div>  
                
                <div class="row form-links">
                    <div class="col-xs-6 text-left">
                        <div class="checkbox">
                            <label><?php echo $form->checkBox($model, 'rememberMe'); ?> 
                                <?php echo Yii::t('UserModule.views_auth_login', 'Remember me'); ?></label>
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="<?php echo $this->createUrl('//user/auth/recoverPassword'); ?>">
                            <?php echo Yii::t('UserModule.views_auth_login', 'Forgot password?') ?></a>
                    </div>
                </div>
                
                <?php $this->endWidget(); ?>
                
                <p>Not a member yet?<br>
                    <a data-toggle="modal" data-target="#modalRegister">Join the community now.</a></p>

                <a onclick="$('#quotes').animatescroll({padding:50,scrollSpeed:1000,easing:'easeInOutCirc'});">
                	<img class="down-arrow" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/caret.png"></a>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row quote-section">
        <div class="col-xs-12" id="quotes">
        	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-apple.png">
            <?php include("quotes.php"); ?> 
        </div>

    </div>
</div>

<div class="container-fluid about-section">

    <div class="row-fluid">
        <div class="col-md-5 col-md-offset-1 col-sm-12 text-left about-section-text" id="about">
            <h2>Welcome to your teaching community</h2>

            <p>TeachConnect is completely free altruistic network of all the teachers in QLD that are going to educate
                the next generation. We're trying to do everything that we can to setup the site with a positive
                culture, to remind teachers of the importance and the possibilities of education. And at the same time
                remove ourselves from having a presence - we're trying to facilitate, not control
                this service. </p>
        </div>
        <div class="col-md-6 col-sm-12 about-section-img"></div>
        <div class="clearfix"></div>

    </div>

</div>

<div class="container community-details">
    <div class="row">
        <div class="col-xs-12" id="community">
            <h2>What the community has to offer</h2>
        </div>
    </div>
    
    <div class="row row-padding-md">
        <div class="col-sm-4 col-sm-offset-1 col-xs-12 text-center">
            <h3>Mentorship Circles</h3>
            <p>Your mentorship circle is a private space for you to ask questions & obtain feedback about topics that arise during your teaching placement. </p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegister">Join the Community</button>
        </div>
        <div class="col-sm-3 col-sm-offset-2 col-xs-12">
            <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-community-1.png">
        </div>
    </div>
    
    <div class="row row-padding-md">
        <div class="col-sm-4 col-sm-offset-1 col-sm-push-6 col-xs-12">
            <h3>Q&amp;A Forum</h3>
            <p>We’re building up a searchable repository of teaching knowledge for you to ask for, find and discuss valuable information.</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegister">Ask your Questions</button>
        </div>
        <div class="col-sm-3 col-sm-offset-2 col-sm-pull-6 col-xs-12">
        	<img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-community-2.png">
        </div>
    </div>
    
    <div class="row row-padding-md">
        <div class="col-sm-4 col-sm-offset-1 col-xs-12">
            <h3>Career Opportunities</h3>
            <p>Explore teaching career opportunities through the teach connect platform and connect with your peers from across QLD.</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegister">Connect with your Peers</button>
        </div>
        <div class="col-sm-3 col-sm-offset-2 col-xs-12">
            <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-community-3.png">
        </div>
    </div>
    
</div>

<div class="container-fluid fat-footer">
    <div class="row-fluid">
        <div class="container">
            <div class="row">
            
                <div class="col-md-7 contact-details">
                    <div class="row">
                        <div class="col-xs-12"><?php $this->widget('application.widgets.LogoWidget', array()); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <p>TeachConnect is a completely free social network for teachers to provide emotional
                                support, to facilitate discussion of teaching practice and to provide assistance with
                                the development of lesson plans.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1 text-center" id="contact">
                    <h3>Contact Us</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="contactInputName"
                                   placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="contactInputEmail"
                                   placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="contactInputMessage" rows="5"
                                      placeholder="Enter your message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bottom-footer">
    <div class="row-fluid">
        <div class="container row-padding-sm">
            <div class="row">
                <div class="cox-xs-12">
                    <p>&copy; TeachConnect 2015 | <a data-toggle="modal" data-target="#modalPrivacy">privacy policy</a> | <a  data-toggle="modal" data-target="#modalTerms">terms &amp; conditions</a> | designed by Hunted Hive</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
        
        
        

<!-- Registration Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            	<img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-register.png">
                <button type="button" class="close close-feature" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel"><?php echo Yii::t('UserModule.views_auth_login', '<strong>
                    Join</strong> the TeachConnect Community') ?></h3>
            </div>
            
            <div class="modal-body">

                <?php if ($canRegister) : ?>

                <p class="text-center">
                    <?php echo Yii::t('UserModule.views_auth_login', "Join the community by entering your e-mail address below."); ?>
                </p>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                'id' => 'account-register-form',
                'enableAjaxValidation' => false,
                ));
                ?>
                
                <div class="row">
                    <div class="form-group col-sm-8 col-sm-offset-2">
                    	<input class="form-control" id="register-email" required placeholder="Enter your email" name="AccountRegisterForm[email]" value="" type="email">
                        
                        <!-- <?php echo $form->textField($registerModel, 'email', array('class' => 'form-control', 'id' => 'register-email','required', 'placeholder' => Yii::t('UserModule.views_auth_login', 'Enter your email'))); ?> <?php echo $form->error($registerModel, 'Enter your email'); ?> -->
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="terms-box">
                            <h4>Terms &amp; Conditions</h4>
                            <p>
                                <strong>HREC Approval Number</strong>: H14REA138<br>
                                <strong>Principal Researcher</strong>: Dr Nick Kelly
                            </p>    


                            <p>By creating an account and signing on to this website, you agree that data from your actions may be used in the research project Studying Support for Teachers in Transition.</p>
                            
                            <p>The data produced by your actions will be analysed and may be published by the researchers. Data will remain anonymous and by used in an unidentifiable way in published research.</p>


                            <p>Participation in the project through this website is entirely voluntary. If you do not wish to take part you are not obliged to. If you decide to take part and later change your mind, you are free to withdraw from the project at any stage. Any information already obtained from you will be destroyed.</p>
                            
                            
                            <p>Your decision whether to take part or not to take part, or to take part and then withdraw, will not affect your relationship with your university or with the teacher accreditation agencies. Please notify the researcher if you decide to withdraw from this project.</p>
                            
                            
                            <p>Should you have any queries regarding the progress or conduct of this research, you can contact the principal researcher:</p>
                            
                            <p><strong>Dr Nick Kelly</strong><br>
                            Australian Digital Futures Institute<br>
                            Y303, USQ, Toowoomba<br>
                            +61 7 4631 2718</p>
                            
                            
                           <p> If you have any ethical concerns with how the research is being conducted or any queries about your rights as a participant please feel free to contact the University of Southern Queensland Ethics Officer on the following details.</p>
                            
                            <p><strong>Ethics and Research Integrity Officer</strong>
                            Office of Research and Higher Degrees<br>
                            University of Southern Queensland<br>
                            West Street, Toowoomba 4350<br>
                            Ph: +61 7 4631 2690<br>
                            Email: <a href="mailto:ethics@usq.edu.au">ethics@usq.edu.au </a>
                            </p>
                            
                            <p>By clicking to agree I confirm that I have read and agree to the following statements:</p>
                            <ul>
                              <li>I have read the Participant Information Sheet and the nature and purpose of the research project has been explained to me. I understand and agree to take part.</li>
                              <li>I understand the purpose of the research project and my involvement in it.</li>
                              <li>I understand that I may withdraw from the research project at any stage and that this will not affect my status now or in the future.</li>
                              <li>I confirm that I am over 18 years of age.</li>
                              <li>I understand that while information gained during the study may be published, I will not be identified and my personal results will remain confidential.</li>
                              <li>I understand that the data from this project will be securely stored for a minimum of five years.</li>
                            </ul>
                            
                            <p>This information about consent can be found at any time in the “about” section of the website.</p>
               			</div>
               		</div>
               </div>
               
               <div class="row">
               		<div class="col-sm-8 col-sm-offset-2">
                       <div class="checkbox">
                            <label>
                              <input type="checkbox" required> I agree to the above terms &amp; conditions
                            </label>
                        </div>
                    </div>
                </div>

                <!-- <?php $this->widget('application.widgets.LanguageChooser'); ?> -->
            </div>
            
            <div class="modal-footer">
            	<div class="row">
                	 <div class="col-sm-8 col-sm-offset-2">
						<?php echo CHtml::submitButton(Yii::t('UserModule.views_auth_login', 'Register'), array('class' => 'btn btn-primary')); ?>
                        <?php $this->endWidget(); ?>
                        <?php endif; ?>
                	</div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<!-- Privacy Policy Modal -->
<div class="modal fade" id="modalPrivacy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Privacy Policy</h3>
            </div>
            
            <div class="modal-body">
            	<hr>
                <div class="modal-body-scroll">
                    <p>Lorem ipsum dolor sit amet, scaevola quaestio at vis, epicuri facilisis concludaturque per ex. Stet facer graeco vim ex, te omnes consetetur vel, sea cu alterum periculis. Gloriatur complectitur no cum, in pro veri alterum equidem, et reque sententiae qui. Sonet molestiae usu te, an nec ullum detracto. Labores laoreet meliore cu his, scripta moderatius constituam id mea.</p>
    
                    <p>Ex legendos democritum assueverit usu. Ne mei efficiantur voluptatibus, mea no torquatos inciderint. Vix te viris civibus, populo patrioque prodesset per an. Hinc tractatos repudiare usu ad. Sit oratio sententiae ne, quod meis dolor an nam.</p>
    
                    <p>Dicant copiosae mel an, per ne ancillae accusata petentium. Ex his tempor oporteat, tale torquatos vituperatoribus ne vim, pri et melius apeirian. Pro cu noster bonorum adipiscing, vidisse ornatus torquatos vim at. At novum postea instructior eos, pri eu vivendo assentior. Delicata maluisset an sit.</p>
    
                    <p>Est ad doctus luptatum democritum, ex nisl stet voluptatum usu. No vim posse apeirian lucilius, te quis alienum sed. Est no oratio vivendum sententiae. Ad ignota indoctum sit, eos eu munere debitis ancillae, an laoreet theophrastus quo. Et accusam principes instructior pro.</p>
    
                    <p>Ius an ferri omnium erroribus, vix integre oblique eleifend ex. No eius erant cum, qui error scriptorem ne, tibique deleniti pro ne. Qui enim postea intellegebat eu, in elitr maluisset vix, ei ius essent lucilius. Quo ne fuisset tacimates. Quod splendide his ex, ei has lorem facilisis interpretaris, qui ut bonorum mediocrem. Te iusto scripta blandit ius, cum ea paulo latine. Tation reprehendunt sit et, cu mei sint efficiendi.</p>
            	</div> 
            </div>
            
            <div class="modal-footer">
            	<div class="row">
                	 <div class="col-sm-8 col-sm-offset-2">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                	</div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<!-- Terms & Conditions Modal -->
<div class="modal fade" id="modalTerms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Terms &amp; Conditions</h3>
            </div>
            
            <div class="modal-body">
            	<hr>
            	<div class="modal-body-scroll">
                    <p>
                        <strong>HREC Approval Number</strong>: H14REA138<br>
                        <strong>Principal Researcher</strong>: Dr Nick Kelly
                    </p>    
    
    
                    <p>By creating an account and signing on to this website, you agree that data from your actions may be used in the research project Studying Support for Teachers in Transition.</p>
                    
                    <p>The data produced by your actions will be analysed and may be published by the researchers. Data will remain anonymous and by used in an unidentifiable way in published research.</p>
    
    
                    <p>Participation in the project through this website is entirely voluntary. If you do not wish to take part you are not obliged to. If you decide to take part and later change your mind, you are free to withdraw from the project at any stage. Any information already obtained from you will be destroyed.</p>
                    
                    
                    <p>Your decision whether to take part or not to take part, or to take part and then withdraw, will not affect your relationship with your university or with the teacher accreditation agencies. Please notify the researcher if you decide to withdraw from this project.</p>
                    
                    
                    <p>Should you have any queries regarding the progress or conduct of this research, you can contact the principal researcher:</p>
                    
                    <p><strong>Dr Nick Kelly</strong><br>
                    Australian Digital Futures Institute<br>
                    Y303, USQ, Toowoomba<br>
                    +61 7 4631 2718</p>
                    
                    
                   <p> If you have any ethical concerns with how the research is being conducted or any queries about your rights as a participant please feel free to contact the University of Southern Queensland Ethics Officer on the following details.</p>
                    
                    <p><strong>Ethics and Research Integrity Officer</strong>
                    Office of Research and Higher Degrees<br>
                    University of Southern Queensland<br>
                    West Street, Toowoomba 4350<br>
                    Ph: +61 7 4631 2690<br>
                    Email: <a href="mailto:ethics@usq.edu.au">ethics@usq.edu.au </a>
                    </p>
                    
                    <p>By clicking to agree I confirm that I have read and agree to the following statements:</p>
                    <ul>
                      <li>I have read the Participant Information Sheet and the nature and purpose of the research project has been explained to me. I understand and agree to take part.</li>
                      <li>I understand the purpose of the research project and my involvement in it.</li>
                      <li>I understand that I may withdraw from the research project at any stage and that this will not affect my status now or in the future.</li>
                      <li>I confirm that I am over 18 years of age.</li>
                      <li>I understand that while information gained during the study may be published, I will not be identified and my personal results will remain confidential.</li>
                      <li>I understand that the data from this project will be securely stored for a minimum of five years.</li>
                    </ul>
                    
                    <p>This information about consent can be found at any time in the “about” section of the website.</p>
                </div>
            </div>
            
            <div class="modal-footer">
            	<div class="row">
                	 <div class="col-sm-8 col-sm-offset-2">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
                	</div>
                </div>
            </div>
            
        </div>
    </div>
</div>


<script type="text/javascript">
    
    $(function() {
        // set cursor to login field
        $('#login_username').focus();
    })

    // Shake panel after wrong validation
    <?php if ($form->errorSummary($model) != null) { ?>
            $('#login-form').removeClass('bounceIn');
            $('#login-form').addClass('shake');
            $('#register-form').removeClass('bounceInLeft');
            $('#app-title').removeClass('fadeIn');
    <?php } ?>
    
        // Shake panel after wrong validation
    <?php if ($form->errorSummary($registerModel) != null) { ?>
            $('#register-form').removeClass('bounceInLeft');
            $('#register-form').addClass('shake');
            $('#login-form').removeClass('bounceIn');
            $('#app-title').removeClass('fadeIn');
    <?php } ?>

        
	// Hide responsive menu on tap (on small screens only)
	$('.nav a').on('click', function(){
		if( $('.outside .navbar-collapse').css('background-color') == 'rgb(32, 179, 176)' )  {
			$(".navbar-toggle").click();
		}
	});
	
	// Initialize custom scrollbars
	(function($){
        $(window).load(function(){
            $(".modal-body-scroll").mCustomScrollbar({
				theme:"dark-thick"
			});
			$(".terms-box").mCustomScrollbar({
				theme:"dark-thick"
			});
        });
    })(jQuery);

	// Owl Carousel Script - for rotating quotations
	$(document).ready(function(){
	  $(".owl-carousel").owlCarousel({
	  	animateOut: 'fadeOutDown',
		animateIn: 'fadeInDown',
		items:1,
		margin:30,
		stagePadding:30,
		smartSpeed:500,
		autoplay:true,
		loop:true,
		dots: true,
		nav: false
	  });
	});
	
</script>
