<fieldset><legend>ellive_form</legend>
 <?php     
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open('forms/ellive_form', $attributes); ?>
<div class="control-group">
    <label for="January" class="control-label">January</label>
	<div class='controls'>
       <input id="January" type="text" name="January" maxlength="255" value="<?php echo set_value('January'); ?>"  />
		 <?php echo form_error('January'); ?>
	</div>
</div><div class="control-group">
    <label for="Febuary" class="control-label">Febuary</label>
	<div class='controls'>
       <input id="Febuary" type="text" name="Febuary" maxlength="255" value="<?php echo set_value('Febuary'); ?>"  />
		 <?php echo form_error('Febuary'); ?>
	</div>
</div><div class="control-group">
    <label for="March" class="control-label">March</label>
	<div class='controls'>
       <input id="March" type="text" name="March" maxlength="255" value="<?php echo set_value('March'); ?>"  />
		 <?php echo form_error('March'); ?>
	</div>
</div><div class="control-group">
    <label for="April" class="control-label">April</label>
	<div class='controls'>
       <input id="April" type="text" name="April" maxlength="255" value="<?php echo set_value('April'); ?>"  />
		 <?php echo form_error('April'); ?>
	</div>
</div><div class="control-group">
    <label for="May" class="control-label">May</label>
	<div class='controls'>
       <input id="May" type="text" name="May" maxlength="255" value="<?php echo set_value('May'); ?>"  />
		 <?php echo form_error('May'); ?>
	</div>
</div><div class="control-group">
    <label for="June" class="control-label">June</label>
	<div class='controls'>
       <input id="June" type="text" name="June" maxlength="255" value="<?php echo set_value('June'); ?>"  />
		 <?php echo form_error('June'); ?>
	</div>
</div><div class="control-group">
    <label for="July" class="control-label">July</label>
	<div class='controls'>
       <input id="July" type="text" name="July" maxlength="255" value="<?php echo set_value('July'); ?>"  />
		 <?php echo form_error('July'); ?>
	</div>
</div><div class="control-group">
    <label for="August" class="control-label">August</label>
	<div class='controls'>
       <input id="August" type="text" name="August" maxlength="255" value="<?php echo set_value('August'); ?>"  />
		 <?php echo form_error('August'); ?>
	</div>
</div><div class="control-group">
    <label for="September" class="control-label">September</label>
	<div class='controls'>
       <input id="September" type="text" name="September" maxlength="255" value="<?php echo set_value('September'); ?>"  />
		 <?php echo form_error('September'); ?>
	</div>
</div><div class="control-group">
    <label for="October" class="control-label">October</label>
	<div class='controls'>
       <input id="October" type="text" name="October" maxlength="255" value="<?php echo set_value('October'); ?>"  />
		 <?php echo form_error('October'); ?>
	</div>
</div><div class="control-group">
    <label for="November" class="control-label">November</label>
	<div class='controls'>
       <input id="November" type="text" name="November" maxlength="255" value="<?php echo set_value('November'); ?>"  />
		 <?php echo form_error('November'); ?>
	</div>
</div><div class="control-group">
    <label for="December" class="control-label">December</label>
	<div class='controls'>
       <input id="December" type="text" name="December" maxlength="255" value="<?php echo set_value('December'); ?>"  />
		 <?php echo form_error('December'); ?>
	</div>
</div>
<div class="control-group">
	<label></label>
	<div class='controls'>
        <?php echo form_submit( 'submit', 'Submit'); ?>
	</div>
</div>
<?php echo form_close(); ?></fieldset>