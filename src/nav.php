<nav class="site-nav">
  <div class="container">
    <button class="nav-toggle" aria-label="open menu">
      <i class="fas fa-bars"></i>
    </button>
    <ul class="nav-list">
      <li><a href="index.php" class="<?= $pathParts['filename'] == 'index' ? 'active' : '' ?>">Home</a></li>
      <li><a href="about.php" class="<?= $pathParts['filename'] == 'about' ? 'active' : '' ?>">About</a></li>
      <li><a href="resume.php" class="<?= $pathParts['filename'] == 'resume' ? 'active' : '' ?>">Resume</a></li>
    </ul>
  </div>
</nav>
<hr class="nav-divider">