<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8">
<title>QPF vs. QPE</title>
<link rel="stylesheet" type="text/css" href="style_daily.css">
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="functions_daily.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<!-- Head element -->
<div class="page-top">
        <span><a style="color:#ffffff">DAILY QPF vs. QPE COMPARISONS</a></span>
</div>

<!-- Top menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Valid Date (12Z): </span><span class="bold">Year:</span>
                <select id="year" onchange="changeYear(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Month:</span>
                <select id="month" onchange="changeMonth(this.value)"></select>
        </div>
	<div class="element">
		<span class="bold">Day:</span>
		<select id="day" onchange="changeDay(this.value)"></select>
	</div>
</div></div>

<!-- /Top menu -->




<!-- Images menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Left Image:  </span><span class="bold"> Region:</span>
                <select id="leftregion" onchange="changeLeftregion(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Model:</span>
                <select id="leftmodel" onchange="changeLeftmodel(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Forecast Hour:</span>
                <select id="leftfhr" onchange="changeLeftfhr(this.value);"></select>
        </div>
</div></div>
<!-- /Images  menu -->





<!-- Images menu -->
<div class="page-menu"><div class="table">
        <div class="element">
                <span class="bold" style="color:#FF0000">Select Right Image:  </span><span class="bold"> Region:</span>
                <select id="rightregion" onchange="changeRightregion(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Model:</span>
                <select id="rightmodel" onchange="changeRightmodel(this.value);"></select>
        </div>
        <div class="element">
                <span class="bold">Forecast Hour:</span>
                <select id="rightfhr" onchange="changeRightfhr(this.value);"></select>
        </div>
</div></div>
<!-- /Images  menu -->


<!-- Images -->
<div id="page-map">
<table id="tbl-map" style="margin:auto">
     <tbody>
       <tr>
	    <!-- EDITS
		Both of these image elements didn't have a name assigned to them, so I added "map_left" and "map_right" so the script can refer to them.
		--> 
        <td id ="td-map">
           <img name="map_left" src="../latest/model_latest.gif" style="width:100%">
        </td>
        <td id="td-stage-map">
           <img name="map_right" src="../latest/anl_latest.gif" style="width:100%">
        </td>
      </tr>
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

var url = "https://www.emc.ncep.noaa.gov/users/verification/precip/verif/daily/YYY/YYYMMMDDD/XXX.vYYYMMMDDD12.FFFh.RRRgif";
var url_oconus = "https://www.emc.ncep.noaa.gov/users/verification/precip/verif/daily/YYY/YYYMMMDDD.oconus/XXX.vYYYMMMDDD12.FFFh.RRRgif";

//====================================================================================================
//Add years & months
//====================================================================================================

var years = [];
var months = [];
var days = [];
var leftregions = [];
var leftmodels = [];
var leftfhrs = [];
var rightregions = [];
var rightmodels = [];
var rightfhrs = [];



years.push({
        displayName: "2022",
        name: "2022",
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
        displayName: "January",
        name: "01",
});
months.push({
        displayName: "February",
        name: "02",
});
months.push({
        displayName: "March",
        name: "03",
});
months.push({
        displayName: "April",
        name: "04",
});
months.push({
        displayName: "May",
        name: "05",
});
months.push({
        displayName: "June",
        name: "06",
});
months.push({
        displayName: "July",
        name: "07",
});
months.push({
        displayName: "August",
        name: "08",
});
months.push({
        displayName: "September",
        name: "09",
});
months.push({
        displayName: "October",
        name: "10",
});
months.push({
        displayName: "November",
        name: "11",
});
months.push({
        displayName: "December",
        name: "12",
});





days.push({
        displayName: "1",
        name: "01",
});
days.push({
        displayName: "2",
        name: "02",
});
days.push({
        displayName: "3",
        name: "03",
});
days.push({
        displayName: "4",
        name: "04",
});
days.push({
        displayName: "5",
        name: "05",
});
days.push({
        displayName: "6",
        name: "06",
});
days.push({
        displayName: "7",
        name: "07",
});
days.push({
        displayName: "8",
        name: "08",
});
days.push({
        displayName: "9",
        name: "09",
});
days.push({
        displayName: "10",
        name: "10",
});
days.push({
        displayName: "11",
        name: "11",
});
days.push({
        displayName: "12",
        name: "12",
});
days.push({
        displayName: "13",
        name: "13",
});
days.push({
        displayName: "14",
        name: "14",
});
days.push({
        displayName: "15",
        name: "15",
});
days.push({
        displayName: "16",
        name: "16",
});
days.push({
        displayName: "17",
        name: "17",
});
days.push({
        displayName: "18",
        name: "18",
});
days.push({
        displayName: "19",
        name: "19",
});
days.push({
        displayName: "20",
        name: "20",
});
days.push({
        displayName: "21",
        name: "21",
});
days.push({
        displayName: "22",
        name: "22",
});
days.push({
        displayName: "23",
        name: "23",
});
days.push({
        displayName: "24",
        name: "24",
});
days.push({
        displayName: "25",
        name: "25",
});
days.push({
        displayName: "26",
        name: "26",
});
days.push({
        displayName: "27",
        name: "27",
});
days.push({
        displayName: "28",
        name: "28",
});
days.push({
        displayName: "29",
        name: "29",
});
days.push({
        displayName: "30",
        name: "30",
});
days.push({
        displayName: "31",
        name: "31",
});






leftregions.push({
        displayName: "CONUS",
        name: "",
});
leftregions.push({
        displayName: "Alaska",
        name: "AK.",
});
leftregions.push({
        displayName: "Hawaii",
        name: "HI.",
});
leftregions.push({
        displayName: "Puerto Rico",
        name: "PR.",
});


