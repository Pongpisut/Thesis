<?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
"0"=>"",
"1"=>"มกราคม",
"2"=>"กุมภาพันธ์",
"3"=>"มีนาคม",
"4"=>"เมษายน",
"5"=>"พฤษภาคม",
"6"=>"มิถุนายน",
"7"=>"กรกฎาคม",
"8"=>"สิงหาคม",
"9"=>"กันยายน",
"10"=>"ตุลาคม",
"11"=>"พฤศจิกายน",
"12"=>"ธันวาคม"
);
$thai_month_arr_short=array(
"0"=>"",
"1"=>"ม.ค.",
"2"=>"ก.พ.",
"3"=>"มี.ค.",
"4"=>"เม.ย.",
"5"=>"พ.ค.",
"6"=>"มิ.ย.",
"7"=>"ก.ค.",
"8"=>"ส.ค.",
"9"=>"ก.ย.",
"10"=>"ต.ค.",
"11"=>"พ.ย.",
"12"=>"ธ.ค."
);
function thai_date_and_time($time){
global $thai_day_arr,$thai_month_arr;
$thai_date_return = date("j",$time);
$thai_date_return.=" ".$thai_month_arr[date("n",$time)];
$thai_date_return.= " ".(date("Y",$time)+543);
	//$thai_date_return.= " เวลา ".date("H:i:s",$time);
return $thai_date_return;
}
function thai_date_and_time_short($time){
global $thai_day_arr,$thai_month_arr_short;
$thai_date_return = date("j",$time);
$thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];
$thai_date_return.= " ".(date("Y",$time)+543);
$thai_date_return.= " ".date("H:i:s",$time);
return $thai_date_return;
}

function thai_dateone($time){
global $thai_day_arr,$thai_month_arrs;
$thai_date_return = date("j",$time);
return $thai_date_return;
}

function thai_months($time){
global $thai_day_arr,$thai_month_arr;
$thai_date_return=" ".$thai_month_arr[date("n",$time)];
return $thai_date_return;
}

function thai_date_and_times($time){
	global $thai_day_arr,$thai_month_arr;
	$thai_date_return = date("j",$time);
	$thai_date_return.=" ".$thai_month_arr[date("n",$time)];
	$thai_date_return.= " ".(date("Y",$time)+543);
	$thai_date_return.= " เวลา ".date("H:i:s",$time);
	return $thai_date_return;
	}
?>