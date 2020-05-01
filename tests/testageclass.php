<!DOCTYPE html>
<head>
    <meta charset='utf-8' />
    <title>Quel âge avez-vous ?</title>
    
    
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>    
</head>
<?php function age($date) { 
         $age = date('Y') - $date; 
        if (date('md') < date('md', strtotime($date))) { 
            return $age - 1; 
        } 
        return $age; 
    } ?>
<h1><br><br><br><br><br>Vous avez <?php echo age($_POST['year'].'-'.$_POST['month'].'-'.$_POST['day']) ?> ans ! Félicitations !</h1><br><br>
<button class="button" onclick="window.location.href='/index.php'">Retour à l'acceuil</button>
</body>
</html>