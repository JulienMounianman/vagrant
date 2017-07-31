
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des fermes</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css" >
        <style>

        </style>
        <script src="http://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  </head>
  <body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header col-md-2" id="nav">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Pouletto </a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse col-md-8 "  id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Fermes</a></li>
        <li><a href="dirigeants.php">Dirigeants</a></li>
        <li><a href="adresses.php">Adresses</a></li>
        <li><a href="poulets.php">Poulets</a></li>
        <li><a href="employes.php">Employes</a></li>


      </ul>
    </div>
    <!-- Single button -->
    <div class="btn-group col-md-2 ">
      <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Edition <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="adresse_new.php">Nouvelles Adresses</a></li>
        <li><a href="adresses_dirigeants.php"> Nouveaux dirigeants</a></li>
        <li><a href="adresses_fermes.php"> Nouvelles Adresses fermes</a></li>
        <li><a href="adresses_employes.php"> Nouveaux  employes</a></li>
        <li><a href="adresses_poulets.php"> Nouveaux  poulets</a></li>
      </ul>
    </div>
</nav>
<div class="container-fluid" id="firstdiv">
<h1><?=$titre?></h1>
