<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/icone-site.png" type="image/x-icon" />
    <title>Portal Mão Amiga - Início</title>
</head>

<?php include('common/header.php'); ?>

<body>

    <section class="container container-margin index-mensagem">
        <div class="row justify-content-center">

            <div class="col-10 col-xl-5 col-lg-5 col-sm-8 embed-responsive embed-responsive-16by9">
                <video src="video/aulas/teste.mp4" type="video/mp4" autoplay loop controls muted></video>
            </div>

            <div class="col-10 col-xl-6 col-lg-6 col-sm-11">
                <div class="quadro-mensagem">
                    <p class="index-mensagem" style="padding: 1em;">
                        O Portal Mão Amiga é um site em que professores podem compartilhar conteúdos escritos e em forma de vídeo, transcritos em Língua Brasileira de Sinais
                        (LIBRAS), permitindo o aprendizado por todos os seus alunos. Os discentes poderão acompanhar o conteúdo escrito ao mesmo tempo em que veem o vídeo em
                        LIBRAS, além de poderem baixar qualquer conteúdo disponibilizado pelos professores.
                    </p>

                    <a href="sobre.php">
                        <div class="text-center">
                            <button class="btn botao-saiba-mais" type="button">Saiba mais</button>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-3 col-xl-1 col-lg-1 col-sm-2" style="margin-bottom: 1em;">
                <a class="video-popup" href="video/index-texto.mp4">
                    <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video-azul"></div>
                </a>
            </div>

        </div>
    </section>

    <section class="container container-margin index-mensagem section-aulas-destaque">
        <div class="container" style="margin-top: 2em">
            <div class="row justify-content-center">
                <div class="col-4 col-xl-4 col-lg-5 col-md-7 col-sm-10 col-xs-7">
                    <p class="aulas-destaque-frase">Aulas em destaque</p>
                </div>

                <a class="video-popup" href="video/o-portal-acessivel.mp4">
                    <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video-azul"></div>
                </a>
            </div>
        </div>


        <div class="row justify-content-center">

            <a href="area-biologia.php" class="my-auto">
                <div class="my-auto">
                    <img class="aula-imagem-index" src="img/aulas/biologia1.jpg" alt="Representação artística da evolução do ser humano.">
                </div>
            </a>



            <?php $__currentLoopData = $aulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p> <?php echo e($post ->title); ?> </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            <div class="col my-auto">
                <a href="area-biologia.php">
                    <p class="aula-destaque-titulo text-center">Teoria da Evolução</p> <br>
                </a>
                A teoria da evolução das espécies tem como principal articulador o naturalista britânico Charles Darwin (1809-1882)
                sendo o conjunto de suas teorias evolutivas nomeada de "Darwinismo". Darwin afirmou que os seres vivos, inclusive o
                homem, descendem de ancestrais comuns, que modificam-se ao longo do tempo... <br>
                Por professor <span class="aula-destaque-professor">Fulano da Silva</span>
            </div>

            <div class="col-10 col-xl-4 col-lg-4 col-md 5 col-sm-8 embed-responsive embed-responsive-16by9 my-auto">
                <video src="video/aulas/teste.mp4" controls></video>
            </div>
            <hr>
        </div>

    </section>





</body>

<?php include('common/footer.php'); ?>

</html><?php /**PATH C:\xampp\htdocs\Portal Mão Amiga LARAVEL\mao-amiga\resources\views/index.blade.php ENDPATH**/ ?>