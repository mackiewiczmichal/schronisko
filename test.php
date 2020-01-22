<?php
include "php/class/Adoption.php";
include "php/class/Payment.php";
include "php/class/Animal.php";
include "php/class/DBConnection.php";
include "php/class/ImgUpload.php";
include "php/class/User.php";
include "templates/header.php";
$usr = new User();

if($usr->getSession()){
    $usr->setID($_SESSION['id']);
    if (isset($_POST['submit'])) {
        extract($_POST);
        $adop = new Adoption();
        $adop->setIdZwierze($zid);
        $adop->setIdUzytkownik($usr->getId());
//var_dump($adop->getPathZdjecia());
        $adop->newAdoption();
//$adop->setId(6);


        $pay = new Payment();
        $pay->setIdAdopcji($adop->getId());
        $pay->setIdKlienta($usr->getId());
        $pay->setIleMiesiecy($ilosc_miesiecy);

        $zwierz = new Animal();
        $zwierz->setID($zid);
        $zwierz_data = $zwierz->getAnimalInfo();

        $pay->setKwota($pay->getIleMiesiecy() * $zwierz_data["koszta_miesiac"]);
        $ok = $pay->makePayment();
        //if($ok)header("location:user_panel.php");
    }
}
?>
<div class="container-fluid hero-container">
<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="text-light display-1">Dziękujemy za zaadoptowanie <?php echo $zwierz_data['imie'];?></h1>
    </div>
</div>
</div>

<?php 
    include "templates/footer.php";
?>