<?php 
    session_start();
    $page='aide';
?>
<!DOCTYPE HTML>


<html>
	<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="stylepages.css" />
                <link rel="stylesheet" href="../structure/stylestructure.css" />
                <link rel="icon" type="images/png" href="../../images/favicone.png">
                <script type="text/javascript" src="../structure/ckeditor/ckeditor.js"></script> 
                <title>GchanG</title>
	</head>
        
        
        
<body>
    
<div id="page">
    
    <?php include ('../structure/header.php');?>
    
    <?php include ('../structure/nav.php');?>
    
    <?php include ('../structure/aside.php');?>
    
    <!--corps-->
    <article>
        
        <?php       

        
        
        include_once '../structure/SendMail/class.g5cmailer.php';
        if (isset($_POST['sub']) && isset($_POST['msg']))
        {
            if(isset($_SESSION['pseudo']) && isset($_SESSION['mail']))
            {
                $addr = $_SESSION['mail'];
                $pseudo = $_SESSION['pseudo'];
            }
            else 
            {
                $addr = "";
                $pseudo = "visteur";
            }
            mail_from($addr, $pseudo, $_POST['msg'], $_POST['sub']);
        }
        ?>  
        <p>
         <?php   
            include '../structure/connexion_bdd.php';
            $reponse = $bdd->query(' SELECT nom,contenu FROM admin WHERE nom="aide"');
            $donnees = $reponse->fetch();       
            echo $donnees['contenu'];
            $reponse->closeCursor();
         ?>
        </p>
        <form method="post">
            <label for="sub">subjet</label> : </br>
            <input type="text" name="sub"/></br>
            <label for="msg">message</label> : </br>
            <textarea cols="15" rows="10" type="text" name="msg" id="msg"></textarea>
            <script type="text/javascript"> 
                CKEDITOR.replace("msg");
            </script> 
            <input type="submit" class="go"/></br>
        </form>
        
        <!--
        <h1>test</h1>
        -->

    </article>


    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>