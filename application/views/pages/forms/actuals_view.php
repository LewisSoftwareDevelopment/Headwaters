<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/forms'); ?>">Forms</a></li>
			<li class="active">Actuals Form</li>
		</ol>
	</div>
</div>
<div class="contentpanel">
	<?php     
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo form_open('forms/actuals_form', $attributes); ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-btns">
								<a href="" class="minimize">−</a>
							</div><!-- panel-btns -->
							<h3 class="panel-title">Actuals Group 1</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="ThisYearBudgetNet" class="control-label">This Year Budget Net</label>
								<input id="ThisYearBudgetNet" class="form-control" type="text" name="ThisYearBudgetNet" maxlength="255" value="<?php echo set_value('ThisYearBudgetNet'); ?>"  />
								<?php echo form_error('ThisYearBudgetNet'); ?>
							</div>
							<div class="form-group">
								<label for="ThisYearBugetGross" class="control-label">This Year Buget Gross</label>
								<input id="ThisYearBugetGross" class="form-control" type="text" name="ThisYearBugetGross" maxlength="255" value="<?php echo set_value('ThisYearBugetGross'); ?>"  />
								<?php echo form_error('ThisYearBugetGross'); ?>
							</div>
							<div class="form-group">
								<label for="YTDNetActual" class="control-label">YTD Net Actual</label>
								<input id="YTDNetActual" class="form-control" type="text" name="YTDNetActual" maxlength="255" value="<?php echo set_value('YTDNetActual'); ?>"  />
								<?php echo form_error('YTDNetActual'); ?>
							</div>
							<div class="form-group">
								<?php 
									$attributes = array(
									    'name' => 'button',
									    'class' => 'btn btn-lg btn-block btn-darkblue',
									    'id' => 'actuals-button',
									    'value' => 'Add an Actuals record',
									    'type' => 'submit',
									    'content' => 'Add an Actuals record'
									);
									echo form_submit($attributes); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php echo form_close(); ?>
</div>