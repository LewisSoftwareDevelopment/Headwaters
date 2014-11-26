<div class="pageheader">
	<div class="breadcrumb-wrapper">
		<span class="label">You are here:</span>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(''); ?>">Dashboard</a></li>
			<li><a href="<?php echo base_url('/forms'); ?>">Forms</a></li>
			<li class="active">In Market LOI Form</li>
		</ol>
	</div>
</div>

<div class="contentpanel">
	<?php     
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo form_open('forms/in_market_loi_form', $attributes); ?>
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="panel panel-primary">

						<div class="panel-heading">
							<div class="panel-btns">
								<a href="" class="minimize">−</a>
							</div><!-- panel-btns -->
							<h3 class="panel-title">In Market LOI Group 1</h3>
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label for="January" class="control-label">January</label>
								<input id="January" class="form-control" type="text" name="January" maxlength="255" value="<?php echo set_value('January'); ?>"  />
								<?php echo form_error('January'); ?>
							</div>

							<div class="form-group">
								<label for="Febuary" class="control-label">Febuary</label>
								<input id="Febuary" class="form-control" type="text" name="Febuary" maxlength="255" value="<?php echo set_value('Febuary'); ?>"  />
								<?php echo form_error('Febuary'); ?>
							</div>

							<div class="form-group">
								<label for="March" class="control-label">March</label>
								<input id="March" class="form-control" type="text" name="March" maxlength="255" value="<?php echo set_value('March'); ?>"  />
								<?php echo form_error('March'); ?>
							</div>

							<div class="form-group">
								<label for="April" class="control-label">April</label>
								<input id="April" class="form-control" type="text" name="April" maxlength="255" value="<?php echo set_value('April'); ?>"  />
								<?php echo form_error('April'); ?>
							</div>

							<div class="form-group">
								<label for="May" class="control-label">May</label>
								<input id="May" class="form-control" type="text" name="May" maxlength="255" value="<?php echo set_value('May'); ?>"  />
								<?php echo form_error('May'); ?>
							</div>

							<div class="form-group">
								<label for="June" class="control-label">June</label>
								<input id="June" class="form-control" type="text" name="June" maxlength="255" value="<?php echo set_value('June'); ?>"  />
								<?php echo form_error('June'); ?>
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
							<h3 class="panel-title">In Market LOI Group 2</h3>
						</div>

						<div class="panel-body">
							<div class="form-group">
								<label for="July" class="control-label">July</label>
								<input id="July" class="form-control" type="text" name="July" maxlength="255" value="<?php echo set_value('July'); ?>"  />
								<?php echo form_error('July'); ?>
							</div>

							<div class="form-group">
								<label for="August" class="control-label">August</label>
								<input id="August" class="form-control" type="text" name="August" maxlength="255" value="<?php echo set_value('August'); ?>"  />
								<?php echo form_error('August'); ?>
							</div>

							<div class="form-group">
								<label for="September" class="control-label">September</label>
								<input id="September" class="form-control" type="text" name="September" maxlength="255" value="<?php echo set_value('September'); ?>"  />
								<?php echo form_error('September'); ?>
							</div>

							<div class="form-group">
								<label for="October" class="control-label">October</label>
								<input id="October" class="form-control" type="text" name="October" maxlength="255" value="<?php echo set_value('October'); ?>"  />
								<?php echo form_error('October'); ?>
							</div>

							<div class="form-group">
								<label for="November" class="control-label">November</label>
								<input id="November" class="form-control" type="text" name="November" maxlength="255" value="<?php echo set_value('November'); ?>"  />
								<?php echo form_error('November'); ?>
							</div>

							<div class="form-group">
								<label for="December" class="control-label">December</label>
								<input id="December" class="form-control" type="text" name="December" maxlength="255" value="<?php echo set_value('December'); ?>"  />
								<?php echo form_error('December'); ?>
							</div>
							
							<div class="form-group">
								<?php 
									$attributes = array(
									    'name' => 'button',
									    'class' => 'btn btn-lg btn-block btn-darkblue',
									    'id' => 'in-market-loi-button',
									    'value' => 'Add an In Market LOI record',
									    'type' => 'submit',
									    'content' => 'Add an In Market LOI record'
									);
									echo form_submit($attributes); ?>
							</div>
						</div>

					</div>
				</div>

			</div>
	<?php echo form_close(); ?>
</div>