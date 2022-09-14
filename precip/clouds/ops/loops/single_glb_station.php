
<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>SINGLE MODEL</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>



<!-- Head element -->
<div class="page-top">
	<span><a style="color:#ffffff">GFS CLOUD VERIFICATION AGAINST STATIONS  
                                       </a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
	
 <!--       <div class="element">
                <span class="bold">Valid:</span>
                <select id="validtime" onchange="changeValidtime(this.value);"></select>
        </div>
-->
        <div class="element">
                <span class="bold">Year:</span>
                <select id="year" onchange="changeYear(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Month:</span>
                <select id="month" onchange="changeMonth(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Score:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>

        <div class="element">
                <span class="bold">Region:</span>
                <select id="domain" onchange="changeDomain(this.value)"></select>
        </div>

<!-- /Top menu -->
</div></div>

<!-- Middle menu -->
<div class="page-middle" id="page-middle">
Left/Right arrow keys = Change statistic | Up/Down arrow keys = Change year 
<br>For additional information on this image, <button class="infobutton" id="myBtn">click here</button>
<div id="myModal" class="modal">
  <div class="modal-content" style="font-size:130%;">
    <span class="close">&times;</span>
    Additional Image Information
    <embed width=100% height=90% src="gefs_info.php">
  </div>
</div>
<!-- /Middle menu -->
</div>

<div id="loading"><img style="width:100%" src="loading.png"></div>

<!-- Image -->
<div id="page-map">
	<image name="map" style="width:100%">
</div>

<!-- /Footer -->
<div class="page-footer">
        <span></div>


<script type="text/javascript">
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//====================================================================================================
//User-defined variables
//====================================================================================================

//Global variables
var minFrame = 0; //Minimum frame for every variable
var maxFrame = 26; //Maximum frame for every variable
var incrementFrame = 1; //Increment for every frame

var startFrame = 0; //Starting frame

var cycle = 2018100600;

/*
When constructing the URL below, DDD = domain, VVV = variable, LLL = level, SSS = season, Y = frame number.
For X and Y, labeling one X or Y represents an integer (e.g. 0, 10, 20). Multiple of these represent a string
format (e.g. XX = 00, 06, 12 --- XXX = 000, 006, 012).
*/

var url = "https://www.emc.ncep.noaa.gov/bzhou/verf_cloud_4web/YYYY/Cloud_STATION_YYYYMM_VVV_Global.png";
/* var url = "https://www.emc.ncep.noaa.gov/mmb/gmanikin/fv3gfs/20180301/fv3_DDD_VVV_2018030100_0Y.png"; */
/*  var url = "https://www.emc.ncep.noaa.gov/users/Alicia.Bentley/fv3gefs/2018030100/images/DDD/mean_diff/VVV_Y.png"; */

//====================================================================================================
//Add variables & domains
//====================================================================================================

var variables = [];
var domains = [];
var levels = [];
var seasons = [];
var maptypes = [];
var validtimes = [];
var years = [];
var months = [];
var models = [];

variables.push({
        displayName: "RMSE ~ fcst hours",
        name: "RMSE_fhr",
});
variables.push({
        displayName: "RMSE(All fhr) ~ days",
        name: "RMSE_TimeSeries_AllFhr",
});
variables.push({
        displayName: "Mean Error ~ fcst hours",
        name: "ME_fhr",
});

variables.push({
        displayName: "Mean Error(All fhr) ~ days",
        name: "ME_TimeSeries_AllFhr",
});

variables.push({
        displayName: "ETS(All fhr) ~ thresholds",
        name: "ETS_AllFhr_thres",
});

variables.push({
        displayName: "ETS ~ fcst hours",
        name: "ETS_fhr",
});

variables.push({
        displayName: "FBias(All fhr) ~ thresholds",
        name: "FBIAS_AllFhr_thres",
});


variables.push({
        displayName: "FBias ~ fcst hour",
        name: "FBIAS_fhr",
});



years.push({
        displayName: "2021",
        name: "2021",
});

