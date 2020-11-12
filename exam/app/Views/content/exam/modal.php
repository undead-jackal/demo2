<div class="modal fade" id="addExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" value="">
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label>Passing Score</label>
                  <input type="number" step="0.1" class="form-control" name="score" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="summernote" name="description"></textarea>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <h5>Add Questions</h5>
                <div class="questions_div row">


                </div>
              </div>
            </div>

            <div class="row justify-content-md-center mt-4">
              <div class="col-md-7">
                <button type="button" class="btn btn-primary addQuestion w-100" >Add Question</button>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </form>
    </div>
  </div>
</div>
