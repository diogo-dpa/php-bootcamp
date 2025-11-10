<div class="mt-6 grid grid-cols-2 gap-2">
    <div class="border border-stone-700 rounded p-4">
        <h1 class="border-b border-stone text-stone-400 font-bold px-4 py-2">Login</h1>
        <form action="" class="p-4 space-y-4">
            <div class="flex flex-col">
                <label for="email" class="text-stone-500 mb-1">Email</label>
                <input 
                    type="text" 
                    name="email"
                    required 
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full" 
                >
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-stone-500 mb-1">Senha</label>
                <input 
                    type="password" 
                    name="password"
                    required 
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full" 
                >
            </div>
    
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">Logar</button>
        </form>
    </div>

    <div class="border border-stone-700 rounded p-4">
        <h1 class="border-b border-stone text-stone-400 font-bold px-4 py-2">Registro</h1>
        <form class="p-4 space-y-4" method="post" action="/registrar">
            <?php if (strlen($mensagem) > 0): ?>

                <div class="border-green-800 bg-green-900 text-green-400 px-4 py-1 rounded-md border-2">
                    <?= $mensagem ?>
                </div>

            <?php endif; ?>
            <div class="flex flex-col">
                <label for="nome" class="text-stone-500 mb-1">Nome</label>
                <input 
                    type="text" 
                    name="nome"
                    required 
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full" 
                >
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-stone-500 mb-1">Email</label>
                <input 
                    type="text" 
                    name="email"
                    required 
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full" 
                >
            </div>
            <div class="flex flex-col">
                <label for="email-confirmation" class="text-stone-500 mb-1">Confirme o seu Email</label>
                <input 
                    type="text" 
                    name="email-confirmation"
                    required 
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full" 
                >
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-stone-500 mb-1">Senha</label>
                <input 
                    type="password" 
                    name="password"
                    required 
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1 w-full" 
                >
            </div>
            <button type="reset" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">Cancelar</button>
            <button type="submit" class="border-stone-800 bg-stone-900 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800">Registrar</button>
        </form>
    </div>
    
</div>