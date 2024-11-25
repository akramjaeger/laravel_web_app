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
            position: relative;
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

        .edit-btn,
        .delete-btn {
            position: absolute;
            bottom: 10px;
            left: 10px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #f44336;
            left: 70px;
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
        .delete-button {
            background-color: #ff4d4d; /* Red background color */
            color: #fff; /* White text color */
            padding: 8px 16px; /* Padding */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            font-size: 14px; /* Font size */
            text-transform: uppercase; /* Uppercase text */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .delete-button:hover {
            background-color: #ff6666; /* Darker red background color on hover */
        }
        .mod-button {
            background-color: #109c35; /* Red background color */
            color: #fff; /* White text color */
            padding: 8px 16px; /* Padding */
            margin-bottom: 10px;
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            font-size: 14px; /* Font size */
            text-transform: uppercase; /* Uppercase text */
            transition: background-color 0.3s; /* Smooth transition for background color */
        }

        .mod-button:hover {
            background-color: #3fd166; /* Darker red background color on hover */
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
        <h2>Your Offers</h2>
        @if(session()->has('user'))
            <button onclick="openPopup()">Add Offer</button>
                @else
                    <h3>Login if u want to add offers</p>
                @endif
    </section>
    <section class="featured-jobs">
    @foreach ($offers as $offer)
    <div class="job">
        <h3>{{ $offer->title }}</h3>
        <p>{{ $offer->type }}</p>
        @if(session()->has('user') && session('user')['email'] == $offer->userid)
        <form action="{{ route('offer.edit',$offer->id) }}" method="get">
            @csrf
            <input type="submit" value="Modifier" class="mod-button">
        </form>
        <form action="{{ route('offer.destroy',$offer->id) }}" method="post">
            @method('DELETE')
            @csrf
            <input type="submit" value="Supprimer" class="delete-button">
        </form>
        @endif
        <br>
        <button onclick="openPopup1('{{ $offer->title }}', '{{ $offer->description }}', '{{ $offer->salary }}', '{{ $offer->location }}', '{{ $offer->type }}')">Learn More</button>
    </div>
    @endforeach
</section>


<div id="popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ccc;">
    <form action="{{ route('storeoffer') }}" onsubmit="return validateForm()"method="POST">
        @csrf
    <table>
        <tr>
            <td><p>Title : </p></td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td><p>Description : </p></td>
            <td><textarea name="description" ></textarea></td>
        </tr>
        <tr>
            <td><p>Salary :</p></td>
            <td><input type="text" name="salary"></td>
        </tr>
        <tr>
            <td><p>Location :</p></td>
            <td><input type="text" name="location"></td>
        </tr>
        <tr>
            <td><p>Category :</p></td>
            <td><input type="text" name="type"></td>
        </tr>
        <tr>
            <td><input type="submit" ></td>
            <td><button onclick="closePopup()">Close</button></td>
        </tr>
    </table>
    </form>
</div>
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

        
    </div>

    
    <script>
    function openPopup() {
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
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

    function validateForm() {
        var title = document.getElementsByName("title")[0].value;
        var description = document.getElementsByName("description")[0].value;
        var salary = document.getElementsByName("salary")[0].value;
        var location = document.getElementsByName("location")[0].value;
        var type = document.getElementsByName("type")[0].value;

        if (title === "" || description === "" || salary === "" || location === "" || type === "") {
            return false; 
        }

        return true; 
    }
</script>

</body>
</html>
