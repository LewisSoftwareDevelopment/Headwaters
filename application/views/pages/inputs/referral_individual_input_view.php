<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/inputs'); ?>">Inputs</a></li>
			<li class="active">Referral Individual</li>
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
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                </tr>
            </thead>

            <tbody>
            <?php
            	foreach($referral_individual_input as $single_referral_individual) {  ?>
            	<tr>
					<td><?php echo $single_referral_individual->ID; ?></td>
    				<td><?php echo $single_referral_individual->Name; ?></td>
    				<td><?php echo $single_referral_individual->LastName; ?></td>
    				<td><?php echo $single_referral_individual->FirstName; ?></td>
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
