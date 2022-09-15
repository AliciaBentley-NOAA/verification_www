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
Grid-to-Obs: Bias</div>
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold">Obs. Type:</span>
                <select id="maptype" onchange="changeMaptype(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Initialization:</span>
                <select id="validtime" onchange="changeValidtime(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Region:</span>
                <select id="domain" onchange="changeDomain(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Forecast Lead:</span>
                <select id="season" onchange="changeSeason(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Variable:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Level:</span>
                <select id="level" onchange="changeLevel(this.value)"></select>
        </div>
</div></div>

<!-- Middle menu -->
<div class="page-middle" id="page-middle">
Left/Right arrow keys = Change forecast lead | Up/Down arrow keys = Change level
<br>For information on grid-to-obs verification, <button class="infobutton" id="myBtn">click here</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    Grid-to-Obs Verification Information
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
var url = "../images/bias_TTT_VVV_SSS_DDD.png";
/* var url = "https://www.emc.ncep.noaa.gov/gmb/yluo/naefs/VRFY_STATS/NCEP_NCEPb/DDDtLLL_VVV_SSS.gif"; */
/* var url = "https://www.emc.ncep.noaa.gov/gmb/STATS_vsdbTTT/allmodel/daily/bias/bias_VVV_HGT_LLL_DDD.png";
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
        displayName: "G104",
        name: "G104",
});
domains.push({
        displayName: "East",
        name: "G104EAST",
});
domains.push({
        displayName: "West",
        name: "G104WEST",
});
domains.push({
        displayName: "NW Coast",
        name: "G104NWC",
});
domains.push({
        displayName: "SW Coast",
        name: "G104SWC",
});
domains.push({
        displayName: "N. Mountain",
        name: "G104NMT",
});
domains.push({
        displayName: "S. Mountain",
        name: "G104SMT",
});
domains.push({
        displayName: "Great Basin",
        name: "G104GRB",
});
domains.push({
        displayName: "SW Desert",
        name: "G104SWD",
});
domains.push({
        displayName: "N. Plains",
        name: "G104NPL",
});
domains.push({
        displayName: "S. Plains",
        name: "G104SPL",
});
domains.push({
        displayName: "Midwest",
        name: "G104MDW",
});
domains.push({
        displayName: "Lower MS Valley",
        name: "G104LMV",
});
domains.push({
        displayName: "Appalachians",
        name: "G104APL",
});
domains.push({
        displayName: "NE Coast",
        name: "G104NEC",
});
domains.push({
        displayName: "SE Coast",
        name: "G104SEC",
});
domains.push({
        displayName: "Gulf of MEX Coast",
        name: "G104GMC",
});
domains.push({
        displayName: "N. Alaska",
        name: "G104NAK",
});
domains.push({
        displayName: "S. Alaska",
        name: "G104SAK",
});

levels.push({
        displayName: "--",
        name: "",
});


seasons.push({
        displayName: "fhr 00",
        name: "fhr00",
});
seasons.push({
        displayName: "fhr 06",
        name: "fhr06",
});
seasons.push({
        displayName: "fhr 12",
        name: "fhr12",
});
seasons.push({
        displayName: "fhr 18",
        name: "fhr18",
});
seasons.push({
        displayName: "fhr 24",
        name: "fhr24",
});
seasons.push({
        displayName: "fhr 30",
        name: "fhr30",
});
seasons.push({
        displayName: "fhr 36",
        name: "fhr36",
});
seasons.push({
        displayName: "fhr 42",
        name: "fhr42",
});
seasons.push({
        displayName: "fhr 48",
        name: "fhr48",
});
seasons.push({
        displayName: "fhr 54",
        name: "fhr54",
});
seasons.push({
        displayName: "fhr 60",
        name: "fhr60",
});
seasons.push({
        displayName: "fhr 66",
        name: "fhr66",
});
seasons.push({
        displayName: "fhr 72",
        name: "fhr72",
});
seasons.push({
        displayName: "fhr 78",
        name: "fhr78",
});
seasons.push({
        displayName: "fhr 84",
        name: "fhr84",
});
seasons.push({
        displayName: "fhr 90",
        name: "fhr90",
});
seasons.push({
        displayName: "fhr 96",
        name: "fhr96",
});
seasons.push({
        displayName: "fhr 102",
        name: "fhr108",
});
seasons.push({
        displayName: "fhr 114",
        name: "fhr114",
});
seasons.push({
        displayName: "fhr 120",
        name: "fhr120",
});
seasons.push({
        displayName: "fhr 126",
        name: "fhr126",
});
seasons.push({
        displayName: "fhr 132",
        name: "fhr132",
});
seasons.push({
        displayName: "fhr 138",
        name: "fhr138",
});
seasons.push({
        displayName: "fhr 144",
        name: "fhr144",
});
seasons.push({
        displayName: "fhr 150",
        name: "fhr150",
});
seasons.push({
        displayName: "fhr 156",
        name: "fhr156",
});
seasons.push({
        displayName: "fhr 162",
        name: "fhr162",
});
seasons.push({
        displayName: "fhr 168",
        name: "fhr168",
});
seasons.push({
        displayName: "Mean",
        name: "fhrmean",
});


validtimes.push({
        displayName: "0000 UTC",
        name: "init00Z",
});
validtimes.push({
        displayName: "0600 UTC",
        name: "init06Z",
});
validtimes.push({
        displayName: "1200 UTC",
        name: "init12Z",
});
validtimes.push({
        displayName: "1800 UTC",
        name: "init18Z",
});


variables.push({
        displayName: "2m Temperature",
        name: "TMP_Z2",
});
variables.push({
        displayName: "2m Relative Humidity",
        name: "RH_Z2",
});
variables.push({
        displayName: "2m Dewpoint",
        name: "DPT_Z2",
});
variables.push({
        displayName: "10m Wind",
        name: "UGRD_VGRD_Z10",
});
variables.push({
        displayName: "Total Cloud Cover",
        name: "TCDC_L0",
});
variables.push({
        displayName: "Sea Level Pressure",
        name: "PRMSL_Z0",
});
variables.push({
        displayName: "Visibility",
        name: "VIS_Z0",
});
variables.push({
        displayName: "Cloud Ceiling",
        name: "HGT_L0",
});
variables.push({
        displayName: "Surface based CAPE",
        name: "CAPE_Z0",
});
variables.push({
        displayName: "PBL Height",
        name: "HPBL_L0",
});
variables.push({
        displayName: "Wind Gust",
        name: "GUST_Z0",
});


maptypes.push({
        url: "bias_ADPUPA.php",
        displayName: "ADPUPA",
        name: "bias_ADPUPA",
});
maptypes.push({
        url: "bias_ONLYSF.php",
        displayName: "ONLYSF",
        name: "bias_ONLYSF",
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
                variable: "TMP_Z2",
                season: "fhr00",
                domain: "G104EAST",
                level: "",
                validtime: "init00Z",
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
       
        //Change variable based on passed argument, if any
        var passed_season = "";
        if(passed_season!=""){
                if(searchByName(passed_season,seasons)>=0){
                        imageObj.season = passed_season;
                }
        } 
        //Populate forecast hour and dprog/dt arrays for this run and frame
        populateMenu('variable');
        populateMenu('domain');
        populateMenu('level');
        populateMenu('season');
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
