<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/upload.js')?>"></script>
<script type="text/javascript">
$(function(){

	// add news
	$('#my_form').submit(function(){
								   
		var name = $('#nti').val();
		var type = $('#nde').val();
		var location= $('#lc').val();

		
		$.post('<?= site_url('admin/admin_project/processform') ?>', 
			 {	name: name,
				type: type,
				location:location
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
			url:'<?= site_url("admin/admin_project/uploadx")?>',
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
	<h2 class="line">Add Project</h2>
	<form method="post" id="my_form" action="<?=site_url('admin/admin_project/processform')?>">
		<ul id="error"></ul>
		<div class="pr">
			<table>
				<tr>
					<td class="td1"><label for="nti">Project Name</label></td>
					<td class="td2"><input type="text" name="name" id="nti" /></td>
				</tr>
				<tr>
					<td class="td1"><label for="plc">Project Location</label></td>
					<td class="td2"><input type="text" name="location" id="plc" /></td>
				</tr>
				<tr>
					<td class="td1"><label for="nde">Project type</label></td>
					<td class="td2">
						<select name="type" id="nde" size="1">
							<option value="interior" selected="selected">Interior</option>
							<option value="event">Event</option>
							<option value="exhibition">Exhibition</option>
						</select>
					</td>
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

	<br><br><br>
	<div class="clear"></div>

