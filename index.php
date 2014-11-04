<html>
<head>
<link rel="stylesheet" type="text/css" href="taskbar.css">
<link rel="stylesheet" type="text/css" href="design.css">
<style>
body
{ background-color:#efefef;
 background-image:url('grey.jpg');
 background-repeat: no-repeat;
 }


</style>

<script>
var counter=0;
function increment(arg)
{

xmlhttp= new XMLHttpRequest();
xmlhttp.onreadystatechange=function()    // note: doing % calculation on 2.php
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      //window.counter= xmlhttp.responseText;
     location.reload(true); 
     //alert(counter); 
    }
 }
xmlhttp.open ("GET","increment.php?q="+arg,true);
xmlhttp.send();
}
</script>
<script>

function runphpfunction(arg)  //function to call 2.php
{


var xmlhttp;
xmlhttp= new XMLHttpRequest();
xmlhttp.onreadystatechange=function()    // note: doing % calculation on 2.php
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    
    var jsonObj = JSON.parse(xmlhttp.responseText);
  
var temp1=jsonObj.temp1;
var elem = document.getElementById('content');
    elem.style.width = temp1 + "%";
  
  
   

   var temp2=jsonObj.temp2;
var elem = document.getElementById('content2');
    elem.style.width = temp2 + "%";
   
   
   
  var temp3=jsonObj.temp3;
var elem = document.getElementById('content3');
    elem.style.width = temp3 + "%";
   
   
  var temp4=jsonObj.temp4;
   var elem = document.getElementById('content4');
    elem.style.width = temp4 + "%";
  
    if (arg == 12)
 document.getElementById("12").innerHTML=xmlhttp.responseText;
    else if (arg == 22)
 document.getElementById("22").innerHTML=xmlhttp.responseText; 
     else if (arg == 32)
 document.getElementById("32").innerHTML=xmlhttp.responseText; 
     else if (arg == 42)
 document.getElementById("42").innerHTML=xmlhttp.responseText;
    } 
  }
xmlhttp.open ("GET","2.php?q="+arg,true);
xmlhttp.send();

}
</script>
</head>
<body>
<div id="header">
</div>

<div id= "qholder" align="center">


<?php
$con=mysqli_connect("localhost","root","","question_bank");
if (mysqli_connect_errno())
{
echo "failed to connect to MYSQL :" .mysqli_connect_error();
} 
$result= mysqli_query($con," SELECT * FROM taskbar where question=(SELECT * FROM `increment`) ");

$row =mysqli_fetch_array($result);
$total= $row['A']+$row['B']+$row['C']+$row['D'];
if($total !=0)
{
$temp1= $row['A']/$total;
$temp1=$temp1 *100;
$temp2= $row['B']/$total;
$temp2=$temp2 *100;
$temp3= $row['C']/$total;
$temp3=$temp3 *100;
$temp4= $row['D']/$total;
$temp4=$temp4 *100;
}
else
{
$temp1=0;
$temp2=0;
$temp3=0;
$temp4=0;
}
?>
<script>
var temp1 = "<?php echo $temp1; ?>";
var temp2 = "<?php echo $temp2; ?>";
var temp3 = "<?php echo $temp3; ?>";
var temp4 = "<?php echo $temp4; ?>";

window.onload=function()
{


var elem = document.getElementById('content');
    elem.style.width = temp1 + "%";
   var elemb = document.getElementById('content2');
    elemb.style.width = temp2 + "%";
var elemb = document.getElementById('content3');
    elemb.style.width = temp3 + "%";
    var elemb = document.getElementById('content4');
    elemb.style.width = temp4 + "%";
document.getElementById('noa').innerHTML=temp1;

}


//note : document and other methods can only be called in a function in javascript
</script>

<?php
$con=mysqli_connect("localhost","root","","question_bank");
if (mysqli_connect_errno())
{
echo "failed to connect to MYSQL :" .mysqli_connect_error();
} 

$result= mysqli_query($con," SELECT * FROM vote where id=(SELECT * FROM `increment`)");

$row =mysqli_fetch_array($result);
echo '<div id="a">';
echo $row['question'];
echo "<br><br>";
echo $row['a']."<br>";

echo ' <div id="holder" align="left" > ';
echo '<div id="outer-content" >';
echo '<div id="content" >';
echo '</div>';
echo'</div>';
echo '</div><br> ';

echo $row['b']."<br>";
echo ' <div id="holder" align="left" > ';
echo '<div id="outer-content" >';
echo '<div id="content2" >';
echo '</div>';
echo'</div>';
echo '</div><br> ';

echo $row['c']."<br>";
echo ' <div id="holder" align="left" > ';
echo '<div id="outer-content" >';
echo '<div id="content3" >';
echo '</div>';
echo'</div>';
echo '</div><br> ';

echo $row['d']."<br>";
echo ' <div id="holder" align="left" > ';
echo '<div id="outer-content" >';
echo '<div id="content4" >';
echo '</div>';
echo'</div>';
echo '</div> ';
echo "</div>";
?>
<br><br>

<button id="button2" type="button" onclick="runphpfunction(11)"  >A</button>
<button id="button2" type="button" onclick="runphpfunction(21)"  >B </button>
<button id="button2" type="button" onclick="runphpfunction(31)"  >C </button>
<button id="button2" type="button" onclick="runphpfunction(41)"  >D</button><br><br>
</div>

<div id="next" ><input id="button" type="button" value="next" onclick="increment(1)" /></div>
<div id="back" ><input id="button" type="button" value="back" onclick="increment(2)" /></div>
 
</body>
</html>
