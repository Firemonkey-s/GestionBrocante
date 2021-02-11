///-----------------------------------------------------------------
///   Namespace:      <Class Namespace>
///   Class:          <Class Name>
///   Description:    <Description>
///   Author:         Klumpp Gilles                 Date: 09/02/2021
///   Notes:          <Notes>
///   Revision History:
///   Name:           Date:        Description:
///-----------------------------------------------------------------




//variables globales

var agrand = false;
var reduct = false;

$(document).ready(function(){
	
	
	var poscursor = document.getElementById('poscursor');
					document.addEventListener('mousemove',function(e){
				
				var x=e.clientX-320;
				var y=e.clientY-80;
				
				poscursor.innerHTML = 'EcranX(pix) : ' + x + '  EcranY(pix) : '+ y;},false);
				
				
				//var pressedkey = document.getElementById('presstouch');
				
				document.addEventListener('keypress',function(e){
				
				//pressedkey.innerHTML = 'key :' + e.key;
				
				
				if(e.key == "u") view_up();
				
				if(e.key == "d") view_down();
				
				if(e.key == "r") view_right();
				
				if(e.key == "l") view_left();
			
				},false);
				
				$('#kirch_svg').attr('width',"1024px");
				$('#kirch_svg').attr('height',"826px");
				
				 $('#maintitle').css('color','blue');			 
				 $('<hr>').prependTo($('h2'));
				 
				 
			
				//implémenter l'événement.
				var elem = document.getElementById('kirch_svg');				
				elem.setAttribute("viewBox","0 0 1024 826");	
				
				var myImg = document.getElementById("kirch_svg");
				myImg.onmousedown = GetCoordinates; 

				 
				 });
				 
				 
	function FindPosition()
	{ return [320,80];}
	
	function AddPlaceToMap(posx,posy)
	{

		wrect = 10;
		hrect = 10;

		var center_x = posx - wrect;
		var center_y = posy - hrect;

		var tmp_rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
		var tmp_circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");

		rayon = 2;

		tmp_circle.setAttribute("cx",posx.toString());
		tmp_circle.setAttribute("cy",posy.toString());
		tmp_circle.setAttribute("r",rayon.toString());

		tmp_circle.setAttribute("stroke","red");
		tmp_circle.setAttribute("fill","red");

		tmp_rect.setAttribute("x",center_x.toString());
		tmp_rect.setAttribute("y",center_y.toString());

		tmp_rect.setAttribute("height","20");
		tmp_rect.setAttribute("width","20");

		var color="darkgreen";

		var style_val = "fill:none;stroke:"+color+";stroke-width:2px;stroke-linejoin:round;";
		tmp_rect.setAttribute("style",style_val);

		document.getElementById ('kirch_svg'). appendChild ( tmp_circle );
		document.getElementById ('kirch_svg'). appendChild ( tmp_rect );
	}

	function GetCoordinates(e)
	{
		var PosX = 0;
		var PosY = 0;
 
		var curX = 0;
		var curY = 0;
 
		var ImgPos;
		ImgPos = FindPosition();
		if (!e) var e = window.event;
			if (e.pageX || e.pageY)
			{
				curX = e.pageX;
				curY = e.pageY;
			}
			else if (e.clientX || e.clientY)
			{
				curX = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
				curY = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
			}
 
		curX = curX - ImgPos[0];
		curY = curY - ImgPos[1];
 
		dims = get_pix();

		//alert("w: "+dims[0]+", h:"+dims[1]);


		if(agrand==true){
			PosX = (1024/dims[0])*curX;
			PosY = (826/dims[1])*curY;
		}

		else if(reduct==true){
			PosX = (1024/dims[0])*curX;
			PosY = (826/dims[1])*curY;
		}

		else{
			PosX = curX;
			PosY = curY;
		}

		PosX = Math.floor(PosX);
		PosY = Math.floor(PosY);
 
		//document.getElementById("x1").innerHTML = PosX;
		//document.getElementById("y1").innerHTML = PosY;

		AddPlaceToMap(PosX,PosY);
	}


	function regex_px(w_old,h_old)
	{
		var w,h=0;

		if(/^([0-9]+)px$/.test(w_old)){
			w= RegExp.$1;
		}
		else alert('X Non reconnu');

		if(/^([0-9]+)px$/.test(h_old)){
			h= RegExp.$1;
		}
		else alert('Y Non reconnu');

	return [w,h];
	}

	function get_pix()
	{
		var elem = document.getElementById('kirch_svg');

		var w_old=elem.getAttribute("width");
		var h_old=elem.getAttribute("height");

		//regex
		var values=regex_px(w_old,h_old);
		var dims = [values[0],values[1]];

		return dims;
	}
	
	function set_pix(w,h)
	{
		document.getElementById('pres_x').innerHTML=w.toString();
		document.getElementById('pres_y').innerHTML=h.toString();
	}
	
