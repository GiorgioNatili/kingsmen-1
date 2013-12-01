<script type="text/javascript">
$(function(){
	$('.de').click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		$.post('<?= site_url('admin/newslist/del') ?>', 
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
				<?=$row->title?>
			</td>
			<td class="td2">
				<?=$row->detail?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>

	
</div>
