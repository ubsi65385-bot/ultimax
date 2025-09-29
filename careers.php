<?php   
    require("./mailing/mailfunction.php");

    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $applyfor = $_POST["status"];
    $experience = $_POST["experience"];
    $otherdetails = $_POST["details"];

    $filename = $_FILES["fileToUpload"]["name"];
    $filetype = $_FILES["fileToUpload"]["type"];
    $filesize = $_FILES["fileToUpload"]["size"];
    $tempfile = $_FILES["fileToUpload"]["tmp_name"];

    // Set the path to the "tmp-uploads" folder
    $uploadDirectory = "tmp-uploads/";
    
    // Ensure the directory exists
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true); // Create folder if not exists
    }

    // Rename the file to prevent overwriting & ensure correct format
    $filenameWithDirectory = $uploadDirectory . time() . "_" . basename($filename);  

    $body = "<ul>
                <li><strong>Name:</strong> $name</li>
                <li><strong>Phone:</strong> $phone</li>
                <li><strong>Email:</strong> $email</li>
                <li><strong>Applying For:</strong> $applyfor</li>
                <li><strong>Experience:</strong> $experience years</li>
                <li><strong>Additional Details:</strong> $otherdetails</li>
                <li><strong>Resume (Attached Below):</strong></li>
            </ul>";

    $receiver_email = "hrd@ultimaxbuildingsolutions.com.ph"; // Your email as receiver
    $receiver_name = "Applicant"; // Your name

    if (move_uploaded_file($tempfile, $filenameWithDirectory)) {
        $status = mailfunction($receiver_email, $receiver_name, $body, $filenameWithDirectory);

        if ($status) {
            echo '<center><h1>Thanks! We will contact you soon.</h1></center>';
        } else {
            echo '<center><h1>Error sending message! Please try again.</h1></center>';
        }
    } else {
        echo "<center><h1>Error uploading file! Error Code: " . $_FILES["fileToUpload"]["error"] . "</h1></center>";
    }
?>
    