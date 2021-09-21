<?php  
    
    class Page {
      
        function displayContent($pageName) {
            include "../../Model/Admin/all_files.php";
            include "header.php";
            include $pageName;
            include "files.php";
            include "footer.php";
        }

    }
?>

    
