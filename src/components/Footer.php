<?php
class Footer {
    public function render() {
        $currentYear = date('Y');
        $siteName = "Darshit Limbad"; 

        // Basic footer with copyright and year.
        // The class 'site-footer-component' can be used for specific styling
        // if it differs from the '.site-footer' wrapper in BaseLayout.php
        $html = <<<HTML
        <div class="site-footer-component glass glass--dark">
            <p class="site-footer__text">© {$currentYear} {$siteName}. All Rights Reserved.</p>
            <p class="site-footer__text">Exploring the world with cup of cofee, one line of code at a time.</p>
        </div>
HTML;
        return $html;
    }
}
?>