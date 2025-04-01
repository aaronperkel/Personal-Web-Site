<?php include 'top.php'; ?>
<main>
    <section>
        <h2>Home</h2>
        <p>
            Hello, I am Aaron Perkel, a Computer Science and Mathematics
            Senior at the University of Vermont. I am interested in Programming,
            IT, and Enterprise Networking.
        </p>
        <p>
            I currently work as an Enterprise Technology Services Student
            Technician at the <a href="https://www.uvm.edu/it/kb/contact/" target="_blank">UVM Tech Team</a>.
        </p>
        <p>
            Some of my hobbies include Music, Photography/Film Making, and Aviation.
        </p>
    </section>

    <hr>

    <section>
        <h2>Projects</h2>
        <div class="projectsBox">
            <div class="imgWrapper" onclick="openPopup('content9')" data-overlay="UVM Sublets">
                <img src="./public/img/sublet.png" alt="UVM Sublets">
            </div>
            <div class="imgWrapper" onclick="openPopup('content3')" data-overlay="Utility Manager">
                <img src="./public/img/utility.gif" alt="Utility Manager">
            </div>
            <div class="imgWrapper" onclick="openPopup('content1')" data-overlay="Blob Kart">
                <img src="./public/img/img.gif" alt="Blob Kart">
            </div>
            <div class="imgWrapper" onclick="openPopup('content2')" data-overlay="Web Site Dev. Final">
                <img src="./public/img/cs1080final.png" alt="Web Site Dev. Final">
            </div>
            <div class="imgWrapper" onclick="openPopup('content4')" data-overlay="DormKit">
                <img src="./public/img/dormkit.JPG" alt="DormKit">
            </div>
            <div class="imgWrapper" onclick="openPopup('content5')" data-overlay="Custom PCB">
                <img src="./public/img/pcb.png" alt="Custom PCB">
            </div>
            <div class="imgWrapper" onclick="openPopup('content6')" data-overlay="Lights Out">
                <img src="./public/img/lightsout.gif" alt="Lights Out">
            </div>
            <div class="imgWrapper" onclick="openPopup('content7')" data-overlay="CodeBuilder">
                <img src="./public/img/combine.png" alt="CodeBuilder">
            </div>
            <div class="imgWrapper" onclick="openPopup('content8')" data-overlay="Room Status Sign">
                <img src="./public/img/sign.png" alt="Room Status Sign">
            </div>
        </div>
        <div id="popup" class="popup" onclick="closePopup(event)">
            <div class="popupStack" onclick="event.stopPropagation()">
                <span class="close" onclick="closePopup(event)">&times;</span>
                <div class="popup-content-wrapper">
                    <img id="popup-img" class="popup-img">
                    <div id="popup-content" class="popup-content"></div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <h2>Contact Me</h2>
        <p>
            Email: <a href="mailto:me@aaronperkel.com">me@aaronperkel.com</a> |
            Phone: <a href="tel:4782628935">478.262.8935</a>
        </p>
    </section>

    <hr>

    <section>
        <h2>Socials</h2>
        <div class="socials">
            <a href="https://github.com/aaronperkel" target="_blank">
                <i class="fa-brands fa-github fa-3x" style="color: rgb(37, 41, 46);"></i>
            </a>
            <a href="https://linkedin.com/in/aaronperkel" target="_blank">
                <i class="fa-brands fa-linkedin fa-3x" style="color: rgb(57, 102, 173);"></i>
            </a>
            <a href="https://youtube.com/@aaronperkel" target="_blank">
                <i class="fa-brands fa-youtube fa-3x" style="color: rgb(218, 57, 50);"></i>
            </a>
            <a href="https://facebook.com/aaroncperkel" target="_blank">
                <i class="fa-brands fa-facebook fa-3x" style="color: rgb(57, 117, 234);"></i>
            </a>
            <a href="https://instagram.com/aaronperkel" target="_blank">
                <i class="fa-brands fa-instagram fa-3x"></i>
            </a>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>