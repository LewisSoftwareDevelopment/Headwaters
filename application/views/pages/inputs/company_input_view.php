<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/inputs'); ?>">Inputs</a></li>
			<li class="active">Company Input</li>
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
                    <th>Company</th>
                    <th>ELDate</th>
                    <th>IBCDate</th>
                    <th>EstCloseDate</th>
                    <th>ProjectName</th>
                    <th>ELExpirationDate</th>
                    <th>Status</th>
                    <th>DealType</th>
                    <th>DealSlot</th>
                    <th>ClosedDate</th>
                    <th>DeadDate</th>
                    <th>PrimaryBanker</th>
                    <th>PracticeArea</th>
                    <th>Industry</th>
                    <th>ProjectedTransactionSize</th>
                    <th>EnterpiseValue</th>
                    <th>FinalTransactionSize</th>
                    <th>ProjectedFee</th>
                    <th>FeeMinimum</th>
                    <th>EngagmentFee</th>
                    <th>FeeDetails</th>
                    <th>SplitToCorporate</th>
                    <th>MonthlyRetainer</th>
                    <th>FinalTotalSucessFee</th>
                    <th>OwnershipClass</th>
                    <th>ReferralType</th>
                    <th>ReferralSourceCompany</th>
                    <th>ReferralScourceInd</th>
                    <th>Description</th>
                    <th>TeamSplit1</th>
                    <th>Team1</th>
                    <th>TeamSplit2</th>
                    <th>Team2</th>
                    <th>TeamSplit3</th>
                    <th>Team3</th>
                    <th>TeamSplit4</th>
                    <th>Team4</th>
                    <th>TeamSplit5</th>
                    <th>Team5</th>
                    <th>TeamSplit6</th>
                    <th>Team6</th>
                    <th>FeeSplit1</th>
                    <th>FeeTo1</th>
                    <th>FeeSplit2</th>
                    <th>FeeTo2</th>
                    <th>FeeSplit3</th>
                    <th>FeeTo3</th>
                    <th>FeeSplit4</th>
                    <th>FeeTo4</th>
                    <th>FeeSplit5</th>
                    <th>FeeTo5</th>
                    <th>FeeSplit6</th>
                    <th>FeeTo6</th>
                    <th>Pipeline</th>
                    <th>MonthOfClose</th>
                    <th>Paul</th>
                    <th>McBroom</th>
                    <th>GrossThis</th>
                    <th>GrossNext</th>                    
                </tr>
            </thead>

            <tbody>
            <?php
            	foreach($company_input as $single_company) {  ?>
            	<tr>
					<td><?php echo $single_company->ID; ?></td>
    				<td><?php echo $single_company->Company; ?></td>
    				<td><?php echo $single_company->ELDate; ?></td>
    				<td><?php echo $single_company->IBCDate; ?></td>
    				<td><?php echo $single_company->EstCloseDate; ?></td>
    				<td><?php echo $single_company->ProjectName; ?></td>
    				<td><?php echo $single_company->ELExpirationDate; ?></td>
    				<td><?php echo $single_company->Status; ?></td>
    				<td><?php echo $single_company->DealType; ?></td>
    				<td><?php echo $single_company->DealSlot; ?></td>
    				<td><?php echo $single_company->ClosedDate; ?></td>
    				<td><?php echo $single_company->DeadDate; ?></td>
    				<td><?php echo $single_company->PrimaryBanker; ?></td>
    				<td><?php echo $single_company->PracticeArea; ?></td>
    				<td><?php echo $single_company->Industry; ?></td>
					<td><?php echo $single_company->ProjectedTransactionSize; ?></td>
    				<td><?php echo $single_company->EnterpiseValue; ?></td>
    				<td><?php echo $single_company->FinalTransactionSize; ?></td>
    				<td><?php echo $single_company->ProjectedFee; ?></td>
    				<td><?php echo $single_company->FeeMinimum; ?></td>
    				<td><?php echo $single_company->EngagmentFee; ?></td>
    				<td><?php echo $single_company->FeeDetails; ?></td>
    				<td><?php echo $single_company->SplitToCorporate; ?></td>
    				<td><?php echo $single_company->MonthlyRetainer; ?></td>
    				<td><?php echo $single_company->FinalTotalSucessFee; ?></td>
    				<td><?php echo $single_company->OwnershipClass; ?></td>
    				<td><?php echo $single_company->ReferralType; ?></td>
    				<td><?php echo $single_company->ReferralSourceCompany; ?></td>
    				<td><?php echo $single_company->ReferralScourceInd; ?></td>
    				<td><?php echo $single_company->Description; ?></td>
					<td><?php echo $single_company->TeamSplit1; ?></td>
    				<td><?php echo $single_company->Team1; ?></td>
    				<td><?php echo $single_company->TeamSplit2; ?></td>
    				<td><?php echo $single_company->Team2; ?></td>
    				<td><?php echo $single_company->TeamSplit3; ?></td>
    				<td><?php echo $single_company->Team3; ?></td>
    				<td><?php echo $single_company->TeamSplit4; ?></td>
    				<td><?php echo $single_company->Team4; ?></td>
    				<td><?php echo $single_company->TeamSplit5; ?></td>
    				<td><?php echo $single_company->Team5; ?></td>
    				<td><?php echo $single_company->TeamSplit6; ?></td>
    				<td><?php echo $single_company->Team6; ?></td>
    				<td><?php echo $single_company->FeeSplit1; ?></td>
    				<td><?php echo $single_company->FeeTo1; ?></td>
    				<td><?php echo $single_company->FeeSplit2; ?></td>
					<td><?php echo $single_company->FeeTo2; ?></td>
    				<td><?php echo $single_company->FeeSplit3; ?></td>
    				<td><?php echo $single_company->FeeTo3; ?></td>
    				<td><?php echo $single_company->FeeSplit4; ?></td>
    				<td><?php echo $single_company->FeeTo4; ?></td>
    				<td><?php echo $single_company->FeeSplit5; ?></td>
    				<td><?php echo $single_company->FeeTo5; ?></td>
    				<td><?php echo $single_company->FeeSplit6; ?></td>
    				<td><?php echo $single_company->FeeTo6; ?></td>
    				<td><?php echo $single_company->Paul; ?></td>
    				<td><?php echo $single_company->McBroom; ?></td>
    				<td><?php echo $single_company->Pipeline; ?></td>
    				<td><?php echo $single_company->MonthOfClose; ?></td>
    				<td><?php echo $single_company->GrossThis; ?></td>
    				<td><?php echo $single_company->GrossNext; ?></td>

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
