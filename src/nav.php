<nav class="site-nav">
  <div class="container">
    <ul class="nav-list">
      <li><a href="index.php" class="<?= $pathParts['filename'] == 'index' ? 'active' : '' ?>">Home</a></li>
      <li><a href="about.php" class="<?= $pathParts['filename'] == 'about' ? 'active' : '' ?>">About</a></li>
      <li><a href="resume.php" class="<?= $pathParts['filename'] == 'resume' ? 'active' : '' ?>">Resume</a></li>
    </ul>
  </div>
</nav>
<hr class="nav-divider">