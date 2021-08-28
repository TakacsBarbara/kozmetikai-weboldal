<?php  
    
    class Page {
      
        function displayContent($pageName) {
            include "../../Model/Admin/all_files.php";
            include "header.php";
            include $pageName;
            include "footer.php";
        }

    }
?>

    
