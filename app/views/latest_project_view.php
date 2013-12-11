


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=site_url('css/main.css')?>">
<link rel="stylesheet" type="text/css" href="<?=site_url('css/service.css')?>">
<link id="google-fonts-css" media="all" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C700italic%2C400%2C300%2C700&subset=latin%2Cvietnamese%2Clatin-ext&ver=3.7.1" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<meta charset="utf-8">

<script type="text/javascript" src="<?=site_url('js/preloadImage.js')?>"></script>
<script type="text/javascript">
$(function(){


});

</script>
</head>
<body>
<a class="threedot" href="<?=base_url()?>"></a>
<div class="album">
	<ul class="projectList">
		<?php foreach($query->result() as $row):?>
			<li>
				<a class="projectName" href="<?=site_url('service/id/'.$row->id)?>"><?=$row->name?></a>
				<a href="<?=site_url('service/id/'.$row->id)?>"><img src="<?=site_url('photo/project/'.$row->thumb)?>"></a>
				<span><?=$row->location?></span>
			</li>
		<?php endforeach;?>
	</ul>
	<div class="clear">

	<!-- get two closing div tag from footer -->
	<?=$this->load->view('footer')?>