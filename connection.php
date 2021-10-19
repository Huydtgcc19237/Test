<?php
   /*$Connect = mysqli_connect("localhost","root","","qlbh") or die("Lỗi".mysqli_error($Connect));
	
	mysqli_query($Connect,'SET NAMES "utf8"');
	//mysqli_close($Connect);*/
	$Connect = pg_connect("postgres://kpknfasetxhine:67da40fb98b4bb98a481cebe3383cabd50275b3ade3044685433cba0823fb8f5@ec2-3-213-41-172.compute-1.amazonaws.com:5432/d9dr4kegrianvb");
    //$Connect = pg_connect("host=localhost port=5432 dbname=postgres");
	//$Connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123456");
	
    if (!$Connect) {
        die("Connection failed");
    }
?>