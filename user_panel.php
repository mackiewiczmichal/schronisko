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

<!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
    <span class="close">&times;</span>
<?php
    if(empty($adopcje)){
        echo 
        "
        <p>Nie masz jeszcze żadnych adopcji!</p>
        <a class='d-block' href=".SITE_URL."/adoption.php>Do adopcji</a></br>
    ";
    }
    foreach ($adopcje as $row){
        $date1 = date('Y-m-d');
        $date2 = $row['oplacone_do'];
        $dateTimestamp1 = strtotime($date1); 
        $dateTimestamp2 = strtotime($date2); 
        $data_wygasniecia = ($dateTimestamp2 - $dateTimestamp1) / (60*60*24);
        $isempty = true;
        if($data_wygasniecia < "7"){
            echo "<div class='alert alert-danger' role='alert'><strong>Adopcja: </strong>". $row['id']." status: Twoja adopcja wygaśnie za ".$data_wygasniecia." dni. Pamiętaj by opłacić swojego zwierzaka gdy obecna adopcja się zakończy.</div>";
            $isempty = false;
        }
        else if($data_wygasniecia < "0"){
            
            echo "<p><strong>Adopcja: </strong>". $row['id']." status: Twoja adopcja wygasła ".$data_wygasniecia." dni temu. Opłać teraz by zapewnić zwierzakowi opiekę. <button type='button' class='btn btn-danger'>Opłać teraz</button></p>";
        }
        else{
            echo "<div class='alert alert-success' role='alert'>
            Adopcja o numerze ". $row['id']." jest opłacona! Cieszymy się że wspierasz nasz w opiece nad zwierzakami.
          </div>";
        }
    }
?>
</div>

</div>
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
                <?php

                    if(empty($adopcje)){
                        echo 
                        "
                        <p>Nie masz jeszcze żadnych adopcji!</p>
                        <a class='d-block' href=".SITE_URL."/adoption.php>Do adopcji</a></br>
                        ";
                    }
                    foreach ($adopcje as $row){
                        echo "<p><strong>Adopcja: </strong>". $row['id']." status: ". $row['status']."  Opłacone do: ". $row['oplacone_do']."</p>";
                    }

                ?>
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