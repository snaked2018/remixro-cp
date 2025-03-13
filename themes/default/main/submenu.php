<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php $subMenuItems = $this->getSubMenuItems(); $menus = array() ?>
<?php if (!empty($subMenuItems)): ?>
    <!-- Sidebar Toggle Button (Desktop Only) -->
    <button id="sidebarToggle" 
            class="fixed top-20 left-4 z-50 p-2 rounded-lg bg-gray-800 text-white hover:bg-gray-700 focus:outline-none hidden lg:block transition-opacity duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- Desktop Sidebar -->
    <div id="sidebar" 
         class="z-20 fixed top-0 left-0 h-screen w-64 bg-black shadow-xl transform -translate-x-full transition-transform duration-300 ease-in-out hidden lg:block">
        <!-- Logo Area -->
        <div class="p-4">
            <div class="text-white text-xl font-bold">
                <?php echo htmlspecialchars(Flux::config('SiteTitle')) ?>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-5 px-2">
            <div class="space-y-1">
                <?php foreach ($subMenuItems as $menuItem): ?>
                    <a href="<?php echo $this->url($menuItem['module'], $menuItem['action']) ?>" 
                       class="group flex items-center px-4 py-2 text-sm font-medium rounded-md transition-colors <?php 
                            echo $params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action'] 
                                ? 'bg-green-800 text-white' 
                                : 'text-gray-300 hover:bg-gray-800 hover:text-white' ?>">
                        <span class="truncate"><?php echo htmlspecialchars($menuItem['name']) ?></span>
                    </a>
                <?php endforeach ?>
            </div>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <div class="lg:hidden">
        <!-- Mobile Toggle Button -->
        <button id="mobileMenuToggle" 
                class="fixed top-20 right-4 z-50 p-2 rounded-lg bg-gray-800 text-white hover:bg-gray-700 focus:outline-none transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M4 6h16M4 12h16M4 18h16" />
                <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Mobile Menu Content -->
        <div id="mobileMenu" 
             class="z-30 fixed right-0 top-32 w-64 bg-black rounded-l-lg shadow-xl transform translate-x-full transition-transform duration-300 ease-in-out">
            <div class="py-2 space-y-1">
                <?php foreach ($subMenuItems as $menuItem): ?>
                    <a href="<?php echo $this->url($menuItem['module'], $menuItem['action']) ?>" 
                       class="block px-4 py-2 text-sm font-medium transition-colors <?php 
                            echo $params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action'] 
                                ? 'bg-green-800 text-white' 
                                : 'text-gray-300 hover:bg-gray-800 hover:text-white' ?>">
                        <?php echo htmlspecialchars($menuItem['name']) ?>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <!-- Overlay (Desktop Only) -->
    <div id="sidebarOverlay" 
         class="fixed inset-0 z-10 hidden transition-opacity duration-300 ease-in-out">
    </div>

    <!-- SideBar -->
    <script src="<?php echo $this->themePath('js/sidebar.js') ?>"></script>        
<?php endif ?>