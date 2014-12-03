<?php 
    session_start();
    $page='forumadmin';
?>
<!DOCTYPE HTML>
<html>
	<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" href="stylepages.css" />
                <link rel="stylesheet" href="../structure/stylestructure.css" />
                <link rel="stylesheet" href="../forum/styleforum.css" />
                <link rel="icon" type="images/png" href="../../images/favicone.png">
                <title>GchanG</title>
	</head>
        
        
<body>
    
<div id="page">
    
    <?php include ('../structure/header.php');?>
    
    <?php include ('../structure/nav.php');?>
    
    <?php include ('../structure/aside.php');?>
    
    <!--corps-->
    <article>

   
       <?php include ('../forum/contenuforum.php');?>
 


    </article>


    
 
    <?php include ('../structure/footer.php');?> 
</div>

</body>
</html>