<?php if (!defined('FLUX_ROOT')) exit; ?>

	</div>
	<footer class="footer footer-center bg-base-200/60 rounded p-6 text-center">
		<nav class="grid grid-flow-col gap-4 text-base-content justify-center"></nav>
			<a href="#" class="link link-hover">About</a>
			<a href="#" class="link link-hover">Contact</a>
			<a href="#" class="link link-hover">Jobs</a>
			<a href="#" class="link link-hover">Policy</a>
		</nav>
		<nav class="flex justify-center mt-4"></nav>
			<div class="flex gap-4">
				<a href="#" class="link link-animated" aria-label="Facebook Link">
					<span class="icon-[tabler--brand-facebook] size-6"></span>
				</a>
				<a href="#" class="link link-animated" aria-label="X Link">
					<span class="icon-[tabler--brand-x] size-6"></span>
				</a>
				<a href="#" class="link link-animated" aria-label="Linkedin Link"></a>
					<span class="icon-[tabler--brand-linkedin] size-6"></span>
				</a>
			</div>
		</nav>
		<aside class="mt-4"></aside>
			<p>Copyright © 2025 - All right reserved by RemixRO</p>
		</aside>
	</footer>

		<script type="text/javascript">
			function updatePreferredServer(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_server_form.preferred_server.value = preferred;
				document.preferred_server_form.submit();
			}

			function updatePreferredTheme(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_theme_form.preferred_theme.value = preferred;
				document.preferred_theme_form.submit();
			}

			function updatePreferredLanguage(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				setCookie('language', preferred);
				reload();
			}

			// Preload spinner image.
			var spinner = new Image();
			spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';

			function refreshSecurityCode(imgSelector){
				$(imgSelector).attr('src', spinner.src);

				// Load image, spinner will be active until loading is complete.
				var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
				var image = new Image();
				image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();

				$(imgSelector).attr('src', image.src);
			}
			function toggleSearchForm(){
				//$('.search-form').toggle();
				$('.search-form').slideToggle('fast');
			}

			function setCookie(key, value){
				var expires = new Date();
				expires.setTime(expires.getTime() + expires.getTime()); // never expires
				document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
			}
		</script>

		<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
			<script type="text/javascript">
				var RecaptchaOptions = {
					theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
				};
			</script>
		<?php endif ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var inputs = 'input[type=text],input[type=password],input[type=file]';
				$(inputs).focus(function(){
					$(this).css({
						'background-color': '#f9f5e7',
						'border-color': '#dcd7c7',
						'color': '#726c58'
					});
				});
				$(inputs).blur(function(){
					$(this).css({
						'backgroundColor': '#ffffff',
						'borderColor': '#dddddd',
						'color': '#444444'
					}, 500);
				});
				$('.menuitem a').hover(
					function(){
						$(this).fadeTo(200, 0.85);
						$(this).css('cursor', 'pointer');
					},
					function(){
						$(this).fadeTo(150, 1.00);
						$(this).css('cursor', 'normal');
					}
				);
				$('.money-input').keyup(function() {
					var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
					if (isNaN(creditValue))
						$('.credit-input').val('?');
					else
						$('.credit-input').val(creditValue);
				}).keyup();
				$('.credit-input').keyup(function() {
					var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
					if (isNaN(moneyValue))
						$('.money-input').val('?');
					else
						$('.money-input').val(moneyValue.toFixed(2));
				}).keyup();
			});

			function reload(){ window.location.href = '<?php echo $this->url ?>'; }
		</script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
