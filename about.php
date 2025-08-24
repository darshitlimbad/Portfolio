<?php
    $pageId = "about";
    $pageTitle = "About Me - Darshit Limbad";
    
     $pageMeta = [
        'description' => "Learn more about Darshit Limbad, his journey into game and web development, and his passion for Game and Web Development.",
        'keywords' => "about darshit limbad, developer profile, game develper profile, unreal engine profile, tech skills, background",
        'ogType' => 'profile',
    ];

    $aboutCardsHtml = '';

    $aboutJsonPath = __DIR__ . '/src/data/about.json';
    echo "<!-- JSON Path: {$aboutJsonPath} -->"; // Debugging line

    // Check if the JSON file exists
    if (file_exists($aboutJsonPath)) {
        $aboutDataJson = file_get_contents($aboutJsonPath);
        $aboutItems = json_decode($aboutDataJson, true);

        if (is_array($aboutItems)) {
            foreach ($aboutItems as $item) {
                $id = htmlspecialchars($item['id'] ?? uniqid('acard-'), ENT_QUOTES, 'UTF-8');
                $imageSrc = htmlspecialchars($item['imageSrc'] ?? '' , ENT_QUOTES, 'UTF-8');
                $altText = htmlspecialchars($item['altText'] ?? 'Information card image', ENT_QUOTES, 'UTF-8');
                $topic = htmlspecialchars($item['topic'] ?? 'Card Topic', ENT_QUOTES, 'UTF-8');
                $title = htmlspecialchars($item['title'] ?? 'Card Title', ENT_QUOTES, 'UTF-8');
                $text = nl2br(htmlspecialchars($item['text'] ?? 'Card description.', ENT_QUOTES, 'UTF-8'));
                $imagePositionClass = ($item['imagePosition'] ?? 'left') === 'right' ? 'acard--img-right' : 'acard--img-left';
                $glassEffect = htmlspecialchars($item['glassEffect'] ?? 'glass--dark', ENT_QUOTES, 'UTF-8'); // e.g., "glass--dark"

                if(!empty($imageSrc)) {
                    $imageHtml = <<<HTML
                        <div class="acard__img-wrap img-overlay">
                            <img src="{$imageSrc}" alt="{$altText}" class="acard__img" />
                        </div>
                        HTML;
                }
                else {
                    $imageHtml = '';
                    $imagePositionClass = 'acard--no-image'; // No image, adjust class accordingly
                }
                
                $contentHtml = <<<HTML
                  <div class="acard__content">
                      <span class="acard__topic">{$topic}</span>
                      <h3 class="acard__title">{$title}</h3>
                      <p class="acard__text">{$text}</p>
                  </div>
                HTML;
                
                $aboutCardsHtml .= "<article id=\"{$id}\" class=\"card acard {$imagePositionClass} glass {$glassEffect}\">";
                if (($item['imagePosition'] ?? 'left') === 'left') {
                    $aboutCardsHtml .= $imageHtml . $contentHtml;
                } else {
                    $aboutCardsHtml .= $contentHtml . $imageHtml;
                }
                $aboutCardsHtml .= "</article>";
            }
        }
    } else {
        $aboutCardsHtml = "<p style=\"color: var(--clr-text-muted); text-align: center;\">About information is currently unavailable.</p>";
    }

    $content = <<<HTML
    <section class="page-content page-content--about container">
        <header class="pg-header">
            <h2 class="pg-header__title">About Me</h2>
            <p class="pg-header__desc">A little insight into who I am and what drives me.</p>
        </header>

        <div class="acard-container">
            {$aboutCardsHtml}
        </div>
    </section>

    <div class="glow-bubble gb-top-right"></div>
    <div class="glow-bubble gb-bottom-left"></div>
HTML;

    require_once __DIR__ . '/src/layouts/BaseLayout.php';
?>