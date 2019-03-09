<!DOCTYPE html>

<html>

<head>
  <title>Messenger</title>
  	<meta charset="UTF-8">


<style>

form {
  text-align: center;
}

</style>

</head>

<body>

<form method="post" enctype="multipart/form-data">
   <input type="file" name="dosya" />
   <input type="submit" value="Resim Yükleyin" />
</form>



<form action="" style="align:center" method="post">
<br><br>
  NICK: <input type="text" name="nick"><br><br>
  <input type="submit" name="gonder" value="BAĞLAN">
</form>

</body>

</html>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "mydb";

$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";


$ip = get_client_ip_env();

/*
echo "<script type=\"text/javascript\">

	var deger=\"$ip\";

alert(deger);</script>";
*/


$sayac=0;

$ayni_ip=0;

//ob_start();


//$d="";


if(isset($_FILES['dosya'])){
   $hata = $_FILES['dosya']['error'];
   if($hata != 0) {
      echo 'Yüklenirken bir hata gerçekleşmiş.';
   } else {
      
	   $isim2=str_replace(".","_",$ip).".jpg";

	  $isim2=str_replace(":","_",$isim2);
         $tip = $_FILES['dosya']['type'];
         $isim = $_FILES['dosya']['name'];
         $uzanti = explode('.', $isim);
         $uzanti = $uzanti[count($uzanti)-1];
         if($uzanti != 'jpg'&& $uzanti != 'jpeg'&&$uzanti != 'png') {
            echo 'Yanlızca jpg, jpeg, png uzantılı dosyaları gönderebilirsiniz.';
         } else {
			 $dosya = $_FILES['dosya']['tmp_name'];
			 copy($dosya, 'avatar/'.$isim2 );
			//echo 'Dosyanız upload edildi!';
         
      }
   }
}



if(isset($_POST["gonder"]))
{
	$giris_tarihi=date('H:i:s');

	
	$takma_ad=$_POST["nick"];
	


$sorgu="SELECT * FROM baglanti WHERE ip='$ip'";


$result = $conn->query($sorgu);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["nick"]. " - Name: " . $row["ip"]. " " . $row["tarih"]. "<br>";
		$ayni_ip=1;
    }
} else {
   // echo "0 results";
}


if($ayni_ip==0)
{
$sql = "INSERT INTO baglanti VALUES ('$takma_ad', '$ip', '$giris_tarihi','1')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


else if($ayni_ip==1)
{
    
	$s = "UPDATE baglanti SET nick='$takma_ad',tarih='$giris_tarihi', oturum='1' WHERE ip='$ip'";

if ($conn->query($s) === TRUE) {
    //echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
	
	
}






$conn->close();

    header('Location:ping.php');

}

function get_client_ip_env() {
	
	if (getenv('HTTP_CLIENT_IP'))
		$ip = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ip = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ip = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
		$ip = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ip = getenv('REMOTE_ADDR');
	else
		$ip = 'UNKNOWN';

	//echo $ip;
	return $ip;
}

?>