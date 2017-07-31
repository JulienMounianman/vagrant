<?php
require_once('includes/db.php');
// var_dump($_GET);
require_once('includes/fonction.php');

// var_dump($_GET);
$titre = "Liste des dirigeants";





    include('parties/menu.php');
    include('parties/carousel.php');

    $champsTriables=['id','nom','prenom','email','tel','id_adresse'];
    $ordreDeTri = testOrderby($champsTriables,'nom','ASC');
    $ordreChamp = $ordreDeTri[0];
    $ordreDirection = $ordreDeTri[1];
    $sql = "SELECT * FROM dirigeants ORDER BY $ordreChamp $ordreDirection";

    $resultats = mysqli_query($connection, $sql);


      ?>

    <table class="table table-condensed table-striped table-over table-responsive">
      <thead>
        <tr>
          <th>Actions </th>

          <th>
                        id
                        <a href="dirigeants.php?order=id&amp;direction=ASC">+</a>
                        <a href="dirigeants.php?order=id&amp;direction=DESC">-</a>
                  </th>
          <th>
                        nom
                        <a href="dirigeants.php?order=nom&amp;direction=ASC">+</a>
                        <a href="dirigeants.php?order=nom&amp;direction=DESC">-</a>
                    </th>
          <th>
                        prenom
                        <a href="dirigeants.php?order=prenom&amp;direction=ASC">+</a>
                        <a href="dirigeants.php?order=prenom&amp;direction=DESC">-</a>
                    </th>
          <th>
                      email
                        <a href="dirigeants.php?order=email&amp;direction=ASC">+</a>
                        <a href="dirigeants.php?order=email&amp;direction=DESC">-</a>
                    </th>
          <th>
                        tel
                        <a href="dirigeants.php?order=tel&amp;direction=ASC">+</a>
                        <a href="dirigeants.php?order=tel&amp;direction=DESC">-</a>
                    </th>
          <th>
                          id_adresse
                        <a href="dirigeants.php?order=id_adresse&amp;direction=ASC">+</a>
                        <a href="dirigeants.php?order=id_adresse&amp;direction=DESC">-</a>
                    </th>
        </tr>
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
            <td>
              <a href="dirigeants_delete.php?id=<?=$ligne['id']?> ">
                <span class="glyphicon glyphicon-trash" ></span>
              </a>
              <a href="dirigeant_edit.php?id=<?=$ligne['id']?>">
              <span class="glyphicon glyphicon-pencil" ></span>
            </a>
              </td>
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['nom'] ?></td>
            <td><?= $ligne['prenom'] ?></td>
            <td><?= $ligne['email'] ?></td>
            <td><?= $ligne['tel'] ?></td>
            <td><?= $ligne['id_adresse'] ?></td>
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