years.push({
        displayName: "2020",
        name: "2020",
});



months.push({
        displayName: "Jan",
        name: "01",
});

months.push({
        displayName: "Feb",
        name: "02",
});

months.push({
        displayName: "Mar",
        name: "03",
});

months.push({
        displayName: "Apr",
        name: "04",
});

months.push({
        displayName: "May",
        name: "05",
});

months.push({
        displayName: "Jun",
        name: "06",
});

months.push({
        displayName: "Jul",
        name: "07",
});

months.push({
        displayName: "Aug",
        name: "08",
});

months.push({
        displayName: "Sep",
        name: "09",
});

months.push({
        displayName: "Oct",
        name: "10",
});

months.push({
        displayName: "Nov",
        name: "11",
});

months.push({
        displayName: "Dec",
        name: "12",
});


domains.push({
        displayName: "Global",
        name: "Global",
});



//====================================================================================================
//Initialize the page
//====================================================================================================

//function for keyboard controls
document.onkeydown = keys;

//Decare object containing data about the currently displayed map
imageObj = {};

//Initialize the page
initialize();

//Format initialized run date & return in requested format
function formatDate(offset,format){
	var newdate = String(cycle);
	var yyyy = newdate.slice(0,4);
	var mm = newdate.slice(4,6);
	var dd = newdate.slice(6,8);
	var hh = newdate.slice(8,10);
	var curdate = new Date(yyyy,parseInt(mm)-1,dd,hh);
	
	//Offset by run
	var newOffset = curdate.getHours() + offset;
	curdate.setHours(newOffset);
	
	var yy = String(curdate.getFullYear()).slice(2,4);
	yyyy = curdate.getFullYear();
	mm = curdate.getMonth()+1;
	dd = curdate.getDate();
	if(dd < 10){dd = "0" + dd;}
	hh = curdate.getHours();
	if(hh < 10){hh = "0" + hh;}
	
	var wkday = curdate.getDay();
	var day_str = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
	
	//Return in requested format
	if(format == 'valid'){
		//06Z Thu 03/22/18 (90 h)
		var txt = hh + "Z " + day_str[wkday] + " " + mm + "/" + dd + "/" + yy;
		return txt;
	}
}

//Initialize the page
function initialize(){
	
	//Set image object based on default variables
	imageObj = {
		variable: "RMSE_fhr",
		year: "2021",
		month: "01",
		domain: "Global"
	};
	
        //Change domain based on passed argument, if any
        var passed_domain = "";
        if(passed_domain != ""){
                if(searchByName(passed_domain,domains)>=0){
                        imageObj.domain = passed_domain;
                }
        }


        //Change year based on passed argument, if any
        var passed_year = "";
        if(passed_year != ""){
                if(searchByName(passed_year,years)>=0){
                        imageObj.year = passed_year;
                }
        }

        //Change month based on passed argument, if any
        var passed_month = "";
        if(passed_month != ""){
                if(searchByName(passed_month,months)>=0){
                        imageObj.month = passed_month;
                }
        }



        //Change variable based on passed argument, if any
        var passed_variable = "";
        if(passed_variable != ""){
                if(searchByName(passed_variable,variables)>=0){
                        imageObj.variable = passed_variable;
                }
        }


	
	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('variable');
	populateMenu('year');
	populateMenu('month');
	populateMenu('domain');
//        populateMenu('validtime');
	
	//Populate the frames arrays
	frames = [];
	for(i=minFrame;i<=maxFrame;i=i+incrementFrame){frames.push(i);}
	
	//Predefine empty array for preloading images
	for(i=0; i<variables.length; i++){
		variables[i].images = [];
		variables[i].loaded = [];
		variables[i].dprog = [];
	}
	
	//Preload images and display map
	preload(imageObj);
	showImage();
	
	//Update mobile display for swiping
	updateMobile();

}

var xInit = null;                                                        
var yInit = null;                  
var xPos = null;
var yPos = null;


</script>


</body></html>
