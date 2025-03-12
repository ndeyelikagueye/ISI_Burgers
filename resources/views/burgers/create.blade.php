<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Burger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Créer un Burger</h1>
    <form action="{{ route('burgers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nom:</label>
        <input type="text" name="name" required>

        <label for="price">Prix:</label>
        <input type="number" name="price" step="0.01" required>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*">

        <label for="description">Description:</label>
        <textarea name="description"></textarea>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" required>

        <button type="submit">Créer</button>
    </form>
</div>
</body>
</html>
