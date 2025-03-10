<?php if (!defined('FLUX_ROOT')) exit; ?>

</div>
<footer>
    <div class="mx-auto max-w-7xl px-6 py-12 lg:px-8">
        <!-- Footer Grid -->
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
            <!-- Logo & About -->
            <div class="lg:col-span-2">
                <img class="h-12 w-auto" src="<?php echo $this->themePath('img/logo3.png') ?>" alt="RemixRO Logo">
                <p class="mt-4 text-sm text-gray-400">
                    Experience the nostalgia of classic Ragnarok Online with modern features and regular updates. Join our vibrant community today!
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-sm font-semibold leading-6 text-white">Quick Links</h3>
                <ul role="list" class="mt-6 space-y-4">
                    <li>
                        <a href="/download" class="text-sm leading-6 text-gray-300 hover:text-purple-400 transition">
                            Download Game
                        </a>
                    </li>
                    <li>
                        <a href="/rankings" class="text-sm leading-6 text-gray-300 hover:text-purple-400 transition">
                            Rankings
                        </a>
                    </li>
                    <li>
                        <a href="/donate" class="text-sm leading-6 text-gray-300 hover:text-purple-400 transition">
                            Donate
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social Links -->
            <div>
                <h3 class="text-sm font-semibold leading-6 text-white">Connect With Us</h3>
                <div class="mt-6 flex gap-6">
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">
                        <span class="sr-only">Discord</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-12 border-t border-gray-800 pt-8">
            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                <p class="text-xs leading-5 text-gray-400">
                    &copy; <?php echo date('Y'); ?> RemixRO. All registered trademarks belong to their respective owners and Gravity Co., Ltd.
                </p>
                <p class="text-xs leading-5 text-purple-400">
                    Website by [GM]-Remix
                </p>
            </div>
        </div>
    </div>
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

<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</body>
</html>
