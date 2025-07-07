<?php

$resumeData = [
    "pageTitle" => "Resume",
    "contactInfo" => [
        ["icon" => "fas fa-envelope", "text" => "<a href=\"mailto:me@aaronperkel.com\">me@aaronperkel.com</a>"],
        ["icon" => "fas fa-phone", "text" => "<a href=\"tel:4782628935\">(478) 262‑8935</a>"],
        ["icon" => "fas fa-map-marker-alt", "text" => "81 Buell St #1, Burlington VT 05401"],
        ["icon" => "fas fa-globe", "text" => "<a href=\"https://aaronperkel.com\">https://aaronperkel.com</a>"],
        ["icon" => "fab fa-github", "text" => "<a href=\"https://github.com/aaronperkel\">/aaronperkel</a>"],
        ["icon" => "fab fa-linkedin", "text" => "<a href=\"https://linkedin.com/in/aaronperkel\">/aaronperkel</a>"]
    ],
    "honorsAndAwards" => [
        ["title" => "Golden Key Honor Society", "date" => "Oct 2023"],
        // ["title" => "Excellence in Technology", "date" => "May 2021"]
    ],
    "experience" => [
        [
            "title" => "Network Technician",
            "location" => "University of Vermont – Burlington, VT",
            "time" => "May 2025 – Present",
            "details" => [
                "Support campus-wide networking infrastructure",
                "Assist with switch and access point deployments",
                "Collaborate with other ETS staff on summer infrastructure upgrades."
            ]
        ],
        [
            "title" => "ETS Student Technician - Level II",
            "location" => "University of Vermont – Burlington, VT",
            "time" => "Nov 2023 – May 2025 • 1 yr 7 mos",
            "details" => [
                "Primary IT support contact for UVM staff & students",
                "Respond to tickets via phone & email; escalated to the appropriate group",
                "Maintained internal documentation and assisted lower level techs"
            ]
        ],
        // [
        //     "title" => "Computer Science Teaching Assistant",
        //     "location" => "University of Vermont – Burlington, VT",
        //     "time" => "Jan 2024 – May 2025 • 1 yr 5 mos",
        //     "details" => [
        //         "Grade weekly assignments and provide detailed feedback",
        //         "Co‑develop lecture materials and lab exercises for CS2100 & CS2300",
        //         "Built a Java‑based autograder leveraging JUnit to streamline grading"
        //     ]
        // ]
    ],
    "education" => [
        [
            "institution" => "University of Vermont",
            "degree" => "B.S. Computer Science, Math Minor",
            "time" => "Aug 2022 – May 2025"
        ],
        // [
        //     "institution" => "Middle Georgia State University",
        //     "degree" => "M.S. Management, Aviation Concentration",
        //     "time" => "Admitted"
        // ]
    ],
    "skillsAndInterests" => [
        "categories" => [
            [
                "<strong>Languages:</strong> Python, Java, C++, C",
                "<strong>Web:</strong> HTML5, CSS3, PHP",
                "<strong>Mobile:</strong> iOS (Swift), Xcode"
            ],
            [
                "<strong>Database:</strong> SQL",
                "<strong>Tools:</strong> Git, Docker, NGINX",
                "<strong>Soft Skills:</strong> Leadership, Communication, Problem‑Solving"
            ]
        ]
    ],
    "projects" => [
        ["link" => "index.php?project=UVM Sublets", "name" => "UVM Sublets", "description" => "PHP/MySQL platform for off‑campus housing listings"],
        ["link" => "index.php?project=Utility Manager", "name" => "Utility Manager", "description" => "Web portal for splitting & tracking roommate bills"],
        ["link" => "index.php?project=CodeBuilder", "name" => "CodeBuilder", "description" => "iOS app teaching coding via drag‑and‑drop blocks"],
        ["link" => "index.php?project=Blob Kart", "name" => "Blob Kart", "description" => "C++/OpenGL racing game for Advanced Programming class"]
    ]
];
