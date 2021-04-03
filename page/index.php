<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Head content such as meta tags and encoding options, etc -->
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="Coding the solution">
	<meta name="twitter:url" content="http://frankmarks21.github.io/page/index.php">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="Coding the solution">
	<meta property="og:title" content="Coding the solution">
	<meta property="og:url" content="http://frankmarks21.github.io/page/index.php">

	<!-- User defined head content -->
	

  <!-- Browser title -->
	<title>Coding the solution</title>

  <!-- Main Theme Stylesheet -->
	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Foundry/consolidated.css?rwcache=639158113" />
		

	<!-- RapidWeaver Color Picker Stylesheet -->
	

	<!-- Plugin injected code -->
			<link rel='stylesheet' type='text/css' media='all' href='../rw_common/plugins/stacks/stacks.css?rwcache=639158113' />
		<link rel='stylesheet' type='text/css' media='all' href='files/stacks_page_page1.css?rwcache=639158113' />
        <script type='text/javascript' charset='utf-8' src='../rw_common/plugins/stacks/jquery-2.2.4.min.js?rwcache=639158113'></script>
        
        <link rel="stylesheet" href="../rw_common/plugins/stacks/font-awesome.min.css?rwcache=639158113">
        
		
		<script type='text/javascript' charset='utf-8' src='files/stacks_page_page1.js?rwcache=639158113'></script>
        <meta name="formatter" content="Stacks v4.2.2 (5479)" >
		<meta class="stacks4 stack version" id="com.elixir.stacks.foundry" name="Foundry" content="2.3.3.0">
		<meta class="stacks4 stack version" id="com.stacks4stacks.stacks.spacer" name="Spacer" content="2.0.0">
		<meta class="stacks4 stack version" id="com.elixir.stacks.foundryTypeface" name="Typeface" content="2.3.3.0">
		<meta class="stacks4 stack version" id="com.elixir.stacks.foundrySelectOption" name="Option" content="2.1.0">
		<meta class="stacks4 stack version" id="com.elixir.stacks.foundryHeader" name="Header" content="2.3.3.0">
		<meta class="stacks4 stack version" id="com.elixir.stacks.TypefaceGoogleFont" name="Google Font" content="">
		<meta class="stacks4 stack version" id="com.elixir.stacks.foundryFormPro.v2" name="Form Pro" content="2.1.0">
		<meta class="stacks4 stack version" id="com.elixir.stacks.foundryTextArea.v2" name="Text Area" content="2.1.0">
		<meta class="stacks4 stack version" id="com.elixir.stacks.foundryButton" name="Button" content="2.3.3.0">
		


</head>

<body class="antialiased">
  <div class="blur_wrapper">

  	
<div id='stacks_out_1' class='stacks_top'><div id='stacks_in_1' class=''><div id='stacks_out_4' class='stacks_out'><div id='stacks_in_4' class='stacks_in com_elixir_stacks_foundry_stack'>




<!-- Foundry -->


</div></div><div id='stacks_out_8' class='stacks_out'><div id='stacks_in_8' class='stacks_in com_elixir_stacks_foundryTypeface_stack'>
	





<link href="https://fonts.googleapis.com/css?family=Lexend:400,700," rel="stylesheet">



<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700," rel="stylesheet">



</div></div><!-- Spacer stack by Will Woodgate. Visit http://stacks4stacks.com for more information -->
<div id="spacerStackstacks_in_168" class="spacerStack"></div><div id='stacks_out_256' class='stacks_out'><div id='stacks_in_256' class='stacks_in com_elixir_stacks_foundryHeader_stack'>

<div class="text-xs-left">
	
	<h3 class="theme_style  foundry-typeface-one">What's on your mind?</h3>
	
</div>
</div></div><div id='stacks_out_253' class='stacks_out'><div id='stacks_in_253' class='stacks_in com_elixir_stacks_foundryFormPro_v2_stack'>


<a name="stacks_in_253"></a>


