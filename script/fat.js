// @name      The Fade Anything Technique
// @namespace http://www.axentric.com/aside/fat/
// @version   1.0-RC1
// @author    Adam Michela
// @author    Kate Rhodes (made it work correctly in Safari)
/* 

How to use: Simple
Include the FAT script in your page like so:

<script type="text/javascript" src="http://www.axentric.com/aside/fat/fat.js"></script>
Choose the element, such as a paragraph, you would like to spotlight and give it a class of "fade":

<p id="paragraph1" class="fade">Watch me fade</p>
Voila! You're done. The paragraph will fade from the default color of yellow (#FFFF33) to whatever it's native background color is.

How to use: Advanced
Change the default fade from color:

<p id="paragraph1" class="fade-0066FF">Watch me fade from Blue (#0066FF)</p>
Fade an element after the page load from a script (such as after an Ajax transaction):

Fat.fade_element("paragraph1")
The Fat.fade_element() function accepts several arguments: 
	Target ID, Frames Per Second, Fade Duration, Fade Color, Final Color.

For example, if you wanted to fade paragraph1 from red to 
green at 60 frames per second for 10 seconds:

Fat.fade_element("paragraph1", 60, 10000, "#FF0000", "#00CC00")
Please note, the ID of the element is a required argument. As such all 
elements that you wish to fade (even by class) must have some unique ID. The ID can be anything.

*/

var Fat = {
	make_hex : function (r,g,b) 
	{
		r = r.toString(16); if (r.length == 1) r = '0' + r;
		g = g.toString(16); if (g.length == 1) g = '0' + g;
		b = b.toString(16); if (b.length == 1) b = '0' + b;
		return "#" + r + g + b;
	},
	fade_all : function ()
	{
		var a = document.getElementsByTagName("*");
		for (var i = 0; i < a.length; i++) 
		{
			var o = a[i];
			var r = /fade-?(\w{3,6})?/.exec(o.className);
			if (r)
			{
				if (!r[1]) r[1] = "";
				if (o.id) Fat.fade_element(o.id,null,null,"#"+r[1]);
			}
		}
	},
	fade_element : function (id, fps, duration, from, to) 
	{
		if (!fps) fps = 30;
		if (!duration) duration = 3000;
		if (!from || from=="#") from = "#FFFF33";
		if (!to) to = this.get_bgcolor(id);
		
		var frames = Math.round(fps * (duration / 1000));
		var interval = duration / frames;
		var delay = interval;
		var frame = 0;
		
		if (from.length < 7) from += from.substr(1,3);
		if (to.length < 7) to += to.substr(1,3);
		
		var rf = parseInt(from.substr(1,2),16);
		var gf = parseInt(from.substr(3,2),16);
		var bf = parseInt(from.substr(5,2),16);
		var rt = parseInt(to.substr(1,2),16);
		var gt = parseInt(to.substr(3,2),16);
		var bt = parseInt(to.substr(5,2),16);
		
		var r,g,b,h;
		while (frame < frames)
		{
			r = Math.floor(rf * ((frames-frame)/frames) + rt * (frame/frames));
			g = Math.floor(gf * ((frames-frame)/frames) + gt * (frame/frames));
			b = Math.floor(bf * ((frames-frame)/frames) + bt * (frame/frames));
			h = this.make_hex(r,g,b);
		
			setTimeout("Fat.set_bgcolor('"+id+"','"+h+"')", delay);

			frame++;
			delay = interval * frame; 
		}
		setTimeout("Fat.set_bgcolor('"+id+"','"+to+"')", delay);
	},
	set_bgcolor : function (id, c)
	{
		var o = document.getElementById(id);
		o.style.backgroundColor = c;
	},
	get_bgcolor : function (id)
	{
		var o = document.getElementById(id);
		while(o)
		{
			var c;
			/*if (window.getComputedStyle) {
				c = window.getComputedStyle(o,null).getPropertyValue("background-color");
				alert("computed style: " + c)
			} */
			var got_style = getStyle(o);
			if(got_style != null && ! got_style.match(/rgba\s*\(0\s*,\s*0\s*,\s*0\s*,\s*0\)/)){
				
				c = got_style;
			}
			
			if (o.currentStyle) {
				c = o.currentStyle.backgroundColor; 
			} 
			if ((c != "" && c != "transparent" && !(c===undefined)) || o.tagName == "BODY") { 
				//alert("breaking: " + c);
				break; 
			}
			o = o.parentNode;
		}
		if (c == undefined || c == "" || c == "transparent") {
			c = "#FFFFFF";
		}
		var rgb = c.match(/rgb\s*\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)/);
		
		if (rgb) {
			c = this.make_hex(parseInt(rgb[1]),parseInt(rgb[2]),parseInt(rgb[3]));
		} else {
			var rgba = c.match(/rgba\s*\((\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\)/);
			if (rgba){
				c = this.make_hex(parseInt(rgba[1]),parseInt(rgba[2]),parseInt(rgba[3]));
			}
		}
		return c;
	}
	
	
}

function getStyle(el) {
	if(el.currentStyle){
		return el.currentStyle.backgroundColor;
	}
	if(document.defaultView){
		return document.defaultView.getComputedStyle(el, '').getPropertyValue("background-color");
	}
	return null;
}

window.onload = function () 
	{
		Fat.fade_all();
	}