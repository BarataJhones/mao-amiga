

<?php $__env->startSection('css'); ?>
    <?php echo e(asset('css/userArea.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageTitle'); ?>Tela do usuário <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxTitle'); ?>Tela do usuário <?php $__env->stopSection(); ?>
<?php $__env->startSection('boxVideo'); ?>                <?php $__env->stopSection(); ?>

<?php $__env->startSection('boxContent' ); ?>
    Nesta área você pode visualizar seus dados cadastrais, suas aulas criadas e seus histório de visualização de aulas.
    Ao clicar na seta para baixo, a área clicada irá expandir e mostrar o conteúdo relacionado. <br><br>

    Na sessão <span style="font-weight: bold; color: #00AEEF">Meus dados</span> você pode visualizar seus dados cadastrais e
    <span style="font-weight: bold; color: #eeae00">edita-los <i class="fas fa-pencil-alt"></i></span>. <br><br>

    Na sessão <span style="font-weight: bold; color: #00AEEF">Minhas aulas</span> você pode visualizar as suas aulas criadas,
    <span style="font-weight: bold; color: #00AEEF">criar novas aulas <i class="fas fa-plus-circle"></i></span>,
    <span style="font-weight: bold; color: #eeae00">edita-las <i class="fas fa-pencil-alt"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">deleta-las <i class="fa fa-trash"></i></span>.<br><br>

    Na sessão <span style="font-weight: bold; color: #00AEEF">Meu histórico</span> você pode conferir o seu histórico de
    aulas assistidas,
    visualizar as aulas ou
    <span style="font-weight: bold; color: #ff4e4e">deletar o histórico <i class="fa fa-trash"></i></span>.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="container container-margin">

        <?php if(session('message')): ?>
        <div>
            <h5>
                <?php echo e(session('message')); ?>

            </h5>
        </div>
        <?php endif; ?>

        <div data-toggle="collapse" data-target="#listExpand" aria-expanded="false" aria-controls="listExpand">
            <h5>Minhas aulas <i class="fas fa-chevron-circle-down fa-lg"></i></h5>
        </div>

        <div class="aula-video collapse" id="listExpand">

            <div class="botaoAdd">
                <a href="<?php echo e(route('aula.cadastra')); ?>">
                    <i class="fas fa-plus-circle fa-3x"></i>
                </a>
            </div>

            <table class="table table-hover table-striped" style="margin-top: 1em;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Título</th>
                        <th scope="col">Data de publicação</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $aulas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($aula->id); ?></th>
                        <td>
                            <a href="<?php echo e(route('aula.viewAula', $aula->id)); ?>">
                                <img class="list-aula-img" src="<?php echo e(url("storage/{$aula->image}")); ?>" alt="">
                            </a>
                        </td>
                        <td><?php echo e($aula->title); ?></td>
                        <td><?php echo e($aula->created_at->format('d/m/Y')); ?></td>
                        <td>
                            <a href="<?php echo e(route('aula.edit', $aula->id)); ?>">
                                <button type="submit" class="btn botao-del-edit edit fas fa-pencil-alt"></button>
                            </a>
                        </td>

                        <td>
                            <form action="<?php echo e(route('aula.destroy', $aula->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn botao-del-edit delet fas fa-trash"></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.mainContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Portal Mão Amiga LARAVEL\mao-amiga\resources\views/telas/userArea.blade.php ENDPATH**/ ?>