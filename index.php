<!doctype html>
<html lang="en">
<title> EMC Verification </title>
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	
	<!-- Google font -->	
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	
	<!--<link rel="stylesheet" href="style/emc.css" media="all">-->
	<link rel="stylesheet" href="style/emc-footer.css" media="all">
	<link rel="stylesheet" href="style/verif_update.css" media="all">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1Q8X1CSGJP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1Q8X1CSGJP');
</script>
</head>

<body>
<!-- <div class="wrapper"> -->
<header >
<nav class="navbar navbar-expand-lg header">
  <a class="navbar-brand noaa-header-logo-img" aria-label="NOAA Home" href="https://www.noaa.gov">
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="74px" height="74px" viewBox="137.024 137.006 74 74" enable-background="new 137.024 137.006 74 74" xml:space="preserve">
		<path fill="#0a4595" d="M143.551,153.335c0.299-0.435,0.605-0.87,0.911-1.29c6.736-9.122,17.583-15.038,29.816-15.038  c11.444,0,21.671,5.176,28.461,13.313c0.214,0.259,0.428,0.527,0.635,0.786c0.161,0-0.766,0.221-1.562,0.618  c-0.811,0.405-1.898,0.641-3.192,1.771c-1.294,1.137-2.503,2.733-3.858,4.939c-1.363,2.214-2.878,5.603-4.233,8.206  c-1.355,2.588-2.266,5.076-3.851,7.237c-1.585,2.153-3.636,4.382-5.573,5.58c-1.944,1.191-3.758,1.74-5.955,1.511  c-2.205-0.244-4.945-1.572-7.134-2.901c-2.182-1.336-4.356-3.557-5.864-5.038c-1.508-1.473-1.753-1.977-3.131-3.74  c-1.386-1.771-3.368-4.702-5.098-6.764c-1.73-2.053-3.46-3.908-5.19-5.451c-1.738-1.534-3.414-2.74-5.129-3.687L143.551,153.335z"/>
		<path fill="#0099d8" d="M207.105,157.562c2.511,4.977,3.919,10.596,3.919,16.55c0,20.374-16.565,36.894-36.996,36.894  c-20.431,0-37.004-16.52-37.004-36.894c0-3.267,0.429-6.428,1.225-9.443c0,0,1.669,0.641,3.376,1.947  c1.707,1.298,1.6,1.534,3.238,3.298c1.638,1.756,1.064,1.595,3.307,3.74c2.243,2.145,2.48,2.71,5.665,4.84  c3.177,2.122,3.567,2.306,7.058,3.665c3.491,1.351,3.598,1.259,6.913,1.756c2.075,0.122,4.164,0.244,6.246,0.366  c-1.248,0.886-2.044,1.229-4.042,2.13c-2.006,0.901-1.952,0.787-3.973,1.466c-2.021,0.68-2.794,0.878-4.118,1.252h0.145  c0.077,0.366,0.145,0.542,1.324,0.947c1.179,0.405,1.309,0.717,3.383,0.664c2.082-0.061,1.745,0.367,4.93-0.877  c3.176-1.252,4.409-2.535,7.793-4.115c3.384-1.572,2.81-1.466,5.734-2.199c2.924-0.733,3.973-0.733,5.955-0.733v-0.069  c0.145-0.443,0.092-0.74-0.513-1.176c-0.605-0.443-0.459-0.496-1.914-0.588c-1.454-0.092-2.442,0.13-3.896,0.221  c-1.454,0.091-1.21,0.16-1.906,0.145c-0.322-0.076-0.643-0.145-0.957-0.221c0.735-0.068,1.225-0.267,3.008-1.168  c1.784-0.901,1.806-0.832,4.118-2.42c2.319-1.603,2.427-1.305,5.152-3.962c2.717-2.657,3.383-3.779,5.734-6.672  c2.35-2.901,1.875-2.527,3.674-4.908C205.482,159.608,205.926,159.097,207.105,157.562"/>
		<path fill="#FFFFFF" d="M203.374,151.106c-0.302,0.1-1.064,0.349-1.562,0.598c-0.811,0.405-1.898,0.641-3.192,1.771  c-1.294,1.137-2.503,2.733-3.858,4.939c-1.363,2.214-2.878,5.603-4.233,8.206c-1.355,2.588-2.266,5.076-3.851,7.237  c-1.585,2.153-3.636,4.382-5.573,5.58c-1.944,1.191-3.758,1.74-5.955,1.511c-2.205-0.244-4.945-1.573-7.134-2.901  c-2.182-1.336-4.356-3.557-5.864-5.038c-1.508-1.473-1.753-1.977-3.131-3.74c-1.386-1.771-3.368-4.702-5.098-6.764  c-1.73-2.054-3.46-3.908-5.19-5.451c-1.738-1.534-3.414-2.74-5.129-3.687l-0.044-0.044c-2.317,3.433-4.071,7.278-5.129,11.401  c0.463,0.196,1.808,0.811,3.194,1.871c1.707,1.298,1.6,1.534,3.238,3.298c1.638,1.756,1.064,1.595,3.307,3.74s2.48,2.71,5.665,4.84  c3.177,2.122,3.567,2.306,7.058,3.665c3.491,1.351,3.598,1.259,6.913,1.756c2.075,0.122,4.164,0.244,6.246,0.366  c-1.248,0.886-2.044,1.229-4.042,2.13c-2.006,0.901-1.952,0.787-3.973,1.466c-2.021,0.68-2.794,0.878-4.118,1.252h0.145  c0.077,0.366,0.145,0.542,1.324,0.947c1.179,0.405,1.309,0.717,3.383,0.664c2.082-0.061,1.745,0.367,4.93-0.878  c3.177-1.252,4.409-2.535,7.793-4.115c3.384-1.573,2.81-1.466,5.734-2.199c2.924-0.733,3.973-0.733,5.955-0.733v-0.069  c0.145-0.443,0.092-0.74-0.513-1.176c-0.605-0.443-0.459-0.496-1.914-0.588c-1.454-0.091-2.442,0.13-3.896,0.221  c-1.454,0.091-1.21,0.16-1.906,0.145c-0.322-0.076-0.643-0.145-0.957-0.221c0.735-0.068,1.225-0.267,3.008-1.168  c1.784-0.901,1.806-0.832,4.118-2.42c2.319-1.603,2.427-1.305,5.152-3.962c2.717-2.657,3.383-3.779,5.734-6.672  c2.35-2.901,1.875-2.527,3.674-4.908c1.799-2.389,2.243-2.901,3.421-4.435C206.43,155.912,204.618,152.772,203.374,151.106z"/>
		<path fill="#FFFFFF" d="M157.983,161.812v-9.327h4.86c0.69,0,1.25,0.558,1.25,1.246v8.081h-2.039v-7.148  c0-0.176-0.138-0.313-0.307-0.313h-1.411h-0.008c-0.169,0-0.307,0.138-0.307,0.313v7.148  C160.022,161.812,157.983,161.812,157.983,161.812z"/>
		<path fill="#FFFFFF" d="M178.336,155.902v-1.238c0-0.176-0.138-0.313-0.314-0.313h-1.441c-0.177,0-0.322,0.138-0.322,0.313v1.238  c0,0.176,0.145,0.313,0.322,0.313h1.441C178.198,156.216,178.336,156.078,178.336,155.902 M174.181,161.812v-8.081  c0-0.688,0.575-1.246,1.28-1.246h3.702c0.705,0,1.28,0.558,1.28,1.246v8.081h-2.108v-3.417c0-0.176-0.138-0.313-0.314-0.313h-1.441  c-0.177,0-0.322,0.138-0.322,0.313v3.417C176.259,161.812,174.181,161.812,174.181,161.812z"/>
		<path fill="#FFFFFF" d="M186.554,155.902v-1.238c0-0.176-0.145-0.313-0.322-0.313h-1.426c-0.176,0-0.314,0.138-0.314,0.313v1.238  c0,0.176,0.138,0.313,0.314,0.313h1.426C186.409,156.216,186.554,156.078,186.554,155.902 M182.43,161.812v-8.081  c0-0.688,0.567-1.246,1.265-1.246h3.649c0.705,0,1.273,0.558,1.273,1.246v8.081h-2.062v-3.417c0-0.176-0.145-0.313-0.322-0.313  h-1.426c-0.176,0-0.314,0.138-0.314,0.313v3.417C184.492,161.812,182.43,161.812,182.43,161.812z"/>
		<path fill="#FFFFFF" d="M171.084,152.485h-3.55c-0.682,0-1.234,0.558-1.234,1.238v0.008v6.819c0,0.68,0.552,1.238,1.234,1.238h0  h3.549c0.682,0,1.234-0.558,1.234-1.238v-0.008v-6.819C172.319,153.043,171.766,152.485,171.084,152.485z M170.31,159.618  c0,0.168-0.138,0.306-0.306,0.306h-1.388c-0.169,0-0.306-0.138-0.306-0.306v-4.962c0-0.168,0.138-0.313,0.306-0.313h1.388  c0.169,0,0.306,0.145,0.306,0.313V159.618z"/>
	</svg>
  </a>
  <button class="navbar-toggler header-toggle-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-navicon"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	  <li class="current-nav-item"><a class="nav-link" href="">EMC Verification</a></li>
	  <li class="nav-item"><a class="nav-link" href="https://emc.ncep.noaa.gov/emc/pages/vpppgb-description.php">About Us</a></li>
	  <li class="nav-item"><a class="nav-link" href="https://www.emc.ncep.noaa.gov/users/meg/home/">Model Evaluation Group</a></li>
    </ul>
  </div>
