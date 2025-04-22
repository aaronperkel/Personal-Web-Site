<!-- src/nav.php -->
<nav class="site-nav">
  <a href="index.php" class="<?= $pathParts['filename'] == 'index' ? 'active' : '' ?>">Home</a>
  <a href="about.php" class="<?= $pathParts['filename'] == 'about' ? 'active' : '' ?>">About</a>
  <a href="resume.php" class="<?= $pathParts['filename'] == 'resume' ? 'active' : '' ?>">Resume</a>
</nav>