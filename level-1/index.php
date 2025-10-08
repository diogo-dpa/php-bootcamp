<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-slate-900 text-gray-200">
    <?php  include('./components/header.php'); ?>

    <main class="mx-auto max-w-screen-lg min-h-20 px-3 py-6 gap-y-6">
     <?php include('./components/hero.php'); ?>

      <!-- Projetos -->
      <section id="projetos" class="space-y-3 py-6">
        <h2 class="text-2xl font-bold">Meus Projetos</h2>
        
        <!-- Projeto -->
        <?php  include('./components/projeto.php'); ?>
      </section>
    </main>

    <!-- Rodapé -->
    <footer class="mx-auto max-w-screen-lg min-h-20">

      <div class="border-t border-gray-600 pt-6 px-3 text-gray-400 text-sm">
        @ Copyright <?=date('Y'); ?> - Todos os direitos reservados
      </div>

    </footer>
  </body>
</html>