rightregions.push({
        displayName: "CONUS",
        name: "",
});
rightregions.push({
        displayName: "Alaska",
        name: "AK.",
});
rightregions.push({
        displayName: "Hawaii",
        name: "HI.",
});
rightregions.push({
        displayName: "Puerto Rico",
        name: "PR.",
});




CONUS_models = ["conusarw","conusarw2","nssl4arw","cmc","cmcglb","dwd","ecmwf","firewxcs","conusfv3","gec00","gfs","hrrr","jma","fv3lamda","fv3lamdax","medley","metfr","nam","conusnest","ndas","ndassoil","nohrsc","rap","rrfs_a","srfreqm","srmean","qpe"]; 
CONUS_models_name = ["ARW","ARW2","ARW-NSSL","CMC","CMC-Global","DWD","ECMWF","FIRE-WX","FV3-CONUS","GEFS-CTRL","GFS","HRRR","JMA","LAMDA","LAMDAX","MEDLEY","METFR","NAM","NAMNEST","NDAS","NDASSOIL","NOHRSC","RAP","RRFS-A","SRFREQM","SRMEAN","QPE (Verif.)"];
AK_models = ["akarw","akarw2","gfs","hrrrak","nam","aknest","rap","qpe"];
AK_models_name = ["ARW(AK)","ARW2(AK)","GFS","HRRR(AK)","NAM","NAMNEST(AK)","RAP","QPE (Verif.)"];
HI_models = ["hiarw","hiarw2","gfs","nam","hinest","qpe"];
HI_models_name = ["ARW(HI)","ARW2(HI)","GFS","NAM","NAMNEST(HI)","QPE (Verif.)"];
PR_models = ["prarw","prarw2","gfs","nam","prnest","rap","qpe"];
PR_models_name = ["ARW(PR)","ARW2(PR)","GFS","NAM","NAMNEST(PR)","RAP","QPE (Verif.)"];





qpe_fhrs = ["024"];
cmc_fhrs = ["024","036","048"];   //conusarw, conusarw2, conusnmmb
cmcglb_fhrs = ["024","036","048","060","072","084"]; //gec00, jma, metfr
conusnest_fhrs = ["024","030","036","042","048","054","060"];
dwd_fhrs = ["024","036","048","060","072"];
ecmwf_fhrs = ["024","048","072"];
firewxcs_fhrs = ["024","030","036"]; 
fv3lam_fhrs = ["024","036","048","060"];  //fv3lamx, fv3lamda
gfs_fhrs = ["024","030","036","042","048","054","060","066","072","078","084","090","096","102","108","114","120","126","132","138","144","150","156","162","168","174","180"];
gfsv16_fhrs = ["036","060","084","108","132","156","180"];
hrrr_fhrs = ["024","030","036","042","048"];
jma_fhrs = ["024","036","048","060","072","084"];
medley_fhrs = ["024","048"];
nam_fhrs = ["024","030","036","042","048","054","060","066","072","078","084"];
ndas_fhrs = ["024"]; //ndassoil, nohrsc
nssl4arw_fhrs = ["036"];
rap_fhrs = ["027","033","039","045","051"];
srfreqm_fhrs = ["027","033","039","045","051","057","063","069","075","081","087"]; //srmean
akarw_fhrs = ["030","042"]; //akarw2, aknmmb
aknest_fhrs = ["024","030","036","042","048","054","060"];
hrrrak_fhrs = ["024","030","036"];
hiarw_fhrs = ["024","036","048"]; //hiarw2, hinmmb
hinest_fhrs = ["024","030","036","042","048","054","060"];
prarw_fhrs = ["030","042"]; //prarw2, prnmmb
prnest_fhrs = ["024","030","036","042","048","054","060"];
gfsshort_fhrs = ["024","030","036","042","048","054","060"];
namshort_fhrs = ["024","030","036","042","048","054","060"];
rapshort_fhrs = ["027","033","039"];

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
		year: "2022",
		month: "09",
                day: "12",            // Make sure this is an integer: "5" 
                leftregion: "",
                leftmodel: "gfs",
                leftfhr: "024",
                rightregion: "",
                rightmodel: "qpe",
                rightfhr: "024",
	};


        //Change year based on passed argument, if any
        var passed_year = "";
        if(passed_year!=""){
                if(searchByName(passed_year,years)>=0){
                        imageObj.year = passed_year;
                }
        }

        //Change month based on passed argument, if any
        var passed_month = "";
        if(passed_month!=""){
                if(searchByName(passed_month,months)>=0){
                        imageObj.month = passed_month;
                }
        }

        //Change day based on passed argument, if any
        var passed_day = "";
        if(passed_day!=""){
                if(searchByName(passed_day,days)>=0){
                        imageObj.day = passed_day;
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

        //Change leftfhr based on passed argument, if any
        var passed_leftfhr = "";
        if(passed_leftfhr!=""){
                if(searchByName(passed_leftfhr,leftfhrs)>=0){
                        imageObj.leftfhr = passed_leftfhr;
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

        //Change rightfhr based on passed argument, if any
        var passed_rightfhr = "";
        if(passed_rightfhr!=""){
                if(searchByName(passed_rightfhr,rightfhrs)>=0){
                        imageObj.rightfhr = passed_rightfhr;
                }
        }

	//Populate forecast hour and dprog/dt arrays for this run and frame
	populateMenu('year');
	populateMenu('month');
        populateMenu('day');
        populateMenu('leftregion');	
        populateMenu('leftmodel');
        populateMenu('leftfhr');
        populateMenu('rightregion'); 
        populateMenu('rightmodel');
        populateMenu('rightfhr');

        changeMonth(imageObj.month);
        changeLeftregion("");
        changeLeftmodel("gfs");
        changeRightregion("");
        changeRightmodel("qpe");
	
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
