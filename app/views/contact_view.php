<script type="text/javascript" src="<?=site_url('js/modal.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/submit.js')?>"></script>
<script type="text/javascript" src="<?=site_url('js/validate.js')?>"></script>
<script type="text/javascript">
	
jQuery.fn.labelize = function(){
	parent = $(this).parent();
	$(parent).on('click', $(this), function(e){
		$(e.target).next('input[type="text"],input[type="password"], select, textarea').focus();
		$(e.target).prev('input[type="radio"],input[type="checkbox"]').click();
	})
}
$(function(){
	$('label').labelize();
	$('input, textarea').focus(function(){
		if(!$(this).val().length){
			$(this).prev('label').fadeOut(100);
		}
		
	});
	$('input, textarea').blur(function(){
		if(!$(this).val().length){
			$(this).prev('label').fadeIn(100);
		}
	});

	$('.contact_form').ajaxSubmit({
		url:'<?= site_url("contact/processform") ?>',
		onSubmit:function(){
			if(!$('#name').validate({required:true})){ $.modal('name is required'); return false;};
			if(!$('#email').validate({required:true})){ $.modal('email is required'); return false;};
			if(!$('#message').validate({required:true})){ $.modal('message is required'); return false;};
		},
		onSuccess:function(i){
			$.modal('Your message is received. Our staff will contact you shortly');
			$(".contact_form")[0].reset();
		}
	});


});
</script>
<h2>CONTACT</h2>

<div class="about_poster"></div>		

<h3>Kingsmen Vietnam Office</h3>
<div class="padd30">
	<div class="left50">
		<p>364, Cong Hoa Street<br>
		Unit 4-2, E-Town<br>
		Tan Binh District<br>
		Ho Chi Minh City, Vietnam</p>	
	</div>


	<div class="right50">
		<p>Tel +84 (08) 3810 7709<br>
		Fax +84 (08) 3810 7708<br>
		Email <a href="mailto:info@kingsmen.com.vn">info@kingsmen.com.vn</a><br>
		Contact: Mr. Stephen Lim</p>	
	</div>
	<div class="clear"></div>
</div>
<hr>
<h3>Get in touch</h3>	
<form class="contact_form">
	<div class="left50">
		<div>
			<label>First & Last Name *</label>
			<input type="text" name="name" id="name">
		</div>

		<div>
			<label>Company</label>
			<input type="text" name="company">
		</div>

		<div>
			<label>Telephone</label>
			<input type="text" name="telephone">
		</div>

		<div>
			<label>Email *</label>
			<input type="text" name="email" id="email">
		</div>

		<div>
			<label>Subject</label>
			<input type="text" name="subject">
		</div>
	</div>
	<div class="right50">
		<label>Message *</label>
		<textarea id="message" class="textbox" name="message" cols="25" rows="5"></textarea>

		<input type="submit" value="Send message">
	</div>
	<div class="clear"></div>

</form>
