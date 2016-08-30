//(Students/register_view) check email register page
$('body').on('change','#registe-page #email',function(){
	var regis_email = $(this);
	$.ajax({
	  url: baseUrl+'students/checkEmail',
	  type: 'POST',
	  dataType: 'json',
	  data: {email: regis_email.val()},
	  success: function(data) {
	    //called when successful
	    if (data) {
	    	if (data.status==true) {
	    		toastr["success"](data.mess, "Thông báo");
	    	}else{
	    		toastr["error"](data.mess, "Cảnh báo");
	    	}
	    }
	  },
	});
	
});

if ($('#registe-page #firstname').attr('data-first')==1) {
	toastr["error"]('Bạn không được để trống họ.', "Cảnh báo");
};
if ($('#registe-page #lastname').attr('data-last')==1) {
	toastr["error"]('Bạn không được để trống tên.', "Cảnh báo");
};
if ($('#registe-page #email').attr('data-email')==1) {
	toastr["error"]('Bạn không được để trống email.', "Cảnh báo");
}else if ($('#registe-page #email').attr('data-email')==2) {
	toastr["error"]('Bạn phải nhập đúng định dạng email.', "Cảnh báo");
}else if ($('#registe-page #email').attr('data-email')==3) {
	toastr["error"]('Email này đã có, mời bạn chọn email khác!', "Cảnh báo");
}
if ($('#registe-page #password').attr('data-password')==1) {
	toastr["error"]('Bạn không được để trống mật khẩu.', "Cảnh báo");
};
if ($('#registe-page #re-password').attr('data-repassword')==1) {
	toastr["error"]('Bạn không được để trống phần nhập lại mật khẩu.', "Cảnh báo");
}else if ($('#registe-page #re-password').attr('data-repassword')==2) {
	toastr["error"]('Mật khẩu không trùng khớp.', "Cảnh báo");
}
/*$('#tippy').tooltip({
    content: '... waiting on ajax ...',
    open: function(evt, ui) {
        var elem = $(this);
        $.ajax('/echo/html').always(function() {
            elem.tooltip('option', 'content', '<span style=\'color:blue;\'>Ajax call complete</span>');
         });
    }
});*/

// scoll page loading (Students/explore_view)
// gửi request điểm bắt đầu
var st = 5;
var start = 5;
var sta = 5;

