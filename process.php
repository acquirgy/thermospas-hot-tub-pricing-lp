<?php

session_start();

// New Connection
$mysqli = new mysqli('localhost','thermosp_tscom','*tscom07','thermosp_thermospascom');

// Check for errors
if(!mysqli_connect_errno()) {

  echo 'connected';

  $query = "INSERT INTO ht_form (`fname`, `lname`, `phone`, `zipcode`, `email`, `iref`) VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = $mysqli->stmt_init();

  if($stmt->prepare($query)) {

    $stmt->bind_param("ssssss",
      $_POST['fname'],
      $_POST['lname'],
      $_POST['phone'],
      $_POST['zip'],
      $_POST['email'],
      isset($_SESSION['iref']) ? $_SESSION['iref'] : ''
    );

    $stmt->execute();
    $stmt->close();

  }

}

header( 'Location: /confirmation.php' ) ;
