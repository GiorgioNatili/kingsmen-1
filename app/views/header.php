<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript">
	$(function(){

		$('.menu').children('div').hover(function(){
				// alert('d');
				$(this).children('ul').stop(true,true).fadeIn(300);					 
		}, function(){
				$(this).children('ul').stop(true,true).fadeOut(300);
		});

		$('.phone').click(function(){
			$.modal('+84 (08) 3810 7709');
		});
		$('.fax').click(function(){
			$.modal('+84 (08) 3810 7708');
		});
	});
</script>
</head>
<body class="">
	<div id="page" class="ma">
		
			<div class="nav">
				<a class="logo" href="<?=site_url('home')?>"><h1>logo</h1></a>
				<div class="menu">
					<div class="sl">
						<a href="">COMPANY</a>
						<ul>
							<li><a href="<?=site_url('about')?>">ABOUT US</a></li>
							<li><a href="<?=site_url('vision_mission')?>">VISION & MISSION</a></li>
							
						</ul>
					</div>
					<div class="sl">
						<a href="">SERVICES</a>
						<ul>
							<li><a href="<?=site_url('service/interior')?>">INTERIOR</a></li>
							<li><a href="<?=site_url('service/exhibition')?>">EXHBITION</a></li>
							<li><a href="<?=site_url('service/event')?>">EVENT</a></li>
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