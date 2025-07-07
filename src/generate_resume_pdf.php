<?php

// Suppress deprecation notices that can interfere with PDF generation
error_reporting(E_ALL & ~E_DEPRECATED);

// Include Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';
// Include the resume content
require_once __DIR__ . '/data/resume_content.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Function to generate the HTML for the resume
function get_resume_html($resumeData) {
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Aaron Perkel - Resume</title>
    <style>
        /* CSS from resume-static.html - Adjusted for PDF */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 100%;
            /* Dompdf handles 'Inter' better if locally installed; using fallback for now */
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
            scroll-behavior: smooth;
        }

        :root { /* CSS variables might not be fully supported, direct values used below */
            --bg-page: #0b1a2a;
            --bg-panel: #12263f;
            --bg-header: #091622;
            --text-primary: #e6f1ff;
            --text-muted: #a3b1c2;
            --accent: #58a6ff;
        }

        body {
            background: #ffffff; /* PDF background should be white */
            color: #0b1a2a; /* Primary text color for PDF */
            line-height: 1.6;
            /* overflow-x: hidden; Not relevant for PDF */
        }

        a {
            color: #58a6ff; /* --accent */
            text-decoration: none;
        }

        a:hover { /* hover states not applicable in PDF but good for consistency */
            color: #79c0ff;
            text-decoration: underline;
        }

        .container { /* Simplified for PDF, assuming full page width is desired */
            width: 100%;
            margin: 0 auto;
            padding: 0.5in; /* Page margins are handled by @page, this can be for content padding */
        }

        /* ─── Resume Page Styles from resume-static.html ───────────────────────────────────── */
        /* Using table for layout for better Dompdf compatibility over CSS grid */
        .resume-grid-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 20px; /* Simulates gap */
        }
        .resume-sidebar-cell {
            width: 30%; /* approx 250px / (250px + (960px - 250px - 40px for gap)) */
            vertical-align: top;
            background: #12263f; /* --bg-panel */
            padding: 1.5rem;
            border-radius: 8px; /* May not render perfectly in all PDF viewers */
            color: #e6f1ff; /* --text-primary for sidebar */
        }
        .resume-main-cell {
            width: 70%;
            vertical-align: top;
            color: #0b1a2a; /* Main content text color */
        }

        .resume-sidebar-cell h3 {
            color: #58a6ff; /* --accent */
            text-transform: uppercase;
            margin-bottom: 1rem;
            font-size: 1.1em; /* Approx 1.1rem */
            border-bottom: 1px solid #58a6ff;
            padding-bottom: 0.25rem;
        }

        .resume-sidebar-cell ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .resume-sidebar-cell li {
            margin-bottom: .75rem;
            font-size: 0.95em; /* Approx .95rem */
        }
        .resume-sidebar-cell li .icon-text { /* For text based "icons" */
            margin-right: 0.5em;
        }

        .resume-sidebar-cell a {
            color: #e6f1ff; /* --text-primary for sidebar links */
        }
         .resume-sidebar-cell a:hover {
            color: #79c0ff;
        }


        .resume-main-cell h3 {
            border-bottom: 2px solid #58a6ff; /* --accent */
            display: inline-block; /* Important for border to fit content */
            padding-bottom: .25rem;
            margin-top: 0; /* First h3 in main shouldn't have excessive top margin */
            margin-bottom: 1rem;
            color: #0b1a2a; /* --text-primary equivalent for main content */
            font-size: 1.3em;
        }
        .resume-main-cell section > h3:first-child {
             margin-top: 0;
        }


        .resume-main-cell p {
            margin-bottom: 1rem;
        }

        .resume-main-cell ul { /* Default for Experience/Projects */
            list-style: none;
            padding-left: 0;
        }
        .resume-main-cell ul li { /* Default for Experience/Projects */
            position: relative;
            padding-left: 1.5em; /* Approx 1.5rem */
            margin-bottom: .5rem;
        }
        .resume-main-cell ul li::before { /* Default for Experience/Projects */
            content: '▹'; /* Arrow bullet */
            position: absolute; /* Dompdf might struggle with this; test */
            left: 0;
            color: #58a6ff; /* --accent */
        }


        .job {
            margin-bottom: 1.5rem;
        }

        .job h4 {
            margin-bottom: .25rem;
            color: #0b1a2a; /* --text-primary equivalent */
            font-size: 1.1em;
        }
        .job .job-location { /* Added class for styling if needed */
             font-style: italic;
             color: #334155; /* A slightly muted dark color */
             margin-bottom: .25rem;
             font-size: 0.95em;
        }

        .job time {
            display: block;
            font-size: .9em;
            color: #64748b; /* --text-muted equivalent */
            margin-bottom: .5rem;
        }

        /* Skills Grid - simplified for PDF */
        .skills-grid-container {
            /* Using a two-column table for skills for PDF reliability */
        }
        .skills-grid-table {
            width: 100%;
        }
        .skills-grid-table td {
            width: 50%;
            vertical-align: top;
        }
        .skills-grid-table ul {
            list-style: disc; /* Use disc for skills for differentiation */
            padding-left: 1.5em; /* Indent disc bullets */
            margin-bottom: 1rem;
        }
         .skills-grid-table ul li {
            padding-left: 0; /* Remove arrow bullet padding */
            margin-bottom: 0.3rem;
        }
        .skills-grid-table ul li::before {
            content: none; /* Remove arrow bullet */
        }


        /* Remove discs under Experience, keep only arrows (already default) */
        /* .resume .job ul {
            list-style: none;
            margin-left: 0;
            padding-left: 0;
        } */
        @page {
             margin: 0.75in; /* Default page margins */
        }
    </style>
