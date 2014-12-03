<?php 
    session_start();
    $page='mdpoublie';
?>
<!DOCTYPE HTML>
<html>
	<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="stylepages.css" />
                <link rel="stylesheet" href="../structure/stylestructure.css" />
                <link rel="icon" type="images/png" href="../../images/favicone.png">
                <title>GchanG - mot de passe oublie</title>
	</head>
        
<script type='text/javascript'>
function refreshCaptcha()
{
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>      
<body>

<div id="page">
    
    <?php include ('../structure/header.php');?>
    
    <?php include ('../structure/nav.php');?>
    
    <?php include ('../structure/aside.php');?>
    
    <!--corps-->
    <article>
        
    <form id="mdp_oublie" action = "reinitialiser_mdp.php" method="post" >
        <h1>Réinitialiser son mot de passe</h1>
        <table>
            <tr>
                <td>
                    Votre e-mail:
                </td>
                <td>
                    <input type="email" name="email" size = 25 class="taille_input" required><br />
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Le code de vérification:
                </td>
                <td>
                    <input id="6_letters_code" name="6_letters_code" type="text" class="taille_input" required>
                </td>
                <td>
                    <img src="../structure/captcha_code_file.php?rand=<?php echo rand();?>" id='captchaimg'>
                </td>
            </tr>
        </table>
        
            
            
            
            Vous ne pouvez pas voir l'image? cliquez <a href='javascript: refreshCaptcha();'>ici</a> pour mettre à jour<br />
            <input type="submit" value="Valider" class="go">
        </form>



    </article>


    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>