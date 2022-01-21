

<?php $__env->startSection('pageTitle'); ?> Cadastrar aula <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxTitle'); ?> Cadastrar aula <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxVideo'); ?>                <?php $__env->stopSection(); ?>

<?php $__env->startSection('boxContent' ); ?>
    Nesta área você poderá cadastrar uma nova aula. Preencha os campos de acordo com o que é pedido. O seu nome de usuário e a data de publicação serão cadastrados automaticamente,
    e a fonte da imagem principal, os conteúdos para baixar e as referências são opcionais.
    Para que o usuário surdo consiga captar o conteúdo, é de extrema importância que o video esteja fiel ao conteúdo escrito. Além disso, lembre-se de seguir essa ordem ao gravar
    o vídeo: <br>
    <span style="color: #00AEEF; font-weight: bold;">
        TÍTULO, ÁREA DE ENSINO, DISCIPLINA, SEU NOME DE USUÁRIO, DATA DA PUBLICAÇÃO DA AULA, CONTEÚDO DA AULA, DESCRIÇÃO DA IMAGEM PRINCIPAL DA AULA,
        FONTE DA IMAGEM PRINCIPAL DA AULA, IMAGENS E CONTEÚDO PARA BAIXAR, REFERÊNCIAS
    </span>. <br>
    Após a inserção das informações, você pode
    <span style="font-weight: bold; color: #00AEEF">confirmar <i class="fas fa-check"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">cancelar <i class="fas fa-times"></i></span> o cadastro da aula. <br>
        Esperamos que o site possa seja útil para a integração e estudos dos estudantes surdos. <br>
        Boa aula!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('formDetails'); ?>action="<?php echo e(route ('aulas.store')); ?>" method="post" enctype="multipart/form-data"<?php $__env->stopSection(); ?>

<?php $__env->startSection('csrfMethod'); ?>
    <?php echo csrf_field(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('valueTitle'); ?> value="<?php echo e(old('title')); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueDiscipline'); ?> value="<?php echo e(old('discipline')); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueContent'); ?><?php echo e(old('content')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('valueUserCreator'); ?> value="<?php echo e(old('userCreator')); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueImageFont'); ?> value="<?php echo e(old('imageFont')); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueReferences'); ?><?php echo e(old('references')); ?><?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Portal Mão Amiga LARAVEL\mao-amiga\resources\views/telas/cadastro-aulas.blade.php ENDPATH**/ ?>