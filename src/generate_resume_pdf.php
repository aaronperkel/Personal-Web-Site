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
        /* Basic styling - you'll need to expand this or link your stylesheet */
        body { font-family: 'Helvetica', 'Arial', sans-serif; line-height: 1.4; color: #333; margin: 0; padding: 0; }
        .resume { width: 100%; margin: 20px auto; max-width: 800px; }
        .resume-grid { display: grid; grid-template-columns: 200px 1fr; gap: 20px; }
        .sidebar { padding: 15px; background-color: #f0f0f0; }
        .sidebar h3 { font-size: 1.1em; color: #007bff; text-transform: uppercase; margin-top: 0; margin-bottom: 10px; border-bottom: 1px solid #007bff; padding-bottom: 5px;}
        .sidebar ul { list-style: none; padding: 0; margin: 0 0 15px 0; }
        .sidebar ul li { margin-bottom: 8px; font-size: 0.9em; }
        .sidebar ul li i { margin-right: 8px; width: 15px; text-align: center; }
        .main-resume { padding: 15px; }
        .main-resume h3 { font-size: 1.2em; color: #333; border-bottom: 2px solid #007bff; display: inline-block; padding-bottom: 3px; margin-top: 20px; margin-bottom: 10px; }
        .main-resume h3:first-child { margin-top: 0; }
        .job, .school { margin-bottom: 15px; }
        .job h4, .school strong { font-size: 1.1em; margin-bottom: 3px; color: #222; }
        .job .job-location, .school span { display: block; font-size: 0.95em; color: #555; margin-bottom: 3px; }
        .job time, .school time { display: block; font-size: 0.9em; color: #777; margin-bottom: 5px; }
        .job ul { list-style: disc; padding-left: 20px; margin-top: 5px; }
        .job ul li { margin-bottom: 5px; font-size: 0.95em; }
        .skills-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .skills-grid ul { list-style: none; padding: 0; margin: 0; }
        .skills-grid ul li { font-size: 0.95em; margin-bottom: 3px; }
        .projects ul { list-style: none; padding: 0; margin: 0; }
        .projects ul li { margin-bottom: 5px; font-size: 0.95em; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }

        /* Minimal FontAwesome-like icons (actual icons won't render without FA CSS) */
        .fas, .fab { font-style: normal; /* Placeholder */ }
        .fa-envelope::before { content: "📧 "; }
        .fa-phone::before { content: "📞 "; }
        .fa-map-marker-alt::before { content: "📍 "; }
        .fa-globe::before { content: "🌐 "; }
        .fa-github::before { content: " "; } /* GitHub icon placeholder */
        .fa-linkedin::before { content: " "; } /* LinkedIn icon placeholder */

        /* Ensure full width for PDF */
        @page { margin: 0.5in; } /* Adjust margins as needed */
        body.resume-pdf { max-width: 100%; margin: 0; padding: 0; background-color: #fff; /* Ensure white background for PDF */ }
        .resume-grid { grid-template-columns: 220px 1fr; /* Adjust sidebar width if needed */ }
    </style>
</head>
<body class="resume-pdf">
    <div class="resume">
        <div class="resume-grid">
            <aside class="sidebar">
                <section>
                    <h3>Contact</h3>
                    <ul>
                        <?php foreach ($resumeData['contactInfo'] as $item): ?>
                            <li><i class="<?php echo htmlspecialchars($item['icon']); ?>"></i> <?php echo $item['text']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <section>
                    <h3>Honors and Awards</h3>
                    <?php foreach ($resumeData['honorsAndAwards'] as $honor): ?>
                    <ul>
                        <li><?php echo htmlspecialchars($honor['title']); ?> <em><?php echo htmlspecialchars($honor['date']); ?></em></li>
                    </ul>
                    <?php endforeach; ?>
                </section>
            </aside>

            <section class="main-resume">
                <h3>Experience</h3>
                <?php foreach ($resumeData['experience'] as $job): ?>
                    <article class="job">
                        <h4><?php echo htmlspecialchars($job['title']); ?></h4>
                        <span class="job-location"><?php echo htmlspecialchars($job['location']); ?></span>
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
                        <strong><?php echo htmlspecialchars($edu['institution']); ?></strong> — <span><?php echo htmlspecialchars($edu['degree']); ?></span><br>
                        <time><?php echo htmlspecialchars($edu['time']); ?></time>
                    </article>
                <?php endforeach; ?>

                <h3>Skills & Interests</h3>
                <div class="skills-grid">
                    <?php foreach ($resumeData['skillsAndInterests']['categories'] as $category): ?>
                        <ul>
                            <?php foreach ($category as $skill): ?>
                                <li><?php echo $skill; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                </div>

                <h3>Projects</h3>
                <ul class="projects">
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
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview)
// The 'false' argument here prevents the browser from displaying the PDF inline first
// and forces a download dialog.
$dompdf->stream("aaron-perkel-resume.pdf", ["Attachment" => true]);

exit;
?>
