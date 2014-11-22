<div class="pageheader">
	<h2><i class="fa fa-home"></i> Dashboard</h2>
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/forms'); ?>">Forms</a></li>
			<li class="active">Company Form</li>
		</ol>
	</div>
</div>
<div class="contentpanel">

	<fieldset><legend>Company Form</legend>
	 <?php     
	$attributes = array('class' => 'form-horizontal', 'id' => '');
	echo form_open('forms/company_form', $attributes); ?>
	<div class="control-group">
	    <label for="company" class="control-label">Company</label>
		<div class='controls'>
	       <input id="company" type="text" name="company" maxlength="255" value="<?php echo set_value('company'); ?>"  />
			 <?php echo form_error('company'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ELDate" class="control-label">ELDate</label>
		<div class='controls'>
	       <input class="datepicker" type="text" name="ELDate"  value="<?php echo set_value('ELDate'); ?>"  />
		   <?php echo form_error('ELDate'); ?>
		</div>
	</div><div class="control-group">
	    <label for="IBCDate" class="control-label">IBCDate</label>
		<div class='controls'>
	       <input class="datepicker" type="text" name="IBCDate"  value="<?php echo set_value('IBCDate'); ?>"  />
		   <?php echo form_error('IBCDate'); ?>
		</div>
	</div><div class="control-group">
	    <label for="EstCloseDate" class="control-label">EstCloseDate</label>
		<div class='controls'>
	       <input class="datepicker" type="text" name="EstCloseDate"  value="<?php echo set_value('EstCloseDate'); ?>"  />
		   <?php echo form_error('EstCloseDate'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ELExpirationDate" class="control-label">ELExpirationDate</label>
		<div class='controls'>
	       <input class="datepicker" type="text" name="ELExpirationDate" value="<?php echo set_value('ELExpirationDate'); ?>"  />
			 <?php echo form_error('ELExpirationDate'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Status" class="control-label">Status</label>
		<div class='controls'>
	       <input id="Status" type="text" name="Status" maxlength="255" value="<?php echo set_value('Status'); ?>"  />
			 <?php echo form_error('Status'); ?>
		</div>
	</div><div class="control-group">
	    <label for="DealType" class="control-label">DealType</label>
		<div class='controls'>
	       <input id="DealType" type="text" name="DealType" maxlength="255" value="<?php echo set_value('DealType'); ?>"  />
			 <?php echo form_error('DealType'); ?>
		</div>
	</div><div class="control-group">
	    <label for="DealSlot" class="control-label">DealSlot</label>
		<div class='controls'>
	       <input id="DealSlot" type="text" name="DealSlot" maxlength="255" value="<?php echo set_value('DealSlot'); ?>"  />
			 <?php echo form_error('DealSlot'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ClosedDate" class="control-label">ClosedDate</label>
		<div class='controls'>
	       <input class="datepicker" type="text" name="ClosedDate"  value="<?php echo set_value('ClosedDate'); ?>"  />
		   <?php echo form_error('ClosedDate'); ?>
		</div>
	</div><div class="control-group">
	    <label for="DeadDate" class="control-label">DeadDate</label>
		<div class='controls'>
	       <input class="datepicker" type="text" name="DeadDate"  value="<?php echo set_value('DeadDate'); ?>"  />
		   <?php echo form_error('DeadDate'); ?>
		</div>
	</div><div class="control-group">
	    <label for="PrimaryBanker" class="control-label">PrimaryBanker</label>
		<div class='controls'>
	       <input id="PrimaryBanker" type="text" name="PrimaryBanker" maxlength="255" value="<?php echo set_value('PrimaryBanker'); ?>"  />
			 <?php echo form_error('PrimaryBanker'); ?>
		</div>
	</div><div class="control-group">
	    <label for="PracticeArea" class="control-label">PracticeArea</label>
		<div class='controls'>
	       <input id="PracticeArea" type="text" name="PracticeArea" maxlength="255" value="<?php echo set_value('PracticeArea'); ?>"  />
			 <?php echo form_error('PracticeArea'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Industry" class="control-label">Industry</label>
		<div class='controls'>
	       <input id="Industry" type="text" name="Industry" maxlength="255" value="<?php echo set_value('Industry'); ?>"  />
			 <?php echo form_error('Industry'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ProjectedTransactionSize" class="control-label">ProjectedTransactionSize</label>
		<div class='controls'>
	       <input id="ProjectedTransactionSize" type="text" name="ProjectedTransactionSize" maxlength="255" value="<?php echo set_value('ProjectedTransactionSize'); ?>"  />
			 <?php echo form_error('ProjectedTransactionSize'); ?>
		</div>
	</div><div class="control-group">
	    <label for="EnterpiseValue" class="control-label">EnterpiseValue</label>
		<div class='controls'>
	       <input id="EnterpiseValue" type="text" name="EnterpiseValue" maxlength="255" value="<?php echo set_value('EnterpiseValue'); ?>"  />
			 <?php echo form_error('EnterpiseValue'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FinalTransactionSize" class="control-label">FinalTransactionSize</label>
		<div class='controls'>
	       <input id="FinalTransactionSize" type="text" name="FinalTransactionSize" maxlength="255" value="<?php echo set_value('FinalTransactionSize'); ?>"  />
			 <?php echo form_error('FinalTransactionSize'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ProjectedFee" class="control-label">ProjectedFee</label>
		<div class='controls'>
	       <input id="ProjectedFee" type="text" name="ProjectedFee" maxlength="255" value="<?php echo set_value('ProjectedFee'); ?>"  />
			 <?php echo form_error('ProjectedFee'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeMinimum" class="control-label">FeeMinimum</label>
		<div class='controls'>
	       <input id="FeeMinimum" type="text" name="FeeMinimum" maxlength="255" value="<?php echo set_value('FeeMinimum'); ?>"  />
			 <?php echo form_error('FeeMinimum'); ?>
		</div>
	</div><div class="control-group">
	    <label for="EngagmentFee" class="control-label">EngagmentFee</label>
		<div class='controls'>
	       <input id="EngagmentFee" type="text" name="EngagmentFee" maxlength="255" value="<?php echo set_value('EngagmentFee'); ?>"  />
			 <?php echo form_error('EngagmentFee'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeDetails" class="control-label">FeeDetails</label>
		<div class='controls'>
	       <input id="FeeDetails" type="text" name="FeeDetails" maxlength="255" value="<?php echo set_value('FeeDetails'); ?>"  />
			 <?php echo form_error('FeeDetails'); ?>
		</div>
	</div><div class="control-group">
	    <label for="SplitTo Corporate" class="control-label">SplitTo Corporate</label>
		<div class='controls'>
	       <input id="SplitTo Corporate" type="text" name="SplitTo Corporate" maxlength="255" value="<?php echo set_value('SplitTo Corporate'); ?>"  />
			 <?php echo form_error('SplitTo Corporate'); ?>
		</div>
	</div><div class="control-group">
	    <label for="MonthlyRetainer" class="control-label">MonthlyRetainer</label>
		<div class='controls'>
	       <input id="MonthlyRetainer" type="text" name="MonthlyRetainer" maxlength="255" value="<?php echo set_value('MonthlyRetainer'); ?>"  />
			 <?php echo form_error('MonthlyRetainer'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FinalTotalSucessFee" class="control-label">FinalTotalSucessFee</label>
		<div class='controls'>
	       <input id="FinalTotalSucessFee" type="text" name="FinalTotalSucessFee" maxlength="255" value="<?php echo set_value('FinalTotalSucessFee'); ?>"  />
			 <?php echo form_error('FinalTotalSucessFee'); ?>
		</div>
	</div><div class="control-group">
	    <label for="OwnershipClass" class="control-label">OwnershipClass</label>
		<div class='controls'>
	       <input id="OwnershipClass" type="text" name="OwnershipClass" maxlength="255" value="<?php echo set_value('OwnershipClass'); ?>"  />
			 <?php echo form_error('OwnershipClass'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ReferralType" class="control-label">ReferralType</label>
		<div class='controls'>
	       <input id="ReferralType" type="text" name="ReferralType" maxlength="255" value="<?php echo set_value('ReferralType'); ?>"  />
			 <?php echo form_error('ReferralType'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ReferralSourceCompany" class="control-label">ReferralSourceCompany</label>
		<div class='controls'>
	       <input id="ReferralSourceCompany" type="text" name="ReferralSourceCompany" maxlength="255" value="<?php echo set_value('ReferralSourceCompany'); ?>"  />
			 <?php echo form_error('ReferralSourceCompany'); ?>
		</div>
	</div><div class="control-group">
	    <label for="ReferralScourceInd" class="control-label">ReferralScourceInd</label>
		<div class='controls'>
	       <input id="ReferralScourceInd" type="text" name="ReferralScourceInd" maxlength="255" value="<?php echo set_value('ReferralScourceInd'); ?>"  />
			 <?php echo form_error('ReferralScourceInd'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Description" class="control-label">Description</label>
		<div class='controls'>
	       <input id="Description" type="text" name="Description" maxlength="255" value="<?php echo set_value('Description'); ?>"  />
			 <?php echo form_error('Description'); ?>
		</div>
	</div><div class="control-group">
	    <label for="teamsplit1" class="control-label">TeamSplit1</label>
		<div class='controls'>
	       <input id="teamsplit1" type="text" name="teamsplit1" maxlength="255" value="<?php echo set_value('teamsplit1'); ?>"  />
			 <?php echo form_error('teamsplit1'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Team1" class="control-label">Team1</label>
		<div class='controls'>
	       <input id="Team1" type="text" name="Team1" maxlength="255" value="<?php echo set_value('Team1'); ?>"  />
			 <?php echo form_error('Team1'); ?>
		</div>
	</div><div class="control-group">
	    <label for="teamsplit2" class="control-label">TeamSplit2</label>
		<div class='controls'>
	       <input id="teamsplit2" type="text" name="teamsplit2" maxlength="255" value="<?php echo set_value('teamsplit2'); ?>"  />
			 <?php echo form_error('teamsplit2'); ?>
		</div>
	</div><div class="control-group">
	    <label for="team2" class="control-label">Team2</label>
		<div class='controls'>
	       <input id="team2" type="text" name="team2" maxlength="255" value="<?php echo set_value('team2'); ?>"  />
			 <?php echo form_error('team2'); ?>
		</div>
	</div><div class="control-group">
	    <label for="TeamSplit3" class="control-label">TeamSplit3</label>
		<div class='controls'>
	       <input id="TeamSplit3" type="text" name="TeamSplit3" maxlength="255" value="<?php echo set_value('TeamSplit3'); ?>"  />
			 <?php echo form_error('TeamSplit3'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Team3" class="control-label">Team3</label>
		<div class='controls'>
	       <input id="Team3" type="text" name="Team3" maxlength="255" value="<?php echo set_value('Team3'); ?>"  />
			 <?php echo form_error('Team3'); ?>
		</div>
	</div><div class="control-group">
	    <label for="TeamSplit4" class="control-label">TeamSplit4</label>
		<div class='controls'>
	       <input id="TeamSplit4" type="text" name="TeamSplit4" maxlength="255" value="<?php echo set_value('TeamSplit4'); ?>"  />
			 <?php echo form_error('TeamSplit4'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Team4" class="control-label">Team4</label>
		<div class='controls'>
	       <input id="Team4" type="text" name="Team4" maxlength="255" value="<?php echo set_value('Team4'); ?>"  />
			 <?php echo form_error('Team4'); ?>
		</div>
	</div><div class="control-group">
	    <label for="TeamSplit5" class="control-label">TeamSplit5</label>
		<div class='controls'>
	       <input id="TeamSplit5" type="text" name="TeamSplit5" maxlength="255" value="<?php echo set_value('TeamSplit5'); ?>"  />
			 <?php echo form_error('TeamSplit5'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Team5" class="control-label">Team5</label>
		<div class='controls'>
	       <input id="Team5" type="text" name="Team5" maxlength="255" value="<?php echo set_value('Team5'); ?>"  />
			 <?php echo form_error('Team5'); ?>
		</div>
	</div><div class="control-group">
	    <label for="TeamSplit6" class="control-label">TeamSplit6</label>
		<div class='controls'>
	       <input id="TeamSplit6" type="text" name="TeamSplit6" maxlength="255" value="<?php echo set_value('TeamSplit6'); ?>"  />
			 <?php echo form_error('TeamSplit6'); ?>
		</div>
	</div><div class="control-group">
	    <label for="Team6" class="control-label">Team6</label>
		<div class='controls'>
	       <input id="Team6" type="text" name="Team6" maxlength="255" value="<?php echo set_value('Team6'); ?>"  />
			 <?php echo form_error('Team6'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeSplit1" class="control-label">FeeSplit1</label>
		<div class='controls'>
	       <input id="FeeSplit1" type="text" name="FeeSplit1" maxlength="255" value="<?php echo set_value('FeeSplit1'); ?>"  />
			 <?php echo form_error('FeeSplit1'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeTo1" class="control-label">FeeTo1</label>
		<div class='controls'>
	       <input id="FeeTo1" type="text" name="FeeTo1" maxlength="255" value="<?php echo set_value('FeeTo1'); ?>"  />
			 <?php echo form_error('FeeTo1'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeSplit2" class="control-label">FeeSplit2</label>
		<div class='controls'>
	       <input id="FeeSplit2" type="text" name="FeeSplit2" maxlength="255" value="<?php echo set_value('FeeSplit2'); ?>"  />
			 <?php echo form_error('FeeSplit2'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeTo2" class="control-label">FeeTo2</label>
		<div class='controls'>
	       <input id="FeeTo2" type="text" name="FeeTo2" maxlength="255" value="<?php echo set_value('FeeTo2'); ?>"  />
			 <?php echo form_error('FeeTo2'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeSplit3" class="control-label">FeeSplit3</label>
		<div class='controls'>
	       <input id="FeeSplit3" type="text" name="FeeSplit3" maxlength="255" value="<?php echo set_value('FeeSplit3'); ?>"  />
			 <?php echo form_error('FeeSplit3'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeTo3" class="control-label">FeeTo3</label>
		<div class='controls'>
	       <input id="FeeTo3" type="text" name="FeeTo3" maxlength="255" value="<?php echo set_value('FeeTo3'); ?>"  />
			 <?php echo form_error('FeeTo3'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeSplit4" class="control-label">FeeSplit4</label>
		<div class='controls'>
	       <input id="FeeSplit4" type="text" name="FeeSplit4" maxlength="255" value="<?php echo set_value('FeeSplit4'); ?>"  />
			 <?php echo form_error('FeeSplit4'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeTo4" class="control-label">FeeTo4</label>
		<div class='controls'>
	       <input id="FeeTo4" type="text" name="FeeTo4" maxlength="255" value="<?php echo set_value('FeeTo4'); ?>"  />
			 <?php echo form_error('FeeTo4'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeSplit5" class="control-label">FeeSplit5</label>
		<div class='controls'>
	       <input id="FeeSplit5" type="text" name="FeeSplit5" maxlength="255" value="<?php echo set_value('FeeSplit5'); ?>"  />
			 <?php echo form_error('FeeSplit5'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeTo5" class="control-label">FeeTo5</label>
		<div class='controls'>
	       <input id="FeeTo5" type="text" name="FeeTo5" maxlength="255" value="<?php echo set_value('FeeTo5'); ?>"  />
			 <?php echo form_error('FeeTo5'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeSplit6" class="control-label">FeeSplit6</label>
		<div class='controls'>
	       <input id="FeeSplit6" type="text" name="FeeSplit6" maxlength="255" value="<?php echo set_value('FeeSplit6'); ?>"  />
			 <?php echo form_error('FeeSplit6'); ?>
		</div>
	</div><div class="control-group">
	    <label for="FeeTo6" class="control-label">FeeTo6</label>
		<div class='controls'>
	       <input id="FeeTo6" type="text" name="FeeTo6" maxlength="255" value="<?php echo set_value('FeeTo6'); ?>"  />
			 <?php echo form_error('FeeTo6'); ?>
		</div>
	</div><div class="control-group"><div class='controls'>
	<label for="Paul" class="checkbox">
			<input type="checkbox" id="Paul" name="Paul" value="enter_value_here" class="" <?php echo set_checkbox('Paul', 'enter_value_here'); ?>>
			Paul</label>		
	                   </div>
		
		<?php echo form_error('Paul'); ?>
	</div> <div class="control-group"><div class='controls'>
	<label for="McBroom" class="checkbox">
			<input type="checkbox" id="McBroom" name="McBroom" value="enter_value_here" class="" <?php echo set_checkbox('McBroom', 'enter_value_here'); ?>>
			McBroom</label>		
	                   </div>
		
		<?php echo form_error('McBroom'); ?>
	</div> <div class="control-group">
	    <label for="Pipeline" class="control-label">Pipeline</label>
		<div class='controls'>
	       <input id="Pipeline" type="text" name="Pipeline" maxlength="255" value="<?php echo set_value('Pipeline'); ?>"  />
			 <?php echo form_error('Pipeline'); ?>
		</div>
	</div><div class="control-group">
	    <label for="MonthofClose" class="control-label">MonthofClose</label>
		<div class='controls'>
	       <input class="datepicker" type="text" name="MonthofClose"  value="<?php echo set_value('MonthofClose'); ?>"  />
		   <?php echo form_error('MonthofClose'); ?>
		</div>
	</div><div class="control-group">
	    <label for="GrossThis" class="control-label">GrossThis</label>
		<div class='controls'>
	       <input id="GrossThis" type="text" name="GrossThis" maxlength="255" value="<?php echo set_value('GrossThis'); ?>"  />
			 <?php echo form_error('GrossThis'); ?>
		</div>
	</div><div class="control-group">
	    <label for="GrossNext" class="control-label">GrossNext</label>
		<div class='controls'>
	       <input id="GrossNext" type="text" name="GrossNext" maxlength="255" value="<?php echo set_value('GrossNext'); ?>"  />
			 <?php echo form_error('GrossNext'); ?>
		</div>
	</div>
	<div class="control-group">
		<label></label>
		<div class='controls'>
	        <?php echo form_submit( 'submit', 'Submit'); ?>
		</div>
	</div>
	<?php echo form_close(); ?></fieldset>
</div>