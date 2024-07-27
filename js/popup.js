function openPopup(contentId) {
    var popup = document.getElementById("popup");
    var popupContent = document.getElementById("popup-content");
    var popupImg = document.getElementById("popup-img")
    popup.style.display = "flex";

    var content = ''
    switch(contentId) {
        case 'content1':
            popupImg.src = 'img/img.gif'
            content += '<h1>Blob Kart</h1>'
            content += '<hr class="popupHR">'
            content += '<p>Blob Kart is a game inspired by Mario Kart created in C++ ';
            content += 'using GLM, GLFW, and OpenGL. My partner ';
            content += '<a href="https://oacook.w3.uvm.edu" target="_blank">Owen Cook</a>';
            content += ' and I created this project for our Advanced Programming class at UVM.';
            content += ' Graphics starter code was provided by the teaching assistants ';
            content += 'and the instructor.</p>'
            content += '<a href="https://github.com/owncook/Blob-Kart"';
            content += 'target="_blank">GitHub Repo</a>';
            break;
        case 'content2':
            popupImg.src = 'img/cs1080final.png';
            content += '<h1>Web Site Development Final</h1>';
            content += '<hr class="popupHR">';
            content += '<p>This is a project I worked on with my classmate Lily Bonds.';
            content += 'We worked using HTML, CSS, and PHP to create a web site for';
            content += 'the fictitious company Green Mountain Cycles';
            content += 'It has 5 pages, and has a form that is connected to email.</p>';
            content += '<a href="https://aperkel.w3.uvm.edu/cs1080/final/"';
            content += 'target="_blank">Website</a>';
            break;
        case 'content3':
            popupImg.src = 'img/utility.gif';
            popupImg.className += ' tallimg';
            content += '<h1>Utility Manager</h1>';
            content += '<hr class="popupHR">';
            content += '<p>This is a personal project of mine that is still under ';
            content += 'development. It is a portal for my two roommates\' and my utility bills. ';
            content += 'It displays a table of our bills, along with the bill date, the due date, ';
            content += 'the cost per person, the status of the bill, and has links to download or view ';
            content += 'the PDF. It is built using HTML, CSS, PHP, SQL, and Python. There is an admin portal ';
            content += 'where I can add new bills, change the status of bills, or send an email reminder ';
            content += 'that a bill is coming up. A Raspberry Pi automatically sends emails to us when there ';
            content += 'are 5 days until the due date if the bill is not paid. We also get emails when ';
            content += 'new bills are uploaded to the site.</p>';
            content += '<a href="https://github.com/aaronperkel/Utility-Manager" target="_blank">';
            content += 'GitHub Repo</a>';
            break;
        case 'content4':
            popupImg.src = 'img/dormkit.JPG';
            popupImg.className += ' tallimg';
            content += '<h1>DormKit</h1>';
            content += '<hr class="popupHR">';
            content += '<p>DormKit is a prototype "smart dorm" product that allows a user ';
            content += 'to install hardware in their dorm to control certain electronics from ';
            content += 'anywhere on their college campus. DormKit was developed in a group consisting of ';
            content += '<a href="https://oacook.w3.uvm.edu" target="_blank">Owen Cook</a>, Alexa Witkin, ';
            content += 'and Sam Zimpfer. The name is a play on "HomeKit", the ';
            content += 'popular smart home framework deveolped by Apple. DormKit works using a Flask ';
            content += 'web app. The control signals from the web are sent over WiFi to a Raspberry Pi. ';
            content += 'It also has a "home hub" that stays in the student\'s dorm room that shows other ';
            content += 'relevant information, like the time, local weather, and room temperature. ';
            content += 'The Raspberry Pi is connected directly to the hub, and it uses bluetooth to control ';
            content += 'peripherals using an Arduino Uno.</p>';
            content += '<a href="https://github.com/aaronperkel/DormKit" target="_blank">';
            content += 'GitHub Repo</a>';
            break;
        case 'content5':
            popupImg.src = 'img/pcb.png';
            content += '<h1>Custom PCB</h1>';
            content += '<hr class="popupHR">';
            content += '<p>During my Senior year of high school, I worked with a group to create ';
            content += 'a prosthetic device to help people suffering from neuropathy. It was a glove that would help ';
            content += 'to detect high temperatures. I used KiCad to design a custom PCB that housed all of the electronics.';
            break;
        case 'content6':
            popupImg.src = 'img/lightsout.gif';
            popupImg.className += ' tallimg';
            content += '<h1>Lights Out</h1>';
            content += '<hr class="popupHR">';
            content += '<p>Lights Out is based on a deceptively simple concept. Clicking on a cell ';
            content += 'toggles that cell and each of its immediate neighbors. The goal is to turn ';
            content += 'out all the lights, ideally with the minimum number of clicks';
            content += '<sup>[<a href="https://www.logicgamesonline.com/lightsout/" target="_blank">i</a>]</sup>. ';
            content += 'Light Out was created in C++ using GLM, GLFW, and OpenGL ';
            content += 'with <a href="https://oacook.w3.uvm.edu" target="_blank">Owen Cook</a>.</p>'
            content += '<a href="https://github.com/aaronperkel/Lights-Out" target="_blank">';
            content += 'GitHub Repo</a>'
            break;
        case 'content7':
            popupImg.src = 'img/feature.png';
            content += '<h1>Magazine Feature</h1>';
            content += '<p><i>The Impact of Divorce on Children: More Than Just A Split</i> ';
            content += 'was a Magazine Feature I wrote for ENGL1001 - Written Expression during the ';
            content += 'summer of 2024. It was the result of four weeks of research and refining this topic. ';
            content += 'I am very proud of how it turned out, and I think the article speaks for itself.</p>';
            content += '<a href="feature.pdf" target="_blank">Read it Here</a>';
            break;
        case 'content8':
            popupImg.src = 'img/display.png';
            content += '<h1>Room Status Sign - <span style="color:red">WORK IN PROGRESS</span></h1>';
            content += 'An E-Ink display that is mounted on the door to my room that shows the ';
            content += 'status of what I am currently doing. Commonly used for when I am doing ';
            content += "something important, I can show 'Do Not Disturb!' and a timeframe of when ";
            content += ' I will be done.';
            content += '<a href="https://github.com/aaronperkel/Room-Display-Sign">GitHub Repo</a>';
            break;
        default:
            popup.style.display = "none";
            return;
    }
    popupContent.innerHTML = content;
}

function closePopup(event) {
    if (event.target.classList.contains('popup') || event.target.classList.contains('close')) {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
    }
}