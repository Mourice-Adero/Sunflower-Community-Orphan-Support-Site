<?php
include "./config.php";
if (isset($_POST['update_location'])) {
  $location_id = $_POST['location_id'];
  $location_name = $_POST['location_name'];

  $sql = "UPDATE locations SET location_name = '$location_name' WHERE location_id = '$location_id'";
  if (mysqli_query($conn, $sql)) {
    echo "Location updated successfully";
  } else {
    echo "Error updating location: " . mysqli_error($conn);
  }
}
print_r($_POST);
?>