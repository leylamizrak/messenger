<html>
<head>
  <title>Messenger</title>
  	<meta charset="UTF-8">
  <!-- <meta http-equiv="refresh" content="15">-->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
	img{ border:2px solid #999; -webkit-border-radius:8px; -moz-border-radius:8px; border-radius:8px;}
</style>
</head>
<body>

  <button type="button" style="width:125;height:35px;position:absolute;margin-left:1300px;top:5px;" id="yonlendir" class="btn btn-warning">Oturumu Kapat</button>


<!--<button style="width:125;height:25px;position:absolute;margin-left:1300px;top:5px;" type="button" id="yonlendir">Oturumu Kapat</button>-->

<script type="text/javascript">
 document.getElementById("yonlendir").onclick = function () {
        location.href = "oturumukapat.php";
    };
</script>




<div class="container">
  <div  id="durum" style="width:600px;height:550px;margin-right:auto;margin-left:auto;margin-top:85px;">

	</div>

</div>



<script>

guncellefonk();


function guncellefonk() {
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            	var response = xmlhttp.responseText;
				
			}
			
        };

        xmlhttp.open("GET", "guncelle.php", true);
        xmlhttp.send();
		
        
    
}



function ajaxfonk() {

          var xmlhttp2 = new XMLHttpRequest();
        xmlhttp2.onreadystatechange = function() {

            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {

            	var response = xmlhttp2.responseText;
				var fields = response.split('-');
				

			var ilk = fields[0];
			var ikinci=fields[1];	
				
            if (ilk=="1")
            {
				//alert("konusan var");
				var site="uyari.php?a="+ikinci;
				    window.location =site;
					
			}
		

			}
        };

        xmlhttp2.open("GET", "ajax.php", true);
        xmlhttp2.send();
    
}


function mesajfonk() {
		
		
		var xmlhttp3 = new XMLHttpRequest();
        xmlhttp3.onreadystatechange = function() {

            if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {

            	var response = xmlhttp3.responseText;
				
				 var fields = response.split('-');
		
			var ilk = fields[0];
			var ikinci=fields[1];
			var ucuncu=fields[2];
			
			if(ilk=="1")
			{
				var url="mesajlasma.php?b="+ikinci+"&nick="+ucuncu;
				window.open(url);

			}
			}
        };

        xmlhttp3.open("GET", "sonuc.php", true);
        xmlhttp3.send();
		
        
    
	
	
	
}


function kontrol() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

            	var response = this.responseText;
				var fields = response.split('*');
var sil = document.getElementById("durum");
    while (sil.hasChildNodes()) {
        sil.removeChild(sil.firstChild);
    }
				for (var i = 0; i < fields.length-2; i+=3) {
				      if(fields[i+2]=="online")
					  {
				
				var res = fields[i+1].replace(/\./g, "_");
				res=res.replace(/:/g, "_");
				res=res+".jpg";
						  
						  
				var h = document.createElement("pre");
				var kalin= document.createElement("b");
				var kalin2= document.createElement("b");
				var resim = document.createElement("img");
				resim.src="avatar/"+res;
				resim.style.width="50px";
				resim.style.height="50px";

				
				h.appendChild(resim);

				var t = document.createTextNode("   "+fields[i]+"    ");
				
	 			kalin.appendChild(t);
				var on = document.createTextNode(fields[i+2]+"      ");			
				kalin2.appendChild(on);
				
				kalin2.style.color="green";
				kalin2.style.fontSize="15px";
				kalin.style.fontSize="18px";
				h.appendChild(kalin);  
				h.appendChild(kalin2);  

				
				myButton = document.createElement("input");
				myButton.name = fields[i+1];
				myButton.type = "button";
				myButton.value ="konus";
				myButton.className="btn btn-info";
				h.appendChild(myButton);  
				
    				placeHolder = document.getElementById("durum");
					placeHolder.appendChild(h);
						  
						  
						  

myButton.onclick = function() {

var name = this.getAttribute("name");



  var ekle = new XMLHttpRequest();
        ekle.onreadystatechange = function() {

            if (ekle.readyState == 4 && ekle.status == 200) {

                document.getElementById("txtHint").innerHTML = ekle.responseText;
            	var response = ekle.responseText;
				
				

			}
        };

        ekle.open("GET", "kayitEkle.php?konusma="+name, true);
        ekle.send();


}
						  
						  
					  }
					  
					  else { 
					  var res = fields[i+1].replace(/\./g, "_");
				res=res.replace(/:/g, "_");
				res=res+".jpg";
				var h = document.createElement("pre");
				var kalin= document.createElement("b");
				var kalin2= document.createElement("b");
				var resim = document.createElement("img");
				resim.src="avatar/"+res;
				resim.style.width="50px";
				resim.style.height="50px";

				
				h.appendChild(resim);
				var t = document.createTextNode("   "+fields[i]+"    ");
				
	 			kalin.appendChild(t);
				var on = document.createTextNode(fields[i+2]+"      ");			
				kalin2.appendChild(on);
				
				kalin2.style.color="red";
				kalin2.style.fontSize="15px";
				kalin.style.fontSize="18px";
				h.appendChild(kalin);  
				h.appendChild(kalin2);  

				
		
    				placeHolder = document.getElementById("durum");
					placeHolder.appendChild(h);
					  }
				}
             
				
			}
			
        };

        xmlhttp.open("GET", "onoff.php", true);
        xmlhttp.send();
    
}


kontrol();




setInterval(function() {guncellefonk();mesajfonk();},1000); 
setInterval(function() {ajaxfonk();},1000); 
setInterval(function() {kontrol();},15000); 


</script>

</body>
</html>