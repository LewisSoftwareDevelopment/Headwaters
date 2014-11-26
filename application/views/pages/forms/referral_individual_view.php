<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/forms'); ?>">Forms</a></li>
			<li class="active">Referral Individual Form</li>
		</ol>
	</div>
</div>
<div class="contentpanel">	
	<?php
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo form_open('forms/referral_individual_form', $attributes); ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="panel panel-primary">

						<div class="panel-heading">
							<div class="panel-btns">
								<a href="" class="minimize">−</a>
							</div><!-- panel-btns -->
							<h3 class="panel-title">Referral Individual 1</h3>
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label for="Name" class="control-label">Name</label>
								<input id="Name" class="form-control" type="text" name="Name" maxlength="255" value="<?php echo set_value('Name'); ?>"  />
								<?php echo form_error('Name'); ?>
							</div>
							<div class="form-group">
								<label for="LastName" class="control-label">LastName</label>
								<input id="LastName" class="form-control" type="text" name="LastName" maxlength="255" value="<?php echo set_value('LastName'); ?>"  />
								<?php echo form_error('LastName'); ?>
							</div>
							<div class="form-group">
								<label for="FirstName" class="control-label">FirstName</label>
								<input id="FirstName" class="form-control" type="text" name="FirstName" maxlength="255" value="<?php echo set_value('FirstName'); ?>"  />
								<?php echo form_error('FirstName'); ?>
							</div>
							<div class="form-group">
								<?php 
									$attributes = array(
									    'name' => 'button',
									    'class' => 'btn btn-lg btn-block btn-darkblue',
									    'id' => 'referral-individual-button',
									    'value' => 'Add an Referral Individual record',
									    'type' => 'submit',
									    'content' => 'Add an Referral Individual record'
									);
									echo form_submit($attributes); ?>
							</div>
						</div>

					</div>
				</div>
			</div>
	<?php echo form_close(); ?>
</div>