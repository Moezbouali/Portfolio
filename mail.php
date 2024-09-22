<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclure le fichier autoloader de Composer
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Vérifier et récupérer les variables POST du formulaire
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') : 'Default Name';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : 'default@example.com';
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8') : 'No Subject';
    $body = isset($_POST['message']) ? htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8') : 'No Message';

    // Configuration du serveur SMTP de Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';        // Serveur SMTP de Gmail
    $mail->SMTPAuth   = true;                    // Activer l'authentification SMTP
    $mail->Username   = 'moezbouali74@gmail.com'; // Ton adresse Gmail
    $mail->Password   = 'elwk zyty epuw agie';    // Ton mot de passe d'application Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utilise STARTTLS
    $mail->Port       = 587;                     // Le port SMTP pour STARTTLS

    // Paramètres de l'expéditeur et du destinataire
    $mail->setFrom($email, $name);  // L'expéditeur dynamique (en utilisant les données du formulaire)
    $mail->addAddress('moezbouali74@gmail.com', 'Moez Bouali'); // Destinataire (ici toi-même)
    $mail->addReplyTo($email, $name);  // Ajoute un champ "Répondre à" avec l'adresse de l'expéditeur

    // Contenu de l'email
    $mail->isHTML(true); // Email au format HTML
    $mail->Subject = $subject;  // Le sujet de l'email (provenant du formulaire)
    $mail->Body    = $body;     // Corps du message en HTML (provenant du formulaire)
    $mail->AltBody = strip_tags($body); // Corps du message en texte brut pour les clients qui ne supportent pas HTML

    // Jeu de caractères pour les emails en UTF-8
    $mail->CharSet = 'UTF-8';

    // Envoi de l'email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}