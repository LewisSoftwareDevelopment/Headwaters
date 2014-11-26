<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/inputs'); ?>">Inputs</a></li>
			<li class="active">Actuals Input</li>
		</ol>
	</div>
</div>
<div class="contentpanel">
	<div class="row">
		<!-- pager --> 
		<div class="pager"> 
				<img src="<?php echo asset_url('css/tablesorter/icons/first.png'); ?>" class="first"/> 
				<img src="<?php echo asset_url('css/tablesorter/icons/prev.png'); ?>" class="prev"/> 
				<span class="pagedisplay"></span> <!-- this can be any element, including an input --> 
				<img src="<?php echo asset_url('css/tablesorter/icons/next.png'); ?>" class="next"/> 
				<img src="<?php echo asset_url('css/tablesorter/icons/last.png'); ?>" class="last"/> 
				<select class="pagesize" title="Select page size"> 
					<option selected="selected" value="10">10</option> 
					<option value="20">20</option> 
					<option value="30">30</option> 
					<option value="40">40</option> 
				</select>  
				<select class="gotoPage" title="Select page number"></select>
		</div> 
		<table class= "tablesorter">
			<thead>
				<tr>
					 <th>ID</th>
					 <th>This Year Budget Net</th>
					 <th>This Year Buget Gross</th>
					 <th>YTD Net Actual</th>
				</tr>
			</thead>

			<tbody>
			<?php
				foreach($actuals_input as $single_actual) {  ?>
				<tr>
					<td><?php echo $single_actual->ID; ?></td>
					<td><?php echo $single_actual->ThisYearBudgetNet; ?></td>
					<td><?php echo $single_actual->ThisYearBugetGross; ?></td>
					<td><?php echo $single_actual->YTDNetActual; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<!-- pager --> 
		<div class="pager"> 
				<img src="<?php echo asset_url('css/tablesorter/icons/first.png'); ?>" class="first"/> 
				<img src="<?php echo asset_url('css/tablesorter/icons/prev.png'); ?>" class="prev"/> 
				<span class="pagedisplay"></span> <!-- this can be any element, including an input --> 
				<img src="<?php echo asset_url('css/tablesorter/icons/next.png'); ?>" class="next"/> 
				<img src="<?php echo asset_url('css/tablesorter/icons/last.png'); ?>" class="last"/> 
				<select class="pagesize" title="Select page size"> 
					<option selected="selected" value="10">10</option> 
					<option value="20">20</option> 
					<option value="30">30</option> 
					<option value="40">40</option> 
				</select>
				<select class="gotoPage" title="Select page number"></select>
		</div>
	</div>
</div>
