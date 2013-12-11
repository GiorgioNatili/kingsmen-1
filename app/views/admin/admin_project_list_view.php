<script type="text/javascript" src="<?=site_url('js/editable.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/submit.js')?>"></script>
<script type="text/javascript">
$(function(){


	$('.projectList').on('click','.del',function(e){
		var id = $(e.target).attr('id');
		$(e.target).ajaxSubmit({
			url: '<?= site_url('admin/admin_projectlist/del') ?>',
			data:{'id':id},
			onSubmit:function(){},
			onSuccess:function(i){$(e.target).parent().hide();},
			onError:function(i){}
		});
	});


});
</script>

<select size="1" id="nde" name="type">
	<option selected="selected" value="interior">Interior</option>
	<option value="event">Event</option>
	<option value="exhibition">Exhibition</option>
</select>
<div class="album">
	<ul class="projectList">
		<?php foreach($query->result() as $row):?>
			<li>
				<a class="projectName" href="<?=site_url('admin/admin_project/id/'.$row->id)?>"><?=$row->name?></a>
				<a href="<?=site_url('admin/admin_project/id/'.$row->id)?>"><img src="<?=site_url('photo/project/'.$row->thumb)?>"></a>
				<span><?=$row->location?></span>
				<a class="del" id="<?=$row->id?>">delete</a>
			</li>
		<?php endforeach;?>
	</ul>
	<div class="clear"></div>
</div>
