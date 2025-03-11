<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php $subMenuItems = $this->getSubMenuItems(); $menus = array() ?>
<?php if (!empty($subMenuItems)): ?>
    <div class="w-full bg-gray-800/50 border-y border-indigo-500/20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4">
            <nav class="flex items-center justify-center space-x-6">
                <?php foreach ($subMenuItems as $menuItem): ?>
                    <a href="<?php echo $this->url($menuItem['module'], $menuItem['action']) ?>" 
                       class="text-sm font-medium transition-colors <?php echo $params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action'] 
                            ? 'text-indigo-400 hover:text-indigo-300' 
                            : 'text-gray-400 hover:text-white' ?>">
                        <?php echo htmlspecialchars($menuItem['name']) ?>
                    </a>
                <?php endforeach ?>
            </nav>
        </div>
    </div>
<?php endif ?>