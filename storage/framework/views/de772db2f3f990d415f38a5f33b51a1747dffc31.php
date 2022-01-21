

<?php $__env->startSection('pageTitle'); ?> Cadastrar aula <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxTitle'); ?> <i class="fas fa-plus-circle"></i> Cadastrar aula <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxVideo'); ?> <?php echo e(Storage::disk('s3')->url('cadastrar_aula.mp4')); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('boxContent' ); ?>
    Nesta área você poderá cadastrar uma nova aula. Para que o usuário surdo consiga captar a mensagem da aula com clareza,
    é importante que o vídeo esteja fiel ao restante do conteúdo. Os campos de preenchimento da aula são:<br><br>

    <span style="color: #00AEEF; font-weight: bold;">
        1 - TÍTULO <br>
        2 - ÁREA DE ENSINO <br>
        3 - DISCIPLINA <br>
        4 - SEU NOME DE USUÁRIO <br>
        5 - DATA DA PUBLICAÇÃO DA AULA <br>
        6 - VÍDEO EM LIBRAS DA AULA <br>
        7 - CONTEÚDO DA AULA <br>
        8 - IMAGEM PRINCIPAL DA AULA <br>
        9 - FONTE DA IMAGEM PRINCIPAL DA AULA <br>
        10 - IMAGENS E CONTEÚDO PARA BAIXAR <br>
        11 - REFERÊNCIAS.
    </span> <br> <br>
    
    Os campos com um <b>*</b> são obrigatórios.
    O seu nome de usuário e a data de publicação serão cadastrados automaticamente. <br>
    Após a inserção das informações, você pode 
    <span style="font-weight: bold; color: #00AEEF">confirmar <i class="fas fa-check"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">cancelar <i class="fas fa-times"></i></span> o cadastro da aula. <br>
    Esperamos que o site possa ser útil para a integração e estudos dos estudantes surdos. <br>
    Boa aula!

<?php $__env->stopSection(); ?>

<?php $__env->startSection('formDetails'); ?>action="<?php echo e(route ('aulas.store')); ?>" method="post" enctype="multipart/form-data"<?php $__env->stopSection(); ?>

<?php $__env->startSection('csrfMethod'); ?>
    <?php echo csrf_field(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('valueTitle'); ?> value="<?php echo e(old('title')); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueDiscipline'); ?> value="<?php echo e(old('discipline')); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueContent'); ?> value="content" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueImageFont'); ?> value="<?php echo e(old('imageFont')); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueReferences'); ?><?php echo e(old('references')); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/telas/cadastro-aulas.blade.php ENDPATH**/ ?>