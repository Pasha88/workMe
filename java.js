	function numbersonly(myfield, e, dec){
		var key;
		var keychar;

		if (window.event)
			key = window.event.keyCode;
		else if (e)
			key = e.which;
		else
			return true;
		keychar = String.fromCharCode(key);

		// control keys
		if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
			return true;

			// numbers
		else if ((("0123456789").indexOf(keychar) > -1))
		return true;

		// decimal point jump
		else if (dec && (keychar == ".")){
			myfield.form.elements[dec].focus();
			return false;
		}else
		return false;
	}

	
	function changeColor(){
		document.getElementById("h3style").style.color="red";
		document.getElementById("h3style").firstChild.nodeValue="Move Mouse out of this text to return it back";
		return true;
	}
	
	function changeAgain(){
		document.getElementById("h3style").style.color="gray";
		document.getElementById("h3style").firstChild.nodeValue="Drag mouse over this text to change it";
		return true;
	}
	
	function showPara(){
		document.getElementById("first").style.visibility=(document.formex.firstpara.checked) ? "visible" : "hidden";
		document.getElementById("second").style.visibility=(document.formex.secondpara.checked) ? "visible" : "hidden";
		document.getElementById("third").style.visibility=(document.formex.thirdpara.checked) ? "visible" : "hidden";
		return true;
	}
	
		var mie= (navigator.appName == "Microsoft Internet Explorer") ?true:false; // proveri da li je browse internet explorer
	
	if (!mie){
		document.captureEvents(Event.MOUSEMOVE); // 
		document.captureEvents(Event.MOUSEDOWN);
	}
	
	document.onmousemove = mousePos;
	document.onkeypress = keyPressed;
	document.onmousedown = mouseClicked;
	
	var mouseClick = 0;
	var keyClicked = 0;
	var mouseX = 0;
	var mouseY = 0;
	
	function mousePos(e) {
		if(!mie){
			mouseX = e.pageX;
			mouseY = e.pageY;
		} else {
			
			mouseX = event.clientX + document.body.scrollLeft;// za kretenski Internet explorer
			mouseY = event.clientY + document.body.scrollLeft;// za kretenski Internet explorer

		}
		
		document.formmouse.mousex.value = mouseX;
        document.formmouse.mousey.value = mouseY;
	    return true;
	}
	
	function keyPressed(e) {
		if (mie){
			e= window.event;
			keyClicked = e.keyCode;
		}	else	{
			keyClicked = String.fromCharCode(e.charCode);
		}
		
		if(!keyClicked){
			return false;
		}
		document.formmouse.keypress.value =  keyClicked;
		return true;
	}
	

	
	