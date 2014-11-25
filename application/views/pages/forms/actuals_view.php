<fieldset><legend>actuals_form</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('forms/actuals_form', $attributes); ?>
<div class="control-group">
    <label for="ThisYearBudgetNet" class="control-label">This Year Budget Net</label>
	<div class='controls'>
       <input id="ThisYearBudgetNet" type="text" name="ThisYearBudgetNet" maxlength="255" value="<?php echo set_value('ThisYearBudgetNet'); ?>"  />
		 <?php echo form_error('ThisYearBudgetNet'); ?>
	</div>
</div><div class="control-group">
    <label for="ThisYearBugetGross" class="control-label">This Year Buget Gross</label>
	<div class='controls'>
       <input id="ThisYearBugetGross" type="text" name="ThisYearBugetGross" maxlength="255" value="<?php echo set_value('ThisYearBugetGross'); ?>"  />
		 <?php echo form_error('ThisYearBugetGross'); ?>
	</div>
</div><div class="control-group">
    <label for="YTDNetActual" class="control-label">YTD Net Actual</label>
	<div class='controls'>
       <input id="YTDNetActual" type="text" name="YTDNetActual" maxlength="255" value="<?php echo set_value('YTDNetActual'); ?>"  />
		 <?php echo form_error('YTDNetActual'); ?>
	</div>
</div>
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>