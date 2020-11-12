<div class="content">
  <div id="addExam" class="container-fluid">
      <form id="addExamForm">
        <div  class="row justify-content-md-center">
          <div class="col-md-8 ">
            <div id="q-exam-details" class="card" >
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" data-jrule="required" name="title" value="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Passing Score</label>
                      <input type="number" step="0.1" min="0" max="100" class="form-control" data-jrule="required" name="score" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea  data-role="textarea" data-jrule="required" name="description"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer"></div>
            </div>
          </div>
        </div>


        <section id="question" data-count='1'></section>
        <section>
          <div class="row justify-content-md-center text-center">
            <div class="col-lg-8 btn-add-div">
              <button type="submit" class="btn btn-primary btn-save" name="button"> <i class="fas fa-save"></i> </button>
              <button id="add" type="button" class="btn btn-primary btn-add" name="button"> <i class="fas fa-plus"></i> </button>
              <a href="<?= route_to("Exam Creator") ?>" type="button" class="btn btn-primary btn-cancel" name="button"> <i class="fas fa-times"></i> </a>
            </div>
          </div>
        </section>

      </form>
  </div>
</div>

<script src="<?= getAssets("js/exam.js") ?>" charset="utf-8"></script>
<?php
include 'modal.php';
?>
