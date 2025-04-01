<nav>
  <div class="hamburger" onclick="toggleMenu()" aria-label="Toggle navigation menu">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <ul class="nav-links" id="navLinks">
    <li><a class="<?php if ($pathParts['filename'] == 'index') {
      print 'activePage';
    } ?>" href="./">Home</a></li>
    <li><a class="<?php if ($pathParts['filename'] == 'about') {
      print 'activePage';
    } ?>" href="./about.php">About</a>
    </li>
    <li><a class="<?php if ($pathParts['filename'] == 'resume') {
      print 'activePage';
    } ?>" href="./resume.php">Resume</a>
    </li>
  </ul>
</nav>
<hr>