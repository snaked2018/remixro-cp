<?php if (!defined('FLUX_ROOT'))
    exit; ?>

<div class="bg-black min-h-screen">
    <div class="relative overflow-hidden">
        <!-- Content Container -->
        <div class="relative pt-6 pb-16 sm:pb-24">
            <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6 lg:px-8">
                <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                    <!-- Left Content -->
                    <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                        <!-- Coming Soon Badge -->
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-900/50 mb-6" >
                            <svg class="mr-1.5 h-2 w-2" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            Release: April 30, 2025
                        </div>

                        <!-- Main Heading -->
                        <h1
                            class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                            <span class="block" style="color: var(--geist-primary);">RMT Marketplace</span>
                            <span class="block mt-1" style="color: var(--geist-primary);">Coming Soon</span>
                        </h1>

                        <!-- Description -->
                        <p class="mt-3 text-base text-gray-400 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                            Earn while you play! Our RMT Marketplace allows you to buy, sell, and trade equipment using
                            RMT Tokens, which can be converted into real cash. Connect with other players in a secure
                            and trusted environment.
                        </p>

                        <!-- Feature List -->
                        <div class="mt-8 space-y-4">
                            <!-- RMT Token Feature -->
                            <div
                                class="flex items-start text-gray-400 bg-gray-900/50 p-4 rounded-lg border border-green-900/50">
                                <svg class="h-6 w-6 mr-2 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <span class="font-medium block mb-1">RMT Token Trading</span>
                                    Convert your earnings into real PHP cash instantly
                                </div>
                            </div>

                            <!-- Existing Features with updated styling -->
                            <div class="flex items-center text-gray-400 bg-gray-900/50 p-4 rounded-lg">
                                <svg class="h-6 w-6 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <div>
                                    <span class="font-medium text-white">Donators(Buyers) will directly purchase your
                                        selling items</span>
                                </div>
                            </div>

                            <div class="flex items-center text-gray-400 bg-gray-900/50 p-4 rounded-lg">
                                <svg class="h-6 w-6 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <div>
                                    <span class="font-medium text-white">Real-time Item Search</span>
                                </div>
                            </div>

                            <div class="flex items-center text-gray-400 bg-gray-900/50 p-4 rounded-lg">
                                <svg class="h-6 w-6 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <div>
                                    <span class="font-medium text-white">Secured Token Conversion</span>
                                </div>
                            </div>

                            <!-- Exchange Rate Info -->
                            <div class="mt-6 text-sm text-gray-500 bg-gray-900/30 p-3 rounded-lg">
                                <div class="flex items-center mb-2">
                                    <svg class="h-4 w-4 text-yellow-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Current Exchange Rate
                                </div>
                                <div class="flex items-center justify-center space-x-2" style="color: var(--geist-primary);">
                                    <span>1 RMT Token</span>
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                    <span>1.00 PHP</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Image -->
                    <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6">
                        <div class="relative w-full h-96 lg:h-[32rem] rounded-lg">
                            <!-- Background Image with Overlay -->
                            <div 
                                class="absolute inset-0 bg-cover bg-center bg-no-repeat image-setting-mobile"
                                style="background-image: url('<?php echo $this->themePath('img/mockup.png') ?>');">

                            </div>
                        </div>
                    </div>

            </main>
        </div>
    </div>
</div>