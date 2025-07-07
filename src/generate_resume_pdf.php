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
    <meta charset="UTF-8">
    <title>Resume - <?php echo htmlspecialchars($resumeData['pageTitle']); ?></title>
    <style>
        /* ALL CSS REMOVED FOR THIS TEST */
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
                                    if (strpos($item['icon'], 'fa-envelope') !== false) $label = 'E:';
                                    else if (strpos($item['icon'], 'fa-phone') !== false) $label = 'P:';
                                    else if (strpos($item['icon'], 'fa-map-marker-alt') !== false) $label = 'A:';
                                    else if (strpos($item['icon'], 'fa-globe') !== false) $label = 'W:';
                                    else if (strpos($item['icon'], 'fa-github') !== false) $label = 'GH:';
                                    else if (strpos($item['icon'], 'fa-linkedin') !== false) $label = 'LI:';
                                ?>
                                <li><?php echo htmlspecialchars($label); ?> <?php echo $item['text']; // HTML is allowed in text ?></li>
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
                </td>
            </tr>
        </table>
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

    $dompdf->stream("resume_no_styles.pdf", ["Attachment" => true]);
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
