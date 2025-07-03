<?php
include 'top.php';
include 'data/about_content.php';
?>

<main class="about container">
    <div class="features">
        <h2 class="section-title"><?php echo htmlspecialchars($aboutData['pageTitle']); ?></h2>

        <?php foreach ($aboutData['sections'] as $section): ?>
            <div class="feature">
                <h3><?php echo htmlspecialchars($section['title']); ?></h3>
                <?php if (isset($section['content'])): ?>
                    <p><?php echo $section['content']; // HTML is allowed in content ?></p>
                <?php endif; ?>
                <?php if (isset($section['list'])): ?>
                    <ul>
                        <?php foreach ($section['list'] as $item): ?>
                            <li><?php echo $item; // HTML is allowed in list items ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'footer.php'; ?>