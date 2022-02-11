

<?php $__env->startSection('css'); ?>
    <?php echo e(asset('css/aulas.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?><?php echo e($aula->title); ?> por <?php echo e($userCreator['name']); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('boxTitle'); ?><i class="fas fa-video"></i> Assistir aula <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxVideo'); ?> <?php echo e(Storage::disk('s3')->url('assistir_aula.mp4')); ?> <?php $__env->stopSection(); ?> 

<?php $__env->startSection('boxContent' ); ?>
    Caro usuário(a), esta é a sessão de aula. Você pode acompanhar a aula de forma escrita ou em vídeo. Ao clicar no da
    <span style="color: #00AEEF">câmera</span> <i class="fas fa-video" style="color: #00AEEF"></i>, o vídeo em LIBRAS
    da aula aparecerá com a tradução do conteúdo. Há também imagens para visualização, se disponibilizado, apostilas ou
    atividades para serem baixadas e as referências usadas no conteúdo. Você também pode realizar comentários <i class='fa fa-comments' style="color: #00AEEF"></i>, no final da página de cada aula.<br>
    Se você for o criador desta aula, você poderá
    <span style="font-weight: bold; color: #eeae00">editá-la <i class="fas fa-pencil-alt"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">deletá-la <i class="fa fa-trash"></i></span>.<br>
    Esperamos que essa aula ajude no seu aprendizado. <br>
    Bons estudos!

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Botão Subir ao topo -->
    <a id="subirTopo">
        <i class="fas fa-arrow-up"></i>
    </a>

    <?php if(session('message')): ?>
    <div>
        <h5>
            <?php echo e(session('message')); ?>

        </h5>
    </div>
    <?php endif; ?>

    <section class="container container-margin">
        <div class="quadro-aula">

            <div class="informacoes-aula">

                <h2><?php echo e($aula->title); ?></h2>
                <h5>Ensino <?php echo e($aula->grade); ?> - <?php echo e($aula->discipline); ?></h5>
                <p class="nome-userCreator">Por <?php echo e($userCreator['name']); ?><span style="color: #00AEEF"></span></p>
                <p class="aula-data-publicacao" id="timestamp">Postada em <?php echo e($aula->created_at->format('d/m/Y')); ?></p>
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
                    <video src="<?php echo e(Storage::disk('s3')->url($aula->aulaVideo)); ?>" controls></video>
                </div>
                <!-- <p class="aula-imagem-principal-fonte justify-content-center">Este vídeo é apenas uma representação genérica
                    e não corresponde ao que está escrito na aula.</p> -->
            </div>

            <p class="" > <?php echo $aula->content; ?> </p> 

            <div class="aula-imagem-quadro">
                <img class="aula-imagem-principal" src="<?php echo e(Storage::disk('s3')->url($aula->image)); ?>" alt=""> 
                <p class="aula-imagem-principal-fonte justify-content-center">Fonte: <?php echo e($aula->imageFont); ?></p>
            </div>

            <div>
                <p class="conteudos-referencia-titulo" style="margin-top: 1em;">Referências:</p>
                <p class="referencias"><?php echo e($aula->references); ?></p>

                <p class="conteudos-referencia-titulo" style="margin-bottom: 1em;">Imagens e conteúdos para baixar:</p>
                <div class="listaFiles">
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('aula.fileDownload', $file->id)); ?>" class="conteudo-pra-baixar">
                            <i class="fas fa-file-download"></i>
                            <?php echo e($file->title); ?>

                        </a> <br>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <?php if($aula->userId == Auth::id()): ?>
                <div class="text-center justify-content-center row" style="margin-bottom: 3em;">
                
                    <div class="col-2">
                        <a href="<?php echo e(route('aula.edit', $aula->id)); ?>">
                            <button type="submit" class="btn botao-del-edit edit">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </a>
                    </div>
                
                    <div class="col-2">
                        <form action="<?php echo e(route('aula.destroy', $aula->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn botao-del-edit delet">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <div style="margin-bottom: 3em; font-size: 1.2em" class="visualizações">
            <i class="fas fa-eye" style="color:#00AEEF"></i> <?php echo e($aula->viewCount); ?> Visualizações
        </div> 

        <!-- Comentários -->
        <div class="commentSession">
            <h5><i class="fas fa-comments"></i> Comentários</h5>
            <?php if((Auth::id()!=null)): ?>
                <div class="card-body">
                    <p style="color: #00AEEF">
                        <?php
                            $qntComments = count($replies);
                            echo "<i class='fa fa-comments'></i>  $qntComments comentários";
                        ?>
                    </p>

                    <form action="<?php echo e(route('comment.add')); ?>" method="post" enctype="multipart/form-data"> 
                    
                        <?php echo csrf_field(); ?>
                    
                        <div class="form-group row" style="margin-bottom: 2em">
                            <?php  $avatar = Auth::user()->avatar; ?>

                            <div class="col-1">
                                <img src="<?php echo e(Storage::disk('s3')->url($avatar)); ?>" class="userAvatarComment">
                            </div>
                    
                            <div class="col">
    
                                 <textarea type="text" name="comment" class="form-control two" cols="1" rows="5" placeholder="Entre na conversa..." required></textarea>
                                 <div class="caixa-emoji">
                                    <button type="button" class="botao-emoji comm-emoji">&#128512; Emojis</button>
                                 </div>
                                 

                                <input type="hidden" name="aula_id" value="<?php echo e($aula->id); ?>" /> <br>
                                <div class="form-group">
                                    <input type="hidden" class="btn btn-sm btn-outline-danger py-0" />
                                    <button type="submit" class="btn botaoComment"><i class="fas fa-comments"></i> Comentar
                                </div>
                            </div>
                        </div>
                    
                    </form>

                </div>
            <?php else: ?>
                <div class="facaLogin">
                    
                    <a href="<?php echo e(route('aula.userList')); ?>" class="nav-item nav-link" style="font-size: 1.5em">
                        <h5><i class="fas fa-sign-in-alt"></i> Clique aqui e faça login para participar da conversa</h5>
                    </a>

                    <img class="aula_gif" src="<?php echo e(asset('img/form-sinais/gif_cadastrar_usuario.gif')); ?>" alt="Imagem animada com os sinais em LIBRAS para 'Nome'"> <br>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('register')); ?>">
                        <i class="fas fa-user-plus"></i> <?php echo e(__('Não tem cadastrado? Clique aqui')); ?>

                    </a>
                </div>
                <hr>
            <?php endif; ?>
        
            <!-- Scrolling pagination-->
            <div class="scrolling-pagination">
                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($comment->parent_id == 0): ?>
                        <?php echo $__env->make('posts.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
            
                    <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($replie->parent_id == $comment->id): ?>
                            <?php echo $__env->make('posts.replies', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($comments->links()); ?>

            </div>
            
        </div>

    </section>

<!-- Script do botão Subir ao topo -->
<script type="text/javascript">
    jQuery(document).ready(function(){
    
    jQuery("#subirTopo").hide();
    
    jQuery('a#subirTopo').click(function () {
             jQuery('body,html').animate({
               scrollTop: 0
             }, 800);
            return false;
       });
    
    jQuery(window).scroll(function () {
             if (jQuery(this).scrollTop() > 1000) {
                jQuery('#subirTopo').fadeIn();
             } else {
                jQuery('#subirTopo').fadeOut();
             }
         });
    });
</script>

<!-- Scripts scroll infinito -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<script type="text/javascript" src="<?php echo e(asset('js/scrolling-pagination.js')); ?>"></script>


<script src="<?php echo e(asset('js/vanillaEmojiPicker.js')); ?>"></script>
<script>

    new EmojiPicker({
        trigger: [
            {
                selector: '.comm-emoji',
                insertInto: '.two' // '.selector' can be used without array
            },
            {
                selector: '.rep-emoji',
                insertInto: '.replie-comment'
            }
        ],
        closeButton: true,
        //specialButtons: green
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.mainContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/telas/aula.blade.php ENDPATH**/ ?>