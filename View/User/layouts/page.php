<?php  
    include "mainHeader.php";
    session_start();

    class Page {

        private $title;

        function __construct($title) {
            $this->title = $title;
        }
        
        function setTitle($title) {
            $this->title = $title;
        }
    
        function getTitle() {
            return $this->title;
        }
      
        function displayContent($pageName) {

            $header = new MainHeader($this->title);
           
            include "../../Model/User/all_files.php";
            $header->displayHeader();
            include "nav.php";
            include $pageName;
            include "files.php";
            include "footer.php";
        }
    }
