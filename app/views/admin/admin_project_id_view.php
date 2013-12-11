<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/submit.js')?>"></script>
<!-- this view doesn't load the standard header file. only load doctype that's why it needs to close doctype -->
<script type="text/javascript">
	$(function(){
		$('#files').on('click','.del',function(e){
			var id = $(e.target).attr('id');
			var thumb= $(e.target).attr('thumb');
			$(e.target).ajaxSubmit({
				url: '<?= site_url('admin/admin_project/del_img') ?>',
				data:{'id':id, 'thumb':thumb},
				onSubmit:function(){},
				onSuccess:function(i){$(e.target).parent().hide();},
				onError:function(i){}
			});
		});
	});
</script>
<div class="">
	<h2></h2>
</div>
<div class="album">
	<ul class="projectList" id="files">
		<?php foreach($query->result() as $row):?>
			<li>
				<a ><img src="<?=site_url('photo/project/'.$row->thumb)?>"></a>
				<a href="#" class="del" id="<?=$row->id?>" thumb="<?=$row->thumb?>">delete</a>
			</li>
		<?php endforeach;?>
	</ul>
	<div class="clear"></div>
</div>




<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/upload.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/submit.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/validate.js')?>"></script>
<script type="text/javascript">
$(function(){


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

