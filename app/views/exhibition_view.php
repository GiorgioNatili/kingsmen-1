<div class="">
	<h2>EXHIBITION</h2>
	
</div>
<div class="album">
	<ul class="projectList">
		<?php foreach($query->result() as $row):?>
			<li>
				<a class="projectName" href="<?=site_url('exhibition/item/'.$row->id)?>"><?=$row->name?></a>
				<a href="<?=site_url('exhibition/item/'.$row->id)?>"><img src="<?=site_url('photo/pro/'.$row->medium)?>"></a>
				<span>Bien Hoa</span>
			</li>
		<?php endforeach;?>
	</ul>
	<div class="clear"></div>
</div>