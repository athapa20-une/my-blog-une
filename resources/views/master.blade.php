<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Container */
        .container {
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 24px;
            border-bottom: 1px solid #444;
            padding-bottom: 10px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #575757;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .header {
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            color: #333;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .content p {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
        }

        /* User Info Section */
        .user-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .user-info p {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .user-info ul {
            list-style: none;
            padding-left: 0;
        }

        .user-info ul li {
            font-size: 18px;
            color: #666;
            margin-bottom: 5px;
        }

        .user-info ul li span {
            font-weight: bold;
            color: #333;
        }


        /* Table Container */
        .table-container {
            overflow-x: auto;
        }

        /* Table */
        .listing-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .listing-table thead {
            background-color: #f5f5f5;
            border-bottom: 2px solid #ddd;
        }

        .listing-table th, .listing-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .listing-table th {
            font-weight: bold;
            color: #333;
        }

        .listing-table td {
            color: #666;
        }

        .listing-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 5px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            color: #fff;
            text-align: center;
        }

        .btn-edit {
            background-color: #4CAF50; /* Green */
        }

        .btn-edit:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #f44336; /* Red */
        }

        .btn-delete:hover {
            background-color: #e53935;
        }

        /* Form Container */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group .error {
            color: #f44336;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        /* Specific Style for View Button */
        .btn-view {
            background-color: blueviolet; /* Green color */
        }

        .btn-view:hover {
            background-color: #666; /* Darker green for hover */
        }



    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            @include('sidebar')
        </aside>
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>
