<?php
 error_reporting(0);
	$host="149.129.248.246"; //host laptop bisa pakai 127.0.0.1 atau localhost
	$dbname="admin_panji"; // nama database
	$user="admin_panji"; // nama user dalam my sql
	$password="@Bijan2089"; // password user, jika kosong beri string kosong
	try{
		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	  	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		if (!$db){
			echo "Koneksi Error";
		}else{
			echo "Koneksi Berhasil";
		}
	}
	catch(PDOException $STH){
	  echo "<br>".$STH->getMessage();
	}
$base_url = "http://localhost:8983/"; 

$coba = $db->prepare("SELECT * FROM sma_purchases order by date asc");

#$ara[];

$coba->execute();
$hasil = $coba->fetchAll();

$coba2 = $db->prepare("SELECT * FROM sma_sales order by date asc");
$coba2->execute();
$hasil2 = $coba2->fetchAll();

#foreach($hasil as $cob){
#	foreach($hasil2 as $cob2){
#		if($cob['date']>$cob2['date']){
#			$ara[]=$cob1;
#		}if($cob['date']<$cob2['date']){
#			$ara[]=$cob2;
#		}
#	}
#}

#var_dump($hasil2[0]['id']);
#echo $a = sizeof($hasil);
#echo sizeof($hasil2);
#for($i=0;$i<$a;$i++){
#	#echo $hasil[$i]['id']."<br/>";
#	for($s=0;$s<sizeof($hasil2);$s++){
#		if($hasil[$i]['date']<$hasil2[$s]['date']){
#			$ara[]=$hasil;
#		}else if($hasil[$i]['date']>$hasil2[$s]['date']){		
#			$ara[]=$hasil2;
#		}else{
#			continue;
#		}
#	}
#}

#var_dump($ara);

foreach($hasil2 as $cob2){
	$ara[]=$cob2;
}

foreach($hasil as $cob){
	$ara[]=$cob;
}

#var_dump($ara);
#echo $ara[1][0];
for($j=0;$j<count($ara)-1;$j++){
	if($ara[$j]['date']>$ara[$j+1]['date']){
		$temp=$ara[$j];
		$ara[$j]=$ara[$j+1];
		$ara[$j+1]=$temp;
	}
}

var_dump($ara);
#echo $hasil[0]['date'] > $hasil2[0]['date'];
ini_set('display_errors',0);
?>
