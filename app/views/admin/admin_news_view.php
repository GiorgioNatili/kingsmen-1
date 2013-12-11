<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/upload.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/submit.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/validate.js')?>"></script>
<script type="text/javascript">
$(function(){


	$('#my_form').ajaxSubmit({
		url:'<?= site_url("admin/admin_news/processform") ?>',
		onSubmit:function(){
			if(!$('#nti').validate({required:true})){ return false;};
			if(!$('#nde').validate({required:true})){ return false;};
		},
		onSuccess:function(i){
			$.modal('submit success');
			// $("#my_form")[0].reset();	
		},
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
					
		$('#file-upload').upload({
			url:'<?= site_url("admin/admin_news/upload")?>',
			fileList: '#files',
			listItem: listitem,
			progressor: '.progressor',
			progressBar: '.progress-bar',
			cancelButton: '.cancel',
			minWidth: 110,
			minHeight: 86,
			maxSize: 100000,
			maxLength: 100,
			onComplete: function(name, size, index, response){

			}
		});
	

});
</script>

	<br class="br" />
	<h2 class="line">Add News</h2>
	<p style="color:#999; font-size:11px; margin-bottom:15px">Complete the form first, then begin to upload images.
	<form method="post" id="my_form">
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
