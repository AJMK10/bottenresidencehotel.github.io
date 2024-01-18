<?php
require_once 'core/core.php';
include 'includes/header.php';
include 'includes/navigation.php';
$sql = $db->query("SELECT * FROM rooms LIMIT 4");
$tourSQL = $db->query("SELECT * FROM tourism LIMIT 4");
?>


<!-- Header - set the background image for the header in the line below -->
<header class="py-5 bg-image-full" style="background-image: url('images/slide-2.jpg'); height:300px">

</header>

<marquee behavior="scroll" direction="left" width="100%" bgcolor="#EEEEEE">
    <h2><strong> BIENVENUE A BOTTEN RESIDENCE HOTEL</strong></h2>
</marquee><br>

<!-- Content section -->
<section class="py-5">
    <div class="container">
        <h1>Listes Chambre</h1>
        <hr />
        <div class="row">

            <?php while($room = mysqli_fetch_assoc($sql)): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <h4 class="text-center"><?=$room['room_number'];?></h4>
                <img src="<?=$room['photo'];?>" class="img-responsive" alt="room" width="100%" height="200px">
                <section class="text-justify">
                    <p>
                        <?=$room['details'];?>
                    </p>
                    <a href="details.php?room=<?= $room['id']; ?>" class="btn btn-block btn-primary">plus de Details</a>
                </section>
            </div>

            <?php endwhile; ?>
        </div>


</section>



<!-- Image Section - set the background image for the header in the line below -->
<section class="py-5 bg-image-full" style="background-image: url(images/slide-2.jpg);">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 200px;"></div>
</section>

<!-- Content section -->
<section class="py-5">
    <div class="container">
        <h1></h1>
        <div class="row">

            <?php while($tour = mysqli_fetch_assoc($tourSQL)): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <h4 class="text-center"><?=$tour['title'];?></h4>
                <img src="<?=$tour['photo'];?>" class="img-responsive" alt="room" width="100%" height="200px">
                <section class="text-justify">
                    <p>
                        <?=$tour['details'];?>
                    </p>
                    <a href="tour.php?tour=<?= $tour['id']; ?>" class="btn btn-block btn-primary">plus de Details</a>
                </section>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</section>

<section>

</section>

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .footer {
        background-color: #333;
        color: #fff;
        padding: 30px 0;
    }

    .footer-bottom {
        background-color: #222;
        padding: 10px 0;
        color: #fff;
    }

    .footer h5 {
        margin-bottom: 15px;
    }

    .footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer ul li {
        margin-bottom: 10px;
    }

    .footer ul li a {
        color: #fff;
        text-decoration: none;
    }
    </style>
</head>

<body>

    <!-- Votre contenu principal ici -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h5>Contactez-nous</h5>
                    <p>Email: contact@example.com</p>
                    <p>Téléphone 1: +225 0706060708</p>
                    <p>Téléphone 2: +225 0140383890 </p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h5>Suivez-nous</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="footer-bottom text-center">
        <p>&copy; 2024 BOTTEN RESIDENCE HOTEL . Tous droits réservés.</p>
    </div>

</body>

</html>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>