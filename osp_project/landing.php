<?php
 session_start();
 $registerNumber = isset($_SESSION['register_number']) ? $_SESSION['register_number'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #ddd;
        }

        .navbar-center {
            margin-left: 400px;
        }

        .navbar-center a {
            margin: 0 15px;
        }

        .navbar-right {
            margin-left: auto;
        }

        .hero-section {
            text-align: center;
            padding: 80px 20px;
            background-color: #3498db;
            color: #fff;
        }

        #hero-section {
            text-align: center;
            padding: 80px 20px;
            background-color: #3498db;
            color: #fff;
        }

        #hero-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        #hero-section p {
            font-size: 18px;
            line-height: 1.6;
        }

        .register-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .register-button:hover {
            background-color: #3498db;
            color: #fff;
            border: 2px solid #fff;
        }

        main {
            padding: 40px;
        }

        section {
            margin-bottom: 40px;
        }

        h2 {
            color: #3498db;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .flex-container {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .flex-item {
            width: calc(50% - 20px);
            /* 20px is the combined margin */
        }

        #about {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #about h2 {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 15px;
        }

        #about p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        #features {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #features h2 {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 15px;
        }

        #features ul {
            list-style-type: none;
            padding: 0;
        }

        #features li {
            font-weight: bold;
            margin-bottom: 8px;
        }

        #features p {
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
        }

        #course-listings {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #course-listings h2 {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 15px;
        }

        #course-listings ul {
            list-style-type: none;
            padding: 0;
        }

        #course-listings li {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        #course-listings li:last-child {
            border-bottom: none;
        }

        #course-listings strong {
            font-weight: bold;
            font-size: 16px;
        }

        #course-listings p {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        #registration-process {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #registration-process h2 {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 15px;
        }

        #registration-process div {
            font-size: 16px;
            color: #555;
        }

        #registration-process ol {
            list-style-type: none;
            padding: 0;
        }

        #registration-process li {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        #registration-process li:last-child {
            border-bottom: none;
        }

        #registration-process p {
            margin-top: 15px;
        }

        #registration-process ol {
            counter-reset: step;
        }

        #registration-process li {
            counter-increment: step;
        }

        #registration-process li::before {
            content: counter(step);
            margin-right: 10px;
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
            border-radius: 50%;
            padding: 5px;
        }

        #faq {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        #faq h2 {
            color: #3498db;
            font-size: 24px;
            margin-bottom: 15px;
        }

        #faq ul {
            list-style-type: none;
            padding: 0;
        }

        #faq li {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        #faq li:last-child {
            border-bottom: none;
        }

        #faq strong {
            font-weight: bold;
            font-size: 16px;
        }

        #faq p {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
        }

        #faq ol {
            list-style-type: decimal;
            margin-top: 10px;
            margin-bottom: 0;
        }

        #faq ol li {
            padding: 5px 0;
        }


        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: #fff;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <h1>Course Registration System</h1>
            <div class="navbar-center">
                <a href="landing.php">Home</a>
                <a href="crserg.php">Register Courses</a>
                <a href="profile.php">Profile</a>
            </div>
            <div class="navbar-right">
                <a href="login.php" onclick="return confirmLogout();">Logout</a>
            </div>            
        </nav>
    </header>
    <div id="hero-section" class="hero-section">
        <h1>Welcome to Our Course Registration System</h1>
        <p>Explore a wide range of courses and easily register for the ones that suit your academic needs.</p>
        <a href="crserg.php" class="register-button">Register Now</a>
    </div>


    <main>
        <section id="about">
            <h2>About Us</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec quam a velit efficitur
                tristique. Curabitur nec luctus urna. Nullam eu neque non justo consequat tincidunt.
            </p>
        </section>


        <div class="flex-container">
            <section id="features" class="flex-item">
                <h2>Key Features</h2>
                <ul>
                    <li>Easy Course Selection:</li>
                    <p>Select your courses effortlessly with our intuitive interface.</p>
                    <li>Access to Varied Courses:</li>
                    <p>Explore a diverse range of courses offered by top-notch instructors.</p>
                    <li>User-Friendly Interface:</li>
                    <p>Enjoy a seamless registration experience with our user-friendly interface.</p>
                </ul>
            </section>


            <section id="course-listings" class="flex-item">
                <h2>Featured Courses</h2>
                <ul>
                    <li>
                        <strong>Course Name 1</strong> - Instructor: John Doe
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel justo sit amet est
                            consectetur malesuada. Sed facilisis libero vel magna luctus, a egestas elit pharetra.</p>
                    </li>
                    <li>
                        <strong>Course Name 2</strong> - Instructor: Jane Smith
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel justo sit amet est
                            consectetur malesuada. Sed facilisis libero vel magna luctus, a egestas elit pharetra.</p>
                    </li>
                    <li>
                        <strong>Course Name 3</strong> - Instructor: Mark Johnson
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel justo sit amet est
                            consectetur malesuada. Sed facilisis libero vel magna luctus, a egestas elit pharetra.</p>
                    </li>
                </ul>
            </section>

        </div>

        <div class="flex-container">
            <section id="registration-process" class="flex-item">
                <h2>Registration Process</h2>
                <div>
                    <p>Follow these simple steps to register for courses:</p>
                    <ol>
                        <li>Log in to your account</li>
                        <li>Explore available courses</li>
                        <li>Select desired courses and click "Register"</li>
                        <li>Review your selections and submit</li>
                    </ol>
                </div>
            </section>


            <section id="faq" class="flex-item">
                <h2>Frequently Asked Questions</h2>
                <ul>
                    <li>
                        <strong>Q: How do I reset my password?</strong>
                        <p>To reset your password, follow these steps:</p>
                        <ol>
                            <li>Go to the login page.</li>
                            <li>Click on the "Forgot Password" link.</li>
                            <li>Enter your email address.</li>
                            <li>Follow the instructions sent to your email to reset your password.</li>
                        </ol>
                    </li>
                    <li>
                        <strong>Q: What should I do if I encounter issues during registration?</strong>
                        <p>If you face issues during registration, please try the following:</p>
                        <ol>
                            <li>Check your internet connection.</li>
                            <li>Clear your browser cache and cookies.</li>
                            <li>Contact our support team for assistance.</li>
                        </ol>
                    </li>
                </ul>
            </section>

        </div>
    </main>

    <footer>
        <p>&copy; 2023 Course Registration System. All rights reserved.</p>
    </footer>

    <script>
        function confirmLogout() {
            var confirmLogout = confirm("Are you sure you want to logout?");
            return confirmLogout;
        }
    </script>
    
</body>

</html>
