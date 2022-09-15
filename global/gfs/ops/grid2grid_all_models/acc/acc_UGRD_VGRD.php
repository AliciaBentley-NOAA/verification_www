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
Grid-to-Grid: Anomaly Correlation Coefficient</div>
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold">Valid:</span>
                <select id="validtime" onchange="changeValidtime(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Forecast Lead:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Region:</span>
                <select id="domain" onchange="changeDomain(this.value)"></select>
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
Left/Right arrow keys = Change forecast lead | Up/Down arrow keys = Change level
<br>For information on grid-to-grid verification, <button class="infobutton" id="myBtn">click here</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    Grid-to-Grid Verification Information
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
var url = "../images/acc_TTT_UGRD_VGRD_LLL_VVV_DDD.png";
/* var url = "https://www.emc.ncep.noaa.gov/gmb/yluo/naefs/VRFY_STATS/NCEP_NCEPb/DDDtLLL_VVV_SSS.gif"; */
/* var url = "https://www.emc.ncep.noaa.gov/gmb/STATS_vsdbTTT/allmodel/daily/cor/cor_VVV_WIND_LLL_DDD.png";
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


domains.push({
        displayName: "Global",
        name: "G002",
});
domains.push({
        displayName: "N. Hemisphere",
        name: "G002NHX",
});
domains.push({
        displayName: "S. Hemisphere",
        name: "G002SHX",
});
domains.push({
        displayName: "Tropics",
        name: "G002TRO",
});
domains.push({
        displayName: "PNA",
        name: "G002PNA",
});


levels.push({
        displayName: "250 hPa",
        name: "P250",
});
levels.push({
        displayName: "500 hPa",
        name: "P500",
});
levels.push({
        displayName: "850 hPa",
        name: "P850",
});


validtimes.push({
        displayName: "0000 UTC",
        name: "valid00Z",
});
validtimes.push({
        displayName: "1200 UTC",
        name: "valid12Z",
});


variables.push({
        displayName: "Day 0",
        name: "fhr00",
});
variables.push({
        displayName: "Day 1",
        name: "fhr24",
});
variables.push({
        displayName: "Day 2",
        name: "fhr48",
});
variables.push({
        displayName: "Day 3",
        name: "fhr72",
});
variables.push({
        displayName: "Day 4",
        name: "fhr96",
});
variables.push({
        displayName: "Day 5",
        name: "fhr120",
});
variables.push({
        displayName: "Day 6",
        name: "fhr144",
});
variables.push({
        displayName: "Day 7",
        name: "fhr168",
});
variables.push({
        displayName: "Day 8",
        name: "fhr192",
});
variables.push({
        displayName: "Day 9",
        name: "fhr216",
});
variables.push({
        displayName: "Day 10",
        name: "fhr240",
});
variables.push({
        displayName: "Mean",
        name: "fhrmean",
});
variables.push({
        displayName: "Lead-Date",
        name: "leaddate",
});


maptypes.push({
        url: "acc_HGT.php",
        displayName: "Geopotential Height",
        name: "acc_HGT",
});
maptypes.push({
        url: "acc_TMP.php",
        displayName: "Temperature",
        name: "acc_TMP",
});
maptypes.push({
        url: "acc_UGRD.php",
        displayName: "Zonal Wind",
        name: "acc_UGRD",
});
maptypes.push({
        url: "acc_VGRD.php",
        displayName: "Meridional Wind",
        name: "acc_VGRD",
});
maptypes.push({
        url: "acc_UGRD_VGRD.php",
        displayName: "Vector Wind",
        name: "acc_UGRD_VGRD",
});
maptypes.push({
        url: "acc_PRMSL.php",
        displayName: "Sea-level Pressure",
        name: "acc_PRMSL",
});
maptypes.push({
        url: "acc_HGT_WV020.php",
        displayName: "Geopotential Height: Waves 0-20",
        name: "acc_HGT_WV020",
});
maptypes.push({
        url: "acc_HGT_WV03.php",
        displayName: "Geopotential Height: Waves 0-3",
        name: "acc_HGT_WV03",
});
maptypes.push({
        url: "acc_HGT_WV49.php",
        displayName: "Geopotential Height: Waves 4-9",
        name: "acc_HGT_WV49",
});
maptypes.push({
        url: "acc_HGT_WV1020.php",
        displayName: "Geopotential Height: Waves 10-20",
        name: "acc_HGT_WV1020",
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
                variable: "fhr120",
                domain: "G002NHX",
                level: "P850",
                validtime: "valid00Z",
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
        populateMenu('domain');
        populateMenu('level');
        populateMenu('validtime');
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
