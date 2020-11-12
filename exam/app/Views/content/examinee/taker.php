<?php
  $choices = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
 ?>
<div class="content">
  <form id="submitExam">
    <div class="container-fluid">
      <div  class="row justify-content-md-center">
        <div class="col-md-8 ">
          <div id="q-exam-details" class="card" >
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
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
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Your Score</label>
                    <h5 class="scored">
                      <?php if ($has_taken): ?>
                        <?php $res = (int)$result_perc;?>
                        <?= $result ." - ".$res ." %" ?>
                      <?php else: ?>
                        N/A
                      <?php endif; ?>
                    </h5>
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
    </div>

    <section id="question" data-count='1'>
      <input type="hidden" name="exam_id" value="<?= $data[0]['exam_id'] ?>">
      <?php $i=1; ?>
      <?php  foreach ($data as $key): ?>
        <div class="row justify-content-md-center question-holder">
          <div class="card col-lg-9 question-main">
              <div class="card-body">
                  <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <span class="view-q col-lg-9 mr-4">Question: <h5><?= $key['question']; ?></h5> </span>

                        </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 insert-choice">
                        <?php $c=0; foreach (json_decode($key['choices']) as $keyinner): ?>
                          <?php if (!$has_taken): ?>
                            <div class="row mb-3">
                              <div class="col-lg-1 choice-letter-holder">
                                <input type="radio" class="form-control answer-me" name="choice<?=$i?>" value="<?= $choices[$c] ?>">
                              </div>
                              <span class="view-c col-lg-9 mr-4"><h5><?= $keyinner; $choices[$c]?></h5></span>
                            </div>
                           <?php else: ?>
                             <div class="row mb-3">
                               <div class="col-lg-1 col-form-label text-center choice-letter-holder">
                                 <?php if ($choices[$c]== $examinee[$i-1]): ?>
                                   <?php if ($choices[$c]== $key['answer']): ?>
                                     <i class="fa fa-check" style="color:green"></i>
                                   <?php else: ?>
                                     <i class="fa fa-times" style="color:red"></i>
                                   <?php endif; ?>
                                 <?php else: ?>
                                   <input type="radio" disabled value="<?= $choices[$c] ?>">
                                 <?php endif; ?>
                               </div>
                               <span class="view-c col-lg-9 mr-4"><h5><?= $keyinner; ?></h5></span>
                             </div>
                         <?php endif; ?>
                         <?php $c++;  ?>
                        <?php endforeach; ?>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <?php $i++;  ?>
      <?php endforeach; ?>
    </section>

    <section>
      <div class="row justify-content-md-center ">
        <div class="col-lg-8 btn-add-div">
          <?php if (!$has_taken): ?>
            <button type="submit" class="btn btn-primary btn-add" name="button"> <i class="fas fa-save"></i> </button>
          <?php endif; ?>
          <a href="<?= route_to("examTaker") ?>" type="button" class="btn btn-primary btn-cancel" name="button"> <i class="fas fa-times"></i> </a>
        </div>
      </div>
    </section>
  </form>
</div>

<script src="<?= getAssets("js/examinee.min.js") ?>" charset="utf-8"></script>
