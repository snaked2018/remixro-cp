<?php if (!defined('FLUX_ROOT')) exit; ?>

<nav class="p-4 fixed w-full z-10 top-0 border-b" style="background-color: var(--geist-background);">
    <div class="flex justify-between items-center">
        <div class="flex flex-row-reverse lg:flex-row w-full justify-between lg:justify-start space-x-4">
            <div class="flex items-center lg:hidden lg:mr-16" style="border: 1px solid #00ff00; padding: 10px; border-radius: 10px;">
                <button type="button" class="text-gray-400 hover:text-white focus:outline-none focus:text-white" aria-label="Toggle navigation" onclick="document.getElementById('mobile-navbar').classList.toggle('hidden')">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <span class="ml-2 text-gray-400 hover:text-white cursor-pointer" onclick="document.getElementById('mobile-navbar').classList.toggle('hidden')">Menu</span>
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
                    <a href="/download" class="hover:text-white text-sm" style="color: var(--geist-foreground);">Download</a>
                </li>
                <li>
                    <a href="/discord" class="hover:text-white text-sm" style="color: var(--geist-foreground);">Discord</a>
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
                        <a href="#" class="branding-green-button flex items-center">
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
                <a href="/download" class="block px-4 py-2 text-sm" style="color: var(--geist-foreground);">Download</a>
            </li>
            <li>
                <a href="/discord" class="block px-4 py-2 text-sm" style="color: var(--geist-foreground);">Discord</a>
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