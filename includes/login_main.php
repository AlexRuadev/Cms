<?php include "db.php"; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   // clearing our fields against sql injections
   $username = mysqli_real_escape_string($con, $username);
   $password = mysqli_real_escape_string($con, $password);

   $query = "SELECT * FROM users WHERE username = '{$username}' ";
   $select_user_query = mysqli_query($con, $query);

   if (!$select_user_query) {
      die("QUERY FAILED" . mysqli_error($con));
   }

   while ($row = mysqli_fetch_array($select_user_query)) {
      $db_id = $row['user_id'];
      $db_username = $row['username'];
      $db_user_password = $row['user_password'];
      $db_user_firstname = $row['user_firstname'];
      $db_user_lastname = $row['user_lastname'];
      $db_user_role = $row['user_role'];
   }

   if ($username === $db_username && $password === $db_user_password && $db_user_role === 'admin') {

      $_SESSION['username'] = $db_username;
      $_SESSION['firstname'] = $db_user_firstname;
      $_SESSION['lastname'] = $db_user_lastname;
      $_SESSION['user_role'] = $db_user_role;

      header("Location: ../admin");
   } else {
      header("Location: ../index.php");
   }
}


?>