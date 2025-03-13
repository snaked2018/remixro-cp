<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php $menus = array() ?>
<?php if (!empty($pageMenuItems)): ?>
    <div class="p-4 mb-6 mx-auto max-w-2xl text-center">
        <h3 class="text-gray-400 text-sm mb-3">
            <?php echo empty($title) ? 'Actions for this page' : htmlspecialchars($title) ?>:
        </h3>
        <div class="flex flex-wrap justify-center gap-2">
            <?php foreach ($pageMenuItems as $menuItemName => $menuItemLink): ?>
                <?php $menus[] = sprintf(
                    '<a href="%s" class="inline-flex items-center px-3 py-1.5 text-sm text-gray-300 hover:text-white bg-gray-800 hover:bg-gray-700 rounded-md transition-colors duration-150 ease-in-out border border-gray-700">%s</a>',
                    $menuItemLink,
                    htmlspecialchars($menuItemName)
                ) ?>
            <?php endforeach ?>
            <?php echo implode("\n            ", $menus) ?>
        </div>
    </div>
<?php endif ?>