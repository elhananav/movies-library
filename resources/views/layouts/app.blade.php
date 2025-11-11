<!doctype html>
<html>
<head>
    <title>Movie Admin</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fafafa;
            margin: 0;
            padding: 0;
        }

        .page-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.07);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        table th {
            background: #f7f7f7;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        h1 {
            margin-top: 0;
        }

        form { margin-top: 15px; }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            padding: 8px 14px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('catalog.index') }}">Movie Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog.index') }}">Catalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.movies.index') }}">Admin: Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.movies.create') }}">Add Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.movies.import.form') }}">Import Movie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-4">
    <div class="page-container">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
