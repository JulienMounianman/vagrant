<?php

require_once('includes/db.php');
// var_dump($_GET);
require_once('includes/fonction.php');

// var_dump($_GET);
$titre = "supression d'un dirigeant";

    include('parties/menu.php');
    include('parties/carousel.php');



    if (isset($_GET['id']) && !empty ($_GET['id'])){
      echo 'un id est passé';
      $sql = 'SELECT id FROM dirigeants WHERE id = '
        .mysqli_real_escape_string($connection,$_GET['id']);
        $resultats=mysqli_query($connection,$sql);
        if(mysqli_num_rows($resultats) === 0){
          echo '<div class="alert alert-danger">'
          .'ce dirigeant n\'existe pas'
          .'<div>';
        }else {
            $sql ='DELETE FROM dirigeants WHERE id ='
            .mysqli_real_escape_string($connection,$_GET['id']);

            if(!mysqli_query($connection,$sql)){
              echo '<div class="alert alert-danger">'
              .'une erreur est survenue lors de la supression'
              .mysqli_error($connection)
              .'<div>';

            }else{
              echo '<div class="alert alert-success">'
              .'le dirigeant a été supprimé'
              .'<div>'
              .'<a href="dirigeants.php"><button type="button" class="btn btn-info"> Retour à la liste </button> </a>';

            }

            }
          }else {
            echo '<div class="alert alert-success">'
            .'vous n\'avez pas prcisé d\élément à supprimé'
            .'<div>';
          }
?>
contenu

<?php

include('parties/footer.php')
 ?>