is_busy = true;
$(window).scroll(function() { //detect page scroll
    
    if(($(window).scrollTop() + $(window).height()) >= $(document).height() -150)  //user scrolled to bottom of the page?
    {				
	            if (window.location.pathname==='/students/search') { // check if exits url = /students/search

	            	
		            
		             //quet DOM lay id da xuat hien tren trang
		             var fruits = [];
		            $.each($("#students_explore #lncdom"), function() {
						fruits.push($(this).attr('data-id')); 
					});
					var schools = $('#students_explore #getSchools').val();
					var industry = $('#students_explore #getIndustry').val();
					var location = $('#students_explore #getLocation').val();
					var salary = $('#students_explore #getSalary').val();
		            // Gửi Ajax
		            // kiểm tra is_busy = true thì cho gửi request
		            if(is_busy == true){
		            		// Hiển thị loadding
		            		$('#load').removeClass('hiddengif');
		            		$.ajax({
				                type        : 'post',
				                dataType    : 'html',
				                url         : baseUrl+'students/ajaxLoad',
				                data        : {fruits : fruits,schools:schools,industry:industry,location:location,salary:salary,st:st},
				                success     : function (result){
				                	if (result) {
				                		st = st + 5;
				  						var div = $(result).hide();
				                		$('#students_explore #lnc_content').append(div);
			    						div.fadeIn('slow');
				                	}else{
				                		is_busy = false;
				                	};
				                    //$element.append(result);
				                }
				            })
				            .always(function()
				            {
				                // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
				                $('#load').addClass('hiddengif');

				            });
		            }
	            	
		            return false;
	            };





	            if (window.location.pathname==='/users/explore') { // check if exits url = /students/search
	            	//quet DOM lay id da xuat hien tren trang
					var fruits = [];
					$.each($("#users_explore #lncdom"), function() {
						fruits.push($(this).attr('data-id')); 
					});

	            	// kiểm tra is_busy = true thì cho gửi request
		            if(is_busy == true){
		            		// Hiển thị loadding
		            		$('#load').removeClass('hiddengif');
			            	$.ajax({
				                type        : 'post',
				                dataType    : 'html',
				                url         : baseUrl+'users/ajaxLoadData',
				                data        : {fruits : fruits,start:start},
				                success     : function (result){
				                	if (result) {
				                		start =start + 5;
				  						var div = $(result).hide();
				                		$('#users_explore #lnc_content').append(div);
			    						div.fadeIn('slow');
				                	}else{
				                		is_busy = false;
				                	};
				                    //$element.append(result);
				                }
				            })
				            .always(function()
				            {
				                // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
				                $('#load').addClass('hiddengif');
				            });
			        }
		            return false;
	            };


	            if (window.location.pathname==='/users/jobs') { // check if exits url = /users/jobs
	            	//quet DOM lay id da xuat hien tren trang
					var fruits = [];
					$.each($("#users_explore #lncdom"), function() {
						fruits.push($(this).attr('data-id')); 
					});

	            	// kiểm tra is_busy = true thì cho gửi request
		            if(is_busy == true){
		            		// Hiển thị loadding
		            		$('#load').removeClass('hiddengif');
			            	$.ajax({
				                type        : 'post',
				                dataType    : 'html',
				                url         : baseUrl+'users/ajaxLoadDataNotCate',
				                data        : {fruits : fruits,start:sta},
				                success     : function (result){
				                	if (result) {
				                		sta =sta + 5;
				  						var div = $(result).hide();
				                		$('#users_explore #lnc_content').append(div);
			    						div.fadeIn('slow');
				                	}else{
				                		is_busy = false;
				                	};
				                    //$element.append(result);
				                }
				            })
				            .always(function()
				            {
				                // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
				                $('#load').addClass('hiddengif');
				            });
			        }
		            return false;
	            };
	            
    }
});

// File (Students/result_search_keywords_view) xắp xếp thep mức độ
$('body').on('change','#result_keywords #sort',function(){
	var url_this = $(this).attr('data-sort');
	window.location.assign(url_this+'&sort='+$(this).val());
});
$('body').on('click','.detail-jobs #upFileAjax',function(){
	var val2 = $('.detail-jobs #fileUpload').val();
            switch(val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()){
                case 'pdf':
                    $(".detail-jobs #data_ajax").submit(function(){
					    var formData = new FormData($(this)[0]);
					    $.ajax({
					        url: baseUrl+'users/uploadAjaxPdf',
					        type: 'POST',
					        dataType: 'json',
					        data: formData,
					        async: false,
					        success: function (data) {
					        	$('.detail-jobs .hiddengif').css('display','none');
					            if (data) {
					            	if (data.status===true) {
					            		var html='<div class="alert alert-success">'+
											    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
											    '<strong>Thông báo!</strong> '+ data.mess +
											  '</div>';
					            		$('.detail-jobs #myModalApply .appfile2').empty();
					            		$('.detail-jobs #myModalApply .appfile').empty();
					            		$('.detail-jobs #myModalApply #linkpdf').val(data.linkTo);
					            		$('.detail-jobs #myModalApply .messenger').empty();
					            		$('.detail-jobs #myModalApply .messenger').append(html);
					            		$('.detail-jobs #myModalApply .appfile').append(data.file);
					            	}else{
					            		var html='<div class="alert alert-danger">'+
											    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
											    '<strong>Cảnh báo!</strong> Tệp tin của bạn tải lên không đúng định dạng ( .pdf )'+
											  '</div>';
										$('.detail-jobs #myModalApply .messenger').empty();
						                $('.detail-jobs #myModalApply .messenger').append(html);
					            	}
					            };
					        },
					        cache: false,
					        contentType: false,
					        processData: false
					    });
					    return false;
					});
                    break;
                default:
                // error message here
                var html='<div class="alert alert-danger">'+
					    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
					    '<strong>Cảnh báo!</strong> Tệp tin của bạn tải lên không đúng định dạng ( .pdf )'+
					  '</div>';
				$('.detail-jobs #myModalApply .messenger').empty();
                $('.detail-jobs #myModalApply .messenger').append(html);
               	return false;
                break;
            }
});

