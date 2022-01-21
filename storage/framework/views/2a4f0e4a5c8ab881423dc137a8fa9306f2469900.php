

<?php $__env->startSection('css'); ?>
    <?php echo e(asset('css/formAula.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('boxContent'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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

        <form <?php echo $__env->yieldContent('formDetails'); ?>>
            <?php echo $__env->yieldContent('csrfMethod'); ?>

            <div class="form-group">
                <label for="comment">Título da aula:</label>
                <input type="text" name="title" class="form-control" rows="1" id="title" <?php echo $__env->yieldContent('valueTitle'); ?>>
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
                <input type="text" name="discipline" class="form-control" rows="1" id="discipline"
                    <?php echo $__env->yieldContent('valueDiscipline'); ?>>
            </div>

            <div class="form-group">
                <label for="comment">Conteúdo da aula:</label>
                <textarea name="content" class="form-control" rows="15" id="content"><?php echo $__env->yieldContent('valueContent'); ?></textarea>
            </div>

            <div class="form-group">
                <label for="comment">Usuário (TEMPORÁRIO PARA TESTE):</label>
                <input type="text" name="userCreator" class="form-control" rows="1" id="userCreator"
                    <?php echo $__env->yieldContent('valueUserCreator'); ?>>
            </div>

            <label>Imagem principal da aula:</label>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Procurar… <input type="file" name="image" id="image">
                                <!--id="imgInp"-->
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div> <br>
                    <img id='img-upload' />
                </div>
            </div>

            <div class="form-group">
                <label for="comment">Fonte da imagem principal da aula:</label>
                <input type="text" name="imageFont" class="form-control" rows="1" id="imageFont" <?php echo $__env->yieldContent('valueImageFont'); ?>>
            </div>

            <div class="form-group">
                <label for="comment">Referências:</label>
                <textarea type="text" name="references" class="form-control" rows="5"
                    id="references"><?php echo $__env->yieldContent('valueReferences'); ?></textarea>
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

            <label>Conteúdo para baixar:</label>
            
            <div class="custom-file">
                <input type="file" name="aulaFiles" class="custom-file-input" id="chooseFile" multiple>
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div> <br> <br>

            <div class="text-center">
                <button class="btn botao-del-edit save fas fa-check" type="submit"></button>
            </div>
        </form> <br>

        <div class="text-center">
            <button type="submit" class="btn botao-del-edit cancel fas fa-times" onclick="goBack()"></button>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.mainContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Portal Mão Amiga LARAVEL\mao-amiga\resources\views/telas/common/form.blade.php ENDPATH**/ ?>