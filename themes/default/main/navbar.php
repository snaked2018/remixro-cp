<?php if (!defined('FLUX_ROOT')) exit; ?>

<nav class="p-2 fixed w-full z-10 top-0 border-b" style="background-color: var(--geist-background);">
    <div class="flex justify-between items-center">
        <div class="flex flex-row-reverse text-center align-center lg:flex-row w-full justify-between lg:justify-start space-x-4">
            <div class="flex items-center lg:hidden lg:mr-16" style="border: 1px solid #00ff00; padding: 4px 10px; border-radius: 4px;">
                <button type="button" class="hover:text-white focus:outline-none focus:text-white" aria-label="Toggle navigation" onclick="document.getElementById('mobile-navbar').classList.toggle('hidden')">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <span class="ml-2 hover:text-white cursor-pointer" onclick="document.getElementById('mobile-navbar').classList.toggle('hidden')">Menu</span>
            </div>
            <a class="text-2xl md:text-3xl font-bold" href="./" style="margin-right: 16px; color: var(--geist-foreground) !important;" id="typewriter"></a>
            <ul class="hidden lg:flex md:items-center md:space-x-4" id="desktop-navbar">
                <?php $menuItems = $this->getMenuItems(); ?>
                <?php if (!empty($menuItems)): ?>
                    <?php foreach ($menuItems as $menuCategory => $menus): ?>
                        <?php if (!empty($menus)): ?>
                            <li class="relative group">
                                <a href="#" class="hover:text-white text-sm flex-nowrap flex items-center" style="color: var(--geist-foreground);">
                                    <?php echo htmlspecialchars(Flux::message($menuCategory)) ?>
                                    <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </a>
                                <ul class="absolute left-0 mt-2 w-48 rounded-md shadow-lg hidden group-hover:block" style="border: .1px solid var(--accents-5); background-color: var(--geist-background);">
                                    <?php foreach ($menus as $menuItem): ?>
                                        <li class="relative group">
                                            <a href="<?php echo $menuItem['url'] ?>" class="text-sm block px-4 py-2 hover:bg-gray-700 w-full" style="color: var(--geist-foreground);">
                                                <?php echo htmlspecialchars(Flux::message($menuItem['name'])) ?>
                                                <?php if (!empty($menuItem['submenus'])): ?>
                                                    <svg class="h-4 w-4 ml-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                <?php endif ?>
                                            </a>
                                            <?php if (!empty($menuItem['submenus'])): ?>
                                                <ul class="absolute left-full top-0 mt-2 w-48 rounded-md shadow-lg hidden group-hover:block" style="background-color: var(--geist-background);">
                                                    <?php foreach ($menuItem['submenus'] as $submenuItem): ?>
                                                        <li>
                                                            <a href="<?php echo $submenuItem['url'] ?>" class="text-sm block px-4 py-2 hover:bg-gray-700 w-full" style="color: var (--geist-foreground);"><?php echo htmlspecialchars(Flux::message($submenuItem['name'])) ?></a>
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            <?php endif ?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endif ?>
                <!-- New Menu Items -->
                <li>
                    <a href="?module=rmx&action=download" class="hover:text-white text-sm cursor-pointer" style="color: var(--geist-foreground);">
                        <span class="flex items-center gap-x-1">
                            Download
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="https://discord.com/invite/8zQGqWdVgV" class="hover:text-white text-sm" style="color: var(--geist-foreground);">Discord</a>
                </li>
                <li>
                    <a href="/wiki" class="hover:text-white text-sm" style="color: var(--geist-foreground);">Wiki</a>
                </li>
            </ul>
        </div>
        <div class="hidden lg:flex md:items-center md:space-x-4">
            <ul class="flex flex-col md:flex-row md:space-x-4">
                <?php $loginItems = $this->getLoginItems(); ?>
                <?php if (!empty($loginItems)): ?>
                    <li class="relative group">
                        <a href="#" class="branding-green-button flex items-center flex flex-row gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                            <?php echo htmlspecialchars($session->account->userid ?? 'Account') ?>
                            <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <ul class="absolute right-0 mt-2 w-48 rounded-md shadow-lg hidden group-hover:block" style="border: .1px solid var(--accents-5); background-color: var(--geist-background);">
                            <?php foreach ($loginItems as $loginItem): ?>
                                <li>
                                    <a href="<?php echo $loginItem['url'] ?>" class="text-sm block px-4 py-2 hover:bg-gray-700 w-full" style="color: var(--geist-foreground);">
                                        <?php echo htmlspecialchars(Flux::message($loginItem['name'])) ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <div class="lg:hidden hidden" id="mobile-navbar">
        <ul class="flex flex-col space-y-2 mt-4">
            <!-- New Menu Items for Mobile -->
            <li>
                <button onclick="openDownloadModal()" class="block px-4 py-2 text-sm w-full text-left flex items-center gap-x-2" style="color: var(--geist-foreground);">
                    <span>Download</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </button>
            </li>
            <li>
                <a href="#discord-section" onclick="event.preventDefault(); document.querySelector('#discord-section').scrollIntoView({behavior: 'smooth'}); document.getElementById('mobile-navbar').classList.add('hidden')" class="block px-4 py-2 text-sm" style="color: var(--geist-foreground);">Discord</a>
            </li>
            <li>
                <a href="/wiki" class="block px-4 py-2 text-sm" style="color: var(--geist-foreground);">Wiki</a>
            </li>
            <?php $menuItems = $this->getMenuItems(); ?>
            <?php if (!empty($menuItems)): ?>
                <?php foreach ($menuItems as $menuCategory => $menus): ?>
                    <?php if (!empty($menus)): ?>
                        <li class="relative group">
                            <a href="#" class="block px-4 py-2 text-sm" style="color: var(--geist-foreground);">
                                <?php echo htmlspecialchars(Flux::message($menuCategory)) ?>
                                <svg class="h-4 w-4 ml-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <ul class="hidden group-hover:block pl-4" style="background-color: var(--geist-background);">
                                <?php foreach ($menus as $menuItem): ?>
                                    <li>
                                        <a href="<?php echo $menuItem['url'] ?>" class="text-sm block px-4 py-2 hover:bg-gray-700 w-full" style="color: var(--geist-foreground);"><?php echo htmlspecialchars(Flux::message($menuItem['name'])) ?></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>
            <?php $loginItems = $this->getLoginItems(); ?>
            <?php if (!empty($loginItems)): ?>
                <li class="relative group">
                    <a href="#" class="branding-green-button block px-4 py-2 text-sm" style="color: var(--geist-foreground);">
                        <?php echo htmlspecialchars($session->account->userid ?? 'Account') ?>
                        <svg class="h-4 w-4 ml-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    <ul class="hidden group-hover:block pl-4" style="background-color: var(--geist-background);">
                        <?php foreach ($loginItems as $loginItem): ?>
                            <li>
                                <a href="<?php echo $loginItem['url'] ?>" class="block text-sm px-4 py-2 hover:bg-gray-700 w-full" style="color: var(--geist-foreground);">
                                    <?php echo htmlspecialchars(Flux::message($loginItem['name'])) ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>

<script src="<?php echo $this->themePath('js/effects.js') ?>"></script>