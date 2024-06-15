<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Freelancer</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 50%;
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        header,
        .bio,
        .projects,
        .certifications,
        footer {
            margin: 10px 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 75px;
            border: 4px solid #fff;
        }

        .ratings span {
            margin-right: 10px;
            font-weight: bold;
            color: #fdd835;
        }

        .thumbnail {
            width: 100px;
            border: 1px solid #ccc;
            margin: 5px;
            transition: transform 0.3s ease;
        }

        .thumbnail:hover {
            transform: scale(1.1);
        }

        .comment {
            background-color: #444;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .projects ul,
        .certifications ul {
            list-style-type: none;
            padding: 0;
        }

        .projects li,
        .certifications li {
            text-align: center;
            margin-bottom: 20px;
        }

        .projects a,
        .certifications a {
            text-decoration: none;
            color: #333;
            display: block;
        }

        .projects img,
        .certifications img {
            display: block;
            margin: auto;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button,
        .chat-button {
            background-color: #decd08;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: center;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            justify-content: center;
        }

        button:hover,
        .chat-button:hover {
            background-color: #decd08;
            margin: center;
            justify-content: center;
        }

        /* Carousel styles */
        .carousel {
            margin-top: 20px;
        }

        .slick-slide {
            margin: 0 5px;
        }

        .slick-prev,
        .slick-next {
            font-size: 24px;
            color: #333;
        }

        .slick-prev:hover,
        .slick-next:hover {
            color: #555;
        }
        
    </style>
</head>


<body>
    <div class="container">
        <header>
            <hr><a href="../../client/dashboard/dashboard.html">HOME</a>
            <br>
            <br>
            <img src="../../images/profile.jpg" alt="Profile Photo" class="profile-photo">
            <h1>Jane Doe</h1>
            <p>Web Developer & Designer</p>
            <div class="ratings">
                <span id="averageRating">Average Rating: 4.8/5.0</span>
                <span id="totalReviews">Total Reviews: 100</span>
            </div>
        </header>
        <section class="bio">
            <h2>Professional Profile</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor,
                dignissim sit amet, adipiscing nec, ultricies sed, dolor.</p>
        </section>
        <section class="projects">
            <h2>Projects</h2>
            <div class="carousel">
                <div class="project-carousel">
                    <div>
                        <a href="project1.pdf">
                            <img src="../../images/project.jpg" alt="Project 1 Thumbnail" class="thumbnail">
                            Project 1: Ecommerce Website
                        </a>
                    </div>
                    <div>
                        <a href="project2.pdf">
                            <img src="../../images/project2.jpg" alt="Project 2 Thumbnail" class="thumbnail">
                            Project 2: Portfolio Site
                        </a>
                    </div>
                    <div>
                        <a href="project3.pdf">
                            <img src="../../images/project3.jpg" alt="Project 3 Thumbnail" class="thumbnail">
                            Project 3: Mobile App
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="certifications">
            <h2>Certifications</h2>
            <div class="carousel">
                <div class="certification-carousel">
                    <div>
                        <a href="certificate1.pdf">
                            <img src="../../images/certifikat1.jpg" alt="Certificate 1" class="thumbnail">
                            Google IT Support Professional Certificate
                        </a>
                    </div>
                    <div>
                        <a href="certificate2.pdf">
                            <img src="../../images/certifikat2.jpg" alt="Certificate 2" class="thumbnail">
                            Responsive Web Design Certification - FreeCodeCamp
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <h2>Comments</h2>
            <div id="commentSection">
                <!-- Comments will appear here -->
            </div>
            <div>
                <h3>Add a comment</h3>
                <textarea id="commentText" placeholder="Write your comment here..."></textarea>
                <h3>Rate:</h3>
                <input type="number" id="ratingInput" placeholder="Rating (1-5)" min="1" max="5">
            </br>
             </br>
                <button onclick="addComment()">Submit Comment</button>
            </div>
            <div class="chat">
                <h2>Chat</h2>
                <a href="https://t.me/aluyyyynim" class="chat-button">Chat with Freelancer</a><br>
            </div>
        </br>
            <a href="../hirefreelancer/hirefreelancer.html"><button>Hire</button></a>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        // Array to hold the comments and ratings
        let comments = [
            { text: "Very professional and delivered on time.", rating: 5 },
            { text: "Great design skills and attention to detail.", rating: 4 }
        ];

        // Function to display comments
        function displayComments() {
            const commentSection = document.getElementById("commentSection");
            commentSection.innerHTML = ""; // Clear existing comments
            comments.forEach(comment => {
                const commentDiv = document.createElement("div");
                commentDiv.classList.add("comment");
                commentDiv.innerHTML = `<strong>Rating:</strong> ${comment.rating}/5 <br> ${comment.text}`;
                commentSection.appendChild(commentDiv);
            });
        }

        // Function to add a new comment
        function addComment() {
            const commentText = document.getElementById("commentText").value;
            const ratingInput = parseInt(document.getElementById("ratingInput").value);
            if (commentText && ratingInput >= 1 && ratingInput <= 5) {
                // Create a new comment object
                const newComment = {
                    text: commentText,
                    rating: ratingInput
                };

                // Add the new comment to the array
                comments.push(newComment);

                // Display all comments again including the new one
                displayComments();

                // Clear input fields after adding the comment
                document.getElementById("commentText").value = "";
                document.getElementById("ratingInput").value = "";
            } else {
                alert('Please enter a valid comment and rating between 1 and 5.');
            }
        }

        // Function to handle hiring the freelancer
        function hireFreelancer() {
            // You can add your logic here to handle the hiring process
            alert("Freelancer hired successfully!"); // For demonstration purposes, display an alert
        }

        // Initial display of comments when the page loads
        window.onload = function () {
            displayComments();

            // Initialize Slick Carousel for projects and certifications
            $('.project-carousel').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
                nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            $('.certification-carousel').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
                nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }]
            });
        }
    </script>
</body>

</html>
