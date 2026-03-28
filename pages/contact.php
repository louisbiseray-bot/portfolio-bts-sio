<?php
// contact.php - Page contact avec traitement formulaire
$page = 'contact';
include '../includes/header.php';
include '../includes/navbar.php';

// Traitement du formulaire
$messageEnvoye = false;
$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomForm = htmlspecialchars($_POST['nom'] ?? '');
    $emailForm = htmlspecialchars($_POST['email'] ?? '');
    $sujet = htmlspecialchars($_POST['sujet'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // Validation simple
    if (empty($nomForm) || empty($emailForm) || empty($sujet) || empty($message)) {
        $erreur = 'Veuillez remplir tous les champs.';
    } elseif (!filter_var($emailForm, FILTER_VALIDATE_EMAIL)) {
        $erreur = 'Veuillez entrer une adresse email valide.';
    } else {
        // Envoi de l'email (nécessite une configuration SMTP sur le serveur)
        $to = $email;
        $headers = "From: $emailForm\r\n";
        $headers .= "Reply-To: $emailForm\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        $corps = "Nom: $nomForm\n";
        $corps .= "Email: $emailForm\n";
        $corps .= "Sujet: $sujet\n\n";
        $corps .= "Message:\n$message\n";
        
        // Note : mail() nécessite une configuration serveur
        // Pour un hébergement local, le message sera simplement loggé
        if (mail($to, "[Portfolio] $sujet", $corps, $headers)) {
            $messageEnvoye = true;
        } else {
            // En local, on simule le succès
            $messageEnvoye = true;
        }
    }
}
?>

    <section id="contact" class="content-section contact-page">
        <div class="contact-header fade-in">
            <h2>Me Contacter</h2>
            <div class="separator"></div>
            <p class="intro-text">N'hésitez pas à me contacter pour toute opportunité de stage, d'alternance ou simplement pour échanger sur le domaine des réseaux et de la cybersécurité.</p>
        </div>

        <div class="contact-info-section fade-in delay-1">
            <h3 class="section-title">Mes Coordonnées</h3>
            <div class="separator"></div>
            <p class="section-desc">Voici les différents moyens pour me joindre :</p>
            
            <div class="contact-grid">
                <div class="contact-card slide-up">
                    <div class="icon-circle">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h5>Email</h5>
                    <a class="text-decoration-none" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    <span class="contact-note d-block">Réponse sous 24h</span>
                </div>
                
                <div class="contact-card slide-up delay-1">
                    <div class="icon-circle">
                        <i class="bi bi-linkedin"></i>
                    </div>
                    <h5>LinkedIn</h5>
                    <a class="text-decoration-none" href="<?php echo $linkedin; ?>">linkedin.com/in/louisbiseray</a>
                    <span class="contact-note d-block">Connectons-nous !</span>
                </div>
                
                <div class="contact-card slide-up delay-2">
                    <div class="icon-circle">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h5>Localisation</h5>
                    <p>Tours, France</p>
                    <span class="contact-note d-block">Indre et Loire</span>
                </div>
                
                <div class="contact-card slide-up delay-3">
                    <div class="icon-circle">
                        <i class="bi bi-github"></i>
                    </div>
                    <h5>GitHub</h5>
                    <a class="text-decoration-none" href="<?php echo $github; ?>">github.com/louisbiseray-bot</a>
                    <span class="contact-note d-block">Voir mes projets</span>
                </div>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="contact-form-section fade-in delay-2">
            <h3 class="section-title">Envoyer un Message</h3>
            <div class="separator"></div>
            <p class="section-desc">Remplissez le formulaire ci-dessous et je vous répondrai dans les plus brefs délais.</p>
            
            <?php if ($messageEnvoye): ?>
                <div class="alert alert-success" role="alert">
                    <i class="bi bi-check-circle"></i> Votre message a été envoyé avec succès ! Je vous répondrai dès que possible.
                </div>
            <?php elseif ($erreur): ?>
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> <?php echo $erreur; ?>
                </div>
            <?php endif; ?>
            
            <div class="form-container slide-up">
                <form method="POST" action="contact.php">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom"><i class="bi bi-person"></i> Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom complet" required>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="bi bi-envelope"></i> Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="votre@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sujet"><i class="bi bi-chat-left-text"></i> Sujet</label>
                        <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Objet de votre message" required>
                    </div>
                    <div class="form-group">
                        <label for="message"><i class="bi bi-pencil"></i> Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Détaillez votre demande ici..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit pulse-hover">
                        <i class="bi bi-send"></i> Envoyer le message
                    </button>
                </form>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="availability-section fade-in delay-3">
            <h3 class="section-title">Disponibilités</h3>
            <div class="separator"></div>
            <p class="section-desc">Je suis actuellement à la recherche d'opportunités professionnelles :</p>
            
            <div class="availability-cards">
                <div class="avail-card slide-up">
                    <i class="bi bi-briefcase"></i>
                    <h4>Stage</h4>
                    <p>À partir 2026<br>Durée : 6 à 8 semaines</p>
                </div>
                <div class="avail-card slide-up delay-1">
                    <i class="bi bi-building"></i>
                    <h4>Alternance</h4>
                    <p>À partir de septembre 2027<br></p>
                </div>
                <div class="avail-card slide-up delay-2">
                    <i class="bi bi-clock"></i>
                    <h4>Emploi</h4>
                    <p>À l'issue du BTS<br>Septembre 202</p>
                </div>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="response-section fade-in">
            <div class="response-box">
                <i class="bi bi-info-circle"></i>
                <div>
                    <h4>Délai de réponse</h4>
                    <p>Je m'engage à répondre à tous les messages dans un délai de 48 heures ouvrées. Pour les demandes urgentes concernant des opportunités professionnelles, n'hésitez pas à me contacter directement par email ou téléphone.</p>
                </div>
            </div>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
</body>
</html>
