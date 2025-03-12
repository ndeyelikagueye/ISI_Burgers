<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Burgers</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv4yHn2dYF9PjG1Xjojo4lWkd7QK5L0oM9lvPb2V9UzRiqHTXyKz6lH+yQ5" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }
        h1 {
            color: #333;
            margin-top: 30px;
            text-align: center;
        }
        .button {
            display: block;
            padding: 10px 15px;
            margin: 20px auto;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            width: fit-content; /* Optionnel, pour que la largeur du bouton s'adapte à son contenu */
        }

        .alert {
            margin: 20px auto;
            width: 80%;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
        }
        .actions a, .actions button {
            margin: 5px;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
        .view {
            background-color: #17a2b8;
            color: white;
        }
        .edit {
            background-color: #ffc107;
            color: black;
        }
        .delete {
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }
        .order-form input[type="number"] {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
        }
        .order-form button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .order-form button:hover {
            background-color: #218838;
        }
        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-container form {

            gap: 5px;
            display: block;
            margin: 20px auto;
        }
        .form-container input, .form-container button {
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Burgers</h1>
    <a href="{{ route('burgers.create') }}" class="button" >Ajouter un Burger</a>

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

    <!-- Formulaire de filtre -->
    <div class="form-container">
        <form method="GET" action="{{ route('burgers.index') }}" class="d-flex">
            <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher par nom" value="{{ request('search') }}">
            <button type="submit" class="btn btn-light">Filtrer</button>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
            <th>Commander</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($burgers as $burger)
            <tr>
                <td>{{ $burger->name }}</td>
                <td>{{ $burger->price }} CFA</td>
                <td>{{ $burger->stock }}</td>
                <td>{{ $burger->description }}</td>
                <td><img src="{{ asset('storage/' . $burger->image) }}" alt="{{ $burger->name }}" style="max-width: 200px;">


                </td>
                <td class="actions">
                    <a href="{{ route('burgers.show', $burger->id) }}" class="view">Voir</a>
                    <a href="{{ route('burgers.edit', $burger->id) }}" class="edit">Éditer</a>
                    <form action="{{ route('burgers.destroy', $burger->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Supprimer</button>
                    </form>
                </td>
                <td class="order-form">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="burger_id" value="{{ $burger->id }}">
                        <label for="quantity" class="form-label">Quantité:</label>
                        <input type="number" name="quantity" class="form-control" min="1" max="{{ $burger->stock }}" required>
                        <button type="submit" class="btn btn-success">Commander</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Inclure Bootstrap JS (optionnel si besoin de certaines fonctionnalités) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBdR0P9S4B1T4z4klp/8d3Pj0z6M/kPms8FfvVYKfmz3hbaE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0p5MSaBgwQ/YYbhzYtoTyXr2BLiN6YlX/Xg4pPLPi5tV0P5B" crossorigin="anonymous"></script>

</body>
</html>
