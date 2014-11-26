<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/forms'); ?>">Forms</a></li>
			<li class="active">NDA Per Month Form</li>
		</ol>
	</div>
</div>
<div class="contentpanel">
	<?php
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo form_open('forms/nda_per_month_form', $attributes); ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="panel panel-primary">

						<div class="panel-heading">
							<div class="panel-btns">
								<a href="" class="minimize">−</a>
							</div><!-- panel-btns -->
							<h3 class="panel-title">NDA Per Month Group 1</h3>
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label for="Date" class="control-label">Date</label>
								<input id="Date" class="form-control" type="text" name="Date" maxlength="255" value="<?php echo set_value('Date'); ?>"  />
								<?php echo form_error('Date'); ?>
							</div>

							<div class="form-group">
								<label for="TotalPerMonth" class="control-label">TotalPerMonth</label>
								<input id="TotalPerMonth" class="form-control" type="text" name="TotalPerMonth" maxlength="255" value="<?php echo set_value('TotalPerMonth'); ?>"  />
								<?php echo form_error('TotalPerMonth'); ?>
							</div>

							<div class="form-group">
								<?php 
									$attributes = array(
									    'name' => 'button',
									    'class' => 'btn btn-lg btn-block btn-darkblue',
									    'id' => 'nda-per-month-button',
									    'value' => 'Add a NDA Per Month record',
									    'type' => 'submit',
									    'content' => 'Add a NDA Per Month record'
									);
									echo form_submit($attributes); ?>
							</div>
						</div>

					</div>
				</div>
			</div>
	<?php echo form_close(); ?>
</div>