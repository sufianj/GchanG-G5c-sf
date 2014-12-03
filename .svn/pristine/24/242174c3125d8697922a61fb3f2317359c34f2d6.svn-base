<?php
function mail_to($addr, $pseudo, $msg, $sub) {
    
	require_once("class.phpmailer.php");
	require_once("class.smtp.php");
	$mail = new PHPMailer();
	$mail->CharSet = "UTF-8";
	$mail->IsSMTP();
        //$mail->IsHTML(true);
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
        //$mail->SMTPDebug  = 1; 
        
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = 'gchang.service@gmail.com';
	$mail->Password = 'BonjourG5c';
	$mail->SetFrom('gchang.service@gmail.com', 'G5c');
	$mail->AddReplyTo('gchang.service@gmail.com', 'G5c');
	$mail->Subject = $sub;
	$mail->AltBody = $msg;
        $mail->addEmbeddedImage('logo.png', 'logo', 'logo.png');
    	$body = '<body><img src="cid:logo"/>'.
                "<p>Chèr(e) $pseudo: </p>"."<p>$msg</p>";
        
     /* date_default_timezone_set('Europe/Paris');
        $current_date = date("H:i:s d/n/Y ");*/
        
        $body = $body."<br /><br />Cordialement<br /> Service G5c <br /></body>";
	$mail->MsgHTML($body);
	$mail->AddAddress($addr, $pseudo);
        
	if (!$mail->Send())
	{
		$info = "erreur!!".$mail->ErrorInfo;
	}
	else
	{
		$info = "mot de passe envoyé!";
        }
        echo '<script language="javascript">window.confirm("'.$info.'");</script>';
    }
    
    //on va envoyer le msg a gchang.aide@gmail.com (mdp:BonjourG5c)
    //de gchang.service@gmail.com
    //mais on peut repondre les users connectes directement
    function mail_from($addr, $pseudo, $msg, $sub) {
    
	require_once("class.phpmailer.php");
	require_once("class.smtp.php");
	$mail = new PHPMailer();
	$mail->CharSet = "UTF-8";
	$mail->IsSMTP();
        //$mail->IsHTML(true);
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
        //$mail->SMTPDebug  = 1; 
        
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = 'gchang.service@gmail.com';
	$mail->Password = 'BonjourG5c';
	$mail->SetFrom('gchang.service@gmail.com',  $pseudo);
        
        if ($addr != "" && $pseudo != "visiteur")
        {    
            $mail->AddReplyTo($addr, $pseudo);
            $sub = $sub.'[repondre directement]';
        }
	$mail->Subject = $sub;
	$mail->AltBody = $msg;
	$mail->MsgHTML($msg);
	$mail->AddAddress('gchang.aide@gmail.com', 'aide G5c');
        
	if (!$mail->Send())
	{
		$info = "erreur!!".$mail->ErrorInfo;
	}
	else
	{
		$info = "msg envoyé!";
        }
        echo '<script language="javascript">window.confirm("'.$info.'");</script>';
    }
?>