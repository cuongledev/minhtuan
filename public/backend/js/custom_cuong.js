$(document).ready(function(){
	// file(info/index_view) load district - province
	var provinces = $( "#info_index #provinces option:selected" ).val();
	var data_option = $('#info_index #districtid').attr('data-option');
	var info_id = $('#info_index #districtid').attr('data-id');
	jQuery.ajax({
	  url: baseUrl+'backend/info/loadDitrict',
	  type: 'POST',
	  dataType: 'json',
	  data: {provinces: provinces},
	  success: function(data, textStatus, xhr) {
	  	//console.log(data);
	    //called when successful
	   var html = '<option value="0" selected>'+data_option+'</option>';
                $.each( data, function( k, v ) {
                    if(info_id!=v.districtid){
                        var select='';
                    }else{
                        var select='selected';
                    }
                    html += '<option value="'+v.districtid+'" '+select+'>'+v.nhanh_name+'</option>';
                });
               $('#info_index #districtid').html(html);
	  },
	});

    // file(info/index_view) change upload image Contact
  $('body').on('change','#info_index .file_contact',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#info_index .contact_thumbnail img','#info_index .file_contact','#info_index #hidden_img_contact');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });




	// file(info/index_view) change upload logo
	$('body').on('change','#info_index .file_logo',function(){
		var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                	previewFileC('#info_index .logo_thumbnail img','#info_index .file_logo','#info_index #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
               	return false;
                break;
            }
	});
	// file(info/index_view) change upload favicon
	$('body').on('change','#info_index .favicon_news',function(){
		var val2 = $(this).val();
            switch(val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                	previewFileC('#info_index .favicon_thumbnail img','#info_index .favicon_news','#info_index #hidden_img2');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
               	return false;
                break;
            }
	});

  // file(Company/edit_view) change upload logo
  $('body').on('change','#company_edit .file_logo',function(){
    var val2 = $(this).val();
            switch(val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#company_edit .logo_thumbnail img','#company_edit .file_logo','#company_edit #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });

  // file(Hiring/edit_view) change upload logo
  $('body').on('change','#hiring_edit .file_logo',function(){
    var val2 = $(this).val();
            switch(val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#hiring_edit .logo_thumbnail img','#hiring_edit .file_logo','#hiring_edit #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  // file(Schools/edit_view) change upload logo
  $('body').on('change','#schools_edit .file_logo',function(){
    var val2 = $(this).val();
            switch(val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#schools_edit .logo_thumbnail img','#schools_edit .file_logo','#schools_edit #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
    // file(Pages/edit_view) change upload Thumbnail
  $('body').on('change','#pages_index .file_logo',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#pages_index .logo_thumbnail img','#pages_index .file_logo','#pages_index #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });



  $('body').on('click','#pages_index .fileinput-exists1',function(){
    $('#pages_index .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#pages_index .file_logo').val('');
    $('#pages_index #hidden_img1').val('');
  });

// file(Setting_panel/edit_view) change upload logo
$('body').on('change','#setting_panel .file_logo',function(){
  var val2 = $(this).val();
          switch(val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()){
              case 'gif': case 'jpg': case 'jpge': case 'png':
                previewFileC('#setting_panel .logo_thumbnail img','#setting_panel .file_logo','#setting_panel #hidden_img1');
                  break;
              default:
              // error message here
              toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
              return false;
              break;
          }
});
$('body').on('click','#setting_panel .fileinput-exists1',function(){
  $('#setting_panel .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
  $('#setting_panel .file_logo').val('');
  $('#setting_panel #hidden_img1').val('');
});










// lay tọa độ chuột
//var offset = $("#setting_panel .thumbnail").offset();
$("#setting_panel .thumbnail").on("mousemove", function( event ) {
  var parentOffset = $(this).parent().offset();
  var relativeXPosition = (event.pageX - parentOffset.left); //offset -> method allows you to retrieve the current position of an element 'relative' to the document
  var relativeYPosition = (event.pageY - parentOffset.top);
  //$(this).text( "pageX: " + relativeXPosition   + ", pageY: " + relativeYPosition );
});

/*$("#setting_panel .thumbnail").click(function(event) {
    var c = document.getElementById("thumbnail_canvas");
    var ctx = c.getContext("2d");
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(50, 100);
    ctx.stroke();
});*/
  
/*var clicks = 0;
var lastClick = [0, 0];

document.getElementById("thumbnail_canvas").addEventListener("click", drawLine, false);

function getCursorPosition(e) {
    var x;
    var y;

    if (e.pageX != undefined && e.pageY != undefined) {
        x = e.pageX;
        y = e.pageY;
    } else {
        x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
        y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }
    
    return [x, y];
}

function drawLine(e) {
    context = this.getContext('2d');

    x = getCursorPosition(e)[0] - this.offsetLeft;
    y = getCursorPosition(e)[1] - this.offsetTop;

    
    if (clicks != 1) {
        clicks++;
    } else {
        var parentOffset = $(this).parent().offset();
        context.beginPath();
        context.moveTo(lastClick[0] - parentOffset.left , lastClick[1] - parentOffset.top );
        //console.log(lastClick[0]);
        //console.log(x);
        context.lineTo(x, y);
        
        context.strokeStyle = '#000000';
        context.stroke();
        
        clicks = 0;
    }
    
    lastClick = [x, y];
}*/































      // file(Slider/edit_view) change upload Thumbnail
  $('body').on('change','#slider_index .file_logo',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#slider_index .logo_thumbnail img','#slider_index .file_logo','#slider_index #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#slider_index .fileinput-exists1',function(){
    $('#slider_index .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#slider_index .file_logo').val('');
    $('#slider_index #hidden_img1').val('');
  });

    // file(Category/edit_view) change upload Thumbnail
  $('body').on('change','#category_index .file_logo',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#category_index .logo_thumbnail img','#category_index .file_logo','#category_index #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#category_index .fileinput-exists1',function(){
    $('#category_index .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#category_index .file_logo').val('');
    $('#category_index #hidden_img1').val('');
  });


    $('body').on('change','#category_index .file_logo2',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#category_index .logo_thumbnail1 img','#category_index .file_logo2','#category_index #hidden_img2');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#category_index .fileinput-exists2',function(){
    $('#category_index .logo_thumbnail1 img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#category_index .file_logo2').val('');
    $('#category_index #hidden_img2').val('');
  });
    $('body').on('change','#category_index .file_logo3',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#category_index .logo_thumbnail2 img','#category_index .file_logo3','#category_index #hidden_img3');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#category_index .fileinput-exists3',function(){
    $('#category_index .logo_thumbnail2 img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#category_index .file_logo3').val('');
    $('#category_index #hidden_img3').val('');
  });


     // file(Product/edit_view) change upload Thumbnail
  $('body').on('change','#product_index .file_logo9',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#product_index .logo_thumbnail9 img','#product_index .file_logo9','#product_index #hidden_img9');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#product_index .fileinput-exists9',function(){
    $('#product_index .logo_thumbnail9 img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#product_index .file_logo9').val('');
    $('#product_index #hidden_img9').val('');
  });

    $('body').on('change','#product_index .file_logo_after',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#product_index .logo_thumbnail_after img','#product_index .file_logo_after','#product_index #hidden_img_after');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#product_index .fileinput-exists_after',function(){
    $('#product_index .logo_thumbnail_after img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#product_index .file_logo_after').val('');
    $('#product_index #hidden_img_after').val('');
  });

       // file(Product/edit_view) change upload Thumbnail
  $('body').on('change','#product_index .file_logo1',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#product_index .logo_thumbnail1 img','#product_index .file_logo1','#product_index #hidden_img1');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#product_index .fileinput-exists1',function(){
    $('#product_index .logo_thumbnail1 img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#product_index .file_logo1').val('');
    $('#product_index #hidden_img1').val('');
  });

     // file(Product/edit_view) change upload Thumbnail
  $('body').on('change','#product_index .file_logo2',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#product_index .logo_thumbnail2 img','#product_index .file_logo2','#product_index #hidden_img2');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#product_index .fileinput-exists2',function(){
    $('#product_index .logo_thumbnail2 img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#product_index .file_logo2').val('');
    $('#product_index #hidden_img2').val('');
  });
     // file(Product/edit_view) change upload Thumbnail
  $('body').on('change','#product_index .file_logo3',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#product_index .logo_thumbnail3 img','#product_index .file_logo3','#product_index #hidden_img3');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#product_index .fileinput-exists3',function(){
    $('#product_index .logo_thumbnail3 img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#product_index .file_logo3').val('');
    $('#product_index #hidden_img3').val('');
  });
     // file(Product/edit_view) change upload Thumbnail
  $('body').on('change','#product_index .file_logo4',function(){
    var val = $(this).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'jpge': case 'png':
                  previewFileC('#product_index .logo_thumbnail4 img','#product_index .file_logo4','#product_index #hidden_img4');
                    break;
                default:
                // error message here
                toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
                return false;
                break;
            }
  });
  $('body').on('click','#product_index .fileinput-exists4',function(){
    $('#product_index .logo_thumbnail4 img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#product_index .file_logo4').val('');
    $('#product_index #hidden_img4').val('');
  });








    // file(info/index_view) reset image Contact
  $('body').on('click','#info_index .fileinput-exists3',function(){
    $('#info_index .contact_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#info_index .file_contact').val('');
    $('#info_index #hidden_img_contact').val('');
  });


	// file(info/index_view) reset image logo and  favicon
	$('body').on('click','#info_index .fileinput-exists1',function(){
		$('#info_index .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
		$('#info_index .file_logo').val('');
		$('#info_index #hidden_img1').val('');
	});
	$('body').on('click','#info_index .fileinput-exists2',function(){
		$('#info_index .favicon_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
		$('#info_index .favicon_news').val('');
		$('#info_index #hidden_img2').val('');
	});

  // file(Company/edit_view) reset image logo
  $('body').on('click','#company_edit .fileinput-exists1',function(){
    $('#company_edit .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#company_edit .file_logo').val('');
    $('#company_edit #hidden_img1').val('');
  });
  // file(Hiring/edit_view) reset image logo
  $('body').on('click','#hiring_edit .fileinput-exists1',function(){
    $('#hiring_edit .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#hiring_edit .file_logo').val('');
    $('#hiring_edit #hidden_img1').val('');
  });
  // file(Schools/edit_view) reset image logo
  $('body').on('click','#schools_edit .fileinput-exists1',function(){
    $('#schools_edit .logo_thumbnail img').attr('src',baseUrl+'public/backend/images/no_image.gif');
    $('#schools_edit .file_logo').val('');
    $('#schools_edit #hidden_img1').val('');
  });

	// File (info/index) change procinces
	$('body').on('change','#info_index #provinces',function(){
		val_prodinces = $(this).val();
		jQuery.ajax({
		  url: baseUrl+'backend/info/loadDitrict',
		  type: 'POST',
		  dataType: 'json',
		  data: {provinces: val_prodinces},
		  success: function(data) {
		    //called when successful
		    $('#districtid').empty();
		    var html = '<option value="" selected>Chọn quận huyện</option>';
                $.each( data, function( k, v ) {
                    html += '<option value="'+v.districtid+'">'+v.nhanh_name+'</option>';
                });
               $('#info_index #districtid').html(html);
		  },
		});
	});
  // File (Company/edit_view) change procinces
  $('body').on('change','#company_edit #provinces',function(){
    val_prodinces = $(this).val();
    jQuery.ajax({
      url: baseUrl+'backend/info/loadDitrict',
      type: 'POST',
      dataType: 'json',
      data: {provinces: val_prodinces},
      success: function(data) {
        //called when successful
        $('#districtid').empty();
        var html = '<option value="" selected>Chọn quận huyện</option>';
                $.each( data, function( k, v ) {
                    html += '<option value="'+v.districtid+'">'+v.nhanh_name+'</option>';
                });
               $('#company_edit #districtid').html(html);
      },
    });
  });

  // File (Schools/edit_view) change procinces
  $('body').on('change','#schools_edit #provinces',function(){
    val_prodinces = $(this).val();
    jQuery.ajax({
      url: baseUrl+'backend/info/loadDitrict',
      type: 'POST',
      dataType: 'json',
      data: {provinces: val_prodinces},
      success: function(data) {
        //called when successful
        $('#districtid').empty();
        var html = '<option value="" selected>Chọn quận huyện</option>';
                $.each( data, function( k, v ) {
                    html += '<option value="'+v.districtid+'">'+v.nhanh_name+'</option>';
                });
               $('#schools_edit #districtid').html(html);
      },
    });
  });

  // File (Company/edit_view) Input keyup get skill auto


    //(user/index_view) checkbox All 
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
            if ($('.checkboxes:checked').length > 0) {
                $(".btn-del a").removeClass('disabled');                
            } else {
                $(".btn-del a").addClass('disabled');            
            }
        });
        $('.checkboxes').click(function() {
            if ($(this).prop("checked") == false) {
                $('#checkboxAll').prop("checked", false);
                $('#checkboxAll').parent().removeClass('checked');
            }
        });

    //(user/index_view) update status
    $('body').on('click','#user .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_user = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/user/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_user:id_user},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hoạt động');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Ngừng hoạt động');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });
//(Slider/index_view) update status
    $('body').on('click','#slider .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_slider = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/slider/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_slider:id_slider},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hoạt động');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Ngừng hoạt động');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });
//(Slider/index_view) update Sort
    $('body').on('change','#slider #sort',function(){
        var chinh = $(this);
        var id_img = chinh.attr('data-id');
        var sort = chinh.val();
        $.ajax({
          url: baseUrl+'backend/slider/updateSort',
          type: 'POST',
          dataType: 'json',
          data: {id_img:id_img,sort:sort},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });

//(ImagesHomePage/index_view) update Sort
    $('body').on('change','#Imageshomepage #sort',function(){
        var chinh = $(this);
        var id_img = chinh.attr('data-id');
        var sort = chinh.val();
        $.ajax({
          url: baseUrl+'backend/imageshomepage/updateSort',
          type: 'POST',
          dataType: 'json',
          data: {id_img:id_img,sort:sort},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });
    //(ImagesHomePage/index_view) update Sort
    $('body').on('change','#category #sort',function(){
        var chinh = $(this);
        var id_img = chinh.attr('data-id');
        var sort = chinh.val();
        $.ajax({
          url: baseUrl+'backend/category/updateSort',
          type: 'POST',
          dataType: 'json',
          data: {id_img:id_img,sort:sort},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });

    //(ImagesHomePage/index_view) update status
    $('body').on('click','#Imageshomepage .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_slider = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/imageshomepage/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_slider:id_slider},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hoạt động');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Ngừng hoạt động');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });

    //(Company/index_view) update status
    $('body').on('click','#company .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_com = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/company/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_com:id_com},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hiện');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Đang ẩn');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });

  //(Hiring/index_view) update status
    $('body').on('click','#hiring .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_com = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/hiring/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_com:id_com},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hoạt động');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Ngừng hoạt động');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });

  //(Schools/index_view) update status
    $('body').on('click','#schools .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_com = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/schools/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_com:id_com},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hiện');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Đang ẩn');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });

//(Pages/index_view) update status
    $('body').on('click','#pages .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_pages = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/pages/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_pages:id_pages},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hoạt động');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Ngừng hoạt động');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });
//(category/index_view) update status
    $('body').on('click','#category .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_cate = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/category/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_cate:id_cate},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hoạt động');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Ngừng hoạt động');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });


    //(category/index_view) update status xuat hien trang chu
    $('body').on('click','#category .status_home',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_cate = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/category/updateStatusHome',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_cate:id_cate},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hiện');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Đang ẩn');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });




//(product/index_view) update status
    $('body').on('click','#product .active_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_product = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/product/updateStatus',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_product:id_product},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('Đang hoạt động');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('Ngừng hoạt động');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });   

//(product/index_view) update rating_status
    $('body').on('click','#product .rating_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_product = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/product/updateRating',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_product:id_product},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('<i class="fa fa-star-o" aria-hidden="true"></i> Đã chọn');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('<i class="fa fa-star-o" aria-hidden="true"></i> Chưa chọn');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });

//(product/index_view) update new_status
    $('body').on('click','#product .new_status',function(){
        var chinh = $(this);
        var id_status =  chinh.attr('data-status');
        var id_product = chinh.attr('data-id');
        $.ajax({
          url: baseUrl+'backend/product/updateNew',
          type: 'POST',
          dataType: 'json',
          data: {status: id_status,id_product:id_product},
          success: function(data) {
            //called when successful
            if (data) {
                if (data.status==true) {

                    if (data.idstatus==1) {
                        //alert($(this).attr('data-id'));
                        chinh.removeClass('red-stripe');
                        chinh.addClass('green-stripe');
                        chinh.attr('data-status',1);
                        chinh.html('<i class="fa fa-star-o" aria-hidden="true"></i> Đã chọn');
                    }else{
                        chinh.removeClass('green-stripe');
                        chinh.addClass('red-stripe');
                        chinh.attr('data-status',0);
                        chinh.html('<i class="fa fa-star-o" aria-hidden="true"></i> Chưa chọn');
                    }
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    toastr["error"](data.mess, "Thông báo");
                }
            };
          },
        });
        
    });
    
    //file(User/edit) FORM VALIDATE EDIT USER
            var validator = $("#form_user").validate({
              rules: {
                business: {
                  required: true,
                },
                email: {
                  required: true,
                  email: true,
                },
                password: {
                  required: true,
                },
              },
              messages: {
                business:{
                  required: "Vui lòng nhập tên tài khoản!",
                },
                email:{
                  required: "Vui lòng nhập email!",
                  email: "Vui lòng nhập đúng định dạng email!",
                },
                password: {
                  required: "Vui lòng nhập mật khẩu!",
                },
              }
            });
    //file(User/edit) FORM VALIDATE EDIT USER CHECK Username
    $('body').on('change','#user_index #business',function(){
        var this_bus = $(this);
        var val_bus = this_bus.val();
        var user_business_check = $('#user_index #business_check').val();
        if (user_business_check != val_bus) {
            jQuery.ajax({
              url: baseUrl+'backend/user/checkUser',
              type: 'POST',
              dataType: 'json',
              data: {name: val_bus},
              success: function(data) {
                //called when successful
                if (data.status==true) {
                    $('#user_index #hidden_business').val('LNCWEBTRUE')
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    $('#user_index #hidden_business').val('LNCWEBFALSE')
                    toastr["error"](data.mess, "Cảnh báo");
                }
              },
            });
        };
    });
    //file(User/edit) FORM VALIDATE EDIT USER CHECK Username
    $('body').on('change','#user_index #email',function(){
        var this_email = $(this);
        var val_email = this_email.val();
        var user_email_check = $('#user_index #email_check').val();
        if (user_email_check!=val_email) {
            jQuery.ajax({
              url: baseUrl+'backend/user/checkEmail',
              type: 'POST',
              dataType: 'json',
              data: {email: val_email},
              success: function(data) {
                //called when successful
                if (data.status==true) {
                    $('#user_index #hidden_email').val('LNCWEBTRUE')
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    $('#user_index #hidden_email').val('LNCWEBFALSE')
                    toastr["error"](data.mess, "Cảnh báo");
                }
              },
            });
        };
    });
     $('#user_index #form_user').submit(function(){
        if ($('#hidden_business').val()=='LNCWEBFALSE') {
            toastr["error"]('Tên tài khoản này đã có, mời bạn chọn tên khác!', "Cảnh báo");
            return false;
        };
        if ($('#hidden_email').val()=='LNCWEBFALSE') {
            toastr["error"]('Email này đã có, mời bạn chọn tên khác!', "Cảnh báo");
            return false;
        };

    });

    
    //file(User/edit) FORM VALIDATE EDIT USER CHECK Username
    $('body').on('change','#hiring_edit #email',function(){
        var this_email = $(this);
        var val_email = this_email.val();
        var hiring_email_check = $('#hiring_edit #email_check').val();
        if (hiring_email_check!=val_email) {
            jQuery.ajax({
              url: baseUrl+'backend/hiring/checkEmail',
              type: 'POST',
              dataType: 'json',
              data: {email: val_email},
              success: function(data) {
                //called when successful
                if (data.status==true) {
                    $('#hiring_edit #hidden_email').val('LNCWEBTRUE')
                    toastr["success"](data.mess, "Thông báo");
                }else{
                    $('#hiring_edit #hidden_email').val('LNCWEBFALSE')
                    toastr["error"](data.mess, "Cảnh báo");
                }
              },
            });
        };
    });
    $('#hiring_edit #form_hiring').submit(function(){
        if ($('#hidden_email').val()=='LNCWEBFALSE') {
            toastr["error"]('Email này đã có, mời bạn chọn tên khác!', "Cảnh báo");
            return false;
        };

    });

   

    // file(User/index_view) Confirm Delete All checkbox

	




// Menu/index
$('body').on('click','#panel_menu_category #save_category_menu',function(){
  $('#loading_menu').css('display','block');
  $('#loading_menu .xxx').addClass('modal-backdrop fade in');
  var title= $('.them_menu_cate:checked').val();
  var id_link = $('.them_menu_cate:checked').attr('data-id');
  if($('.them_menu_cate:checked').val()!=null){
    $.ajax({
      url: baseUrl+'backend/menu/loadLinkMenu',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
        if(data.status==true){
          $('#menu_index_insert #title_menu').val(title);
          $('#menu_index_insert #id_link_menu').val(id_link);
          $('#menu_index_insert #link_menu').val(baseUrl+'c'+id_link.trim()+'-'+data.title+'.htm');
          if ($('#menu_index_insert #title_menu').val()!=null) {
            $('#menu_index_insert #alias_menu').val(data.title);
          };
        }
        $('#loading_menu').css('display','none');
        $('#loading_menu .xxx').removeClass('modal-backdrop fade in');

          
    });

  }
}); 
$('body').on('click','#panel_menu_posts #save_post_menu',function(){
  $('#loading_menu').css('display','block');
  $('#loading_menu .xxx').addClass('modal-backdrop fade in');
  var title= $('.them_menu_post:checked').val();
  var id_link = $('.them_menu_post:checked').attr('data-id');
  if($('.them_menu_post:checked').val()!=null){
    $.ajax({
      url: baseUrl+'backend/menu/loadLinkMenu',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
        if(data.status==true){
          $('#menu_index_insert #title_menu').val(title);
          $('#menu_index_insert #id_link_menu').val(id_link);
          $('#menu_index_insert #link_menu').val(baseUrl+'san-pham/danh-muc/'+id_link.trim()+'-'+data.title+'.htm')
          if ($('#menu_index_insert #title_menu').val()!=null) {
            $('#menu_index_insert #alias_menu').val(data.title);
          };
        }
        $('#loading_menu').css('display','none');
        $('#loading_menu .xxx').removeClass('modal-backdrop fade in');

          
    });

  }
}); 

$('body').on('click','#panel_menu_posts_news #save_post_news_menu',function(){
  $('#loading_menu').css('display','block');
  $('#loading_menu .xxx').addClass('modal-backdrop fade in');
  var title= $('.them_menu_post_news:checked').val();

  var id_link = $('.them_menu_post_news:checked').attr('data-id');
  if($('.them_menu_post_news:checked').val()!=null){
    $.ajax({
      url: baseUrl+'backend/menu/loadLinkMenu',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
        if(data.status==true){
          $('#menu_index_insert #title_menu').val(title);
          $('#menu_index_insert #id_link_menu').val(id_link);
          $('#menu_index_insert #link_menu').val(baseUrl+'n'+id_link.trim()+'-'+data.title+'.htm');
          if ($('#menu_index_insert #title_menu').val()!=null) {
            $('#menu_index_insert #alias_menu').val(data.title);
          };
        }
        $('#loading_menu').css('display','none');
        $('#loading_menu .xxx').removeClass('modal-backdrop fade in');

          
    });

  }
}); 


$('body').on('click','#panel_menu_newsPage #save_post_menu',function(){
  $('#loading_menu').css('display','block');
  $('#loading_menu .xxx').addClass('modal-backdrop fade in');
  var title= $('.them_menu_page:checked').val();
  var id_link = $('.them_menu_page:checked').attr('data-id');
  if($('.them_menu_page:checked').val()!=null){
    $.ajax({
      url: baseUrl+'backend/menu/loadLinkMenu',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
        if(data.status==true){
          $('#menu_index_insert #title_menu').val(title);
          $('#menu_index_insert #id_link_menu').val(id_link);
          $('#menu_index_insert #link_menu').val(baseUrl+'pages/'+id_link.trim()+'-'+data.title+'.htm');
          if ($('#menu_index_insert #title_menu').val()!=null) {
            $('#menu_index_insert #alias_menu').val(data.title);
          };
        }
        $('#loading_menu').css('display','none');
        $('#loading_menu .xxx').removeClass('modal-backdrop fade in');

          
    });

  }
}); 

$('body').on('click','#panel_menuleft_posts #save_post_menu',function(){
  $('#loading_menu').css('display','block');
  $('#loading_menu .xxx').addClass('modal-backdrop fade in');
  var title= $('.them_menuleft_post:checked').val();
  var id_link = $('.them_menuleft_post:checked').attr('data-id');
  var image = $('.them_menuleft_post:checked').attr('data-image');
  if($('.them_menuleft_post:checked').val()!=null){
    $.ajax({
      url: baseUrl+'backend/menuleft/loadLinkMenu',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
        if(data.status==true){
          $('#menuleft_index_insert #title_menu').val(title);
          $('#menuleft_index_insert #id_link_menu').val(id_link);
          $('#menuleft_index_insert #image_menu').val(image);
          $('#menuleft_index_insert #link_menu').val(baseUrl+'san-pham/danh-muc/'+id_link.trim()+'-'+data.title+'.htm');
          if ($('#menuleft_index_insert #title_menu').val()!=null) {
            $('#menuleft_index_insert #alias_menu').val(data.title);
          };
        }
        $('#loading_menu').css('display','none');
        $('#loading_menu .xxx').removeClass('modal-backdrop fade in');

          
    });

  }
}); 

// Pages_edit
$('body').on('keydown','#pages_index #title',function(){
    var title = $(this).val();
    $.ajax({
      url: baseUrl+'backend/pages/loadAlias',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
      if (data.status==true) {
        $('#pages_index #alias').val(data.alias);
      };
    });
    
});
// Categorys_edit
$('body').on('keydown','#category_index #title',function(){
    var title = $(this).val();
    $.ajax({
      url: baseUrl+'backend/category/loadAlias',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
      if (data.status==true) {
        $('#category_index #alias').val(data.alias);
      };
    });
    
});
// Product
$('body').on('keydown','#product_index #title',function(){
    var title = $(this).val();
    $.ajax({
      url: baseUrl+'backend/product/loadAlias',
      type: 'POST',
      dataType: 'json',
      data: {title: title},
    })
    .done(function(data) {
      if (data.status==true) {
        $('#product_index #alias').val(data.alias);
      };
    });
    
});
$('body').on('change','.sort_menu_config',function(){
  $(this).attr('data-value',$(this).attr('data-id')+'|'+$(this).val());
});

$('body').on('click','#updateMenuConfig',function(){
  var fruits = [];
    $.each($(".sort_menu_config"), function() {
    fruits.push($(this).attr('data-value')); 
  });
  
  jQuery.ajax({
    url: baseUrl+'backend/menu/updateMenu',
    type: 'POST',
    dataType: 'json',
    data: {fruits: fruits},
    success: function(data) {
      //called when successful
      if (data.status==true) {
        location.reload();
      };
    },
  });
  
});

$('body').on('click','.menuleft #updateMenuConfig2',function(){
  var fruits = [];
    $.each($(".menuleft .sort_menu_config"), function() {
    fruits.push($(this).attr('data-value')); 
  });
  
  jQuery.ajax({
    url: baseUrl+'backend/menuleft/updateMenu',
    type: 'POST',
    dataType: 'json',
    data: {fruits: fruits},
    success: function(data) {
      //called when successful
      if (data.status==true) {
        location.reload();
      };
    },
  });
  
});
// create images product 
/*$('body').on('click','#createxxx',function(){
  var id = $('#form_append_images').attr('data-id');
  var total = $('.create_total').length;
  $.ajax({
    url: baseUrl+'backend/product/createImages',
    type: 'POST',
    dataType: 'html',
    data: {total: total,id:id},
  })
  .done(function(data) {
          
          if (data) {
            var new_div = $(data).hide();
            $('#createxxx').before(new_div);
            new_div.slideDown();
             //$('.create_list').append(data).hide().show('slow');
          }


  });
  
})*/

$("body").on("click","#addColor",function(){
  var length = $("#createColor .fileinput").length;
  var sub = length + 1;
  var html = "<div class='fileinput' data-provides='fileinput'>"
                +"<input type='hidden' name='colorImage[]' id='color' value='#000'/>"
                +"<div class='fileinput-new thumbnail logo_thumbnail"+sub+"' style='width: 110px; height: 60px;'>"
                  +"<img src='"+baseUrl+'public/backend/images/no_image.gif'+"' class='image_"+sub+"' alt='Avatar'/>"
                  +"<input type='hidden' value='' name='hidden_imgColor[]' id='hidden_imgColor"+sub+"' class='hidden_imgColor'/>"
                +"</div>"
                +"<div>"
                  +"<span class='btn default btn-file'>"
                  +"<span class='fileinput-exists btn btn-success'>"
                  +"Thay ảnh </span>"
                  +"<input type='file' name='file_logoColor[]' class='file_logoColor' id='file_logoColor"+sub+"' />"
                  +"</span>"
                  +"<button type='button' class='btn default fileinput-exists'>Xóa </button>"
                +"</div>"
                +"<button type='button' class='btn btn-warning' id='close_list'>Hủy</button>"
              +"</div>";
  $("#createColor").append(html);
});

$('body').on('click','#close_list',function(){
  $(this).parent(".fileinput").empty();
});

// file(Setting_panel/edit_view) change upload logo
$('body').on('change','#createColor .file_logoColor',function(){
  var val2 = $(this).val();
  var img = $(this).parents(".fileinput").find('img').attr("class");
  var logo = $(this).parents(".fileinput").find('.file_logoColor').attr("id");
  var hidden_img = $(this).parents(".fileinput").find('.hidden_imgColor').attr("id");
          switch(val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()){
              case 'gif': case 'jpg': case 'jpge': case 'png':
                previewFileC("."+img,"#"+logo,"#"+hidden_img);
                  break;
              default:
              // error message here
              toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
              return false;
              break;
          }
});
$('body').on('click','#createColor .fileinput-exists',function(){
  $(this).parents(".fileinput").find('img').attr('src',baseUrl+'public/backend/images/no_image.gif');
  $(this).parents(".fileinput").find('.file_logoColor').val('');
  $(this).parents(".fileinput").find('#hidden_imgColor').val('');
});






// file(info/index_view) function freview images
function previewFileC(img,files,hidden) {
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
  
});


$('body').on('dblclick','.text_menu',function(){
  var idMenu = $(this).attr('data-idm');
    $.ajax({
      url: baseUrl+'backend/menu/loadMenuEdit',
      type: 'POST',
      dataType: 'json',
      data: {idMenu: idMenu},
    })
    .done(function(data) {
      if (data) {
         $('#myModalMenuLoad #title_menu').val(data.title);
         $('#myModalMenuLoad #alias_menu').val(data.alias);
         $('#myModalMenuLoad #link_menu').val(data.link);
         $('#myModalMenuLoad #id_menu').val(data.id);
         var parent_id = data.parent_id;
         if (parent_id) {};
         $('#myModalMenuLoad #parent_menu option').each(function(index, el) {
           if ($(this).val() == parent_id) {
              $(this).attr('selected','selected');
           };
         });
         openModal();
      };
    });
    
    
});
function openModal(){
    $('#myModalMenuLoad').modal();
}  

$('body').on('dblclick','#lnc_menuleft .text_menu',function(){
  var idMenu = $(this).attr('data-idm');
    $.ajax({
      url: baseUrl+'backend/menuleft/loadMenuEdit',
      type: 'POST',
      dataType: 'json',
      data: {idMenu: idMenu},
    })
    .done(function(data) {
      if (data) {
         $('#myModalMenuLoad2 #title_menu').val(data.title);
         $('#myModalMenuLoad2 #alias_menu').val(data.alias);
         $('#myModalMenuLoad2 #link_menu').val(data.link);
         $('#myModalMenuLoad2 #id_menu').val(data.id);
         var parent_id = data.parent_id;
         if (parent_id) {};
         $('#myModalMenuLoad2 #parent_menu option').each(function(index, el) {
           if ($(this).val() == parent_id) {
              $(this).attr('selected','selected');
           };
         });
         openModal2();
      };
    });
    
    
});
function openModal2(){
    $('#myModalMenuLoad2').modal();
}  

$('#search_time').datepicker();


$('body').on('click','#button_search',function(){
  var search_title = $('#search_title').val();
  //var search_time =  $('#search_time').val();
  window.location.assign(baseUrl+"backend/product/index?stitle="+search_title);//+"&stime="+search_time);
});
/*$('body').on('keypress','#search_title',function(e){
  if(e.which == 13) {
  var search_title = $('#search_title').val();
  window.location.assign(baseUrl+"backend/product/index?stitle="+search_title);
  }
});*/
$('body').on('keydown','#search_title',function(e){
  //e.preventDefault();
  if(e.which == 13) {
  var search_title = $(this).val();
  window.location.assign(baseUrl+"backend/product/index?stitle="+search_title);
  }
});