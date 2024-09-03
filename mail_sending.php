<?php
/*
Plugin Name: eMail Sender
Description: Used to send a mail using SendGrid.
Author: DD
*/


require_once plugin_dir_path(__FILE__) . 'php-file/sendgrid-php.php';
require_once plugin_dir_path(__FILE__) . 'php-file/lib/mail/Mail.php';

function email_sender_form() {
    
    if (isset($_POST['send_email'])) {
        $to = sanitize_email($_POST['to']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);
        echo "correct";

        $sendgrid_api_key = 'YSG.OgKacQ2CSDGqc4-vDy7ruA.AJLK8G9alkPgJw4lDkGK30ydZ0IHJjQrsR6tCdrc4eI';
        echo "correct 1";

        if (!class_exists('\SendGrid\Mail\Mail')) {
            echo '<div class="notice notice-error"><p>SendGrid Mail class not found. Please check if the SendGrid library is properly installed.</p></div>';
            return;
        }

        $sendgrid = new \SendGrid($sendgrid_api_key);

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("your-email@example.com", "Your Name");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $message);
        $email->addContent("text/html", "<strong>This is a test email using SendGrid.</strong>");
        echo "correct 2";

       
        try {
            $response = $sendgrid->send($email);
            if ($response->statusCode() == 202) {
                echo '<div class="notice notice-success"><p>Email sent successfully!</p></div>';
            } else {
                echo '<div class="notice notice-error"><p>Failed to send the email. Error: ' . $response->body() . '</p></div>';
            }
        } catch (Exception $e) {
            echo '<div class="notice notice-error"><p>Failed to send the email. Exception: ' . $e->getMessage() . '</p></div>';
        }
    }

    // Display the form
    echo '
    <form method="post" action="">
        <p>
            <label for="to">To:</label>
            <input type="email" name="to" required />
        </p>
        <p>
            <label for="subject">Subject:</label>
            <input type="text" name="subject" required />
        </p>
        <p>
            <label for="message">Message:</label>
            <textarea name="message" required></textarea>
        </p>
        <p>
            <input type="submit" name="send_email" value="Send Email" />
        </p>
    </form>';
}


function sender_menu() {
    add_menu_page(
        'Simple Email Sender',      
        'Email Sender',             
        'manage_options',           
        'simple-email-sender',      
        'email_sender_form'  
    );
}
add_action('admin_menu', 'sender_menu');
?>
