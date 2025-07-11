<?php
    $pageId = "contact";
    $pageTitle = "Let's Connect — Darshit Limbad";

    $pageMeta = [
        'description' => "Get in touch with Darshit Limbad. Whether you have a project idea, a question, or just want to connect, use the contact form or find direct contact details.",
        'keywords' => "contact Darshit Limbad, get in touch, message, project inquiry, collaboration",
        'ogType' => 'website',
    ];

    // --- Load Reasons Data ---
    $reasonsBlockHtml = '';
    $reasonsJsonPath = __DIR__ . '/src/data/contact_reasons.json';
    if (file_exists($reasonsJsonPath)) {
        $reasonsDataJson = file_get_contents($reasonsJsonPath);
        $reasonsData = json_decode($reasonsDataJson, true);

        if (is_array($reasonsData) && isset($reasonsData['reasons'])) {
            $reasonsTitle = htmlspecialchars($reasonsData['title'] ?? 'Why Get In Touch?', ENT_QUOTES, 'UTF-8');
            $reasonsIntro = htmlspecialchars($reasonsData['intro'] ?? '', ENT_QUOTES, 'UTF-8');
            $reasonsGlassEffect = htmlspecialchars($reasonsData['glassEffect'] ?? 'glass--accent', ENT_QUOTES, 'UTF-8');
            
            $reasonsListHtml = '<ul class="reasons-block__list">';
            foreach ($reasonsData['reasons'] as $reason) {
                $reasonId = htmlspecialchars($reason['id'] ?? uniqid('reason-'), ENT_QUOTES, 'UTF-8');
                $reasonText = htmlspecialchars($reason['text'] ?? 'A good reason.', ENT_QUOTES, 'UTF-8');
                $reasonsListHtml .= "<li id=\"{$reasonId}\" class=\"reasons-block__item\">{$reasonText}</li>";
            }
            $reasonsListHtml .= '</ul>';

            $reasonsBlockHtml = <<<HTML
            <div class="reasons-block glass {$reasonsGlassEffect} card js-reveal">
                <h3 class="reasons-block__title">{$reasonsTitle}</h3>
                <p class="reasons-block__intro">{$reasonsIntro}</p>
                {$reasonsListHtml}
            </div>
            HTML;
        }
    } else {
        // $reasonsBlockHtml = "<p>Reasons data unavailable.</p>"; // Optional fallback
    }

    // // --- Load Testimonials Data ---
    // $testimonialsBlockHtml = '';
    // $testimonialsJsonPath = __DIR__ . '/src/data/testimonials.json';
    // if (file_exists($testimonialsJsonPath)) {
    //     $testimonialsDataJson = file_get_contents($testimonialsJsonPath);
    //     $testimonialsData = json_decode($testimonialsDataJson, true);

    //     if (is_array($testimonialsData) && isset($testimonialsData['testimonials'])) {
    //         $testimonialsTitle = htmlspecialchars($testimonialsData['title'] ?? 'What Others Say', ENT_QUOTES, 'UTF-8');
    //         $testimonialsGlassEffect = htmlspecialchars($testimonialsData['glassEffect'] ?? 'glass--dark', ENT_QUOTES, 'UTF-8');

    //         $testimonialItemsHtml = '';
    //         foreach ($testimonialsData['testimonials'] as $testimonial) {
    //             $testimonialId = htmlspecialchars($testimonial['id'] ?? uniqid('testimonial-'), ENT_QUOTES, 'UTF-8');
    //             $quote = nl2br(htmlspecialchars($testimonial['quote'] ?? 'An inspiring quote.', ENT_QUOTES, 'UTF-8'));
    //             $cite = htmlspecialchars($testimonial['cite'] ?? 'Anonymous', ENT_QUOTES, 'UTF-8');
    //             // isVisibleInitially is more for JS control; PHP will render all items.
                
    //             $testimonialItemsHtml .= <<<HTML
    //             <article id="{$testimonialId}" class="testimonial-item">
    //                 <blockquote class="testimonial-item__quote">{$quote}</blockquote>
    //                 <cite class="testimonial-item__cite">{$cite}</cite>
    //             </article>
    //             HTML;
    //         }

    //         $testimonialsBlockHtml = <<<HTML
    //         <div class="testimonials-block glass {$testimonialsGlassEffect} card js-testimonial-rotator js-reveal">
    //             <h3 class="testimonials-block__title">{$testimonialsTitle}</h3>
    //             <div class="testimonial-list" aria-live="polite">
    //                 {$testimonialItemsHtml}
    //             </div>
    //         </div>
    //         HTML;
    //     }
    // } else {
    //     // $testimonialsBlockHtml = "<p>Testimonials data unavailable.</p>"; // Optional fallback
    // }


    // --- Main Page Content ---
    $content = <<<HTML
    <section class="page-content page-content--contact container">
        <header class="pg-header">
            <h2 class="pg-header__title">Let's Connect</h2>
            <p class="pg-header__desc">Whether you have a project idea, a question, or just want to connect, I'd love to hear from you.</p>
        </header>

        <div class="contact-layout">
            <!-- <div class="contact-col contact-col--form glass glass--dark">
                <form action="process-contact-form.php" method="post" id="contactForm" class="c-form">
                    <h3 class="c-form__title">Send Me a Message</h3>
                    
                    <div class="c-form__group" data-cursor-pencil>
                        <label for="name" class="c-form__label" data-cursor-pencil>Name:</label>
                        <input type="text" id="name" name="name" required class="c-form__input" data-cursor-pencil>
                    </div>

                    <div class="c-form__group" data-cursor-pencil>
                        <label for="email" class="c-form__label" data-cursor-pencil>Email:</label>
                        <input type="email" id="email" name="email" required class="c-form__input" data-cursor-pencil>
                    </div>

                    <div class="c-form__group" data-cursor-pencil>
                        <label for="message" class="c-form__label" data-cursor-pencil>Message:</label>
                        <textarea id="message" name="message" rows="6" required class="c-form__textarea" data-cursor-pencil></textarea>
                    </div>

                    <div class="c-form__group--hidden honeypot u-sr-only" data-cursor-pencil>
                       <label for="website" class="c-form__label">Leave this field blank</label>
                       <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <button type="submit" class="btn btn--primary c-form__btn" data-cursor-alias>Send Message</button>
                </form>
            </div> -->

            <div class="contact-col contact-col--info">
                <div class="info-block glass glass--dark">
                    <div class="info-block__section">
                        <h3 class="info-block__title">Contact Me Directly</h3>
                        <p class="info-block__detail">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon icon--contact" viewBox="0 0 512 512" xml:space="preserve">
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <path d="M440.917,67.925H71.083C31.827,67.925,0,99.752,0,139.008v233.984c0,39.256,31.827,71.083,71.083,71.083 h369.834c39.255,0,71.083-31.827,71.083-71.083V139.008C512,99.752,480.172,67.925,440.917,67.925z M178.166,321.72l-99.54,84.92 c-7.021,5.992-17.576,5.159-23.567-1.869c-5.992-7.021-5.159-17.576,1.87-23.567l99.54-84.92c7.02-5.992,17.574-5.159,23.566,1.87 C186.027,305.174,185.194,315.729,178.166,321.72z M256,289.436c-13.314-0.033-26.22-4.457-36.31-13.183l0.008,0.008l-0.032-0.024 c0.008,0.008,0.017,0.008,0.024,0.016L66.962,143.694c-6.98-6.058-7.723-16.612-1.674-23.583c6.057-6.98,16.612-7.723,23.582-1.674 l152.771,132.592c3.265,2.906,8.645,5.004,14.359,4.971c5.706,0.017,10.995-2.024,14.44-5.028l0.074-0.065l152.615-132.469 c6.971-6.049,17.526-5.306,23.583,1.674c6.048,6.97,5.306,17.525-1.674,23.583l-152.77,132.599 C282.211,284.929,269.322,289.419,256,289.436z M456.948,404.771c-5.992,7.028-16.547,7.861-23.566,1.869l-99.54-84.92 c-7.028-5.992-7.861-16.546-1.869-23.566c5.991-7.029,16.546-7.861,23.566-1.87l99.54,84.92 C462.107,387.195,462.94,397.75,456.948,404.771z"></path>
                            </svg>
                            <a href="mailto:darshitlimbad555@gmail.com" class="link" data-cursor-alias>darshitlimbad555@gmail.com</a>
                        </p>
                    </div>

                    <div class="info-block__section">
                        <h3 class="info-block__title">Connect Online</h3>
                        <div class="item-grid social-grid--compact">
                             <div class="item-grid__item">
                                <a href="https://github.com/darshitlimbad" target="_blank" rel="noopener" class="item-grid__link" data-cursor-alias aria-describedby="github-contact-preview">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon--grid" viewBox="0,0,256,256">
                                        <g fill-opacity="0" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" fiont-famly="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,256v-256h256v256z" id="bgRectangle"></path></g><g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(8.53333,8.53333)"><path d="M15,3c-6.627,0 -12,5.373 -12,12c0,5.623 3.872,10.328 9.092,11.63c-0.056,-0.162 -0.092,-0.35 -0.092,-0.583v-2.051c-0.487,0 -1.303,0 -1.508,0c-0.821,0 -1.551,-0.353 -1.905,-1.009c-0.393,-0.729 -0.461,-1.844 -1.435,-2.526c-0.289,-0.227 -0.069,-0.486 0.264,-0.451c0.615,0.174 1.125,0.596 1.605,1.222c0.478,0.627 0.703,0.769 1.596,0.769c0.433,0 1.081,-0.025 1.691,-0.121c0.328,-0.833 0.895,-1.6 1.588,-1.962c-3.996,-0.411 -5.903,-2.399 -5.903,-5.098c0,-1.162 0.495,-2.286 1.336,-3.233c-0.276,-0.94 -0.623,-2.857 0.106,-3.587c1.798,0 2.885,1.166 3.146,1.481c0.896,-0.307 1.88,-0.481 2.914,-0.481c1.036,0 2.024,0.174 2.922,0.483c0.258,-0.313 1.346,-1.483 3.148,-1.483c0.732,0.731 0.381,2.656 0.102,3.594c0.836,0.945 1.328,2.066 1.328,3.226c0,2.697 -1.904,4.684 -5.894,5.097c1.098,0.573 1.899,2.183 1.899,3.396v2.734c0,0.104 -0.023,0.179 -0.035,0.268c4.676,-1.639 8.035,-6.079 8.035,-11.315c0,-6.627 -5.373,-12 -12,-12z"></path></g></g>
                                    </svg>
                                    <span class="item-grid__text">GitHub</span>
                                </a>
                                <div id="github-contact-preview" class="item-grid__preview glass glass--dark" aria-hidden="true">
                                    <p class="item-grid__preview-text">Checkout my code.</p>
                                </div>
                            </div>
                             <div class="item-grid__item">
                                <a href="https://www.linkedin.com/in/darshit-limbad/" target="_blank" rel="noopener" class="item-grid__link" data-cursor-alias aria-describedby="linkedin-contact-preview">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon--grid" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle>
                                    </svg>
                                    <span class="item-grid__text">LinkedIn</span>
                                </a>
                                <div id="linkedin-contact-preview" class="item-grid__preview glass glass--dark" aria-hidden="true">
                                    <p class="item-grid__preview-text">Connect professionally.</p>
                                </div>
                            </div>
                        </div>
                        <p class="info-block__more-links">
                            <a href="/social.php" class="link" data-cursor-alias>View all social profiles →</a>
                        </p>
                    </div>
                </div>

                {$reasonsBlockHtml}
                <!-- {testimonialsBlockHtml} -->
                
            </div>
        </div>
    </section>

    <div class="glow-bubble gb-top-right"></div>
    <div class="glow-bubble gb-bottom-left"></div>
HTML;

    require_once __DIR__ . '/src/layouts/BaseLayout.php';
?>