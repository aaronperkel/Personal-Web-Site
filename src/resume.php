<?php include 'top.php'; ?>
<main class="resume container">
    <h2 class="sr-only">Resume</h2>
    <div class="grid resume-grid">
        <!-- Sidebar stays largely the same -->
        <aside class="sidebar">
            <section>
                <h3>Contact</h3>
                <ul>
                    <li><i class="fas fa-envelope"></i> <a style="font-size: 92%"
                            href="mailto:&#109;&#101;&#64;&#97;&#97;&#114;&#111;&#110;&#112;&#101;&#114;&#107;&#101;&#108;.com">me[at]aaronperkel[dot]com</a>
                    </li>
                    <li><i class="fas fa-phone"></i> <a href="tel:4782628935">(478) 262‑8935</a></li>
                    <li><i class="fas fa-map-marker-alt"></i> 81 Buell St #1, Burlington VT 05401</li>
                    <li><i class="fas fa-globe"></i> <a href="http://aaronperkel.com">aaronperkel.com</a></li>
                    <li><i class="fab fa-github"></i> <a href="https://github.com/aaronperkel">/aaronperkel</a></li>
                    <li><i class="fab fa-linkedin"></i> <a href="https://linkedin.com/in/aaronperkel">/aaronperkel</a>
                    </li>
                </ul>
            </section>

            <section>
                <h3>Honors and Awards</h3>
                <ul>
                    <li>Golden Key Honor Society <em>Oct 2023</em></li>
                </ul>

                <!-- <ul>
                    <li>Excellence in Technology <em>May 2021</em></li>
                </ul> -->
            </section>
        </aside>

        <!-- Main content: now starts with Experience -->
        <section class="main-resume">

            <h3>Experience</h3>

            <article class="job">
                <h4>Network Technician</h4>
                <h5 class="job-location">University of Vermont – Burlington, VT</h5>
                <time>May 2025 – Present</time>
                <ul>
                    <li>Support campus-wide networking infrastructure</li>
                    <li>Assist with switch and access point deployments</li>
                    <li>Collaborate with other ETS staff on summer infrastructure upgrades.</li>
                </ul>
            </article>

            <article class="job">
                <h4>ETS Student Technician - Level II</h4>
                <h5 class="job-location">University of Vermont – Burlington, VT</h5>
                <time>Nov 2023 – May 2025 • 1 yr 7 mos</time>
                <ul>
                    <li>Primary IT support contact for UVM staff & students</li>
                    <li>Respond to tickets via phone & email; escalated to the appropriate group</li>
                    <li>Maintained internal documentation and assisted lower level techs</li>
                </ul>
            </article>

            <!-- <article class="job">
                <h4>Computer Science Teaching Assistant</h4>
                <h5 class="job-location">University of Vermont – Burlington, VT</h5>
                <time>Jan 2024 – May 2025 • 1 yr 5 mos</time>
                <ul>
                    <li>Grade weekly assignments and provide detailed feedback</li>
                    <li>Co‑develop lecture materials and lab exercises for CS2100 & CS2300</li>
                    <li>Built a Java‑based autograder leveraging JUnit to streamline grading</li>
                </ul>
            </article> -->

            <h3>Education</h3>
            <!-- <article class="school">
                <strong>Middle Georgia State University</strong> — M.S. Management, Aviation Concentration<br>
                <time>Admitted</time>
            </article> -->
            <article class="school">
                <strong>University of Vermont</strong> — B.S. Computer Science, Math Minor<br>
                <time>Aug 2022 – May 2025</time>
            </article>

            <h3>Skills & Interests</h3>
            <div class="grid" style="grid-template-columns:1fr 1fr; gap:1rem;">
                <ul>
                    <li><strong>Languages:</strong> Python, Java, C++, C#, C</li>
                    <li><strong>Web:</strong> HTML5, CSS3, PHP</li>
                    <li><strong>Mobile:</strong> iOS (Swift), Xcode</li>
                </ul>
                <ul>
                    <li><strong>Database:</strong> SQL</li>
                    <li><strong>Tools:</strong> Git, Docker, NGINX</li>
                    <li><strong>Soft Skills:</strong> Leadership, Communication, Problem‑Solving</li>
                </ul>
            </div>

            <h3>Projects</h3>
            <ul>
                <li><a href="index.php?project=UVM Sublets">UVM Sublets</a> — PHP/MySQL platform for off‑campus housing
                    listings</li>
                <li><a href="index.php?project=Utility Manager">Utility Manager</a> — Web portal for splitting &
                    tracking roommate bills</li>
                <li><a href="index.php?project=CodeBuilder">CodeBuilder</a> — iOS app teaching coding via drag‑and‑drop
                    blocks</li>
                <li><a href="index.php?project=Blob Kart">Blob Kart</a> — C++/OpenGL racing game for Advanced
                    Programming class</li>
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