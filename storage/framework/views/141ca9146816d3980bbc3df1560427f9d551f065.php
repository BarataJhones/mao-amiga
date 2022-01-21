

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

        <form <?php echo $__env->yieldContent('formDetails'); ?> id="form">
            <?php echo $__env->yieldContent('csrfMethod'); ?>

            <div class="form-group">
                <label for="comment">1 - Título da aula*</label>
                <input type="text" name="title" class="form-control" rows="1" id="title" <?php echo $__env->yieldContent('valueTitle'); ?>>
            </div>

            <label for="comment">2 - Área de Ensino*</label> <br>
            <select name="grade" class="form-select" aria-label="Default select example" id="grade">
                <option value="Infantil">Infantil</option>
                <option value="Fundamental">Fundamental</option>
                <option value="Médio">Médio</option>
                <option value="Superior">Superior</option>
                <option selected value="Livre">Livre</option>
            </select><br><br>

            <div class="form-group">
                <label for="comment">3 - Disciplina*</label>
                <input type="text" name="discipline" class="form-control" rows="1" id="discipline"
                    <?php echo $__env->yieldContent('valueDiscipline'); ?>>
            </div>

            <div class="form-group">
                <?php $userName = Auth::user()->name; ?>

                <label for="comment"> 4 - Criador por
                    <span style="color: #00AEEF;"><?php echo e($userName); ?></span>
                </label>
            </div>

            <div class="form-group">
                <?php $userName = Auth::user()->name; ?>

                <label for="comment"> 5 - Postado em
                    <?php $date = date('d/m/Y') ?>
                    <span style="color: #00AEEF;"><?php echo e($date); ?></span>
                </label>
            </div>

            <label>6 - Vídeo em LIBRAS da aula (clique na seta azul para subir o vídeo)*</label>
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

            <div class="form-group">
                <label for="comment">7 - Conteúdo da aula (mínimo de 50 caractéres)*</label>

                
                
                
                <textarea name="content" class="form-control" id="content" style="display:none" <?php echo $__env->yieldContent('valueContent'); ?>></textarea>
                <div id="editor">
                    <?php echo $__env->yieldContent('EditAula'); ?>   
                </div>

            </div>

            <label>8 - Imagem principal da aula*</label>
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
                <label for="comment">9 - Fonte da imagem principal da aula</label>
                <input type="text" name="imageFont" class="form-control" rows="1" id="imageFont" <?php echo $__env->yieldContent('valueImageFont'); ?>>
            </div>

            <div class="form-group">
                <label for="comment">10 - Referências</label>
                <textarea type="text" name="references" class="form-control" rows="5"
                    id="references"><?php echo $__env->yieldContent('valueReferences'); ?></textarea>
            </div>

            <label>11 - Conteúdo para baixar</label>
            
            <!-- <div class="custom-file">
                <input type="file" name="aulaFiles" class="custom-file-input" id="chooseFile" multiple>
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div> <br> <br> -->

            
            <div class="form-group">
                <input type="file" class="form-control-file" name="file[]" multiple style="margin-bottom: 3em;">
            </div>

            <div class="text-center justify-content-center row" style="margin-bottom: 3em;">
                <div class="text-center col-2">
                    <button class="btn botao-del-edit save" type="submit">
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            
                <div class="text-center col-2">
                    <button type="button" class="btn botao-del-edit cancel" onclick="goBack()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
        </form> <br>
        
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('telas.common.mainContent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/telas/common/form.blade.php ENDPATH**/ ?>