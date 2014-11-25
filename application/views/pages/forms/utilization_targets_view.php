<fieldset><legend>utilization_targets_form</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('forms/utilization_targets_form', $attributes); ?>
<div class="control-group">
    <label for="IBCPerMD" class="control-label">IBC Per MD</label>
	<div class='controls'>
       <input id="IBCPerMD" type="text" name="IBCPerMD" maxlength="255" value="<?php echo set_value('IBCPerMD'); ?>"  />
		 <?php echo form_error('IBCPerMD'); ?>
	</div>
</div><div class="control-group">
    <label for="IBCTotalMD" class="control-label">IBC Total MD</label>
	<div class='controls'>
       <input id="IBCTotalMD" type="text" name="IBCTotalMD" maxlength="255" value="<?php echo set_value('IBCTotalMD'); ?>"  />
		 <?php echo form_error('IBCTotalMD'); ?>
	</div>
</div><div class="control-group">
    <label for="IBCYTDTarget" class="control-label">IBC YTD Target</label>
	<div class='controls'>
       <input id="IBCYTDTarget" type="text" name="IBCYTDTarget" maxlength="255" value="<?php echo set_value('IBCYTDTarget'); ?>"  />
		 <?php echo form_error('IBCYTDTarget'); ?>
	</div>
</div><div class="control-group">
    <label for="ELPerMD" class="control-label">EL Per MD</label>
	<div class='controls'>
       <input id="ELPerMD" type="text" name="ELPerMD" maxlength="255" value="<?php echo set_value('ELPerMD'); ?>"  />
		 <?php echo form_error('ELPerMD'); ?>
	</div>
</div><div class="control-group">
    <label for="ELTotalMD" class="control-label">EL Total MD</label>
	<div class='controls'>
       <input id="ELTotalMD" type="text" name="ELTotalMD" maxlength="255" value="<?php echo set_value('ELTotalMD'); ?>"  />
		 <?php echo form_error('ELTotalMD'); ?>
	</div>
</div><div class="control-group">
    <label for="ELYTDTarget" class="control-label">ELY TD Target</label>
	<div class='controls'>
       <input id="ELYTDTarget" type="text" name="ELYTDTarget" maxlength="255" value="<?php echo set_value('ELYTDTarget'); ?>"  />
		 <?php echo form_error('ELYTDTarget'); ?>
	</div>
</div><div class="control-group">
    <label for="ClosingPerMD" class="control-label">Closing Per MD</label>
	<div class='controls'>
       <input id="ClosingPerMD" type="text" name="ClosingPerMD" maxlength="255" value="<?php echo set_value('ClosingPerMD'); ?>"  />
		 <?php echo form_error('ClosingPerMD'); ?>
	</div>
</div><div class="control-group">
    <label for="ClosingTotalMD" class="control-label">Closing Total MD</label>
	<div class='controls'>
       <input id="ClosingTotalMD" type="text" name="ClosingTotalMD" maxlength="255" value="<?php echo set_value('ClosingTotalMD'); ?>"  />
		 <?php echo form_error('ClosingTotalMD'); ?>
	</div>
</div><div class="control-group">
    <label for="ClosingYTDMD" class="control-label">Closing YTD MD</label>
	<div class='controls'>
       <input id="ClosingYTDMD" type="text" name="ClosingYTDMD" maxlength="255" value="<?php echo set_value('ClosingYTDMD'); ?>"  />
		 <?php echo form_error('ClosingYTDMD'); ?>
	</div>
</div>
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>