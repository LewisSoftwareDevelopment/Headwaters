<fieldset><legend>bankers_form</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('forms/bankers_form', $attributes); ?>
<div class="control-group">
    <label for="FirstName" class="control-label">First Name</label>
	<div class='controls'>
       <input id="FirstName" type="text" name="FirstName" maxlength="255" value="<?php echo set_value('FirstName'); ?>"  />
		 <?php echo form_error('FirstName'); ?>
	</div>
</div><div class="control-group">
    <label for="YTDLast" class="control-label">YTD Last</label>
	<div class='controls'>
       <input id="YTDLast" type="text" name="YTDLast" maxlength="255" value="<?php echo set_value('YTDLast'); ?>"  />
		 <?php echo form_error('YTDLast'); ?>
	</div>
</div><div class="control-group">
    <label for="LastName" class="control-label">Last Name</label>
	<div class='controls'>
       <input id="LastName" type="text" name="LastName" maxlength="255" value="<?php echo set_value('LastName'); ?>"  />
		 <?php echo form_error('LastName'); ?>
	</div>
</div><div class="control-group"><div class='controls'>
<label for="Active" class="checkbox">
		<input type="checkbox" id="Active" name="Active" value="1" class="" <?php echo set_checkbox('Active', '1'); ?>>
		Active</label>		
                   </div>
	
	<?php echo form_error('Active'); ?>
</div> <div class="control-group">
    <label for="Name" class="control-label">Name</label>
	<div class='controls'>
       <input id="Name" type="text" name="Name" maxlength="255" value="<?php echo set_value('Name'); ?>"  />
		 <?php echo form_error('Name'); ?>
	</div>
</div><div class="control-group">
    <label for="BudgetYear" class="control-label">Budget Year</label>
	<div class='controls'>
       <input id="BudgetYear" type="text" name="BudgetYear" maxlength="255" value="<?php echo set_value('BudgetYear'); ?>"  />
		 <?php echo form_error('BudgetYear'); ?>
	</div>
</div><div class="control-group">
    <label for="StartDate" class="control-label">Start Date</label>
	<div class='controls'>
       <input id="StartDate" type="text" name="StartDate" maxlength="255" value="<?php echo set_value('StartDate'); ?>"  />
		 <?php echo form_error('StartDate'); ?>
	</div>
</div><div class="control-group">
    <label for="YTDRevenue" class="control-label">YTD Revenue</label>
	<div class='controls'>
       <input id="YTDRevenue" type="text" name="YTDRevenue" maxlength="255" value="<?php echo set_value('YTDRevenue'); ?>"  />
		 <?php echo form_error('YTDRevenue'); ?>
	</div>
</div><div class="control-group">
    <label for="LastYearRev" class="control-label">Last Year Rev</label>
	<div class='controls'>
       <input id="LastYearRev" type="text" name="LastYearRev" maxlength="255" value="<?php echo set_value('LastYearRev'); ?>"  />
		 <?php echo form_error('LastYearRev'); ?>
	</div>
</div><div class="control-group">
    <label for="PriorYearRev" class="control-label">Prior Year Rev</label>
	<div class='controls'>
       <input id="PriorYearRev" type="text" name="PriorYearRev" maxlength="255" value="<?php echo set_value('PriorYearRev'); ?>"  />
		 <?php echo form_error('PriorYearRev'); ?>
	</div>
</div><div class="control-group">
    <label for="LastYearRank" class="control-label">Last Year Rank</label>
	<div class='controls'>
       <input id="LastYearRank" type="text" name="LastYearRank" maxlength="255" value="<?php echo set_value('LastYearRank'); ?>"  />
		 <?php echo form_error('LastYearRank'); ?>
	</div>
</div><div class="control-group">
    <label for="YTDClosing" class="control-label">YTD Closing</label>
	<div class='controls'>
       <input id="YTDClosing" type="text" name="YTDClosing" maxlength="255" value="<?php echo set_value('YTDClosing'); ?>"  />
		 <?php echo form_error('YTDClosing'); ?>
	</div>
</div><div class="control-group">
    <label for="LastYearClosing" class="control-label">Last Year Closing</label>
	<div class='controls'>
       <input id="LastYearClosing" type="text" name="LastYearClosing" maxlength="255" value="<?php echo set_value('LastYearClosing'); ?>"  />
		 <?php echo form_error('LastYearClosing'); ?>
	</div>
</div><div class="control-group">
    <label for="YTDIBC" class="control-label">YTD IBC</label>
	<div class='controls'>
       <input id="YTDIBC" type="text" name="YTDIBC" maxlength="255" value="<?php echo set_value('YTDIBC'); ?>"  />
		 <?php echo form_error('YTDIBC'); ?>
	</div>
</div><div class="control-group">
    <label for="YTDEngagements" class="control-label">YTD Engagements</label>
	<div class='controls'>
       <input id="YTDEngagements" type="text" name="YTDEngagements" maxlength="255" value="<?php echo set_value('YTDEngagements'); ?>"  />
		 <?php echo form_error('YTDEngagements'); ?>
	</div>
</div><div class="control-group">
    <label for="TotalCurrentEngagments" class="control-label">Total Current Engagments</label>
	<div class='controls'>
       <input id="TotalCurrentEngagments" type="text" name="TotalCurrentEngagments" maxlength="255" value="<?php echo set_value('TotalCurrentEngagments'); ?>"  />
		 <?php echo form_error('TotalCurrentEngagments'); ?>
	</div>
</div><div class="control-group">
    <label for="Wheelhouse" class="control-label">Wheelhouse</label>
	<div class='controls'>
       <input id="Wheelhouse" type="text" name="Wheelhouse" maxlength="255" value="<?php echo set_value('Wheelhouse'); ?>"  />
		 <?php echo form_error('Wheelhouse'); ?>
	</div>
</div><div class="control-group">
    <label for="Speculative" class="control-label">Speculative</label>
	<div class='controls'>
       <input id="Speculative" type="text" name="Speculative" maxlength="255" value="<?php echo set_value('Speculative'); ?>"  />
		 <?php echo form_error('Speculative'); ?>
	</div>
</div><div class="control-group">
    <label for="Minimum" class="control-label">Minimum</label>
	<div class='controls'>
       <input id="Minimum" type="text" name="Minimum" maxlength="255" value="<?php echo set_value('Minimum'); ?>"  />
		 <?php echo form_error('Minimum'); ?>
	</div>
</div>
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>