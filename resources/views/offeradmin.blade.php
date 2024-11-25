<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 20px;
        }
        .card {
            background-color: white;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card h2 {
            margin-top: 0;
        }
        .user-list {
            list-style-type: none;
            padding: 0;
        }
        .user-list li {
            background-color: #fff;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-list .user-info {
            flex-grow: 1;
        }
        .user-list button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .user-list button:hover {
            background-color: #d32f2f;
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
    </style>
</head>
<body>
    <nav>
        <a href="dashboard">Profiles</a>
        <a href="offeradmin">Offers</a>
        <a href="home">Home</a>
    </nav>
    <div class="container">
        <div class="card">
            <h2>Profiles</h2>
            <ul class="user-list">
                @foreach ($offers as $offer)
                    <li>
                        <div class="user-info">
                            {{ $offer->title }} ({{ $offer->description }})
                        </div>
                        <form action="{{ route('offer.edit1',$offer->id) }}" method="get" >
                            @csrf
                            <input type="submit" value="Modifier">
                        </form>
                        <form action="{{ route('offer.destroy1', $offer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>