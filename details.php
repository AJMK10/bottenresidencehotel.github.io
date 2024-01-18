<?php
require_once 'core/core.php';
include 'includes/header.php';
include 'includes/navigation.php';

if (isset($_GET['room'])) {
    $roomID = $_GET['room'];
    $select = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
    $s = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}'");

    if (isset($_POST['checkin'])) {
        if (!empty($_POST['fullname']) && !empty($_POST['in_date']) && !empty($_POST['out_date']) && !empty($_POST['phone']) && !empty($_POST['people'])) {

            $name = $_POST['fullname'];
            $checkin = $_POST['in_date'];
            $checkout = $_POST['out_date'];
            $phone = $_POST['phone'];
            $people = $_POST['people'];
            $email = $_POST['email'];
            @$address = $_POST['resident'];
            @$kin = $_POST['kin'];
            $r_number = mysqli_fetch_assoc($s);
            $r = $r_number['room_number'];
            $rooms = $_POST['rooms'];
            $current_date = date("Y-m-d");

            if ($checkin >= $current_date) {
                if ($checkout >= $checkin) {
                    $insert = "INSERT INTO `reservations` (`id`, `name`, `checkin`, `checkout`, `phone`, `people`, `email`, `room`) VALUES (NULL, '$name', '$checkin', '$checkout', '$phone', '$people', '$email', '$r')";
                    $_SESSION['room_success'] = 'Réservation effectuée avec succès !';
                    $save = $db->query($insert);
                    if ($save) {
                        $rs = $db->query("SELECT * FROM rooms WHERE id = '{$roomID}' ");
                        $rms = mysqli_fetch_assoc($rs);
                        $newRooms = $rms['rooms'] - $rooms;
                        if ($newRooms <= 0) {
                            $newRooms = 0;
                        }
                        $update = $db->query("UPDATE rooms SET `rooms`='$newRooms' WHERE id = '{$roomID}' ");
                        header("Location: details.php?room=$roomID");
                    }

                    echo "<br /> <br />";
                } else {
                    echo '<script>alert("Date de départ non valide fournie. Veuillez éviter d utiliser une date antérieure.");</script>';
                }

            } else {
                echo '<script>alert("Date darrivée fournie non valide. Veuillez éviter dutiliser une date antérieure.");</script>';
            }

        } else {
            echo '<script>alert("Tous les champs doivent etre remplir!");</script>';
        }
    }
} elseif (!(isset($_GET['room'])) || $_GET['room'] == '') {
    header("Location: rooms.php");
}
?>


     <!-- Room details -->
<div class="container">
    <?php while($room = mysqli_fetch_assoc($select)): ?>
       <div class="page-header">
         <h2 class="text-center"><?= $room['room_number']; ?></h2>
       </div>

       <div class="row">
         <div class="col-md-6">
           <img class="" style="width:100%; height:400px" src="<?= $room['photo']; ?>">
         </div>


         <!-- Right collumn for details -->
         <div class="col-md-6">
           <hr />
           <p><b>Type de chambre:</b> <?= $room['type']; ?></p>
           <p><b>prix de chambre (per night):</b> <?= $room['price']; ?></p>
           <p><b>Disponibilité de la chambre:</b> <?= $room['rooms']; ?></p>
           <p><b>Chambre détaillé:</b> <?= $room['details']; ?></p>
           <?=($room['rooms'] <= 0)?'<p class="text-danger">les réservations ont été clôturées pour cette salle !</p>':'';?>
         </div>
       </div>

       <!-- row for Booking form -->
       
          <div class="page-header">
            <h2 class="text-center">details de la reservations</h2>
          </div>


         <form action="details.php?room=<?=$roomID?>" method="POST">
              <div class="row">
                  
                    <div class="col">
                    <label class="form-control-label">Nom et Prenoms:</label>
                      <input type="text" class="form-control" name="fullname" placeholder="Nom et Prenoms" <?=($room['rooms'] <= 0)?'readonly':'';?>>
                    </div>

                    <div class="col">
                     <label class="form-control-label">Date d'arrivée:</label>
                      <input type="date" class="form-control" name="in_date" <?=($room['rooms'] <= 0)?'readonly':'';?>>
                    </div>
                  
                     <div class="col">
                      <label class="form-control-label">Date de départ:</label>
                      <input type="date" class="form-control" name="out_date" <?=($room['rooms'] <= 0)?'readonly':'';?>>
                    </div>

                    <div class="col">
                        <label class="form-control-label"> Numéro de téléphone:</label>
                      <input type="text" class="form-control" name="phone" placeholder="numeros téléphone..." <?=($room['rooms'] <= 0)?'readonly':'';?>>
                    </div>
                  
                     <div class="col">
                         <label class="form-control-label">Personnes:</label>
                      <input type="number" class="form-control" max="5" name="people" <?=($room['rooms'] <= 0)?'readonly':'';?>>
                    </div>

                    <div class="col">
                         <label class="form-control-label">#des chambres:</label>
                      <input type="number" class="form-control" name="rooms" <?=($room['rooms'] <= 0)?'readonly':'';?>>
                    </div>

                    <div class="col">
                        <label class="form-control-label">Adresse Email :</label>
                      <input type="email" class="form-control" name="email" placeholder="Adresse email" <?=($room['rooms'] <= 0)?'readonly':'';?>>
                    </div>
                  
                     <div class="col-md-12">
                        <label></label>
                        <input type="submit" class="form-control btn btn-primary" value="Faire une reservation" name="checkin" <?=($room['rooms'] <= 0)?'disabled':'';?>>
                    </div>
                  
                    

              </div>
         </form>
         <?php endwhile; ?>
        </div>
   
<br /><br /><br /><br />
