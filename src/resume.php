<?php
include 'top.php';
include 'data/resume_content.php';
?>
<main class="resume container">
    <h2 class="sr-only"><?php echo htmlspecialchars($resumeData['pageTitle']); ?></h2>
    <div class="grid resume-grid">
        <aside class="sidebar">
            <section>
                <h3>Contact</h3>
                <ul>
                    <?php foreach ($resumeData['contactInfo'] as $item): ?>
                        <li><i class="<?php echo htmlspecialchars($item['icon']); ?>"></i> <?php echo $item['text']; // HTML is allowed ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section>
                <h3>Honors and Awards</h3>
                <?php foreach ($resumeData['honorsAndAwards'] as $honor): ?>
                <ul>
                    <li><?php echo htmlspecialchars($honor['title']); ?> <em><?php echo htmlspecialchars($honor['date']); ?></em></li>
                </ul>
                <?php endforeach; ?>
            </section>
        </aside>

        <section class="main-resume">
            <h3>Experience</h3>
            <?php foreach ($resumeData['experience'] as $job): ?>
                <article class="job">
                    <h4><?php echo htmlspecialchars($job['title']); ?></h4>
                    <h5 class="job-location"><?php echo htmlspecialchars($job['location']); ?></h5>
                    <time><?php echo htmlspecialchars($job['time']); ?></time>
                    <ul>
                        <?php foreach ($job['details'] as $detail): ?>
                            <li><?php echo htmlspecialchars($detail); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>

            <h3>Education</h3>
            <?php foreach ($resumeData['education'] as $edu): ?>
                <article class="school">
                    <strong><?php echo htmlspecialchars($edu['institution']); ?></strong> — <?php echo htmlspecialchars($edu['degree']); ?><br>
                    <time><?php echo htmlspecialchars($edu['time']); ?></time>
                </article>
            <?php endforeach; ?>

            <h3>Skills & Interests</h3>
            <div class="grid" style="grid-template-columns:1fr 1fr; gap:1rem;">
                <?php foreach ($resumeData['skillsAndInterests']['categories'] as $category): ?>
                    <ul>
                        <?php foreach ($category as $skill): ?>
                            <li><?php echo $skill; // HTML is allowed ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>

            <h3>Projects</h3>
            <ul>
                <?php foreach ($resumeData['projects'] as $project): ?>
                    <li><a href="<?php echo htmlspecialchars($project['link']); ?>"><?php echo htmlspecialchars($project['name']); ?></a> — <?php echo htmlspecialchars($project['description']); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>

    <p class="download">
        <a href="generate_resume_pdf.php">
            <i class="fas fa-file-pdf"></i> Download PDF
        </a>
    </p>
</main>
<?php include 'footer.php'; ?>