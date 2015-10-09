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
                	What is TeachConnect?</a></li>
                <li><a onclick="$('#community').animatescroll({padding:50, scrollSpeed:1000,easing:'easeInOutCirc'});">
                	What the community offers</a></li>
                <li><a onclick="$('#contact').animatescroll({padding:50, scrollSpeed:1000,easing:'easeInOutCirc'});">
                	Contact us</a></li>
                <li>
                    <form class="navbar-form navbar-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegister">
                            Join the community
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
                        	<?php echo CHtml::submitButton(Yii::t('UserModule.views_auth_login', 'Sign in'), array('class' =>'btn btn-large btn-primary')); ?>
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
            <?php $this->renderPartial('//quotes/quotes', array()); ?> 
        </div>

    </div>
</div>

<div class="container-fluid about-section">

    <div class="row-fluid">
        <div class="col-md-5 col-md-offset-1 col-sm-12 text-left about-section-text" id="about">
            
            <h2>Welcome to your teaching community</h2>

            <p>TeachConnect is an altruistic network of pre-service, current and experienced teachers across Queensland. It’s free and always will be - because it’s owned by you, the teachers.<br />
			<br />
			TeachConnect is a simple idea - a platform to let you talk to other teachers and to benefit from the experiences of others. Teachers tend to be generous in sharing their knowledge. TeachConnect is about making sure that this knowledge can be re-used by the whole community of Queensland teachers.
			</p>
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
            <h3>Mentorship circles</h3>
            <p>A mentorship circle is a private space to chat with a small group of peers and experienced teachers about anything and everything teaching related.</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegister">Join the community</button>
        </div>
        <div class="col-sm-3 col-sm-offset-2 col-xs-12">
            <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-community-1.png">
        </div>
    </div>
    
    <div class="row row-padding-md">
        <div class="col-sm-4 col-sm-offset-1 col-sm-push-6 col-xs-12">
            <h3>Q&amp;A forum</h3>
            <p>We’re building up a searchable repository of teaching knowledge for you to ask for, find and discuss valuable information.</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegister">Ask your questions</button>
        </div>
        <div class="col-sm-3 col-sm-offset-2 col-sm-pull-6 col-xs-12">
        	<img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/tc-community-2.png">
        </div>
    </div>
    
    <div class="row row-padding-md">
        <div class="col-sm-4 col-sm-offset-1 col-xs-12">
            <h3>Best of both worlds</h3>
            <p>In TeachConnect you get the best of both worlds: a private circle of trusted colleagues, and a large public community ready to answer anything you may want to ask.</p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegister">Connect with your peers</button>
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
                            <p>Have something about TeachConnect that you want to discuss with us? Whether it’s ideas, suggestions or problems, don’t hesitate to get in touch with us on <a href="mailto:teachconnect@outlook.edu.au?Subject=TeachConnect%20Feedback" target="_top">teachconnect@outlook.edu.au</a> or just use the form on this page - we’ll get back to you soon.</p>
							
							<p>
							TeachConnect is an inclusive collaboration of many stakeholders, all of whom have an interest in helping teachers. If you or your organisation want to take part, then do get in touch. 
							</p>
							<p>
							Support for the production of this website has been provided by the Australian Government Office for Learning and Teaching (OLT). Further support has been provided by the Queensland College of Teachers (QCT) and the Australian Research Council (ARC). The website is powered by the Connected Communities platform developed by the Connected Community Research Initiative. The views expressed in this website do not necessarily reflect the views of any of these partners.
							</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1 text-center" id="contact">
                    <h3>Contact Us</h3>
                    <form class="form" id="mailgun" role="form" method="POST"> 
                        <div class="form-group">
                            <input type="name" id="name" name="name" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <textarea id="message" name="message" rows="6" class="form-control" placeholder="Message" required></textarea> 
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>

                    <!--<form id="email_form" method="post" action="<?php echo Yii::app()->theme->baseUrl; ?>/mail.php">
                        <div class="form-group">
                            <input name="email_name" type="text" class="form-control" id="contactInputName"
                                   placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input name="email_address" type="email" class="form-control" id="contactInputEmail"
                                   placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <textarea name="email_message" class="form-control" id="contactInputMessage" rows="5"
                                      placeholder="Enter your message"></textarea>
                        </div>

                        <button id="send_email" type="submit" class="btn btn-primary">Send</button>
                    </form>-->
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
                    <p>&copy; TeachConnect 2015 | <a data-toggle="modal" data-target="#modalPrivacy">privacy policy</a> | <a  data-toggle="modal" data-target="#modalTerms">terms &amp; conditions</a> | <a data-toggle="modal" data-target="#modalWhoAreWe">who are we?</a> | powered by Connected Communities</p>
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
                    <p><strong>General</strong><br>
					TeachConnect is an initiative of the StepUp project led by the Queensland University of Technology in partnership with the Australian Catholic University, Griffith University, James Cook University and the University of Queensland.  The social platform called TeachConnect, which is a service provided by the TeachConnect initiative for pre-service and service teachers, holds personal information about its community members. As such, the TeachConnect initiative in the administration of the TeachConnect social platform is bound by the QUT privacy policy, which can be found <a href="http://www.governance.qut.edu.au/compliance/privacy/">here</a>. 
					</p>

                    <p><strong>Information we collect and how we use it</strong><br>
					The TeachConnect platform stores personal information in order to properly and efficiently carry out its functions. The project only uses personal information for the purpose(s) for which it was given to the platform and the wider TeachConnect initiative and for directly related purposes (unless otherwise required by or authorised by law) or as consented to by the individual concerned.</p>
    
                    <p><strong>Communication - Emails and Electronic Forms</strong><br>
					The TeachConnect platform stores a record your email address if you sign-up. Your email address will not be added to any mailing lists that are not related to the TeachConnect initiative. The information collected by email or electronic forms will be used only for the purpose for which you provided it, and we will not disclose it to anyone outside of the TeachConnect initiative.</p>
    
                    <p><strong>Cookies</strong><br>
					A cookie is a small file containing a string of characters on your computer that uniquely identifies your browser. It is information that your web browser sends back to our web site server whenever you visit it again. We use cookies to 'remember' your browser between page visits. In this situation, the cookie identifies your browser, not you personally. No personal information is stored within the cookies of the TeachConnect platform.</p>
    
                    <p><strong>Google Analytics</strong><br>
					The TeachConnect initiative uses Google Analytics to collect information about visitors to its TeachConnect platform. Google Analytics uses first-party cookies and JavaScript code to help analyse how users use the site. It anonymously tracks how our visitors interact with this website, including how they have accessed the site (for example from a search engine, a link, an advertisement, etc) and what they did on the site. Google will use this information for the purposes of compiling reports on website activity and providing other services relating to website activity and internet usage. You may refuse the use of tracking cookies by selecting the appropriate settings on your browser.</p>
					
					<p><strong>Information Security</strong><br>
					We take all reasonable steps:
					<ul>
					<li>To protect the personal information held in our possession against loss, unauthorised access, use, modification, disclosure or misuse; and</li>
					<li>To ensure that, where we have given personal information to a contractor (that carries out a service on the TeachConnect platform), the contractor complies with our information privacy principles.</li>
					</p>
					
					<p><strong>Data integrity</strong><br>
					We take reasonable steps to make sure that the personal information we collect and store is accurate, relevant, up-to-date, complete and not misleading.
					</p>
					
					<p><strong>Enforcement</strong><br>
					The TeachConnect initiative regularly review their compliance with this Policy. If you have any questions/complaints about privacy or confidentiality, or you wish to access or amend your personal information, please email us at: <a href="mailto:teachconnect@outlook.com?Subject=TeachConnect%20Feedback" target="_top">teachconnect@outlook.com</a>
					</p>
					
					<p><strong>Changes to this policy</strong><br>/
					Please note that this Privacy Policy may change from time to time.
					</p>
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

