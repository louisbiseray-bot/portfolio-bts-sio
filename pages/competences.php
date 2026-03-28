<?php
// competences.php - Page compétences
$page = 'competences';
include '../includes/header.php';
include '../includes/navbar.php';
?>

    <section id="competences" class="content-section competences-page">
        <div class="page-header fade-in">
            <h2>Mes Compétences Techniques</h2>
            <div class="separator"></div>
            <p class="intro-text">Au cours de ma formation BTS SIO SISR, j'ai développé un ensemble de compétences techniques dans les domaines des réseaux, de la sécurité, des systèmes et de la programmation.</p>
        </div>

        <div class="competences-intro fade-in delay-1">
            <h3 class="section-title">Domaines d'expertise</h3>
            <div class="separator"></div>
            <p class="section-desc">Voici les principales technologies et outils que je maîtrise :</p>
        </div>
        
        <div class="skills-grid">
            <div class="skill-card slide-up">
                <div class="skill-icon">
                    <i class="bi bi-hdd-network"></i>
                </div>
                <h4>Réseaux</h4>
                <p>Configuration Cisco, VLAN, routage inter-VLAN, TCP/IP, DHCP, DNS</p>
                <div class="skill-level">
                    <span class="level-badge">Avancé</span>
                </div>
            </div>
            <div class="skill-card slide-up delay-1">
                <div class="skill-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h4>Sécurité</h4>
                <p>ACL, VPN, sécurisation des accès, gestion des certificats, protocoles de sécurité</p>
                <div class="skill-level">
                    <span class="level-badge">Intermédiaire</span>
                </div>
            </div>
            <div class="skill-card slide-up delay-2">
                <div class="skill-icon">
                    <i class="bi bi-windows"></i>
                </div>
                <h4>Systèmes Windows</h4>
                <p>Windows Server, Active Directory, GPO, DNS, DHCP</p>
                <div class="skill-level">
                    <span class="level-badge">Intermédiaire</span>
                </div>
            </div>
            <div class="skill-card slide-up delay-3">
                <div class="skill-icon">
                    <i class="bi bi-terminal"></i>
                </div>
                <h4>Systèmes Linux</h4>
                <p>Administration Debian/Ubuntu, Apache, services réseau</p>
                <div class="skill-level">
                    <span class="level-badge">Intermédiaire</span>
                </div>
            </div>
            <div class="skill-card slide-up">
                <div class="skill-icon">
                    <i class="bi bi-code-slash"></i>
                </div>
                <h4>Programmation</h4>
                <p>Python, PowerShell, Bash scripting, HTML/CSS, C++</p>
                <div class="skill-level">
                    <span class="level-badge">Intermédiaire</span>
                </div>
            </div>
            <div class="skill-card slide-up delay-1">
                <div class="skill-icon">
                    <i class="bi bi-cloud"></i>
                </div>
                <h4>Virtualisation</h4>
                <p>VMware, VirtualBox, Docker, Proxmox</p>
                <div class="skill-level">
                    <span class="level-badge">Débutant</span>
                </div>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="certifications-section fade-in delay-2">
            <h3 class="section-title">Certifications & Formations</h3>
            <div class="separator"></div>
            <div class="cert-grid">
                <div class="cert-card slide-up">
                    <i class="bi bi-award"></i>
                    <h4>Networking Basics</h4>
                    <p>Cisco Networking Academy - Notions de base sur les réseaux</p>
                </div>
                <div class="cert-card slide-up delay-1">
                    <i class="bi bi-award"></i>
                    <h4>PIX</h4>
                    <p>Certification de compétences numériques</p>
                </div>
                <div class="cert-card slide-up delay-2">
                    <i class="bi bi-award"></i>
                    <h4>MOOC ANSSI</h4>
                    <p>Sensibilisation à la cybersécurité</p>
                </div>
                <div class="cert-card slide-up delay-3">
                    <i class="bi bi-award"></i>
                    <h4>A suivre...</h4>
                    <p>Prochaines certifications en cours de préparation</p>
                </div>
            </div>
        </div>

        <div class="separator-line"></div>

        <div class="learning-section fade-in">
            <div class="info-box">
                <i class="bi bi-lightbulb"></i>
                <div>
                    <h4>En constante évolution</h4>
                    <p>Je continue à développer mes compétences grâce à des certifications, des labs virtuels et une veille technologique active. Je suis toujours à la recherche de nouveaux défis techniques pour progresser dans mon domaine.</p>
                </div>
            </div>
        </div>
    </section>

<?php include '../includes/footer.php'; ?>
</body>
</html>
