<?php
// parcours.php - Page parcours
$page = 'parcours';
include '../includes/header.php';
include '../includes/navbar.php';
?>

    <section id="parcours" class="content-section parcours-page">
        <div class="page-header fade-in">
            <h2>Mon Parcours</h2>
            <div class="separator"></div>
            <p class="intro-text">Découvrez mon parcours académique et professionnel, de ma formation actuelle en BTS SIO jusqu'à mon projet d'alternance.</p>
        </div>

        <div class="timeline-section fade-in delay-1">
            <h3 class="section-title">Formation</h3>
            <div class="separator"></div>
            
            <div class="timeline">
                <div class="timeline-item slide-up">
                    <div class="timeline-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>2024 - 2026</h4>
                        <p class="timeline-title">BTS SIO SISR</p>
                        <p class="timeline-place">Lycée Paul Louis Courrier - Tours</p>
                        <p class="timeline-desc">Formation en alternance ou initial en Services Informatiques aux Organisations, option Solutions d'Infrastructure, Systèmes et Réseaux. Spécialisation en administration réseau et sécurité.</p>
                    </div>
                </div>
                <div class="timeline-item slide-up delay-1">
                    <div class="timeline-icon">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>2021 - 2024</h4>
                        <p class="timeline-title">Baccalauréat</p>
                        <p class="timeline-place">Lycée Jacques de Vaucanson - Tours</p>
                        <p class="timeline-desc">Obtention du baccalauréat avec spécialités Sciences de l'informatique et du numérique. Première approche des sciences de l'informatique et des mathématiques.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="stages-section fade-in delay-2">
            <h3 class="section-title">Stages & Expériences Professionnelles</h3>
            <div class="separator"></div>
            <p class="section-desc">Les stages sont des moments clés de ma formation pour mettre en pratique mes compétences :</p>
            
            <div class="stage-cards">
                <div class="stage-card slide-up">
                    <div class="stage-header">
                        <i class="bi bi-briefcase-fill"></i>
                        <div>
                            <h4>Stage de 1ère année</h4>
                            <span class="stage-date">24 mai - 18 juin 2026</span>
                        </div>
                    </div>
                    <p class="stage-entreprise">Somycel - Langeais</p>
                    <p class="stage-desc">Découverte du monde professionnel en tant que technicien réseau. Participation à la configuration et maintenance d'infrastructure réseau dans un environnement industriel.</p>
                </div>
                <div class="stage-card slide-up delay-1">
                    <div class="stage-header">
                        <i class="bi bi-briefcase-fill"></i>
                        <div>
                            <h4>Stage de 2ème année</h4>
                            <span class="stage-date">En recherche</span>
                        </div>
                    </div>
                    <p class="stage-entreprise">[Entreprise]</p>
                    <p class="stage-desc">À compléter...</p>
                </div>
            </div>

            <div class="stage-reports fade-in delay-2">
                <a href="rapport_stage/rapport1.md" class="report-btn slide-up">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Rapport de stage 1ère année</span>
                </a>
                <a href="rapport_stage/rapport2.md" class="report-btn slide-up delay-1">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Rapport de stage 2ème année</span>
                </a>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="projets-pro fade-in delay-3">
            <h3 class="section-title">Projet Professionnel</h3>
            <div class="separator"></div>
            <div class="projet-cards">
                <div class="projet-card slide-up">
                    <i class="bi bi-graph-up-arrow"></i>
                    <h4>Objectif Court Terme</h4>
                    <p>Intégrer une entreprise en alternance à la fin de mes études au BTS SIO et développer mes compétences en administration réseau.</p>
                </div>
                <div class="projet-card slide-up delay-1">
                    <i class="bi bi-bullseye"></i>
                    <h4>Objectif Moyen Terme</h4>
                    <p>Obtenir un Bachelor ou une Licence professionnelle en sécurité des systèmes d'information ou administration réseau.</p>
                </div>
                <div class="projet-card slide-up delay-2">
                    <i class="bi bi-trophy"></i>
                    <h4>Objectif Long Terme</h4>
                    <p>Devenir Administrateur Systèmes et Réseaux ou Expert en Cybersécurité dans une entreprise dynamique.</p>
                </div>
            </div>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
</body>
</html>
