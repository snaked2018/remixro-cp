<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php if (isset($metaRefresh)): ?>
        <meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
        <?php endif ?>
        <title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
        <link rel="icon" type="image/x-icon" href="./favicon.ico" />
        <!-- Release Mode -->
        <!-- <link rel="stylesheet" href="<?php echo $this->themePath('css/remix.css') ?>" type="text/css" media="screen" title="" charset="utf-8" /> -->
         <!-- Development Mode -->
        <link rel="stylesheet" href="<?php echo $this->themePath('css/remix.css') ?>?v=<?php echo time(); ?>" type="text/css" media="screen" title="" charset="utf-8" />
        <?php if (Flux::config('EnableReCaptcha')): ?>
            <script src='https://www.google.com/recaptcha/api.js'></script>
        <?php endif ?>
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Poppins Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- Axios for AJAX requests -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
    </head>
    <body>

    <?php include $this->themePath('main/navbar.php', true) ?>
        <div style="margin-top: 80px;">
            <?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
                <p class="notice text-red-500">Please change your <strong>ServerAddress</strong> directive in your application config to your server's real address (e.g., myserver.com).</p>
            <?php endif ?>

            <!-- Messages -->
            <?php if ($message=$session->getMessage()): ?>
                <p><?php echo htmlspecialchars($message) ?></p>
            <?php endif ?>

            <!-- Sub menu -->
            <?php include $this->themePath('main/submenu.php', true) ?>

            <!-- Page menu -->
            <?php include $this->themePath('main/pagemenu.php', true) ?>

            <!-- Credit balance -->
            <?php //if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>
