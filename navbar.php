<?php
error_reporting((0));
$p = $_REQUEST['page'];
?>

<nav id="navbar" class="navbar nav-menu">
    <ul>
        <li><a href="index.php?page=home" class="nav-link scrollto <?= ($p == 'home') ? 'active' : ''; ?>"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="index.php?page=about" class="nav-link scrollto <?= ($p == 'about') ? 'active' : ''; ?>"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="index.php?page=study" class="nav-link scrollto <?= ($p == 'study') ? 'active' : ''; ?>"><i class="bx bx-building"></i> <span>Study</span></a></li>
        <li><a href="index.php?page=tasks" class="nav-link scrollto <?= ($p == 'tasks') ? 'active' : ''; ?>"><i class="bx bx-book-content"></i> <span>Tasks</span></a></li>
        <li><a href="index.php?page=portfolio" class="nav-link scrollto <?= ($p == 'portfolio') ? 'active' : ''; ?>"><i class="bx bx-server"></i> <span>Portfolio</span></a></li>
    </ul>
</nav><!-- .nav-menu -->