// (Users/detail_posts_view) close modal next
$('body').on('click','.detail-jobs #next',function(){
	if ($('.appfile').html()=='') {
		var html='<div class="alert alert-danger">'+
					    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
					    '<strong>Cảnh báo!</strong> Bạn chưa có bản hồ sơ nào. Bạn cần tải lên bổ sung với định dạng (pdf).'+
					  '</div>';
                $('.detail-jobs #myModalApply .messenger').empty();
                $('.detail-jobs #myModalApply .messenger').append(html);
	}else{
		$('.detail-jobs #myModalApply').modal('hide'); 
		$('.detail-jobs #myModalApply2').modal('show'); 
	}
});



$('body').on('click','.detail-jobs #myModalApply2 #submitToHr',function(){
	var link = $('.detail-jobs #myModalApply #linkpdf').val();
	var cid = $('.detail-jobs #myModalApply #cid').val();
	var title = $('.detail-jobs #myModalApply2 #title').val();
	var id_posts = $('.detail-jobs #myModalApply2 #id_posts').val();
	var content = CKEDITOR.instances.editorxx.getData();
	if (title!='' && content!='') {
		$.ajax({
			url: baseUrl+'users/submitToHr',
			type: 'POST',
			dataType: 'json',
			data: {link: link,title:title,content:content,cid:cid,id_posts:id_posts},
		})
		.done(function(data) {
			if (data) {
				if (data.status==true) {
					var html='<div class="alert alert-success">'+
												    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
												    '<strong>Thông báo!</strong> '+ data.mess +
												  '</div>';
					$('.form_input').empty();
					$('.detail-jobs #myModalApply2 .messenger').empty();
					$('.detail-jobs #myModalApply2 .messenger').append(html);
				}else{
					var html='<div class="alert alert-danger">'+
						    '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+
						    '<strong>Cảnh báo!</strong> '+data.mess+
						  '</div>';
					$('.form_input').empty();
					$('.detail-jobs #myModalApply2 .messenger').empty();
					$('.detail-jobs #myModalApply2 .messenger').append(html);

				}
				$('.detail-jobs #myModalApply2 .lnc-footer-modal').empty();
				$('.detail-jobs #myModalApply2 .lnc-footer-modal').append('<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>');
			};
		});
	}else{
		toastr["error"]('Bạn phải nhập đầy đủ thông tin gửi đi.', "Cảnh báo");
	}
});

 /* var owl = $("#owl-demo");
  owl.owlCarousel({
      items:5,
    	loop:true,
    	autoplay:true,
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	lazyLoad:true,
      margin : 40,
      //time : 5, //10 items above 1000px browser width
      pagination : false, //10 items above 1000px browser width
      navigation : false, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
  var owlblog = $("#owl-blog");
  owlblog.owlCarousel({
      items:3,
    	loop:true,
    	autoplay:true,
    	autoplayTimeout:4000,
    	autoplayHoverPause:true,
    	lazyLoad:true,

      margin : 10, //10 items above 1000px browser width
      //time : 5, //10 items above 1000px browser width
      pagination : false, //10 items above 1000px browser width
      navigation : false, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });*/


