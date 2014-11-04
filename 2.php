<?php

 
 $q= $_REQUEST["q"];
		
		

	
$con=mysqli_connect("localhost","root","","question_bank");
if (mysqli_connect_errno())
{
echo "failed to connect to MYSQL :" .mysqli_connect_error();
}



	

if ($q== 11 || $q== 12)
	{	
  

$option= mysqli_query($con," SELECT * FROM taskbar where question=(SELECT * FROM `increment`)");


$optiona= mysqli_fetch_array($option);
$optiona['A']++;
$temp=$optiona['A'];
mysqli_query($con,"UPDATE taskbar SET A= $temp WHERE question=(SELECT * FROM `increment`)");
//mysql_real_escape_string(($optiona['A']). "'");


} 
elseif ($q==21 )
{
	$option= mysqli_query($con," SELECT * FROM taskbar where question=(SELECT * FROM `increment`)");


$optiona= mysqli_fetch_array($option);
$optiona['B']++;
$temp=$optiona['B'];
mysqli_query($con,"UPDATE taskbar SET B = $temp WHERE question=(SELECT * FROM `increment`)");
//mysql_real_escape_string(($optiona['A']). "'");
$result= mysqli_query($con," SELECT * FROM taskbar where question=(SELECT * FROM `increment`)");
$row =mysqli_fetch_array($result);
$total= $row['A']+$row['B']+$row['C']+$row['D'];

//echo $temp2;
} 

 
else if ($q== 31 )
{
	$option= mysqli_query($con," SELECT * FROM taskbar where question=(SELECT * FROM `increment`)");


$optiona= mysqli_fetch_array($option);
$optiona['C']++;
$temp=$optiona['C'];


mysqli_query($con,"UPDATE taskbar SET C = $temp WHERE question=(SELECT * FROM `increment`)");
//mysql_real_escape_string(($optiona['A']). "'");
$result= mysqli_query($con," SELECT * FROM taskbar where question= (SELECT * FROM `increment`)");
$row =mysqli_fetch_array($result);
$total= $row['A']+$row['B']+$row['C']+$row['D'];

//echo $temp3;

}


else if ($q==41)
{
	$option= mysqli_query($con," SELECT * FROM taskbar where question=(SELECT * FROM `increment`)");


$optiona=mysqli_fetch_array($option);
$optiona['D']++;
$temp=$optiona['D'];
mysqli_query($con,"UPDATE taskbar SET D = $temp WHERE question=(SELECT * FROM `increment`)");
//mysql_real_escape_string(($optiona['A']). "'");
$result= mysqli_query($con," SELECT * FROM taskbar where question=(SELECT * FROM `increment`)");
$row =mysqli_fetch_array($result);
$total= $row['A']+$row['B']+$row['C']+$row['D'];

//echo $temp4;

}
else 
{
echo "";	
}

$result= mysqli_query($con," SELECT * FROM taskbar WHERE question=(SELECT * FROM `increment`)");
$row =mysqli_fetch_array($result);
$total= $row['A']+$row['B']+$row['C']+$row['D'];
if ($total != 0)
{
$temp1= $row['A']/$total;
$temp1=$temp1 *100;
$temp2= $row['B']/$total;
$temp2=$temp2 *100;
$temp3= $row['C']/$total;
$temp3=$temp3 *100;
$temp4= $row['D']/$total;
$temp4=$temp4 *100;


$arr = array('temp1' => $temp1, 'temp2' => $temp2, 'temp3' => $temp3, 'temp4' => $temp4);
   echo json_encode($arr);

}
else
{
$arr = array('temp1' => 0, 'temp2' => 0, 'temp3' =>0, 'temp4' => 0);
   echo json_encode($arr);	
}

?>
