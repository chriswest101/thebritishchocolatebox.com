<?php

/**
 * @author Chris West
 * @copyright 2015
 */
 

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Oops! There was a problem with your<br/> submission. Please try again.";
            exit;
        }

        // Our email address.
        $recipient = "contact@thebritishchocolatebox.com";

        // Set subject
        $subject = "New contact from $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            echo "Thank You! Your message has been sent.";
        } else {
            echo "Oops! Something went wrong and<br/> we couldn't send your message.";
        }

    } else {
        echo "There was a problem with your<br/> submission, please try again.";
    }





?>