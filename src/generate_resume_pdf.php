<?php

// Suppress deprecation notices that can interfere with PDF generation
error_reporting(E_ALL & ~E_DEPRECATED);

// Include Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';
// Include the resume content - NOT NEEDED FOR THIS SIMPLE TEST
// require_once __DIR__ . '/data/resume_content.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// --- VERY SIMPLE HTML FOR TESTING ---
$html = "<!DOCTYPE html><html><head><title>Test PDF</title></head><body><h1>Hello World!</h1><p>This is a test PDF from Dompdf.</p></body></html>";
// --- END VERY SIMPLE HTML ---


// Configure Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
// For debugging font issues, you might enable font logging (ensure path is writable)
// $options->set('fontHeightRatio', 1.1);
// $options->set('debugPng', true);
// $options->set('debugLayout', true);
// $options->set('debugCss', true);
// $options->set('debugLayoutLines', true);
// $options->set('debugLayoutBlocks', true);
// $options->set('debugLayoutInline', true);
// $options->set('debugLayoutPaddingBox', true);
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

    $dompdf->stream("test_resume.pdf", ["Attachment" => true]);
    exit;

} catch (Exception $e) {
    if (ob_get_level()) {
        ob_end_clean(); // Clean buffer before error output
    }
    error_log("Error generating PDF: " . $e->getMessage() . "\n" . $e->getTraceAsString());
    header("HTTP/1.1 500 Internal Server Error");
    echo "<h1>Error generating PDF</h1>";
    echo "<p>An error occurred while generating the PDF. Please try again later.</p>";
    echo "<p>Error details (for debugging):<br><pre>" . htmlspecialchars($e->getMessage()) . "</pre></p>";
    exit;
}
?>
