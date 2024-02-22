<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}
?>

<style>
   .con {
      height: 70vh;
   }

   .img {
      width: 25%;
      height: 25%;
      margin: 30px auto;
   }

   span {
      font-size: 30px;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
   }

   p {
      margin-top: -4%;
      font-size: 20px;
   }

   hr {
      margin-top: 13%;
   }
</style>

<?php
if (isset($_GET['profile'])) {
   $id = $_SESSION['u_id'];
   $selectData = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
   $selectData->execute([$id]);

   foreach ($selectData as $data) { ?>
      <div class="row justify-content-center mt-3">
         <div class="col-md-4 shadow p-3 mt-5 bg-white con">

            <?php if (isset($_GET['msg'])) { ?>
               <div style="width:100%; margin-bottom:-5%;" class="alert alert-warning alert-dismissible fade show m-auto"
                  role="alert">
                  <center>
                     <strong>
                        <?php echo $_GET['msg'] ?>
                     </strong>
                  </center>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            <?php } ?>

            <div class="img">
               <img src="images/undraw_profile.svg" height="100%" width="100%" alt="">
            </div>
            <center>
               <div class="text">
                  <p>
                     <?= $data['user_email'] ?>
                  </p>
                  <span>
                     <?= $data['user_fname'] ?>
                     <?= $data['user_lname'] ?>
                  </span>
               </div>
               <hr>
               <div class="d-flex justify-content-evenly">
                  <a href="user.php?edit-profile" class="btn btn-primary" style="margin-top: 20px; width:35%;">Edit
                     Profile</a>
                  <a href="user.php?change-password" class="btn btn-success" style="margin-top: 20px; width:35%;">Change
                     Password</a>
               </div>
            </center>
         </div>
      </div>

   <?php }
} ?>

<?php
if (isset($_GET['edit-profile'])) {
   $id = $_SESSION['u_id'];
   $selectData = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
   $selectData->execute([$id]);

   foreach ($selectData as $data) { ?>
      <div class="row justify-content-center mt-3">
         <div class="col-md-4 shadow mt-5 p-3 bg-white">
            <form action="process.php" method="post" class="p-3">
               <div class="mb-3">
                  <label for="fname">Firstname</label>
                  <input type="text" id="fname" class="form-control" name="fname" value="<?= $data['user_fname'] ?>">
               </div>
               <div class="mb-3">
                  <label for="lname">Lastname</label>
                  <input type="text" id="lname" class="form-control" name="lname" value="<?= $data['user_lname'] ?>">
               </div>
               <div class="mb-3">
                  <label for="email"> Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?= $data['user_email'] ?>">
               </div>
               <div class="d-flex justify-content-between mt-5">
                  <button type="submit" name="editPUser" class="btn btn-success">Submit</button>
                  <a href="user.php?profile" class="btn btn-warning">Cancel</a>
               </div>
            </form>
         </div>
      </div>

   <?php }
} ?>

<?php
if (isset($_GET['change-password'])) {
   $id = $_SESSION['u_id'];
   $selectData = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
   $selectData->execute([$id]);

   foreach ($selectData as $data) { ?>

      <div class="row justify-content-center mt-3">
         <div class="col-md-4 shadow mt-5 p-3 bg-white">
            <form action="process.php" method="post" class="p-3">
               <div class="mb-3">
                  <label for="pass1">New Password</label>
                  <input type="password" name="pass1" for="pass1" class="form-control">
                  <input type="hidden" name="pass" id="pass1" class="form-control" value="<?= $data['user_pass'] ?>">
               </div>
               <div class="mb-3">
                  <label for="pass2">Confirm Password</label>
                  <input type="password" name="pass2" id="pass2" class="form-control">
               </div>
               <div class="d-flex justify-content-between mt-5">
                  <button type="submit" name="ChangePass" class="btn btn-success">Submit</button>
                  <a href="user.php?profile" class="btn btn-warning">Cancel</a>
               </div>
            </form>
         </div>
      </div>

   <?php }
} ?>

<?php
if (isset($_GET['Delete-Account'])) { ?>

   <div class="row justify-content-center mt-3">
      <div class="col-md-4 shadow mt-5 p-5 bg-white">
         <center>
            <h3>❗❗❗</h3>
            <br>
            <p>Are you sure you want to delete your Account?</p>
         </center>
         <div class="d-flex justify-content-around mt-5">
            <a href="process.php?Delete-Account&id=<?= $_SESSION['u_id'] ?>" style="width:18%;"
               class="btn btn-danger">Yes</a>
            <a href="javascript:history.go(-1);" style="width:18%;" class="btn btn-warning">Cancel</a>
         </div>
      </div>
   </div>

<?php } ?>


</body>

</html>