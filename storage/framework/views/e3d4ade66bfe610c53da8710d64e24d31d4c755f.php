

<?php $__env->startSection('css'); ?>
    <?php echo e(asset('css/aulas.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?><?php echo e($aula->title); ?> por <?php echo e($aula->userCreator); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('boxTitle'); ?>Aula <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxVideo'); ?>                <?php $__env->stopSection(); ?>

<?php $__env->startSection('boxContent' ); ?>
    Caro usuário(a), está é a sessão de aula. Você pode acompanhar a aula de forma escrita ou em vídeo. Ao clicar no ícone
    da <span style="color: #00AEEF">câmera</span> <i class="fas fa-video" style="color: #00AEEF"></i>,o vídeo em LIBRAS da
    aula aparecerá com intérprete explicando o conteúdo. Há também imagens para visualização e, se disponibilizado,
    apostilas ou atividades para serem baixadas e as referências usadas no conteúdo. <br>
    Se você for o criador desta aula, você poderá
    <span style="font-weight: bold; color: #eeae00">edita-la <i class="fas fa-pencil-alt"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">deleta-la <i class="fa fa-trash"></i></span>.<br>
    Esperamos que essa aula ajude no seu aprendizado.<br>
    Bons estudos!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="container container-margin">
        <div class="quadro-aula">

            <?php if(session('message')): ?>
            <div>
                <h5>
                    <?php echo e(session('message')); ?>

                </h5>
            </div>
            <?php endif; ?>

            <div class="informacoes-aula">

                <h2><?php echo e($aula->title); ?></h2>
                <h5>Ensino <?php echo e($aula->grade); ?> - <?php echo e($aula->discipline); ?></h5>
                <p class="nome-userCreator">Por <span style="color: #00AEEF"><?php echo e($aula->userCreator); ?></span></p>
                <p class="aula-data-publicacao" id="timestamp">Postada em <?php echo e($aula->created_at->format('d/m/Y')); ?></p>
            </div>

            <p class="aula-texto"><?php echo e($aula->content); ?></p>

            <div class="aula-imagem-quadro">
                <img class="aula-imagem-principal" src="<?php echo e(url("storage/{$aula->image}")); ?>" alt="">
                <p class="aula-imagem-principal-fonte justify-content-center">Fonte: <?php echo e($aula->imageFont); ?></p>
            </div>

            <div class="text-center">
                <button class="aula-video-botao btn" type="button" data-toggle="collapse" data-target="#videoExpand"
                    aria-expanded="false" aria-controls="videoExpand">
                    <i class="fas fa-video fa-lg" style="color: white"></i>
                </button>
            </div>

            <div class="aula-video collapse" id="videoExpand">

                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <video src="<?php echo e(url("storage/{$aula->aulaVideo}")); ?>" controls></video>
                </div>
                <p class="aula-imagem-principal-fonte justify-content-center">Este vídeo é apenas uma representação genérica
                    e não corresponde ao que está escrito na aula.</p>
            </div>

            <div class="conteudo-pra-baixar-referencias">

                <p class="conteudos-referencia-titulo" style="margin-top: 1em;">Referências:</p>
                <p class="referencias"><?php echo e($aula->references); ?></p>

                <p class="conteudos-referencia-titulo" style="margin-bottom: 1em;">Imagens e conteúdos para baixar:</p>
                <div>
                   
                </div>

                <!--<a class="arquivos-para-baixar" href="arquivos-para-baixar/biologia1.jpg" download>
                    <img src="arquivos-para-baixar/biologia1.jpg">
                </a>-->
            </div>

        </div>

        <div class="text-center justify-content-center row" style="margin-bottom: 3em;">

            <div class="col-2">
                <a href="<?php echo e(route('aula.edit', $aula->id)); ?>">
                    <button type="submit" class="btn botao-del-edit edit fas fa-pencil-alt fa-lg"></button>
                </a>
            </div>

            <div class="col-2">
                <form action="<?php echo e(route('aula.destroy', $aula->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn botao-del-edit delet fas fa-trash fa-lg"></button>
                </form>
            </div>

        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.mainContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Portal Mão Amiga LARAVEL\mao-amiga\resources\views/telas/aula.blade.php ENDPATH**/ ?>