// file(info/index_view) change upload logo
$('body').on('change','.your-profile .file_logo',function(){
	var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'jpge': case 'png':
            	previewFile('.your-profile #thumbnail_avatar','.your-profile .file_logo','.your-profile #hidden_img1');
            	var formDatax = new FormData($(".your-profile #data_ajax")[0]);
				$.ajax({
			        url: baseUrl+'users/uploadAjaxAvatar',
			        type: 'POST',
			        dataType: 'json',
			        data: formDatax,
			        async: false,
			        success: function (data) {
			        	//called when successful
					    if (data) {
					    	if (data.status==true) {
					    		toastr["success"](data.mess, "Thông báo");
					    	}else{
					    		toastr["error"](data.mess, "Cảnh báo");
					    	}
					    }
			        },
			        cache: false,
			        contentType: false,
			        processData: false
			    });
            	
                break;
            default:
            // error message here
            toastr["error"]('File bạn chọn không đúng định dạng ảnh ( gif, jpg, jpge, png )', "Cảnh báo");
           	return false;
            break;
        }
});
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


$('body').on('keyup','#editor_about',function(){
	var length = $(this).val().length;
	//console.log(length);
	if (length>=250) {
		toastr["error"]('Bạn chỉ được nhập tối đa 250 ký tự.', "Cảnh báo");
		$(this).attr('maxlength',250);
	};
});
/*$('body').on('keydown','#schools_key_index',function(){
	var val = $(this).val();
	$.ajax({
		url: baseUrl+'users/addSchools',
		type: 'POST',
		dataType: 'json',
		data: {val: val},
	})
	.done(function(data) {
		if (data) {
			  var html = '';
	        $.each( data, function( k, v ) {
	            html += '<li><a href="#">'+v.title+'</a></li>';
	        });
	       $('#result_filter').empty().append(html).slideToggle( "slow" );;
		};
	});
	
});*/

$('#schools_key_index').attr('autocomplete', 'off');
$('body ').click(function(event) {
    $('.boxSearchRes').slideUp();
});
$('body').on('keyup', '#schools_key_index', function(event) {
        event.preventDefault();
        var keyword = $(this).val();
        if ($.trim(keyword) != '' && event.which != 40 && event.which != 38 && event.which != 13) {
            $('.boxSearchRes').slideDown();
            $.ajax({
                    url: baseUrl+'users/addSchools',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        keyword: keyword
                    },
                })
                .success(function(data) {
                	//console.log(data);
                    var htm = '';
                    
                        $.each(data, function(k, v) {
                            if (k == 0) {
                                htm += '<li class="firstLi"><a href="javascript:void(0)" data-key="'+v.id+'"><img src="'+baseUrl+v.logo+'" alt="' + v.title + '">' + v.title + '</a></li>';
                            } else {
                                htm += '<li><a href="javascript:void(0)" data-key="'+v.id+'"><img src="'+baseUrl+v.logo+'" alt="' + v.title + '">' + v.title + '</a></li>';
                            }

                        });
                    $('#autoCompleteSearch').html(htm);
                    $('#autoCompleteSearch').find('li:first-child').mouseover();
                });

        } else if ($.trim(keyword) == '') {
            $('.boxSearchRes').slideUp();
        }
    });
