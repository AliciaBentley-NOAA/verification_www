<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="../main.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../../style/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://d3js.org/d3.v4.min.js"></script>
</head>


<body>
<div id="pageTitle">
Create Graphics with METviewer and METexpress
</div>
<div class="page-menu"><div class="table">
</div></div>
<!-- Middle menu -->
<div class="page-middle" id="page-middle">
METviewer: <a href="https://metviewer.nws.noaa.gov" target="_blank">https://metviewer.nws.noaa.gov</a> (NOAA only)
<br>METexpress: <a href="https://metexpress.nws.noaa.gov" target="_blank">https://metexpress.nws.noaa.gov</a> (public)
<!-- /Middle menu -->
</div>
<div id="pageContents"  style="left: 0px; padding-top: 10px;">
<br>
<center>
<font size="5.5"><b><u>About</u></b></font>
<br><a href="https://metviewer.nws.noaa.gov" target="_blank">METviewer</a> and <a href="https://metexpress.nws.noaa.gov" target="_blank">METexpress</a> are two components of <a href="https://dtcenter.github.io/METplus/" target="_blank">METplus</a>. Both function as a web-based database and display system. METexpress is composed of various apps of pre-defined queries and is intended to be used for a quick analysis, while METviewer allows users to query the data based on their needs and is intended for a deeper analysis. Both run on Amazon Web Services and are made possible through a group effort by <a href="https://www.dtcenter.org" target="_blank">DTC</a>, <a href="https://emc.ncep.noaa.gov" target="_blank">EMC</a>, <a href="https://www.esrl.noaa.gov/gsd" target="_blank">GSL</a>, and <a href="https://vlab.ncep.noaa.gov/web/mdl/about-mdl" target="_blank">MDL</a>. <br>METviewer is only available to NOAA employees (please e-mail Perry.Shafran@noaa.gov for the username and password), while METexpress is open to the public.
<br><br><font size="5.5"><b><u>Databases</u></b></font>
<br>These instances of METviewer and METexpress share access to the same databases. EMC maintains theses databases. Information for the various databases can be found <a href="https://docs.google.com/spreadsheets/d/1Vk_uAxW12tlcKOfMq8SIaCYRFY0t4rc8sRNMf1Gy06M/edit#gid=1554492875" target="_blank">here</a>. The databases related specifically to the data used for the graphics produced on this website are:
<font size="3">
<br><br><u>Operational GFS</u><br>Group: NOAA NCEP, Databases: mv_gfs_grid2grid_metplus, mv_gfs_grid2obs_metplus, mv_gfs_precip_metplus
<br><br><u>GFS version 16 (prior to 2021 March 22)</u><br> Group: NOAA NCEP, Databases: mv_gfsv16_grid2grid_metplus, mv_gfsv16_grid2obs_metplus, mv_gfsv16_precip_metplus
</font>
<br><br><font size="5.5"><b><u>METviewer: Quick Tutorial for GFS Graphics</u></b></font>
<br>METviewer uses XML files to query the databases and for specifications for plotting. Below users can download the XMLs that reproduce some of graphics from this site. Users can upload these XMLs to METviewer by clicking the "Load XML" button in the upper right hand corner, and then "Generate Plot" in the upper center. Hopefully these XMLs serve as a good starting point for users new to METviewer. For issues or questions about METviewer, users can send an email to met-help@ucar.edu.
<br><br><a href="metviewer_xmls/grid2grid_gfs_acc_HGT500hPa_NH_day5_valid00Z.xml" download>Grid-to-Grid - Anomaly Correlation Coefficient - 500hPa Geopotential Height - Northern Hemisphere - Day 5 - Valid 00Z</a>
<br><br><a href="metviewer_xmls/grid2grid_gfs_acc_HGT500hPa_NH_fhrmean_valid00Z.xml" download>Grid-to-Grid - Anomaly Correlation Coefficient - 500hPa Geopotential Height - Northern Hemisphere - Forecast Hour Mean (Dieoff) - Valid 00Z</a>
<br><br><a href="metviewer_xmls/grid2obs_gfs_bias_TMP850hPa_NH_day3_init00Z.xml" download>Grid-to-Obs - Bias - 850hPa Temperature - Northern Hemisphere - Day 3 - Init 00Z</a>
<br><br><a href="metviewer_xmls/grid2obs_gfs_bias_TMP2m_EAST_fhrmean_init00Z.xml" download>Grid-to-Obs - Bias - 2 meter Temperature - Eastern US - Forecast Hour Mean - Init 00Z</a>
<br><br><font size="5.5"><b><u>METexpress: Quick Tutorial for GFS Graphics</u></b></font>
<br>Each METexpress app is designed and set up for specific types of verification plots making it simpler and more intuitive for users. Each has various types of plots, like time series or dieoffs. The plots created are interactive, for example users can hover over points to see information. Images can also be saved as a pdf or png. For isues or questions about METexpress, users can send an email to mats.gsl@noaa.gov.
<br><br><u>MET Surface App</u>
<br>The MET surface app can produce various types of plots, but for the settings below are for an example using the "TimeSeries" plot.
<br><br>Label: gfs
<br>Group: NOAA NCEP
<br>Database: mv_gfs_grid2obs_metplus
<br>Data-Source: gfs
<br>Region: EAST
<br>Statistic: ME (Additive bias)
<br>Variable: TMP
<br>Forecast Lead Time: 72
<br>Valid UTC Hour: 0
<br>Average: None
<br>Ground Level: Z2
<br>Description: NA
<br><br>Once the desired settings are selected, click the green "Add Curve" button. This will create a curve information box at the top of the page. Here the color curve can be changed, and there are buttons for removing or editing the curve. Various curves can be added to a single plot.
<br><br>When all desired curves are added, scroll to the bottom of the page to select the desired dates to plot. Then beneth the boxes for the plot curves, click the green "Plot Unmatched" button (no event equalization) or "Plot Matched" button (event equalization). In the upper left, a loading icon should appear. Once the plot is created a new page will load with your plot. To save you plot, click the "Preview" button.
<br><br>Additional documentation on METexpress can be found by downloading the <a href="METexpress_Users_Guide.docx" download>METexpress User's Guide</a>.
</center>
</div>
</body>
</html>
