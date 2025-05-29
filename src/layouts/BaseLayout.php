<?php
    // --- Defaults for Meta Tags (Site-wide) ---
    $siteName = "Darshit Limbad's Portfolio";
    $defaultDescription = "Portfolio of Darshit Limbad, showcasing game and web development projects and skills.";
    $defaultKeywords = "portfolio, web developer, game developer, php, javascript, unreal engine";
    $defaultOgType = 'website';
    $themeColor = 'rgba(10, 10, 20, 0.5)';

    // --- Page-Specific Meta Tags ---
    // Title is already handled by $pageTitle
    $description = htmlspecialchars($pageMeta['description'] ?? $defaultDescription, ENT_QUOTES, 'UTF-8');
    $keywords = htmlspecialchars($pageMeta['keywords'] ?? $defaultKeywords, ENT_QUOTES, 'UTF-8');

    $ogType = $pageMeta['ogType'] ?? $defaultOgType;
    $ogTitle = htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); // Use $pageTitle for og:title
    $ogDescription = $description; // Already sanitized

    // Construct Canonical URL and Open Graph URL
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'];
    $currentUrl = $protocol . $domainName . $_SERVER['REQUEST_URI'];
    $canonicalUrl = $currentUrl;
    $ogUrl = $canonicalUrl;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle ?? 'My Portfolio', ENT_QUOTES, 'UTF-8'); ?></title>
    
    <meta name="description" content="<?= $description; ?>">
    <meta name="keywords" content="<?= $keywords; ?>">
    <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?= $ogTitle; ?>">
    <meta property="og:description" content="<?= $ogDescription; ?>">
    <meta property="og:type" content="<?= htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?= htmlspecialchars($ogUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?= htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="en_IN">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:title" content="<?= $ogTitle; ?>">
    <meta name="twitter:description" content="<?= $ogDescription; ?>">

    <link rel="stylesheet" href="/public/css/main.css">
    <script src="/public/js/App.js" type="module" defer></script>
</head>
<body id="<?= htmlspecialchars($pageId ?? 'default-page', ENT_QUOTES, 'UTF-8'); ?>" data-cursor-default>
    
    <div class="site-wrapper">
        <?php
            // Navbar will be included here
            if (file_exists(__DIR__ . '/../components/Navbar.php')) {
                require_once __DIR__ . '/../components/Navbar.php';
                if (class_exists('Navbar')) {
                    $navbar = new Navbar();
                    echo $navbar->render();
                }
            }
        ?>

        <main class="main-content">
            <?= $content ?? ''; ?>
        </main>
        
        <div class="site-footer">
            <?php
                // // Footer component can be included here
                // if (file_exists(__DIR__ . '/../components/Footer.php')) {
                //     require_once __DIR__ . '/../components/Footer.php';
                //     if (class_exists('Footer')) {
                //         $footerComponent = new Footer();
                //         echo $footerComponent->render();
                //     }
                // }
            ?>
        </div>
    </div>

</body>
</html>