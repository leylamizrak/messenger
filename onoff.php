<?php 


echo $veri="";


$con = mysqli_connect('localhost','root','','mydb');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$giris_tarihi=date('H:i:s');

$pars=explode(":",$giris_tarihi);


$saat=60*60*intval($pars[0]);
$dakika=60*intval($pars[1]);
$saniye=intval($pars[2]);

$toplam=$saat+$dakika+$saniye;





$toplam2;

$result = mysqli_query($con,"SELECT * FROM baglanti");

if (mysqli_num_rows($result) > 0) {
	while($row = $result->fetch_assoc()) {
		 $pars=explode(":",$row["tarih"]);
		 $saat=60*60*intval($pars[0]);
		 $dakika=60*intval($pars[1]);
		 $saniye=intval($pars[2]);

		$toplam2=$saat+$dakika+$saniye;
		$mutlak_fark=abs($toplam-$toplam2);
		if($mutlak_fark<=2)
			$veri=$veri.$row["nick"]."*".$row["ip"]."*"."online*";
		else 
            $veri=$veri.$row["nick"]."*".$row["ip"]."*"."offline*";
		 
    }
}


echo $veri;

?>