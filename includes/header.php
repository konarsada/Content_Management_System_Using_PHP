<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/styles.css">
    <title>My blog</title>
</head>

<body>
    <div class="container">

    <header>
        <h1>My blog</h1>
    </header>

    <nav>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <?php if (Auth::isLoggedIn()) : ?>
                <li class="nav-item"><a class="nav-link" href="/admin/">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="/logout.php">Log out</a></li>
            <?php else : ?>
                <li class="nav-item"><a class="nav-link" href="/login.php">Log in</a></li>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link" href="/contact.php">Contact</a></li>
        </ul>
    </nav>

    <main>
