<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/inputs'); ?>">Inputs</a></li>
			<li class="active">Bankers Input</li>
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
                     <th>First Name</th>
                     <th>YTD Last</th>
                     <th>Last Name</th>
                     <th>Active</th>
                     <th>Name</th>
                     <th>Budget Year</th>
                     <th>Start Date</th>
                     <th>YTD Revenue</th>
                     <th>Last Year Rev</th>                
                     <th>Prior Year Rev</th>
                     <th>Last Year Rank</th>
                     <th>YTD Closing</th>
                     <th>Last Year Closing</th>
                     <th>YTD IBC</th>
                     <th>YTD Engagements</th>
                     <th>Total Current Engagments</th>
                     <th>Wheelhouse</th>
                     <th>Speculative</th>
                     <th>Minimum</th>
                </tr>
            </thead>

            <tbody>
            <?php
            	foreach($banker_input as $single_banker) {  ?>
            	<tr>
					<td><?php echo $single_banker->ID; ?></td>
    				<td><?php echo $single_banker->FirstName; ?></td>
    				<td><?php echo $single_banker->YTDLast; ?></td>
    				<td><?php echo $single_banker->LastName; ?></td>
    				<td><?php echo $single_banker->Active; ?></td>
    				<td><?php echo $single_banker->Name; ?></td>
    				<td><?php echo $single_banker->BudgetYear; ?></td>
    				<td><?php echo $single_banker->StartDate; ?></td>
    				<td><?php echo $single_banker->YTDRevenue; ?></td>
    				<td><?php echo $single_banker->LastYearRev; ?></td>
    				<td><?php echo $single_banker->PriorYearRev; ?></td>
    				<td><?php echo $single_banker->LastYearRank; ?></td>
    				<td><?php echo $single_banker->YTDClosing; ?></td>
    				<td><?php echo $single_banker->LastYearClosing; ?></td>
    				<td><?php echo $single_banker->YTDIBC; ?></td>
					<td><?php echo $single_banker->YTDEngagements; ?></td>
    				<td><?php echo $single_banker->TotalCurrentEngagments; ?></td>
    				<td><?php echo $single_banker->Wheelhouse; ?></td>
    				<td><?php echo $single_banker->Speculative; ?></td>
    				<td><?php echo $single_banker->Minimum; ?></td>
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
