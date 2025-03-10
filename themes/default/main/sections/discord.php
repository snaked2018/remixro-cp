<?php if (!defined('FLUX_ROOT')) exit; ?>
<!-- Discord Section -->
<div id="discord-section" class="pt-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 mb-8">
            <h2 class="text-3xl font-semibold tracking-tight text-white sm:text-5xl">
                Join Our Community
            </h2>
            <p class="text-lg text-gray-400">
                Connect with players, get support, and stay updated with the latest news and events.
            </p>
        </div>
        
        <div class="rounded-lg overflow-hidden" style="border: 1px solid var(--geist-primary)">
            <!-- Loading State -->
            <div class="loading-container bg-gray-900 h-[500px] flex items-center justify-center">
                <div class="animate-pulse text-gray-400">Loading Discord...</div>
            </div>
            
            <iframe 
                src="https://discord.com/widget?id=1324595990791192697&theme=dark" 
                width="100%" 
                height="500" 
                allowtransparency="true" 
                frameborder="0" 
                class="hidden"
                onload="this.classList.remove('hidden'); this.previousElementSibling.remove()"
                sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts">
            </iframe>
        </div>
    </div>
</div>