<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}
?>

<div class="row justify-content-center mt-2">
   <div class="col-sm-2 shadow mt-3">
      <center class="m-2">
         <a class="btn btn-primary me-2" style="width:40%;" href="index.php?Login">Login</a>
         <a class="btn btn-success ms-2" style="width:40%;" href="index.php?Logout">Logout</a>
      </center>
   </div>
</div>

<?php
if (isset($_GET['Login'])) {
   ?>

   <!-- row for input -->
   <div class="row justify-content-center">
      <div class="col-md-5 shadow mt-3 p-3">
         <?php if (isset($_GET['msg'])) { ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <strong>
                  <?php echo $_GET['msg'] ?>
               </strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

         <?php } ?>
         <?php
         if (isset($_GET['edit'])) {
            // display the data to be edited here 
            $id = $_GET['id'];
            $selectData = $conn->prepare("SELECT * FROM login WHERE in_id = ?");
            $selectData->execute([$id]);

            foreach ($selectData as $data) { ?>

               <form action="process.php" method="post">
                  <input type="hidden" name="in_id" value="<?= $data['in_id'] ?>">
                  <div class="mb-3 mt-2">
                     <label for="fname">Firstname</label>
                     <input type="text" class="form-control mb-3" id="fname" name="firstname" value="<?= $data['s_fname'] ?>"
                        required>
                  </div>
                  <div class="mb-3">
                     <label for="lname">Lastname</label>
                     <input type="text" class="form-control mb-3" id="lname" name="lastname" value="<?= $data['s_lname'] ?>"
                        required>
                  </div>
                  <div class="d-flex justify-content-evenly">
                     <div class="mb-3" style="width:30%;">
                        <label for="year">Year Level</label>
                        <select class="form-control" id="year" name="year">
                           <option value="1" <?= ($data['year'] == '1') ? 'selected' : ''; ?>>1</option>
                           <option value="2" <?= ($data['year'] == '2') ? 'selected' : ''; ?>>2</option>
                           <option value="3" <?= ($data['year'] == '3') ? 'selected' : ''; ?>>3</option>
                           <option value="4" <?= ($data['year'] == '4') ? 'selected' : ''; ?>>4</option>
                        </select>
                     </div>
                     <div class="mb-3" style="width:30%;">
                        <label for="section">Section</label>
                        <select class="form-control" id="section" name="section">
                           <option value="A" <?= ($data['year'] == 'A') ? 'selected' : ''; ?>>A</option>
                           <option value="B" <?= ($data['year'] == 'B') ? 'selected' : ''; ?>>B</option>
                           <option value="C" <?= ($data['year'] == 'C') ? 'selected' : ''; ?>>C</option>
                           <option value="D" <?= ($data['year'] == 'D') ? 'selected' : ''; ?>>D</option>
                           <option value="E" <?= ($data['year'] == 'E') ? 'selected' : ''; ?>>E</option>
                        </select>
                     </div>
                     <div class="mb-3" style="width:30%;">
                        <label for="course">Course</label>
                        <input type="text" class="form-control mb-3" id="course" name="course" value="<?= $data['course'] ?>"
                           required>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label for="purpose">Purpose</label>
                     <input type="text" class="form-control mb-3" id="purpose" name="purpose" value="<?= $data['purpose'] ?>"
                        required>
                  </div>
                  <div class="d-flex justify-content-around">
                     <div class="mb-3" style="width:40%;">
                        <label for="date">Date</label>
                        <input type="date" class="form-control mb-3" id="date" name="date" value="<?= $data['date'] ?>" required>
                     </div>
                     <div class="mb-3" style="width:40%;">
                        <label for="time">Time</label>
                        <input type="time" class="form-control mb-3" id="time" name="time" value="<?= $data['time'] ?>" required>
                     </div>
                  </div>
                  <div class="d-flex justify-content-between">
                     <div class="mb-2 mt-3" style="width: 10%;">
                        <a class="btn btn-success" style="width:100%;" href="log.php" name="editLogin">
                           << /a>
                     </div>
                     <div class="mb-2 mt-3">
                        <button class="btn btn-warning" type="submit" name="editLogin">Update</button>
                     </div>
                  </div>
               </form>
            <?php }
         } else { ?>
            <center>
               <h3 class="mt-3 mb-3">Login</h3>
            </center>
            <form action="process.php" method="post">
               <input type="hidden" name="user_id" value="<?= $_SESSION['u_id'] ?>">
               <div class="mb-3 mt-2">
                  <label for="fname">Firstname</label>
                  <input type="text" class="form-control mb-3" id="fname" name="firstname" required>
               </div>
               <div class="mb-3">
                  <label for="lname">Lastname</label>
                  <input type="text" class="form-control mb-3" id="lname" name="lastname" required>
               </div>
               <div class="d-flex justify-content-evenly">
                  <div class="mb-3" style="width:30%;">
                     <label for="year">Year Level</label>
                     <select class="form-control" id="year" name="year">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                     </select>
                  </div>
                  <div class="mb-3" style="width:30%;">
                     <label for="section">Section</label>
                     <select class="form-control" id="section" name="section">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                     </select>
                  </div>
                  <div class="mb-3" style="width:30%;">
                     <label for="course">Course</label>
                     <input type="text" class="form-control mb-3" id="course" name="course" required>
                  </div>
               </div>

               <div class="mb-3">
                  <label for="purpose">Purpose</label>
                  <input type="text" class="form-control mb-3" id="purpose" name="purpose" required>
               </div>
               <div class="d-flex justify-content-around">
                  <div class="mb-3" style="width:40%;">
                     <label for="date">Date (Philippine Standard Time)</label>
                     <!-- Use PHP to echo the current date in PST -->
                     <input type="date" class="form-control mb-3" id="date" name="date"
                        value="<?= date_create('now', new DateTimeZone('Asia/Manila'))->format('Y-m-d') ?>" required>
                  </div>
                  <div class="mb-3" style="width:40%;">
                     <label for="time">Time (Philippine Standard Time)</label>
                     <!-- Use PHP to echo the current time in PST -->
                     <input type="time" class="form-control mb-3" id="time" name="time"
                        value="<?= date_create('now', new DateTimeZone('Asia/Manila'))->format('H:i') ?>" required>
                  </div>
               </div>
               <div class="mb-2 mt-3">
                  <button class="btn btn-primary" type="submit" name="addLogin">Submit</button>
               </div>
            </form>
         <?php } ?>
      </div>
   </div>

   <?php
}
?>


