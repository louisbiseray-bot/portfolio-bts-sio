<?php
// Configuration globale
$siteTitle = "Portfolio BTS SIO";
$nom = "Louis BISERAY";
$email = "louisbiseray@gmail.com";
$linkedin = "https://www.linkedin.com/in/louis-biseray-5b55ba325/";
$github = "https://github.com/louisbiseray-bot";

// Fonction pour obtenir le titre de la page
function getPageTitle($page) {
    $titles = [
        'index' => 'Accueil',
        'presentation' => 'Présentation',
        'parcours' => 'Parcours',
        'competences' => 'Compétences',
        'projets' => 'Projets',
        'contact' => 'Contact'
    ];
    return isset($titles[$page]) ? $titles[$page] : 'Portfolio';
}
?>
