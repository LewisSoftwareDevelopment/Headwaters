<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
	<head>
		<?php echo $head; ?>
	</head>
	<body class="<?php echo $body_class; ?> stickyheader">
		<!-- Preloader -->
		<div id="preloader">
				<div id="status"><i class="fa fa-spinner fa-spin"></i></div>
		</div>
		<section>
			<?php echo $header; ?>
			<div class="mainpanel">
				<div class="headerbar">
					<!--** MENU TOGGLE NEEDS TO BE KEPT-->
					<a class="menutoggle"><i class="fa fa-bars"></i></a>
					<!--** SEARCH FUNCTIONALITY NEEDS TO BE KEPT // MAYBE REMOVE LATER-->
					<form class="searchform" action="" method="post">
						<input type="text" class="form-control" name="keyword" placeholder="Search here..." />
					</form>
				</div>
				<!-- /headerbar -->
				<?php echo $content; ?>
				
			</div>
		</section>	
		<!-- /mainpanel -->
		<?php echo $footer; ?>
		<script>
		  	jQuery(document).ready(function(){
			  
				// Chosen Select
				jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});
				
				// Tags Input
				jQuery('#tags').tagsInput({width:'auto'});
				 
				// Textarea Autogrow
				jQuery('#autoResizeTA').autogrow();
				
				// Color Picker
				if(jQuery('#colorpicker').length > 0) {
				 	jQuery('#colorSelector').ColorPicker({
						onShow: function (colpkr) {
							jQuery(colpkr).fadeIn(500);
							return false;
						},
						onHide: function (colpkr) {
							jQuery(colpkr).fadeOut(500);
							return false;
						},
						onChange: function (hsb, hex, rgb) {
							jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
							jQuery('#colorpicker').val('#'+hex);
						}
				 	});
				}
				
				// Color Picker Flat Mode
				jQuery('#colorpickerholder').ColorPicker({
					flat: true,
					onChange: function (hsb, hex, rgb) {
						jQuery('#colorpicker3').val('#'+hex);
					}
				});
				 
				// Date Picker
				jQuery('#datepicker').datepicker();
				
				jQuery('#datepicker-inline').datepicker();
				
				jQuery('#datepicker-multiple').datepicker({
					numberOfMonths: 3,
					showButtonPanel: true
				});
				
				// Spinner
				var spinner = jQuery('#spinner').spinner();
				spinner.spinner('value', 0);
				
				// Input Masks
				jQuery("#date").mask("99/99/9999");
				jQuery("#phone").mask("(999) 999-9999");
				jQuery("#ssn").mask("999-99-9999");
				
				// Time Picker
				jQuery('#timepicker').timepicker({defaultTIme: false});
				jQuery('#timepicker2').timepicker({showMeridian: false});
				jQuery('#timepicker3').timepicker({minuteStep: 15});
			});
		</script>
	</body>
</html>
