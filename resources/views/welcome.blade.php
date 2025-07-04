<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Minified version -->
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

        <!-- Un-Minified version -->
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
    </head>
    <body>
        <header>
            <h1>IA - Laravel 🤖</h1>
        </header>

        <main>
            <h1>Gerador de receisadasdtas</h1>
            <form action="{{route('ingredientes')}}" method="POST">
                @csrf
                <label for="">Digite os ingredientes que você possue</label>
                <input type="text" name="ingredientes" id="ingredientes">
                <input type="submit" value="Buscar">
            </form>
            <p>Conteúdo principal</p>
        </main>
    </body>
</html>
