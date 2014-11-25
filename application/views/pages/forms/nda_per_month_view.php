<fieldset><legend>nda_per_month_form</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('forms/nda_per_month_form', $attributes); ?>
<div class="control-group">
    <label for="Date" class="control-label">Date</label>
	<div class='controls'>
       <input id="Date" type="text" name="Date" maxlength="255" value="<?php echo set_value('Date'); ?>"  />
		 <?php echo form_error('Date'); ?>
	</div>
</div><div class="control-group">
    <label for="TotalPerMonth" class="control-label">TotalPerMonth</label>
	<div class='controls'>
       <input id="TotalPerMonth" type="text" name="TotalPerMonth" maxlength="255" value="<?php echo set_value('TotalPerMonth'); ?>"  />
		 <?php echo form_error('TotalPerMonth'); ?>
	</div>
</div>
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>