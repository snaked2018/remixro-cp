<?php if (!defined('FLUX_ROOT')) exit; ?>
<!-- Features Section -->
<div class="pt-24">
    <div class="mx-auto grid grid-cols-1 items-start gap-x-8 gap-y-16 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <!-- Left Side: Quick Introduction -->
        <div class="mx-auto max-w-7xl h-full flex justify-center items-center flex-col gap-y-8 text-center lg:col-span-3">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-5xl">
                    Our Mission
                </h2>
                <p class="mt-4 text-lg text-lg/8">
                Our mission is to build a thriving economy where each player has their own value, foster a passionate community, and create an innovative gaming experience that goes beyond traditional private servers. Whether you're here for epic battles, rare loot hunts, or financial opportunities, RemixRO is where your time and effort truly pay off.
                </p>
            </div>
        </div>

        <!-- Right Side: Feature Cards -->
        <!-- First 3 cards container -->
        <div class="lg:col-span-9">
            <!-- Visible cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                    <!-- Hot Badge -->
                    <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                        </svg>
                        Hot
                    </div>
                    
                    <!-- Existing Image and Content -->
                    <img src="<?php echo $this->themePath('img/rates.gif') ?>" 
                         alt="Server Features" 
                         class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                    <div class="p-4">
                        <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">Server Rates</h3>
                        <ul class="mt-2 space-y-1 text-sm text-gray-400">
                            <p>Our server is a high-rate Ragnarok Online experience with Base-Job Level 255/120, 250x/250x/xModified rates, and drop rates of Normal 1% | MVP 0.01%. It features 255 all stats, a max ASPD of 192, a Pre-Renewal system, and of course, we are a PK-enabled server.</p>
                        </ul>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                    <!-- Hot Badge -->
                    <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                        </svg>
                        Hot
                    </div>
                    
                    <!-- Existing Image and Content -->
                    <img src="<?php echo $this->themePath('img/rmt.png') ?>" 
                         alt="Server Features" 
                         class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                    <div class="p-4">
                        <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">RMT Marketplace</h3>
                        <ul class="mt-2 space-y-1 text-sm text-gray-400">
                            <p>The RMT Marketplace allows secure player-to-player trading, enabling users to buy and sell in-game items safely. Enjoy a fair and regulated system for real-money transactions within the game!</p>
                        </ul>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                    <!-- Hot Badge -->
                    <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                        </svg>
                        Hot
                    </div>
                    
                    <!-- Existing Image and Content -->
                    <img src="<?php echo $this->themePath('img/dx9.png') ?>" 
                         alt="Server Protection" 
                         class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                    <div class="p-4">
                        <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">Superior Game Experience</h3>
                        <ul class="mt-2 space-y-1 text-sm text-gray-400">
                            <p>Our server offers a smooth and enhanced gaming experience with a lag-free DX9 client, Android-compatible mobile APK, and an exclusive Premium VIP System for extra rewards and benefits!</p>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Hidden cards -->
            <div id="moreCards" class="hidden transition-all duration-500 ease-in-out">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mt-6">
                    <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                        <!-- Hot Badge -->
                        <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            Hot
                        </div>
                        
                        <!-- Existing Image and Content -->
                        <img src="<?php echo $this->themePath('img/autoattack.gif') ?>" 
                             alt="Server Systems" 
                             class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">OWN Version of @autoattack, @automine & Stamina System</h3>
                            <ul class="mt-2 space-y-1 text-sm text-gray-400">
                                <p>Our server features a Daily Stamina System for balanced gameplay and an Autoattack System for convenience, allowing you to complete day-to-day tasks without constantly monitoring your character..</p>
                            </ul>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                        <!-- Hot Badge -->
                        <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            Hot
                        </div>
                        
                        <!-- Existing Image and Content -->
                        <img src="<?php echo $this->themePath('img/mining.gif') ?>" 
                             alt="Server Systems" 
                             class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">Custom Mining</h3>
                            <ul class="mt-2 space-y-1 text-sm text-gray-400">
                                <p>Our Custom Mining system lets players mine for Mithril Coins, which can be sold in the global market. There's also a chance to obtain Elunium and Oridecon for upgrading gear. Dig your way to riches!</p>
                            </ul>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                        <!-- Hot Badge -->
                        <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            Hot
                        </div>
                        
                        <!-- Existing Image and Content -->
                        <img src="<?php echo $this->themePath('img/agit.gif') ?>" 
                             alt="Server Systems" 
                             class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">New! Agit Lord System</h3>
                            <ul class="mt-2 space-y-1 text-sm text-gray-400">
                                <p>The Agit Lord event offers a cash prize and features a new WOE, WOE: SE, and KOE system with the longest defense mechanism. Battle for supremacy and claim your rewards!</p>
                            </ul>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                        <!-- Hot Badge -->
                        <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            Hot
                        </div>
                        
                        <!-- Existing Image and Content -->
                        <img src="<?php echo $this->themePath('img/equal.png') ?>" 
                             alt="Server Systems" 
                             class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">Equal Opportunity Server</h3>
                            <ul class="mt-2 space-y-1 text-sm text-gray-400">
                                <p>Our server ensures fair gameplay by not selling permanent items that could create an imbalance between players and donators. Everyone competes on equal ground, making skill and effort the keys to success!</p>
                            </ul>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                        <!-- Hot Badge -->
                        <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            Hot
                        </div>
                        
                        <!-- Existing Image and Content -->
                        <img src="<?php echo $this->themePath('img/customskill.gif') ?>" 
                             alt="Server Systems" 
                             class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">Custom Skills Implementation</h3>
                            <ul class="mt-2 space-y-1 text-sm text-gray-400">
                                <p>Our server features unique set of powerful abilities to enhance gameplay. Master exclusive skills like Berserk, Fortified Heal, Summon Lighthalzen, Fire Ivy, Earthquake, Cart Tornado, Landmine, Hallucination Walk, Unshattered Domain, Izanagi, Bio Cannibalize, and Gatling Fever. Adapt your strategy and dominate the battlefield with these exciting new abilities!</p>
                            </ul>
                        </div>
                    </div>
                    <div class="group relative overflow-hidden rounded-lg" style="border: 1px solid var(--geist-primary)">
                        <!-- Hot Badge -->
                        <div class="absolute top-2 right-2 z-1 flex items-center gap-1 rounded-full bg-red-500 px-2 py-1 text-xs font-semibold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            Hot
                        </div>
                        
                        <!-- Existing Image and Content -->
                        <img src="<?php echo $this->themePath('img/storyline.png') ?>" 
                             alt="Server Systems" 
                             class="h-64 w-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                        <div class="p-4">
                            <h3 style="color: var(--geist-primary);" class="text-lg font-semibold text-white">Immersive Storyline Quest</h3>
                            <ul class="mt-2 space-y-1 text-sm text-gray-400">
                                <p>Our server features an Immersive Storyline Quest, providing a step-by-step guide to help players reach max level while familiarizing them with key NPCs. This system serves as a perfect newbie-friendly introduction to the game!</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More/Less Button -->
            <div class="flex justify-center mt-8">
                <button 
                    onclick="toggleCards()" 
                    id="viewMoreBtn"
                    class="branding-green-button flex items-center gap-2 group transition-all duration-300"
                >
                    <span>View More</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 transition-transform duration-300 group-data-[state=expanded]:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $this->themePath('js/togglecards.js') ?>"></script>