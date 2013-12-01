<script type="text/javascript">
$(function(){
});
</script>

<div style="margin-bottom:10px;">
	<span style="margin: 0 20px 0 0"><b>Total visited:</b> <?=$total?></span>
	<span><b>Since:</b> <?=$start_date?></span>
</div>
<div style="margin-bottom:20px"><span><b>Average on a day:</b> <?=$average?></span></div>
<table class="stat_tbl">
	<tr>
		<td class="td1">IP</td>
		<td class="td2">Visited Time</td>
		<td class="td3">Pages Went through</td>
	</tr>
	<?php foreach($query1->result() as $row):?>
	<tr>
		<td class="td1"><?=$row->ip?></td>
		<td class="td2"><?=$row->first_visit_time?></td>
		<td class="td3"><?=$row->page_visited?></td>
	</tr>
	<?php endforeach;?>

</table>
