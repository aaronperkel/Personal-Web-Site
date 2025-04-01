<!-- top.php -->
<?php
ob_start();
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aaron Perkel - Personal Site</title>
    <link rel="icon" type="image/x" href="./public/images/favicon.ico">
    <meta name="author" content="Aaron Perkel">
    <meta name="description" content="Welcome to the personal site of Aaron Perkel. Find projects, information about me, as well as my resume. Moving to aaronperkel.com by 01/01/26.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/custom.css?version=<?php print time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/layout-tablet.css?version=<?php print time(); ?>" media="(max-width:900px)">
    <link rel="stylesheet" type="text/css" href="css/layout-phone.css?version=<?php print time(); ?>" media="(max-width:600px)">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <script src="./js/main.js"></script>
</head>
<?php

print '<body class="' . $pathParts['filename'] . '">';

include 'header.php';
include 'nav.php';
?>