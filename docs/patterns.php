<!DOCTYPE html>
<html>

<?php include('../views/partials/globalHead.php'); ?>

<body>
	<div class="wrapper">	
		<div class="gd-row gt-row">
			<div class="gd-columns gt-columns gd-quarter gt-quarter">
				<ul class="unstyled">
					<li class="js-scroll-btn" data-scroll="type">Type</li>
					<li class="js-scroll-btn" data-scroll="lists">Lists</li>
					<li><a class="js-scroll-btn" data-scroll="buttons">Buttons</a></li>
				</ul>
			</div>
			<div class="gd-columns gt-columns gd-three-quarters gt-three-quarters">
				<div class="gd-row gt-row">
					<div class="gd-columns gt-columns gd-two-thirds gt-two-thirds">

						<div class="group">
							<h2 class="primary-heading paragon-text">Swatches</h2>
							<div class="swatch-1 gd-columns gt-columns gm-columns gd-quarter gt-quarter gm-half align-center">
								<span class="swatch-text">text</span>
							</div>
							<div class="swatch-2 gd-columns gt-columns gm-columns gd-quarter gt-quarter gm-half align-center">
								<span class="swatch-text">text</span>
							</div>
							<div class="swatch-3 gd-columns gt-columns gm-columns gd-quarter gt-quarter gm-half align-center">
								<span class="swatch-text">text</span>
							</div>
							<div class="swatch-4 gd-columns gt-columns gm-columns gd-quarter gt-quarter gm-half align-center">
								<span class="swatch-text">text</span>
							</div>
							<div class="swatch-5 gd-columns gt-columns gm-columns gd-quarter gt-quarter gm-half align-center">
								<span class="swatch-text">text</span>
							</div>
							<div class="swatch-6 gd-columns gt-columns gm-columns gd-quarter gt-quarter gm-half align-center">
								<span class="swatch-text">text</span>
							</div>
						</div>

						<h2 data-scroll="type" class="js-scroll-dest primary-heading paragon-text">Type</h2>

						<!-- Typographic Scale -->
						<div>
							<p class="canon-text">Canon Text</p>
							<p class="paragon-text">Paragon Text</p>
							<p class="primer-text">Primer Text</p>
							<p class="normal-text">Normal Text</p>
							<p class="petite-text">Petite Text</p>
							<p class="minion-text">Minion Text</p>
						</div>
						<!-- End Typographic Scale -->

						<!-- Embeded Fonts -->
						<h3 class="secondary-heading primer-text">Embeded Fonts</h3>
						<!-- End Fonts -->

						<!-- Body Text -->
						<h3 class="secondary-heading primer-text">Body Text</h3>
						<p>Following Dumbledore's death, Voldemort continues to gain support and increase his power. When Harry turns seventeen, the protection he has at his aunt and uncle's house will be broken. Before that can happen, at Mad Eye Moody's suggestion, Harry flees to the Burrow with his friends, many of whom use Polyjuice Potion to impersonate him so as to confuse any Death Eaters that may attack.</p>
						<!-- End Body Text -->

						<!-- Lists -->
						<h2 data-scroll="lists" class="js-scroll-dest primary-heading paragon-text">Lists</h2>
						<div>
							<!-- Ordered Lists -->
							<h3 class="secondary-heading primer-text">Ordered List</h3>
							<ol>
								<li>Plot introduction</li>
								<li>Plot summary</li>
								<li>Epilogue</li>
							</ol>
							<!-- End Ordered Lists -->

							<!-- Unordered Lists -->
							<h3 class="secondary-heading primer-text">Unordered List</h3>
							<ul>
								<li>Plot introduction</li>
								<li>Plot summary</li>
								<li>Epilogue</li>
							</ul>		
							<!-- End Unordered Lists -->
							
							<!-- Unstyled Lists -->
							<h3 class="secondary-heading primer-text">Unstyled List</h3>
							<ul class="unstyled">
								<li>Plot introduction</li>
								<li>Plot summary</li>
								<li>Epilogue</li>
							</ul>
							<!-- End Unstyled Lists -->
						</div>
						<!-- End Lists -->

						<!-- Buttons -->
						<h2 data-scroll="buttons" class="js-scroll-dest primary-heading paragon-text">Buttons</h2>
						
						<h3 class="secondary-heading primer-text">Tiny Button</h3>
						<a href="#" class="button primary tiny">Primary</a>
						<a href="#" class="button tiny">Buton</a>

						<h3 class="secondary-heading primer-text">Small Button</h3>
						<a href="#" class="button primary small">Primary</a>
						<a href="#" class="button small">Button</a>

						<h3 class="secondary-heading primer-text">Normal Button</h3>
						<a href="#" class="button primary">Primary</a>
						<a href="#" class="button">Button</a>

						<h3 class="secondary-heading primer-text">Large Button</h3>
						<a href="#" class="button primary large">Primary</a>
						<a href="#" class="button large">Button</a>
						<!-- End Buttons -->

					</div>
				</div>
				
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<?php include('../views/partials/scripts.inc.php'); ?>
	<!-- End Loading Scripts -->
	<script>
	
	$(document).ready(function() {
		var swatchText = $(".swatch-text");

		swatchText.each(function() {
			var color = $(this).parent('div').css('background-color');

			function rgb2hex(rgb) {
			    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			    function hex(x) {
			        return ("0" + parseInt(x).toString(16)).slice(-2);
			    }
			    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
			}

			$(this).text(rgb2hex(color));

		});
	});

	</script>

</body>
</html>