<?php
if (isset($_GET['Logout'])) {
   ?>

   <!-- row for input -->
   <div class="row justify-content-center">
      <div class="col-md-5 shadow mt-3 p-3">
         <?php if (isset($_GET['msg'])) { ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
               <strong>
                  <?php echo $_GET['msg'] ?>
               </strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

         <?php } ?>
         <?php
         if (isset($_GET['edit1'])) {
            // display the data to be edited here 
            $id = $_GET['id'];
            $selectData = $conn->prepare("SELECT * FROM logout WHERE out_id = ?");
            $selectData->execute([$id]);

            foreach ($selectData as $data) { ?>

               <form action="process.php" method="post">
                  <input type="hidden" name="out_id" value="<?= $data['out_id'] ?>" required>
                  <div class="mb-3 mt-2">
                     <label for="fname">Firstname</label>
                     <input type="text" class="form-control mb-3" id="fname" name="firstname" value="<?= $data['s_fname'] ?>"
                        required>
                  </div>
                  <div class="mb-3">
                     <label for="lname">Lastname</label>
                     <input type="text" class="form-control mb-3" id="lname" name="lastname" value="<?= $data['s_lname'] ?>"
                        required>
                  </div>
                  <div class="d-flex justify-content-evenly">
                     <div class="mb-3" style="width:30%;">
                        <label for="year">Year Level</label>
                        <select class="form-control" id="year" name="year">
                           <option value="1" <?= ($data['year'] == '1') ? 'selected' : ''; ?>>1</option>
                           <option value="2" <?= ($data['year'] == '2') ? 'selected' : ''; ?>>2</option>
                           <option value="3" <?= ($data['year'] == '3') ? 'selected' : ''; ?>>3</option>
                           <option value="4" <?= ($data['year'] == '4') ? 'selected' : ''; ?>>4</option>
                        </select>
                     </div>
                     <div class="mb-3" style="width:30%;">
                        <label for="section">Section</label>
                        <select class="form-control" id="section" name="section">
                           <option value="A" <?= ($data['year'] == 'A') ? 'selected' : ''; ?>>A</option>
                           <option value="B" <?= ($data['year'] == 'B') ? 'selected' : ''; ?>>B</option>
                           <option value="C" <?= ($data['year'] == 'C') ? 'selected' : ''; ?>>C</option>
                           <option value="D" <?= ($data['year'] == 'D') ? 'selected' : ''; ?>>D</option>
                           <option value="E" <?= ($data['year'] == 'E') ? 'selected' : ''; ?>>E</option>
                        </select>
                     </div>
                     <div class="mb-3" style="width:30%;">
                        <label for="course">Course</label>
                        <input type="text" class="form-control mb-3" id="course" name="course" value="<?= $data['course'] ?>"
                           required>
                     </div>
                  </div>
                  <div class="d-flex justify-content-around">
                     <div class="mb-3" style="width:40%;">
                        <label for="date">Date</label>
                        <input type="date" class="form-control mb-3" id="date" name="date" value="<?= $data['date'] ?>" required>
                     </div>
                     <div class="mb-3" style="width:40%;">
                        <label for="time">Time</label>
                        <input type="time" class="form-control mb-3" id="time" name="time" value="<?= $data['time'] ?>" required>
                     </div>
                  </div>
                  <div class="d-flex justify-content-between">
                     <div class="mb-2 mt-3" style="width: 10%;">
                        <a class="btn btn-success" style="width:100%;" href="log.php" name="editLogin">
                           << /a>
                     </div>
                     <div class="mb-2 mt-3">
                        <button class="btn btn-warning" type="submit" name="editLogout">Update</button>
                     </div>
                  </div>
               </form>
            <?php }
         } else { ?>
            <center>
               <h3 class="mt-3 mb-3">Logout</h3>
            </center>
            <form action="process.php" method="post">
               <input type="hidden" name="user_id" value="<?= $_SESSION['u_id'] ?>">
               <div class="mb-3 mt-2">
                  <label for="fname">Firstname</label>
                  <input type="text" class="form-control mb-3" id="fname" name="firstname" required>
               </div>
               <div class="mb-3">
                  <label for="lname">Lastname</label>
                  <input type="text" class="form-control mb-3" id="lname" name="lastname" required>
               </div>
               <div class="d-flex justify-content-evenly">
                  <div class="mb-3" style="width:30%;">
                     <label for="year">Year Level</label>
                     <select class="form-control" id="year" name="year">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                     </select>
                  </div>
                  <div class="mb-3" style="width:30%;">
                     <label for="section">Section</label>
                     <select class="form-control" id="section" name="section">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                     </select>
                  </div>
                  <div class="mb-3" style="width:30%;">
                     <label for="course">Course</label>
                     <input type="text" class="form-control mb-3" id="course" name="course" required>
                  </div>
               </div>
               <div class="d-flex justify-content-around">
                  <div class="mb-3" style="width:40%;">
                     <label for="date">Date (Philippine Standard Time)</label>
                     <!-- Use PHP to echo the current date in PST -->
                     <input type="date" class="form-control mb-3" id="date" name="date"
                        value="<?= date_create('now', new DateTimeZone('Asia/Manila'))->format('Y-m-d') ?>" required>
                  </div>
                  <div class="mb-3" style="width:40%;">
                     <label for="time">Time (Philippine Standard Time)</label>
                     <!-- Use PHP to echo the current time in PST -->
                     <input type="time" class="form-control mb-3" id="time" name="time"
                        value="<?= date_create('now', new DateTimeZone('Asia/Manila'))->format('H:i') ?>" required>
                  </div>
               </div>
               <div class="mb-2 mt-3">
                  <button class="btn btn-success" type="submit" name="addLogout">Submit</button>
               </div>
            </form>
         <?php } ?>
      </div>
   </div>

   <?php
}
?>





</body>

</html>