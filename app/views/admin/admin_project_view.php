<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/upload.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/submit.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/validate.js')?>"></script>
<script type="text/javascript">
$(function(){


	$('#my_form').ajaxSubmit({
		url:'<?= site_url("admin/admin_project/processform") ?>',
		onSubmit:function(){
			if(!$('#nti').validate({required:true})){ return false;};
			if(!$('#plc').validate({required:true})){ return false;};
		},
		onSuccess:function(i){
			$.modal('submit succes');
		},
		onError:function(i){
		}
	});



	// upload image
	
		var	listitem = 	'<li>'+
							'<span class=name></span>'+
							'<div class="progressor"></div>'+
							'<div class="progress-bar-container">'+
								'<div class="progress-bar">'+
								'</div>'+
							'</div>'+
							'<a class="cancel">cancel</a>'+
						'</li>';
					
		$('#file-upload').upload({
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
			onSubmit: function(name, size, index){
				$('#files').children().last().find('.name').text(name);
			},
			onComplete: function(name, size, index, response){
				if(response.status=='success'){
					$('#files li').eq(index).append('<a class="set" thumb="'+response.thumb+'" imageid="'+response.image_id+'" title="delete">set as default</a>');
					$('#files li').eq(index).append('<a class="del" thumb="'+response.thumb+'" imageid="'+response.image_id+'" title="delete">delete</a>');


				}
			}
		});


		$('#files').on('click','.del',function(e){
			var imageid = $(e.target).attr('imageid');
			var thumb= $(e.target).attr('thumb');
			$(e.target).ajaxSubmit({
				url: '<?= site_url('admin/admin_project/del') ?>',
				data:{'id':imageid, 'thumb':thumb},
				onSubmit:function(){},
				onSuccess:function(i){$(e.target).parent().hide();},
				onError:function(i){}
			});
		});

		$('#files').on('click','.set',function(e){
			var imageid = $(e.target).attr('imageid');
			var thumb= $(e.target).attr('thumb');
			$(e.target).ajaxSubmit({
				url: '<?= site_url('admin/admin_project/set') ?>',
				data:{'id':imageid, 'thumb':thumb},
				onSubmit:function(){},
				onSuccess:function(i){ $(e.target).empty().text('done')},
				onError:function(i){}
			});
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

