<?php  
    
    class Page {
      
        function displayContent($pageName) {
            include "../../Model/Admin/all_files.php";
            include "header.php";
            include $pageName;
<<<<<<< HEAD
=======
            include "files.php";
>>>>>>> 1421ef9d8d53813974c95a3981df67f0b31d2436
            include "footer.php";
        }

    }
?>

    
