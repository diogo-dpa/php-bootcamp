<?php 
    $projetos = [
        [
          "titulo" => "Meu portifolio",
          "finalizado" => false,
          "ano" => 2024,
          "descricao" => "Este é um projeto de teste",
          "stack" => ["PHP", "MySQL", "HTML", "CSS", "JavaScript"],
          "imagem" => "img/projeto1.jpg",
        ],
        [
          "titulo" => "Lista de tarefas",
          "finalizado" => true,
          "ano" => 2025,
          "descricao" => "Este é um projeto de teste",
          "stack" => ["PHP", "MySQL", "HTML", "CSS", "JavaScript"],
          "imagem" => "img/projeto2.jpg",
        ],
        [
          "titulo" => "Projeto 3",
          "finalizado" => false,
          "ano" => 2025,
          "descricao" => "Este é um projeto de teste",
          "stack" => ["PHP", "MySQL", "HTML", "CSS", "JavaScript"],
          "imagem" => "img/projeto3.jpg",
        ]
      ];

?>

<?php foreach($projetos as $projeto): ?>
    <div class="bg-slate-800 rounded-lg p-3 flex items-center space-x-3">
        <div class="w-1/4 flex items-center justify-center">
            <img class="h-42 rounded-md" src="<?=$projeto['imagem']?>" alt="<?=$projeto['titulo']?>">
        </div>
        <div class="w-3/4 space-y-3">
        <div class="flex gap-3 justify-between">
    
            <h3 class="font-semibold text-xl">
                <?php if($projeto['finalizado']): ?>✅<?php endif; ?>
                    <?=$projeto['titulo']?>
                    <?php if($projeto['finalizado']): ?>
                        <span class="text-xs text-gray-400 opacity-50 italic">(finalizado em <?=$projeto['ano']?>)</span>
                        
                    <?php else: ?>
                        <span class="text-xs text-gray-400 opacity-50 italic">(em andamento)</span>
                    <?php endif; ?>
            </h3>
    
            <div class="space-x-1">
                <?php
                    $colors = ['sky', 'lime', 'fuchsia', 'rose', 'amber']; 
                    foreach($projeto['stack'] as $posicao =>$stack): 
                ?>
                    <span class="bg-<?=$colors[$posicao]?>-400 text-<?=$colors[$posicao]?>-900 rounded px-2 py-1 font-medium text-sm"><?=$stack?></span>
                <? endforeach; ?>
            </div>
        </div>
    
        <p class="mt-3 leading-6"><?=$projeto['descricao']?></p>
        </div>
    </div>
<? endforeach; ?>