$("#schools_key_index").keyup(function(event) {
        var keycode = event.which;
        var num_active = 0;
        if (keycode == 38) { //Len
            //Kiem tra active
            var hasC = false;
            var countAll = 0;
            $('#autoCompleteSearch').find('li').each(function(k, v) {
                var self = $(this);
                if (self.hasClass('boxSearchRes-Hover') && hasC == false) {
                    hasC = true;
                }
                countAll += 1;
            });

            if (hasC != false) {
                var liAc = $('#autoCompleteSearch').find('li.boxSearchRes-Hover');
                var num_active = liAc.index() - 1;
            } else {
                var liAc = $('#autoCompleteSearch').find('li:first-child');
                var num_active = countAll;
            }
            $('#autoCompleteSearch').find('.boxSearchRes-Hover').removeClass('boxSearchRes-Hover');


            var elhover = $('#autoCompleteSearch').find('li:eq(' + num_active + ')');
            elhover.addClass('boxSearchRes-Hover');
            var tmp_title = elhover.find('a').text();
            $('#schools_key_index').val(tmp_title);

            if (num_active == countAll) {
                $('#autoCompleteSearch').find('.boxSearchRes-Hover').removeClass('boxSearchRes-Hover');
                $('#autoCompleteSearch').find('li:first-child').addClass('boxSearchRes-Hover');
                var tmp_title = $('#autoCompleteSearch').find('li:first-child a').text();
                $('#schools_key_index').val(tmp_title);

            }



        } else if (keycode == 40) {
            //Kiem tra active
            var hasC = false;
            var countAll = 0;
            $('#autoCompleteSearch').find('li').each(function(k, v) {
                var self = $(this);
                if (self.hasClass('boxSearchRes-Hover') && hasC == false) {
                    hasC = true;
                }
                countAll += 1;
            });

            if (hasC != false) {
                var liAc = $('#autoCompleteSearch').find('li.boxSearchRes-Hover');
                var num_active = liAc.index() + 1;
            } else {
                var liAc = $('#autoCompleteSearch').find('li:first-child');
                var num_active = 0;
            }
            $('#autoCompleteSearch').find('.boxSearchRes-Hover').removeClass('boxSearchRes-Hover');


            var elhover = $('#autoCompleteSearch').find('li:eq(' + num_active + ')');
            elhover.addClass('boxSearchRes-Hover');
            var tmp_title = elhover.find('a').text();
            var tmp_key = elhover.find('a').attr('data-key');
            $('#schools_key_index').val(tmp_title);
            $('#schools_key_id').val(tmp_key);

            if (num_active == countAll) {
                $('#autoCompleteSearch').find('.boxSearchRes-Hover').removeClass('boxSearchRes-Hover');
                $('#autoCompleteSearch').find('li:first-child').addClass('boxSearchRes-Hover');
                var tmp_title = $('#autoCompleteSearch').find('li:first-child a').text();
                var tmp_key = $('#autoCompleteSearch').find('a').attr('data-key');
                $('#schools_key_index').val(tmp_title);
                $('#schools_key_id').val(tmp_key);

            }


        }


    });
$('#schools_key_index').keypress(function(event) {
        if (event.which == 13) {
            var indx = $('#autoCompleteSearch').find('.boxSearchRes-Hover').index();
            //console.log(indx);
            if (indx != -1) {
            	
                var text = $('#autoCompleteSearch').find('li:eq('+indx+') a').text();
                $('.boxSearchRes').slideUp();
                $('.boxSearchRes').hide();

                return false;
            }
        }

    });
$('body').on('click','#autoCompleteSearch li a',function(event){
	event.preventDefault();
	var text = $(this).text();
	var key = $(this).attr('data-key');
	$('#schools_key_id').val(key);
	$('#schools_key_index').val(text);
});

// add thanh /*
$('body').on('click','#add_thanhtich',function(event){
	event.preventDefault();
	var val_thanhtich_year = $('#val_thanhtich_year').val();
	var val_thanhtich = $('#val_thanhtich').val();
	if (val_thanhtich!='' && val_thanhtich_year !=''){
		$('#thanhtich_result ul').prepend('<li class="list-group-item" data-year="'+val_thanhtich_year+'" data-title="'+
			val_thanhtich+'">Năm '+val_thanhtich_year+': '+val_thanhtich+
			'<span id="thanhtich_del" style="float:right;">'+
			'<a href="javascript:void(0)">'+
			'<i class="fa fa-trash"></i>&nbsp;Xóa</a></span></li>').css('opacity',0.5).animate({
              height: "300px",
              opacity:1
     });
     $('#val_thanhtich').val('');
	}else{
		toastr["error"]('Bạn không được để trống.', "Cảnh báo");
	}
});
// del thanh tich
$('body').on('click','#thanhtich_del',function(event){
	event.preventDefault();
	$(this).parent('li').slideUp('slow').remove();
});

