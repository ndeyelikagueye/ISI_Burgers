<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Burger</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv4yHn2dYF9PjG1Xjojo4lWkd7QK5L0oM9lvPb2V9UzRiqHTXyKz6lH+yQ5" crossorigin="anonymous">
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
    <h1>Éditer un Burger</h1>

    <form action="{{ route('burgers.update', $burger->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nom:</label>
        <input type="text" name="name" value="{{ old('name', $burger->name) }}" required>
        @error('name') <p style="color:red;">{{ $message }}</p> @enderror

        <label for="price">Prix:</label>
        <input type="number" name="price" step="0.01" value="{{ old('price', $burger->price) }}" required>
        @error('price') <p style="color:red;">{{ $message }}</p> @enderror

        <label for="image">Image:</label>
        @if($burger->image)
            <div>
                <img src="{{ asset('storage/' . $burger->image) }}" alt="Image du burger" width="150">
            </div>
        @endif
        <input type="file" name="image" accept="image/*">
        @error('image') <p style="color:red;">{{ $message }}</p> @enderror

        <label for="description">Description:</label>
        <textarea name="description">{{ old('description', $burger->description) }}</textarea>
        @error('description') <p style="color:red;">{{ $message }}</p> @enderror

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="{{ old('stock', $burger->stock) }}" required>
        @error('stock') <p style="color:red;">{{ $message }}</p> @enderror

        <button type="submit">Mettre à jour</button>
    </form>

</div>

<!-- Inclure Bootstrap JS (optionnel si besoin de certaines fonctionnalités) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBdR0P9S4B1T4z4klp/8d3Pj0z6M/kPms8FfvVYKfmz3hbaE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0p5MSaBgwQ/YYbhzYtoTyXr2BLiN6YlX/Xg4pPLPi5tV0P5B" crossorigin="anonymous"></script>

</body>
</html>
