<?php
// index.php - Page d'accueil
$page = 'index';
include 'includes/header.php';
include 'includes/navbar.php';
?>

    <header class="hero-section fade-in">
        <img src="image/photo.png" alt="Photo" class="profile-img">
        <div class="hero-text">
            <h1><?php echo $nom; ?></h1>
            <div class="separator"></div>
            <p>Élève BTS SIO - Option SISR</p>
            <p class="subtitle">Passionné par les réseaux et la cybersécurité</p>
        </div>
    </header>

    <section class="content-section accueil-page">
        <div class="accueil-header fade-in delay-1">
            <h2>Bienvenue sur mon Portfolio</h2>
            <div class="separator"></div>
            <p class="intro-text">Bienvenue sur mon portfolio professionnel ! Je suis <?php echo $nom; ?>, étudiant en BTS SIO (Services Informatiques aux Organisations) option SISR (Solutions d'Infrastructure, Systèmes et Réseaux).</p>
        </div>
        
        <div class="accueil-content fade-in delay-2">
            <p>Ce site a été créé dans le cadre de ma formation pour présenter mon parcours, mes compétences techniques et les projets que j'ai réalisés. N'hésitez pas à naviguer dans les différentes sections pour en apprendre plus sur mon profil.</p>
        </div>
        
        <div class="quick-links-section fade-in delay-3">
            <h3 class="section-title">Explorer mon portfolio</h3>
            <div class="separator"></div>
            <p class="section-desc">Cliquez sur les liens ci-dessous pour découvrir mon parcours et mes compétences :</p>
            
            <div class="links-grid">
                <a href="pages/presentation.php" class="quick-link slide-up">
                    <i class="bi bi-person"></i>
                    <span>Ma présentation</span>
                </a>
                <a href="pages/parcours.php" class="quick-link slide-up delay-1">
                    <i class="bi bi-mortarboard"></i>
                    <span>Mon parcours</span>
                </a>
                <a href="pages/competences.php" class="quick-link slide-up delay-2">
                    <i class="bi bi-tools"></i>
                    <span>Mes compétences</span>
                </a>
                <a href="pages/projets.php" class="quick-link slide-up delay-3">
                    <i class="bi bi-folder"></i>
                    <span>Mes projets</span>
                </a>
                <a href="pages/contact.php" class="quick-link slide-up">
                    <i class="bi bi-envelope"></i>
                    <span>Me contacter</span>
                </a>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="stats-section fade-in">
            <div class="stats-grid">
                <div class="stat-card slide-up">
                    <i class="bi bi-code-slash"></i>
                    <h4>Projets</h4>
                    <p class="stat-number">2+</p>
                    <p>Réalisés en formation</p>
                </div>
                <div class="stat-card slide-up delay-1">
                    <i class="bi bi-award"></i>
                    <h4>Compétences</h4>
                    <p class="stat-number">6+</p>
                    <p>Domaines d'expertise</p>
                </div>
                <div class="stat-card slide-up delay-2">
                    <i class="bi bi-clock"></i>
                    <h4>Formation</h4>
                    <p class="stat-number">2 ans</p>
                    <p>BTS SIO SISR</p>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
