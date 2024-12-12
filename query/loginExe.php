<?php 
session_start();
 include("../conn.php");
 

extract($_POST);

$selAcc = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$username' AND exmne_fullname='$fullname' AND exmne_course='$course'");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

$checkCourse = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$username' AND exmne_fullname='$fullname' AND exmne_course !='$course'");
$selCheckCourse = $checkCourse->fetch(PDO::FETCH_ASSOC);

if($checkCourse->rowCount() > 0){
  $res = array("res" => "wrong course");
}elseif($selAcc->rowCount() > 0)
{
  $_SESSION['examineeSession'] = array(
  	 'exmne_id' => $selAccRow['exmne_id'],
  	 'examineenakalogin' => true
  );
  $res = array("res" => "success");

}
else
{
  $res = array("res" => "invalid");
}




 echo json_encode($res);
 ?>