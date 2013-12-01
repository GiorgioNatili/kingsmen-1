
<script type="text/javascript">
	$(function(){

		$('.menu').children('div').hover(function(){
				// alert('d');
				$(this).children('ul').stop(true,true).fadeIn(300);					 
		}, function(){
				$(this).children('ul').stop(true,true).fadeOut(300);
		});
	});
</script>
</head>
<body class="">
	<div id="page" class="ma">
		
			<div class="nav">
				<a class="logo" href=""><h1>logo</h1></a>
				<div class="menu">
					<div class="sl">
						<a href="">COMPANY</a>
						<ul>
							<li><a href="<?=site_url('about')?>">ABOUT US</a></li>
							<li><a href="<?=site_url('vision_mission')?>">VISION & MISSION</a></li>
							<li><a href="<?=site_url('global_presence')?>">GLOBAL PRESENCE</a></li>
						</ul>
					</div>
					<div class="sl">
						<a href="">SERVICES</a>
						<ul>
							<li><a href="<?=site_url('interior')?>">INTERIOR</a></li>
							<li><a href="<?=site_url('exhibition')?>">EXHBITION</a></li>
							<li><a href="<?=site_url('event')?>">EVENT</a></li>
						</ul>
					</div>
					<div class="sl">
						<a href="">UPDATES</a>
						<ul>
							<li><a href="<?=site_url('publication')?>">PUBLICATION</a></li>
							<li><a href="<?=site_url('news_update')?>">NEWS UPDATE</a></li>
						</ul>
					</div>
					<div class="sl">
						<a href="<?=site_url('contact')?>" class="lastA">CONTACT</a>
					</div>
					<div class="contactIcons">
						<a class="email" href="mailto:kingsmenvn@gmail.com"></a>
						<a class="phone"></a>
						<a class="fax"></a>
					</div>
				</div>
			</div>
		

		<div class ="content">