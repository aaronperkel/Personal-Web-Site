<?php
ob_start();
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aaron Perkel – CS Grad and Network Technician</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="Aaron Coleman Perkel">
    <meta name="description" content="
        Computer science grad, network technician, and 
        avgeek blending tech and flight. Check 
        out my projects, resume, & more.
    ">
    <link rel="icon" href="public/img/favicon.ico">
    <link rel="canonical" href="https://aaronperkel.com/" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c428e5511d.js" crossorigin="anonymous"></script>

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="css/style.css?<?php echo time(); ?>">

    <!-- Project Card JS -->
    <?php if ($pathParts['filename'] === 'index') {
        print '<script defer src="js/main.js?<?php echo time(); ?>"></script>';
    }?>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Aaron Coleman Perkel",
        "url": "https://aaronperkel.com",
        "sameAs": [
            "https://github.com/aaronperkel",
            "https://linkedin.com/in/aaronperkel",
            "https://youtube.com/@aaronperkel",
            "https://instagram.com/aaronperkel",
            "https://aperkel.w3.uvm.edu"
        ],
        "jobTitle": "Network Technician",
        "worksFor": {
            "@type": "Organization",
            "name": "University of Vermont"
        },
        "alumniOf": [
            {
            "@type": "CollegeOrUniversity",
            "name": "University of Vermont"
            }
        ],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "81 Buell St #1",
            "addressLocality": "Burlington",
            "addressRegion": "VT",
            "postalCode": "05401",
            "addressCountry": "US"
        },
        "birthPlace": "Richmond, VA",
        "birthDate": "2003-11-11",
        "gender": "Male",
        "image": "https://aperkel.w3.uvm.edu/public/img/headshot.webp"
    }
    </script>
</head>

<body class="<?= $pathParts['filename'] ?>">
    <?php include __DIR__ . '/header.php'; ?>
    <?php include __DIR__ . '/nav.php'; ?>