<section id="main">
   <div class="row justify-content-md-center justify-content-sm-center justify-content-center">
       <div class="col-lg-6 col-md-12">
         <div class="alert alert-info alert-with-icon" data-notify="container">
             <span data-notify="icon" class="fas fa-info-circle"></span>
             <span data-notify="message">
                 <p class="text-justify" style="font-family:norwester; font-weight:bold; letter-spacing:1px">
                     This purpose of this project is to create an online exam system for both student and teachers
                 </p>
                 <p class="text-justify" style="font-family:norwester; font-weight:bold; letter-spacing:1px">
                     This program serves only for the purpose of how far my knowledge in programming is as an entry level programmer. I will take any suggestions, recommendations, or criticisms for better coding, Thank you for your time.
                 </p>
             </span>
         </div>
       </div>
     <div class="card col-lg-7 col-md-7 col-sm-9">
        <div class="card-header">
           <h4>Exam</h4>
        </div>
        <div class="card-body">
           <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                     <div class="d-flex w-100 justify-content-between">
                       <h5 class="mb-1">Login As Admin</h5>
                     </div>
                     <p class="mb-1 mt-1">
                        You can Create Exam, Update Exam, Delete Exam and View Exam
                     </p>
                     <a href="<?= route_to("Exam Creator") ?>" type="button" class="btn btn-primary mr-4 login" name="button">Login</a>
                </div>

                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                     <div class="d-flex w-100 justify-content-between">
                       <h5 class="mb-1">Login As Student</h5>
                     </div>
                     <p class="mb-1 mt-1">
                        You can Take Exam and View Exam
                     </p>
                     <a href="<?= route_to("examTaker") ?>" type="button" class="btn btn-primary mr-4 login" name="button">Login</a>
                </div>

           </div>
        </div>

     </div>
   </div>
</section>
