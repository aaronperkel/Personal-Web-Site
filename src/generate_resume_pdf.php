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
<html lang="en" style="width: 100%; margin: 0; padding: 0;">
<head>
    <meta charset="utf-8">
    <title>Aaron Perkel - Resume</title>
    <style>
        @page {
            margin: 0.75in;
        }
        html, body {
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: 'DejaVu Sans', 'Arial', sans-serif;
            font-size: 10pt; /* Base font size */
            background: #ffffff;
            color: #212529; /* Default dark text for body */
            line-height: 1.5; /* Adjusted for better readability */
        }
        .container {
            width: 100%; /* Container should fill the page area within margins */
            margin: 0 auto;
            padding: 0; /* Padding is handled by @page margins or cell padding */
        }

        /* Main layout table */
        .resume-grid-table {
            width: 100%;
            table-layout: fixed; /* Important for predictable column widths */
            border-collapse: collapse; /* Remove spacing between cells */
            border-spacing: 0;
        }
        .resume-sidebar-cell {
            width: 30%;
            vertical-align: top;
            background: #f0f0f0; /* Light grey background for sidebar */
            padding: 12pt; /* Approx 1.5rem, using points for PDF consistency */
            color: #212529; /* Dark text for sidebar */
            border-radius: 0; /* Border-radius often not well supported on td */
        }
        .resume-main-cell {
            width: 70%;
            vertical-align: top;
            padding: 12pt; /* Approx 1.5rem */
            color: #212529;
        }

        /* Headings */
        .resume-sidebar-cell h3 {
            color: #0056b3; /* Professional blue for sidebar headings */
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 10pt;
            font-size: 11pt; /* Slightly smaller than main content h3 */
            border-bottom: 1px solid #0056b3;
            padding-bottom: 3pt;
        }
        .resume-main-cell h3 {
            color: #0056b3; /* Professional blue for main headings */
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 10pt;
            font-size: 12pt;
            border-bottom: 1.5px solid #0056b3;
            padding-bottom: 4pt;
            /* display: inline-block; Removed as it can cause issues with table cells */
        }
         .resume-main-cell section > h3:first-child,
         .resume-sidebar-cell section > h3:first-child {
             margin-top: 0;
        }


        /* Sidebar specific content */
        .resume-sidebar-cell ul {
            list-style: none;
            padding: 0;
            margin: 0 0 10pt 0;
        }
        .resume-sidebar-cell li {
            margin-bottom: 6pt;
            font-size: 9pt;
        }
        .resume-sidebar-cell li .icon-text {
            font-weight: bold;
            margin-right: 0.5em;
        }
        .resume-sidebar-cell a {
            color: #0056b3; /* Link color in sidebar */
            text-decoration: none;
        }
        .resume-sidebar-cell a:hover { /* Not applicable in PDF but for consistency */
            text-decoration: underline;
        }

        /* Main content specific */
        .job, .school { /* Article wrapper for jobs and education */
            margin-bottom: 12pt;
        }
        .job h4, .school h4 { /* Job titles, Institution names */
            margin-top:0;
            margin-bottom: 2pt;
            color: #212529;
            font-size: 11pt;
            font-weight: bold;
        }
        .job .job-location, .school .degree-info {
             font-style: italic;
             color: #495057; /* Slightly lighter muted dark color */
             margin-bottom: 2pt;
             font-size: 9.5pt;
        }
        .job time, .school time {
            display: block;
            font-size: 8.5pt;
            color: #6c757d;
            margin-bottom: 4pt;
        }

        /* Lists in main content (Experience details, Projects) */
        .main-resume-content ul {
            list-style: none; /* Will use ::before for custom bullets */
            padding-left: 0;
            margin-top: 4pt;
        }
        .main-resume-content ul li {
            position: relative; /* For ::before positioning */
            padding-left: 1.2em; /* Space for the custom bullet */
            margin-bottom: 4pt;
            font-size: 9.5pt;
            line-height: 1.4; /* Slightly less than body for tighter lists */
        }
        .main-resume-content ul li::before {
            content: '▹';
            position: absolute;
            left: 0;
            top: 0.05em; /* Adjust vertical alignment of bullet */
            color: #0056b3; /* Accent color for bullets */
            font-size: 1.1em; /* Make bullet slightly larger */
        }
        .main-resume-content a {
            color: #0056b3;
            text-decoration: none;
        }

        /* Skills Grid - using a table for layout */
        .skills-grid-container {
            margin-bottom: 10pt;
        }
        .skills-grid-table {
            width: 100%;
        }
        .skills-grid-table td {
            width: 50%;
            vertical-align: top;
            padding-right: 10pt; /* Space between skill columns */
        }
        .skills-grid-table td:last-child {
            padding-right: 0;
        }
        .skills-grid-table ul {
            list-style: disc; /* Standard bullets for skills */
            padding-left: 1.2em; /* Indent disc bullets */
            margin-top: 0;
            margin-bottom: 8pt;
        }
         .skills-grid-table ul li {
            padding-left: 0;
            margin-bottom: 3pt;
            font-size: 9.5pt;
        }
        .skills-grid-table ul li::before {
            content: none; /* Remove custom arrow bullet */
        }
    </style>
