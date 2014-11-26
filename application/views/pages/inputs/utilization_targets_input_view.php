<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/inputs'); ?>">Inputs</a></li>
			<li class="active">Utilization Targets Input</li>
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
					<th>IBC Per MD</th>
					<th>IBC Total MD</th>
					<th>IBC YTD Target</th>
					<th>EL Per MD</th>
					<th>EL Total MD</th>
					<th>EL YTD Target</th>
					<th>Closing Per MD</th>
					<th>Closing Total MD</th>
					<th>Closing YTD MD</th>
                </tr>
            </thead>

            <tbody>
            <?php
            	foreach($utilization_targets_input as $single_utilization_target) {  ?>
            	<tr>
					<td><?php echo $single_utilization_target->ID; ?></td>
    				<td><?php echo $single_utilization_target->IBCPerMD; ?></td>
    				<td><?php echo $single_utilization_target->IBCTotalMD; ?></td>
    				<td><?php echo $single_utilization_target->IBCYTDTarget; ?></td>
    				<td><?php echo $single_utilization_target->ELPerMD; ?></td>
    				<td><?php echo $single_utilization_target->ELTotalMD; ?></td>
    				<td><?php echo $single_utilization_target->ELYTDTarget; ?></td>
    				<td><?php echo $single_utilization_target->ClosingPerMD; ?></td>
    				<td><?php echo $single_utilization_target->ClosingTotalMD; ?></td>
    				<td><?php echo $single_utilization_target->ClosingYTDMD; ?></td>
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
