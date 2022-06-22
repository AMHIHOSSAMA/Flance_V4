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


// get id of post client


if (isset($_SESSION["id_projet"])) {

    
    // $sql = "SELECT * FROM publication INNER JOIN client ON publication.idclient = client.idclient "; 

    $id = $_GET['id'];
    $data = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM projets_profss INNER JOIN freelancers ON projets_profss.idFreelancer = freelancers.idFreelancer  WHERE  numProj = $id")
    );
   
    ?>
    
    <?php
}



?>
<body>
<style>
body {background-color: #fbfbffb2;}
</style>

<section  class="container">


<div class="container row">
    <div class="col-7" id="offerInfo">
    
        <h6><?php echo $data['nom']. " " .$data['prenom']; ?><span class="col d-flex justify-content-end">Crée le <?php echo $data['date'] ?></span></h6>
        <h3><?php echo $data['titre'] ;?></h3>
        <h5><?php echo $data['categorie'] ?></h5>
        <div class="row">
            <div class="col" id="cont_Btn">
            <button class="btn btn-primary"  type="submit"><a href="#"><i class="fa-solid fa-bolt"></i>&nbsp;Continuez </a> </button>
            </div>
           
            
            <div id="offerSocial" class="col d-flex justify-content-end" >
                        <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                        </a>
                     </div>
            </div>
            <img id="imageOffer_Client" class="d-flex justify-content-centre" src="<?php echo $data['imageProj'] ;?>">
            <p><?php echo $data['descriProj'] ;?></p>

        </div>
 
    <div  class="col-4" >
        <div id="clientInfo">
            <img src="<?php echo $data['image'] ;?>" alt="">           
            <div class="row">
                <div class="col-10">
                <h4><?php echo $data['nom']. " " .$data['prenom']; ?></h4>
                <h5><i class="fa-solid fa-envelope iconPrj"></i><?php echo $data['email'] ?></h6>
                <h5><i class="fa-solid fa-phone iconPrj"></i><?php echo $data['telnumber'] ?></h6>
                </div>
                <div class="col">
               <a href="profile.php"><i class="fa-solid fa-globe"></i></a> 
                </div>
            </div>
            <p>Kinetik développe une application d'entraînement pour rendre le CrossFit plus social et amusant. Dans un effort pour démarrer une entreprise sociale, les fondateurs ont découvert que leur passion pour le fitness et la technologie pouvaient être combinées pour aider des millions de personnes à améliorer leur vie à la fois physiquement et mentalement. L'entreprise en est encore à ses débuts de développement et est située à la fois à San Francisco 🇺🇸 et à Taipei 🇹🇼. ☝️Ce poste est affiché par une entreprise partenaire d'Uxcel, dans le cadre des services Uxcel Recruit.</p>
            <div class="d-flex justify-content-end">
                 <button id="lastBtn_Contact" class="btn btn-primary" type="submit"><a href="#">Contacter</a> </button>
            </div>
        </div>
        <div id="callTacti">
           <h5><?php echo $data['titre'] ;?></h5>
           <h6><?php echo $data['categorie'] ?></h5>
           <span class="">Crée le <?php echo $data['date'] ?></span>
           <div class="col">
            <button class="btn btn-primary" type="submit"><a href="#"><i class="fa-solid fa-bolt"></i>&nbsp;Continuez &nbsp;(<?php echo $data['prix'] ;?>)</a> </button>
            </div>
        </div>
    </div>
 

</div>
</section>
<section class="container" id="contacT_SEC">
        <div class="container row" id="forms_carts">
        <form id="formulaire">
            <div class="row">
                 <div class="col mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="col mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                </div>
            </div>
            <div class="row">
                
                <div class="col mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"> Votre message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="col">
                <button type="submit" class="btn btn-primary">Contacter</button>
                </div>
            </div>
        </form>

        </div>

</section>

</body>

<footer id="footer2">
        <?php
       include('footer.php');

       ?>


       </footer>  