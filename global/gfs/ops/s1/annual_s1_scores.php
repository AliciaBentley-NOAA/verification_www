<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="../main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_metplus.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>






<body>
<div id="pageTitle">
S1 Verification</div>
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold">Type:</span>
                <select id="maptype" onchange="changeMaptype(this.value)"></select>
        </div>
        <div class="element">
                <span class="bold">Year:</span>
                <select id="domain" onchange="changeDomain(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Month:</span>
                <select id="variable" onchange="changeVariable(this.value)"></select>
        </div>
</div></div>

<!-- Middle menu -->
<div class="page-middle" id="page-middle">
Left/Right arrow keys = Change month | Up/Down arrow keys = Change year
<br>For information on S1 verification, <button class="infobutton" id="myBtn">click here</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    S1 Verification Information
    <iframe width=100% height=90% src="main.php" style="border:none;"></iframe>
  </div>
</div>
<!-- /Middle menu -->
</div>

<div id="loading"><img style="width:100%" src="../images/loading.png"></div>

<!-- Image -->
<div id="page-map">
        <embed name="map" style="width:100%; height:800px;">
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
//====================================================================================================
//User-defined variables
//====================================================================================================

//Global variables
var minFrame = 0; //Minimum frame for every variable
var maxFrame = 26; //Maximum frame for every variable
var incrementFrame = 1; //Increment for every frame

var startFrame = 0; //Starting frame

var cycle = 2018100600

/*
When constructing the URL below, DDD = domain, VVV = variable, LLL = level, SSS = season, Y = frame number.
For X and Y, labeling one X or Y represents an integer (e.g. 0, 10, 20). Multiple of these represent a string
format (e.g. XX = 00, 06, 12 --- XXX = 000, 006, 012).
*/
var url = "https://www.emc.ncep.noaa.gov/gmb/mpr/historic_s1/gfs_data/DDD/wmxrptVVV";
//var url = "https://www.emc.ncep.noaa.gov/gmb/mpr/historic_s1/s1_scores/historic_s1_yearly_scores.png"
//====================================================================================================
//Add variables & domains
//====================================================================================================

var variables = [];
var domains = [];
var levels = [];
var seasons = [];
var maptypes = [];
var validtimes = [];


domains.push({
        displayName: "2009",
        name: "2009",
});
domains.push({
        displayName: "2010",
        name: "2010",
});
domains.push({
        displayName: "2011",
        name: "2011",
});
domains.push({
        displayName: "2012",
        name: "2012",
});
domains.push({
        displayName: "2013",
        name: "2013",
});
domains.push({
        displayName: "2014",
        name: "2014",
});
domains.push({
        displayName: "2015",
        name: "2015",
});
domains.push({
        displayName: "2016",
        name: "2016",
});
domains.push({
        displayName: "2017",
        name: "2017",
});
domains.push({
        displayName: "2018",
        name: "2018",
});
domains.push({
        displayName: "2019",
        name: "2019",
});
domains.push({
        displayName: "2020",
        name: "2020",
});
domains.push({
        displayName: "2021",
        name: "2021",
});

variables.push({
        displayName: "January",
        name: "01",
});
variables.push({
        displayName: "Febuary",
        name: "02",
});
variables.push({
        displayName: "March",
        name: "03",
});
variables.push({
        displayName: "April",
        name: "04",
});
variables.push({
        displayName: "May",
        name: "05",
});
variables.push({
        displayName: "June",
        name: "06",
});
variables.push({
        displayName: "July",
        name: "07",
});
variables.push({
        displayName: "August",
        name: "08",
});
variables.push({
        displayName: "September",
        name: "09",
});
variables.push({
        displayName: "October",
        name: "10",
});
variables.push({
        displayName: "November",
        name: "11",
});
variables.push({
        displayName: "December",
        name: "12",
});


maptypes.push({
        url: "gfs_model_forecasts.php",
        displayName: "GFS Model Forecasts",
        name: "gfs_model_forecasts",
});
maptypes.push({
        url: "ncep_quality_monitoring_report.php",
        displayName: "NCEP Quality Monitoring Reports",
        name: "ncep_quality_monitoring_report",
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
        var yyyy = newdate.slice(0,4)
        var mm = newdate.slice(4,6);
        var dd = newdate.slice(6,8);
        var hh = newdate.slice(8,10);
        var curdate = new Date(yyyy,parseInt(mm)-1,dd,hh)


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
                variable: "02",
                domain: "2009"
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
        populateMenu('maptype')

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
