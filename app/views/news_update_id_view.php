<div class="cot">
	<h3 style="font-size:24px; margin:10px 0"><?=$query->row()->title;?></h3>
	<hr>
	<img src="<?=site_url('photo/news/'.$query->row()->full);?>"> 
	<div style="font-size:14px"><?=$query->row()->detail;?></div>
</div>