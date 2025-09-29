<?php   
    require("./mailing/mailfunction.php");

    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $body = "<ul>
                <li><strong>Name:</strong> ".$name."</li>
                <li><strong>Phone:</strong> ".$phone."</li>
                <li><strong>Email:</strong> ".$email."</li>
                <li><strong>Message:</strong> ".$message."</li>
            </ul>";

    $receiver_email = "dejesuspaolo1@gmail.com"; // Your email as receiver
    $receiver_name = "Paolo De Jesus"; // Your name

    $status = mailfunction($receiver_email, $receiver_name, $body);

    if($status) {
        echo '<center><h1>Thanks! We will contact you soon.</h1></center>';
    } else {
        echo '<center><h1>Error sending message! Please try again.</h1></center>';
    }   
?>