</head>
<body>
    <main class="container">
        <table class="resume-grid-table">
            <tr>
                <td class="resume-sidebar-cell">
                    <section>
                        <h3>Contact</h3>
                        <ul>
                            <?php foreach ($resumeData['contactInfo'] as $item): ?>
                                <li>
                                    <?php
                                    $icon_text = '';
                                    if (strpos($item['icon'], 'fa-envelope') !== false) $icon_text = 'Email:';
                                    else if (strpos($item['icon'], 'fa-phone') !== false) $icon_text = 'Phone:';
                                    else if (strpos($item['icon'], 'fa-map-marker-alt') !== false) $icon_text = 'Addr:';
                                    else if (strpos($item['icon'], 'fa-globe') !== false) $icon_text = 'Web:';
                                    else if (strpos($item['icon'], 'fa-github') !== false) $icon_text = 'GitHub:';
                                    else if (strpos($item['icon'], 'fa-linkedin') !== false) $icon_text = 'LinkedIn:';
                                    ?>
                                    <?php if ($icon_text): ?><span class="icon-text"><?php echo htmlspecialchars($icon_text); ?></span><?php endif; ?>
                                    <?php echo $item['text']; ?>
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
                            <article class="school">
                                <h4><?php echo htmlspecialchars($edu['institution']); ?></h4>
                                <div class="degree-info"><?php echo htmlspecialchars($edu['degree']); ?></div>
                                <time><?php echo htmlspecialchars($edu['time']); ?></time>
                            </article>
                        <?php endforeach; ?>

                        <h3>Skills &amp; Interests</h3>
                        <div class="skills-grid-container">
                           <table class="skills-grid-table"><tr>
                            <?php
                            $category_count = 0;
                            $total_categories = count($resumeData['skillsAndInterests']['categories']);
                            foreach ($resumeData['skillsAndInterests']['categories'] as $category):
                                // Start a new row every 2 categories for a 2-column layout
                                if ($category_count % 2 == 0 && $category_count > 0) { echo '</tr><tr>'; }
                            ?>
                                <td>
                                    <ul>
                                        <?php foreach ($category as $skill): ?>
                                            <li><?php echo $skill; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            <?php
                                $category_count++;
                            endforeach;
                            // If there's an odd number of categories, add an empty cell to complete the row
                            if ($total_categories > 0 && $category_count % 2 != 0) { echo '<td></td>'; }
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
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
// $options->setLogOutputFile(__DIR__ . '/dompdf_log.html');


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

    $dompdf->stream("resume_styled_adjusted.pdf", ["Attachment" => true]);
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
