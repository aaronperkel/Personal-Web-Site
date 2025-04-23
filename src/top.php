<?php
ob_start();
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aaron Perkel – Personal Site</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Aaron Perkel">
    <meta name="description" content="Aaron Perkel | CS & Aviation Enthusiast">
    <link rel="icon" href="public/img/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c428e5511d.js" crossorigin="anonymous"></script>

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">
    <script defer src="js/main.js?<?php echo time(); ?>"></script>

    <link rel="stylesheet" href="css/style.css" media="print">

    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Aaron Perkel",
        "url": "https://aaronperkel.com",
        "sameAs": [
            "https://github.com/aaronperkel",
            "https://linkedin.com/in/aaronperkel",
            "https://youtube.com/@aaronperkel",
            "https://instagram.com/aaronperkel",
            "https://aperkel.w3.uvm.edu"
        ],
        "jobTitle": "Computer Science Student",
        "worksFor": {
            "@type": "Organization",
            "name": "University of Vermont"
        },
        "alumniOf": {
            "@type": "CollegeOrUniversity",
            "name": "University of Vermont"
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "81 Buell St #1",
            "addressLocality": "Burlington",
            "addressRegion": "VT",
            "postalCode": "05401",
            "addressCountry": "US"
        }
        }
    </script>
</head>

<body class="<?= $pathParts['filename'] ?>">
    <?php include __DIR__ . '/header.php'; ?>
    <?php include __DIR__ . '/nav.php'; ?>