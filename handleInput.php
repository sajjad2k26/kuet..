<?php

include("connect.php");

if (isset($_POST["submit"])) {

  $name = $_POST["name"];
  $description = $_POST["description"];

  // File upload handling
  $photo = $_FILES['photo']['name'];          // Get the original name of the uploaded file
  $temp_name = $_FILES['photo']['tmp_name'];  // Get the temporary name assigned to the file by the server
  $folder = "uploads/";                       // Set the folder where uploaded files will be stored

  // Move the uploaded file from the temporary location to the specified folder
  move_uploaded_file($temp_name, $folder . $photo);

  $sql = "INSERT INTO `user` (`name`, `description`, `photo`) VALUES ('$name', '$description', '$photo')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("location: displayUserDetails.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
