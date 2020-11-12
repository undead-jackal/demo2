<?php
  $choices = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
  // echo "<pre>";
  // print_r($data);
  // echo "</pre>";
  // die
 ?>
<div class="content">
    <div id="updExam" class="container-fluid">
      <form >
        <div class="row justify-content-md-center">
          <div  class="col-md-8 ">
            <div id="q-exam-details" class="card" >
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" value="<?= $data[0]['title'] ?>">
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Passing Score</label>
                      <input type="number" step="0.1" class="form-control" name="score" value="<?= $data[0]['passing'] ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea rows="2" class="form-control" name="description"><?= $data[0]['description'] ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer"></div>
            </div>
          </div>
        </div>

        <section id="question" data-count='<?= count($data)+1 ?>'>
          <input type="hidden" name="id" value="<?= $data[0]['exam_id'] ?>">

          <?php $i=1; ?>
          <?php  foreach ($data as $key): ?>
            <input type="hidden" name="q-id[]" value="<?= $key['id'] ?>">
            <input type="hidden" class="question_delete" name="question_delete" value="">

            <div class="row justify-content-md-center question-holder">
              <div class="card col-lg-9 question-main">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-12">
                            <button data-id="<?= $key['id'] ?>" title="add Choice" class="btn btn-primary round-btn remove-btn rmv-q-btn-e" type="button" name="button"> <i class="fas fa-times"></i> </button>
                            <div class="row">
                              <textarea rows="1" type="text" class="form-control col-lg-9 mr-4 checkquestion" name="question[]" placeholder="Question"><?= $key['question']; ?></textarea>
                              <select class="form-control col-lg-2 answers" name="answer[]">
                                <?php $c=0; foreach (json_decode($key['choices']) as $keyinner): ?>
                                  <?php if ($choices[$c] == $key['answer']): ?>
                                    <option selected value="<?= $choices[$c]?>"><?= $choices[$c]?></option>
                                  <?php else: ?>
                                    <option value="<?= $choices[$c]?>"><?= $choices[$c]?></option>
                                  <?php endif; ?>
                                  <?php $c++;  ?>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-12 insert-choice">
                            <?php $c=0; foreach (json_decode($key['choices']) as $keyinner): ?>
                              <div class="row mb-3">
                                <div class="col-lg-1 text-center choice-letter-holder"><?= $choices[$c] ?></div>
                                <textarea name="choice<?=$i?>[]"  rows="1" class="form-control col-lg-9 mr-2 checkchoice"><?= $keyinner; ?></textarea>
                                <div class="col-lg-1 choice-div">
                                    <button title="add Choice" class="btn btn-primary btn-sm round-btn rmv-choice-btn" type="button" name="button"><i class="fas fa-times"></i></button>
                                </div>
                              </div>
                              <?php $c++;  ?>
                            <?php endforeach; ?>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-12 button-div-actions">
                              <button title="add Choice" data-current="0" data-count="" class="btn btn-sm btn-primary round-btn addChoice" type="button" name="button"> <i class="fas fa-plus"></i> Add Choice </button>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          <?php endforeach; ?>
        </section>


        <section>
          <div class="row justify-content-md-center ">
            <div class="col-lg-8 btn-add-div">
              <button type="submit" class="btn btn-primary btn-save" name="button"> <i class="fas fa-save"></i> </button>
              <button id="add" type="button" class="btn btn-primary btn-add" name="button"> <i class="fas fa-plus"></i> </button>
              <a href="<?= route_to("Exam Creator") ?>" type="button" class="btn btn-primary btn-cancel" name="button"> <i class="fas fa-times"></i> </a>
            </div>
          </div>
        </section>

        <!-- <div id="q-content" class="row justify-content-md-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <input type="hidden" class="question_delete" name="question_delete" value="">
                  <h5>Add Content</h5>
                </div>
                <div class="card-body">
                  <div data-count="<?= count($data)+1 ?>" class="questions_div row">
                    <?php  foreach ($data as $key): ?>
                      <div class="col-md-12 q-code">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group row">
                              <div class="col-sm-2  text-center q-label" style="padding:2%">
                                <h6 class=" q-count"><?= "Q - ".$i ?></h6>
                              </div>
                              <div class="col-sm-9">
                                <label for="">Question</label>
                                <input type="hidden" name="q-id[]" value="<?= $key['id'] ?>">
                                <input type="text" name="question[]" data-current="<?= count(json_decode($key['choices'])) ?>" class="form-control question_input" placeholder="Insert Question" value="<?= $key['question']; ?><?= $key['question']; ?>">
                              </div>
                              <a href="javascript:void(0)" data-id="<?= $key['id'] ?>" type="button" class="col-sm-1 rmv-q-btn-e"><i class="fa fa-times"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 choicesHead">
                            <div class="row">
                              <div class="col-sm-2 col-form-label text-center answer-color">
                                <div class="form-group">
                                  <label>Answer</label>
                                  <select class="form-control answer_select" name="answer[]">
                                    <?php $c=0; foreach (json_decode($key['choices']) as $keyinner): ?>
                                      <?php if ($choices[$c] == $key['answer']): ?>
                                        <option selected value="<?= $choices[$c]?>"><?= $choices[$c]?></option>
                                      <?php else: ?>
                                        <option value="<?= $choices[$c]?>"><?= $choices[$c]?></option>
                                      <?php endif; ?>
                                      <?php $c++;  ?>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-10 insertChoice">
                                <?php $c=0; foreach (json_decode($key['choices']) as $keyinner): ?>
                                <div class="row">
                                    <div class="col-sm-1 col-form-label text-center choiceLetter"><?= $choices[$c] ?></div>
                                    <div class="col-sm-9">
                                      <input type="text" name="choice<?= $i?>[]" class="form-control" placeholder="Insert Choice" value="<?= $keyinner; ?>">
                                    </div>
                                    <div class="col-sm-2 ">
                                      <button type="button" class="btn btn-primary rmv-choice-btn"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <?php $c++;  ?>
                                </div>
                                <?php endforeach; ?>
                              </div>

                            </div>
                            <div class="row justify-content-md-center">
                              <div class="col-sm-12  text-center pt-2">
                                <a data-count="<?=$i ?>" data-choice="<?= count(json_decode($key['choices']))?>" href="javascript:void(0)" class="addChoice">Add Choices</a>
                              </div>
                            </div>
                          <hr>
                        </div>
                      </div>
                      </div>
                      <?php $i++; ?>
                      <?php endforeach; ?>
                    </div>
                  </div>

                <div class="card-footer">
                  <div class="row justify-content-md-center mt-4">
                    <div class="col-md-7">
                      <button type="button" class="btn btn-primary addQuestion w-100" >Add Question</button>
                    </div>
                  </div>
                  <div class="row justify-content-md-center mt-4">
                    <div class="col-md-12">
                      <input type="hidden" name="id" value="<?= $data[0]['exam_id'] ?>">
                      <a href="<?= route_to('Exam Creator') ?>" class="btn btn-secondary" data-dismiss="modal">Go Back</a>
                      <button type="submit" class="btn btn-primary" data-dismiss="modal"> Save Changes</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </div> -->
      </form>
    </div>
</div>


<script src="<?= getAssets("js/exam.js") ?>" charset="utf-8"></script>
<?php
include 'modal.php';
?>
