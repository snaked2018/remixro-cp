<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="pt-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <h2 class="text-3xl font-semibold tracking-tight text-white">Trusted PayPal E-mails</h2>
            <span class="mt-2 sm:mt-0 bg-indigo-500/10 text-green-400 text-sm font-medium px-3 py-1 rounded-full border border-indigo-500/20">
                <?php echo $emails ? count($emails) : '0' ?> trusted email(s)
            </span>
        </div>

        <?php if ($emails): ?>
            <div class="mt-6 space-y-4 text-gray-400">
                <p class="leading-relaxed">Below is a list of your trusted PayPal e-mail addresses.</p>
                <div class="bg-indigo-500/10 border border-indigo-500/20 rounded-lg p-4">
                    <p class="text-sm">
                        Trusted e-mails do not undergo any holding process, therefore donations made by them will allow you to receive your credits 
                        <span class="text-white font-medium">instantly</span>.
                    </p>
                </div>
            </div>

            <div class="mt-8 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800/50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                E-mail Address
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Date/Time Established
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800/30 divide-y divide-gray-700">
                        <?php foreach ($emails as $email): ?>
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="text-indigo-400 font-medium"><?php echo htmlspecialchars($email->email) ?></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                <?php echo $this->formatDateTime($email->create_date) ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="mt-6 space-y-6">
                <div class="rounded-lg border border-gray-700 bg-gray-800/30 px-6 py-8">
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-white">No trusted emails</h3>
                        <p class="mt-1 text-sm text-gray-400">You do not have any trusted PayPal e-mail addresses.</p>
                        
                        <?php if (!Flux::config('HoldUntrustedAccount')): ?>
                            <p class="mt-4 text-sm text-gray-400">
                                This is most likely because the credit holding system is currently 
                                <span class="text-white font-medium">not in effect</span>, 
                                which means a donation made from any e-mail address is immediately accredited.
                            </p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>