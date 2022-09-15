<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="../main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
<div id="pageTitle">
Long Term Statistics: Annual Means
</div>
<div class="page-menu"><div class="table">
</div></div>

<!-- Middle menu -->
<div class="page-middle" id="page-middle">
For information on long term statistics verification, <button class="infobutton" id="myBtn">click here</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    Long Term Statistics Verification Information
    <iframe width=100% height=90%  src="../monthly_long_term/main.php" style="border:none;"></iframe>
  </div>
</div>
<!-- /Middle menu -->
</div>


<!-- Image
<div id="page-map">
        <image name="map" style="width:100%">
</div>-->

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
</script>

<div id="pageContents"  style="left: 0px; padding-top: 10px;">
<center>
<div style="position:absolute;text-align:center;color:rgba(255,255,255,1);background-color:#112e51;top:5px;left:250px;padding:0px;width:600px;height:30px;font-size:1em;font-weight:700;border-radius:12px;border-style:solid;border-color:#112e51;">Operational GFS Useful Forecast Day</div>
<br><img src="images/annual_useful_fcst_days_acc06_gfs_valid00Z_HGT_P500_G002NHX.png" width="800" height="400">
<br>
<div style="position:absolute;text-align:center;color:rgba(255,255,255,1);background-color:#112e51;top:430px;left:250px;padding:0px;width:600px;height:30px;font-size:1em;font-weight:700;border-radius:12px;border-style:solid;border-color:#112e51;">Operational Global Models</div>
<br><img src="images/annual_all_models_acc_valid00Z_HGT_P500_fday5_G002NHX.png" width="800" height="400">
<br><img src="images/annual_all_models_acc_valid00Z_HGT_P500_fday5_G002SHX.png" width="800" height="400">
<br>
<div style="position:absolute;text-align:center;color:rgba(255,255,255,1);background-color:#112e51;top:1250px;left:250px;padding:0px;width:600px;height:30px;font-size:1em;font-weight:700;border-radius:12px;border-style:solid;border-color:#112e51;">Operational GFS vs. ECM</div>
<br><img src="images/annual_gfs_ecm_acc_valid00Z_HGT_P500_fday5_G002NHX.png" width="800" height="400">
<br><img src="images/annual_gfs_ecm_acc_valid00Z_HGT_P500_fday5_G002SHX.png" width="800" height="400">
<br>
<div style="position:absolute;text-align:center;color:rgba(255,255,255,1);background-color:#112e51;top:2090px;left:250px;padding:0px;width:600px;height:30px;font-size:1em;font-weight:700;border-radius:12px;border-style:solid;border-color:#112e51;">Operational GFS vs. CDAS</div>
<br><img src="images/annual_gfs_cdas_acc_valid00Z_HGT_P500_fday5_G002NHX.png" width="800" height="400">
<br><img src="images/annual_gfs_cdas_acc_valid00Z_HGT_P500_fday5_G002SHX.png" width="800" height="400">
</center>
</div>
 
</body>
</html>
