<?php
if (isset($_SESSION["userId"])) {
?>

  <div class="">
    <h1>Home Page</h1>
  </div>

  <a class="" href="./../../Resources/Session/User/logout.php">
    Kilépés
  </a>

<?php
} else {
  header("Location: ./userLogin.php?loginrequired=1");
}
?>