<!-- Who Are We Modal -->
<div class="modal fade" id="modalWhoAreWe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Who Are We?</h3>
            </div>
            
            <div class="modal-body">
            	<hr>
                <div class="modal-body-scroll">
					<p>
						TeachConnect is a broad and growing collaboration of teachers and academics across Queensland. The project is about facilitating an online network of as many stakeholders as possible, to best help teachers to transition from university into service. If you wish to be a part of TeachConnect then do get in touch with us on <a href="mailto:teachconnect@outlook.edu.au?Subject=TeachConnect%20Feedback" target="_top">teachconnect@outlook.edu.au</a> - we'd love to hear from you.
					</p>
					<p>
						TeachConnect is made possible by the <a href="http://stepup.edu.au">Step Up</a> project and the <a href="https://www.qct.edu.au/">Queensland College of Teachers</a>. The universities currently taking part in TeachConnect are:
						<ul>
							<li>University of Southern Queensland (USQ)</li>
							<li>Queensland University of Technology (QUT)</li>
							<li>Griffith University</li>
							<li>University of Queensland (UQ)</li>
							<li>James Cook University (JCU)</li>
							<li>University of the Sunshine Coast (USC)</li>
							<li>Central Queensland University (CQU).</li>
					</p>
					<p>
						The TeachConnect platform instance has been developed as a collaboration between Step Up and Connected Communities Research Initiative. Step Up is about transforming mathematics and science pre-service secondary education in Queensland, OLT Grant MS13-3184. The TeachConnect platform instance is powered by the Connected Communities platform. 
						</p><p>
						The Connected Communities platform is a product of the Connected Communities Research Initiative conducted by the Service Science Discipline, QUT. The research undertaken by the Connected Communities Research Initiative is partially funded by ARC Linkage Grant LP140101062.
					</p>
					<p>
						<strong>TeachConnect Development Team</strong>
					</p>
					<p>
						TeachConnect has been developed by:
						<ul>
							<li>Dr Nick Kelly, USQ (Project Co-leader)</li>
							<li>Steven Kickbusch, QUT (Project Co-leader)</li>
							<li>Ben Maggacis (Web Developer)</li>
							<li>Dr Nick Russell, QUT</li>
							<li>Dr Rune Rasmussen, QUT</li>
						</ul>
					</p>
					
                    <p><a href="http://nickkellyresearch.com/">Nick Kelly</a> is a Research Fellow at the University of Southern Queensland.</p>
    
                    <p><a href="https://au.linkedin.com/pub/steven-kickbusch/36/679/405">Steven Kickbusch</a> is a Learning Designer at the Queensland University of Technology.</p>
    
                    <p><a href="https://au.linkedin.com/in/benmaggacis">Ben Maggacis</a> is a full stack web developer.</p>
    
                    <p><a href="http://staff.qut.edu.au/staff/russelnc/">Nick Russell</a> is a Principal Research Fellow at the Queensland University of Technology.</p>
					
					<p><a href="http://staff.qut.edu.au/staff/rasmussr/">Rune Rasmussen</a> is a Lecturer at the Queensland University of Technology.</p>
					
					<p>
					Design for TeachConnect provided by <a href="http://huntedhive.com/">HuntedHive</a>.
					</p>
					<p>
					Initial work on the project was made possible by seed funding and support from the Australian Government's "Digital Futures" Collaborative Research Network, USQ.
					</p>
                    
					<p>
						<strong>References about TeachConnect</strong>
					</p>
					<p>
						<li>Clara M., Kelly N., Mauri T. and Danaher P. (In press). Challenges of teachers’ practice-oriented virtual communities for enabling reflection, Asia-Pacific Journal of Teacher Education </li>
						<li>Kelly N., Reushle S., Chakrabarty S. and Kinnane A. (2014). Augmenting the support for pre-service teachers into practice through large online communities of knowledge-sharing, Australian Journal of Teacher Education 39(4), pp. 68-82 [<a href="http://ro.ecu.edu.au/ajte/vol39/iss4/4/">link</a>]</li>
						<li>Kelly, N. (2013). An opportunity to support beginning teachers in the transition from higher education into practice, Proceedings of ASCILITE 2013, Sydney [<a href="http://eprints.usq.edu.au/24188">link</a>]</li>
						
					</p>
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

        // Submit email
        var mailgunURL;
         
        mailgunURL = '<?php echo Yii::app()->theme->baseUrl; ?>/mail.php';
         
        $('#mailgun').on('submit',function(e) {
          e.preventDefault();
         
          $('#mailgun *').fadeOut(200);
          $('#mailgun').prepend('Your submission is being processed...');
         
          $.ajax({
            type     : 'POST',
            cache    : false,
            url      : mailgunURL,
            data     : $(this).serialize(),
            success  : function(data) {
              responseSuccess(data);
              console.log(data);
            },
            error  : function(data) {
              console.log('Silent failure.');
            }
          });
         
          return false;
         
        });
         
        function responseSuccess(data) {
         
          data = JSON.parse(data);
         
          if(data.status === 'success') {
            $('#mailgun').html('Submission sent succesfully.');
          } else {
            $('#mailgun').html('Submission failed, please contact directly.');
          }
         
        }

	});
	
</script>
