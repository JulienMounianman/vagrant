<?php
require_once('includes/db.php');
// var_dump($_GET);
require_once('includes/fonction.php');
// var_dump($_GET);
$titre = "Liste des adresses";
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

    $champsTriables=['id','nom','cp','ville'];
    $ordreDeTri = testOrderby($champsTriables,'nom','ASC');
    $ordreChamp = $ordreDeTri[0];
    $ordreDirection = $ordreDeTri[1];



    $sql = "SELECT * FROM adresses ORDER BY $ordreChamp $ordreDirection";

    $resultats = mysqli_query($connection, $sql);


      ?>

    <table class="table table-condensed table-striped table-over table-responsive">
      <thead>
        <tr>
          <th>
                        id
                        <a href="adresses.php?order=id&amp;direction=ASC">+</a>
                        <a href="adresses.php?order=id&amp;direction=DESC">-</a>
                  </th>
          <th>
                        nom
                        <a href="adresses.php?order=nom&amp;direction=ASC">+</a>
                        <a href="adresses.php?order=nom&amp;direction=DESC">-</a>
                    </th>
          <th>
                      cp
                        <a href="adresses.php?order=cp&amp;direction=ASC">+</a>
                        <a href="adresses.php?order=cp&amp;direction=DESC">-</a>
                    </th>
          <th>
                        ville
                        <a href="adresses.php?order=ville&amp;direction=ASC">+</a>
                        <a href="adresses.php?order=ville&amp;direction=DESC">-</a>
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
          <tr class="<?php echo $nb<3 ?'success': 'warning'; ?>">
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['nom'] ?></td>
            <td><?= $ligne['cp'] ?></td>
            <td><?= $ligne['ville'] ?></td>
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
