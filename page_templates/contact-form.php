 <?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        // Check that data was sent to the mailer.
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $bccRecipient = "nwsd02@gmail.com";
        $to = "frankenskies@gmail.com";

        // Set the email subject.
        $subject = "Mailing List Subscriber: " . $name;

        // Build the email content.
        $email_content = "Name: $name\r\n";
        $email_content .= "Email: $email\r\n";

        // Build the email headers.
        $email_headers = "From: no-reply@frankenskiesthemovie.com\r\n";
        $email_headers .= "Bcc: ".$bccRecipient."\r\n";

        // Send the email.
        if (mail($to, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank you for signing up for the mailing list!";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>