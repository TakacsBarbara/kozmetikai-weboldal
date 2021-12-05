<?php  
    session_start();
    class Page {
      
        function displayContent($pageName) {
            include "../../Model/User/all_files.php";
            include "header.php";
            include "nav.php";
            include $pageName;
            include "files.php";
            include "footer.php";
        }
    }

?>