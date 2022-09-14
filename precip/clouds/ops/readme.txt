temp_sref/index.html
uwind_sref/index.html
vwind_sref/index.html

.. these index.html files, this line:
<iframe id="body_frame" src="../loops_sref/temp.php" width="1100" height="750" style="border: 1px solid black;"></iframe> 
<iframe id="body_frame" src="../loops_sref/uwind.php" width="1100" height="750" style="border: 1px solid black;"></iframe>
<iframe id="body_frame" src="../loops_sref/vwind.php" width="1100" height="750" style="border: 1px solid black;"></iframe>

and change this line 
 class="current_page_item" in <li   /li>

....

loops_sref/temp.php
loops_sref/uwind.php
loops_sref/vwind.php

.. these *.php files, change one line
var url = "https://www.emc.ncep.noaa.gov/bzhou/verf_sref_gefs_4web/DDD_TLLL_VVV_SSS.png";
var url = "https://www.emc.ncep.noaa.gov/bzhou/verf_sref_gefs_4web/DDD_ULLL_VVV_SSS.png";
var url = "https://www.emc.ncep.noaa.gov/bzhou/verf_sref_gefs_4web/DDD_VLLL_VVV_SSS.png";

and change some menu's contents
e.g. 2m -> 10m
