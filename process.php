<?php
include 'conn.php';
/*------------------------Login-------------------------------*/
// for adding login
if (isset($_POST['addLogin'])) {
   $userID = $_POST['user_id'];
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $year = $_POST['year'];
   $section = $_POST['section'];
   $course = $_POST['course'];
   $purpose = $_POST['purpose'];
   $date = $_POST['date'];
   $time = $_POST['time'];

   // INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
   $insert = $conn->prepare("INSERT INTO login(user_id, s_fname, s_lname, year, section, course, purpose, date, time) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
   $insert->execute([
      $userID,
      $fname,
      $lname,
      $year,
      $section,
      $course,
      $purpose,
      $date,
      $time

   ]);

   $msg = "Data inserted!";
   header("Location:index.php?Login&msg=$msg");
}

// for update login
if (isset($_POST['editLogin'])) {
   $id = $_POST['in_id'];
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $year = $_POST['year'];
   $section = $_POST['section'];
   $course = $_POST['course'];
   $purpose = $_POST['purpose'];
   $date = $_POST['date'];
   $time = $_POST['time'];

   // UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;
   $update = $conn->prepare("UPDATE login SET s_fname = ?, s_lname = ?, year = ?, section = ?, course = ?, purpose = ?, date = ?, time = ? WHERE in_id = ?");
   $update->execute([
      $fname,
      $lname,
      $year,
      $section,
      $course,
      $purpose,
      $date,
      $time,
      $id
   ]);

   $msg = "Login Data Updated!";
   header("Location: log.php?msg=$msg");
}

// delete login
if (isset($_GET['delete'])) {
   $id = $_GET['id'];

   // DELETE FROM table_name WHERE condition;
   $delete = $conn->prepare("DELETE FROM login WHERE in_id = ?");
   $delete->execute([$id]);

   $msg = " Login Data Deleted!";
   header("Location: log.php?msg=$msg");
}

/*------------------------Logout-------------------------------*/
// for adding logout
if (isset($_POST['addLogout'])) {
   $userID = $_POST['user_id'];
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $year = $_POST['year'];
   $section = $_POST['section'];
   $course = $_POST['course'];
   $date = $_POST['date'];
   $time = $_POST['time'];

   // INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
   $insert = $conn->prepare("INSERT INTO logout (user_id, s_fname, s_lname, year, section, course, date, time) VALUES( ?, ?, ?, ?, ?, ?, ?, ?)");
   $insert->execute([
      $userID,
      $fname,
      $lname,
      $year,
      $section,
      $course,
      $date,
      $time

   ]);

   $msg = "Data inserted!";
   header("Location: index.php?Logout&msg=$msg");
}

// for update logout
if (isset($_POST['editLogout'])) {
   $id = $_POST['out_id'];
   $fname = $_POST['firstname'];
   $lname = $_POST['lastname'];
   $year = $_POST['year'];
   $section = $_POST['section'];
   $course = $_POST['course'];
   $date = $_POST['date'];
   $time = $_POST['time'];

   // UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;
   $update = $conn->prepare("UPDATE logout SET s_fname = ?, s_lname = ?, year = ?, section = ?, course = ?, date = ?, time = ? WHERE out_id = ?");
   $update->execute([
      $fname,
      $lname,
      $year,
      $section,
      $course,
      $date,
      $time,
      $id
   ]);

   $msg = "Logout Data Updated!";
   header("Location: log.php?&msg=$msg");
}

// delete logout
if (isset($_GET['delete1'])) {
   $id = $_GET['id'];

   // DELETE FROM table_name WHERE condition;
   $delete = $conn->prepare("DELETE FROM logout WHERE out_id = ?");
   $delete->execute([$id]);

   $msg = "Data Deleted!";
   header("Location: log.php?msg=$msg");
}

// register a user
if (isset($_POST['register'])) {
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $pass1 = $_POST['pass1'];
   $pass2 = $_POST['pass2'];

   if ($pass1 == $pass2) {
      $hash = password_hash($pass1, PASSWORD_DEFAULT);
      // INSERT INTO table_name (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);
      $addUser = $conn->prepare("INSERT INTO users(user_fname, user_lname, user_email, user_pass) VALUES(?, ?, ?, ?)");
      $addUser->execute([
         $fname,
         $lname,
         $email,
         $hash
      ]);

      header("Location: index.php");
   } else {
      $msg = "Password do not match!";
      header("Location: register.php?msg=$msg");
   }
}

//edit user
if (isset($_POST['editPUser'])) {
   session_start();
   $id = $_SESSION['u_id'];

   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];

   // UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;
   $update = $conn->prepare("UPDATE users SET user_fname = ?, user_lname = ?,  user_email = ? WHERE user_id = ?");
   $update->execute([
      $fname,
      $lname,
      $email,
      $id
   ]);

   $msg = "Profile Updated!";
   header("Location: user.php?profile&msg=$msg");
}

// Change password
if (isset($_POST['ChangePass'])) {
   session_start(); // Start the session
   $pass1 = $_POST['pass1'];
   $pass2 = $_POST['pass2'];

   if ($pass1 == $pass2) {
      // Hash the new password
      $hash = password_hash($pass1, PASSWORD_DEFAULT);

      // Update password in the database
      $id = $_SESSION['u_id'];
      $update = $conn->prepare("UPDATE users SET user_pass = ? WHERE user_id = ?");
      $update->execute([$hash, $id]);

      $msg = "Password Updated!";
      header("Location: user.php?profile&msg=$msg");
      exit;
   } else {
      $msg = "Passwords do not match!";
      header("Location: user.php?change-password&msg=$msg");
      exit;
   }
}

//delete account
if (isset($_GET['Delete-Account'])) {
   $id = $_GET['id'];

   $delete = $conn->prepare("DELETE FROM users WHERE user_id = ?");
   $delete->execute([$id]);

   session_destroy();
   session_start();
   unset($_SESSION['logged_in']);
   unset($_SESSION['u_id']);

   $msg = "Account Deleted!";
   header("Location: login.php?msg=$msg");
   exit;
}

//login
if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $check = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
   $check->execute([$email]);

   foreach ($check as $data) {
      if ($email == $data['user_email'] && password_verify($password, $data['user_pass'])) {
         session_start();
         $_SESSION['logged_in'] = true;
         $_SESSION['u_id'] = $data['user_id'];

         header("Location: index.php");
      } else {
         $msg = "Email or Password do not match!";
         header("Location: login.php?msg=$msg");
      }
   }
}

// logout
if (isset($_GET['logout'])) {
   session_start();
   unset($_SESSION['logged_in']);
   unset($_SESSION['u_id']);

   header("Location: login.php");
}