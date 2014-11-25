<fieldset><legend>referral_company_form</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('forms/referral_company_form', $attributes); ?>
<div class="control-group">
    <label for="Name" class="control-label">Name</label>
	<div class='controls'>
       <input id="Name" type="text" name="Name" maxlength="255" value="<?php echo set_value('Name'); ?>"  />
		 <?php echo form_error('Name'); ?>
	</div>
</div>
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>