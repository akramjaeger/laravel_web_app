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
            background-color: #F5BA1A;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-left: 20px;
        }

        nav ul li:first-child {
            margin-left: 0;
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
                <li><a href="about">About</a></li>
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
    <section class="search">
    <h2>Our Offers</h2>
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" placeholder="Search ..." value="{{ request('search') }}">
        <input type="submit" name="Search" value="Search">
    </form>
</section>
<section class="featured-jobs">
    @foreach ($offers as $offer)
    <div class="job">
        <h3>{{ $offer->title }}</h3>
        <p>{{ $offer->type }}</p>
        <button onclick="openPopup1('{{ $offer->title }}', '{{ $offer->description }}', '{{ $offer->salary }}', '{{ $offer->location }}', '{{ $offer->type }}')">Learn More</button>
    </div>
    @endforeach
</section>
    <div id="popup1" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ccc;">
    <table>
        <tr>
            <td><p>Title : <span id="offerTitle"></span></p></td>
        </tr>
        <tr>
            <td><p>Description : <span id="offerDescription"></span></p></td>
        </tr>
        <tr>
            <td><p>Salary : <span id="offerSalary"></span></p></td>
        </tr>
        <tr>
            <td><p>Location : <span id="offerLocation"></span></p></td>
        </tr>
        <tr>
            <td><p>Category : <span id="offerType"></span></p></td>
        </tr>
        <tr>
            <td><button onclick="closePopup1()">Close</button></td>
        </tr>
    </table>
</div>

<script>
    function openPopup1(title, description, salary, location, type) {
        document.getElementById("offerTitle").innerText = title;
        document.getElementById("offerDescription").innerText = description;
        document.getElementById("offerSalary").innerText = salary;
        document.getElementById("offerLocation").innerText = location;
        document.getElementById("offerType").innerText = type;
        document.getElementById("popup1").style.display = "block";
    }

    function closePopup1() {
        document.getElementById("popup1").style.display = "none";
    }

</script>

</body>
</html>
