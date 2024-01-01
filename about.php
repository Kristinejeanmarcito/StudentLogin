<?php include 'header.php';
if (!isset($_SESSION['logged_in'])) {
   header("Location: login.php");
   ob_end_flush();
}
?>

<div>

   <div class="container mt-5">
      <h1 class="text-center">About Us</h1>

      <hr>
      <div>
         <p>
            A student login system is a digital platform that facilitates the recording of student attendance upon
            entering and exiting an establishment. It is designed to enable students to input their data securely, typically through unique credentials such as
            a name, course, year and section. This system not only verifies the identity of the student but also captures the times of entry and exit,
            providing an effective method for tracking attendance. By employing secure authentication measures, the system ensures the privacy and confidentiality of student
            information, contributing to the overall security of the establishment's data.
         </p>
      </div>
      <hr>

      <!-- Team Section -->
      <section id="team" class="mt-4">
         <h2 class="text-center mb-4">Our Team</h2>

         <div class="row">
            <!-- Team Member 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="card">
                  <img src="images/delm.jpg" class="card-img-top" alt="Team Member 1">
                  <div class="card-body">
                     <h5 class="card-title"><strong>Delmalyn Miano</strong></h5>
                  </div>
               </div>
            </div>

            <!-- Team Member 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="card">
                  <img src="images/kris.jpg" class="card-img-top" alt="Team Member 2">
                  <div class="card-body">
                     <h5 class="card-title"><strong>Kristine  Jean Marcito</strong></h5>
                  </div>
               </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
               <div class="card">
                  <img src="images/ann.jpg" class="card-img-top" alt="Team Member 3">
                  <div class="card-body">
                     <h5 class="card-title"><strong>Annie Rose T. Lapinod</strong></h5>
               </div>
            </div>
         </div>
      </section>

   </div>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
</body>

</html>