<?php

class MainHeader
{

    private $title;

    function __construct($title)
    {
        $this->title = $title;
    }


    function setTitle($title)
    {
        $this->title = $title;
    }

    function getTitle()
    {
        return $this->title;
    }

    function displayHeader()
    {

?>
        <!DOCTYPE html>
        <html lang="hu">

        <head>

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <meta name="description" content="Üdvözöllek a Lashes & More by Hegyi Judit weboldalán! Szeretettel várlak mosonmagyaróvári szalonomba, ha egy kellemes környezetben szeretnél szépülni, professzionális termékekkel és olyan kezelésekkel, melyek Számodra a legjobbak. Nézd meg a honlapon, hogy milyen szolgáltatásokat tudsz igénybe venni!">
            <meta name="keywords" content="kozmetika mosonmagyaróvár, kozmetika óvár, legjobb kozmetika, legjobb kozmetikus, megbízható kozmetika, megbízható kozmetikus, profi sminkes, profi kozmetikus, műszempilla, műszempilla építés, 1D szempilla, 2D szempilla, 3D szempilla, 4D szempilla, 5D szempilla, 1D, 2D, 3D, 4D, 5D, alkalmi smink, nappali smink, szemöldöklaminálás, szemöldök laminálás, szemöldök festés, szempilla lifting, szempilla festés, szempillahosszabbítás, szempilla hosszabbítás, sminktetoválás, szemöldöktetoválás, szemöldök tetoválás, arckezelések, arckezelés, nagykezelés, tinikezelés, arcmasszázs, dekoltázsmasszázs, alapkezelés, tápláló kezelés, mikrodermabráziós kezelés, tartós szemöldök, gyantázás, bajusz gyanta, bajuszgyanta, kargyanta, lábgyanta, áll gyanta, hónalj gyanta, blog, kozmetikai blog">
            <meta name="author" content="Takács Barbara Viktória">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> <?php echo $this->title ?></title>

            <link rel="icon" type="image/x-icon" href="../../Resources/img/favicon-lashes.png">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

            <link href="./../../Resources/css/User/styles.css" rel="stylesheet">
            <link rel="stylesheet" href="./../../Resources/css/jquery.confirm.css">
            <link rel="stylesheet" href="./../../Resources/css/User/BookingAppointment/bootstrap.min.css">
            <link rel="stylesheet" href="./../../Resources/css/User/BookingAppointment/styles.css">
            <link rel="stylesheet" href="./../../Resources/css/User/BookingAppointment/datepicker.css">
            <link rel="stylesheet" href="./../../Resources/css/User/BookingAppointment/buttons.css">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Poiret+One&display=swap" rel="stylesheet">

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/b389db4779.js" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

            <script src="./../../Resources/js/User/BookingAppointment/jquery.js"></script>
            <script src="./../../Resources/js/User/BookingAppointment/jquery-ui.min.js"></script>
            <script src="./../../Resources/js/User/BookingAppointment/datepicker-hu.js"></script>
        </head>

        <body>

    <?php
    }
}


    ?>