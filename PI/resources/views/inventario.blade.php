@extends('layouts.nav')

@section('contenido')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .flex {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 10px 20px;
            color: white;
            background-color: #007BFF;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            color: #fff;
            background-color: #dc3545;
            cursor: pointer;
            padding: 5px 10px;
            border: none;
        }
        .input {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        .bg-red {
            background-color: #f8d7da;
        }
        .dialog {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 1px solid #ddd;
            padding: 20px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .dialog.open {
            display: block;
        }
        .dialog-header {
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Inventario</h1>

    <!-- Barra de búsqueda y filtros -->
    <div class="flex">
        <input type="text" placeholder="Buscar productos..." class="input" id="search">
        <select class="input" id="category-filter">
            <option value="">Categoría</option>
            <option value="Electrónica">Electrónica</option>
            <option value="Ropa">Ropa</option>
            <option value="Hogar">Hogar</option>
        </select>
        <label>
            <input type="checkbox" id="low-stock-filter"> Mostrar solo stock bajo
        </label>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="product-list">
            <tr class="bg-red">
                <td>Producto A</td>
                <td>Electrónica</td>
                <td><input type="number" value="5" class="input" style="width: 60px;"></td>
                <td>$29.99</td>
                <td><button class="btn-delete">Eliminar</button></td>
            </tr>
        </tbody>
    </table>

    <button class="btn" onclick="openDialog()">Agregar Producto</button>

    <div class="dialog" id="dialog">
        <div class="dialog-header">Agregar Nuevo Producto</div>
        <div>
            <label>Nombre:</label>
            <input type="text" class="input" id="new-product-name">
            <div class="error" id="name-error"></div>
        </div>
        <div>
            <label>Categoría:</label>
            <select class="input" id="new-product-category">
                <option value="Electrónica">Electrónica</option>
                <option value="Ropa">Ropa</option>
                <option value="Hogar">Hogar</option>
            </select>
            <div class="error" id="category-error"></div>
        </div>
        <div>
            <label>Stock Inicial:</label>
            <input type="number" class="input" id="new-product-stock">
            <div class="error" id="stock-error"></div>
        </div>
        <div>
            <label>Precio:</label>
            <input type="number" class="input" id="new-product-price" step="0.01">
            <div class="error" id="price-error"></div>
        </div>
        <button class="btn" onclick="addProduct()">Agregar Producto</button>
        <button class="btn" onclick="closeDialog()">Cancelar</button>
    </div>
</div>

<script>
    // Código JavaScript para abrir y cerrar el diálogo
    function openDialog() {
        document.getElementById('dialog').classList.add('open');
    }
    function closeDialog() {
        document.getElementById('dialog').classList.remove('open');
        clearErrors();
    }

    function clearErrors() {
        document.getElementById('name-error').innerText = '';
        document.getElementById('category-error').innerText = '';
        document.getElementById('stock-error').innerText = '';
        document.getElementById('price-error').innerText = '';
    }

    function validateFields(name, category, stock, price) {
        let isValid = true;

        if (!name) {
            document.getElementById('name-error').innerText = 'El nombre es obligatorio.';
            isValid = false;
        }
        if (!category) {
            document.getElementById('category-error').innerText = 'La categoría es obligatoria.';
            isValid = false;
        }
        if (!stock || stock < 1) {
            document.getElementById('stock-error').innerText = 'El stock debe ser un número entero mayor o igual a 1.';
            isValid = false;
        }
        if (price === null || price < 0) {
            document.getElementById('price-error').innerText = 'El precio debe ser un número mayor o igual a 0.';
            isValid = false;
        }

        return isValid;
    }

    function addProduct() {
        const name = document.getElementById('new-product-name').value;
        const category = document.getElementById('new-product-category').value;
        const stock = parseInt(document.getElementById('new-product-stock').value, 10);
        const price = parseFloat(document.getElementById('new-product-price').value);

        if (validateFields(name, category, stock, price)) {
            const productList = document.getElementById('product-list');
            const newRow = `
                <tr>
                    <td>${name}</td>
                    <td>${category}</td>
                    <td>${stock}</td>
                    <td>$${price.toFixed(2)}</td>
                    <td><button class="btn-delete">Eliminar</button></td>
                </tr>
            `;
            productList.insertAdjacentHTML('beforeend', newRow);
            closeDialog();
        }
    }
</script>

</body>
</html>

@endsection
