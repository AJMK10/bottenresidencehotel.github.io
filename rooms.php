<?php
require_once 'core/core.php';
include 'includes/header.php';
include 'includes/navigation.php';

$sql = $db->query("SELECT * FROM rooms");

?>

<header class="py-5 bg-image-full" style="background-image: url('images/slide-2.jpg'); height:300px">
      
      </header>
     <!--END NAV SECTION -->

    <div class="container"><br />
      <div class="row">

    <?php while($room = mysqli_fetch_assoc($sql)): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <h4 class="text-center"><?= $room['room_number']; ?></h4>
          <img src="<?= $room['photo']; ?>" class="img-responsive" alt="room" width="100%" height="200px">
          <section class="text-justify">
            <p>
              <?= $room['details']; ?>
            </p>
            <a href="details.php?room=<?= $room['id']; ?>" class="btn btn-block btn-primary">Plus Details</a>
          </section>
        </div>
<?php endwhile; ?>

      </div>

    </div>
    <div>

    <br>
    <br><br>
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
</div>