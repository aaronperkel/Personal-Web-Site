<?php

// Include Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';
// Include the resume content
require_once __DIR__ . '/data/resume_content.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Function to generate the HTML for the resume
// This function will reconstruct the HTML structure of your resume.php page
// It's important that this HTML is self-contained and styled,
// ideally linking to an external CSS file or embedding styles if necessary.
function get_resume_html($resumeData) {
    ob_start();
    // We need to ensure all paths for CSS/images are absolute or correctly relative
    // to the script generating the PDF if they are to be included.
    // For simplicity, we'll embed some basic styles.
    // Ideally, you would link to your existing style.css or a PDF-specific version.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume - <?php echo htmlspecialchars($resumeData['pageTitle']); ?></title>
    <style>
        @page { margin: 0.75in; } /* Default page margins */
        body {
            font-family: 'DejaVu Sans', 'Arial', sans-serif; /* DejaVu Sans is good for UTF-8, Arial as fallback */
            font-size: 10pt;
            line-height: 1.4;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        .resume-container {
            width: 100%;
        }
        /* Basic two-column layout using tables for Dompdf compatibility */
        .resume-grid {
            width: 100%;
            border-spacing: 20px; /* Simulates gap */
            border-collapse: separate; /* Important for border-spacing */
        }
        .sidebar-cell {
            width: 30%; /* Adjust sidebar width */
            vertical-align: top;
            padding-right: 15px; /* Space between sidebar and main content line */
        }
        .main-content-cell {
            width: 70%; /* Adjust main content width */
            vertical-align: top;
        }

        .sidebar h3, .main-resume h3 {
            font-size: 13pt;
            color: #0056b3; /* A professional blue */
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 0;
            margin-bottom: 8px;
            padding-bottom: 4px;
            border-bottom: 1.5px solid #0056b3;
        }
        .sidebar section { margin-bottom: 20px; }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            margin-bottom: 6px;
            font-size: 9.5pt;
            word-wrap: break-word; /* Help with long links */
        }
        .sidebar ul li .icon-placeholder { /* Simple text prefix for icons */
            display: inline-block;
            width: 18px; /* Adjust as needed */
            font-weight: bold;
        }
         .sidebar a { color: #0056b3; text-decoration: none; }
         .sidebar a:hover { text-decoration: underline; }


        .main-resume article { margin-bottom: 18px; }
        .main-resume h4 { /* Job titles, school names */
            font-size: 11pt;
            font-weight: bold;
            color: #222222;
            margin-top: 0;
            margin-bottom: 2px;
        }
        .main-resume .job-location, .main-resume .degree-info {
            font-size: 10pt;
            font-style: italic;
            color: #555555;
            margin-bottom: 2px;
        }
        .main-resume time {
            font-size: 9pt;
            color: #777777;
            margin-bottom: 5px;
            display: block;
        }
        .main-resume ul { /* For job details, skills, projects */
            list-style: disc;
            padding-left: 18px; /* Indent for bullets */
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .main-resume ul li {
            margin-bottom: 4px;
            font-size: 10pt;
            line-height: 1.5;
        }

        .skills-categories {
            /* If using two columns for skills */
            /* display: table; width: 100%; table-layout: fixed; */ /* More complex, might be better as single list */
        }
        .skills-categories ul { margin-bottom: 5px; }


        .main-resume a { color: #0056b3; text-decoration: none; }
        .main-resume a:hover { text-decoration: underline; }

        /* Helper for contact icons */
        .contact-label { font-weight: bold; }

    </style>
</head>
<body>
    <div class="resume-container">
        <table class="resume-grid">
            <tr>
                <td class="sidebar-cell">
                    <section class="contact-info">
                        <h3>Contact</h3>
                        <ul>
                            <?php foreach ($resumeData['contactInfo'] as $item): ?>
                                <?php
                                    $label = '';
                                    if (strpos($item['icon'], 'fa-envelope') !== false) $label = '<span class="icon-placeholder">E:</span>';
                                    else if (strpos($item['icon'], 'fa-phone') !== false) $label = '<span class="icon-placeholder">P:</span>';
                                    else if (strpos($item['icon'], 'fa-map-marker-alt') !== false) $label = '<span class="icon-placeholder">A:</span>';
                                    else if (strpos($item['icon'], 'fa-globe') !== false) $label = '<span class="icon-placeholder">W:</span>';
                                    else if (strpos($item['icon'], 'fa-github') !== false) $label = '<span class="icon-placeholder">GH:</span>';
                                    else if (strpos($item['icon'], 'fa-linkedin') !== false) $label = '<span class="icon-placeholder">LI:</span>';
                                ?>
                                <li><?php echo $label; ?> <?php echo $item['text']; // HTML is allowed in text ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </section>

                    <section class="honors-awards">
                        <h3>Honors &amp; Awards</h3>
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
                <td class="main-content-cell">
                    <section class="main-resume">
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
                        <div class="skills-categories">
                            <?php foreach ($resumeData['skillsAndInterests']['categories'] as $category): ?>
                                <ul>
                                    <?php foreach ($category as $skill): ?>
                                        <li><?php echo $skill; // HTML is allowed in skill items ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endforeach; ?>
                        </div>

                        <h3>Projects</h3>
                        <ul>
                            <?php foreach ($resumeData['projects'] as $project): ?>
                                <li><a href="<?php echo htmlspecialchars($project['link']); ?>"><?php echo htmlspecialchars($project['name']); ?></a> — <?php echo htmlspecialchars($project['description']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>
    </div>
</body>
</html>
<?php
    return ob_get_clean();
}

// Get the HTML content
$html = get_resume_html($resumeData);

// Configure Dompdf
$options = new Options();
// Note: You might need to configure font directories if you use custom fonts
// $options->set('fontDir', __DIR__ . '/path/to/fonts');
// $options->set('fontCache', __DIR__ . '/path/to/font/cache');
// $options->set('defaultFont', 'YourDefaultFont'); // e.g., 'DejaVu Sans'
$options->set('isRemoteEnabled', true); // Allows Dompdf to access remote stylesheets/images if any
$options->set('isHtml5ParserEnabled', true);


$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait'); // or 'letter', 'legal', etc.

// Render the HTML as PDF
try {
    $dompdf->render();

    // Clean any previous output buffering before sending PDF
    if (ob_get_level()) {
        ob_end_clean();
    }

    // Output the generated PDF
    // The ["Attachment" => true] option prompts for download.
    // Using ["Attachment" => false] would attempt to display inline.
    $dompdf->stream("aaron-perkel-resume.pdf", ["Attachment" => true]);
    exit;

} catch (Exception $e) {
    // Log the error or display a user-friendly message
    // For debugging, we can output the error message directly.
    // IMPORTANT: In a production environment, you would log this error
    // and show a generic error page to the user.
    error_log("Error generating PDF: " . $e->getMessage() . "\n" . $e->getTraceAsString());
    header("HTTP/1.1 500 Internal Server Error");
    echo "<h1>Error generating PDF</h1>";
    echo "<p>An error occurred while generating the PDF. Please try again later.</p>";
    echo "<p>Error details (for debugging):<br><pre>" . htmlspecialchars($e->getMessage()) . "</pre></p>";
    // You might want to see the full trace in your PHP error log, not necessarily output to browser.
    exit;
}
?>
