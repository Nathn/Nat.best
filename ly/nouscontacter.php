<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nous contacter - Lose Yourself</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="BodyContent">

    <div class="BorderBorder"><div class="BorderBL"><div></div></div><div class="BorderBR"><div></div></div><div class="BorderTL"></div><div class="BorderTR"><div></div></div><div class="BorderT"></div><div class="BorderR"><div></div></div><div class="BorderB"><div></div></div><div class="BorderL"></div><div class="BorderC"></div><div class="Border">

        <div class="Menu">
            <ul><li><a href="index.html" class="MenuButton"><span>Acceuil</span></a></li> <li><a href="page1.html"  class="MenuButton"><span>Catégories</span></a></li> <li><a href="about.html" class="MenuButton"><span>A propos</span></a></li></ul>
        </div><div class="Header">
          <div class="HeaderTitle">
            <h1><a href="#">Lose Yourself</a></h1>
            <h2>Nous contacter</h2>
          </div>
        </div><br><div class="Columns"><div class="Column1">


        <div class="BlockBorder"><div class="BlockBL"><div></div></div><div class="BlockBR"><div></div></div><div class="BlockTL"></div><div class="BlockTR"><div></div></div><div class="BlockT"></div><div class="BlockR"><div></div></div><div class="BlockB"><div></div></div><div class="BlockL"></div><div class="BlockC"></div><div class="Block">

            <span class="BlockHeader"><span>Liens utiles</span></span>
            <div class="BlockContentBorder">

                <ul>
                    <li><a href="https://fr.wikipedia.org/wiki/Party_Rock_Anthem">Wikipédia de la chanson</a></li>
                    <li><a href="https://fr.wikipedia.org/wiki/EMINEM">Wikipédia de EMINEM</a></li>
					<li><a href="https://fr.wikipedia.org/wiki/Sorry_for_Party_Rocking">Wikipédia de l'album</a></li>
                    <li><a href="https://genius.com/EMINEM-party-rock-anthem-lyrics">Paroles (Genius)</a></li>
                    <li><a href="Party_Rock_Anthem.mp3" download="Party_Rock_Anthem">Télécharger le fichier MP3</a></li>
                </ul>

            </div>

        </div></div><br><script language="javascript" type="text/javascript">

function validation_avt_envoi()
{
	var lancer="oui";
	
	if(document.getElementById("msg_mail").value=="")
	{
		alert("Vous devez saisir votre mail");
		lancer="non";
	}
	else if(document.getElementById("msg_mail").value.indexOf("@")==-1 || document.getElementById("msg_mail").value.indexOf(".")==-1)
	{
		alert("Votre mail ne semble pas correct, corrigez-le");
		lancer="non";
	}	
	else if(document.getElementById("msg_sujet").value=="")
	{
		alert("Vous devez entrer le sujet de votre message");
		lancer="non";
	}	
	else if((document.getElementById("msg_contenu").value=="" || document.getElementById("msg_contenu").value.length<10))
	{
		alert("Vous devez renseigner le contenu du message");
		lancer="non";
	}
	else if(document.getElementById("msg_code").value=="")
	{
		alert("Veuillez saisir le code anti-spam");
		lancer="non";	
	}
	else if(document.getElementById("msg_code").value.toLowerCase()!=document.getElementById("mem_code").value.toLowerCase())
	{
		alert("Le code anti-spam est incorrect");
		lancer="non";	
	}	
	
	if(lancer=="oui")
		document.getElementById("contact").submit();
}

</script>	
		
		</div><div class="MainColumn">
        <div class="ArticleBorder"><div class="ArticleBL"><div></div></div><div class="ArticleBR"><div></div></div><div class="ArticleTL"></div><div class="ArticleTR"><div></div></div><div class="ArticleT"></div><div class="ArticleR"><div></div></div><div class="ArticleB"><div></div></div><div class="ArticleL"></div><div class="ArticleC"></div><div class="Article">

        <h4>Par e-mail : <ul><li>nathan@tranchant.fr</li><li>nathan@nat.best</li></ul><br>
		...ou directement ici :</h4> 
		<div id='grille'>
<form id='contact' name='contact' method='post' action='nouscontacter.php'>
<div class='div_txt_form'>
Votre Mail :
</div>
<div class='div_input_form'>
<input type='text' name='msg_mail' id='msg_mail' maxlength='70' />
</div>
<div class='div_txt_form'>
Sujet :
</div>
<div class='div_input_form'>
<input type='text' name='msg_sujet' id='msg_sujet' maxlength='70' />
</div>
<div class='div_msg'>
<br /><strong>Votre message :<strong><br />
<textarea id='msg_contenu' name='msg_contenu' cols='20' rows='5' class='zone_msg'></textarea>
</div>
<div class='div_txt_form'>
&nbsp;
</div>
<div class='div_input_form'>
<input type='button' style='text-align:center;' name='msg_envoyer' id='msg_envoyer' value='Envoyer le message' onclick='validation_avt_envoi();' />
</div>
</form>
</div>
		
        </div></div>
        
        </div><br></div>
        <div class="Footer">
         <a href="nouscontacter.html">Nous contacter</a>
        </div>                

    </div></div>
    </div>
</body>
</html>