// insert ajax thanh tich cho student
$('body').on('click','#done_thanhtich',function(event){
	event.preventDefault();
	//quet DOM lay year va title thanh tich da xuat hien tren trang
     var fruits = [];
    $.each($("#thanhtich_result ul li"), function() {
    	var year = $(this).attr('data-year');
    	var title = $(this).attr('data-title');
    	var thanhtich = {year:year, title:title};
		fruits.push(thanhtich); 
	});
	if (fruits.length !== 0) {
    	$.ajax({
    		url: baseUrl+'users/addThanhTich',
    		type: 'POST',
    		dataType: 'json',
    		data: {fruits: fruits},
    	})
    	.done(function(data) {
    		if (data.status==true) {
    			//console.log('success');
    			location.reload();
    		}else{
    			toastr["error"]('Đã có lỗi xảy ra. Vui lòng tải lại trang và làm lại.', "Cảnh báo");
    		}
    	});
    	
	}

	
});
$('body').on('click','#huy_thanhtich',function(event){
	location.reload();
});
$("#updateLang").submit(function(){
	if ($('#lang').val()=='') {
		toastr["error"]('Bạn không được để trống phần ngôn ngữ.', "Cảnh báo");
	};
	if ($('#skill').val()=='') {
		toastr["error"]('Bạn không được để trống phần kỹ năng.', "Cảnh báo");
	};
	if ($('#lang').val()=='' || $('#skill').val()=='') {
		return false;
	};
	return true;
});
//$.fn.datepicker.defaults.language = 'vi';
//$('.datepicker').datepicker( "option", "dateFormat", "dd/mm/yy");

// add trường học cho sv /*
$('body').on('click','#education_add',function(event){
	event.preventDefault();
	var education_date_from = $('#education_date_from').val();
	var education_date_to = $('#education_date_from').val();
	var schools_key_index = $('#schools_key_index').val();
	var schools_key_id = $('#schools_key_id').val();
	if (education_date_from!='' && education_date_to !='' && schools_key_index !=''){
		$('#education_result ul').prepend('<li class="list-group-item" data-from="'+education_date_from+'" data-to="'+
			education_date_to+'" data-key="'+schools_key_id+'" data-name="'+schools_key_index+'">Từ '+education_date_from+' đến '+education_date_to+
			': '+schools_key_index+' <span id="education_del" style="float:right;">'+
			'<a href="javascript:void(0)">'+
			'<i class="fa fa-trash"></i>&nbsp;Xóa</a></span></li>').css('opacity',0.5).animate({
              height: "300px",
              opacity:1
     });
     $('#education_date_from').val('');
	 $('#education_date_to').val('');
	 $('#schools_key_index').val('');
	 $('#schools_key_id').val('');
	}else{
		toastr["error"]('Bạn không được để trống.', "Cảnh báo");
	}
});
// del truong hoc
$('body').on('click','#education_del',function(event){
	event.preventDefault();
	$(this).parent('li').slideUp('slow').remove();
});
// insert ajax Trường học cho students
$('body').on('click','#done_education',function(event){
	event.preventDefault();
	//quet DOM lay year va title thanh tich da xuat hien tren trang
     var fruits = [];
    $.each($("#education_result ul li"), function() {
    	var from = $(this).attr('data-from');
    	var to = $(this).attr('data-to');
    	var name = $(this).attr('data-name');
    	var key = $(this).attr('data-key');
    	var edu = {id:key,from:from, to:to, name:name};
		fruits.push(edu); 
	});
	if (fruits.length !== 0) {
    	$.ajax({
    		url: baseUrl+'users/addEducation',
    		type: 'POST',
    		dataType: 'json',
    		data: {fruits: fruits},
    	})
    	.done(function(data) {
    		if (data.status==true) {
    			//console.log('success');
    			location.reload();
    		}else{
    			toastr["error"]('Đã có lỗi xảy ra. Vui lòng tải lại trang và làm lại.', "Cảnh báo");
    		}
    	});
    	
	}

	
});
$('body').on('click','#huy_education',function(event){
	location.reload();
});
$("#form_info_students").submit(function(){
	var info_phone = $('#info_phone').val();
	/*if (info_phone=='') {
		toastr["error"]('Bạn không được để trống số điện thoại.', "Cảnh báo");
		return false;
	}else */
	if(isNaN(info_phone)) {
		toastr["error"]('Bạn nhập không phải là số điện thoại.', "Cảnh báo");
		return false;
	};
	
	return true;
});


