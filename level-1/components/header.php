<?php 
    $items = [
        ['href' => '#projetos', 'text' => 'Projetos'],
        ['href' => '#projetos', 'text' => 'Github'],
        ['href' => '#projetos', 'text' => 'LinkedIn'],
        ['href' => '#projetos', 'text' => 'Twitter'],
    ]
?>

<!-- Cabeçalho -->
<header
    class="mx-auto max-w-screen-lg px-3 py-6 flex justify-between items-center">
    <!-- Logo -->
    <div class="font-bold text-xl text-cyan-600">Meu portfolio...</div>

    <!-- Links -->
    <div>
        <ul class="flex gap-x-3 font-medium">
            <?php foreach ($items as $item): ?>
                <li><a href="<?=$item['href']?>" class="hover:underline"><?=$item['text']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</header>