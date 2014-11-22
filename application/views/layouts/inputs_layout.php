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
			<!-- /mainpanel -->
			<!-- magical wizardry -->
			<?php echo add_js(array(
									'jquery-1.10.2.min',
									'jquery-migrate-1.2.1.min',
									'jquery-ui.min',
									'bootstrap.min', 
									'modernizr.min',
									'jquery.sparkline.min',
									'toggles.min',
									'retina.min',
									'flot/flot.min',
									'flot/flot.resize.min',
									'morris.min',
									'raphael-2.1.0.min',
									'jquery.datatables.min',
									'bootstrap-editable',
									'chosen.jquery.min',
									'custom',
									'dashboard'
								)); ?>
			<?php echo $js; ?>
		</section>
	</body>
</html>
