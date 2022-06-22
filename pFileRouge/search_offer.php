<?php

session_start();

include('header.php');
include('datacon.php');
include('navbar.php');


$data = "";
if (isset($_SESSION['id_free']) && $_SESSION['id_free'] != "") {

    // $requet="SELECT * FROM client WHERE email='$email' AND passwords='$pass'";
    //   $result=mysqli_query($conn,$requet);

    $idFreelancer = $_SESSION["id_free"];
    $data = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM freelancers WHERE  idFreelancer = $idFreelancer")
    );
   
    ?>
    
    <?php
}
if (isset($_SESSION['id_cli']) && $_SESSION['id_cli'] != "") {
    $idClient = $_SESSION["id_cli"];
    $data = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * from client WHERE  idclient = $idClient")
    );
   
    ?>
    
    <?php
}



?>
<!-- la recherche dans la page avec PHP -->


<section id="hpsndSct2">
<form action="search_offer.php" class="" method="GET">
    <div class="container treefrms" id="offers_search">
        <div class="row" id="search_input">
            <div class="col-6" id="inputFrst">
            <input class="form-control form-control-lg" type="text"  value="<?php if (isset($_GET['selects'])) {
                        echo $_GET['selects'];
                    } ?>" placeholder="Rechercher un offre" name="selects">
            </div>
            <div class="col-5">
                <button class="btn Searchhmpbtn" type="button" id="Searchhmpbtn" name="search1">Recherche </button>
            </div>

        </div>

    </div>
    </form>
</section>

<?php
if (isset($_GET['search1'])) {
    $filter = $_GET['selects'];
    $sql = "SELECT * FROM publication INNER JOIN client ON publication.idclient = client.idclient WHERE categorie= '$filter'"; 
        if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){

                                $id = $row['id_post'];
                                echo"
                                <div class='container row' id='offers_Divs' >
                                    <div class='col-2'>
                                        <img src=". $row['imageOffer'] .">
                                    </div>
                                    <div class='col'>
                                        <h6>". $row['prenom'] . " ". $row['nom'] ."</h6>
                                        <h4>". $row['nomPost'] . "</h4>
                                        <p>". $row['description'] ."</p><a id='rightLink' href='detail_offres.php?id=$id' name='voirPlus'><i id='rightIcon' class='fa-solid fa-arrow-right-long d-flex justify-content-end'></i></a>
                                    </div>
                                </div>";
                                $_SESSION["id_post"] = $row["id_post"];
                            }}}
                            // if (isset($_POST['voirPlus'])){
                                
     }
?>
                            

   <footer id="footer2">
        <?php
       include('footer.php');

       ?>


       </footer>  