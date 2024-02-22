<?php
ob_start();
session_start();
include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("images/body.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="" href="#"><img src="images/logo.jpg" width="25%" height="25%"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="log.php">Log</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link">About</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['logged_in'])) { ?>
                                <!-- Nav Item - User Information -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" style="margin-left:60%;" href="#"
                                            id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                            <?php

                                            $userID = $_SESSION['u_id'];
                                            $select = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
                                            $select->execute([$userID]);
                                            foreach ($select as $data) {
                                                ?>

                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                                    <?= $data['user_fname'] ?>
                                                    <?= $data['user_lname'] ?>
                                                </span>

                                                <?php
                                            }
                                            ?>

                                            <img class="img-profile rounded-circle" width="23%" height="23%"
                                                src="images/undraw_profile.svg">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                            <li><a class="dropdown-item" href="user.php?profile"><i
                                                        class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a>
                                            </li>
                                    </li>
                                    <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="user.php?change-password"><i
                                        class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Change Password</a>
                            </li>
                            <li><a class="dropdown-item" href="user.php?Delete-Account"><i
                                        class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Delete Account</a>
                            </li>
                            <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="process.php?logout"><i
                                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    <?php } else { ?>
                        <a href="login.php" class="nav-link">Login</a>
                    <?php } ?>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar end -->