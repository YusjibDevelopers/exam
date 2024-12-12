<?php
 include("../../../conn.php");
 extract($_POST);


$updCourse = $conn->query("UPDATE exam_attempt SET result='$result' WHERE exmne_id='$exmne_id' ");
if($updCourse)
{
	   $res = array("res" => "success", "exFullname" => $result);
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>