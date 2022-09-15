<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>TC Verification</title>
<link rel="stylesheet" type="text/css" href="style_tropical.css">
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_tropical.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">TROPICAL CYCLONE VERIFICATION</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold">Year:</span>
                <select id="year" onchange="changeYear(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Basin:</span>
                <select id="leftregion" onchange="changeLeftregion(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Storm Name:</span>
                <select id="leftmodel" onchange="changeLeftmodel(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Model Type:</span>
                <select id="rightregion" onchange="changeRightregion(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold"> Statistic:</span>
                <select id="rightmodel" onchange="changeRightmodel(this.value);"></select>
        </div>
</div></div>

<!-- /Top menu -->






<!-- Images -->
<div id="page-map">
<table id="tbl-map" style="margin:auto">
     <tbody>
       <tr>
        <td id ="td-map">
           <img name="map_main" src="https://www.emc.ncep.noaa.gov/users/verification/tropical/2021/global_det/AL/AL_2021_ALL/images/ABSTK_ERR_fhrmean_AL_2021_ALL_global_det.png" style="width:100%">
        </td>
    </tbody>
</table>
</div>

<!-- /Footer -->
<div class="page-footer">
        <span></div>

<script type="text/javascript">
//====================================================================================================
//User-defined years
//====================================================================================================

var url = "https://www.emc.ncep.noaa.gov/users/verification/tropical/YYY/MMM/BBB/BBB_YYY_NNN/images/EEE_fhrmean_BBB_YYY_NNN_MMM.png";
//var url = "https://www.emc.ncep.noaa.gov/users/Yan.Jin/EMC-verif-global/MMM_model/BBB_YYY/BBB_YYY_NNN/images/EEE_fhrmean_BBB_YYY_NNN_MMM.png";
//tc_2021_NATL_alltcs_global_trackerr.gif

//====================================================================================================
//Add years & months
//====================================================================================================

var years = [];
var leftregions = [];
var leftmodels = [];
var rightregions = [];
var rightmodels = [];



years.push({
        displayName: "2021",
        name: "2021",
});
//years.push({
//        displayName: "2020",
//        name: "2020",
//});




leftregions.push({
        displayName: "North Atlantic",
        name: "AL",
});
leftregions.push({
        displayName: "East Pacific",
        name: "EP",
});





AL_2021 = ["ALL","ANA","BILL","CLAUDETTE","DANNY","ELSA","FRED","GRACE","HENRI","IDA","JULIAN","KATE","LARRY","MINDY","NICHOLAS","ODETTE","PETER","ROSE","SAM","TERESA","VICTOR","WANDA"]; 
AL_2021_name = ["ALL STORMS","ANA","BILL","CLAUDETTE","DANNY","ELSA","FRED","GRACE","HENRI","IDA","JULIAN","KATE","LARRY","MINDY","NICHOLAS","ODETTE","PETER","ROSE","SAM","TERESA","VICTOR","WANDA"];
EP_2021 = ["ALL","ANDRES","BLANCA","CARLOS","DOLORES","ENRIQUE","FELICIA","GUILLERMO","HILDA","IGNACIO","JIMENA","KEVIN","LINDA","MARTY","NORA","OLAF","PAMELA"];
EP_2021_name = ["ALL STORMS","ANDRES","BLANCA","CARLOS","DOLORES","ENRIQUE","FELICIA","GUILLERMO","HILDA","IGNACIO","JIMENA","KEVIN","LINDA","MARTY","NORA","OLAF","PAMELA"];

AL_2020 = ["alltcs","carol","john","leanne"]; 
AL_2020_name = ["All Storms","Carol","John","Leanne"];
EP_2020 = ["alltcs","anna","christine","maggie"];
EP_2020_name = ["All Storms","Anna","Christine","Maggie"];



rightregions.push({
        displayName: "Global Determ.",
        name: "global_det",
});
rightregions.push({
        displayName: "Global Ensemble",
        name: "global_ens",
});
rightregions.push({
        displayName: "Regional",
        name: "regional",
});




error_types = ["ABSTK_ERR","ALTK_ERR","CRTK_ERR","ABSAMAX_WIND-BMAX_WIND","AMAX_WIND-BMAX_WIND"]; 
error_types_name = ["Track Error","Along-Track Bias","Cross-Track Bias","Intensity Error","Intensity Bias"];


//====================================================================================================
//Initialize the page
//====================================================================================================

//function for keyboard controls
//document.onkeydown = keys;

//Decare object containing data about the currently displayed map
imageObj = {};

//Initialize the page
initialize();


//Initialize the page
function initialize(){
	
	//Set image object based on default years
	imageObj = {
                year: "2021",
                leftregion: "AL",
                leftmodel: "ALL",
                rightregion: "global_det",
                rightmodel: "ABSTK_ERR",
	};


        //Change year based on passed argument, if any
        var passed_year = "";
        if(passed_year!=""){
                if(searchByName(passed_year,years)>=0){
                        imageObj.year = passed_year;
                }
        }

        //Change leftregion based on passed argument, if any
        var passed_leftregion = "";
        if(passed_leftregion!=""){
                if(searchByName(passed_leftregion,leftregions)>=0){
                        imageObj.leftregion = passed_leftregion;
                }
        }

        //Change leftmodel based on passed argument, if any
        var passed_leftmodel = "";
        if(passed_leftmodel!=""){
                if(searchByName(passed_leftmodel,leftmodels)>=0){
                        imageObj.leftmodel = passed_leftmodel;
                }
        }

        //Change rightregion based on passed argument, if any
        var passed_rightregion = "";
        if(passed_rightregion!=""){
                if(searchByName(passed_rightregion,rightregions)>=0){
                        imageObj.rightregion = passed_rightregion;
                }
        }

        //Change rightmodel based on passed argument, if any
        var passed_rightmodel = "";
        if(passed_rightmodel!=""){
                if(searchByName(passed_rightmodel,rightmodels)>=0){
                        imageObj.rightmodel = passed_rightmodel;
                }
        }


	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('year');
        populateMenu('leftregion');	
        populateMenu('leftmodel');
        populateMenu('rightregion'); 
        populateMenu('rightmodel');

        changeLeftregion("AL");
        changeLeftmodel("ALL");
        changeRightregion("global_det");
        changeRightmodel("ABSTK_ERR");
	
	//Preload images and display map
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
