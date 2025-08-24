<?php
    $pageId = "projects";
    $pageTitle = "My Projects - Darshit Limbad";

    $pageMeta = [
        'description' => "Explore a collection of Darshit Limbad's projects, showcasing skills in game development with Unreal Engine, Python scripting, full-stack web development, and more.",
        'keywords' => "Darshit Limbad projects, game development portfolio, web development examples, Unreal Engine projects, Python scripts, C++, PHP",
        'ogType' => 'website',
    ];

    $projectsHtml = '';
    $projectsJsonPath = __DIR__ . '/src/data/projects.json'; // Path to JSON in src

    if (file_exists($projectsJsonPath)) {
        $projectsDataJson = file_get_contents($projectsJsonPath);
        $projectsArray = json_decode($projectsDataJson, true);

        if (is_array($projectsArray)) {
            foreach ($projectsArray as $project) {
                // Sanitize data before outputting
                $projectId = htmlspecialchars($project['id'] ?? uniqid('proj-'), ENT_QUOTES, 'UTF-8');
                $repoUrl = htmlspecialchars($project['repoUrl'] ?? '#', ENT_QUOTES, 'UTF-8');
                $imageSrc = htmlspecialchars($project['imageSrc'] ?? '/public/media/placeholder.png', ENT_QUOTES, 'UTF-8');
                $altText = htmlspecialchars($project['altText'] ?? 'Project image', ENT_QUOTES, 'UTF-8');
                $title = $project['title'] ?? 'Project Title'; // Skip Sanitization
                $description = nl2br(htmlspecialchars($project['description'] ?? 'Project description.', ENT_QUOTES, 'UTF-8'));
                $glassEffect = htmlspecialchars($project['glassEffect'] ?? 'glass--dark', ENT_QUOTES, 'UTF-8');

                $tagsHtml = '';
                if (!empty($project['tags']) && is_array($project['tags'])) {
                    foreach ($project['tags'] as $tag) {
                        $safeTag = htmlspecialchars($tag, ENT_QUOTES, 'UTF-8');
                        // Assuming tags also use glass effect, can be made dynamic from JSON if needed
                        $tagsHtml .= "<span class=\"pcard__tag glass glass--dark\">{$safeTag}</span>"; 
                    }
                }

                $projectsHtml .= <<<HTML
                <a href="{$repoUrl}" target="_blank" rel="noopener" class="pcard-link" data-cursor-alias aria-labelledby="{$projectId}-title">
                    <article id="{$projectId}" class="card pcard glass {$glassEffect}">
                        <div class="pcard__img-wrap">
                            <img src="{$imageSrc}" alt="{$altText}" class="pcard__img">
                        </div>
                        <div class="pcard__content">
                            <h3 id="{$projectId}-title" class="pcard__title">{$title}</h3>
                            <p class="pcard__desc">{$description}</p>
                            <div class="pcard__tags">
                                {$tagsHtml}
                            </div>
                        </div>
                    </article>
                </a>
HTML;
            }
        }
    } else {
        $projectsHtml = "<p style=\"color: var(--clr-text-muted); text-align: center;\">Project information is currently unavailable.</p>";
    }
    
    $content = <<<HTML
    <section class="page-content page-content--projects container">
        <header class="pg-header">
            <h2 class="pg-header__title">My Projects</h2>
            <p class="pg-header__desc">A showcase of my work. Click on a project to view its repository.</p>
        </header>

        <div class="pcard-grid">
            {$projectsHtml}
        </div>
    </section>

    <div class="glow-bubble gb-top-right"></div>
    <div class="glow-bubble gb-bottom-left"></div>
HTML;

    require_once __DIR__ . '/src/layouts/BaseLayout.php';
?>