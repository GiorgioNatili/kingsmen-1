<div class="">
	<h2>INTERIOR</h2>

</div>
<div class="album">
	<ul class="projectList">
		<?php foreach($query->result() as $row):?>
			<li>
				<a class="projectName" href="<?=site_url('interior/item/'.$row->id)?>"><?=$row->name?></a>
				<a href="<?=site_url('interior/item/'.$row->id)?>"><img src="photo/pro/t1.jpg"></a>
				<span>Bien Hoa</span>
			</li>
		<?php endforeach;?>
	</ul>
	<div class="clear"></div>
</div>