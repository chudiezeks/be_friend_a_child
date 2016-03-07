<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Login Successful</title>
</head>
<body>

    <?php
        /**
         * Created by PhpStorm.
         * User: Christophe
         * Date: 02/03/2016
         * Time: 20:52
         */





        //setting some variables with form values
        $firstname = $_POST["firstname"];
        $surname = $_POST["surname"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $name = $firstname . " " . $surname;

        //email subject
        $subject = "Befriend A Child - Survey Login";

        //email body in html
        $txt = "Dear $name,
                <br><br>
                An account has been set up in your name.
                <br>
                If you would like to fill out a survey concerning your experience with Befriend A Child,
                please follow
                <a href='http://befriendachildtestsurvey.azurewebsites.net/volunteerlogin.html'>this link</a>
                and login with:
                <br><br>
                Username: $email
                <br>
                Password: $password
                <br><br>
                You will be able to change your password once logged in.
                <br><br>
                King Regards,
                <br><br>
                The Befriend A Child Team";



        require_once 'swiftmailer/lib/swift_required.php';

        $transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
        ->setUsername('christophe.meyers.312@gmail.com')
        ->setPassword('AnnachengAddress');

        $mailer = Swift_Mailer::newInstance($transporter);

        $message = Swift_Message::newInstance('Befriend A Child Test Mail')
        ->setFrom(array('christophe.meyers.312@gmail.com' => 'Christophe Meyers'))
        ->setTo(array($email => $name))
        ->setBody($txt, "text/html");

        $result = $mailer->send($message);


        /*if($mailer->send($message) == 1){
        echo 'send ok';
        }
        else {
        echo 'send error';
        }

        echo function_exists('proc_open') ? "Yep, that will work" : "Sorry, that won't work";*/


        echo $txt;
    ?>

</body>
</html>