</nav>

</header>

<section id ="content">
<div class="container-fluid">

<div class="content-header">

        <div class="row justify-content-md-left">
                <div class="col-lg-auto col-breadcrumb-box">
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="https://www.emc.ncep.noaa.gov">EMC Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">EMC Verification</li>
                          </ol>
                        </nav>
                </div>
        </div> <!-- End of row -->
</div>


<div class="row justify-content-md-center">
    <div class="col-md-auto col-overlay-img">
                <a class="img" href="headlines/">
                  <div class="img__overlay">Headline<br/>Scores</div>
                  <img src="https://emc.ncep.noaa.gov/users/verification/global/gfs/ops/grid2grid_all_models/images/acc_valid00Z_HGT_P500_fhr120_G002NHX.png"/>
                </a>
                <div class="img-label"><a class="img-model-icon-lnks" href="headlines/">Headline Scores</a></div>
        </div>
    <div class="col-md-auto col-overlay-img">
		<a class="img" href="global/">
		  <div class="img__overlay">GFS<br/>GEFS<br/>NAEFS<br/>CFS</div>
		  <img src="icon/global.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="global/">Global Models</a></div>
	</div>
	<div class="col-md-auto col-overlay-img">
		<a class="img" href="regional/">
		  <div class="img__overlay">NAM<br/>NAM Nest<br>Hi-Res Windows<br>RAP HRRR<br>HREF SREF</div>
		  <img src="icon/regional_hires.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="regional/">Regional/Hi-Res Models</a></div>
	</div>
	<div class="col-md-auto col-overlay-img">
		<a class="img" href="ocean_wave/">
		  <div class="img__overlay">RTOFS<br>WAVEWATCH III</div>
		  <img src="icon/ocean_wave.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="ocean_wave/">Ocean/Wave Models</a></div>
	</div>
	<div class="col-md-auto col-overlay-img">
		<a class="img" href="analyses/">
		  <div class="img__overlay">RTMA<br/>URMA</div>
		  <img src="icon/realtime_anl.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="analyses/">Real-time Analyses</a></div>
	</div>
