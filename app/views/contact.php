<script type="text/javascript">
	
jQuery.fn.labelize = function(){
	$(this).live("click", function(){
		$(this).next('input[type="text"],input[type="password"], select, textarea').focus();
		$(this).prev('input[type="radio"],input[type="checkbox"]').click();
	});
}
$(function(){
	$('label').labelize();
	$('input, textarea').focus(function(){
		$(this).prev('label').fadeOut(100);
	});
	$('input, textarea').blur(function(){
		$(this).prev('label').fadeIn(100);
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
		<p>T (848) 3810 7709 / (848) 3810 7712-14<br>
		F (848) 3810 7708<br>
		E <a href="mailto:info@kingsmen.com.vn">info@kingsmen.com.vn</a><br>
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
			<input type="text" name="name">
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
			<input type="text" name="email">
		</div>

		<div>
			<label>Subject</label>
			<input type="text" name="subject">
		</div>
	</div>
	<div class="right50">
		<label>Message *</label>
		<textarea id="form_message" class="textbox" name="message" cols="25" rows="5"></textarea>

		<input type="submit" value="Send message">
	</div>
	<div class="clear"></div>

</form>
