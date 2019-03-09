<!DOCTYPE html>
<html lang="en">
<head>

  <title>Messenger</title>
    	<meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=0.75">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
	img{ border:2px solid #999; -webkit-border-radius:8px; -moz-border-radius:8px; border-radius:8px;}
</style>
</head>
<body>



<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

	 
<div id="parent-dv">
	<textarea placeholder="Mesajınız:" id="deneme" style="width:400px; height:auto;"></textarea>
	<input type="Submit" id="inputsubmit">
	</br>
	<div id="nick-alan">
	
	
	</div>
	</div>
	
	
  </div>
</nav>




<div id="d" style="width:400px;height:550px;margin-right:auto;margin-left:auto;margin-top:85px;">

	</div>

	<?php
	
	$degisken=$_REQUEST["b"];
	$karsinick=$_REQUEST["nick"];
	

	//echo $degisken;
	?>
	
	<?php $k_ip=get_client_ip_env();


function get_client_ip_env() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';

	return $ipaddress;
}


	?>
 
 <script>
 	 var nck="<?php echo $karsinick; ?>";
	alert(nck);
	
	placeHolder = document.getElementById("nick-alan");
	placeHolder.style.color="lightblue";
	var baslik= document.createElement("b");
var t = document.createTextNode(" "+nck+" ile konusuyorsunuz");
baslik.appendChild(t);
 placeHolder.appendChild(baslik);
	
 var bilgi;
 var deneme;
 
 $(document).ready(function(){
$('#inputsubmit').on('click',function(event)
	{

	 bilgi="<?php echo $degisken; ?>";
	 var karsi="<?php echo $k_ip; ?>";
	var res = karsi.replace(/\./g, "_");
				res=res.replace(/:/g, "_");
				res=res+".jpg";

				
var $inpute2xt = $("#parent-dv").find('textarea').val();
$('#d').append(" <pre style=\"text-align:left;background-color:#ffbf00;\"><img src=avatar/"+res+" height=\"50\" width=\"50\">"+"<b>   "+$inpute2xt+"</b>"+"</pre>");//.addClass("newp").append();

document.getElementById('deneme').value = "";
 deneme=$inpute2xt;
 

  $.ajax({
    type: "POST",
    url: 'deneme.php',
    data: {"ip_bilgisi":bilgi,
		   "mesaj_bilgisi":deneme},
    success: function(data){
		//alert("kayit oldu");
		 // alert(".ditti"+data+".");
        //alert(deneme);//This will alert Success which is sent as the response to the ajax from the server
    }
 });
		
	});
	}
	);
	
	
	setInterval(function showHint() {

		
	//alert(bilgi);
		 bilgi="<?php echo $degisken; ?>";
		 	 var karsi="<?php echo $k_ip; ?>";

     var res = bilgi.replace(/\./g, "_");
				res=res.replace(/:/g, "_");
				res=res+".jpg";
	$.ajax({
    type: "POST",
    url: 'mesaj_var_mi.php',
    data: {"karsi_taraf":bilgi},
    success: function(data){

		if(data.length!=0){
			//alert(data);
			$('#d').append(" <pre style=\"text-align:right;background-color:#00bfff;\"><b>"+data+"   </b>"+"<img src=avatar/"+res+" height=\"50\" width=\"50\"></pre>");//.addClass("newp").append();

		}
    }
 });
 
 
 
	$.ajax({
    type: "POST",
    url: 'oturumkontrol.php',
    data: {"karsi_taraf":karsi},
    success: function(data){
		if(data=="1"){
			
			window.close();
		}
	}
    
 });
 
},1000); 


 




 
 </script>

</body>
</html>