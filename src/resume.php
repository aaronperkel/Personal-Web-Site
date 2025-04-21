<?php include 'top.php'; ?>
<main class="resume container">
    <h2 class="sr-only">Resume</h2>
    <div class="grid resume-grid">
        <aside class="sidebar">
            <section>
                <h3>Contact</h3>
                <ul>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:me@aaronperkel.com">me@aaronperkel.com</a></li>
                    <li><i class="fas fa-phone"></i> <a href="tel:4782628935">(478) 262‑8935</a></li>
                    <li><i class="fas fa-map-marker-alt"></i> 81 Buell St #1, Burlington VT 05401</li>
                    <li><i class="fas fa-globe"></i> <a href="http://aaronperkel.com"
                            target="_blank">aaronperkel.com</a></li>
                    <li><i class="fab fa-github"></i> <a href="https://github.com/aaronperkel"
                            target="_blank">/aaronperkel</a></li>
                    <li><i class="fab fa-linkedin"></i> <a href="https://linkedin.com/in/aaronperkel"
                            target="_blank">/aaronperkel</a></li>
                </ul>
            </section>
            <section>
                <h3>Projects</h3>
                <ul>
                    <li><a href="index.php?project=CodeBuilder">CodeBuilder</a></li>
                    <li><a href="index.php?project=Utility Manager">Utility Manager</a></li>
                    <li><a href="index.php?project=Blob Kart">Blob Kart</a></li>
                    <li><a href="index.php?project=UVM Sublets">UVM Sublets</a></li>
                </ul>
            </section>
            <section>
                <h3>Clubs</h3>
                <ul>
                    <li><a href="https://uvmaero.org" target="_blank">UVM AERO</a></li>
                    <li><a href="https://catalogue.uvm.edu/undergraduate/aboutuniv/honoraryandrecognitionsocieties/"
                            target="_blank">Golden Key Honor Society</a></li>
                </ul>
            </section>
            <section>
                <h3>Awards</h3>
                <ul>
                    <li><strong>Excellence in Technology</strong> <em>May 2021</em></li>
                </ul>
            </section>
        </aside>

        <section class="main-resume">
            <h3>Education</h3>
            <p><strong>University of Vermont</strong> — B.S. Computer Science, Math
                Minor<br><em>Aug 2022 – May 2025</em></p>

            <h3>Relevant Courses</h3>
            <div class="grid" style="grid-template-columns:1fr 1fr; gap:1rem;">
                <ul>
                    <li>Data Structures & Algorithms</li>
                    <li>Algorithm Design & Analysis</li>
                    <li>Computer Organization</li>
                    <li>Advanced Programming</li>
                    <li>Intermediate Programming</li>
                </ul>
                <ul>
                    <li>Discrete Structures</li>
                    <li>Cybersecurity Principles</li>
                    <li>Computability & Complexity</li>
                    <li>Data Privacy</li>
                    <li>Mobile App Development</li>
                </ul>
            </div>

            <h3>Skills & Interests</h3>
            <div class="grid" style="grid-template-columns:1fr 1fr; gap:1rem;">
                <ul>
                    <li><strong>Languages:</strong> Python, Java, C++, C#, C</li>
                    <li><strong>Web:</strong> HTML5, CSS3, PHP</li>
                    <li><strong>Mobile:</strong> iOS (Swift), Xcode</li>
                </ul>
                <ul>
                    <li><strong>Database:</strong> SQL</li>
                    <li><strong>Soft Skills:</strong> Problem-Solving, Customer Service, Adaptability</li>
                </ul>
            </div>

            <h3>Experience</h3>
            <article class="job">
                <h4>Computer Science Teaching Assistant</h4>
                <time>Jan 2024 – Present</time>
                <ul>
                    <li>Conduct weekly grading of assignments and provide constructive feedback</li>
                    <li>Collaborate with faculty to develop course materials</li>
                    <li>Developed a Java‑based autograder with JUnit</li>
                </ul>
            </article>
            <article class="job">
                <h4>ETS Student Technician</h4>
                <time>Nov 2023 – Present</time>
                <ul>
                    <li>Primary IT support contact for UVM staff & students</li>
                    <li>Respond to tickets via phone & email</li>
                    <li>Maintain documentation and improve workflows</li>
                </ul>
            </article>
            <article class="job">
                <h4>Mover, Previews Interiors & Antiques</h4>
                <time>Jun 2021 – Aug 2023</time>
                <ul>
                    <li>Handled & moved delicate items, ensuring minimal damage</li>
                </ul>
            </article>
        </section>
    </div>

    <p class="download">
        <a href="public/aaron-perkel-resume.pdf" download>
            <i class="fas fa-file-pdf"></i> Download PDF
        </a>
    </p>
</main>
<?php include 'footer.php'; ?>