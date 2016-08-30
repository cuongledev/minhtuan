$(document).ready(function() {
  
  //POPUP CONTACT

  $(document).on('click', '#rep-contact-user', function() {
    var id = $(this).attr('data-id');
    var reply = $('#reply-'+id).val();
    $.ajax({
      url: baseUrl+'backend/contact/reply',
      type: 'post',
      dataType: 'json',
      data: {
        'id': id,
        'reply': reply
      },
      success: function(result){
        $('#reply-'+id).val(result['list']['reply']);
        /*if( result['success'] == 1 ){
          toastr["success"](result['msg'], "Thông báo");
        }else{
          toastr["error"](result['msg'], "Thông báo");
        }*/
        
        $("#close-contact-user").trigger('click');
      }
    })
  });

  //DATE-TIME-PICKER
  /*$(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
   
  if( $('#status').val() == 2 ){
    $('.public-date').show();
  }else{
    $('.public-date').hide();
  }
    $('#status').change(function() {
      if( $(this).val() == 2 ){
        $('.public-date').show();
      }else{
        $('.public-date').hide();
      }
    });*/

    // file(news/addnews_view) change upload favicon
  $('body').on('change','.avatar_news',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFile('.thumbnail_news img','.avatar_news','#avatarOld');
                    break;
                default:
                // error message here
                toastr["warning"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','.del_avatar_news',function(){
    $('.thumbnail_news img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('.avatar_news').val('');
    $('#avatarOld').val('');
  });

    //Checkbox all
    $('#checkboxAll').click(function() {
        if ($(this).prop("checked") == true) {
            $('.checkboxes').each(function(index) {
                $(this).prop("checked", true);
                $(this).parent().addClass('checked');
            });

            $(".btn-del a").removeClass('disabled');
        } else if ($(this).prop("checked") == false) {
            $('.checkboxes').each(function(index) {
                $(this).prop("checked", false);
                $(this).parent().removeClass('checked');
            });
            $(".btn-del a").addClass('disabled');                
        }
        
    });
    $('.checkboxes').click(function() {
        if ($(this).prop("checked") == false) {
            $('#checkboxAll').prop("checked", false);
            $('#checkboxAll').parent().removeClass('checked');
            $(".btn-del a").removeClass('disabled');
        }
    });

    $('.checkboxes').change(function() {
      if ($('.checkboxes:checked').length > 0) {
          $(".btn-del a").removeClass('disabled');
      }else {
          $(".btn-del a").addClass('disabled');
      }
    });

    //change status news
    $('body').on('click','#form_infolist_news .active_status',function(){
      var obj = $(this);
      var url = baseUrl+'backend/news/updateStatus';
      change_status( obj, url );
    });

    //change status category_news
    $('body').on('click','#form_infolist_catnews .active_status',function(){ 
      var obj = $(this);
      var url = baseUrl+'backend/category_news/updateStatus';
      change_status( obj, url );
    });

    //change status students
    $('body').on('click','#form_infolist_students .active_status',function(){ 
      var obj = $(this);
      var url = baseUrl+'backend/students/updateStatus';
      change_status( obj, url );
    });

    //change status salary
    $('body').on('click','.active_status_salary',function(){
      var obj = $(this);
      var url = baseUrl+'backend/salary/updateStatus';
      change_status( obj, url );
    });

    //change status post job
    $('body').on('click','.active_status_postjob',function(){
      var obj = $(this);
      var url = baseUrl+'backend/postjob/updateStatus';
      change_status( obj, url );
    });

    //change status contact
    $('body').on('click','.btn-show-contact',function(){    
      var id = $(this).attr('data-id');
      var status = $(this).attr('data-status');
      $('.reply-contact-'+id).show();
      if( status == 0 ){
        var url = baseUrl+'backend/contact/updateStatus';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
              'id_user': id,
              'status': status
            },
            success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {
                    if (data.idstatus==1) {
                        $('#cont_status_'+id).removeClass('red-stripe');
                        $('#cont_status_'+id).addClass('green-stripe');
                        $('#cont_status_'+id).attr('data-status',1);
                        $('#cont_status_'+id).html('Đã xem');
                        $('#btn-show-contact-'+id).attr('data-status', 1);
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
      }

    });

    // change sort news
  $('body').on('blur', '#form_infolist_news .edit_sort', function() {
    var id = $(this).attr('data-id');
    var sort = $(this).val();
    var url = baseUrl+'backend/news/updateSort';
    change_sort( '#form_infolist_news', id, url, sort );
  });

  // change sort category news 
  $('body').on('blur', '#form_infolist_catnews .edit_sort', function() {
    var id = $(this).attr('data-id');
    var sort = $(this).val();
    var url = baseUrl+'backend/category_news/updateSort';
    change_sort( '#form_infolist_catnews', id, url, sort );
  });

  // END---change sort
  //search students
  $('#btn_search_student').click(function() {
    var sv_status = $('#sv_status').val();
    var sv_name = $('#sv_name').val();
    if( sv_name == '' ){
      window.location.href = baseUrl+'backend/students/search/'+sv_status;  
    }else{
      window.location.href = baseUrl+'backend/students/search/'+sv_status+'/'+sv_name;
    }
    
  });

  // search post job
  $('#btn_search_job').click(function() {
    var status = $('#s_status').val();
    var stxt = $('#stxt').val();
    if( stxt == '' ){
      window.location.href = baseUrl+'backend/postjob/search/'+status;  
    }else{
      window.location.href = baseUrl+'backend/postjob/search/'+status+'/'+stxt;
    }
    
  });

  $('body').on('keyup', '#form_salary #salary_from', function() {
      var sal_from = parseFloat($('#form_salary #salary_from').val());
      var sal_to = parseFloat($('#form_salary #salary_to').val());
      if( sal_from < 0 ) {
        toastr["error"]('Mức lương không được mang giá trị âm', "Thông báo");
      }else if( sal_from > sal_to && sal_to != '' ){
        toastr["error"]('Mức lương khởi điểm vượt quá mức lương giới hạn', "Thông báo");
      }
  });

  $('body').on('keyup', '#form_salary #salary_to', function() {
      var sal_from = parseFloat($('#form_salary #salary_from').val());
      var sal_to = parseFloat($('#form_salary #salary_to').val());
      if( sal_to < 0 ) {
        toastr["error"]('Mức lương không được mang giá trị âm', "Thông báo");
      }else if( sal_from > sal_to && sal_to != '' ){
        toastr["error"]('Mức lương khởi điểm vượt quá mức lương giới hạn', "Thông báo");
      }
  });

  $('body').on('blur', '#sv_email', function() {
    var email = $(this).val();
    $.ajax({
        url: baseUrl+'backend/students/checkEmail',
        type: 'post',
        dataType: 'json',
        data: {
          'email_check': email
        },
        success: function(result) {
          if( result ){
            if( result['exists'] ){
              toastr["error"](result['msg'], "Thông báo");
            }else{
              toastr["success"](result['msg'], "Thông báo");
            }
          }
        }
    });

  });

  //CKEditor Config
  editCKEditor( 'hr_desc' );
  editCKEditor( 'hr_benifit' );
  editCKEditor( 'hr_work_request' );
  editCKEditor( 'hr_profile_request' );
  editCKEditor( 'com_desc' );

  //Date picker
  $('.datepicker').datepicker();


}); 

function refresh_contact(result){
  var html ='';
  $.each(result, function (key, item) {
    html += '<tr>';
      html += '<td><input type="checkbox" name="name_id[]" class="checkboxes" /></td>';
      html += '<td>'+ item['email'] +'</td>';
      html += '<td>'+ item['phone'] +'</td>';
      html += '<td class="hidden-xs">'+ item['create_time'] +'</td>';
      html += '<td>';
      if(item['status'] == 0){
        html += '<a class="btn default btn-xs red-stripe active_fix" data-status="'+ item['status'] +'" style="width:73px;color: #333333;background-color: #e5e5e5;">Chưa xem</a>';
      }else{
        html += '<a class="btn default btn-xs green-stripe active_fix" data-status="'+ item['status'] +'" style="width:73px;color: #333333;background-color: #e5e5e5;">Đã xem</a>';
      }

      if(item['contact_type'] == 1){
        html += '<a class="btn default btn-xs active_fix" style="width:73px;color: #fff;background-color: #F93;">Cá nhân</a>';
      }else if(item['contact_type'] == 2) {
        html += '<a class="btn default btn-xs active_fix" style="width:73px;color: #fff;background-color: #36F;">Trường học</a>';
      }

      html += '</td>';
      html += '<td class="icon-btn">';
      html += '<a href="javascript:;" class="btn btn-xs green tooltips btn_lnc_fix" data-id="'+ item['id'] +'" data-status="'+ item['status'] +'"><i class="fa fa-eye"></i> Trả lời</a>';
      html += '<a href="javascript:;" class="btn btn-xs red tooltips btn-del-contact btn_lnc_fix" data-id="'+ item['id'] +'"><i class="fa fa-trash-o"></i> Xóa</a>';
    html += '</tr>';    
  });

  $('#infolist-contact tbody').html(html);
}

// file(info/index_view) function freview images
function previewFile(img,files,hidden) {
  var preview = document.querySelector(img);
  var file    = document.querySelector(files).files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    //preview.src = reader.result;
    $(preview).attr('src',reader.result);
    $(hidden).val(reader.result);
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}

function change_status( obj, url ){
    var id_status =  obj.attr('data-status');
    var id_user = obj.attr('data-id');
    $.ajax({
      url: url,
      type: 'POST',
      dataType: 'json',
      data: {
          'status': id_status,
          'id_user':id_user
        },
      success: function(data) {
        //called when successful
        if (data) {
            if (data.status==true) {
                if (data.idstatus==1) {
                    obj.removeClass('red-stripe');
                    obj.addClass('green-stripe');
                    obj.attr('data-status',1);
                    obj.html('Đang hiện');
                }else{
                    obj.removeClass('green-stripe');
                    obj.addClass('red-stripe');
                    obj.attr('data-status',0);
                    obj.html('Đang ẩn');
                }
                toastr["success"](data.mess, "Thông báo");
            }else{
                toastr["error"](data.mess, "Thông báo");
            }
        };
      },
    });

}

function change_sort( form, id, url, sort ){
    $.ajax({
      url: url,
      type: 'POST',
      dataType: 'json',
      data: {
          'sort': sort,
          'id':id
        },
      success: function(data) {
        if (data) {
            if (data.sort==true) {
                toastr["success"](data.mess, "Thông báo");
            }else{
                toastr["error"](data.mess, "Thông báo");
            }
            $(form+' .edit_sort_'+id).val( data.item['sort'] );
        }
      }

    });
}

function editCKEditor( name ){
    CKEDITOR.replace( name, {
    // Define the toolbar groups as it is a more accessible solution.
    toolbarGroups: [
    {"name":"basicstyles","groups":["basicstyles"]},
    {"name":"links","groups":["links"]},
    {"name":"paragraph","groups":["list","blocks"]},
    {"name":"document","groups":["mode"]},
    {"name":"insert","groups":["insert"]},
    {"name":"styles","groups":["styles"]},
    {"name":"about","groups":["about"]}
    ],
    // Remove the redundant buttons from toolbar groups defined above.
    removeButtons: 'Print,Iframe,Preview,Save,NewPage,CreateDiv,Underline,Subscript,Superscript,Image,Link,Maximize,Blockquote,About,Strike,Source,Table,HorizontalRule,SpecialChar,Anchor,Unlink,Scayt,PasteText,PasteFromWord,Cut,Copy,Paste,Undo,Redo,Flash'
    } );
}