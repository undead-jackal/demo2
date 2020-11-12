$(document).ready(function() {
  examTable();

  $("#submitExam").submitform({
    url:"/gradeExam",
    callback:function(data){
      $('.scored').html(data['score']+ " - " + data['rate']+"%");
      if (data['did_pass']) {
        showNotification("top", "right", "Congrats you passed!!", "success");
      }else {
        showNotification("top", "right", "Sorry AHOOOOO!!", "danger");
      }
      $('.sub').hide();
      $('input[type="radio"]').attr('disabled',true);
      for (var i = 0; i < data['total_q']; i++) {
        var e = $('input[name="choice'+(i+1)+'"]:checked').val();
        if (e != data['array'][i]) {
          $('input[name="choice'+(i+1)+'"]:checked').parent().html("<i style='color:red' class='fa fa-times'></i>")
        }else {
          $('input[name="choice'+(i+1)+'"]:checked').parent().html("<i style='color:green' class='fa fa-check'></i>")
        }
      }
    },
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
          return data.passing;
      },
      function(data) {
          return (data.result != null) ?data.result: "N/A";
      },

      function(data) {
        return '<a href="user/take/'+data.id+'" class="btn btn-sm mr-2 "><i class="fa fa-eye"></i></a>';
      },
    ]
  })
}
