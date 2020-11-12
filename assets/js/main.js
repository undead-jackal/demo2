$(document).ready(function(){
  // $(document).on('blur', '.autocomplete_name', function(e){
  //   setTimeout(function () {
  //     $(this).parent().find(".drp-focus").css("visibility", "hidden!import");
  //     alert();
  //   }, 1000);
  // })
  //
  //
  // $('.summernote').summernote({
  //         tabsize: 2,
  //         height: 200,
  //         toolbar: [
  //           ['style', ['style']],
  //           ['font', ['bold', 'underline', 'clear']],
  //           ['color', ['color']],
  //           ['para', ['ul', 'ol', 'paragraph']],
  //           ['table', ['table']],
  //           ['insert', ['link', 'picture', 'video']],
  //           ['view', ['fullscreen', 'codeview', 'help']]
  //         ]
  //       });
  
  $('.send').on('click',function(e){
    e.preventDefault();
    $("#send_loader").css("display","flex");
    setTimeout(function () {
      $('#send-email').submit();
      $("#send_loader").css("display","none");
    }, 1000);
  })

    $("#send-email").submitform({
      url:"/sendEmail",
      callback:function(data){
        if (data) {
          $("#send-email")[0].reset();
          showNotification("top", "right", "Email Sent", "success");
        }
      }
    })


  //
  // $(document).on('keyup','.autocomplete_name',function(e) {
  //   var self = $(this);
  //   $.simpletSubmit({
  //     url:"/autocompleteHelper",
  //     data:{
  //       key: $(this).val()
  //     },
  //     callback:function(data) {
  //       var str = "";
  //       self.parent().find(".drp-focus").css("visibility", "visible");
  //
  //       if (data.result.length != 0) {
  //         $(data.result).each(function(i, val){
  //           str += "<a data-id='"+val.id+"' class='dropdown-item autocomplete_item' href='#'>";
  //               str += val.name;
  //           str += "</a>";
  //         })
  //       }else {
  //           str += "<a class='dropdown-item' href='#'>";
  //               str += "No Result";
  //           str += "</a>";
  //       }
  //       self.parent().find(".drp-focus").html(str);
  //     }
  //   })
  // })
})

function showNotification(from, align, message, type) {
  $.notify({
      icon: "nc-icon nc-app",
      message: message

  }, {
      type: type,
      timer: 1000,
      placement: {
          from: from,
          align: align
      }
  });
}