$('body').on('change','#category_product #input_search_product',function(){
	var sort = $(this).val();
	var url_this = $(this).attr('data-sort');
	window.location.assign(url_this+'?sort='+sort);
});
var start0 = 20;
is_busy0 = true;
$('body').on('click','#categories_list #showMore',function(){
	// Gửi Ajax
	// kiểm tra is_busy = true thì cho gửi request
	if(is_busy == true){
			// Hiển thị loadding
			$('#category_product #loader').css('display', 'block');
			$.ajax({
	            type        : 'post',
	            dataType    : 'html',
	            url         : baseUrl+'default/product/ajaxLoad0',
	            data        : {start:start0},
	            success     : function (result){
	            	if (result) {
	            		start0 = start0 + 20;
						var div = $(result).hide();
	            		$('#categories_list #product-wrapper .row').append(div);
						div.fadeIn('slow');
	            	}else{
	            		$("#categories_list #showMore").hide();
	            		is_busy0 = false;
	            	};
	                //$element.append(result);
	            }
	        })
	        .always(function()
	        {
	            // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
	            $('#categories_list #loader').css('display', 'none');

	        });
	}

});

var start = 20;
is_busy = true;
$('body').on('click','#category_product #showMore',function(){
	
	var sort = $('#category_product #sort_hidden').val();
	var id_cate = $('#category_product #id_cate').val();
	// Gửi Ajax
	// kiểm tra is_busy = true thì cho gửi request
	if(is_busy == true){
			// Hiển thị loadding
			$('#category_product #loader').css('display', 'block');
			if ($(".clickChangeView").hasClass("active")==true) {
				var view = $(".product-filter .pull-right .active").attr("data-view");
			};
			$.ajax({
	            type        : 'post',
	            dataType    : 'html',
	            url         : baseUrl+'default/product/ajaxLoad',
	            data        : {start:start,sort:sort,id_cate:id_cate,view:view},
	            success     : function (result){
	            	if (result) {
	            		start = start + 20;
						var div = $(result).hide();
	            		$('#category_product #product-wrapper .row').append(div);
						div.fadeIn('slow');
	            	}else{
	            		$("#category_product #showMore").hide();
	            		is_busy = false;
	            	};
	                //$element.append(result);
	            }
	        })
	        .always(function()
	        {
	            // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
	            $('#category_product #loader').css('display', 'none');

	        });
	}

});

var start2 = 20;
is_busy2 = true;
$('body').on('click','#product_list #showMore',function(){
	
	var parent_id = $('#product_list #parent_id').val();
	var sort = $('#product_list #sort_hidden').val();
	var id_cate = $('#product_list #id_cate').val();
	// Gửi Ajax
	// kiểm tra is_busy = true thì cho gửi request
	if(is_busy == true){
			// Hiển thị loadding
			$('#product_list #loader').css('display', 'block');
			$.ajax({
	            type        : 'post',
	            dataType    : 'html',
	            url         : baseUrl+'default/product/ajaxLoad2',
	            data        : {start:start2,parent_id:parent_id},
	            success     : function (result){
	            	if (result) {
	            		start2 = start2 + 20;
						var div = $(result).hide();
	            		$('#product_list #product-wrapper .row').append(div);
						div.fadeIn('slow');
	            	}else{
	            		$("#product_list #showMore").hide();
	            		is_busy2 = false;
	            	};
	                //$element.append(result);
	            }
	        })
	        .always(function()
	        {
	            // Sau khi thực hiện xong ajax thì ẩn hidden và cho trạng thái gửi ajax = false
	            $('#product_list #loader').css('display', 'none');

	        });
	}

});

