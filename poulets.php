<?php
require_once('includes/db.php');
// var_dump($_GET);
require_once('includes/fonction.php');
// var_dump($_GET);
$titre = "Liste des Poulets";
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >
  </head>
  <style>
  </style>
  <body>
    <?php
    include('parties/menu.php');
    include('parties/carousel.php');



    $champsTriables=['id','race','id_ferme'];
    $ordreDeTri = testOrderby($champsTriables,'id','ASC');
    $ordreChamp = $ordreDeTri[0];
    $ordreDirection = $ordreDeTri[1];



    $sql = "SELECT * FROM poulets ORDER BY $ordreChamp $ordreDirection";

    $resultats = mysqli_query($connection, $sql);


      ?>

    <table class="table table-condensed table-striped table-over table-responsive">
      <thead>
        <tr>
          <th>
                        id
                        <a href="poulets.php?order=id&amp;direction=ASC">+</a>
                        <a href="poulets.php?order=id&amp;direction=DESC">-</a>
                  </th>
          <th>
                        race
                        <a href="poulets.php?order=race&amp;direction=ASC">+</a>
                        <a href="poulets.php?order=race&amp;direction=DESC">-</a>
                    </th>
          <th>
                      id_ferme
                        <a href="poulets.php?order=id_ferme&amp;direction=ASC">+</a>
                        <a href="poulets.php?order=id_ferme&amp;direction=DESC">-</a>
                    </th>

      </thead>
      <tbody>
        <?php
        if(mysqli_num_rows($resultats) === 0):
          echo "Il n'y a pas d'enregistrements";
        else:
          // Affichage des lignes de résultat
          $nb=0;

          while($ligne = mysqli_fetch_assoc($resultats)):
            //var_dump($ligne);

         ?>
          <tr class="
          <?php
            echo $ligne['race']==='Bourbonnaise' ?'success':'';
            echo $ligne['race']==='Sebright' ?'danger':'';
            echo $ligne['race']==='Poule soie' ?'warning':'';
            ?>">
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['race'] ?></td>
            <td><?= $ligne['id_ferme'] ?></td>

          </tr>
          <?php
          $nb++;
          endwhile;
        endif;
        ?>
      </tbody>
    </table>
  </div>
    <?php
    include('parties/footer.php');
    ?>



  </body>
</html>
