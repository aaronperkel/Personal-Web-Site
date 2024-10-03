<nav>
  <div class="hamburger" onclick="toggleMenu()">&#9776;</div>
  <div class="nav-links" id="navLinks">
    <a class="<?php if ($pathParts['filename'] == 'index') { print 'activePage'; } ?>" href="/">Home</a>
    <span class="hiddenOnMobile"> | </span>
    <a class="<?php if ($pathParts['filename'] == 'about') { print 'activePage'; } ?>" href="about">About</a>
    <span class="hiddenOnMobile"> | </span>
    <a class="<?php if ($pathParts['filename'] == 'resume') { print 'activePage'; } ?>" href="resume">Resume</a>
  </div>
</nav>
<hr>