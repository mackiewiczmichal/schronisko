<?php
include "templates/header.php";
include "php/class/User.php";
include "php/class/DBConnection.php";
include "php/class/Adoption.php";

$user = new User();
if(!empty($_SESSION['id'])){
    $uid = $_SESSION['id'];

}
if ($user->getSession()===FALSE) {
   header("location:login.php");
}
if (isset($_GET['q'])) {
    $user->logout();
    header("location:login.php");
}
$user->setID($uid);
$userInfo = $user->getUserInfo();
$ad = new Adoption();
$ad->setIdUzytkownik($user->getId());
$adopcje = $ad->getUserAdoptions();
?>
      <div class="container-fluid hero-container-pages">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-light display-1">Witaj w panelu użytkownika</h1>
            </div>
        </div>
      </div>
    <div class="container pt-5">
    <div class="row">
        <div class="col-lg-10">
            <h2>Witaj <?php print $userInfo['imie'];?></h2>                 
        </div>
        <div class="col-lg-2">
            <a href="<?php print SITE_URL; ?>user_panel.php?q=logout" class="float-right btn btn-danger btn-sm">LOGOUT</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <a href="user_panel.php" class="btn btn-primary">Twoje adopcje</a>
            <a href="form_creator.php" class="btn btn-primary">Generuj formularz</a>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
            <div id="target">
                <div id="content">
                <form action="" method="post" name="reg" enctype="multipart/form-data">
            <div class="form-group">
                <label for="imie">Imie</label>
                <input type="text" id="imie" name="uimie" class="form-control" placeholder="Imię"></input>
            </div>
            <div class="form-group">
                <label for="imie">Nazwisko</label>
                <input type="text" id="nazwisko" name="unazwisko" class="form-control" placeholder="Nazwisko"></input>
            </div>
            <div class="form-group">
                <label for="imie">Data urodzenia</label>
                <input type="date" id="data_ur" name="udata" class="form-control" placeholder="Data urodzenia"></input>
            </div>
            <div class="form-group">
                <label for="imie">Adres email</label>
                <input type="email" id="email" name="uemail" class="form-control" placeholder="Adres email"></input>
            </div>
            <div class="form-group">
                <label for="imie">Numer telefonu</label>
                <input type="tel" id="telefon" name="utelefon" class="form-control" placeholder="Nr. telefonu" pattern="[0-9]{3}[0-9]{3}[0-9]{3}"></input>
            </div>
            <div class="form-group">
                <label for="imie">Imie zwierzaka</label>
                <input type="text" id="zwierzak" name="uimiezwierzaka" class="form-control"></input>
            </div>
            <div class="form-group">
                <label for="imie">Id adopcji wirtualnej</label>
                <input type="text" id="id_adopcji" name="uid" id="fileToUpload" class="form-control"></input>
            </div>
            </form>
                </div>
                <button id="cmd" class="float-right btn btn-primary">Generuj pdf</button>
            
            </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['add_animal'])){
        include 'add_animal.php';
    }
    ?>
    
<?php
    include "templates/footer.php";
?>