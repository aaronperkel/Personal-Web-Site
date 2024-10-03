        <footer>
        <p>October 2024 Aaron Perkel</p>
        <nav>
            <a class="<?php if ($pathParts['filename'] == 'index') { print 'activePage'; } ?>" href="/">Home</a>
            <span class="hiddenOnMobile"> | </span>
            <a class="<?php if ($pathParts['filename'] == 'about') { print 'activePage'; } ?>" href="about">About</a>
            <span class="hiddenOnMobile"> | </span>
            <a class="<?php if ($pathParts['filename'] == 'resume') { print 'activePage'; } ?>" href="resume">Resume</a>
        </nav>
        </footer>
    </body>
    <script src="js/popup.js"></script>
    <script src="js/menu.js"></script>
</html> 