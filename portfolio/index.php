<?php 
if(isset($_POST['submit'])){
    $to = "daniel.tait@digital-pollution.net";
    $from = $_POST['email']; 
    $first_name = $_POST['first_name'];
    $subject = "portfolio enquiry";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2);
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="styles.css">
        <script src="jquery.js"></script>
        <script src="jquery.nicescroll.js"></script>       
		<script src="scripts.js"></script>
    </head>
    <body data-ajax="false">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		
		<div class="container">
		  <div id="collapse-one" class="accordion-item ">
		  <h1>Hello</h1>
		  	<div class="content">
		  		<img src="img/profile-pic.jpg" height="150" />
		  		<h2>Hello prospective employer, potential collaborator or curious passer by.</h2>
		  		<p>My name is Daniel. I'm a Javascript Wizard and front end developer all the way from Wellington, New Zealand.</p>
		  		<p>I'm a Javascript expert but can contribute to all ends of the stack in a LAMP environment. I'm familiar with most of the latest web related tools and trends. I love making SaaS applications as well as responsive, accessible, readable and w3c compliant code. I Believe code is art.</p>
		  		<div class="social-media">
		  			<a href="http://github.com/digital-pollution" target="_blank" class="github" title="github"></a>
		  			<a href="http://www.linkedin.com/pub/daniel-tait/4b/1b/8a0" target="_blank" title="linkedin" class="linked-in"></a>
		  		</div>
		  	</div>
		  </div>
		  <div id="collapse-two" class="accordion-item">
		  <h1>Samples</h1>
		  	<div class="content">
				<div id="hightlights" class="carousel slide">
					<!-- Carousel items -->
					<div class="carousel-inner">
						<div class="active item">
							<img src="img/widerfunnel.jpg" />
							<div class="caption">
								<h3>Widerfunnel</h3>
								<p>At Widerfunnel Marketing I was the Lead Developer / Technical Manager, and was responsible for the production of all development (excluding the company website).</p>
								<p>Other tasks included Consulting, Mentoring Junior staff and development of internal deployment tools.</p>
								<p>Have a look at Widerfunnels Case Studies page to see the kinds of clients I produced work for.</p>
								<a href="http://www.widerfunnel.com/case-studies" target="blank">Visit Widerfunnel</a>
							</div>
						</div>
						<div class="item">
							<img src="img/frankston.jpg" />
							<div class="caption">
								<h3>Frankston Arts Centre / SeamlessCMS</h3>
								<p>Seamless a company that built its own CMS designed for large government projects. I spent a large amount of my time building Intranets for local and state Government departments.</p>
								<p>All sites were responsive, secure and AA accessible, this role came with many professional challenges and valuable experience.</p>
								<a href="http://www.seamlesscms.com/" target="blank">visit SeamlessCMS</a>
								<a href="http://artscentre.frankston.vic.gov.au/Home" target="blank">visit Frankston website</a>
							</div>
						</div>
						<div class="item">
							<img src="img/medicalrecruiters.jpg" />
							<div class="caption">
								<h3>Medical Recruiters of New Zealand</h3>
								<p>This was my first Freelance Project. I developed a complete solution for the client using SilverstripeCMS</p>
								<p>The goal of the site was to create a job board and employment recruitment service for the Health Care  Industry in New Zealand.</p>
								<a href="http://medicalrecruiters.co.nz/" target="blank">visit Medical Recuiters New Zealand</a>
							</div>
						</div>
						<div class="item">
							<img src="img/footytips.jpg" />
							<div class="caption">
								<h3>Footytips.com.au</h3>
								<p>ESPN Footytips is a free tipping and fantasy football website, using an advertisement and sponsorship model instead of gambling. The site is free, Members win prizes instead of gambling with their own money.</p>
								<p>I worked as the front end developer in at team of 10 working across a Coldfusion stack, on optimization and consolidation of the website and affiliate web applications.</p>
								<p>prototyped and co-developed a suite of android applications and created a LESS strategy and compiler to enable fast roll out of affiliate applications.</p>
								<a href="http://www.footytips.com.au/" target="blank">Visit Footytips</a>
								<a href="https://play.google.com/store/apps/details?id=com.espnau.footytips" target="blank">visit App</a>
							</div>
						</div>
						<div class="item">
							<img src="img/personal-projects.jpg" />
							<div class="caption">
								<h3>digital-pollution / sound-pollution</h3>
								<p>digital-pollution is my laboratory. This site, often appearing upside up or back to front, is where I learn how to do all the things I do.</p>
								<p>Sound-pollution is born of my passion for music. I play a little but not a lot, which makes me incredibly jealous of talented musicians. In the despair that I will never be one, I instead index them, interview them and promote their work, for free and for fun in whatever moments I have to spare.</p>
								<p>Visit digital-pollution.net's lab for more project samples</p>
								<a href="http://digital-pollution.net/" target="blank">visit digital-pollution</a>
								<a href="http://sound-pollution.net" target="blank">visit sound-pollution</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Carousel nav -->
					<a class="carousel-control left" href="#hightlights" data-slide="prev">&lsaquo;</a> 
					<a class="carousel-control right"
						href="#hightlights" data-slide="next">&rsaquo;</a>
					<ol class="carousel-indicators">
						<li data-target="#hightlights" data-slide-to="0" class="active"></li>
						<li data-target="#hightlights" data-slide-to="1"></li>
						<li data-target="#hightlights" data-slide-to="2"></li>
						<li data-target="#hightlights" data-slide-to="3"></li>
						<li data-target="#hightlights" data-slide-to="4"></li>
					</ol>
					<p>These are my career 'highlights'. Take a look at my <a href="http://github.com/digital-pollution" target="_blank" class="github">github account</a> for code samples or get a copy of my full <a href="Daniel-Tait-CV-2014.pdf" target="_blank">Resum&eacute;</a></p>
					
			</div>
		  </div>
		  <div id="collapse-three" class="accordion-item">
		  	<h1>Work</h1>
		  	<div class="content">
		  		<div class="work-container">
		  			<div class="work-item">
						<h3>Widerfunnel Marketing</h3>
						<h4>Lead Developer / Technical Manager</h4>
						<p>2014 - 2015</p>
						<small>Vancouver, Canada</small> 
						<label>JAVASCRIPT</label>
						<label>PHP, MySQL</label>
						<label>HTML / CSS</label>  
					</div>	
					<div class="work-item">
						<h3>SeamlessCMS</h3>
						<h4>Front End Developer</h4>
						<p>2013</p>
						<small>Melbourne, Australia</small> 
						<label>JAVASCRIPT</label>
						<label>CMS </label>
						<label>HTML / CSS</label> 
						<label>BOOTSTRAP</label> 
						<label>UX, UI</label> 
						<label>RESPONSIVE</label>
					</div>
					<div class="work-item">
						<h3>TCS-NZ, NOVAWEB, BJMDesign, Lululemon</h3>
						<h4>Contract Developer</h4>
						<p>2012 - 2014</p>
						<small>New Zealand, Australia, Canada</small> 
						<label>JAVASCRIPT</label> 
						<label>PHP, MySQL</label>
						<label>SILVERSTRIPE</label> 
						<label>HTML / CSS</label> 
						<label>BOOTSTRAP</label> 
						<label>UX, UI</label> 
						<label>ANDROID</label> 
						<label>MOBILE</label> 
						<label>RESPONSIVE</label>
					</div>
					<div class="work-item">
						<h3>ESPN Footytips.com.au</h3>
						<h4>Front End Developer</h4>
						<p>Apr 2012 - Nov 2012</p>
						<small>Melbourne, Australia</small> 
						<label>Front End Development</label> 
						<label>LESS</label> 
						<label>HTML / CSS</label> 
						<label>BOOTSTRAP</label>
						<label>UX</label> 
						<label>UI</label> 
						<label>ANDROID</label> 
						<label>MOBILE</label>
						<label>RESPONSIVE</label>
					</div>
					<div class="work-item">
						<h3>TCS-NZ</h3>
						<h4>Software Engineer</h4>
						<p>Aug 2011 - Feb 2012</p>
						<small>Hamilton, New Zealand</small> 
						<label>SILVERSTRIPE</label> 
						<label>SQL</label>
						<label>PHP</label> 
						<label>WEB DESIGN</label> 
						<label>JAVASCRIPT</label>
						<label>HTML / CSS</label> 
						<label>ISAGRAF</label> 
						<label>PRODUCT MANUFACTURING AND TESTING</label> 
						<label>CONTENT MANAGEMENT</label> 
						<label>PROJECT MANAGEMENT</label>
					</div>
					<div class="work-item">
						<h3>Victoria University of Wellington</h3>
						<h4>Website developer</h4>
						<p>Nov 2010 - May 2011</p>
						<small>Wellington, New Zealand</small> 
						<label>SILVERSTRIPE</label>
						<label>SQL</label> 
						<label>PHP</label> 
						<label>WEB DESIGN</label> 
						<label>JAVASCRIPT</label>
						<label>GOOGLE MAPS API V3</label> 
						<label>VIMEO API</label>
					</div>
					<div class="work-item">
						<h3>NOVAWEB / Subvert</h3>
						<h4>Website developer</h4>
						<p>2009 - 2011</p>
						<small>Wellington, New Zealand</small> 
						<label>SILVERSTRIPE</label>
						<label>SQL</label> 
						<label>PHP</label> 
						<label>WEB DESIGN</label> 
						<label>JAVASCRIPT</label>
						<label>HTML/CSS</label> 
						<label>SEO</label> 
						<label>SOCIAL MEDIA</label> 
						<label>CONSULTING</label> 
						<label>GOOGLE ANALYTICS</label>
						<label>CLIENT MANAGEMENT</label>
					</div>
					<div class="work-item">
						<h3>Waikatolink</h3>
						<h4>Server Administrator, Desktop support, Junior web developer</h4>
						<p>2007 - 2009</p>
						<small>Hamilton, New Zealand</small> 
						<label>ASP.NET</label> 
						<label>HTML/CSS</label>
						<label>WEB DESIGN</label> 
						<label>JAVASCRIPT</label> 
						<label>C#</label>
						<label>IIS</label> 
						<label>PFSENSE</label> 
						<label>BLACKBERRY SERVER</label> 
						<label>VMWARE</label> 
						<label>ACTIVE DIRECTORY</label> 
						<label>WINDOWS SERVER 2003</label> 
						<label>DESKTOP SUPPORT</label>
					</div>
					<div class="work-item">
						<h3>Admark</h3>
						<h4>Graphic Design, Print and Vinyl Production</h4>
						<p>2006</p>
						<small>Hamilton, New Zealand</small> 
						<label>PHOTOSHOP</label> 
						<label>ILLUSTRATOR</label>
						<label>COMPOSER</label> 
						<label>SIGN WISE</label> 
						<label>GERBER EDGE</label> 
						<label>VINYL CUT GRAPHICS</label>
					</div>
				</div>
			</div>
		  </div>
		  <div id="collapse-four" class="accordion-item">
		  	<h1>About</h1>
		  	<div class="content about-me">
		  		<div class="travel-icon">
		  			<p>Getting lost in the world is exciting.</p>
		  		</div>
		  		<div class="friend-icon">
		  			<p>I enjoy a good yarn with friends and colleagues.</p>
		  		</div>
		  		<div class="gadget-icon">
		  			<p>I like geeky gadgets and games.</p>
		  		</div>
		  		<div class="music-icon">
		  			<p>My fascination is eclectic and fanatical.</p> 
		  		</div>
		  	</div>
		  </div>
		  <div id="collapse-five" class="accordion-item">
		  	<h1>Contact</h1>
		  	<div class="content">
		  		<form action="" method="post">
        				<p>Want to get in touch?</p>
        			<div class="form-left">
	        			<label>Name </label>
	        			<input type="text" name="first_name">
	        			
	        			<label>Email Address </label>
	        			<input type="text" name="email_address">
        			</div>
        			<div class="form-right">
	        			<label>Message</label>
	        			<textarea type="text" name="message"></textarea>
	        			
        			</div>
        			<div class="clearfix"></div>
        			<input type="submit" name="submit" value="get in touch">
        			<div class="clearfix"></div>
        		</form>
		  	</div>
		  </div>
		</div>
		
    </body>
</html>