$("#viewmenu ul:not('.navbar-left:first')").hide();
$("#viewmenu ul:not('.navbar-left:first')").css({
	    "position": "absolute",
	    "top":" 100%",
	    "left":" 0",
	    "z-index":" 1000",
	    "display":" none",
	    "float":" left",
	    "min-width":" 160px",
	    "padding":" 5px 0",
	    "margin":" 2px 0 0",
	    "list-style":" none",
	    "font-size":" 14px",
	    "text-align":" left",
	    "background-color":" #fff",
	    "border":" 1px solid #ccc",
	    "border":" 1px solid rgba(0,0,0,0.15)",
	    "border-radius":" 4px",
	    "-webkit-box-shadow":" 0 6px 12px rgba(0,0,0,0.175)",
	    "box-shadow":" 0 6px 12px rgba(0,0,0,0.175)",
	    "-webkit-background-clip":" padding-box",
	    "background-clip":" padding-box"
});
$("a.link_menu").click(function(){
	li=$(this).parent();
	ul=li.find("ul:first").slideToggle();
});

/*$("#zoom_03").elevateZoom({gallery:'gallery_01',scrollZoom : true, cursor: 'pointer', galleryActiveClass: "active", imageCrossfade: true}); 
		
		$("#zoom_03").bind("click", function(e) {  
		  var ez =   $('#zoom_03').data('elevateZoom');
		  ez.closeAll(); //NEW: This function force hides the lens, tint and window	
		  $.fancybox(ez.getGalleryList(),{
			helpers	: {
			title	: {
				type: 'outside'
			},
			thumbs	: {
				width	: 50,
				height	: 50
			}
				}
		  }
		  );
		  
		  return false;
		}); */

$("body").on("click",".colorImage",function(){
	var img = $(this).attr("data-image");
	$("#zoom_03").attr("src",baseUrl+"image_tools/timthumb.php?src="+img+"&h=274&w=411&zc=2");
	$("#zoom_03").attr("data-zoom-image",baseUrl+"image_tools/timthumb.php?src="+img+"&h=854&w=1280&zc=2");
	$(".zoomWindow").css({
		"background-image":"url('"+baseUrl+"image_tools/timthumb.php?src="+img+"&h=854&w=1280&zc=2"+"')"
	});
	//attr("data-zoom-image",baseUrl+"image_tools/timthumb.php?src="+img+"&h=854&w=1280&zc=1");
});




$('body').on('click', '#shopping-cart-button', function(event) {
	event.preventDefault();
	var masp = $("#masp").val();
	var quant = $("#quant").val();
    var urlSend = baseUrl+"product/addCart";
    $.ajax({
        method: "POST",
        url: urlSend,
        data: {masp:masp,quant:quant},
        dataType: 'json'
    }).success(function(res) {
    	if (res) {
    		if (res.status==true) {
    			toastr["success"]("Thông báo: "+res.mess);
    			$('.shopping_cart_lnc').empty();
    			var cart = "<a href='"+baseUrl+"product/showCart'><i class='fa fa-shopping-cart' aria-hidden='true'></i> "+res.count+" item(s) <money class='hidden-xs'> - "+res.total+" &#8363;</money></a>";
    			$('.shopping_cart_lnc').html(cart);
    			//$('.fuck-badge').text(res.count);
    		}else{
    			toastr["error"]("Cảnh báo: "+res.mess);
    		}
    	};
    });

    
});
$(".owl-carousel").owlCarousel({
	autoPlay: 3000, //Set AutoPlay to 3 seconds
    dots: true,
    items: 2,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [979, 3]
});
$('.menu_title').parents('li.menu-pr:not(:last-child)').css('border-bottom', '1px solid rgba(203, 203, 203, 0.88)');
$('.menu_title').parents('li.menu-pr').css({
	'margin-bottom': '20px',
	'padding-bottom': '15px'
});

$('body').on('click','.option_search',function(e){
	alert(123);
});