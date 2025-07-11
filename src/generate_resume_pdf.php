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
function get_resume_html($resumeData)
{
    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Aaron Perkel - Resume</title>
        <style>
            * {
                box-sizing: border-box;
            }

            @page {
                margin: 0.7in;
            }

            html {
                width: 100%;
                margin: 0;
                padding: 0;
                font-family: 'DejaVu Sans', 'Arial', sans-serif;
                font-size: 10pt;
                background-color: #ffffff;
                color: #212529;
                line-height: 1.4;
            }

            body {
                width: 100%;
                margin: 0;
                padding: 0;
                position: relative;
                background-color: #ffffff;
            }

            main.container {
                width: 100%;
                margin: 0 auto;
                padding: 15pt;
                position: relative;
            }

            /* Resume Header Styles */
            .resume-top-header {
                /* REMOVED: border-bottom: 1.5px solid #0056b3; */
                /* text-align: center; /* Centering will be on children if needed */
                margin-bottom: 15pt;
                /* Space after the entire header block (including the new line div) */
                width: 100%;
            }

            .resume-top-header h1 {
                font-size: 22pt;
                color: #0056b3;
                margin: 0 0 4pt 0;
                font-weight: bold;
                text-align: center;
            }

            .resume-top-header .contact-line {
                font-size: 9pt;
                color: #495057;
                word-wrap: break-word;
                text-align: center;
                margin-bottom: 10pt;
                /* Space between contact line and the new hr line */
            }

            .resume-top-header .contact-line a {
                color: #495057;
                text-decoration: none;
            }

            .resume-top-header .contact-line .contact-separator {
                margin: 0 0.4em;
            }

            .header-line {
                /* New style for the explicit line */
                width: 100%;
                height: 1.5px;
                background-color: #0056b3;
                margin-top: 5pt;
                margin: 5pt -15pt 0;
                /* 5pt top, –15pt left/right, 0 bottom */
            }


            /* Main two-column layout table */
            .resume-grid-table {
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
                border-spacing: 0;
                /* margin: 15pt 0 0 0; /* No longer needed, .resume-top-header provides bottom margin */
                padding: 0;
            }

            .resume-sidebar-cell {
                width: 30%;
                vertical-align: top;
                background-color: #f0f0f0;
                padding: 10pt;
                color: #212529;
                border-radius: 8px;
            }

            .resume-main-cell {
                width: 70%;
                vertical-align: top;
                padding: 10pt;
                color: #212529;
            }

            /* Section Headings */
            h3 {
                color: #0056b3;
                text-transform: uppercase;
                margin-top: 0;
                margin-bottom: 8pt;
                font-size: 11pt;
                border-bottom: 1px solid #0056b3;
                padding-bottom: 2pt;
                display: inline-block;
            }

            .resume-main-cell h3 {
                font-size: 12pt;
                border-bottom-width: 1.5px;
                padding-bottom: 3pt;
            }

            .resume-sidebar-cell section:first-child>h3,
            .resume-main-cell section:first-child>h3 {
                margin-top: 0;
            }

            .resume-sidebar-cell ul {
                list-style: none;
                padding: 0;
                margin: 0 0 8pt 0;
            }

            .resume-sidebar-cell li {
                margin-bottom: 5pt;
                font-size: 9pt;
                word-wrap: break-word;
            }

            .resume-sidebar-cell li .icon-text {
                font-weight: bold;
                margin-right: 0.5em;
            }

            .resume-sidebar-cell a {
                color: #0056b3;
                text-decoration: none;
            }

            .job,
            .school {
                margin-bottom: 10pt;
            }

            .job h4,
            .school h4 {
                margin-top: 0;
                margin-bottom: 1pt;
                color: #212529;
                font-size: 10pt;
                font-weight: bold;
            }

            .job .job-location,
            .school .degree-info {
                font-style: italic;
                color: #495057;
                margin-bottom: 1pt;
                font-size: 9pt;
            }

            .job time,
            .school time {
                display: block;
                font-size: 8pt;
                color: #6c757d;
                margin-bottom: 3pt;
            }

            .main-resume-content ul,
            .skills-grid-table ul {
                list-style: none;
                padding-left: 0;
                margin-top: 3pt;
            }

            .main-resume-content ul li,
            .skills-grid-table ul li {
                position: relative;
                padding-left: 1.2em;
                margin-bottom: 3pt;
                font-size: 9pt;
                line-height: 1.3;
            }

            .main-resume-content ul li::before,
            .skills-grid-table ul li::before {
                content: '▹';
                position: absolute;
                left: 0;
                top: 0.05em;
                color: #0056b3;
                font-size: 1em;
            }

            .main-resume-content a {
                color: #0056b3;
                text-decoration: none;
            }

            .skills-grid-container {
                margin-bottom: 8pt;
            }

            .skills-grid-table td {
                width: 50%;
                vertical-align: top;
                padding-right: 8pt;
            }

            .skills-grid-table td:last-child {
                padding-right: 0;
            }

            .skills-grid-table ul {
                margin-bottom: 6pt;
            }
        </style>
    </head>

    <body>
        <main class="container">
            <div class="resume-top-header">
                <h1>Aaron Perkel</h1>
                <div class="contact-line">
                    <?php
                    $header_contacts_map = [];
                    foreach ($resumeData['contactInfo'] as $item) {
                        if (strpos($item['icon'], 'fa-envelope') !== false)
                            $header_contacts_map['email'] = $item['text'];
                        else if (strpos($item['icon'], 'fa-phone') !== false)
                            $header_contacts_map['phone'] = $item['text'];
                        else if (strpos($item['icon'], 'fa-globe') !== false && strpos(strtolower($item['text']), 'aaronperkel.com') !== false)
                            $header_contacts_map['website'] = $item['text'];
                    }

                    $display_items_ordered = [];
                    if (!empty($header_contacts_map['email']))
                        $display_items_ordered[] = $header_contacts_map['email'];
                    if (!empty($header_contacts_map['phone']))
                        $display_items_ordered[] = $header_contacts_map['phone'];
                    if (!empty($header_contacts_map['website']))
                        $display_items_ordered[] = $header_contacts_map['website'];

                    echo implode('<span class="contact-separator">|</span>', $display_items_ordered);
                    ?>
                </div>
                <div class="header-line"></div> <!-- The new explicit div for the line -->
            </div>

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
                                        if (strpos($item['icon'], 'fa-envelope') !== false)
                                            $icon_text = 'Email:';
                                        else if (strpos($item['icon'], 'fa-phone') !== false)
                                            $icon_text = 'Phone:';
                                        else if (strpos($item['icon'], 'fa-map-marker-alt') !== false)
                                            $icon_text = 'Addr:';
                                        else if (strpos($item['icon'], 'fa-globe') !== false)
                                            $icon_text = 'Web:';
                                        else if (strpos($item['icon'], 'fa-github') !== false)
                                            $icon_text = 'GitHub:';
                                        else if (strpos($item['icon'], 'fa-linkedin') !== false)
                                            $icon_text = 'LinkedIn:';
                                        ?>
                                        <?php if ($icon_text): ?><span
                                                class="icon-text"><?php echo htmlspecialchars($icon_text); ?></span><?php endif; ?>
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
                                <table class="skills-grid-table">
                                    <tr>
                                        <?php
                                        $category_count = 0;
                                        $total_categories = count($resumeData['skillsAndInterests']['categories']);
                                        foreach ($resumeData['skillsAndInterests']['categories'] as $category):
                                            if ($category_count % 2 == 0 && $category_count > 0) {
                                                echo '</tr><tr>';
                                            }
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
                                        if ($total_categories > 0 && $category_count % 2 != 0) {
                                            echo '<td></td>';
                                        }
                                        ?>
                                    </tr>
                                </table>
                            </div>

                            <h3>Projects</h3>
                            <ul>
                                <?php foreach ($resumeData['projects'] as $project): ?>
                                    <li><a
                                            href="<?php echo htmlspecialchars($project['link']); ?>"><?php echo htmlspecialchars($project['name']); ?></a>
                                        — <?php echo htmlspecialchars($project['description']); ?></li>
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
// $options->setLogOutputFile(__DIR__ . '/dompdf_render_log.htm');
// $options->set('debugLayout', true);


$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

try {
    $dompdf->render();

    if (ob_get_level()) {
        ob_end_clean();
    }

    $dompdf->stream("aaron-perkel-resume.pdf", ["Attachment" => true]);
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