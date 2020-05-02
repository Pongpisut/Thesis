<?php
    $dbHandle = new mysqli("localhost","root","#1234","5678");
    if(mysqli_connect_errno()){
        echo "เชื่อมต่อฐานข้อมูลไม่สำเร็จ".mysqli_connect_error();
		exit();
    }
	$dbHandle->set_charset('utf8');
?>