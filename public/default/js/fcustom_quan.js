$('.hr_wrapper').parent().parent('.wrapper').css('background', '#EDEDED');

$(document).ready(function() {

	// BLOG
	$("input#s").keypress(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();
	        if( $(this).val() == '' ){
				toastr["error"]('Bạn chưa nhập nội dung tìm kiếm', "Thông báo");
			}else{
	        	$("form#search_news").submit();
	    	}	
		}
	});

	// COMMENTS ARTICLE
	$( 'body' ).on('click', '#cmt-submit', function() {
		var news_id = $(this).attr('data-id');
		var cmtName = $('#cmt-name').val();
		var cmtEmail = $('#cmt-email').val();
		var cmtContent = $('#cmt-content').val();

		if( cmtName == '' || cmtEmail == '' || cmtContent == '' ){
			toastr['error']( 'Không được để trống các trường: Họ tên | Email | Nội dung bình luận' ,'Thông báo');
		}else{
			$.ajax({
				url: baseUrl+'default/blog/sendComment',
				type: 'post',
				dataType: 'json',
				data: {
					'news_id' : news_id,
					'cmtName' : cmtName,
					'cmtEmail': cmtEmail,
					'cmtContent' : cmtContent
				},
				success: function(result){
					toastr['success']( result['cmt_msg'] ,'Thông báo');
					
					if( result['success'] ){
						var html = '';
						
						html += '<div class="cmt-item"><div class="cmt-author"><div class="img-author">';
						html += '<img width="50" height="50" src="'+baseUrl+'public/default/images/user-josh.png" alt="">';
						html += '<span> '+ result['cmt_last']['name'] +' </span>';
						html += '</div></div><div class="cmt-content" style="color: #858585;font-size:14px;">';
						html += '<p>'+ result['cmt_last']['content'] != '' ? result['cmt_last']['content'] : 'Nội dung bình luận không tồn tại' +'</p></div></div>';						
												
						$('.comment .list-comment').prepend( html );
						$('.comment #totalCmt').html( result['totalCmt'] );
					}

				}
			});
		}
	});
	
	//change company logo
	$('body').on('change','#company_logo',function(){
		var val = $(this).val();
	        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
	            case 'gif': case 'jpg': case 'jpge': case 'png':
	            	previewFile('.thumbnail_change img','#company_logo');
	                break;
	            default:
	            // error message here
	            toastr["warning"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
	           	return false;
	            break;
	        }
	});

	// ajax rep CV
	$('body').on('click', '.btn-sub-rep', function() { 
		var id_cv = $(this).attr('data-id');
		var id_post = $(this).attr('data-idpost');
		var repTitle = $('#rep-name').val();
		var repCont = $('#rep-content').val();
		if( repTitle == '' || repCont == '' ){
			toastr["error"]('Những trường được đánh dấu (*) là bắt buộc', "Thông báo");
		}else{
			$.ajax({
				url: baseUrl+'hiring/apply/'+id_post,
				type: 'post',
				dataType: 'json',
				data: {
					'id_cv' : id_cv,
					'reptitle': repTitle,
					'repcontent' : repCont
				},
				success: function( result ) {
					if( result['success'] ){
						toastr["success"](result['msg'], "Thông báo");
						$('.apply-item-'+id_cv).hide();
						$('#num-apply').html( result['count'] );
						$('.bg-color-'+id_cv).css('background', '#449D44');
					}else{
						toastr["error"](result['msg'], "Thông báo");
					}
				}
			});
		}

	});

	// ajax rep CV 2
	$('body').on('click', '.btn-sub-rep2', function() { 
		var id_cv = $(this).attr('data-id');
		var id_post = $(this).attr('data-idpost');
		var repTitle = $('#cv-'+ id_cv +' #rep-name2').val();
		var repCont = $('#cv-'+ id_cv +' #rep-content2').val();
		if( repTitle == '' || repCont == '' ){
			toastr["error"]('Những trường được đánh dấu (*) là bắt buộc', "Thông báo");
		}else{
			$.ajax({
				url: baseUrl+'hiring/apply/'+id_post,
				type: 'post',
				dataType: 'json',
				data: {
					'id_cv' : id_cv,
					'reptitle': repTitle,
					'repcontent' : repCont
				},
				success: function( result ) {
					if( result['success'] ){
						toastr["success"](result['msg'], "Thông báo");
						$('.apply-item-'+id_cv).hide();
						$('#num-apply').html( result['count'] );
						$('.bg-color-'+id_cv).css('background', '#449D44');
					}else{
						toastr["error"](result['msg'], "Thông báo");
					}
				}
			});
		}

	});

	//update status cv
	$('body').on('click', '.show-cv', function() {
		var id_cv = $(this).attr('data-id');
		var id_post = $(this).attr('data-idpost');
		var title_cv = $('.apply-item-'+id_cv).html();
		var title_arr = title_cv.split("</span>");

		$.ajax({
			url: baseUrl+'default/hiring/updateStatus/',
			type: 'post',
			dataType: 'json',
			data: {
				'id_cv' : id_cv,
				'id_post' : id_post
			},
			success: function( result ) {
				if( result['success'] ){ 
					$('.apply-item-'+id_cv).hide();
					$('#num-apply').html( result['count'] );
					$('#num-apply2').html( result['count2'] );

					var html = '';
					html += '<li class="list-group-item"><span class="badge bg-color-'+id_cv+'"><a href="javascript:void(0);" data-id="'+ id_cv +'"  data-toggle="modal" data-target="#cv-'+id_cv+'" style="color:#fff;">Xem CV</a></span>';
					html += title_arr[1];
					html += '</li>';					

					$('.list-view').prepend( html );
					
				}
			}
		});

	});

	// city & district
	$('body').on('change', '#province', function( ) {
		var provinceid = $(this).val();
		$('#district .show-dis-'+provinceid).siblings().hide();
		$('#district .show-dis-'+provinceid).show();
	});

	// change avatar
	$('body').on('change','.com_logo',function(){
    	var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'jpge': case 'png':
              	previewFile('.com-logo img','.com_logo','#hidden_img2');
				var formData_comLogo = new FormData($('#upload_com_logo')[0]);
              	$.ajax({
              		url: baseUrl+'default/hiring/upload_com_logo',
              		type: 'post',
              		dataType: 'json',              		
              		data: formData_comLogo,
              		async: false,
              		cache: false,
			        contentType: false,
			        processData: false,			        
     				enctype: 'multipart/form-data',
              		success: function(result){
              			if( result['success'] ){
              				toastr["success"](result['upload_msg'], "Thông báo");
              			}else{
              				toastr["error"](result['upload_msg'], "Cảnh báo");
              			}
              		},
              		
              	});
                break;
            default:
            // error message here
            toastr["warning"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
            return false;
            break;
        }
    });

	/*$('body').on('change','.com_logo',function(){
    	var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'jpge': case 'png':
              	previewFile('.com-logo img','.com_logo','#hidden_img2');
              	$.ajaxFileUpload({
					url 			:baseUrl+'default/hiring/upload_com_logo', 
					secureuri		:false,
					fileElementId	:'com_logo',
					dataType		:'json',
					data			: {
						
					},
					success	: function (result)
					{
						if( result['success'] ){
              				toastr["success"](result['upload_msg'], "Thông báo");
              			}else{
              				toastr["error"](result['upload_msg'], "Cảnh báo");
              			}
					}
				});
                break;
            default:
            // error message here
            toastr["warning"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
            return false;
            break;
        }
    });*/




}); // End DOCUMENT

function previewFile(img,files) {
  var preview = document.querySelector(img);
  var file    = document.querySelector(files).files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    //preview.src = reader.result;
    $(preview).attr('src',reader.result);
    //$(hidden).val(reader.result);
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
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