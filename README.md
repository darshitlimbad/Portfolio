# WEB3 Portfolio Website

A modern, visually engaging personal portfolio website showcasing my skills and experience in web development and WEB3 technologies. Built with clean, semantic HTML, well-structured CSS3, and performant JavaScript, this project demonstrates my ability to create scalable and maintainable web applications using core web technologies (PHP, HTML, CSS, and JavaScript) without relying on complex front-end frameworks.

## Table of Contents

*   [Project Overview](#project-overview)
*   [Key Features](#key-features)
*   [Technologies Used](#technologies-used)
*   [Project Structure](#project-structure)
*   [CSS Structure and Styling](#css-structure-and-styling)
*   [Component-Based Architecture](#component-based-architecture)
*   [Installation](#installation)
*   [Usage](#usage)
*   [Contributing](#contributing)
*   [License](#license)
*   [Contact](#contact)

## Project Overview

This portfolio website is designed to showcase my expertise in creating modern web applications using a component-based architecture with PHP for server-side rendering and JavaScript for client-side interactivity. The project emulates key features of modern web frameworks like Astro.js, React, or Vue.js, while remaining firmly grounded in core web technologies.

The site is built with scalability and maintainability in mind, emphasizing clean code, semantic HTML, well-organized CSS, and adherence to object-oriented programming (OOP) principles in both the JavaScript front-end and the PHP back-end.

It also include WEB3 integration

## Key Features

*   **Component-Based Architecture:** Reusable PHP and JavaScript components for creating modular and maintainable UI elements.
*   **Modern CSS3 Styling:** Utilizes CSS variables, Flexbox, Grid, animations, and transitions for a visually appealing and responsive design.
*   **Object-Oriented Programming (OOP):** Follows OOP principles in both the JavaScript front-end and the PHP back-end.
*   **Clean and Semantic HTML:** Uses semantic HTML elements to improve accessibility and SEO.
*   **Responsive Design:** Implemented using media queries and Flexbox/Grid layouts for optimal viewing on different devices.
*   **Caching Mechanism:**  Employs a caching strategy for static assets to improve performance.
*   **WEB3 Integration:**  Basic integration with WEB3 technologies.
*   **Service Worker:** Implemented to cache static assets and provide a faster, more reliable experience for returning users.

## Technologies Used

*   **HTML5:** For structuring the content of the website.
*   **CSS3:** For styling the website and creating a visually appealing design.
*   **JavaScript (ES6+):** For client-side interactivity and dynamic behavior.
*   **PHP:** For server-side rendering and component management.

## Project Structure

The project follows a well-defined directory structure to promote organization and maintainability:

```
/ (Root Directory)
|-- index.php (Entry point for the application)
|-- about.php (About page)
|-- Experience.php (Experience page)
|-- public/ (Publicly accessible assets)
|   |-- css/
|   |   |-- main.css (Master CSS file, imports all other CSS files)
|   |   |-- base.css (Base styles, resets, etc.)
|   |   |-- components.css (Styles for individual components)
|   |   |-- layout.css (Styles for layout elements)
|   |   |-- utilities.css (CSS utility classes for common styling patterns)
|   |   |-- cursors.css (Custom cursor styles)
|   |-- js/
|   |   |-- App.js (Main JavaScript application file)
|   |   |-- components/ (JavaScript components)
|   |   |-- utils/ (JavaScript utility functions)
|   |   |   |--DataStore.js (Cache Mechanism)
|   |   |   |--scrollReveal.js (ScrollReveal)
|   |-- media/ (Images, fonts, and other media files)
|   |-- service-worker.js (Service Worker file)
|-- src/ (Source code)
|   |-- layouts/ (Layout templates)
|   |   |-- BaseLayout.php (Main layout template)
|   |-- components/ (Reusable PHP components)
|   |   |-- Navbar.php (Navigation bar component)
|   |   |-- Footer.php (Footer component)
|   |-- data/ (Data files)
|   |   |-- data.json (JSON data for the application)
```

## CSS Structure and Styling

The CSS is structured using a modular approach, with each file responsible for a specific aspect of the styling:

*   **`base.css`:** Contains base styles, resets, and basic typography.
*   **`components.css`:** Contains styles for individual components.
*   **`layout.css`:** Contains styles for layout elements (header, footer, main content, etc.).
*   **`utilities.css`:** Contains CSS utility classes for common styling patterns (e.g., `.margin-top-md`, `.text-center`).
*   **`cursors.css`:** Contains CSS styles for custom cursors.
*   **`main.css`:** Imports all other CSS files in the correct order.

CSS variables are used extensively to manage reusable design tokens (colors, fonts, spacing, etc.). Flexbox and Grid are used for creating flexible and responsive layouts.

## Component-Based Architecture

The application is built using a component-based architecture, both in PHP and JavaScript:

*   **PHP Components (`src/components/`):** Simple PHP classes that encapsulate the logic and rendering of UI elements (e.g., Navbar, Footer). Each component has a `render()` method that outputs the HTML.
*   **JavaScript Components (`public/js/components/`):** ES6+ JavaScript classes that encapsulate the logic and behavior of interactive UI elements (e.g., a modal, a carousel).
*   **Layout System (`src/layouts/BaseLayout.php`):** The main layout template that provides the basic HTML structure and placeholders for content, header, and footer.

## Installation

1.  **Clone the repository:**

```bash
git clone [repository-url]
cd [repository-name]
```

2.  **Set up a PHP development environment:**
    *   Ensure you have PHP installed and configured on your system.
    *   A web server (e.g., Apache, Nginx) is required to serve the PHP files.
    *   If using PHP dependencies, run `composer install` in the project root (Composer is optional but recommended).

3.  **Configure your web server:**
    *   Point your web server's document root to the project's root directory.
    *   Ensure that PHP is enabled for your web server.

## Usage

1.  **Access the website:**
    *   Open your web browser and navigate to the URL of your development server (e.g., `http://localhost`).

2.  **Explore the different pages:**
    *   Use the navigation bar to access the "Home," "About," and "Experience" pages.

3.  **Interact with the JavaScript components:**
    *   Experiment with the interactive elements on the page (e.g., the Thanos Text effect).

## Contributing

Contributions are welcome! Please follow these steps:

1.  Fork the repository.
2.  Create a new branch for your feature or bug fix.
3.  Make your changes and commit them with descriptive messages.
4.  Push your changes to your fork.
5.  Submit a pull request to the main repository.

<!-- ## License -->

<!-- This project is licensed under the [MIT License](LICENSE). -->

## Contact

Darshit Limbad - [darshitlimbad555@gmail.com](mailto:darshitlimbad555@gmail.com)

darshit-limbad - [LinkedIn](https://www.linkedin.com/in/darshit-limbad/)