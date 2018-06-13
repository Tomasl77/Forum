<?php
session_start();
include_once('../includes/includes.php');
include ('../includes/navbar.php');

$req = $DB->query("SELECT * FROM f_categories WHERE id = 2");
$req = $req->fetchAll();
$req2 = $DB->query("SELECT sujet, contenu, date_creation, id_user, id_topic FROM f_topics
    WHERE id_cat = 2 ORDER BY date_creation DESC");
$req2 = $req2->fetchAll();

foreach($req as $r){};

if (!isset($_SESSION['id'])){
        header('Location: ../index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cuisine</title>
	<link rel="stylesheet" href="../index.css">
</head>
<body id="restauimage">
	<div class="en-teteacceuil">
	    <h1 class=""><?= $r['nom']?> </h1>      	
	      	<p>Bonjour <?php 
	       
	    	if(!isset($_SESSION['id'])){
		       echo "vous n'êtes pas connecté !";
	    	}else{
		    	echo $_SESSION['pseudo'];
	       	
	       	}
	       	?>
		<br>
	       	Nous sommes le <?php $jour = date("d-m-Y");
				echo $jour; ?> 
	    </p>
    </div> 
	<div class="container">
         <a id="ahref" href="accueil.php">Accueil</a> > Catégorie : Cuisine
            <div class="row">   

			<div class="table-responsive" style="margin-top: 0px">
                <table class="table table-striped">
                    <tr>
                        <th id="tabcat">Sujet</th>
                        <th id="tabmess">Contenu</th>
                        
                    </tr>
               <?php
                    foreach($req2 as $r2){ 
                    ?>  
                        <tr>
                            <td>
                                
                                <a id="ahref" href="afficher_topic.php?id_topic=<?php echo $r2['id_topic']; ?>&contenu=<?php echo $r2['contenu']; ?>"><?= $r2['sujet'] ?><?= $r2['id_topic'] ?></a>
                                 
                            </td>
                                <td>
                                   Par : <?= $r2['id_user'] ?> <br> le <?= $r2['date_creation'] ?>
                                </td>
                           
                        </tr>   
                    <?php
                    
                    }
                ?>
                </table>  
            </div>
</body>
</html>