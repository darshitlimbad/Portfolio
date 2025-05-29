<?php
class Navbar {
    public function render() {
        $html = <<<HTML
        <nav class="nav glass">
            <div class="nav__brand" data-url="/" >Darshit Limbad</div>
            
            <input type="checkbox" id="nav-toggle" class="nav__toggle-checkbox" aria-label="Toggle navigation" />
            <label for="nav-toggle" class="nav__toggle-label" data-cursor-alias>
                <span></span>
                <span></span>
                <span></span>
            </label>

            <ul class="nav__links">
              <li class="nav__item"><a href="/" class="nav__link" data-cursor-alias>Home</a></li>
              <li class="nav__item"><a href="/about.php" class="nav__link" data-cursor-alias>About</a></li>
              <li class="nav__item"><a href="/experience.php" class="nav__link" data-cursor-alias>My Projects</a></li>
              <li class="nav__item"><a href="/social.php" class="nav__link" data-cursor-alias>Social Media</a></li>
              <li class="nav__item"><a href="/technologies.php" class="nav__link" data-cursor-alias>Tech-Stack</a></li>
              <li class="nav__item"><a href="/contact.php" class="nav__link" data-cursor-alias>Let's Connect</a></li>
              
              <!-- <li class="nav__item nav__item--blur-toggle">
                <button id="toggle-blur" class="nav__link btn--text" data-cursor-alias>Blurry</button>
              </li> -->
            </ul>
        </nav>
        HTML;
        return $html;
    }
}
?>