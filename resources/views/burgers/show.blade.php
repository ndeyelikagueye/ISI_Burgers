<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Burger</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv4yHn2dYF9PjG1Xjojo4lWkd7QK5L0oM9lvPb2V9UzRiqHTXyKz6lH+yQ5" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .details p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .details strong {
            color: #333;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 20px;
        }
        a.btn {
            display: block;
            margin-top: 20px;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        a.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Détails du Burger</h1>

    <div class="details">
        <p><strong>Nom:</strong> {{ $burger->name }}</p>
        <p><strong>Prix:</strong> {{ $burger->price }} CFA</p>
        <p><strong>Description:</strong> {{ $burger->description }}</p>
        <p><strong>Stock:</strong> {{ $burger->stock }}</p>

        @if($burger->image)
            <img src="{{ asset('storage/' . $burger->image) }}" alt="{{ $burger->name }}" style="max-width: 200px;">



        @endif
    </div>
    <!-- Gestion des Messages d'Erreur et de Succès -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Formulaire de commande -->
    <form action="" method="POST">
        @csrf
        <input type="hidden" name="burger_id" value="{{ $burger->id }}">
        <label for="quantity">Quantité:</label>
        <input type="number" name="quantity" min="1" max="{{ $burger->stock }}" required>
        <button type="submit">Commander</button>
    </form>
    <a href="{{ route('burgers.index') }}" class="btn">Retour à la liste</a>
</div>

<!-- Inclure Bootstrap JS (optionnel si besoin de certaines fonctionnalités) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBdR0P9S4B1T4z4klp/8d3Pj0z6M/kPms8FfvVYKfmz3hbaE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0p5MSaBgwQ/YYbhzYtoTyXr2BLiN6YlX/Xg4pPLPi5tV0P5B" crossorigin="anonymous"></script>

</body>
</html>
