<?php
include_once "connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$id = $_POST['id'];
$vehicleNo = $_POST['vehicle_no'];
$chessNo = $_POST['chess_no'];
$photo = $_FILES['photo'];
$nid = $_FILES['nid'];
$presentAddress = $_POST['present_address'];

// Upload files to a directory (you need to create this directory)
$target_file = $_FILES["photo"]["name"];
$image_tmp_name = $_FILES["photo"]["tmp_name"];
$imageFileExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$profile_pic = $id . "." . $imageFileExt;

$target_file_nid = $_FILES["nid"]["name"];
$nid_tmp_name = $_FILES["nid"]["tmp_name"];
$nidFileExt = strtolower(pathinfo($target_file_nid, PATHINFO_EXTENSION));
$nid_pic = $id . "_nid." . $nidFileExt;


move_uploaded_file($_FILES["photo"]["tmp_name"], $profile_pic);
move_uploaded_file($_FILES["nid"]["tmp_name"], $nid_pic);

$sql = "INSERT INTO `applicants` (`id_number`, `name`, `email`, `vehicle_number`, `chess_number`, `photo`, `nid_copy`, `present_address`)
        VALUES ('$id', '$name', '$email', '$vehicleNo', '$chessNo', '$profile_pic', '$nid_pic', '$presentAddress')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Submit Success');</script>";
    header("Location: ../../form.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


