<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="mx-auto max-w-7xl px-4 md:px-0">
    <div class="relative isolate overflow-hidden pt-[22rem] md:pt-16 shadow-2xl sm:rounded-3xl sm:px-10 md:pt-24 lg:flex lg:gap-x-20 lg:pt-0 flex-col-reverse flex lg:flex-row">
        <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-column lg:pt-32 lg:text-left z-2">
            <h2 class="text-3xl font-semibold tracking-tight text-balance text-white sm:text-5xl">
                <?php echo htmlspecialchars(Flux::message('WelcomeTitleLabel')) ?>
                <span style="color: var(--geist-primary);">
                    <?php echo htmlspecialchars(Flux::message('WelcomeTitleGradient')) ?>
                </span>
            </h2>
            <p class="mt-6 text-lg/8 text-lg text-pretty">
                <?php echo htmlspecialchars(Flux::message('WelcomeSubLabel')) ?>
                <?php echo htmlspecialchars(Flux::message('WelcomeSubGradient')) ?>
            </p>
            <div class="my-5 sm:my-10 flex items-center justify-center gap-x-6 lg:justify-start">
                <a href="?module=rmx&action=download" class="branding-green-button flex items-center gap-x-2">
                    <span>Download now</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </a>
                <a href="?module=marketplace" class="text-sm/6 font-semibold text-white">
                    Visit Marketplace <span aria-hidden="true">→</span>
                </a>
            </div>
			<div class="relative group flex">
            <div
                class="relative w-full px-7 py-2 bg-black rounded-lg leading-none flex items-top justify-between space-x-6 mb-5 justify-center" style="border: 1px solid var(--geist-primary);">
                <div class="flex flex-row items-center text-center gap-5">
                    <div class="flex flex-row items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                        </svg>
                        <p class="text-slate-800">Server: <span style="color: <?php echo isset($gameServer['mapServerUp']) && $gameServer['mapServerUp'] ? 'var(--geist-primary)' : 'var(--geist-error-dark)' ?>;">
                            <?php echo isset($gameServer['mapServerUp']) ? ($gameServer['mapServerUp'] ? 'Online' : 'Offline') : 'Unknown' ?>
                        </span></p>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <p class="text-slate-800">Players: <span style="color: var(--geist-primary);">
                            <?php echo isset($gameServer['playersOnline']) ? number_format($gameServer['playersOnline']) : '0' ?>
                        </span></p>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-slate-800">Peak: <span style="color: var(--geist-primary);">
                            <?php echo isset($gameServer['playersPeak']) ? number_format($gameServer['playersPeak']) : '0' ?>
                        </span></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="relative my-auto flex items-center justify-center">
            <div>
                <img 
                    src="<?php echo $this->themePath('img/logo1.png') ?>"
                    style="mask-image: linear-gradient(to bottom, black 50%, transparent 100%);"
                    class="relative w-[500px] xs:w-[3rem] md:w-[10rem] lg:w-[5rem] top-[-355px] md:top-0 left-[16%] md:left-0 z-0 engrave-image-img"
                    alt="RemixRO Logo"
                >
            </div>
        </div>
    </div>
</div>