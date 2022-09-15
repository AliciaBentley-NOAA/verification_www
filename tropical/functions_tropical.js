<!--

/* ============================================================================================================= */
/* Preloading & displaying functions */
/* ============================================================================================================= */

//Populate the dropdown menu with items
function populateMenu(mode){
	if(mode == 'year'){
		var element = document.getElementById("year");
		for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
		
		for(i=0; i<years.length; i++){
			var option = document.createElement("option");
			option.text = years[i].displayName;
			option.value = years[i].name;
			element.add(option);
		}
	}
        else if(mode == 'leftregion'){
                var element = document.getElementById("leftregion"); 
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}
                
                for(i=0; i<leftregions.length; i++){
                        var option = document.createElement("option");
                        option.text = leftregions[i].displayName;
                        option.value = leftregions[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'leftmodel'){
                var element = document.getElementById("leftmodel");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<leftmodels.length; i++){
                        var option = document.createElement("option");
                        option.text = leftmodels[i].displayName;
                        option.value = leftmodels[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'rightregion'){
                var element = document.getElementById("rightregion");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<rightregions.length; i++){
                        var option = document.createElement("option");
                        option.text = rightregions[i].displayName;
                        option.value = rightregions[i].name;
                        element.add(option);
                }
        }
        else if(mode == 'rightmodel'){
                var element = document.getElementById("rightmodel");
                for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

                for(i=0; i<rightmodels.length; i++){
                        var option = document.createElement("option");
                        option.text = rightmodels[i].displayName;
                        option.value = rightmodels[i].name;
                        element.add(option);
                }
        }
}

//Format URL to the requested variables
function getURL(year,basin,stormname,model,err,frame){

        var newurl = url.replace("EEE",err);
	for(var i=0; i<5; i++){
                var newurl = newurl.replace("BBB",basin);
                var newurl = newurl.replace("NNN",stormname);
                var newurl = newurl.replace("MMM",model);
                newurl = newurl.replace("YYY",year);
		newurl = newurl.replace("Z",frame);
	}

	return newurl;
}

//Search for a name within an object
function searchByName(keyname, arr){
    for (var i=0; i < arr.length; i++){
        if (arr[i].name === keyname){
            return i;
        }
    }
	return -1;
}

//Display the current image object
function showImage(){
	
	//Year index
	var idx_var = searchByName(imageObj.year,years);
	
	/*
	TOMER EDITS
	We now have 2 image elements, and each will have a different source. I changed the code below so it calls the "getURL()" function twice;
	first for map_left, and second for map_right. The first call only changes to left_region, and second call to right_region. As you add
	the model and forecast hour to the code, you should add them to the "getURL" calls below and to the "getURL" function above.
	*/
	
	//Display image
	//document.getElementById('loading').style.display = "none";
	var url_main = getURL(imageObj.year,imageObj.leftregion,imageObj.leftmodel,imageObj.rightregion,imageObj.rightmodel,i);
	document.map_main.src = url_main;
	
	//Update dropdown menus
	document.getElementById("year").selectedIndex = searchByName(imageObj.year,years);
        document.getElementById("leftregion").selectedIndex = searchByName(imageObj.leftregion,leftregions);
        document.getElementById("leftmodel").selectedIndex = searchByName(imageObj.leftmodel,leftmodels);
        document.getElementById("rightregion").selectedIndex = searchByName(imageObj.rightregion,rightregions);
        document.getElementById("rightmodel").selectedIndex = searchByName(imageObj.rightmodel,rightmodels);
	
	//Update URL in address bar
	generate_url();
}

//Format integer as a string by number of characters
function formatString(i,val){
	if(val==3){
		if(i<10){return "00"+i;}
		if(i<100){return "0"+i;}
		return i;
	}
}


//Remove sign of loading image
function remove_loading(idx_var,idx_frame){
	check1a = parseInt(idx_var);
	check1b = searchByName(imageObj.year,years);
	check2a = frames.indexOf(parseInt(idx_frame));
	check2b = frames.indexOf(parseInt(imageObj.frame));
	
	//Remove if the image just loaded for the currently displayed image
	if((check1a == check1b) && (check2a == check2b)){
		document.getElementById('loading').style.display = "none";
		document.map.src = years[idx_var].images[imageObj.frame].src;
	}
}

/* ============================================================================================================= */
/* Dropdown menu functions */
/* ============================================================================================================= */

//Change the year from dropdown menu
function changeYear(id){
	imageObj.year = id;
	showImage();
	document.getElementById("year").blur();

        var current_basin = document.getElementById("leftregion").value;
        changeLeftregion(current_basin);
}

// Adds a zero in front of the integer
function NumToString(i){
    if(i < 10){return "0"+String(i);}
    return String(i);
}



//Change the Left Image "Region" from dropdown menu
function changeLeftregion(id){
        imageObj.leftregion = id;
        showImage();
        document.getElementById("leftregion").blur();

        //Get the selected model from the dropdown menu
        var selected_model = document.getElementById("leftmodel").value;
       
        //Clear dropdown menu content
        var element = document.getElementById("leftmodel");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

        var selected_year = document.getElementById("year").value;
        var selected_leftregion = document.getElementById("leftregion").value;
        if( (selected_year=="2021") && (selected_leftregion=="AL") ){
             region_models = AL_2021;
             region_models_name = AL_2021_name;
        }
        else if( (selected_year=="2021") && (selected_leftregion=="EP") ){
             region_models = EP_2021;
             region_models_name = EP_2021_name;
        }
        if( (selected_year=="2020") && (selected_leftregion=="AL") ){
             region_models = AL_2020;
             region_models_name = AL_2020_name;
        }
        else if( (selected_year=="2020") && (selected_leftregion=="EP") ){
             region_models = EP_2020;
             region_models_name = EP_2020_name;
        }

        leftmodels = [];
        for(i=0; i<region_models.length; i++){
        leftmodels.push({
                displayName: region_models_name[i],
                name: region_models[i],
                })
        }

        for(i=0; i<leftmodels.length; i++){
        var option = document.createElement("option");
        option.text = leftmodels[i].displayName;
        option.value = leftmodels[i].name;
        element.add(option);
        }

        // Create list of models for the dropdown menu
        var models_values= [];
        for(i=0; i<element.options.length; i++){
               models_values.push(element.options[i].value); //Take the value from this dropdown menu option and append it to "models_values"
        }

        // Check if selected_model is contained in models
        if(models_values.indexOf(selected_model) != -1){ //if this equals -1, this means selected_fhr isn't in fhrs_values
               var idx = models_values.indexOf(selected_model); //if this doesn't equal -1, this returns the index of selected_fhr in fhrs_values
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}


//Change the Left Image "Model" from dropdown menu
function changeLeftmodel(id){
        imageObj.leftmodel = id;
        showImage();
        document.getElementById("leftmodel").blur();

        var selected_leftregion = document.getElementById("leftregion").value;
        var selected_leftmodel = document.getElementById("leftmodel").value;

        leftfhrs = [];
}







//Change the Right Image "Region" from dropdown menu
function changeRightregion(id){
        imageObj.rightregion = id;
        showImage();
        document.getElementById("rightregion").blur();

        //Get the selected model from the dropdown menu
        var selected_model = document.getElementById("rightmodel").value;

        //Clear dropdown menu content
        var element = document.getElementById("rightmodel");
        for(i = element.options.length - 1 ; i >= 0 ; i--){element.remove(i);}

        var selected_rightregion = document.getElementById("rightregion").value;
        if( (selected_rightregion=="global_det") || (selected_rightregion=="global_ens") || (selected_rightregion=="regional") ){
             region_models = error_types;
             region_models_name = error_types_name;
        }

        rightmodels = [];
        for(i=0; i<region_models.length; i++){
        rightmodels.push({
                displayName: region_models_name[i],
                name: region_models[i],
                })
        }

        for(i=0; i<rightmodels.length; i++){
        var option = document.createElement("option");
        option.text = rightmodels[i].displayName;
        option.value = rightmodels[i].name;
        element.add(option);
        }

        // Create list of models for the dropdown menu
        var models_values= [];
        for(i=0; i<element.options.length; i++){
               models_values.push(element.options[i].value); //Take the value from this dropdown menu option and append it to "models_values"
        }

        // Check if selected model is contained in models
        if(models_values.indexOf(selected_model) != -1){ //if this equals -1, this means selected_fhr isn't in fhrs_values
               var idx = models_values.indexOf(selected_model); //if this doesn't equal -1, this returns the index of selected_fhr in fhrs_values
               element.options[idx].selected = true;
               element.onchange();
        }
        else{
               element.options[0].selected = true;
               element.onchange();
        }
}





//Change the Right Image "Model" from dropdown menu
function changeRightmodel(id){
        imageObj.rightmodel = id;
        showImage();
        document.getElementById("rightmodel").blur();

        var selected_rightregion = document.getElementById("rightregion").value;
        var selected_rightmodel = document.getElementById("rightmodel").value;

}


/* ============================================================================================================= */
/* Additional functions */
/* ============================================================================================================= */

//Update the URL in the address bar by the current month and year
function generate_url(){
	
//	var url = window.location.href.split('?')[0] + "?";
//	var append = "";

	//Add year
//	append += "&year=" + imageObj.year;

        //Add basin
//        append += "&basin=" + imageObj.leftregion;
        
        //Add name
//        append += "&name=" + imageObj.leftmodel;

        //Add model
//        append += "&model=" + imageObj.rightregion;
	
        //Add error
//        append += "&error=" + imageObj.rightmodel;

	//Get new URL
//	var total = url + append;
	
	//Update in address bar without reloading page
//	var pagename = window.location.href.split('/');
//	pagename = pagename[pagename.length-1];
//	pagename = pagename.split(".php")[0];
//	var stateObj = { foo: "bar" };
//	history.replaceState(stateObj, "", pagename+".php?"+append);

//	return total;
}

function updateMobile(){
	if( navigator.userAgent.match(/Android/i)
	|| navigator.userAgent.match(/webOS/i)
	|| navigator.userAgent.match(/iPhone/i)
	|| navigator.userAgent.match(/iPod/i)
	//|| navigator.userAgent.match(/iPad/i)
	|| navigator.userAgent.match(/BlackBerry/i)
	|| navigator.userAgent.match(/Windows Phone/i)
	){
//		document.getElementById('page-middle').innerHTML = "Swipe Up/Down = Change year | Swipe Left/Right = Change valid time";
	}

};

-->
