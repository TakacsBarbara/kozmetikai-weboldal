<?php  
    session_start();
    class Page {
      
        function displayContent($pageName) {
            include "../../Model/Admin/all_files.php";
            include "header.php";
            if (isset($_SESSION["username"])) {
                include "nav.php";
            }
            include $pageName;
            include "files.php";
            if (isset($_SESSION["username"])) {
                include "footer.php";
            }
        }

    }
