<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script class="jsbin" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script class="jsbin" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script class="jsbin" src="<?php echo e(asset('js/jquery.easing.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/fontawesome.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fontawesome.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/all.js')); ?>"></script>

    <!--Botão voltar -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')); ?>">

    <link rel="stylesheet" href="css/register-user.css">

    <title>Portal Mão Amiga - Cadastar</title>
</head>

<body>
    <!-- MultiStep Form -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            
            <div style="width: 27em">
                <!--Botão voltar -->
                <a class="botao-voltar" onclick="goBack()">
                    <i class="fas fa-arrow-circle-left fa-4x">
                    </i>
                </a>
            </div>

            <div class="text-center logo-login">
                <img class="logo" src="<?php echo e(asset('img/svg_logo_azul.svg')); ?>" alt=""> <br>
                <i class="fas fa-user-plus"></i> <span style="font-size: 1.2em">Cadastrar</span>
            </div>
            
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

            <form id="msform" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

                <!-- <div class="flex items-center justify-center mt-4">*Campos obrigatórios</div> -->
                
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">Nome</li>
                    <li>Email</li>
                    <li>Data de nascimento</li>
                    <!-- <li>Gênero</li> -->
                    <li>Surdez</li>
                    <!-- <li>Instituição</li>
                    <li>Área de ensino</li>-->
                    <li>Senha</li>
                    <li>Confirmar senha</li> <!-- Bugzinho na linha da barra de progresso -->
                </ul>
                <!-- fieldsets -->

                <!-- Name -->
                <fieldset>
                    <img class="form-gif" src="<?php echo e(asset('img/form-sinais/gif_nome.gif')); ?>" alt="Imagem animada com os sinais em LIBRAS para 'Nome'"> <br>
                    
                    <i class="fas fa-signature fa-2x"></i> &nbsp;
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'name','value' => __('Nome')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'name','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Nome'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <br>
            
                    <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Digite seu nome*" required autofocus />

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Email Address -->
                <fieldset>
                    <img class="form-gif" src="<?php echo e(asset('img/form-sinais/gif_email.gif')); ?>" alt="Imagem animada com os sinais em LIBRAS para 'Email'"> <br>

                    <i class="fas fa-at fa-2x"></i> &nbsp;
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'email','value' => __('Email')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Email'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <br>

                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Digite o seu email*"required />

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Birthday -->
                <fieldset>
                    <img class="form-gif" src="<?php echo e(asset('img/form-sinais/gif_data_nascimento.gif')); ?>" alt="Imagem animada com os sinais em LIBRAS para 'Data de nascimento'"> <br>
                    
                    <i class="fas fa-birthday-cake fa-2x"></i> &nbsp;
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'birthday','value' => __('Data de nascimento')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'birthday','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Data de nascimento'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <br>

                    <div class="form-group row" >
                        <div class="col-10">
                            <input class="form-control" type="text" id="birthday" name="birthday"
                                :value="old('birthday')" placeholder="Coloque sua data de nascimento*" onfocus="(this.type='date')" required>
                        </div>
                    </div>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Gender -->
                <!-- <fieldset>
                    <img class="form-gif" src="<?php echo e(asset('img/form-sinais/genero.jpg')); ?>" alt=""> <br>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'gender','value' => __('Gênero')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'gender','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Gênero'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                    <div class="form-check">
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Masculino">
                            Masculino
                        </label>

                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Feminino">
                            Feminino
                        </label>

                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Não-binário">
                            Não-binário
                        </label>
   
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Outro">
                            Outro
                        </label>
                    </div>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset> -->

                <!-- Deaf -->
                <fieldset>
                    <img class="form-gif" src="<?php echo e(asset('img/form-sinais/gif_voce_surdo.gif')); ?>" alt="Imagem animada com os sinais em LIBRAS para 'Você é surdo?'"> <br>

                    <i class="fas fa-deaf fa-2x"></i> &nbsp;
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'deaf','value' => __('Você é surdo?*')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'deaf','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Você é surdo?*'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

                    <div class="form-check">
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="deaf" id="deaf" value="Sim" required>
                            <i class="fas fa-thumbs-up"></i> Sim
                        </label>
  
                        <label class="form-check-label" style="margin: 0.5em">
                            <input class="form-check-input" type="radio" name="deaf" id="deaf" value="Não" required>
                            <i class="fas fa-thumbs-down"></i> Não
                        </label>
                    </div>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Institution -->
                <!-- <fieldset>
                    <img class="form-gif img-nascimento" src="<?php echo e(asset('img/form-sinais/instituicao.jpg')); ?>" alt=""> <br>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'institution','value' => __('Você estuda em alguma instituição? Se sim, qual o nome?')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'institution','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Você estuda em alguma instituição? Se sim, qual o nome?'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <br>

                    <input id="institution" class="block mt-1 w-full" type="text" name="institution" placeholder="Digite o nome da instituição" :value="old('institution')" />

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>
                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset> -->

                <!-- Grade -->
                <!-- <fieldset>
                    <img class="form-gif" src="<?php echo e(asset('img/form-sinais/nivel.jpg')); ?>" alt=""> <br>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'grade','value' => __('Qual área de ensino você está atualmente?')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'grade','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Qual área de ensino você está atualmente?'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <br>

                    <select name="grade" class="form-select" aria-label="Default select example" id="grade">
                        <option value="Infantil">Infantil</option>
                        <option value="Fundamental">Fundamental</option>
                        <option value="Médio">Médio</option>
                        <option value="Superior">Superior</option>
                        <option selected value="Livre">Livre</option>
                    </select> <br>

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset> -->

                <!-- Password -->
                <fieldset>
                    <img class="form-gif" src="<?php echo e(asset('img/form-sinais/gif_senha.gif')); ?>" alt="Imagem animada com os sinais em LIBRAS para 'Senha'"> <br>

                    <i class="fas fa-key fa-2x"></i> &nbsp;
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'password','value' => __('Senha')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'password','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Senha'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <br>
                    
                    <input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Digite sua senha*" required autocomplete="new-password" />

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>

                    <button type="button" name="next" class="next action-button">
                        Avançar <i class="fas fa-angle-right"></i>
                    </button>
                </fieldset>

                <!-- Confirm Password -->
                <fieldset>
                    <img class="form-gif img-conf-senha" src="<?php echo e(asset('img/form-sinais/gif_confirmar_senha.gif')); ?>" alt="Imagem animada com os sinais em LIBRAS para 'Confirme sua senha'"> <br>

                    <i class="fas fa-key fa-2x"></i> &nbsp;
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['class' => 'input-label','for' => 'password_confirmation','value' => __('Confirme sua senha')]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'input-label','for' => 'password_confirmation','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Confirme sua senha'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <br>

                    <input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Confirme a senha*" name="password_confirmation" required />

                    <button type="button" name="previous" class="previous action-button-previous">
                        <i class="fas fa-angle-left"></i> Voltar
                    </button>
                    
                    <div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['class' => 'action-button','style' => 'background-color: #00da6d']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'action-button','style' => 'background-color: #00da6d']); ?>
                            <i class="fas fa-check"></i> <?php echo e(__('Cadastrar')); ?>

                         <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                </fieldset>

                <!-- <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="<?php echo e(route('login')); ?>">
                        <?php echo e(__('Já é cadastrado? Clique aqui')); ?>

                    </a>
                </div> -->

            </form>

            <!-- /.link to designify.me code snippets -->
        </div>
    </div>
    <!-- /.MultiStep Form -->
</body>

<script src="js/slideForm.js"></script>

</html><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/auth/register.blade.php ENDPATH**/ ?>