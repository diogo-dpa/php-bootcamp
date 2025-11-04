<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookwise</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-stone-950 text-stone-300">
    <header class=" bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
            <div class="font-bold text-xl tracking-wide">Book Wise</div>

            <ul class="flex space-x-4 font-bold">
                <li><a href="/" class="text-lime-500">Explorar</a></li>
                <li><a href="/meus-livros.php" class="hover:underline">Meus livros</a></li>
            </ul>
            <ul>
                <li><a href="/login.php" class="hover:underline">Fazer Login</a></li>
            </ul>
        </nav>
    </header>
    

    <main class="mx-auto max-w-screen-lg space-y-6">
        <form class="w-full flex space-x-2">
            <input type="text" placeholder="Pesquisar..." class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full" name="pesquisar">
            <button type="submit">Pesquisar</button>
        </form>

        <!-- Lista de livros -->
        <section class="grid gap-4 grid-cols-3 md:grid-cols-2 lg:grid-cols-3">
            <!-- Livros -->
            <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
                <div class="flex">
                    <div class="w-1/3">Image</div>
                    <div>
                        <a href="/livro.php?" class="font-semibold hover:underline">Titulo</a>
                        <div class="text-xs text-italic">Autor</div>
                        <div class="text-xs text-italic">Avaliação</div>
                    </div>
                </div>
                <div class="text-sm">
                    Descrição
                </div>
            </div>

            <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
                <div class="flex">
                    <div class="w-1/3">Image</div>
                    <div>
                        <a href="/livro.php?" class="font-semibold hover:underline">Titulo</a>
                        <div class="text-xs text-italic">Autor</div>
                        <div class="text-xs text-italic">Avaliação</div>
                    </div>
                </div>
                <div class="text-sm">
                    Descrição
                </div>
            </div>
            
        </section>
    </main>
</body>
</html>