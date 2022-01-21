

<?php $__env->startSection('css'); ?>
    <?php echo e(asset('css/aulas.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>Aulas <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxTitle'); ?><i class="fas fa-video"></i> Aulas <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxVideo'); ?> <?php echo e(Storage::disk('s3')->url('aulas.mp4')); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('boxContent' ); ?>
    Nesta área você pode visualizar todas as aulas criadas, ou buscar por alguma específica. Para visualizar os detalhes da aula,
    basta clicar na sua imagem ou título. Para realizar uma busca por alguma aula específica, basta escrever alguma palavra-chave
    no campo abaixo, e então clicar no botão
    <i class="fas fa-search" style="color:#00AEEF"></i>. <br>
    Você pode usar o título da aula, o criador da aula, a disciplina, a área de ensino ou alguma parte do conteúdo da aula como palavra-chave.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Botão Subir ao topo -->
    <a id="subirTopo">
        <i class="fas fa-arrow-up"></i>
    </a>

    <section class="searchBar">
        <form action="<?php echo e(route ('aula.search')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="input-group mb-3" >
                <input type="text" name="search" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search" style="color:#00AEEF"></i></button>
                </div>
            </div>
        </form>
    </section>

    <?php if(session('message')): ?>
        <div>
            <h5>
                <?php echo e(session('message')); ?>

            </h5>
        </div>
    <?php endif; ?>
    
    <section class="container container-margin index-mensagem section-aulas-destaque">
    
        <div class="row justify-content-center" style="padding: 1em;">
    
            <?php $__currentLoopData = $aulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-4 quadro-geral">
                    <a href="<?php echo e(route('aula.viewAula', $aula->id)); ?>" class="my-auto">
                        <img class="aula-imagem-index" src="<?php echo e(Storage::disk('s3')->url($aula->image)); ?>" alt="">
        
                        <p class="aula-destaque-titulo text-center"><?php echo mb_strimwidth("{$aula->title}", 0, 35, "..."); ?></p> 
                    </a>
        
                    <p class="text-center"> Por <span class="aula-destaque-user"><?php echo e($aula->user->name); ?></span></p>
                    <p class="aula-data-publicacao" id="timestamp">
                        <i class="fas fa-eye" style="color:#00AEEF"></i> <?php echo e($aula->viewCount); ?> Visualizações &#8226 
                        <?php echo e($aula->created_at->format('d/m/Y')); ?>

                    </p>
        
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <hr>

            <?php if(isset($filters)): ?>
                <?php echo e($aulas->appends($filters)->links()); ?>

                
            <?php else: ?>
            <?php echo e($aulas->links()); ?>

                
            <?php endif; ?>
            
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.mainContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/telas/buscaAula.blade.php ENDPATH**/ ?>