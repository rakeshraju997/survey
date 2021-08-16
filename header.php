<!doctype html>
<html lang="en">
<?php
error_reporting(0);
$site_name="http://localhost/img";
session_start();
$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
if (!isset($_SESSION['user_id']) && $page != 'index' && $page != 'user_page' && $page != 'user-view' && $page != 'user-list' && $page != 'question-view' && $page != 'question-list') {
    header('Location: user_page.php');
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.7/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $page; ?></title>
    <style>
        body {
            -webkit-user-select: none;
            -moz-user-select: -moz-none;
            -ms-user-select: none;
            user-select: none;
        }

        .grid {
            display: none;
        }
    </style>
</head>

<body>