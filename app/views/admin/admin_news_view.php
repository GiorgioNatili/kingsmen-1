<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/ajaxUpload.js')?>"></script>
<script type="text/javascript">
$(function(){

	// add news
	$('#my_form').submit(function(){
								   
		var news_title = $('#nti').val();
		var news_detail = $('#nde').val();

		
		$.post('<?= site_url('admin/admin_news/processform') ?>', 
			 {	news_title: news_title,
				news_detail: news_detail,	
			},
		function(i){
			if(i.insert == 'success'){
				$.modal('insert success');
			}
			else
			{
				$.modal('fail to insert');
			}
		}, 'json');		
		return false;
	});

	// upload image
	
		var	listitem = 	'<li>'+
							'<div class="progressor"></div>'+
							'<div class="progress-bar-container">'+
								'<div class="progress-bar">'+
								'</div>'+
							'</div>'+
							'<a class="cancel"></a>'+
						'</li>';
					
		$('#file-upload').ajaxUpload({
			url:'<?= site_url("admin/admin_news/uploadx") ?>',
			fileList: '#files',
			listItem: listitem,
			progressor: '.progressor',
			progressBar: '.progress-bar',
			cancelButton: '.cancel',
			minWidth: 110,
			minHeight: 86,
			maxSize: 10000,
			maxLength: 12,
			allowedType: 'jpg|png|jpeg|gif',
			onDimensionError: function(name, width, height){
				$.modal('File <span style="color:red">'+name+'</span> dimension is too small');
			},
			onLengthError: function(current_length){
				$.modal('Maximum upload limit is 12');
			},
			onSizeError: function(name){
				$.modal('File <span style="color:red">'+name+'</span> size is too big. Max is 10MB');
			},
			onTypeError: function(name){
				$.modal('File <span style="color:red">'+name+'</span> is not an image');
			},
			onSubmit: function(name, size, index){
				$('li').eq(index).append('<span class="oriname" title="'+name+'">'+name+'</span>');
			},
			onProgress: function(name, size, index, loaded, progress){
			
			},
			onCancel: function(name, size, index, loaded, progress){
				$('li').eq(index).fadeSlideWayRemove(120,120);
			},
			onComplete: function(name, size, index, response){
				
				var i = response;
				if(i.status=='success'){
					$('li').eq(index).prepend('<img src="'+ i.thumb_name+'" /><br>');
					$('li').eq(index).append('<a class="del" thumb="'+i.thumb_name+'" imageid="'+i.image_id+'" title="remove image"></a>');
					$('li').eq(index).find('.progress-bar-container').hide();
				}else{
					$('li').eq(index).remove();
					$.modal(i.error);	
				}
			}
		});
	

});
</script>

	<br class="br" />
	<h2 class="line">Add News</h2>
	<p style="color:#999; font-size:11px; margin-bottom:15px">Complete the form first, then begin to upload images. Click finish when done.
	<form method="post" id="my_form" action="<?=site_url('admin/admin_news/processform')?>">
		<ul id="error"></ul>
		<div class="pr">
			<table>
				<tr>
					<td class="td1"><label for="nti">News title</label></td>
					<td class="td2"><input type="text" name="news_title" id="nti" /></td>
				</tr>
				<tr>
					<td class="td1"><label for="nde">News detail</label></td>
					<td class="td2"><textarea name="news_detail" cols="40" rows="10" id="nde"></textarea></td>
				</tr>
				<tr>
					<td class="td1"></td>
					<td class="td2"><button type="submit" class="submit b">Save</button></td>
				</tr>
			</table>
		</div>
	</form>
	<form id="uploadform">
		<div id="file_browse_wrapper" class="btn">
			Upload photo
			<input id="file-upload" type="file" name="userfile" multiple="true" />
		</div>
	</form>
	<br><br><br>
	
	<ul id="files"></ul>

	<br /><br /><br />
	<a href="#" id="finish_button">Finish</a>
