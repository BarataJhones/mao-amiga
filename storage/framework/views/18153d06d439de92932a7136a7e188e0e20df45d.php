<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/cadastro-aulas.css')); ?>">
    <link rel="stylesheet" <?php echo e(asset('href="css/dropzone.css"')); ?>>
    <link rel="icon" href="<?php echo e(asset('img/icone-site.png')); ?>" type="image/x-icon" />
    <title>Portal Mão Amiga - <?php echo $__env->yieldContent('pageTitle'); ?></title>
</head>

<?php echo $__env->make('telas.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <section class="container container-margin">
        <div class="row">

            <a onclick="goBack()" >
                <i class="fa fa-arrow-circle-left fa-4x botao-voltar"> 
                </i>
            </a>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>


            <div class="quadro-mensagem col">

                <div class="row justify-content-center">
                    <div class="col-8 col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-7">
                        <h1> <?php echo $__env->yieldContent('title'); ?></h1>
                    </div>

                    <a class="video-popup" href="video/area-professor.mp4">
                        <div class="col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 icone-video-mensagem"></div>
                    </a>

                    <p class="mensagem justify-content-center" style="padding: 1em;">
                        <?php echo $__env->yieldContent('textContent'); ?>
                    </p>
                </div>
            </div>


        </div>

    </section>

    <section class="container container-margin aula-cadastro">

        <!-- Validações do fomulário -->
        <?php if($errors->any()): ?>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
        <!-- -->

        <form action="<?php echo e(route('aula.update', $aula->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('put'); ?>

            <div class="form-group">
                <label for="comment">Título da aula:</label>
                <input type="text" name="title" class="form-control" rows="1" id="title" value="<?php echo e($aula->title); ?>">
            </div>

            <label for="comment">Área de Ensino:</label> <br>
            <select name="grade" class="form-select" aria-label="Default select example" id="grade">
                <option value="Infantil">Infantil</option>
                <option value="Fundamental">Fundamental</option>
                <option value="Médio">Médio</option>
                <option value="Superior">Superior</option>
                <option selected value="Livre">Livre</option>
            </select>

            <div class="form-group">
                <label for="comment">Disciplina:</label>
                <input type="text" name="discipline" class="form-control" rows="1" id="discipline" value="<?php echo e($aula->discipline); ?>">
            </div>

            <div class="form-group">
                <label for="comment">Conteúdo da aula:</label>
                <textarea name="content" class="form-control" rows="15" id="content"><?php echo e($aula->content); ?></textarea>
            </div>

            <div class="form-group">
                <label for="comment">Usuário (TEMPORÁRIO PARA TESTE):</label>
                <input type="text" name="userCreator" class="form-control" rows="1" id="userCreator" value="<?php echo e($aula->userCreator); ?>">
            </div>

            <label>Imagem principal da aula:</label>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Procurar… <input type="file" name="image" id="image"> <!--id="imgInp"-->
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div> <br>
                    <img id='img-upload' />
                </div>
            </div>

            <div class="form-group">
                <label for="comment">Fonte da imagem principal da aula:</label>
                <input type="text" name="imageFont" class="form-control" rows="1" id="imageFont" value="<?php echo e($aula->imageFont); ?>">
            </div>

            <div class="form-group">
                <label for="comment">Referências:</label>
                <textarea type="text" name="references" class="form-control" rows="5" id="references"><?php echo e($aula->references); ?></textarea>
            </div>

            <label>Subir vídeo:</label>
            <div id="video-demo-container">
                <button class="btn" type="button" id="upload-button">
                    <i class="fas fa-upload fa-3x"></i>
                </button>
                <input type="file" name="aulaVideo" id="aulaVideo" style="display:none">
                <video id="main-video" controls>
                    <source type="video/mp4">
                </video>
                <canvas id="video-canvas"></canvas>
            </div> <br> 


            <!--<label>Conteúdo para baixar:</label>
            <form action="/file-upload" class="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
                <br>-->

            <div class="text-center">
                <button class="btn botao-del-edit save fas fa-check" type="submit"></button> 
            </div>
        </form> <br>

        <div class="text-center">
            <button type="submit" class="btn botao-del-edit cancel fas fa-times" onclick="goBack()"></button>
        </div>
        


    </section>

    <script src="<?php echo e(asset('js/area-professor.js')); ?>"></script>
</body>

<?php echo $__env->make('telas.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('js/dropzone.js')); ?>"></script>

</html><?php /**PATH C:\xampp\htdocs\Portal Mão Amiga LARAVEL\mao-amiga\resources\views/form.blade.php ENDPATH**/ ?>