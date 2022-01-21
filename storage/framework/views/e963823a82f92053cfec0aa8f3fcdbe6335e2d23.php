

<?php $__env->startSection('pageTitle'); ?> Editar aula <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxTitle'); ?> Editar a aula <?php echo e($aula->title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxVideo'); ?>                <?php $__env->stopSection(); ?>

<?php $__env->startSection('boxContent' ); ?>
    Nesta área você poderá editar o conteúdo da aula cadastrada. <br>
    Após a edição, você pode
    <span style="font-weight: bold; color: #00AEEF">confirmar <i class="fas fa-check"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">cancelar <i class="fas fa-times"></i></span> as edições.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('formDetails'); ?>action="<?php echo e(route('aula.update', $aula->id)); ?>" method="post" enctype="multipart/form-data"<?php $__env->stopSection(); ?>

<?php $__env->startSection('csrfMethod'); ?>
    <?php echo csrf_field(); ?>
    <?php echo method_field('put'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('valueTitle'); ?> value="<?php echo e($aula->title); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueDiscipline'); ?> value="<?php echo e($aula->discipline); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueContent'); ?><?php echo e($aula->content); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('valueUserCreator'); ?> value="<?php echo e($aula->userCreator); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueImageFont'); ?> value="<?php echo e($aula->imageFont); ?>" <?php $__env->stopSection(); ?>
<?php $__env->startSection('valueReferences'); ?><?php echo e($aula->references); ?><?php $__env->stopSection(); ?>

<?php echo $__env->make('telas.common.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Portal Mão Amiga LARAVEL\mao-amiga\resources\views/telas/edit-aula.blade.php ENDPATH**/ ?>