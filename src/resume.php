<?php include 'top.php'; ?>

<main>
    <!-- Resume Grid Container -->
    <div class="resumeGrid">

        <!-- Column One: Contact, Projects, Clubs, Awards -->
        <div class="columnOne">

            <!-- Contact Section -->
            <h3>Contact</h3>
            <div class="resumeItem contactInfo">
                <p class="orange">
                    <!-- Email -->
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:me@aaronperkel.com">me@aaronperkel.com</a><br>

                    <!-- Address (Note: Nested <a> tags might be unintended) -->
                    <i class="fas fa-house"></i>
                    <a href='https://maps.google.com/?q=81+Buell+St+Burlington+VT+05401'>
                        <a href='https://maps.apple.com/maps?q=81+Buell+St+Burlington+VT+05401'>
                            81 Buell St #1, Burlington VT 05401
                        </a>
                    </a><br>

                    <!-- Phone -->
                    <i class="fas fa-phone"></i>
                    <a href="tel:4782628935">(478) 262-8935</a><br>

                    <!-- Website -->
                    <i class="fas fa-globe"></i>
                    <a href="http://aaronperkel.com">aaronperkel.com</a><br>

                    <!-- GitHub -->
                    <i class="fa-brands fa-github"></i>
                    <a href="https://github.com/aaronperkel" target="_blank"> /aaronperkel</a>
                    <br>

                    <!-- LinkedIn -->
                    <i class="fa-brands fa-linkedin"></i>
                    <a href="https://linkedin.com/in/aaronperkel" target="_blank"> /aaronperkel</a>
                </p>
            </div>

            <!-- Projects Section -->
            <h3>Projects</h3>
            <div class="projectsBox">

                <!-- Project 1 -->
                <div class="project resumeItem">
                    <p class="projectDate">Fall 2024</p>
                    <a href="https://github.com/gohacki/CodeBuilder" target="_blank" class="projectTitle">
                        CodeBuilder <i class="fas fa-external-link-alt"></i>
                    </a>
                    <p class="projectDescription">
                        CodeBuilder is an educational iOS application designed to help users
                        learn and practice coding skills in a fun and interactive way.
                    </p>
                </div>

                <!-- Project 2 -->
                <div class="project resumeItem">
                    <p class="projectDate">Summer 2024</p>
                    <a href="https://github.com/aaronperkel/Utility-Manager" target="_blank" class="projectTitle">
                        Utility Manager <i class="fas fa-external-link-alt"></i>
                    </a>
                    <p class="projectDescription">
                        A web app to help track my two roommates' and my utility bills.
                        Built using HTML, CSS, PHP, SQL, and Python.
                    </p>
                </div>

                <!-- Project 3 -->
                <div class="project resumeItem">
                    <p class="projectDate">Spring 2024</p>
                    <a href="https://github.com/owncook/Blob-Kart" target="_blank" class="projectTitle">
                        Blob Kart <i class="fas fa-external-link-alt"></i>
                    </a>
                    <p class="projectDescription">
                        C++ Video Game Project inspired by Mario Kart
                    </p>
                </div>

                <!-- Project 4 -->
                <div class="project resumeItem">
                    <p class="projectDate">Spring 2025</p>
                    <a href="https://github.com/aaronperkel/sublet" target="_blank" class="projectTitle">
                        UVM Sublets <i class="fas fa-external-link-alt"></i>
                    </a>
                    <p class="projectDescription">
                        A platform for UVM students to post and find sublet listings near campus. Built with PHP, MySQL,
                        and modern web tech, featuring dynamic filtering and an interactive map view.
                    </p>
                </div>
            </div>

            <!-- Clubs Section -->
            <h3>Clubs</h3>
            <div class="clubsGrid">

                <!-- Club 1 -->
                <div class="club resumeItem">
                    <a href="https://uvmaero.org" target="_blank" class="clubTitle">
                        UVM AERO <i class="fas fa-external-link-alt"></i>
                    </a>
                    <span class="clubDate">OCT 2024</span>
                    <p class="clubDescription">Member at University of Vermont</p>
                </div>

                <!-- Club 2 -->
                <div class="club resumeItem">
                    <a href="https://catalogue.uvm.edu/undergraduate/aboutuniv/honoraryandrecognitionsocieties/"
                        target="_blank" class="clubTitle">
                        Golden Key Honor Society <i class="fas fa-external-link-alt"></i>
                    </a>
                    <span class="clubDate">OCT 2023</span>
                    <p class="clubDescription">Member at University of Vermont</p>
                </div>
            </div>

            <!-- Awards Section -->
            <h3>Awards</h3>
            <div class="clubsGrid">
                <!-- Award 1 -->
                <div class="award resumeItem">
                    <strong>Excellence in Technology</strong>
                    <span class="awardDate">MAY 2021</span>
                    <p class="awardDescription">Received from Stratford Academy</p>
                </div>
            </div>

        </div> <!-- End of Column One -->

        <!-- Column Two: Education, Courses, Skills, Work Experience -->
        <div class="columnTwo">

            <!-- Education Section -->
            <h3>Education</h3>
            <div class="resumeItem educationGrid">
                <div class="jobDate">
                    <p class="bold">AUG 2022 - MAY 2025</p>
                </div>
                <div class="jobDescription">
                    <p>
                        <strong>University Of Vermont</strong><br>
                        Burlington, VT
                    </p>
                    <p class="grey ital jobdesc">
                        - Bachelor of Science in Computer Science<br>
                        - Mathematics Minor
                    </p>
                </div>
            </div>

            <!-- Relevant Courses Section -->
            <h3>Relevant Courses</h3>
            <hr>
            <div class="courseGrid">
                <!-- Courses Column One -->
                <div class="columnOne">
                    <ul class="dashed">
                        <li>Data Structures & Algorithms</li>
                        <li>Algorithm Design & Analysis</li>
                        <li>Computer Organization</li>
                        <li>Advanced Programming</li>
                        <li>Intermediate Programming</li>
                    </ul>
                </div>
                <!-- Courses Column Two -->
                <div class="columnTwo">
                    <ul class="dashed">
                        <li>Discrete Structures</li>
                        <li>Cybersecurity Principles</li>
                        <li>Computability and Complexity</li>
                        <li>Data Privacy</li>
                        <li>Mobile App Development</li>
                    </ul>
                </div>
            </div>

            <!-- Skills and Interests Section -->
            <h3>Skills and Interests</h3>
            <hr>
            <div class="skillsGrid">
                <!-- Skills Column One -->
                <div class="columnOne">
                    <ul class="dashed">
                        <li>
                            Programming Languages:
                            <p class="grey ital">Python, Java, C++, C#, C</p>
                        </li>
                        <li>
                            Web Development:
                            <p class="grey ital">HTML5, CSS3, PHP</p>
                        </li>
                        <li>
                            Mobile App Development:
                            <p class="grey ital">iOS (Swift), Xcode</p>
                        </li>
                    </ul>
                </div>
                <!-- Skills Column Two -->
                <div class="columnTwo">
                    <ul class="dashed">
                        <li>
                            Database Management:
                            <p class="grey ital">SQL</p>
                        </li>
                        <li>
                            Soft Skills:
                            <p class="grey ital">Problem-Solving, Customer Service, Adaptability</p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Work Experience Section -->
            <h3>Work Experience</h3>
            <div class="workGrid">

                <!-- Job 1 -->
                <div class="job resumeItem">
                    <div class="jobDate">
                        <p class="bold">JAN 2024 - PRESENT</p>
                    </div>
                    <div class="jobDescription">
                        <p>
                            <strong>Computer Science Teaching Assistant</strong><br>
                            UVM CS - Burlington, VT
                        </p>
                        <p class="grey ital jobdesc">
                            - Conduct weekly grading of assignments and projects, ensuring timely and constructive
                            feedback.<br>
                            - Collaborate with faculty to develop course materials and improve curriculum
                            effectiveness.<br>
                            - Developed a Java-based autograder (with JUnit tests) that automatically verifies file
                            requirements, compiles student code, and provides detailed output.<br>
                        </p>
                    </div>
                </div>

                <!-- Job 2 -->
                <div class="job resumeItem">
                    <div class="jobDate">
                        <p class="bold">NOV 2023 - PRESENT</p>
                    </div>
                    <div class="jobDescription">
                        <p>
                            <strong>ETS Student Technician</strong><br>
                            UVM Tech Team - Burlington, VT
                        </p>
                        <p class="grey ital jobdesc">
                            - Serve as the primary contact for IT support, addressing and resolving technical issues for
                            university staff and students.<br>
                            - Provide technical support to students and faculty, resolving software-related issues
                            efficiently.<br>
                            - Respond to incoming phone calls and emails, addressing IT support requests and
                            troubleshooting technical problems.<br>
                        </p>
                    </div>
                </div>

                <!-- Job 3 -->
                <div class="job resumeItem">
                    <div class="jobDate">
                        <p class="bold">JUN 2021 - AUG 2023</p>
                    </div>
                    <div class="jobDescription">
                        <p>
                            <strong>Mover</strong><br>
                            Previews Interiors and Antiques - Macon, GA
                        </p>
                        <p class="grey ital jobdesc">
                            - Handled and moved large and delicate items with care, minimizing damage and ensuring
                            customer satisfaction.
                        </p>
                    </div>
                </div>

            </div> <!-- End of Work Grid -->

        </div> <!-- End of Column Two -->

    </div> <!-- End of Resume Grid -->

    <!-- Horizontal Divider -->
    <hr>

    <!-- Download Resume Link -->
    <p class="dl">
        <a href="./public/aaron-perkel-resume.pdf" download>Download my Resume (PDF)</a>
    </p>
</main>

<?php include 'footer.php'; ?>