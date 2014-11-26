<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/forms'); ?>">Forms</a></li>
			<li class="active">Bankers Form</li>
		</ol>
	</div>
</div>
<div class="contentpanel">
	<?php     
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo form_open('forms/bankers_form', $attributes); ?>
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="panel panel-primary">

						<div class="panel-heading">
							<div class="panel-btns">
								<a href="" class="minimize">−</a>
							</div><!-- panel-btns -->
							<h3 class="panel-title">Bankers Group 1</h3>
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label for="FirstName" class="control-label">First Name</label>
								<input id="FirstName" type="text" name="FirstName" maxlength="255" value="<?php echo set_value('FirstName'); ?>"  />
								<?php echo form_error('FirstName'); ?>
							</div>

							<div class="form-group">
								<label for="YTDLast" class="control-label">YTD Last</label>
								<input id="YTDLast" type="text" name="YTDLast" maxlength="255" value="<?php echo set_value('YTDLast'); ?>"  />
								<?php echo form_error('YTDLast'); ?>
							</div>

							<div class="form-group">
								<label for="LastName" class="control-label">Last Name</label>
								<input id="LastName" type="text" name="LastName" maxlength="255" value="<?php echo set_value('LastName'); ?>"  />
								<?php echo form_error('LastName'); ?>
							</div>

							<div class="ckbox ckbox-default">
								<input type="checkbox" id="Active" name="Active" value="1" class="" <?php echo set_checkbox('Active', '1'); ?>>
								<label for="Active" class="checkbox">Active</label>
								<?php echo form_error('Active'); ?>
							</div>
 
							<div class="form-group">
								<label for="Name" class="control-label">Name</label>
								<input id="Name" type="text" name="Name" maxlength="255" value="<?php echo set_value('Name'); ?>"  />
								<?php echo form_error('Name'); ?>
							</div>

							<div class="form-group">
								<label for="BudgetYear" class="control-label">Budget Year</label>
								<input id="BudgetYear" type="text" name="BudgetYear" maxlength="255" value="<?php echo set_value('BudgetYear'); ?>"  />
								<?php echo form_error('BudgetYear'); ?>
							</div>

							<div class="form-group">
								<label for="StartDate" class="control-label">Start Date</label>
								<input id="StartDate" type="text" name="StartDate" maxlength="255" value="<?php echo set_value('StartDate'); ?>"  />
								<?php echo form_error('StartDate'); ?>
							</div>

							<div class="form-group">
								<label for="YTDRevenue" class="control-label">YTD Revenue</label>
								<input id="YTDRevenue" type="text" name="YTDRevenue" maxlength="255" value="<?php echo set_value('YTDRevenue'); ?>"  />
								<?php echo form_error('YTDRevenue'); ?>
							</div>

							<div class="form-group">
								<label for="LastYearRev" class="control-label">Last Year Rev</label>
								<input id="LastYearRev" type="text" name="LastYearRev" maxlength="255" value="<?php echo set_value('LastYearRev'); ?>"  />
								<?php echo form_error('LastYearRev'); ?>
							</div>

							<div class="form-group">
								<label for="PriorYearRev" class="control-label">Prior Year Rev</label>
								<input id="PriorYearRev" type="text" name="PriorYearRev" maxlength="255" value="<?php echo set_value('PriorYearRev'); ?>"  />
								<?php echo form_error('PriorYearRev'); ?>
							</div>

							<div class="form-group">
								<label for="LastYearRank" class="control-label">Last Year Rank</label>
								<input id="LastYearRank" type="text" name="LastYearRank" maxlength="255" value="<?php echo set_value('LastYearRank'); ?>"  />
								<?php echo form_error('LastYearRank'); ?>
							</div>

							<div class="form-group">
								<label for="YTDClosing" class="control-label">YTD Closing</label>
								<input id="YTDClosing" type="text" name="YTDClosing" maxlength="255" value="<?php echo set_value('YTDClosing'); ?>"  />
								<?php echo form_error('YTDClosing'); ?>
							</div>

							<div class="form-group">
								<label for="LastYearClosing" class="control-label">Last Year Closing</label>
								<input id="LastYearClosing" type="text" name="LastYearClosing" maxlength="255" value="<?php echo set_value('LastYearClosing'); ?>"  />
								<?php echo form_error('LastYearClosing'); ?>
							</div>

							<div class="form-group">
								<label for="YTDIBC" class="control-label">YTD IBC</label>
								<input id="YTDIBC" type="text" name="YTDIBC" maxlength="255" value="<?php echo set_value('YTDIBC'); ?>"  />
								<?php echo form_error('YTDIBC'); ?>
							</div>

							<div class="form-group">
								<label for="YTDEngagements" class="control-label">YTD Engagements</label>
								<input id="YTDEngagements" type="text" name="YTDEngagements" maxlength="255" value="<?php echo set_value('YTDEngagements'); ?>"  />
								<?php echo form_error('YTDEngagements'); ?>
							</div>

							<div class="form-group">
								<label for="TotalCurrentEngagments" class="control-label">Total Current Engagments</label>
								<input id="TotalCurrentEngagments" type="text" name="TotalCurrentEngagments" maxlength="255" value="<?php echo set_value('TotalCurrentEngagments'); ?>"  />
								<?php echo form_error('TotalCurrentEngagments'); ?>
							</div>

							<div class="form-group">
								<label for="Wheelhouse" class="control-label">Wheelhouse</label>
								<input id="Wheelhouse" type="text" name="Wheelhouse" maxlength="255" value="<?php echo set_value('Wheelhouse'); ?>"  />
								<?php echo form_error('Wheelhouse'); ?>
							</div>

							<div class="form-group">
								<label for="Speculative" class="control-label">Speculative</label>
								<input id="Speculative" type="text" name="Speculative" maxlength="255" value="<?php echo set_value('Speculative'); ?>"  />
								<?php echo form_error('Speculative'); ?>
							</div>

							<div class="form-group">
								<label for="Minimum" class="control-label">Minimum</label>
								<input id="Minimum" type="text" name="Minimum" maxlength="255" value="<?php echo set_value('Minimum'); ?>"  />
								<?php echo form_error('Minimum'); ?>
							</div>

							<div class="form-group">
								<?php 
									$attributes = array(
									    'name' => 'button',
									    'class' => 'btn btn-lg btn-block btn-darkblue',
									    'id' => 'actuals-button',
									    'value' => 'Add a Actuals record',
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