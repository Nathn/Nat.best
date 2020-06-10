<?php
session_start ();
function loginForm() {
    echo '
   <div id="loginform">
   <form action="index.php" method="post" style="padding: 10% 0">
       <p style="font: 15px arial"><b>Entrez votre nom pour commencer à chatter :</b></p><br>
       <input type="text" name="name" id="name" maxlength="25" style="width: 20%; height: 25px; border-radius: 10px; margin-bottom: 15px; background: #2c2f33; font: 13px arial; color: white"/>
       <button type="submit" name="enter" id="enter" value="Entrer">Entrer</button>
   </form>
   </div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $fp = fopen ( "log.html", 'a' );
        fwrite ( $fp, "<div class='msgln'>".date("H:i")."<i><b> | " . $_SESSION ['name'] . "</b> a rejoint la session.</i><br></div>\n" );
        fclose ( $fp );
    } else {
        echo '<span class="error">Vous devez entrer un nom</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
   
    // Simple exit message
    $fp = fopen ( "log.html", 'a' );
    fwrite ( $fp, "<div class='msgln'>".date("H:i")."<i><b> | " . $_SESSION ['name'] . "</b> a quitté la session.</i><br></div>\n" );
    fclose ( $fp );
   
    session_destroy ();
    header ( "Location: index.php" ); // Redirect the user
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body {
    font: 13px arial;
    color: white;
    text-align: center;
    padding: 35px;
	background-color: #2c2f33;
}
 
form,p,span {
    margin: 0;
    padding: 0;
}
 
input {
    font: 12px arial;
}
 
a {
    color: #b9a3e3  
    text-decoration: none;
}
 
a:hover {
    text-decoration: underline;
}
 
#wrapper,#loginform {
    margin: 0 auto;
    padding-bottom: 25px;
    background: #40444B;
    width: 70%;
	height: 16cm;
    border: 2px solid #ffffff;
	border-radius: 15px;
}
 
#loginform {
    padding-top: 18px;
}
 
#loginform p {
    margin: 5px;
}
 
#chatbox {
    text-align: left;
    margin: 0 auto;
    margin-bottom: 20px;
    padding: 10px;
    background: #2c2f33;
    height: 70%;
    width: 85%;
    border: 2px solid #ffffff;
	border-radius: 15px;
    overflow: auto;
}

 
#usermsg {
    width: 395px;
    border: 1px solid #ACD8F0;
}
 
#submit {
    width: 60px;
}
 
.error {
    color: #ff0000;
}
 
#menu {
    padding: 12.5px 25px 25px 25px;
}
 
.welcome {
    float: left;
}
 
.logout {
    float: right;
}
 
.msgln {
    margin: 0 0 2px 0;
}

button {
  background: #2c2f33;
  border: 2px solid white;
  -moz-border-radius: 20px;
  -webkit-border-radius: 20px;
  -khtml-border-radius: 20px;
  border-radius: 20px;
  color: #ffffff;
  font: 13px Verdana;
  letter-spacing: 1px;
  display: block;
  letter-spacing: 1px;
  margin: auto;
  padding: 7px 25px;
  text-shadow: 0 1px 1px #000000;
  
}

a:visited {
  color: #b9a3e3
}

a:link {
  color: #b9a3e3
}
</style>
<title>Nat.best - Live Chat</title>
<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
</head>
<body>
    <?php
    if (! isset ( $_SESSION ['name'] )) {
        loginForm ();
    } else {
        ?>
<div id="wrapper">
        <div id="menu">
            <p class="welcome">
                Vous êtes connecté en tant que <b><?php echo $_SESSION['name']; ?></b>
            </p>
            <p class="logout">
                <a id="exit" href="#">Se déconnecter</a>
            </p>
            <div style="clear: both"></div>
        </div>
        <div id="chatbox"><?php
        if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
            $handle = fopen ( "log.html", "r" );
            $contents = fread ( $handle, filesize ( "log.html" ) );
            fclose ( $handle );
           
            echo $contents;
        }
        ?></div>
 
        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" maxlength="100" style="width: 75%; height: 25px; border-radius: 10px; margin-bottom: 15px; background: #2c2f33; font: 13px arial; color: white"/>
			<button name="submitmsg" type="submit" id="submitmsg" value="Envoyer" />Envoyer</button>
        </form>
    </div>
    <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
// jQuery Document
$(document).ready(function(){
});
 
//jQuery Document
$(document).ready(function(){
    //If user wants to end session
    $("#exit").click(function(){
        var exit = confirm("Êtes-vous sûr de vouloir vous déconnecter ?");
        if(exit==true){window.location = 'index.php?logout=true';}     
    });
});
 
//If user submits the form
$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});             
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});
 
function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html); //Insert chat log into the #chatbox div  
           
            //Auto-scroll          
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            }              
        },
    });
}
 
setInterval (loadLog, 300);
</script>
<?php
    }
    ?>
    <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
</script>
</body>
</html>