<!--</div>-->

<!-- <div class="row">-->
<!--<div class="w-100"></div>-->

    <div class="col-md-auto col-overlay-img">
		<a class="img" href="cyclones/">
		  <div class="img__overlay">HWRF<br>HMON<br>Tropical Cyclones<br>Extratropical<br>Cyclones</div>
		  <img src="icon/cyclones.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="cyclones/">Cyclones</a></div>
	</div>
	<div class="col-md-auto col-overlay-img">
		<a class="img" href="precip/">
		  <div class="img__overlay">Precipitation<br/>Cloud Cover<br>(Multiple Models)</div>
		  <img src="icon/precip_clouds.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="precip/">Precipitation/Clouds</a></div>
	</div>
	<div class="col-md-auto col-overlay-img">
		<a class="img" href="air_quality/">
		  <div class="img__overlay">CMAQ<br/>HYSPLIT<br/>NGAC</div>
		  <img src="icon/air_quality.png"/>
		</a>
		<div class="img-label"><a class="img-model-icon-lnks" href="air_quality/">Air Quality</a></div>
	</div>
</div>

</div> <!-- Closes Container-Fluid div-->
</section><!-- Closes Content section-->

<!-- Footer Section -->
	<footer class="footer">
	<div class="container-fluid usa-footer-secondary-section clearfix">
		
		<!--<div class="col-lg-12">-->
		<div class="row">
			<div class="col-md-6">	
                                 <div class="usa-footer-contact-links">
                                        <address><center>
                                                <div class="usa-footer-contact-heading">Disclaimer:</div>
                                                <div class="usa-footer-contact-address">This webpage is not operational and is not subject to 24-h monitoring<br>by NCEP's Central Operations (NCO) staff.</div>
                                        </center></address>
                                </div>	
					<div class="usa-footer-logo">
						<a href="https://www.usa.gov/"><img alt="Logo image" class="usa-footer-logo-img" src="style/images/usagov.png" title="USA Logo"></a>
						<a href="http://www.noaa.gov/"><img alt="Logo image" class="usa-footer-logo-img" src="style/images/noaa_logo.png" title="NOAA EMC Logo"></a>
						<h3 class="usa-footer-logo-heading">National Centers for<br>Environmental Prediction/<br>Environmental Modeling Center</h3>

					</div>
			</div>
			<div class="col">	
				<div class="usa-footer-contact-links">
					<address>
						<div class="usa-footer-contact-heading">Contact Us</div>
						<div class="usa-footer-contact-address">NOAA Center for Weather and Climate Prediction<br>5830 University Research Court<br>College Park, MD 20740</div>
 						<div class="usa-footer-contact-email">
						<i class="fa fa-envelope-o" style="padding-right: 6px;"></i><a href="mailto:Alicia.Bentley@noaa.gov">Email Us</a>
						</div>
					</address>
				</div>
			</div>
			<div class="col">	
				<div class="usa-footer-contact-links">
					<div class="usa-social-links">
						<div class="usa-footer-contact-heading">Follow Us</div>
					        <div>
                                                        <a href="https://www.facebook.com/NOAA-NWS-Environmental-Modeling-Center-151823641556512/" class="fa fa-facebook fa-3x"></a>
                                                        <a href="https://twitter.com/nwsemc" class="fa fa-twitter fa-3x"></a>
                                                        <a href="https://www.youtube.com/channel/UCNXpWLqwZTukeycJHyToKKw" class="fa fa-youtube fa-3x"></a>
                                                </div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col">
				<ul class="footer-nesdis-links">
					<li><a href="https://www.weather.gov/privacy" title="NOAA's Privacy Policy" id="anch_79">Privacy Policy</a></li>
					<li><a href="http://www.noaa.gov/foia-freedom-of-information-act" title="Freedome of Information Act" id="anch_80">Freedom Of Information Act</a></li>
					<li><a href="https://w1.weather.gov/glossary/" title="NWS Glossary" id="anch_80">NWS Glossary</a></li>
					<li><a href="http://www.cio.noaa.gov/services_programs/info_quality.html" title="Information Quality" id="anch_81">Information Quality</a></li>
					<li><a href="https://www.weather.gov/disclaimer" title="Disclaimer" id="anch_82">Disclaimer</a></li>
					<li><a href="https://www.surveymonkey.com/r/6QTGJQF" title="Take Our Site Survey" id="anch_83">Take Our Survey</a></li>
					<li><a href="http://www.commerce.gov/" title="United States Department of Commerce" id="anch_84">Department of Commerce</a></li>
					<li><a href="http://www.noaa.gov" title="NOAA" id="anch_85">NOAA</a></li>
					<li><a href="https://www.emc.ncep.noaa.gov/" title="EMC" id="anch_86">EMC</a></li>
				</ul>
			</div>
		</div>
	<!--</div>-->
	</div>	
	</footer>
<!-- 	</div> --><!-- Close wrapper -->	
	<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
