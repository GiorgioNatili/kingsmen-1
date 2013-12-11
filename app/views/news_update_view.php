<h2>NEWS UPDATES</h2>

<div class="newsTable">

	<?php foreach($query->result() as $row):?>
		<div class="aPost">
			<a href="<?=site_url('news/id/'.$row->id)?>"><img class="postImg" src="<?=site_url('photo/news/'.$row->thumb)?>"></a>
			<h3><?=$row->title?></h3>
		</div>
	<?php endforeach;?>

</div>