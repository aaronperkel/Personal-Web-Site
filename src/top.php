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
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/main.js"></script>

    <link rel="stylesheet" href="css/style.css" media="print">
</head>

<body class="<?= $pathParts['filename'] ?>">
    <?php include __DIR__ . '/header.php'; ?>
    <?php include __DIR__ . '/nav.php'; ?>
    <div id="popup" class="popup" onclick="closePopup(event)">
        <div class="popup-content" onclick="event.stopPropagation()">
            <span class="close" onclick="closePopup(event)">&times;</span>
            <img id="popup-img" class="popup-img">
            <div id="popup-text" class="popup-text"></div>
        </div>
    </div>