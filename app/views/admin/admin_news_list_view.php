<script type="text/javascript" src="<?=site_url('js/editable.js')?>"></script>
<script type="text/javascript">
$(function(){

	$.editableText.defaults.newlinesEnabled = true;

	$('div.edit_vn').editableText();
	$('div.edit_en').editableText();
	$('.editableText').change(function(){
		var about_en = $('.edit_en').html();
		var about_vn = $('.edit_vn').html();
		$.ajax({
		  type: "POST",
		  url: "<?=site_url('admin/about/processform')?>",
		  data: "about_en=" + about_en + "&about_vn=" + about_vn ,
		  success: function(msg){
			alert( msg );
		  }
		});	
	});

	$('.del').click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		$.post('<?= site_url('admin/admin_news/lists/del') ?>', 
				{ id: id },
				function(){}, 'json');
		$(this).parents('tr').fadeOut('slow');
	});
});
</script>

<div class="newslist">
	<h2 class="line">News List</h2>
	
	
	<table class="news_tbl">
		<?php foreach($query->result() as $row):?>
		<tr>
			<td class="td1">
				<div>
					<img src="<?=site_url('photo/news/'.$row->thumb)?>">
				</div>
			</td>
			<td class="td2">
				<div class="edit_title">
					<?=$row->title?>
				</div>
			</td>
			<td class="td3">
				<div class="edit_detail">
					<?=$row->detail?>
				</div>
			</td>
			<td class="td4">
				<a class="del" id="<?=$row->id?>">delete</a>
			</td>
		</tr>
		<?php endforeach;?>
	</table>

	
</div>
