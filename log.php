<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}
?>

<!-- row for display-->



<?php if (isset($_GET['msg'])) { ?>
   <div class="justify-content-center" align="middle">
      <div style="width:30%;" class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
         <center>
            <strong>
               <?php echo $_GET['msg'] ?>
            </strong>
         </center>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   </div>
<?php } ?>



<div class="container-fluid d-flex justify-content-around g-4">

   <div style="width:45%;">
      <div class="row mt-4 justify-content-center">
         <div class="col">
            <div class="table" style="width:100%;">
               <center>
                  <h4>Login List</h4>
               </center>
               <table class="table shadow p-2">
                  <thead>
                     <th>#</th>
                     <th>Firstname</th>
                     <th>Lastname</th>
                     <th>Year</th>
                     <th>Section</th>
                     <th>Course</th>
                     <th>Purpose</th>
                     <th>Date</th>
                     <th>Time</th>
                  </thead>
                  <tbody>
                     <?php
                     $userID = $_SESSION['u_id'];
                     $cnt = 1;
                     $select = $conn->prepare("SELECT * FROM login WHERE user_id = ?");
                     $select->execute([$userID]);
                     foreach ($select as $value) { ?>

                        <tr>
                           <td>
                              <?= $cnt++ ?>
                           </td>
                           <td>
                              <?= $value['s_fname'] ?>
                           </td>
                           <td>
                              <?= $value['s_lname'] ?>
                           </td>
                           <td>
                              <?= $value['year'] ?>
                           </td>
                           <td>
                              <?= $value['section'] ?>
                           </td>
                           <td>
                              <?= $value['course'] ?>
                           </td>
                           <td>
                              <?= $value['purpose'] ?>
                           </td>
                           <td>
                              <?= $value['date'] ?>
                           </td>
                           <td>
                              <?= $value['time'] ?>
                           </td>
                        </tr>

                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>


   <div style="width:45%;">
      <div class="row mt-4 justify-content-center">
         <div class="col">
            <div class="table" style="width:100%;">
               <center>
                  <h4>Logout List</h4>
               </center>
               <table class="table shadow p-2">
                  <thead>
                     <th>#</th>
                     <th>Firstname</th>
                     <th>Lastname</th>
                     <th>Year</th>
                     <th>Section</th>
                     <th>Course</th>
                     <th>Date</th>
                     <th>Time</th>
                  </thead>
                  <tbody>
                     <?php
                     $userID = $_SESSION['u_id'];
                     $cnt = 1;
                     $select = $conn->prepare("SELECT * FROM logout WHERE user_id = ?");
                     $select->execute([$userID]);
                     foreach ($select as $value) { ?>

                        <tr>
                           <td>
                              <?= $cnt++ ?>
                           </td>
                           <td>
                              <?= $value['s_fname'] ?>
                           </td>
                           <td>
                              <?= $value['s_lname'] ?>
                           </td>
                           <td>
                              <?= $value['year'] ?>
                           </td>
                           <td>
                              <?= $value['section'] ?>
                           </td>
                           <td>
                              <?= $value['course'] ?>
                           </td>
                           <td>
                              <?= $value['date'] ?>
                           </td>
                           <td>
                              <?= $value['time'] ?>
                           </td>
                        </tr>

                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>


</body>

</html>