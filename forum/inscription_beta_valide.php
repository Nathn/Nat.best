<?php
/* Page: contact.php */
$VotreAdresseMail="tranchant.nathan@gmail.com";//mettez ici votre adresse mail
if(isset($_POST['envoyer'])) { // si le bouton "Envoyer" est appuyé
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['mail'])) {
        $Fin = "ERREUR : Le champ mail est vide";
		
    } else {
        //on vérifie que l'adresse est correcte
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
            $Fin = "ERREUR : L'adresse e-mail est incorrecte";
			
        }else{
            //on vérifie que le champ sujet est correctement rempli
            if(empty($_POST['pays'])) {
                $Fin = "ERREUR : Le champ sujet est vide";
				
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['prenom'])) {
                    $Fin = "ERREUR : Le champ message est vide";
					
                }else{
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=iso-8859-1\r\n";
                    $Entetes .= "From: Nat.best <".$_POST['mail'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: Nat.best <".$_POST['mail'].">\r\n";
                    //on sécurise les champs
                    $Mail=htmlentities($_POST['mail'],ENT_QUOTES,"ISO-8859-1"); //ENT_QUOTES Convertit les guillemets doubles et les guillemets simples, en entités HTML, ISO-8859-1 est la norme pour les langues occidentales
                    $Sujet= "Nouvelle demande d'inscription a la beta du forum";
                    $Message= "Nom : ".htmlentities($_POST['nom'],ENT_QUOTES,"ISO-8859-1");
					$Message .= "    Prenom : ".htmlentities($_POST['prenom'],ENT_QUOTES,"ISO-8859-1")."   Pays : ".htmlentities($_POST['pays'],ENT_QUOTES,"ISO-8859-1")."    Email : ".htmlentities($_POST['mail'],ENT_QUOTES,"ISO-8859-1");;
                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,utf8_encode($Sujet),nl2br($Message),$Entetes)) { //la fonction nl2br permet de conserver les sauts de ligne et la fonction urf8_encore de conserver les accents dans le titre
                        $Fin = "Le mail a été envoyé avec succès !";
						
                    } else {
                        $Fin = "ERREUR : Une erreur est survenue, le mail n'a pas été envoyé";
						
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <title>Inscription</title>
    
    
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    
</head>
<body>


    
            <div id="Clong">
			<br>
			<br>
			<br>
			<br>
			<br>
			<h1><?php echo $Fin ?></h1><br><br><br><br><br><br><br><br>
			
			<button><a href="inscription_beta.php">Retourner sur la page précédente</a></button>
                
                
            </div>
			
</body>
</html>
