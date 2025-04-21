<?php include 'top.php'; ?>
<main class="home container">
    <section class="hero">
        <h2>Hello! I’m Aaron.</h2>
        <p>CS & Mathematics Senior @ UVM. Enterprise IT, programming & aviation buff.</p>
    </section>

    <section class="projects">
        <h2>Projects</h2>
        <div class="grid projects-grid">
            <!-- just update these wrappers/ images as before -->
            <div class="card" onclick="openPopup('content9')">
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>
            <div class="card" onclick="openPopup('content9')">
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>
            <div class="card" onclick="openPopup('content9')">
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>
            <div class="card" onclick="openPopup('content9')">
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>
            <div class="card" onclick="openPopup('content9')">
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>
            <div class="card" onclick="openPopup('content9')">
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>
            <div class="card" onclick="openPopup('content9')">
                <img src="public/img/sublet.png" alt="UVM Sublets">
                <h3>UVM Sublets</h3>
            </div>
            <!-- … repeat for each project … -->
        </div>
        <?php include 'footer.php'; // popup markup moved into main.js  ?>
    </section>
</main>