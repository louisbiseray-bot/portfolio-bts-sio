<?php
// navbar.php - Navigation partagée
// Détection automatique du chemin de base
$basePath = (strpos($_SERVER['PHP_SELF'], '/pages/') !== false) ? '../' : '';
include_once 'config.php';
?>
<nav class="sidebar">
    <ul class="navbar-nav">
        <li class="title">Mon Portfolio</li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $basePath; ?>index.php"><i class="bi bi-house-door me-2"></i>Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $basePath; ?>pages/presentation.php"><i class="bi bi-person me-2"></i>Présentation</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $basePath; ?>pages/parcours.php"><i class="bi bi-mortarboard me-2"></i>Parcours</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $basePath; ?>pages/competences.php"><i class="bi bi-tools me-2"></i>Compétences</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $basePath; ?>pages/projets.php"><i class="bi bi-folder me-2"></i>Projets</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $basePath; ?>pages/contact.php"><i class="bi bi-envelope me-2"></i>Contact</a></li>
    </ul>
</nav>
