<?php 
    $items = [
        ['href' => '#projetos', 'src' => 'github.svg', 'alt' => 'Github'],
        ['href' => '#projetos', 'src' => 'linkedin.svg', 'alt' => 'LinkedIn'],
        ['href' => '#projetos', 'src' => 'twitter.svg', 'alt' => 'Twitter'],
        ['href' => '#projetos', 'src' => 'facebook.svg', 'alt' => 'Facebook'],
    ]
?>

 <!-- Hero -->
 <section class="flex gap-x-3">
    <!-- Título -->
    <div class="w-2/3">
        <h1 class="text-3xl font-bold">Oi, meu nome é Diogo</h1>
        <p class="text-xl leading-6 mt-6">Falando um pouco sobre mim...</p>
        <p>
        <!-- Links de redes sociais -->
        <ul class="flex gap-x-3 mt-3">
            <?php foreach($items as $item): ?>
                <li><a href="<?=$item['href']?>" class="hover:underline"><img class="h-8 hover:animate-bounce" src="<?=$item['src']?>" alt="<?=$item['alt']?>" class="w-6 h-6"></a></li>
            <?php endforeach; ?>
        </ul>
        </p>
    </div>

    <!-- Imagem -->
    <div class="w-1/3 flex items-center justify-center">
        <div><img class="h-60 -mt-6 hover:animate-pulse" src="img/foto.jpg" alt="Foto de Diogo"></div>
    </div>
</section>