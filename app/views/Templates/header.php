<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tour Travel Agent | <?= $data['title']; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/signin.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/dashboard.css">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="favicon.ico">
	<link href="/img/logo_small.png" rel="shortcut icon">
    <!-- <style>
        body {
            background-image: url('img/BG1.jpeg');
            background-attachment: fixed;
            background-size: cover;
        }
    </style> -->
</head>

<body>

    <?php require_once "../app/views/templates/navbar.php"; ?>

    <div class="container mb-5 min-vh-100">