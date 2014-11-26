<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/forms'); ?>">Forms</a></li>
			<li class="active">Utilization Targets Form</li>
		</ol>
	</div>
</div>
<div class="contentpanel">
	<?php     
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo form_open('forms/utilization_targets_form', $attributes); ?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="panel panel-primary">

						<div class="panel-heading">
							<div class="panel-btns">
								<a href="" class="minimize">−</a>
							</div><!-- panel-btns -->
							<h3 class="panel-title">Utilization Targets Group 1</h3>
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label for="IBCPerMD" class="control-label">IBC Per MD</label>
								<input id="IBCPerMD" class="form-control" type="text" name="IBCPerMD" maxlength="255" value="<?php echo set_value('IBCPerMD'); ?>"  />
								<?php echo form_error('IBCPerMD'); ?>
							</div>
							<div class="form-group">
								<label for="IBCTotalMD" class="control-label">IBC Total MD</label>
								<input id="IBCTotalMD" class="form-control" type="text" name="IBCTotalMD" maxlength="255" value="<?php echo set_value('IBCTotalMD'); ?>"  />
								<?php echo form_error('IBCTotalMD'); ?>
							</div>
							<div class="form-group">
								<label for="IBCYTDTarget" class="control-label">IBC YTD Target</label>
								<input id="IBCYTDTarget" class="form-control" type="text" name="IBCYTDTarget" maxlength="255" value="<?php echo set_value('IBCYTDTarget'); ?>"  />
								<?php echo form_error('IBCYTDTarget'); ?>
							</div>
							<div class="form-group">
								<label for="ELPerMD" class="control-label">EL Per MD</label>
								<input id="ELPerMD" class="form-control" type="text" name="ELPerMD" maxlength="255" value="<?php echo set_value('ELPerMD'); ?>"  />
								<?php echo form_error('ELPerMD'); ?>
							</div>
							<div class="form-group">
								<label for="ELTotalMD" class="control-label">EL Total MD</label>
								<input id="ELTotalMD" class="form-control" type="text" name="ELTotalMD" maxlength="255" value="<?php echo set_value('ELTotalMD'); ?>"  />
								<?php echo form_error('ELTotalMD'); ?>
							</div>
							<div class="form-group">
								<label for="ELYTDTarget" class="control-label">ELY TD Target</label>
								<input id="ELYTDTarget" class="form-control" type="text" name="ELYTDTarget" maxlength="255" value="<?php echo set_value('ELYTDTarget'); ?>"  />
								<?php echo form_error('ELYTDTarget'); ?>
							</div>
							<div class="form-group">
								<label for="ClosingPerMD" class="control-label">Closing Per MD</label>
								<input id="ClosingPerMD" class="form-control" type="text" name="ClosingPerMD" maxlength="255" value="<?php echo set_value('ClosingPerMD'); ?>"  />
								<?php echo form_error('ClosingPerMD'); ?>
							</div>
							<div class="form-group">
								<label for="ClosingTotalMD" class="control-label">Closing Total MD</label>
								<input id="ClosingTotalMD" class="form-control" type="text" name="ClosingTotalMD" maxlength="255" value="<?php echo set_value('ClosingTotalMD'); ?>"  />
								<?php echo form_error('ClosingTotalMD'); ?>
							</div>
							<div class="form-group">
								<label for="ClosingYTDMD" class="control-label">Closing YTD MD</label>
								<input id="ClosingYTDMD" class="form-control" type="text" name="ClosingYTDMD" maxlength="255" value="<?php echo set_value('ClosingYTDMD'); ?>"  />
								<?php echo form_error('ClosingYTDMD'); ?>
							</div>
							<div class="form-group">
								<?php 
									$attributes = array(
									    'name' => 'button',
									    'class' => 'btn btn-lg btn-block btn-darkblue',
									    'id' => 'utilization-targets-button',
									    'value' => 'Add an Utilization Targets record',
									    'type' => 'submit',
									    'content' => 'Add an Utilization Targets record'
									);
									echo form_submit($attributes); ?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
	<?php echo form_close(); ?>
</div>