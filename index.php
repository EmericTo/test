
<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
   
</head>
<!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>

<!-- Main section -->
<main>
  
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  
  <form class="new-member-form" method="post" action="index.php">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" />
    <button type="submit" name="envoyer">Envoyer</button>
  </form>
  <?php
         //Connection DB
         require 'database.php';
        $db = Database::connect();

        if (isset ($_POST['envoyer'])){ 
            $pseudo=$_POST['name'];
            $requete = "INSERT INTO argonautes VALUES(NULL, '" . $_POST['name'] . "')";
            $resultat = $db->query($requete);
            if ($resultat)
            echo '<p style="text-align: center;">Bienvenue à bord</p>';

            else
            echo "<p>Erreur</p>";
          
        }
        
        ?>

  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  

  <section class="member-list">
   
<?php

		$requete = "SELECT * FROM argonautes";
    $resultat = $db->query($requete);
    $memberlist = $resultat->fetchAll();
    foreach ($memberlist as $ligne){ 
      echo "<div class='member-item'>";
      echo $ligne ['name'];
      echo "</div>";
    }
    
    $db = Database::disconnect()
    
    ?>

  
    
  </section>
</main>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>

</html>