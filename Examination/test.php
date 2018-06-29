<?php
include('exam_class.php');
$conn = new connection();
$link = mysqli_connect("localhost","root","","examination");
$sql = 'select * from userdata';
$result = mysqli_query($link,$sql);
$dbarr=mysqli_fetch_array($result);
// while($dbarr)
// {
//     echo $dbarr['id'].",".$dbarr['username'];
// } 
// $result = $conn->callinsert_deletedb($sql);
// $dbarr = $conn->callselectdb($sql);
// while($dbarr)
// {
//     echo $dbarr['id'].",".$dbarr['username'];
// }
echo "<input type='radio' name='genr' value='male'> Male<br>
  <input type='radio' name='gender' value='female'> Female<br>
  <input type='radio' name='gender' value='other'> Other";