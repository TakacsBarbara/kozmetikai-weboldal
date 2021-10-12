<?php session_start(); ?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b389db4779.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar sticky-top navbar-light bg-light navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="adminLogin.php">
                <img src="../../Resources/img/logo_navbar.png" alt="logo-image" width="300" class="d-inline-block align-text-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="mainServicesListed.php">Szolgáltatások</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Időpontfoglalás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vélemények jóváhagyása</a>
                    </li>

                </ul>
                <span></span>
                
                <button type="button" class="btn btn-info">
                    <a href="./../../Resources/Session/Admin/logout.php">Kilépés</a> 
                </button>
            </div>
        </div>
    </nav>
    <!-- <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Belépés</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Szolgáltatások</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="mainServicesListed.php">Szolgáltatások listázása</a></li>
                    <li><a class="dropdown-item" href="#">Új szolgáltatás létrehozása</a></li>
                </ul>
            </li>
        </ul> -->

    