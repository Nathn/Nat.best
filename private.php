<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
        <title>Page privée</title>
    <link rel="stylesheet" type="text/css" href="/style.css">.
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
</head>
<body bgcolor="#2c2f33" >
<font face="Verdana" color="white">

    <div align="center">
        <?php
    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "lu23qd33&*")
    {
    
    ?>
        <h1>Bienvenue<br>
        sur la page privée</h1>  
        <font size="4"><b>
        <br><br>
        peut-être qu'un jour y'aura des trucs ici</font><br><br><br>
        <font size="3">en attendant voici un de mes speedruns sur une romhack de New Super Mario Bros DS :</font><br><br>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/l2I5Fzs1GGs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        <?php
    }
    else
    {
        echo '<p><font size="4"><b>Mot de passe incorrect :(</b></font></p>';
    }
    ?>
    </div>
        
    </body>
</html>