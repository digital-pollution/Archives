<?php 
if(isset($_POST['submit'])){
    $to = "sales@tcs-nz.co.nz"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "ata touch enquiry";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    header('Location: http://www.ata-touch.co.nz/thank-you.html');
    exit();
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ata touch</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="google" content="notranslate">
		<meta http-equiv="Content-Language" content="en" />
		
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- begin site content -->
        <header>
        	<div class="logo">
        		<a href="http://www.ata-touch.co.nz/">
        		  <h1>ata touch</h1>
        		</a>
        	</div>
        </header>
        <section>

			<div id="ata-carousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#ata-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#ata-carousel" data-slide-to="1"></li>
					<li data-target="#ata-carousel" data-slide-to="2"></li>
					<li data-target="#ata-carousel" data-slide-to="3"></li>
					<li data-target="#ata-carousel" data-slide-to="4"></li>
					<li data-target="#ata-carousel" data-slide-to="5"></li>
					<li data-target="#ata-carousel" data-slide-to="6"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active item-one">
						<div class="carousel-caption">
							<h2>home</h2>
							<p>The ata-touch &#174; system is an energy saving building automation system that is holistic in its approach, which provides efficiencies in componentry, hardware, software and ownership.
Technologies such as LED lighting, Heat Pump climate control and Heat Pump water heating are currently the most efficient methods to achieve significant energy savings.</p><p>
The energy saving technologies of ata-touch &#174; include the development of unique electronics for water heating and climate control from a single device. The system makes use of modern heat pump systems and controlled electricity distribution to maximise the off peak rates while maintaining and balancing appropriate levels of water heating and climate control.
</p><p>Also, there is the fun of altering the way we live and use touch technology to control our day to day functions, create mood lighting or shut down non critical power when no one is in the house. The scope appears endless as the system is scalable, extensible and affordable and there is so much functionality inherent within this holistic system. 
							</p>
						</div>
					</div>
					<div class="item">
						<div class="carousel-caption">
						<h2>Affordable</h2>
						<p>The ata-touch &#174; building management solution is designed  specifically to address the growing market need for energy management. Particularly in the residential and commercial market sectors where traditional products are uneconomic and therefore little competition exists.</p><p>  
ata-touch&#174; will be affordable, easy to install and use, and have a holistic approach to control functionality of the building. Not only providing building automation requirements simply and cost effectively but also meeting mainstream desire for saving energy.
						</p>
						</div>
					</div>
					<div class="item">
						<div class="carousel-caption">
						<h2>Easy</h2>
						<p>This streamlined system provides integrated autonomous management of the building and significantly reduces electricity usage, and therefore cost to owners and operators of private residences, commercial buildings and smaller industrial premises.
</p><p>The ata-touch&#174; system does not require software engineering as it will come with a graphical configuration tool allowing the provider or end-user to design and engineer the complete solution. From this configuration tool the system will automatically enable the desired functionality along with the user interface screens and any web interfaces that may be required.</p>     
						</div>
					</div>
					<div class="item">
						<div class="carousel-caption">
						<h2>Green</h2>
						<p>Energy is increasingly becoming significantly more expensive.  This is creating a fast evolving global market around energy efficiency, driven by increasing consumer appetites for energy management solutions that deliver energy savings and efficiency.
</p><p>Real electricity consumer prices to residential consumers have increased 77.4% in the 20 years from 1991 to 2011. The price was 15.5c/kWh in 1991 and in 2011 it had climbed to 27.5c/kWh
						</p>
					</div>
				</div>
				<div class="item">
						<div class="carousel-caption">
						<h2>Portable</h2>
						<p>The one device that will be carried around more than our house keys, is more than likely our Smartphone.</p><p>
Things like CCTV and smoke/fire protection can also be integrated adding further safety for the occupants by controlling pre-defined aspects such as lighting or shutting down non-critical power.
</p><p>The system is designed to be compatible with domestic and commercial wireless networks through the Ethernet backbone which will ensure interoperability with existing and future requirements that require internet, intranet and extranet monitoring or control.
						</p>
						</div>
				</div>
				<div class="item">
						<div class="carousel-caption">
						<h2>Reliable</h2>
						<p>The nucleus of the ata-touch &#174; system is the distributed control software library. The distributed control system runs a Windows CE operating system along with an advanced library of configurable objects to provide user graphics and control functionality.
</p><p>The ata-touch &#174; operates as a stand-alone unit, so it is not dependant on any other devices in the house, including computers.
						</p>
						</div>
				</div>
				<div class="item">
						<div class="carousel-caption">
						<h2>About</h2>
						<p>Based in the home of New Zealand's world-class agritech industry TCS (NZ) Ltd is a privately owned industrial automation company with a proud history of delivery innovative, effective solutions to a diverse customer base for over twenty five years.
</p><p>TCS has particular expertise in system integration, industrial communications, tracking and tracing, control and electronic product manufacturing.
</p><p>And now with the ata-touch&#174; energy efficient building automation system, we will be able to save you time and money, and answer all your questions on how to go about saving energy well into the future.
						</p>
						</div>
				</div>				
				<!-- Controls 
				<a class="left carousel-control" href="#ata-carousel" data-slide="prev"> 
					<span class="ata-carousel"></span>
				</a> 
				<a class="right carousel-control" href="#ata-carousel" data-slide="next"> 
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a> -->
				
			</div>
		</section>
        <footer>
        	<div class="footer-contact-btn">
        		<div class="contact-btn-alignment">
        			<a class="contact-btn" href="#">contact us</a>
        		</div>	
        	</div>
        	<div class="footer-top">
        	</div>
        	<div class="footer-contact">    	
        		<form action="" method="post">
        				<p>Interested in the ata touch system for your new home or commercial building?<br />
        				Let us know how we can help.</p>
        			<div class="form-left">
	        			<label>First Name <span class="form-required">*</span></label>
	        			<input type="text" name="first_name">
	        			
	        			<label>Last Name <span class="form-required">*</span></label>
	        			<input type="text" name="last_name">
	        			
	        			<label>Email Address <span class="form-required">*</span></label>
	        			<input type="text" name="email_address">
        			</div>
        			<div class="form-right">
	        			<label>Message <span class="form-required">*</span></label>
	        			<textarea type="text" name="message"></textarea>
	        			
        			</div>
        			<div class="clearfix"></div>
        			<small>fields marked with * are required</small>
        			<div class="clearfix"></div>
        			<input type="submit" name="submit" value="Submit">
        			<div class="clearfix"></div>
        		</form>
        	</div>
        	<div class="clearfix"></div>
        	<div class="footer-bottom"></div>
        </footer>
        
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script> -->
    </body>
</html>