
$(document).ready(function(){
      $('input[name="score"]').keyup(function(){
       if ($(this).val() > 100){
          $(this).val('');
       }
      });

  if (window.location.href.indexOf("viewScores") > -1) {
    scoreTable();
  }else {
    examTable();
  }

  var count = $('#question').data("count");
  var choiceCount = 0;
  var choices = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
  var answer;

  const Question = ({count}) => `
    <div class="row justify-content-md-center question-holder">
      <div class="card col-lg-9 question-main">
          <div class="card-body">
              <div class="row">
                  <div class="col-lg-12">
                    <button title="add Choice" class="btn btn-primary round-btn remove-btn rmv-q-btn" type="button" name="button"> <i class="fas fa-times"></i> </button>
                    <div class="row">
                      <textarea rows="1" data-role="textarea" type="text" data-jrule="required"  class="checkquestion form-control col-lg-9 mr-4" name="question[]" placeholder="Question"></textarea>
                      <select class="form-control col-lg-2 answers" name="answer[]">
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12 insert-choice"></div>
              </div>
              <div class="row">
                  <div class="col-lg-12 button-div-actions">
                      <button title="add Choice" data-current="0" data-count="${count}" class="btn btn-sm btn-primary round-btn addChoice" type="button" name="button"> <i class="fas fa-plus"></i> Add Choice </button>
                  </div>
              </div>
          </div>
      </div>
    </div>
  `;

  const Choice = ({count, index}) => `
  <div class="row mb-3">
    <div class="col-lg-1 text-center choice-letter-holder">
        ${index}
    </div>
    <textarea name="choice${count}[]"  rows="1" class="form-control col-lg-9 mr-2 checkchoice"></textarea>
    <div class="col-lg-1 choice-div">
        <button title="add Choice" class="btn btn-primary btn-sm round-btn rmv-choice-btn" type="button" name="button"><i class="fas fa-times"></i></button>
    </div>
  </div>`;

  const Answer = ({letter}) => `<option value="${letter}">${letter}</option>`

  $("#addExamForm").submitform({
     url:"/addExam",
     callback:function(data){
           swal({
               title: "Successfully",
               text: "Exam has been created Successfully",
               type: "success",
               showCancelButton: false,
               confirmButtonText: "OK",
               cancelButtonText: "No, cancel please!",
               closeOnConfirm: false,
               closeOnCancel: false,
               onClose:refresh()
         }, function(isConfirm) {
               if (isConfirm) {window.location.reload();}
           });
     },
     doBefore:function(xhr) {
           if (!allOkay()) {
              xhr.abort();
              swal({
                  title: "Ooopss",
                  text: "Make sure you have added a question and you have added choices also check if all details are filled up",
                  type: "warning",
                  showCancelButton: false,
                  confirmButtonText: "OK",
                  closeOnConfirm: false,
                  closeOnCancel: false,
            });
           }
     }
  })

// the porpuse for this is for swal to redirect on overlay click
  function refresh() {window.location.reload();}
// di modawat ang skill

  $(document).on('click', '#add', function() {
    $('#question').append([
      { count: count},
    ].map(Question).join(''));
    count++;
    choiceCount = 0;
  })

  $(document).on('click', '.rmv-q-btn-e',function(e){
    e.preventDefault();
    $('.question_delete').val($(this).data('id')  +  ',' + $('.question_delete').val() );
    count = count - 1 ;
    $(this).parents('.question-main').remove();
  })

  $(document).on('click','.addChoice',function(e) {
    e.preventDefault();
    var str = "";
    var str_choice="";
    var index = $(this).data("current");
    $(this).parents('.question-main').find(".insert-choice").append([
      { count: $(this).data('count') , index: choices[index]},
    ].map(Choice).join(''));
    choiceCount = index + 1;
    $(this).data("current", choiceCount);
    $(this).parents('.question-main').find(".answers").append([
      { letter: choices[index] },
    ].map(Answer).join(''));
  })

  $(document).on('click','.rmv-choice-btn',function(e) {
    e.preventDefault();
    var head = $(this).parents('.question-main').find('.insert-choice');
    var index = $(this).parents('.question-main').find(".addChoice").data("current")- 1;
    $(this).parents('.question-main').find(".addChoice").data("current", index);
    $(this).parent().parent().remove();
    $(head.find('.choice-letter-holder')).each(function(i) {
      $(this).html(choices[i]);
    });
  })

  $(document).on('click','.rmv-q-btn',function(e) {
    e.preventDefault();
    count = count - 1 ;
    $(this).parents('.question-main').remove();
  })

  $(document).on('click','.rmv-btn',function(e) {
    e.preventDefault();
    var id = $(this).data("id");
        swal({
            title: "Are you sure you want to Remove this Exam?",
            text: "You will not be able to recover this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Remove it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
               $.onlySubmit({
                  url:"/removeExam",
                  data:{
                    id:id
                  },
                  callback:function(data) {
                    swal("Deleted!", "Exam Removed.", "success");
                    examTable();
                  }
               })
            } else {
                swal("Cancelled", "Nothin was Removed", "warning");
            }
        });
  })

  $("#updExam form").submitform({
    url:"/updateExam",
    callback:function(data){
       swal({
             title: "Successfully",
             text: "Exam has been updated Successfully",
             type: "success",
             showCancelButton: false,
             confirmButtonText: "OK",
             cancelButtonText: "No, cancel please!",
             closeOnConfirm: false,
             closeOnCancel: false,
       }, function(isConfirm) {
             if (isConfirm) {
                   showNotification("top", "right", "Exam Updated", "success");
                   var href_this =location.href.replace('editThisExam/19', 'examcreator');
                   location.href = href_this;
             }
        });
    },
    doBefore:function(xhr) {
          if (!allOkay()) {
                   swal({
                       title: "Ooopss",
                       text: "Make sure you have added a question and you have added choices also check if all details are filled up",
                       type: "warning",
                       showCancelButton: false,
                       confirmButtonText: "OK",
                       closeOnConfirm: false,
                       closeOnCancel: false,
                });
                xhr.abort();
          }
    }
  })

})

