<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aaron Perkel - Personal Site</title>
    <meta name="author" content="Aaron Perkel">
    <meta name="description"
        content="Welcome to the personal site of Aaron Perkel. Find projects, information about me, as well as my resume. Moving to aaronperkel.com by 01/01/26.">

    <meta name="viewport" content="width=device-width, 
        initial-scale=1.0">

    <link href="css/custom.css?version=<?php print time(); ?>" rel="stylesheet" type="text/css">

    <link href="css/layout-tablet.css?version=<?php print time(); ?>" media="(max-width:900px)" rel="stylesheet"
        type="text/css">

    <link href="css/layout-phone.css?version=<?php print time(); ?>" media="(max-width:600px)" rel="stylesheet"
        type="text/css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="16x16" href="img/apple-touch-icon.png">
    <link rel="icon" href="img/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<?php

print '<body class="' . $pathParts['filename'] . '">';

include 'header.php';
include 'nav.php';
?>