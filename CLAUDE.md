# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Aaron Perkel's personal website (aaronperkel.com) — a small server-rendered PHP site (no build step, no JS framework). Originally built in Notion, then rewritten by hand as PHP/HTML/CSS/JS.

## Repo layout

All site code lives in `www-root/` — this is the actual document root served by Apache (the project root is not the web root). Key files:

- `top.php` — emits the shared `<head>` (meta, fonts, JSON-LD schema, favicon links) and opens `<body>`; includes `header.php` and `nav.php`. Every page starts with `include 'top.php';`.
- `header.php`, `nav.php`, `footer.php` — shared chrome included by every page. `footer.php` also closes `</body></html>`, so it must be the last include on a page.
- `index.php`, `about.php`, `resume.php` — the three real pages. Each follows the pattern: include `top.php` → include page-specific data file → render → include `footer.php`.
- `data/about_content.php`, `data/resume_content.php` — page content as plain PHP arrays (`$aboutData`, `$resumeData`). This is the only "CMS" — edit these arrays to change site copy, resume entries, skills, etc. Values may contain raw HTML (e.g. `<strong>`, `<a>`) and are echoed unescaped in several places (`about.php`, `resume.php`), so only trusted content belongs here.
- `generate_resume_pdf.php` — builds the same resume data into a standalone HTML document and renders it to PDF via Dompdf (`vendor/dompdf`). Keep its inline `<style>` resume markup in sync with `resume.php`/`css/style.css` if the resume layout changes, since it doesn't share the same template.
- `css/style.css`, `js/main.js` — single global stylesheet and script, loaded by `top.php`. `main.js` is only included on `index.php` (project card popup behavior).
- `public/img/` — static assets (icons, project screenshots, favicons). This directory is gitignored (`public/` in `.gitignore`); images are deployed separately, not committed.
- `.htaccess` — forces HTTPS, rewrites `/about` and `/resume` to their `.php` files, excludes `/riley21/` subsite from rewriting, serves `notfound.html` for 404s, and gzips common asset types.

## Conventions

- Pages are cache-busted with `?<?php echo time(); ?>` on the CSS/JS includes in `top.php` — there's no asset pipeline or versioning beyond that.
- `$pathParts['filename']` (derived from `PHP_SELF` in `top.php`) is used both for the `<body class="...">` and for highlighting the active nav link in `nav.php` — keep this in mind if adding a new top-level page.
- Dependencies are managed via Composer (`dompdf/dompdf`) with the vendor directory committed under `www-root/vendor/`; there's no other package manager or build process in this repo.

## Working locally

There's no dev server script in this repo — serve `www-root/` with PHP's built-in server, e.g. `php -S localhost:8000 -t www-root`, then visit `/`, `/about.php`, `/resume.php`.
