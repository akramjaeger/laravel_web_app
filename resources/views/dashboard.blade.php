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
                @foreach ($profiles as $profile)
                    <li>
                        <div class="user-info">
                            {{ $profile->name }} ({{ $profile->email }})
                        </div>
                        <form action="{{ route('profile.destroy', $profile->id) }}" method="POST" style="display:inline;">
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