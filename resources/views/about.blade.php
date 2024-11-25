<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarc</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #F5BA1A; /* Changed background color */
            color: #fff;
            padding: 20px;
            display: flex; /* Added flex display */
            justify-content: space-between; /* Moved title to left and nav to right */
            align-items: center; /* Center items vertically */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-left: 20px; /* Adjusted margin */
        }

        nav ul li:first-child {
            margin-left: 0; /* Remove margin for the first item */
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .search {
            text-align: center;
            margin: 50px 0;
        }

        .search input[type="text"] {
            padding: 10px;
            width: 300px;
        }

        .search button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .featured-jobs {
            padding: 20px;
        }

        .job {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .job h3 {
            margin-top: 0;
        }

        .job a {
            display: block;
            text-align: right;
            text-decoration: none;
            color: #333;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="margin: 0;">Zarc</h1>
        <nav>
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="offer">Offer</a></li>
                <li><a href="#">About</a></li>
                @if(session()->has('user') && session('user')['email'] == "admin@gmail.com")
                    <li><a href="dashboard">Dashboard</a></li>
                @endif
                @if(session()->has('user'))
                    <li><a href="#">Logged in as {{ session('user')->name }}</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li><a href="login">Login</a></li>
                @endif
            </ul>
        </nav>
    </header>
    <section class="featured-jobs">
        <div class="container">
            <h2>About Zarc - Social Job Hub</h2>
            <p>Zarc is a revolutionary platform designed to connect job seekers with job providers in an engaging and interactive way. We believe that finding the right job shouldn't be a daunting task, which is why we've created a social hub where people can share job offers, connect with others in their field, and discover new career opportunities.</p>
            <p>At Zarc, we understand the importance of networking and community when it comes to advancing your career. Our platform allows users to build professional relationships, gain insights into different industries, and stay updated on the latest job openings.</p>
            <p>Join Zarc today and take the next step towards finding your dream job!</p>
            <h2>Support</h2>
            <p>support@zarc.com</p>
        </div>
    </section>
</body>
</html>
