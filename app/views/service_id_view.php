<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=site_url('css/service_id.css')?>">
<link id="google-fonts-css" media="all" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C700italic%2C400%2C300%2C700&subset=latin%2Cvietnamese%2Clatin-ext&ver=3.7.1" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<meta charset="utf-8">

<script type="text/javascript" src="<?=site_url('js/fitSize.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/preloadImage.js')?>"></script>
<script type="text/javascript">
$(function(){
// 	$('.showing').fitSize({target:'.mainImg'});

	$('.thumbNav img').click(function(){
		var src = $(this).attr('src');
		$('.mainImg img').attr('src', src.replace('small','full'));
	});

	$('.thumbNav img').each(function(){
		var url = $(this).attr('src').replace('small','full');
		preloadImage(url);
	})

});

</script>
</head>
<body>
<a class="goback" href="#" onclick="history.go(-1);">Back To Previous Page</a>
<a href="" class="ptype">
<span class="sp2"><?=$query->row()->name?></span>
<span class="sp1"><?=$query->row()->type?></span>
</a>
<span class="thered"></span>
<div class="mainImg"><img class="showing" src="<?=site_url('photo/project/'.$query->row()->full)?>"></div>
<div class="thumbNav">
	<?php foreach($query->result() as $row):?>
			<span><img id="" src="<?=site_url('photo/project/'.$row->small)?>"></span>
	<?php endforeach;?>
</div>
</body>
</html>