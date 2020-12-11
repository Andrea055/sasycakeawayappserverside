<?php 

//filtri anti-spam
session_start();
if ($_POST['captcha'] != $_SESSION['captcha']) {
    echo '<script type="text/javascript">alert("Captcha errato");window.history.go(-1);</script>';
}
else if($_POST['fred'] != "") {
    echo('<p style="color: #8B2323; font-size: 16px; font-weight: bold;">Forse stai usando un browser testuale, oppure sei uno spammer. Questo non puoi inviarlo.<br>You may be using a text-only browser or you are a spambot. This has not been submitted</p>');    
}

//impostazioni email
else {
    if(isset($_POST['name'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $remail = $_POST['remail'];;
        $formmessage = ($_POST['message']);
        $agree = $_POST['agree'];
        $emailmessage = "Hai ricevuto una richiesta dal tuo modulo di contatto.

Name: $name
Email: $email
Confirm email: $remail
Message: $formmessage
Trattamento dati: $agree
        ";    

        $to = "andrecanale05@libero.it";   //cambia questo indirizzo con il tuo
        $subject = "Paste di meliga";  //oggetto email
        $headers = "From: $email";
        $confirm = "./thankyou.html";  //collegamento al file di conferma


            if(isset($name)) {
                mail($to,$subject,$emailmessage,$headers);
                echo "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=".$confirm."\">";
            }
            
}

}

?>