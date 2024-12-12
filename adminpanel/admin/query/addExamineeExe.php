<?php 
 include("../../../conn.php");


extract($_POST);

// Validate inputs first
if($gender == "0") {
    $res = array("res" => "noGender");
}
else if(empty($courses)) {
    $res = array("res" => "noCourse");
}
else if($year_level == "0") {
    $res = array("res" => "noLevel");
}
else {
    try {
        // Prepare the insert statement
        $stmt = $conn->prepare("INSERT INTO examinee_tbl(exmne_fullname, exmne_course, exmne_gender, exmne_year_level, exmne_email) VALUES(:fullname, :course, :gender, :year_level, :matric)");

        // Track successful insertions
        $insertSuccess = true;

        // Loop through selected courses and insert for each
        foreach ($courses as $selectedCourse) {
            $result = $stmt->execute([
                ':fullname' => $fullname,
                ':course' => $selectedCourse,
                ':gender' => $gender,
                ':year_level' => $year_level,
                ':matric' => $matric
            ]);

            // If any insertion fails, set flag to false
            if (!$result) {
                $insertSuccess = false;
                break;
            }
        }

        // Set response based on insertion result
        if ($insertSuccess) {
            $res = array("res" => "success", "msg" => $matric);
        } else {
            $res = array("res" => "failed");
        }
    } catch(PDOException $e) {
        // Handle any database errors
        $res = array("res" => "failed", "error" => $e->getMessage());
    }
}

echo json_encode($res);
 ?>