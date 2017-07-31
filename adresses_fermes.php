
<?php
require_once('includes/db.php');
// var_dump($_GET);
require_once('includes/fonction.php');
$titre = "Formulaire";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
        <style>

        </style>
  </head>
  <body>
    <?php
    include('parties/menu.php');
    include('parties/carousel.php');
    var_dump($_POST);
    $testDuFormulaire = verifierFormulaire(['nom','id_adresse','id_dirigeant','surface']);

  if( $testDuFormulaire === false) {
    echo "c'est faux";
  }elseif($testDuFormulaire === true){
      echo '<p class="bg-info text-center"> Le formulaire est valide </p>';
      $sql="INSERT INTO fermes (nom,id_adresse,id_dirigeant,surface)
       VALUES ('".mysqli_real_escape_string($connection,$_POST['nom'])."',
         '".mysqli_real_escape_string($connection,$_POST['id_adresse'])."',
         '".mysqli_real_escape_string($connection,$_POST['id_dirigeant'])."',
         '".mysqli_real_escape_string($connection,$_POST['surface'])."')";


     var_dump($sql);
     if(mysqli_query($connection,$sql)){
        echo '<div class="alert alert-success text-center"> L\'enregistrement a bien été effectué </div>';
     }else{
        echo '<div class="alert alert-danger text-center"> L\'enregistrement n\'a pas été effectué ';
        echo mysqli_error($connection);
        echo "<pre>$sql</pre>";
        echo '</div>';
     }
       echo '<a href ="fermes.php"><button type="button" class="btn btn-info"> Retour à la liste </button> </a>';
       echo '<a href ="adresses_fermes.php"><button type="button" class="btn btn-primary"> Ajout d\'une autre adresse </button> </a>';

    }else{
        echo " Le formulaire n'a pas été envoyé";
    }
    if ($testDuFormulaire !== true):

    ?>
    <br>
    <a href="index.php"> <button type="button" class="btn btn-info"> Retour à la liste </button> </a>
    <br>
    <br>
    <form action="adresses_fermes.php" method="POST">
      Nom
      <div class="input-group">
      <span class="input-group-addon glyphicon glyphicon-user "></span>
      <input required name="nom" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
      </div>
      <br>
      <br>
      id_adresse
      <div class="input-group">
      <span class="input-group-addon glyphicon glyphicon-home"></span>
      <input required name="id_adresse" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
      </div>
      <br>
      <br>
      id_dirigeant
      <div class="input-group">
      <span class="input-group-addon glyphicon glyphicon-certificate"></span>
      <input required name="id_dirigeant" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
      </div>
      <br>
      <br>
      surface
      <div class="input-group">
      <span class="input-group-addon glyphicon glyphicon-retweet"></span>
      <input required name="surface" type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
      </div>
      <br>
      <br>
      <button type="submit" class="btn btn-default">Enregistrer</button>
    </form>
    <br>

</div>

<?php
endif;
include('parties/footer.php');
?>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
