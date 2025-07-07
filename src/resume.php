<?php
include 'top.php';
include 'data/resume_content.php'; // Ensures $resumeData is available
?>
<main class="resume container">
    <h2 class="sr-only"><?php echo htmlspecialchars($resumeData['pageTitle']); ?></h2>
    <div class="grid resume-grid">
        <aside class="sidebar">
            <section>
                <h3>Contact</h3>
                <ul>
                    <?php foreach ($resumeData['contactInfo'] as $item): ?>
                        <li>
                            <?php
                            // Attempt to use <i> tags if present in data, otherwise simple text
                            if (isset($item['icon']) && strpos($item['icon'], 'fa') !== false) {
                                echo '<i class="' . htmlspecialchars($item['icon']) . '"></i> ';
                            } elseif (isset($item['text_icon'])) {
                                echo htmlspecialchars($item['text_icon']) . ' ';
                            }
                            ?>
                            <?php echo $item['text']; // HTML is allowed in text from data array ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <section>
                <h3>Honors and Awards</h3>
                <?php foreach ($resumeData['honorsAndAwards'] as $honor): ?>
                <ul> {/* Each honor in its own ul as per original structure, though a single ul might be more semantic */}
                    <li>
                        <?php echo htmlspecialchars($honor['title']); ?>
                        <?php if (isset($honor['date']) && $honor['date']): ?>
                            <em><?php echo htmlspecialchars($honor['date']); ?></em>
                        <?php endif; ?>
                    </li>
                </ul>
                <?php endforeach; ?>
            </section>
        </aside>

        <section class="main-resume">
            <h3>Experience</h3>
            <?php foreach ($resumeData['experience'] as $job): ?>
                <article class="job">
                    <h4><?php echo htmlspecialchars($job['title']); ?></h4>
                    <?php if (isset($job['location']) && $job['location']): ?>
                        <h5 class="job-location"><?php echo htmlspecialchars($job['location']); ?></h5>
                    <?php endif; ?>
                    <time><?php echo htmlspecialchars($job['time']); ?></time>
                    <?php if (isset($job['details']) && !empty($job['details'])): ?>
                    <ul>
                        <?php foreach ($job['details'] as $detail): ?>
                            <li><?php echo htmlspecialchars($detail); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>

            <h3>Education</h3>
            <?php foreach ($resumeData['education'] as $edu): ?>
                <article class="school">
                    <strong><?php echo htmlspecialchars($edu['institution']); ?></strong>
                    <?php if (isset($edu['degree']) && $edu['degree']): ?>
                         — <?php echo htmlspecialchars($edu['degree']); ?>
                    <?php endif; ?>
                    <br>
                    <time><?php echo htmlspecialchars($edu['time']); ?></time>
                </article>
            <?php endforeach; ?>

            <h3>Skills & Interests</h3>
            <div class="grid" style="grid-template-columns:1fr 1fr; gap:1rem;">
                <?php foreach ($resumeData['skillsAndInterests']['categories'] as $category): ?>
                    <ul>
                        <?php foreach ($category as $skill): ?>
                            <li><?php echo $skill; // HTML is allowed in skill items from data array ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endforeach; ?>
            </div>

            <h3>Projects</h3>
            <ul>
                <?php foreach ($resumeData['projects'] as $project): ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($project['link']); ?>"><?php echo htmlspecialchars($project['name']); ?></a>
                        <?php if (isset($project['description']) && $project['description']): ?>
                             — <?php echo htmlspecialchars($project['description']); ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>

    <p class="download">
        <a href="generate_resume_pdf.php"> {/* Updated to point to the PDF script */}
            <i class="fas fa-file-pdf"></i> Download PDF
        </a>
    </p>
</main>
<?php include 'footer.php'; ?>