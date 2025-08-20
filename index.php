<?php
    $pageId = "home";
    $pageTitle = "Code. Create. Connect.";

    $pageMeta = [
        'description' => "Welcome to the official portfolio of Darshit Limbad. Discover projects in game development (Unreal Engine) and full-stack web development. Let's connect and create something amazing.",
        'keywords' => "Darshit Limbad, portfolio, game developer, web developer, Unreal Engine, PHP, JavaScript, CSS3, projects, skills, contact",
        'ogType' => 'website', // For the main site page
    ];

    $content = <<<HTML
    <div class="container container--fluid container--home-layout">
        <div class="intro card">
            <h1 class="intro__nav-item" data-cursor-alias data-newtext="I'm a..." data-url="./about.php">Hello!</h1>
            <h1 class="intro__nav-item" data-cursor-alias data-newtext="My Projects" data-url="./experience.php">Experience</h1>
            <h1 class="intro__nav-item" data-cursor-alias data-newtext="Media" data-url="./social.php">Social</h1>
            <h1 class="intro__nav-item" data-cursor-alias data-newtext="Check Out" data-url="./technologies.php">My Tech-Stack</h1>
            <h1 class="intro__nav-item" data-cursor-alias data-newtext="Let's Connect" data-url="./contact.php">Get in Touch</h1>
        </div>

        <footer class="home-footer">
            <h1 id="whoami" class="home-footer__title">Who am I?</h1>
        </footer>
    </div>

    <div id="easter-egg" class="easter-egg">
        <a rel="noopener" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="easter-egg__link" data-cursor-alias>
            Congratulations!!! You found an Easter Egg!!! <strong>Click me</strong>
        </a>
    </div>
HTML;

    require_once __DIR__ . '/src/layouts/BaseLayout.php';
?>