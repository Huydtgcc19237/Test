<?php
	$Conn = pg_connect("postgres://kpknfasetxhine:67da40fb98b4bb98a481cebe3383cabd50275b3ade3044685433cba0823fb8f5@ec2-3-213-41-172.compute-1.amazonaws.com:5432/d9dr4kegrianvb");
    if (!$Conn) {
        die("Connection failed");
    }
?>