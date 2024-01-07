<?php
include 'connect.php';
error_reporting(E_ALL); // Enable error reporting to catch any issues
session_start(); // Start the session

// Check if the session variable is set
if (isset($_SESSION['phone_no'])) {
    include "connect.php";
    $phone_no = $_SESSION['phone_no'];
    $q = "SELECT * FROM users WHERE phone_no='$phone_no'";
    $data = mysqli_query($con, $q);

    // Check if the query was successful
    // ...

    // Fetch data from the "adoption" table
    $adoptionQuery = "SELECT * FROM adoption WHERE species='dog'";
    $adoptionData = mysqli_query($con, $adoptionQuery);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Adoption Information</title>
  <!-- Add any additional styles or meta tags as needed -->
</head>
<body>

  <h2>Adoption Information</h2>

  <?php
  if (isset($adoptionData) && mysqli_num_rows($adoptionData) > 0) {
  ?>

  <table border="1">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Species</th>
        <th>Breed</th>
        <th>Vaccination Status</th>
        <th>Description</th>
        <th>Special Needs</th>
        <th>Special Description</th>
        <th>Photo</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = mysqli_fetch_assoc($adoptionData)) {
          $a_id = $row['a_id']; 
          
          $photoPath = "PetHub/ngo/uploads/{$a_id}/{$row['photo']}";

          echo "<tr>";
          echo "<td>{$row['name']}</td>";
          echo "<td>{$row['age']}</td>";
          echo "<td>{$row['species']}</td>";
          echo "<td>{$row['breed']}</td>";
          echo "<td>{$row['vaccination_status']}</td>";
          echo "<td>{$row['description']}</td>";
          echo "<td>{$row['special_needs']}</td>";
          echo "<td>{$row['special_description']}</td>";
          echo "<td>";

          // Check if the file exists before displaying the image
          if (file_exists($photoPath)) {
              echo "<img src=\"$photoPath\" alt=\"Pet Photo\" style=\"width: 50px; height: 50px;\">";
          } else {
              echo "Error: Image file not found for {$row['name']} (Path: $photoPath)";
          }

          echo "</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>

  <?php
  } else {
      echo "<p>No records found.</p>";
  }
  ?>

</body>
</html>