function examTable() {
  $('#examTable').table({
    url:"/viewExamsAdmin",
    data:{
      per_page:5,
    },
    render:[
      function(data) {
        return data.id;
      },
      function(data) {
          return data.title;
      },
      function(data) {
          return data.description;
      },
      function(data) {
          return parseInt(data.passing) + "%";
      },

      function(data) {
        return '<a href="admin/viewThisExam/'+data.id+'" class="btn btn-sm mr-2"><i class="fa fa-eye"></i></a><a href="admin/editThisExam/'+data.id+'" class="btn btn-sm mr-2"><i class="fa fa-edit"></i></a><button data-id="'+data.id+'"  class="btn rmv-btn btn-sm"><i class="fa fa-trash"></i></button>';
      },
    ]
  })
}

  function allOkay() {
       var error = 0; var choiceerr = 0; var total_q = 0;var count = 0; var choice=0;
       $('.checkquestion').each(function(i) {
             if ($(this).val() != "") {total_q++; }
             $('.checkchoice').each(function() {
                   if ($(this).val().length != 0) { choice++; }
                   count++;
             })
       })

    if ( total_q == 0) {
          return false;
    }else{
         if (choice == count ) {return true;}else { return false;}
    }
  }
function scoreTable() {
  $('#scoreTable').table({
    url:"/viewExamsScore",
    data:{
      per_page:5,
    },
    render:[
      function(data) {
        return data.id;
      },
      function(data) {
          return data.title;
      },
      function(data) {
          return data.first_name + " " + data.last_name;
      },
      function(data) {
          return data.result;
      },
      function(data) {
          return (data.did_pass == 1)?"PASSED":"FAILED";
      },

    ]
  })
}
