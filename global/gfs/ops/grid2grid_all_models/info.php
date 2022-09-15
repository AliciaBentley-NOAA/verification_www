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
<li>
Regular and anomalous partial sums are computed for each model (see <a href="https://met.readthedocs.io/en/latest/Users_Guide/appendixC.html#partial-sums-lines-sl1l2-sal1l2-vl1l2-val1l2" target="_blank">here</a>). Each model's forecasts are verified using its own analysis as truth. All data are regridded using bilinear interpolation, if needed, to the <a href=http://www.nco.ncep.noaa.gov/pmb/docs/on388/grids/grid002.gif target="_blank">G002</a> (2.5x2.5 degree) grid. A 40-year (1959-1998) climatology of the NCEP/NCAR reanalysis is used for computing anomalous partial sums.
</li>
<br>
<li>
Verification statistics are computed from the regular and anomalous partial sums. The equations used to calculate the verification statistics can be found <a href="https://www.emc.ncep.noaa.gov/users/verification/global/gfs/doc/RMSE_decomposition.pdf" target="_blank">here</a>. Statistical signifance is calculated using a student-t test.
</li>
<br>
<li>
The wave breakdown for heights is done using Fourier Decomposition.
</li>
<br>
<li>
The NWP models evaluated are:
                     <a href=http://www.emc.ncep.noaa.gov/index.php?branch=GFS target="_blank">GFS</a>: U.S. NCEP Global Forecast System,
                     <a href=http://www.usno.navy.mil/FNMOC target="_blank">FNO</a>: U.S. Navy Fleet Numerical Meteorology and Oceanography Center, 
                     <a href=https://www.ecmwf.int/ target="_blank">ECM</a>: European Center for Medium-Range Weather Forecasts,
                     <a href=https://www.metoffice.gov.uk/ target="_blank">UKM</a>: United Kingdom Met Office,
                     <a href=https://weather.gc.ca/" target="_blank">CMC</a>: Canadian Meteorological Center,
                     <a href=http://www.jma.go.jp/jma/indexe.html target="_blank">JMA</a>: Japan Meteorological Agency, and
                     <a href=http://journals.ametsoc.org/doi/pdf/10.1175/2010BAMS3001.1 target="_blank">CFSR</a>: Legacy GFS used for Climate Forecast System Reanalysis, and
                     <a href=https://www.ncmrwf.gov.in target="_blank">NCMRWF/IMD</a>: National Centre for Medium Range Weather Forecasting/Indian Meteorological Department.
</li>
<br>
<li>The verification regions used are:
                     <a href="../images/vx_masks/G002.png" target="_blank">Global</a>,
                     <a href="../images/vx_masks/NHX.png" target="_blank">N. Hemisphere</a>: 20N-80N,
                     <a href="../images/vx_masks/SHX.png" target="_blank">S. Hemisphere</a>: 20S-80S,
                     <a href="../images/vx_masks/TRO.png" target="_blank">Tropics</a>: 20S-20N, and
                     <a href="../images/vx_masks/PNA.png" target="_blank">PNA</a>: 180E-320E, 20N-75N.
</li>
</body>
</html>
