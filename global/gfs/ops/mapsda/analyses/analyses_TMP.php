<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="../../main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="../jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../functions_metplus.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>






<body>
<div id="pageTitle">
Data Assimilation Plots: Analysis</div>
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold">Statistic:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Variable:</span>
                <select id="maptype" onchange="changeMaptype(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Level:</span>
                <select id="level" onchange="changeLevel(this.value)"></select>
        </div>
</div></div>

<!-- Middle menu -->
<div class="page-middle" id="page-middle">
Left/Right arrow keys = Change statistic | Up/Down arrow keys = Change level
<br>For information on data assmilation verification, <button class="infobutton" id="myBtn">click here</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    Data Assimilation Verification Information
    <iframe width=100% height=90% src="../main.php" style="border:none;"></iframe>
  </div>
</div>
<!-- /Middle menu -->
</div>

<div id="loading"><img style="width:100%" src="../../images/loading.png"></div>

<!-- Image -->
<div id="page-map">
        <image name="map" style="width:100%">
</div>

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
//====================================================================================================^M
//User-defined variables
//====================================================================================================^M

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
var url = "../images/gdas_VVV_preslevs_TMP_LLL.png";
/* var url = "https://www.emc.ncep.noaa.gov/gmb/yluo/naefs/VRFY_STATS/NCEP_NCEPb/DDDtLLL_VVV_SSS.gif"; */
/* var url = "https://www.emc.ncep.noaa.gov/gmb/STATS_vsdbTTT/allmodel/daily/cor/cor_VVV_HGT_LLL_DDD.png";
/* var url = "https://www.emc.ncep.noaa.gov/users/Alicia.Bentley/fv3gefs/2018030100/images/DDD/mean_diff/VVV_Y.png"; */

//====================================================================================================^M
//Add variables & domains
//====================================================================================================^M

var variables = [];
var domains = [];
var levels = [];
var seasons = [];
var maptypes = [];
var validtimes = [];


levels.push({
        displayName: "1 hPa",
        name: "1hPa",
});
levels.push({
        displayName: "2 hPa",
        name: "2hPa",
});
levels.push({
        displayName: "3 hPa",
        name: "3hPa",
});
levels.push({
        displayName: "5 hPa",
        name: "5hPa",
});
levels.push({
        displayName: "7 hPa",
        name: "7hPa",
});
levels.push({
        displayName: "10 hPa",
        name: "10hPa",
});
levels.push({
        displayName: "30 hPa",
        name: "30hPa",
});
levels.push({
        displayName: "50 hPa",
        name: "50hPa",
});
levels.push({
        displayName: "70 hPa",
        name: "70hPa",
});
levels.push({
        displayName: "100 hPa",
        name: "100hPa",
});
levels.push({
        displayName: "200 hPa",
        name: "200hPa",
});
levels.push({
        displayName: "500 hPa",
        name: "500hPa",
});
levels.push({
        displayName: "700 hPa",
        name: "700hPa",
});
levels.push({
        displayName: "800 hPa",
        name: "800hPa",
});
levels.push({
        displayName: "925 hPa",
        name: "925hPa",
});
levels.push({
        displayName: "1000 hPa",
        name: "1000hPa",
});
levels.push({
        displayName: "All-Zonal Mean",
        name: "all_zonalmean",
});
levels.push({
        displayName: "Troposphere-Zonal Mean",
        name: "trop_zonalmean",
});
levels.push({
        displayName: "Lower Troposphere-Zonal Mean",
        name: "lowertrop_zonalmean",
});
levels.push({
        displayName: "Upper Troposphere-Zonal Mean",
        name: "uppertrop_zonalmean",
});
levels.push({
        displayName: "Stratosphere-Zonal Mean",
        name: "strat_zonalmean",
});


variables.push({
        displayName: "Increments",
        name: "inc",
});
variables.push({
        displayName: "RMSE",
        name: "rmse",
});


maptypes.push({
        url: "analyses_TMP.php",
        displayName: "Temperature",
        name: "analyses_TMP",
});
maptypes.push({
        url: "analyses_UGRD.php",
        displayName: "Zonal Wind",
        name: "analyses_UGRD",
});
maptypes.push({
        url: "analyses_VGRD.php",
        displayName: "Meridional Wind",
        name: "analyses_VGRD",
});
maptypes.push({
        url: "analyses_RH.php",
        displayName: "Relative Humidity",
        name: "analyses_RH",
});
maptypes.push({
        url: "analyses_CLWMR.php",
        displayName: "Cloud Water",
        name: "analyses_CLWMR",
});
maptypes.push({
        url: "analyses_O3MR.php",
        displayName: "Ozone",
        name: "analyses_O3MR",
});
maptypes.push({
        url: "analyses_MSLET.php",
        displayName: "Surface Pressure",
        name: "analyses_MSLET",
});

//====================================================================================================^M
//Initialize the page
//====================================================================================================^M

//function for keyboard controls
document.onkeydown = keys;

//Decare object containing data about the currently displayed map^M
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
                variable: "inc",
                level: "800hPa",
        };
        
        //Change domain based on passed argument, if any
        var passed_domain = "";
        if(passed_domain!=""){
                if(searchByName(passed_domain,domains)>=0){
                        imageObj.domain = passed_domain;
                }
        }

        //Change variable based on passed argument, if any
        var passed_variable = "";
        if(passed_variable!=""){
                if(searchByName(passed_variable,variables)>=0){
                        imageObj.variable = passed_variable;
                }
        }
        
        //Populate forecast hour and dprog/dt arrays for this run and frame
        populateMenu('variable');
        //populateMenu('domain');
        populateMenu('level');
        //populateMenu('validtime');
	populateMenu('maptype');        

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
 
</body>
</html>
