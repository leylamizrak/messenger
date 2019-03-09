<html>

<head>

  	<meta charset="UTF-8">


</head>

</html>
<?php
  
  $onay=0;
  $sonuc=$_REQUEST["a"];
  echo $sonuc;
  
  $takma_ad="";
  
  $servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM baglanti WHERE ip=\"$sonuc\"";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();
	$takma_ad=$row["nick"];
	
} else {
    echo "0 results";
}


  
  
  
        
	echo " <script type=\"text/javascript\">
	
	var deger=\"$sonuc\";
	var takma_isim=\"$takma_ad\";
	
	if (confirm(takma_isim+\" ile konuşmak istiyor musunuz?\")) 
	{
     
	 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

            	var response = this.responseText;
				var url=\"mesajlasma.php?b=\"+response+\"&nick=\"+takma_isim;
				window.open(url);
				 window.location.href=\"ping.php\";


			}
        };

        xmlhttp.open(\"GET\", \"ekle.php?q=1\"+\"-\"+deger,true);
        xmlhttp.send();
   
} else {
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

            	var response = this.responseText;
				 window.location.href=\"ping.php\";
			}
        };
		

        xmlhttp.open(\"GET\", \"ekle.php?q=0\"+\"-\"+deger, true);
        xmlhttp.send();
	
}

		</script>";


?>