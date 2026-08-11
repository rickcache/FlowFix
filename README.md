# FlowFix - Custom WordPress Theme

[![WordPress Version](https://img.shields.io/badge/WordPress-6.0+-blue.svg)](https://wordpress.org/)
[![PHP Version](https://img.shields.io/badge/PHP-7.4+-777bb4.svg)](https://php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

## A brief description of what this project does and who it's for

## Site Description

FlowFix is a high-performance, fully custom WordPress theme built from scratch, designed specifically for professional plumbing, maintenance, and emergency home services. It moves away from bloated page builders, utilizing native WordPress PHP functions, custom theme options, and modern CSS techniques to deliver a lightning-fast, visually striking user experience.

---

### Desktop View

![image alt](https://github.com/rickcache/FlowFix/blob/main/assests/images/Homepage.png))

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/About.png))

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/services.png)

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/Contact.png)

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/Edit.jpeg)

### Mobile View

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/phone1.png)

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/phone2.png)

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/phone3.png)

![image alt](https://github.com/rickcache/FlowFix/blob/f63f5130655465ad2db95a559763c92cae202e48/assests/images/phone4.png)

## Tech Stack

- **Core Structure:** WordPress, PHP
- **Styling & Layout:** HTML5, CSS3 (Advanced Flexbox/Grid)
- **Typography:** Google Fonts (Poppins)
- **Design Elements:** SVG Icons, Glassmorphism UI
- **Database Management:** MySQL / phpMyAdmin

---

## Features

- **Custom Theme Options Panel:** Built natively into the WordPress dashboard. Site owners can update hero titles, subtitles, background images, and trust badge text dynamically without touching a single line of code.
- **Modern UI/UX:** Features advanced CSS techniques including glassmorphism trust cards, sweeping light reflection animations, and responsive flexbox layouts.
- **Floating Contact Widget:** A fixed, animated bottom-right widget with a custom hamburger toggle that expands to reveal quick-action buttons (WhatsApp, Phone, Quote) with hover tooltips.
- **Mobile-First Responsiveness:** Flawless scaling from desktop down to small mobile screens. Employs smart hiding for heavy visual elements (like stacked glass cards) on smaller devices to prioritize user conversion and readability.
- **Media Standardization:** Enforces a strict 20:9 aspect ratio for media to ensure perfect visual consistency across the entire site infrastructure.
- **Custom Branding:** Easily updateable WordPress Site Icon (Favicon) for a 100% white-labeled, professional look.

---

## My Project

This is a personal portfolio project built to master full-stack WordPress theme development. My goal was to completely avoid commercial page builders (like Elementor or Divi) and instead build a lightweight, highly customized theme from the ground up.

By building this, I took full control over the DOM, CSS styling, and WordPress PHP routing. This project showcases my ability to bridge the gap between front-end UI/UX design (animations, responsive breakpoints) and back-end database management (custom options, server configurations).

---

## How to Use

### 1. Installation

1. Download the theme `.zip` file from this repository.
2. Log in to your WordPress Admin Dashboard.
3. Navigate to **Appearance > Themes > Add New > Upload Theme**.
4. Choose the file, click **Install Now**, and then **Activate**.

### 2. Customizing the Content

The hero section and main site elements are fully dynamic.

1. Go to the **Theme Options** panel in the WordPress Dashboard.
2. Update the text fields (Title, Subtitle, Button Links). _Note: You can use HTML like `<span class="text-blue">` in the title field to add brand colors to specific words._
3. Upload a new Hero Background Image.
4. Click **Save Changes** and the front end will instantly update.

### 3. Setting the Site Icon (Favicon)

1. Go to **Appearance > Customize > Site Identity**.
2. Scroll to the **Site Icon** section and upload a square version of your logo (512x512 pixels recommended).
3. Click **Publish**.

## My Experience

Building FlowFix was an incredible learning journey that pushed my skills beyond just writing HTML/CSS. The front-end design was heavily focused on creating a sleek, trustworthy aesthetic using Poppins typography and glassmorphism. However, the most valuable experience came from navigating complex server-level architecture and database migrations.

I learned how to successfully migrate a local WordPress build to a live production server, dealing hands-on with database prefix conflicts, deeply rooted caching rules, and server file management. It taught me exactly how WordPress communicates with its database and how to take control when automated migration tools fail.

---

## Troubleshoot & Migration Notices

If you are migrating this theme or running into caching issues on a live server, reference these fixes that I documented during development:

- **The "Ghost" Install (Prefix Conflicts):** If your site shows a blank or default theme after migration, check your database via phpMyAdmin. You may have conflicting table prefixes (e.g., a default `wp_` and your custom prefix). Ensure the configuration file strictly points to your custom data tables.
- **W3 Total Cache `.htaccess` Hijacking:** Caching plugins leave behind aggressive server rules even after deletion. If logged-out users are seeing broken/old images while logged-in admins see the live site, you must manually delete `advanced-cache.php` and strip the old `# BEGIN W3TC` rules from the root `.htaccess` file.
- **Database Search & Replace:** Always run a Search & Replace on the database to swap local URLs to production URLs, making sure to specifically target your custom options tables.

---

## License & Ownership

**© 2026 Rick Biswas. All Rights Reserved.**

This project is the exclusive property of Rick Biswas. Unauthorized copying, modification, distribution, or use of this theme—whether for commercial or personal purposes—is strictly prohibited. No one is allowed to use, edit, or reproduce this code without explicit written permission from the author.

---

_Built from scratch with code and caffeine._
