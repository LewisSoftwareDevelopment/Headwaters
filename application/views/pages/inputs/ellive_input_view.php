<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/inputs'); ?>">Inputs</a></li>
			<li class="active">Ellive Input</li>
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
                </tr>
            </thead>

            <tbody>
            <?php
            	foreach($ellive_input as $single_ellive) {  ?>
            	<tr>
					<td><?php echo $single_ellive->ID; ?></td>
    				<td><?php echo $single_ellive->January; ?></td>
    				<td><?php echo $single_ellive->Febuary; ?></td>
    				<td><?php echo $single_ellive->March; ?></td>
    				<td><?php echo $single_ellive->April; ?></td>
    				<td><?php echo $single_ellive->May; ?></td>
    				<td><?php echo $single_ellive->June; ?></td>
    				<td><?php echo $single_ellive->July; ?></td>
    				<td><?php echo $single_ellive->August; ?></td>
    				<td><?php echo $single_ellive->September; ?></td>
    				<td><?php echo $single_ellive->October; ?></td>
    				<td><?php echo $single_ellive->November; ?></td>
    				<td><?php echo $single_ellive->December; ?></td>
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