<?php

	

	if (isset($_POST["important"])) {

	} else {

		if (isset($_POST["fp-submit"])) {

			$postdata = array();
			foreach($_POST as $name => $value) {
				// Copy POST to data array and convert array values to strings
				$postdata[$name] = is_array($value) ? implode(", ",$value) : $value;
			}

			$fullname = $postdata['fullname'] ;
			$email = $postdata['email'] ;
			
			
			$subject = $postdata['subject'] ;
			
			
			$userEmail = "frankwmarks@me.com";

			$body = "";

			

			


			


			foreach($postdata as $name => $value) {
				if ( ($name != "subject") && ($name != "fullname") && ($name != "email") && ($name != "fp-submit") && ($name != "MAX_FILE_SIZE") && ($name != "human")) {
					$upperName = ucfirst($name);
					$body .= "$upperName: \n $value \n\n";
				}
			}

			$body = nl2br($body);

			/**
			*  Sending message using PHP's mail() function.
			*/

			require 'files/phpmailer/PHPMailerAutoload.php';

			//Create a new PHPMailer instance
			$mail = new PHPMailer;

			$mail->CharSet = 'UTF-8';

			

			//Set who the message is to be sent from

			
				$mail->setFrom($email, $fullname);
			


			//Set an alternative reply-to address
			$mail->addReplyTo($email, $fullname);

			//Set who the message is to be sent to
			$mail->addAddress('frankwmarks@me.com', 'Frank Marks');
			

			if (isset($_FILES['uploaded_file']) &&
				$_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
				$mail->AddAttachment($_FILES['uploaded_file']['tmp_name'], $_FILES['uploaded_file']['name']);
			}

			//Set the subject line
			$mail->Subject = $subject;

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->Body = $body;

			//Replace the plain text body with one created manually
			$mail->AltBody = $body;

			//send the message, check for errors
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
					echo '<div class="fp-alert-offset"></div><div class="alert alert-success alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-fw fa-check"></i> Thank you, your message has been successfully sent!</div>';
			}

		}
	}
?>






<!-- ../rw_common/plugins/stacks -->

<form method="post" action="#stacks_in_253" enctype="multipart/form-data" autocomplete="on" id="stacks_in_253-formpro" role="form">
	<div class="fullname-form-group form-group">
		<label for="fullname" class="form-control-label">Full Name *</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
	    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" data-error="A full name is required." required>
		</div>
		<small style="display: block;" class="note-text form-control-feedback help-block with-errors"></small>
	</div>

	<div class="email-form-group form-group">
		<label for="email" class="form-control-label">Email Address *</label>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></span>
	    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Your email address" data-error="That does not appear to be a valid email address." required>
		</div>
		<small style="display: block;" class="note-text form-control-feedback help-block with-errors"></small>
	</div>

	
	<div class="subject-form-group form-group">
		<label for="subject" class="form-control-label">Subject *</label>
		
	    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject of your message" data-minlength="12" data-error="Subject is not long enough." required>
		
		<small style="display: block;" class="note-text form-control-feedback help-block with-errors">Minimum of 12 characters</small>
	</div>
	

	

	<div class="form-group">
	<label for="Text_Area_Name" class="form-control-label">your message </label>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-fw fa-comment"></i></span>
		<textarea class="form-control" name="Text_Area_Name" id="Text_Area_Name" rows="10"  data-error="This field is required."></textarea>
		</div>
		<small style="display: block;" class="form-control-feedback help-block with-errors note-text"></small>
</div>



	

	<input type="checkbox" name="important" value="1" style="display:none !important" tabindex="-1" autocomplete="off">

	<div class="text-xs-left">
		<input type="submit" id="fp-submit" name="fp-submit" class="btn btn-secondary btn-sm  fb-submit-btn" value="send your message">
	</div>

</form>
</div></div><div id='stacks_out_144' class='stacks_out'><div id='stacks_in_144' class='stacks_in com_elixir_stacks_foundryButton_stack'>

<div class="button-base-margin text-xs-center">
<a role="button" href="../" rel="" onclick="" target="" id="" class="foundry-typeface-two btn btn-sm   " ><i class="fa fa-home fa-fw"></i> back to the home page</a>
</div></div></div><!-- Spacer stack by Will Woodgate. Visit http://stacks4stacks.com for more information -->
<div id="spacerStackstacks_in_169" class="spacerStack"></div></div></div>


  </div>

  <!-- Base RapidWeaver Javascript -->
  <script src="../rw_common/themes/Foundry/javascript.js?rwcache=639158113"></script>

  <!-- Load jQuery -->
  <script src="../rw_common/themes/Foundry/js/jquery.min.js?rwcache=639158113"></script>

  <!-- Tether.js || used for tooltips -->
	<script src="../rw_common/themes/Foundry/js/tether.min.js?rwcache=639158113"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="../rw_common/themes/Foundry/js/bootstrap.min.js?rwcache=639158113"></script>

	<!-- Style variations -->
	

	<!-- User defined javascript -->
	

  <!-- User defined styles -->
	

	<script>
		// Initializes dropdowns
		$('.dropdown-toggle').dropdown();

		// Initializes popovers
		$(function () {
		  $('[data-toggle="popover"]').popover()
		});
	</script>

  <!-- Foundry theme v1.0.1 -->

</body>

</html>
