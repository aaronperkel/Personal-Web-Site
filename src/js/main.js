function toggleMenu() {
  var navLinks = document.getElementById('navLinks');
  navLinks.classList.toggle('show');
}

function openPopup(contentId) {
  var popup = document.getElementById("popup");
  var popupContent = document.getElementById("popup-content");
  var popupImg = document.getElementById("popup-img");
  popup.style.display = "flex";
  document.body.classList.add('popup-open');

  var content = '';
  switch (contentId) {
    case 'content1':
      popupImg.src = './public/img/img.gif';
      content += '<h1>Blob Kart</h1>';
      content += '<hr class="popupHR">';
      content += '<p>Blob Kart is a game inspired by Mario Kart created in C++ ';
      content += 'using GLM, GLFW, and OpenGL. My partner ';
      content += '<a href="https://oacook.w3.uvm.edu" target="_blank">Owen Cook</a>';
      content += ' and I created this project for our Advanced Programming class at UVM.';
      content += ' Graphics starter code was provided by the teaching assistants ';
      content += 'and the instructor.</p>';
      content += '<a href="https://github.com/owncook/Blob-Kart"';
      content += 'target="_blank">GitHub Repo</a>';
      break;
    case 'content2':
      popupImg.src = './public/img/cs1080final.png';
      content += '<h1>Web Site Development Final</h1>';
      content += '<hr class="popupHR">';
      content += '<p>This is a project I worked on with my classmate Lily Bonds.';
      content += 'We worked using HTML, CSS, and PHP to create a web site for';
      content += 'the fictitious company Green Mountain Cycles';
      content += 'It has 5 pages, and has a form that is connected to email.</p>';
      content += '<a href="https://courses.aperkel.w3.uvm.edu/cs1080/final/"';
      content += 'target="_blank">Website</a>';
      break;
    case 'content3':
      popupImg.src = './public/img/utility.gif';
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
      popupImg.src = './public/img/dormkit.JPG';
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
      popupImg.src = './public/img/pcb.png';
      content += '<h1>Custom PCB</h1>';
      content += '<hr class="popupHR">';
      content += '<p>During my Senior year of high school, I worked with a group to create ';
      content += 'a prosthetic device to help people suffering from neuropathy. It was a glove that would help ';
      content += 'to detect high temperatures. I used KiCad to design a custom PCB that housed all of the electronics.';
      break;
    case 'content6':
      popupImg.src = './public/img/lightsout.gif';
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
      popupImg.src = './public/img/combine.png';
      content += '<h1>CodeBuilder</h1>';
      content += '<hr class="popupHR">';
      content += '<p>CodeBuilder is an educational iOS application designed to help users ';
      content += 'learn and practice coding skills in a fun and interactive way. The app provides ';
      content += 'a platform where users can solve coding problems by arranging code blocks, read ';
      content += 'educational articles, participate in daily challenges, and engage with a community ';
      content += 'through a built-in forum. </p>';
      content += '<a href="https://github.com/gohacki/CodeBuilder" target="_blank">GitHub Repo</a>';
      break;
    case 'content8':
      popupImg.src = './public/img/sign.png';
      content += '<h1>Room Status Sign</h1>';
      content += '<hr class="popupHR">';
      content += '<p>An E-Ink display that is mounted on the door to my room that shows the ';
      content += 'status of what I am currently doing. Commonly used for when I am doing ';
      content += "something important, I can show 'Do Not Disturb!' and a timeframe of when ";
      content += ' I will be done. I used a Waveshare E-Ink display and Flask running on a Raspberry Pi.</p>';
      content += '<a href="https://github.com/aaronperkel/Room-Display-Sign" target="_blank">GitHub Repo</a>';
      break;
    case 'content9':
      popupImg.src = './public/img/sublet.png';
      content += '<h1>UVM Sublets</h1>';
      content += '<hr class="popupHR">';
      content += 'UVM Sublets is a dedicated platform built exclusively for UVM students to post, find, and manage sublet listings near campus. Crafted with PHP, MySQL, HTML, CSS, and JavaScript, the site leverages modern tools like noUiSlider for seamless filtering and Leaflet for an interactive map experience. Discover a responsive, user-friendly interface that simplifies your sublet search and makes campus housing a breeze.</p>';
      content += '<a href="https://github.com/aaronperkel/sublet" target="_blank">GitHub Repo</a>'
      break;
    default:
      popup.style.display = "none";
      return;
  }
  popupContent.innerHTML = content;
}

function closePopup(event) {
  if (event.target.id === 'popup' || event.target.classList.contains('close')) {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
    document.body.classList.remove('popup-open');
  }
}
