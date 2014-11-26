<div class="pageheader">
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
	<?php     
		$attributes = array('class' => 'form-horizontal form-bordered', 'id' => '');
		echo form_open('forms/company_form', $attributes); ?>
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

				<div class="panel panel-primary">

					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="minimize">−</a>
						</div><!-- panel-btns -->
						<h3 class="panel-title">Company Group 1</h3>
					</div>

					<div class="panel-body">
						<div class="form-group">
						    <label for="Company" class="control-label">Company</label>
							<input id="Company" class="form-control" type="text" name="Company" maxlength="255" value="<?php echo set_value('Company'); ?>"  />
							<?php echo form_error('Company'); ?>
						</div>
						<div class="form-group">
						    <label for="ELDate" class="control-label">EL Date</label>
						    <input class="form-control" id="date" type="text" name="ELDate" value="<?php echo set_value('ELDate'); ?>"  />
							<?php echo form_error('ELDate'); ?>
						</div>
						<div class="form-group">
						    <label for="IBCDate" class="control-label">IBC Date</label>
							<input class="form-control" id="date" type="text" name="IBCDate" value="<?php echo set_value('IBCDate'); ?>"  />
							<?php echo form_error('IBCDate'); ?>
						</div>
						<div class="form-group">
						    <label for="EstCloseDate" class="control-label">Est Close Date</label>
							<input class="form-control" id="date" type="text" name="EstCloseDate" value="<?php echo set_value('EstCloseDate'); ?>"  />
							<?php echo form_error('EstCloseDate'); ?>
						</div>
						<div class="form-group">
						    <label for="ELExpirationDate" class="control-label">EL Expiration Date</label>
							<input class="form-control" id="date" type="text" name="ELExpirationDate" value="<?php echo set_value('ELExpirationDate'); ?>"  />
							<?php echo form_error('ELExpirationDate'); ?>
						</div>
						<div class="form-group">
						    <label for="Status" class="control-label">Status</label>
							<input id="Status" class="form-control" type="text" name="Status" maxlength="255" value="<?php echo set_value('Status'); ?>"  />
							<?php echo form_error('Status'); ?>
						</div>
						<div class="form-group">
						    <label for="DealType" class="control-label">Deal Type</label>
							<input id="DealType" class="form-control" type="text" name="DealType" maxlength="255" value="<?php echo set_value('DealType'); ?>"  />
							<?php echo form_error('DealType'); ?>
						</div>
						<div class="form-group">
						    <label for="DealSlot" class="control-label">Deal Slot</label>
							<input id="DealSlot" class="form-control" type="text" name="DealSlot" maxlength="255" value="<?php echo set_value('DealSlot'); ?>"  />
							<?php echo form_error('DealSlot'); ?>
						</div>
						<div class="form-group">
						    <label for="ClosedDate" class="control-label">Closed Date</label>
							<input class="form-control" id="date" type="text" name="ClosedDate" value="<?php echo set_value('ClosedDate'); ?>"  />
							<?php echo form_error('ClosedDate'); ?>
						</div>
						<div class="form-group">
						    <label for="DeadDate" class="control-label">Dead Date</label>
							<input class="form-control" id="date" type="text" name="DeadDate"  value="<?php echo set_value('DeadDate'); ?>"  />
							<?php echo form_error('DeadDate'); ?>
						</div>
					</div>

				</div>

				<div class="panel panel-primary">

					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="minimize">−</a>
						</div><!-- panel-btns -->
						<h3 class="panel-title">Company Group 2</h3>
					</div>

					<div class="panel-body">
						<div class="form-group">
						    <label for="PrimaryBanker" class="control-label">PrimaryBanker</label>
							<input id="PrimaryBanker" class="form-control" type="text" name="PrimaryBanker" maxlength="255" value="<?php echo set_value('PrimaryBanker'); ?>"  />
							<?php echo form_error('PrimaryBanker'); ?>
						</div>
						<div class="form-group">
						    <label for="PracticeArea" class="control-label">Practice Area</label>
							<input id="PracticeArea" class="form-control" type="text" name="PracticeArea" maxlength="255" value="<?php echo set_value('PracticeArea'); ?>"  />
							<?php echo form_error('PracticeArea'); ?>
						</div>
						<div class="form-group">
						    <label for="Industry" class="control-label">Industry</label>
							<input id="Industry" class="form-control" type="text" name="Industry" maxlength="255" value="<?php echo set_value('Industry'); ?>"  />
							<?php echo form_error('Industry'); ?>
						</div>
						<div class="form-group">
						    <label for="ProjectedTransactionSize" class="control-label">Projected Transaction Size</label>
						    <input id="ProjectedTransactionSize" class="form-control" type="text" name="ProjectedTransactionSize" maxlength="255" value="<?php echo set_value('ProjectedTransactionSize'); ?>"  />
							<?php echo form_error('ProjectedTransactionSize'); ?>
						</div>
						<div class="form-group">
						    <label for="EnterpiseValue" class="control-label">Enterpise Value</label>
							<input id="EnterpiseValue" class="form-control" type="text" name="EnterpiseValue" maxlength="255" value="<?php echo set_value('EnterpiseValue'); ?>"  />
							<?php echo form_error('EnterpiseValue'); ?>
						</div>
						<div class="form-group">
						    <label for="FinalTransactionSize" class="control-label">Final Transaction Size</label>
						    <input id="FinalTransactionSize" class="form-control" type="text" name="FinalTransactionSize" maxlength="255" value="<?php echo set_value('FinalTransactionSize'); ?>"  />
							<?php echo form_error('FinalTransactionSize'); ?>
						</div>
						<div class="form-group">
						    <label for="ProjectedFee" class="control-label">Projected Fee</label>
						    <input id="ProjectedFee" class="form-control" type="text" name="ProjectedFee" maxlength="255" value="<?php echo set_value('ProjectedFee'); ?>"  />
							<?php echo form_error('ProjectedFee'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeMinimum" class="control-label">Fee Minimum</label>
						    <input id="FeeMinimum" class="form-control" type="text" name="FeeMinimum" maxlength="255" value="<?php echo set_value('FeeMinimum'); ?>"  />
							<?php echo form_error('FeeMinimum'); ?>
						</div>
						<div class="form-group">
						    <label for="EngagmentFee" class="control-label">Engagment Fee</label>
						    <input id="EngagmentFee" class="form-control" type="text" name="EngagmentFee" maxlength="255" value="<?php echo set_value('EngagmentFee'); ?>"  />
							<?php echo form_error('EngagmentFee'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeDetails" class="control-label">Fee Details</label>
						    <input id="FeeDetails" class="form-control" type="text" name="FeeDetails" maxlength="255" value="<?php echo set_value('FeeDetails'); ?>"  />
							<?php echo form_error('FeeDetails'); ?>
						</div>
					</div>

				</div>	

				<div class="panel panel-primary">

					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="minimize">−</a>
						</div><!-- panel-btns -->
						<h3 class="panel-title">Company Group 3</h3>
					</div>

					<div class="panel-body">
						<div class="form-group">
							<label for="SplitToCorporate" class="control-label">SplitTo Corporate</label>
						    <input id="SplitToCorporate" class="form-control" type="text" name="SplitToCorporate" maxlength="255" value="<?php echo set_value('SplitToCorporate'); ?>"  />
							<?php echo form_error('SplitToCorporate'); ?>
						</div>
						<div class="form-group">
						    <label for="MonthlyRetainer" class="control-label">MonthlyRetainer</label>
						    <input id="MonthlyRetainer" class="form-control" type="text" name="MonthlyRetainer" maxlength="255" value="<?php echo set_value('MonthlyRetainer'); ?>"  />
							<?php echo form_error('MonthlyRetainer'); ?>
						</div>
						<div class="form-group">
						    <label for="FinalTotalSucessFee" class="control-label">FinalTotalSucessFee</label>
						    <input id="FinalTotalSucessFee" class="form-control" type="text" name="FinalTotalSucessFee" maxlength="255" value="<?php echo set_value('FinalTotalSucessFee'); ?>"  />
							<?php echo form_error('FinalTotalSucessFee'); ?>
						</div>
						<div class="form-group">
						    <label for="OwnershipClass" class="control-label">OwnershipClass</label>
							<input id="OwnershipClass" class="form-control" type="text" name="OwnershipClass" maxlength="255" value="<?php echo set_value('OwnershipClass'); ?>"  />
							<?php echo form_error('OwnershipClass'); ?>
						</div>
						<div class="form-group">
						    <label for="ReferralType" class="control-label">ReferralType</label>
						    <input id="ReferralType" class="form-control" type="text" name="ReferralType" maxlength="255" value="<?php echo set_value('ReferralType'); ?>"  />
							<?php echo form_error('ReferralType'); ?>
						</div>
						<div class="form-group">
						    <label for="ReferralSourceCompany" class="control-label">ReferralSourceCompany</label>
						    <input id="ReferralSourceCompany" class="form-control" type="text" name="ReferralSourceCompany" maxlength="255" value="<?php echo set_value('ReferralSourceCompany'); ?>"  />
							<?php echo form_error('ReferralSourceCompany'); ?>
						</div>
						<div class="form-group">
						    <label for="ReferralScourceInd" class="control-label">ReferralScourceInd</label>
						    <input id="ReferralScourceInd" class="form-control" type="text" name="ReferralScourceInd" maxlength="255" value="<?php echo set_value('ReferralScourceInd'); ?>"  />
							<?php echo form_error('ReferralScourceInd'); ?>
						</div>
						<div class="form-group">
						    <label for="Description" class="control-label">Description</label>
						    <input id="Description" class="form-control" type="text" name="Description" maxlength="255" value="<?php echo set_value('Description'); ?>"  />
							<?php echo form_error('Description'); ?>
						</div>
						<div class="form-group">
						    <label for="TeamSplit1" class="control-label">TeamSplit1</label>
						    <input id="TeamSplit1" class="form-control" type="text" name="TeamSplit1" maxlength="255" value="<?php echo set_value('TeamSplit1'); ?>"  />
							<?php echo form_error('TeamSplit1'); ?>
						</div>
						<div class="form-group">
						    <label for="Team1" class="control-label">Team1</label>
						    <input id="Team1" class="form-control" type="text" name="Team1" maxlength="255" value="<?php echo set_value('Team1'); ?>"  />
							<?php echo form_error('Team1'); ?>
						</div>

					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

				<div class="panel panel-primary">

					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="minimize">−</a>
						</div><!-- panel-btns -->
						<h3 class="panel-title">Company Group 4</h3>
					</div>

					<div class="panel-body">
						<div class="form-group">
						    <label for="TeamSplit2" class="control-label">Team Split-2</label>
						    <input id="TeamSplit2" class="form-control" type="text" name="TeamSplit2" maxlength="255" value="<?php echo set_value('TeamSplit2'); ?>"  />
							<?php echo form_error('TeamSplit2'); ?>
						</div>
						<div class="form-group">
						    <label for="team2" class="control-label">Team-2</label>
						    <input id="team2" class="form-control" type="text" name="team2" maxlength="255" value="<?php echo set_value('team2'); ?>"  />
							<?php echo form_error('team2'); ?>
						</div>
						<div class="form-group">
						    <label for="TeamSplit3" class="control-label">Team Split-3</label>
						    <input id="TeamSplit3" class="form-control" type="text" name="TeamSplit3" maxlength="255" value="<?php echo set_value('TeamSplit3'); ?>"  />
							<?php echo form_error('TeamSplit3'); ?>
						</div>
						<div class="form-group">
						    <label for="Team3" class="control-label">Team-3</label>
						    <input id="Team3" class="form-control" type="text" name="Team3" maxlength="255" value="<?php echo set_value('Team3'); ?>"  />
							<?php echo form_error('Team3'); ?>
						</div>
						<div class="form-group">
						    <label for="TeamSplit4" class="control-label">Team Split-4</label>
						    <input id="TeamSplit4" class="form-control" type="text" name="TeamSplit4" maxlength="255" value="<?php echo set_value('TeamSplit4'); ?>"  />
							<?php echo form_error('TeamSplit4'); ?>
						</div>
						<div class="form-group">
						    <label for="Team4" class="control-label">Team-4</label>
						    <input id="Team4" class="form-control" type="text" name="Team4" maxlength="255" value="<?php echo set_value('Team4'); ?>"  />
							<?php echo form_error('Team4'); ?>
						</div>
						<div class="form-group">
						    <label for="TeamSplit5" class="control-label">Team Split-5</label>
						    <input id="TeamSplit5" class="form-control" type="text" name="TeamSplit5" maxlength="255" value="<?php echo set_value('TeamSplit5'); ?>"  />
							<?php echo form_error('TeamSplit5'); ?>
						</div>
						<div class="form-group">
						    <label for="Team5" class="control-label">Team-5</label>
							<input id="Team5" class="form-control" type="text" name="Team5" maxlength="255" value="<?php echo set_value('Team5'); ?>"  />
							<?php echo form_error('Team5'); ?>
						</div>
						<div class="form-group">
						    <label for="TeamSplit6" class="control-label">Team Split-6</label>
						    <input id="TeamSplit6" class="form-control" type="text" name="TeamSplit6" maxlength="255" value="<?php echo set_value('TeamSplit6'); ?>"  />
							<?php echo form_error('TeamSplit6'); ?>
						</div>
						<div class="form-group">
						    <label for="Team6" class="control-label">Team-6</label>
						    <input id="Team6" class="form-control" type="text" name="Team6" maxlength="255" value="<?php echo set_value('Team6'); ?>"  />
							<?php echo form_error('Team6'); ?>
						</div>
					</div>

				</div>

				<div class="panel panel-primary">

					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="minimize">−</a>
						</div><!-- panel-btns -->
						<h3 class="panel-title">Company Group 5</h3>
					</div>

					<div class="panel-body">
						<div class="form-group">
						    <label for="FeeSplit1" class="control-label">Fee Split-1</label>
							<input id="FeeSplit1" class="form-control" type="text" name="FeeSplit1" maxlength="255" value="<?php echo set_value('FeeSplit1'); ?>"  />
							<?php echo form_error('FeeSplit1'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeTo1" class="control-label">FeeTo1</label>
							<input id="FeeTo1" class="form-control" type="text" name="FeeTo1" maxlength="255" value="<?php echo set_value('FeeTo1'); ?>"  />
							<?php echo form_error('FeeTo1'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeSplit2" class="control-label">FeeSplit2</label>
							<input id="FeeSplit2" class="form-control" type="text" name="FeeSplit2" maxlength="255" value="<?php echo set_value('FeeSplit2'); ?>"  />
							<?php echo form_error('FeeSplit2'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeTo2" class="control-label">FeeTo2</label>
							<input id="FeeTo2" class="form-control" type="text" name="FeeTo2" maxlength="255" value="<?php echo set_value('FeeTo2'); ?>"  />
							<?php echo form_error('FeeTo2'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeSplit3" class="control-label">FeeSplit3</label>
							<input id="FeeSplit3" class="form-control" type="text" name="FeeSplit3" maxlength="255" value="<?php echo set_value('FeeSplit3'); ?>"  />
							<?php echo form_error('FeeSplit3'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeTo3" class="control-label">FeeTo3</label>
							<input id="FeeTo3" class="form-control" type="text" name="FeeTo3" maxlength="255" value="<?php echo set_value('FeeTo3'); ?>"  />
							<?php echo form_error('FeeTo3'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeSplit4" class="control-label">FeeSplit4</label>
							<input id="FeeSplit4" class="form-control" type="text" name="FeeSplit4" maxlength="255" value="<?php echo set_value('FeeSplit4'); ?>"  />
							<?php echo form_error('FeeSplit4'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeTo4" class="control-label">FeeTo4</label>
							<input id="FeeTo4" class="form-control" type="text" name="FeeTo4" maxlength="255" value="<?php echo set_value('FeeTo4'); ?>"  />
							<?php echo form_error('FeeTo4'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeSplit5" class="control-label">FeeSplit5</label>
							<input id="FeeSplit5" class="form-control" type="text" name="FeeSplit5" maxlength="255" value="<?php echo set_value('FeeSplit5'); ?>"  />
							<?php echo form_error('FeeSplit5'); ?>			
						</div>
						<div class="form-group">
						    <label for="FeeTo5" class="control-label">FeeTo5</label>
							<input id="FeeTo5" class="form-control" type="text" name="FeeTo5" maxlength="255" value="<?php echo set_value('FeeTo5'); ?>"  />
								 <?php echo form_error('FeeTo5'); ?>		
						</div>
					</div>

				</div>

				<div class="panel panel-primary">

					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="minimize">−</a>
						</div><!-- panel-btns -->
						<h3 class="panel-title">Company Group 6</h3>
					</div>

					<div class="panel-body">
						<div class="form-group">
							<label for="FeeSplit6" class="control-label">Fee Split-6</label>
							<input id="FeeSplit6" class="form-control" type="text" name="FeeSplit6" maxlength="255" value="<?php echo set_value('FeeSplit6'); ?>"  />
							<?php echo form_error('FeeSplit6'); ?>
						</div>
						<div class="form-group">
						    <label for="FeeTo6" class="control-label">FeeTo6</label>
						    <input id="FeeTo6" class="form-control" type="text" name="FeeTo6" maxlength="255" value="<?php echo set_value('FeeTo6'); ?>"  />
							<?php echo form_error('FeeTo6'); ?>
						</div>
						<div class="ckbox ckbox-default">
							<input type="checkbox" id="Paul" name="Paul" value="1" class="" <?php echo set_checkbox('Paul', '1'); ?>>
							<label for="Paul" class="checkbox">Paul</label>
							<?php echo form_error('Paul'); ?>
						</div>
						<div class="ckbox ckbox-default">
							<input type="checkbox" id="McBroom" name="McBroom" value="1" class="" <?php echo set_checkbox('McBroom', '1'); ?>>
							<label for="McBroom" class="checkbox">McBroom</label>
							<?php echo form_error('McBroom'); ?>
						</div>
						<div class="form-group">
						    <label for="Pipeline" class="control-label">Pipeline</label>
							<input id="Pipeline" class="form-control" type="text" name="Pipeline" maxlength="255" value="<?php echo set_value('Pipeline'); ?>"  />
							<?php echo form_error('Pipeline'); ?>
						</div>
						<div class="form-group">
						    <label for="MonthofClose" class="control-label">Month of Close</label>
							<input class="form-control" id="datepicker" type="text" name="MonthofClose"  value="<?php echo set_value('MonthofClose'); ?>"  />
							<?php echo form_error('MonthofClose'); ?>
						</div>
						<div class="form-group">
						    <label for="GrossThis" class="control-label">GrossThis</label>
						    <input id="GrossThis" class="form-control" type="text" name="GrossThis" maxlength="255" value="<?php echo set_value('GrossThis'); ?>"  />
							<?php echo form_error('GrossThis'); ?>
						</div>
						<div class="form-group">
						    <label for="GrossNext" class="control-label">GrossNext</label>
							<input id="GrossNext" class="form-control" type="text" name="GrossNext" maxlength="255" value="<?php echo set_value('GrossNext'); ?>"  />
							<?php echo form_error('GrossNext'); ?>
						</div>
						<div class="form-group">
							<?php 
								$attributes = array(
								    'name' => 'button',
								    'class' => 'btn btn-lg btn-block btn-darkblue',
								    'id' => 'company-button',
								    'value' => 'Add a Company record',
								    'type' => 'submit',
								    'content' => 'Add a Company record'
								);
								echo form_submit($attributes); ?>
						</div>
					</div>

				</div>

			</div>
			
		</div>
	<?php echo form_close(); ?>
</div>