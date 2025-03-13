<?php if (!defined('FLUX_ROOT'))
    exit; ?>

<div class="pt-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <!-- Changed to grid layout for side-by-side content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Left Column: Donation Form -->
            <div class="lg:max-w-2xl">
                <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-5xl">Donate</h2>
                <?php if (Flux::config('AcceptDonations')): ?>
                    <?php if (!empty($errorMessage)): ?>
                        <div class="mt-4 p-4 bg-red-500/10 border border-red-500/20 rounded-lg">
                            <p class="text-red-400"><?php echo htmlspecialchars($errorMessage) ?></p>
                        </div>
                    <?php endif ?>

                    <div class="mt-6 space-y-6 text-gray-400">
                        <div class="space-y-4">
                            <p class="leading-relaxed">
                                By donating, you're supporting the costs of <span class="text-white">running</span> this server
                                and <span class="text-white">maintaining</span> it.
                                In return, you will be rewarded <span class="text-indigo-400">donation credits</span> that you
                                may use to purchase items from our
                                <a href="<?php echo $this->url('purchase') ?>"
                                    class="text-indigo-400 hover:text-indigo-300 transition-colors">item shop</a>.
                            </p>

                            <!-- Add this new section -->
                            <div class="rounded-lg bg-indigo-500/5 border border-indigo-500/20 p-4">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-10 h-10 text-green-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="flex-1">
                                        <h4 class="text-sm font-medium text-white mb-1">Converting Credits to Cash Points</h4>
                                        <p class="text-sm text-gray-400">
                                            After receiving donation credits, visit our <a href="<?php echo $this->url('cashshop') ?>" 
                                            class="text-indigo-400 hover:text-indigo-300 transition-colors">Cash Shop</a> to convert them into Cash Points. 
                                            The conversion rate is <span class="text-white font-medium">1:1</span>. Cash Points can be used to purchase 
                                            in-game items and special features.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $currency = Flux::config('DonationCurrency');
                        $dollarAmount = (float) +Flux::config('CreditExchangeRate');
                        $creditAmount = 1;
                        $rateMultiplier = 10;
                        $hoursHeld = +(int) Flux::config('HoldUntrustedAccount');

                        while ($dollarAmount < 1) {
                            $dollarAmount *= $rateMultiplier;
                            $creditAmount *= $rateMultiplier;
                        }
                        ?>

                        <!-- Exchange Rate Information -->
                        <div class="bg-gray-800/50 rounded-lg border border-indigo-500/20">
                            <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-700">
                                <div class="p-6">
                                    <h3 class="text-lg font-medium text-white">Credit Exchange Rate</h3>
                                    <p class="mt-2 text-xl text-green-500">
                                        <?php echo $this->formatCurrency($dollarAmount) ?>
                                        <?php echo htmlspecialchars($currency) ?>
                                        <span class="text-gray-400 text-base"> = </span>
                                        <?php echo number_format($creditAmount) ?> credits
                                    </p>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-medium text-white">Minimum Donation</h3>
                                    <p class="mt-2 text-xl text-green-500">
                                        <?php echo $this->formatCurrency(Flux::config('MinDonationAmount')) ?>
                                        <?php echo htmlspecialchars($currency) ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php if (!$donationAmount): ?>
                            <form action="<?php echo $this->url ?>" method="post" class="mt-8">
                                <?php echo $this->moduleActionFormInputs($params->get('module')) ?>
                                <input type="hidden" name="setamount" value="1" />

                                <div class="space-y-4 md:space-y-0 md:flex md:items-center md:space-x-4">
                                    <div class="flex-1">
                                        <label class="block text-sm font-medium text-white mb-2">Amount to Donate</label>
                                        <div class="relative">
                                            <input type="text" name="amount"
                                                value="<?php echo htmlspecialchars($params->get('amount') ?: 0) ?>"
                                                class="block w-full rounded-lg bg-gray-900/50 border border-indigo-500/20 px-4 py-2.5 text-black placeholder:text-gray-400 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                                placeholder="Enter amount" />
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <span class="text-gray-400"><?php echo htmlspecialchars($currency) ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-center">
                                        <span class="text-gray-400">or</span>
                                    </div>

                                    <div class="flex-1">
                                        <label class="block text-sm font-medium text-white mb-2">Credit Amount</label>
                                        <div class="relative">
                                            <input type="text" name="credit-amount"
                                                value="<?php echo htmlspecialchars(intval($params->get('amount') / Flux::config('CreditExchangeRate'))) ?>"
                                                class="block w-full rounded-lg bg-gray-900/50 border border-indigo-500/20 px-4 py-2.5 text-black placeholder:text-gray-400 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
                                                placeholder="Enter credits" />
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                                <span class="text-gray-400">Credits</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <button type="submit" 
                                        class="w-full px-6 py-3 bg-indigo-500 font-medium rounded-lg branding-green-button transition-colors">
                                        Confirm Donation Amount
                                    </button>
                                </div>
                            </form>
                        <?php else: ?>
                            <!-- Replace the existing donation button section -->
                            <div class="mt-8 text-center space-y-6">
                                <div class="space-y-2">
                                    <p class="text-3xl font-medium">
                                        <?php echo number_format(floor($donationAmount / Flux::config('CreditExchangeRate'))) ?>
                                        credits
                                    </p>
                                    <p class="text-gray-400">
                                        Amount:
                                        <span class="text-white">
                                            <?php echo $this->formatCurrency($donationAmount) ?>
                                            <?php echo htmlspecialchars(Flux::config('DonationCurrency')) ?>
                                        </span>
                                    </p>
                                </div>

                                <!-- PayPal Button Container -->
                                <div id="paypal-button-container" class="max-w-md mx-auto"></div>

                                <div>
                                    <a href="<?php echo $this->url('donate', 'index', array('resetamount' => true)) ?>"
                                        class="text-sm text-gray-400 hover:text-white transition-colors">
                                        Reset Amount
                                    </a>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                <?php else: ?>
                    <div class="mt-4 p-4 bg-gray-800/50 rounded-lg border border-gray-700">
                        <p class="text-gray-400"><?php echo Flux::message('NotAcceptingDonations') ?></p>
                    </div>
                <?php endif ?>
            </div>

            <!-- Right Column: Image and Additional Info -->
            <div>
                <div class="sticky top-24 space-y-6">
                    <!-- Decorative Image -->
                    <div class="relative rounded-xl overflow-hidden border border-gray-500/20" style="height: 550px;">
                        <img src="<?php echo $this->themePath('img/donation.png') ?>" alt="Support our server"
                            class="w-full h-[500px] object-cover" />
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
                        <!-- Text Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 space-y-4">
                            <div>
                                <h3 class="text-2xl font-semibold text-white mb-2">Support Our Community</h3>
                                <p class="text-white text-sm">Your contributions help us maintain and improve the server
                                    for everyone.</p>
                            </div>

                            <!-- Donation Allocation -->
                            <div class="bg-black/30 rounded-lg p-4 backdrop-blur-sm border border-white/10">
                                <h4 class="text-white text-sm font-medium mb-3">Donation Allocation</h4>
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-300 text-xs">Cash Rewards Pool</span>
                                        <span class="text-green-400 text-xs font-medium">20%</                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-300 text-xs">Agit Lord Prize</span>
                                        <span class="text-yellow-400 text-xs font-medium">10%</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-300 text-xs">Calendar Major Events</span>
                                        <span class="text-green-500 text-xs font-medium">10%</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-300 text-xs">Server Maintenance (Webhost, VPS Server,
                                            Salaries, Town upgrades.)</span>
                                        <span class="text-gray-300 text-xs font-medium">60%</span>
                                    </div>
                                    <div class="w-full h-2 bg-gray-700/50 rounded-full mt-2 overflow-hidden"
                                        style="background-color: var(--accents-1);">
                                        <div class="h-full bg-gradient-to-r from-green-500 via-yellow-500 to-indigo-500"
                                            style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Donation Benefits
                    <div class="bg-gray-800/50 rounded-lg border border-indigo-500/20 p-6">
                        <h3 class="text-lg font-medium text-white mb-4">Donation Benefits</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center text-sm text-gray-400">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Access to exclusive items
                            </li>
                            <li class="flex items-center text-sm text-gray-400">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Special donor badge
                            </li>
                            <li class="flex items-center text-sm text-gray-400">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Support server development
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- FAQ Accordion -->
        <div class="mt-6 bg-black/30 rounded-lg p-4 backdrop-blur-sm ">
            <h4 class="text-white text-sm font-medium mb-4">Frequently Asked Questions</h4>

            <div class="space-y-3" x-data="{ active: null }">
                <!-- FAQ Item 1 -->
                <div class="rounded-lg border border-white/5">
                    <button @click="active !== 1 ? active = 1 : active = null"
                        class="flex items-center justify-between w-full p-3 text-left">
                        <span class="text-xs font-medium text-white">How long does it take to receive credits?</span>
                        <svg class="w-4 h-4 text-gray-400 transition-transform" :class="{ 'rotate-180': active === 1 }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="active === 1" x-collapse class="px-3 pb-3">
                        <p class="text-xs text-gray-400">Credits are usually added to your account instantly after
                            payment confirmation. For new accounts, there might be a <?php echo $hoursHeld ?> hour hold
                            period.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="rounded-lg border border-white/5">
                    <button @click="active !== 2 ? active = 2 : active = null"
                        class="flex items-center justify-between w-full p-3 text-left">
                        <span class="text-xs font-medium text-white">What payment methods do you accept?</span>
                        <svg class="w-4 h-4 text-gray-400 transition-transform" :class="{ 'rotate-180': active === 2 }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="active === 2" x-collapse class="px-3 pb-3">
                        <p class="text-xs text-gray-400">We currently accept PayPal as our primary payment method,
                            ensuring secure and reliable transactions for all our donors.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="rounded-lg border border-white/5">
                    <button @click="active !== 3 ? active = 3 : active = null"
                        class="flex items-center justify-between w-full p-3 text-left">
                        <span class="text-xs font-medium text-white">What happens if I don't receive my credits?</span>
                        <svg class="w-4 h-4 text-gray-400 transition-transform" :class="{ 'rotate-180': active === 3 }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="active === 3" x-collapse class="px-3 pb-3">
                        <p class="text-xs text-gray-400">Contact our support team immediately through Discord or the
                            support ticket system. Make sure to include your transaction ID and account details.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity"></div>

        <!-- Modal Panel -->
        <div class="relative transform overflow-hidden rounded-lg bg-gray-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-indigo-500/20">
            <div class="bg-black px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <!-- Icon -->
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-500/10 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-10 w-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-lg font-medium leading-6 text-white mt-2" id="modal-title">Confirm Your Donation</h3>
                        <div class="mt-4 space-y-3">
                            <div class="rounded-lg bg-gray-900/50 p-4 border border-indigo-500/10">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-400">Amount:</span>
                                    <span class="text-base font-medium text-white" id="modalAmount"></span>
                                </div>
                                <div class="mt-2 flex justify-between items-center">
                                    <span class="text-sm text-gray-400">Credits:</span>
                                    <span class="text-base font-medium text-green-400" id="modalCredits"></span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-400">
                                Please verify the amount before proceeding. This action cannot be undone.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-gray-800/50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 bg-black">
                <button type="button" id="confirmDonation" 
                    class="inline-flex w-full justify-center rounded-lg branding-green-button focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:ml-3 sm:w-auto">
                    Proceed with Payment
                </button>
                <button type="button" id="cancelDonation" 
                    class="mt-3 inline-flex w-full justify-center rounded-lg border border-gray-500 px-4 py-2.5 text-sm font-semibold text-gray-300 shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 sm:mt-0 sm:w-auto">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    const $modal = $('#confirmationModal');
    const $form = $('form');
    let formSubmitting = false;

    // Show notification function
    function showDonationNotification(event) {
        event.preventDefault();
        
        const $amountInput = $('input[name="amount"]');
        const $creditsInput = $('input[name="credit-amount"]');
        const amount = parseFloat($amountInput.val());
        const credits = parseInt($creditsInput.val());
        const minAmount = <?php echo Flux::config('MinDonationAmount') ?>;

        if (isNaN(amount) || amount < minAmount) {
            Toastify({
                text: `Minimum donation amount is ${minAmount} <?php echo htmlspecialchars($currency) ?>`,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "linear-gradient(to right, #ef4444, #dc2626)",
                },
            }).showToast();
            return;
        }

        // Update modal content
        $('#modalAmount').text(`${amount.toFixed(2)} <?php echo htmlspecialchars($currency) ?>`);
        $('#modalCredits').text(`${credits.toLocaleString()} credits`);
        
        // Show modal
        $modal.removeClass('hidden');
    }

    // Handle modal confirmation
    $('#confirmDonation').on('click', function() {
        if (!formSubmitting) {
            formSubmitting = true;
            
            Toastify({
                text: "Processing your donation...",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: "linear-gradient(to right, #10b981, #059669)",
                },
            }).showToast();

            // Submit the form
            $form.submit();
        }
    });

    // Handle modal cancellation
    $('#cancelDonation').on('click', function() {
        $modal.addClass('hidden');
        formSubmitting = false;
    });

    // Close modal when clicking outside
    $(window).on('click', function(event) {
        if ($(event.target).closest('.sm\\:max-w-lg').length === 0 && 
            !$(event.target).closest('button[type="submit"]').length) {
            $modal.addClass('hidden');
            formSubmitting = false;
        }
    });

    // Attach modal trigger to submit button
    $('button[type="submit"]').on('click', showDonationNotification);

    // Real-time amount validation
    $('input[name="amount"]').on('input', function() {
        const amount = parseFloat($(this).val());
        const minAmount = <?php echo Flux::config('MinDonationAmount') ?>;
        const $submitBtn = $(this).closest('form').find('button[type="submit"]');

        if (isNaN(amount) || amount < minAmount) {
            $submitBtn
                .addClass('opacity-50 cursor-not-allowed')
                .removeClass('hover:bg-indigo-600');
        } else {
            $submitBtn
                .removeClass('opacity-50 cursor-not-allowed')
                .addClass('hover:bg-indigo-600');
        }
    });

    // Sync amount and credits fields
    $('input[name="amount"]').on('input', function() {
        const amount = parseFloat($(this).val());
        if (!isNaN(amount)) {
            const credits = Math.floor(amount / <?php echo Flux::config('CreditExchangeRate') ?>);
            $('input[name="credit-amount"]').val(credits);
        }
    });

    $('input[name="credit-amount"]').on('input', function() {
        const credits = parseInt($(this).val());
        if (!isNaN(credits)) {
            const amount = credits * <?php echo Flux::config('CreditExchangeRate') ?>;
            $('input[name="amount"]').val(amount.toFixed(2));
        }
    });

    // PayPal Integration
    if (document.getElementById('paypal-button-container')) {
        console.log('Initializing PayPal integration...');
        
        paypal.Buttons({
            style: {
                layout: 'vertical',
                color:  'blue',
                shape:  'rect',
                label:  'paypal'
            },

            createOrder: function(data, actions) {
                console.log('Creating PayPal order...', {
                    amount: '<?php echo number_format($donationAmount, 2, '.', '') ?>',
                    currency: '<?php echo Flux::config('DonationCurrency') ?>',
                    accountId: '<?php echo $session->account->account_id ?>'
                });

                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo number_format($donationAmount, 2, '.', '') ?>',
                            currency_code: '<?php echo Flux::config('DonationCurrency') ?>'
                        },
                        description: '<?php echo number_format(floor($donationAmount / Flux::config('CreditExchangeRate'))) ?> Credits Purchase',
                        custom_id: '<?php echo $session->account->account_id ?>'
                    }]
                }).then(function(orderID) {
                    console.log('PayPal order created successfully:', orderID);
                    return orderID;
                });
            },

            onApprove: function(data, actions) {
                console.log('Payment approved:', data);
                
                Toastify({
                    text: "Processing your payment...",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "linear-gradient(to right, #10b981, #059669)",
                    },
                }).showToast();

                return actions.order.capture().then(function(details) {
                    console.log('Payment captured:', details);

                    const transactionData = {
                        orderID: data.orderID,
                        payerID: data.payerID,
                        paymentID: details.id,
                        amount: details.purchase_units[0].amount.value,
                        currency: details.purchase_units[0].amount.currency_code,
                        status: details.status,
                        email: details.payer.email_address,
                        purchaseUnits: details.purchase_units[0],
                        paymentSource: data.paymentSource,
                        createTime: details.create_time,
                        updateTime: details.update_time,
                        token: '<?php echo $session->token ?>' // Add CSRF token
                    };
                    
                    console.log('Sending transaction data to server:', transactionData);

                    return fetch('<?php echo $this->url('donate', 'processor') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-Token': '<?php echo $session->token ?>'
                        },
                        body: JSON.stringify(transactionData)
                    })
                    .then(response => {
                        if (!response.ok) {
                            if (response.status === 401) {
                                window.location.href = '<?php echo $this->url('account', 'login') ?>';
                                throw new Error('Session expired. Please login again.');
                            }
                            return response.text().then(text => {
                                throw new Error(`Server error: ${text}`);
                            });
                        }
                        return response.json();
                    })
                    .then(result => {
                        if (result.success) {
                            // Redirect to completion page with transaction ID
                            window.location.href = `<?php echo $this->url('donate', 'complete') ?>?txn=${result.transactionId}`;
                        } else {
                            throw new Error(result.message || 'Transaction verification failed');
                        }
                    })
                    .catch(error => {
                        console.error('Transaction error:', error);
                        Toastify({
                            text: "Error processing payment: " + error.message,
                            duration: 5000,
                            gravity: "top",
                            position: "right",
                            style: {
                                background: "linear-gradient(to right, #ef4444, #dc2626)",
                            },
                        }).showToast();
                    });
                });
            },

            onError: function(err) {
                Toastify({
                    text: "Payment failed. Please try again.",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "linear-gradient(to right, #ef4444, #dc2626)",
                    },
                }).showToast();
                console.error('PayPal Error:', err);
            }
        }).render('#paypal-button-container');
    }
});
</script>