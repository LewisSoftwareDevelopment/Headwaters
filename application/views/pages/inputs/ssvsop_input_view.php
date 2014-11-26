<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/inputs'); ?>">Inputs</a></li>
			<li class="active">SSVSOP Input</li>
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
					<th>January</th>
					<th>Febuary</th>
					<th>March</th>
					<th>April</th>
					<th>May</th>
					<th>June</th>
					<th>July</th>
					<th>August</th>
					<th>September</th>
					<th>October</th>
					<th>November</th>
					<th>December</th>
					<th>SS</th>
					<th>Live</th>
					<th>SSVOEL</th>
                </tr>
            </thead>

            <tbody>
            <?php
            	foreach($ssvsop_input as $single_ssvsop) {  ?>
            	<tr>
					<td><?php echo $single_ssvsop->ID; ?></td>
    				<td><?php echo $single_ssvsop->January; ?></td>
    				<td><?php echo $single_ssvsop->Febuary; ?></td>
    				<td><?php echo $single_ssvsop->March; ?></td>
    				<td><?php echo $single_ssvsop->April; ?></td>
    				<td><?php echo $single_ssvsop->May; ?></td>
    				<td><?php echo $single_ssvsop->June; ?></td>
    				<td><?php echo $single_ssvsop->July; ?></td>
    				<td><?php echo $single_ssvsop->August; ?></td>
    				<td><?php echo $single_ssvsop->September; ?></td>
    				<td><?php echo $single_ssvsop->October; ?></td>
    				<td><?php echo $single_ssvsop->November; ?></td>
    				<td><?php echo $single_ssvsop->December; ?></td>
    				<td><?php echo $single_ssvsop->SS; ?></td>
    				<td><?php echo $single_ssvsop->Live; ?></td>
    				<td><?php echo $single_ssvsop->Ssovel; ?></td>
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