</head>
<body class="resume"> <!-- Using resume class for context, though many styles are specific now -->
    <main class="container"> <!-- Simplified container for PDF -->
        <!-- h2 class="sr-only">Resume</h2 --> <!-- Screen reader only, not needed for visual PDF -->

        <table class="resume-grid-table">
            <tr>
                <td class="resume-sidebar-cell">
                    <section>
                        <h3>Contact</h3>
                        <ul>
                            <?php foreach ($resumeData['contactInfo'] as $item): ?>
                                <li>
                                    <?php
                                    // Text placeholders for icons
                                    $icon_text = '';
                                    if (strpos($item['icon'], 'fa-envelope') !== false) $icon_text = 'Email:';
                                    else if (strpos($item['icon'], 'fa-phone') !== false) $icon_text = 'Phone:';
                                    else if (strpos($item['icon'], 'fa-map-marker-alt') !== false) $icon_text = 'Addr:';
                                    else if (strpos($item['icon'], 'fa-globe') !== false) $icon_text = 'Web:';
                                    else if (strpos($item['icon'], 'fa-github') !== false) $icon_text = 'GitHub:';
                                    else if (strpos($item['icon'], 'fa-linkedin') !== false) $icon_text = 'LinkedIn:';
                                    ?>
                                    <?php if ($icon_text): ?><span class="icon-text"><?php echo htmlspecialchars($icon_text); ?></span><?php endif; ?>
                                    <?php echo $item['text']; // Original text includes <a> tags ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <section>
                        <h3>Honors and Awards</h3>
                        <?php foreach ($resumeData['honorsAndAwards'] as $honor): ?>
                        <ul>
                            <li>
                                <strong><?php echo htmlspecialchars($honor['title']); ?></strong><br>
                                <em><?php echo htmlspecialchars($honor['date']); ?></em>
                            </li>
                        </ul>
                        <?php endforeach; ?>
                    </section>
                </td>
                <td class="resume-main-cell">
                    <section class="main-resume-content">
                        <h3>Experience</h3>
                        <?php foreach ($resumeData['experience'] as $job): ?>
                            <article class="job">
                                <h4><?php echo htmlspecialchars($job['title']); ?></h4>
                                <div class="job-location"><?php echo htmlspecialchars($job['location']); ?></div>
                                <time><?php echo htmlspecialchars($job['time']); ?></time>
                                <ul>
                                    <?php foreach ($job['details'] as $detail): ?>
                                        <li><?php echo htmlspecialchars($detail); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </article>
                        <?php endforeach; ?>

                        <h3>Education</h3>
                        <?php foreach ($resumeData['education'] as $edu): ?>
                            <article class="school"> {/* Assuming .school class for consistency if defined */}
                                <h4><?php echo htmlspecialchars($edu['institution']); ?></h4>
                                <div class="job-location"><?php echo htmlspecialchars($edu['degree']); ?></div> {/* Re-using job-location for similar styling */}
                                <time><?php echo htmlspecialchars($edu['time']); ?></time>
                            </article>
                        <?php endforeach; ?>

                        <h3>Skills &amp; Interests</h3>
                        <div class="skills-grid-container">
                           <table class="skills-grid-table"><tr>
                            <?php
                            $category_count = 0;
                            foreach ($resumeData['skillsAndInterests']['categories'] as $category):
                                if ($category_count % 2 == 0 && $category_count > 0) { echo '</tr><tr>'; } // crude 2 column for skills
                            ?>
                                <td>
                                    <ul>
                                        <?php foreach ($category as $skill): ?>
                                            <li><?php echo $skill; // HTML is allowed in skill items ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            <?php
                                $category_count++;
                            endforeach;
                            // Ensure table row is closed if odd number of categories
                            if ($category_count % 2 != 0) { echo '<td></td>'; } // Add empty cell if needed
                            ?>
                           </tr></table>
                        </div>

                        <h3>Projects</h3>
                        <ul>
                            <?php foreach ($resumeData['projects'] as $project): ?>
                                <li><a href="<?php echo htmlspecialchars($project['link']); ?>"><?php echo htmlspecialchars($project['name']); ?></a> — <?php echo htmlspecialchars($project['description']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>
<?php
    return ob_get_clean();
}

// Get the HTML content
$html = get_resume_html($resumeData);


// Configure Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // For potential images or linked CSS if any (though CSS is embedded)
$options->set('isHtml5ParserEnabled', true);
// $options->setLogOutputFile(__DIR__ . '/dompdf_log.html'); // Ensure this path is writable by the web server


$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
try {
    $dompdf->render();

    if (ob_get_level()) {
        ob_end_clean();
    }

    $dompdf->stream("resume_styled_from_static.pdf", ["Attachment" => true]);
    exit;

} catch (Exception $e) {
    if (ob_get_level()) {
        ob_end_clean();
    }
    error_log("Error generating PDF: " . $e->getMessage() . "\n" . $e->getTraceAsString());
    header("HTTP/1.1 500 Internal Server Error");
    echo "<h1>Error generating PDF</h1>";
    echo "<p>An error occurred while generating the PDF. Please try again later.</p>";
    echo "<p>Error details (for debugging):<br><pre>" . htmlspecialchars($e->getMessage()) . "</pre></p>";
    exit;
}
?>
