<?php
  $choices = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
  // echo "<pre>";
  // print_r($data);
  // echo "</pre>";
  // die
 ?>
<div class="content">
  <form>
    <div class="container-fluid">
        <div  class="row justify-content-md-center">
          <div class="col-md-8">
            <div id="q-exam-details" class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Title</label>
                      <h5><?= $data[0]['title'] ?></h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Passing Score</label>
                      <h5><?= $data[0]['passing']."%" ?></h5>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <p class=""><?= $data[0]['description']?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer"></div>
            </div>
          </div>
        </div>

        <section id="question" data-count='1'>
            <?php $i=1; ?>
            <?php  foreach ($data as $key): ?>
              <div class="row justify-content-md-center question-holder">
                <div class="card col-lg-9 question-main">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="row">
                                <span class="view-q col-lg-9 mr-4">Question: <h5><?= $key['question']; ?></h5> </span>
                                <span class="view-q col-lg-2 mr-4">Answer: <h5><?= $key['answer']; ?></h5></span>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 insert-choice">
                              <?php $c=0; foreach (json_decode($key['choices']) as $keyinner): ?>
                                <div class="row mb-3">
                                  <div class="col-lg-1 text-center choice-letter-holder">
                                    <div class="view-c-btn"><?= $choices[$c] ?></div>
                                  </div>
                                  <span class="view-c col-lg-9 mr-4"><h5><?= $keyinner; ?></h5></span>
                                </div>
                                <?php $c++;  ?>
                              <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            <?php endforeach; ?>

        </section>
        <!-- <div id="q-content" class="row justify-content-md-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h5>Exam Content</h5>
                  <a href="<?= route_to('Exam Creator') ?>" class="btn btn-secondary" data-dismiss="modal">Go Back</a>
                  <a href="<?php $href = "demo3/editThisExam/".$data[0]['exam_id'] ;echo site_url($href) ?>" class="btn btn-primary mr-2">Edit</a>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <?php $i=1; ?>
                      <div data-count="<?= $i ?>" class="questions_div row">
                        <?php  foreach ($data as $key): ?>
                          <div class="col-md-12 q-code">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <div class="col-sm-2  text-center q-label" style="padding:2%">
                                    <h6 class=" q-count"><?= "Q - ".$i ?></h6>
                                  </div>
                                  <?php $i++; ?>
                                  <div class="col-sm-9">
                                    <h5><?= $key['question']; ?></h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12 choicesHead">
                                <div class="row">
                                  <div class="col-sm-2 col-form-label text-center answer-color">
                                    <div class="form-group">
                                      <label>Answer</label>
                                      <h4><?= $key['answer']; ?></h4>
                                    </div>
                                  </div>
                                <div class="col-sm-10 insertChoice">
                                  <?php $c=0; foreach (json_decode($key['choices']) as $keyinner): ?>
                                  <div class="row">
                                      <div class="col-sm-1 col-form-label text-center choiceLetter"><?= $choices[$c] ?></div>
                                      <div class="col-sm-9">
                                        <h5><?= $keyinner; ?></h5>
                                      </div>
                                      <?php $c++;  ?>
                                  </div>
                                  <?php endforeach; ?>

                                </div>
                              </div>
                              <hr>
                            </div>
                          </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">

                </div>
              </div>
            </div>
        </div> -->
    </div>
  </form>
</div>


<script src="<?= getAssets("js/exam.js") ?>" charset="utf-8"></script>
<?php
include 'modal.php';
?>
