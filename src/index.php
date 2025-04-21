<?php include 'top.php'; ?>
<main class="home container">
    <section class="hero">
        <h2>Hello! I’m Aaron.</h2>
        <p>CS & Mathematics Senior @ UVM. Enterprise IT, programming & aviation enthusiast.</p>
    </section>

    <section class="projects">
        <h2>Projects</h2>
        <div class="grid projects-grid">
            <!-- UVM Sublets -->
            <div class="card"
                data-desc='UVM Sublets is a PHP/MySQL platform for UVM students to post & manage sublet listings. Uses noUiSlider & Leaflet for filters & interactive maps. <a href="https://github.com/aaronperkel/sublet" target="_blank">GitHub Repo</a>'>
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>

            <!-- Utility Manager -->
            <div class="card"
                data-desc='A personal portal for my two roommates’ and my utility bills—built with HTML, CSS, PHP, SQL & Python. Features include bill listing, cost splitting, PDF downloads, admin portal, email reminders (automated via Raspberry Pi). <a href="https://github.com/aaronperkel/Utility-Manager" target="_blank">GitHub Repo</a>'>
                <img src="public/img/utility.jpeg" alt="Utility Manager">
                <h3>Utility Manager</h3>
            </div>

            <!-- Blob Kart -->
            <div class="card"
                data-desc='Blob Kart is a game inspired by Mario Kart created in C++ using GLM, GLFW, and OpenGL. My partner Owen Cook and I created this project for our Advanced Programming class at UVM. Graphics starter code was provided by the teaching assistants and the instructor. <a href="https://github.com/owncook/Blob-Kart" target="_blank">GitHub Repo</a>'>
                <img src="public/img/img.gif" alt="Blob Kart">
                <h3>Blob Kart</h3>
            </div>

            <!-- Web Site Development Final -->
            <div class="card"
                data-desc='This project was built with Lily Bonds using HTML, CSS & PHP for a fictitious company Green Mountain Cycles. It includes 5 pages and a form that emails submissions. <a href="https://courses.aperkel.w3.uvm.edu/cs1080/final/" target="_blank">View Site</a>'>
                <img src="public/img/cs1080final.png" alt="Web Site Dev Final">
                <h3>Web Site Dev Final</h3>
            </div>

            <!-- DormKit -->
            <div class="card"
                data-desc='DormKit is a "smart dorm" prototype—Flask web app + Raspberry Pi + Arduino to control dorm electronics remotely. Built with Owen Cook, Alexa Witkin & Sam Zimpfer. <a href="https://github.com/aaronperkel/DormKit" target="_blank">GitHub Repo</a>'>
                <img src="public/img/dormkit.JPG" alt="DormKit">
                <h3>DormKit</h3>
            </div>

            <!-- Custom PCB -->
            <div class="card"
                data-desc='Designed a custom KiCad PCB for a prosthetic glove detecting high temperatures to assist people with neuropathy.'>
                <img src="public/img/pcb.png" alt="Custom PCB">
                <h3>Custom PCB</h3>
            </div>

            <!-- Lights Out -->
            <div class="card"
                data-desc='Lights Out is a puzzle where toggling a cell and its neighbors toggles lights on/off. Goal: turn off all lights. Built in C++ with GLM, GLFW & OpenGL by Owen Cook and me. <a href="https://github.com/aaronperkel/Lights-Out" target="_blank">GitHub Repo</a>'>
                <img src="public/img/lightsout.gif" alt="Lights Out">
                <h3>Lights Out</h3>
            </div>

            <!-- CodeBuilder -->
            <div class="card"
                data-desc='CodeBuilder is an iOS app to learn coding via drag‑and‑drop code blocks, articles, daily challenges & community forum. <a href="https://github.com/gohacki/CodeBuilder" target="_blank">GitHub Repo</a>'>
                <img src="public/img/combine.png" alt="CodeBuilder">
                <h3>CodeBuilder</h3>
            </div>

            <!-- Room Status Sign -->
            <div class="card"
                data-desc='An E‑Ink door display showing my current status (e.g. "Do Not Disturb") with timeframe, powered by Flask on Raspberry Pi. <a href="https://github.com/aaronperkel/Room-Display-Sign" target="_blank">GitHub Repo</a>'>
                <img src="public/img/sign.png" alt="Room Status Sign">
                <h3>Room Status Sign</h3>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>