/////////////////////////////////////////////////////////////////
//Views Box

	function view_down()
	{
		var event = new Event('vue_bas');
		elem = document.getElementById('kirch_svg');

		elem.addEventListener('vue_bas', function (e){

		var myview = elem.getAttribute("viewBox");
		var params = myview.split(" ");
		var y = parseInt(params[1]);
		y += 5;

		params[1] = y.toString();

		elem.setAttribute("viewBox",params.join(" "));

	},false);

		//distribuer l'événement.
		elem.dispatchEvent(event);

	}
	
	
	function view_up()
	{
		var event = new Event('vue_haut');
		elem = document.getElementById('kirch_svg');

		elem.addEventListener('vue_haut', function (e){

		var myview = elem.getAttribute("viewBox");
		var params = myview.split(" ");
		var y = parseInt(params[1]);
		y -= 5;

		params[1] = y.toString();

		elem.setAttribute("viewBox",params.join(" "));

	},false);

		//distribuer l'événement.
		elem.dispatchEvent(event);

	}
	
	function view_right()
	{
		var event = new Event('vue_droite');
		elem = document.getElementById('kirch_svg');

		elem.addEventListener('vue_droite', function (e){

		var myview = elem.getAttribute("viewBox");
		var params = myview.split(" ");
		var x = parseInt(params[0]);
		x += 5;

		params[0] = x.toString();

		elem.setAttribute("viewBox",params.join(" "));

	},false);

		//distribuer l'événement.
		elem.dispatchEvent(event);

	}
	
	function view_left()
	{
		var event = new Event('vue_gauche');
		elem = document.getElementById('kirch_svg');

		elem.addEventListener('vue_gauche', function (e){

		var myview = elem.getAttribute("viewBox");
		var params = myview.split(" ");
		var x = parseInt(params[0]);
		x -= 5;

		params[0] = x.toString();

		elem.setAttribute("viewBox",params.join(" "));

	},false);

		//distribuer l'événement.
		elem.dispatchEvent(event);
	}


////////////////////////////////////////////////////////
//ZOOM

	function update_plus(_w,_h)
	{
		//alert("zoom+");
		
		var values=regex_px(_w,_h);
		var facteur = 0.02;

		var dims = [parseInt(values[0]),parseInt(values[1])];

		dims[0] = dims[0]*(1 + facteur);
		dims[1] = dims[1]*(1 + facteur);

		var result=[Math.floor(dims[0]),Math.floor(dims[1])];

		return result;

	}
	
	function update_moins(_w,_h)
	{
		var values=regex_px(_w,_h);
		var facteur = 0.02;

		var dims = [parseInt(values[0]),parseInt(values[1])];

		dims[0] = dims[0]/(1 + facteur);
		dims[1] = dims[1]/(1 + facteur);

		var result=[Math.floor(dims[0]),Math.floor(dims[1])];

		return result;
	}





	function zoom_moins()
	{
		var event = new Event('zoom_moins');
		var	elem = document.getElementById('kirch_svg');

		elem.addEventListener('zoom_moins', function (e) 
		{
			var w_old=elem.getAttribute("width");
			var h_old=elem.getAttribute("height");

			var sortie=update_moins(w_old,h_old);

			elem.setAttribute("width",sortie[0].toString()+'px');
			elem.setAttribute("height",sortie[1].toString()+'px');

			reduct=true;
			agrand=false;

			get_pix();

		}, false);

		//distribuer l'événement.
		elem.dispatchEvent(event);
	}

	function zoom_plus()
	{
	
		var event = new Event('zoom_plus');
		var elem = document.getElementById('kirch_svg');

		elem.addEventListener('zoom_plus', function (e) 
		{
			var w_old=elem.getAttribute("width");
			var h_old=elem.getAttribute("height");

			var sortie=update_plus(w_old,h_old);

			elem.setAttribute("width",sortie[0].toString()+'px');
			elem.setAttribute("height",sortie[1].toString()+'px');

			agrand = true;
			reduct = false;

			get_pix();
				}, false);

		//distribuer l'événement.
		elem.dispatchEvent(event);
	}





	
	
	
	
	
	

	
	
	
	
	
	





		 
				 
				 
				 
				 


				
				
				
				
				