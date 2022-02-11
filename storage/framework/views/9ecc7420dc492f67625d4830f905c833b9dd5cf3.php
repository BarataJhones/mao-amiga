<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-3.3.1.slim.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fontawesome.js')); ?>"></script>
    <script src="<?php echo e(asset('js/fontawesome.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/all.js')); ?>"></script>
    <!-- Magnific Popup core JS file -->
    <script src="<?php echo e(asset('magnific-popup/jquery.magnific-popup.js')); ?>"></script>
    <!-- Magnific Popup effect-->
    <script>
        $(document).ready(function() {
        $('.video-popup').magnificPopup({
            /* disableOn: 700,*/
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
        
            fixedContentPos: false
            });
        });
    </script>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/header.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')); ?>">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="<?php echo e(asset('magnific-popup/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')); ?>"media="screen">

    <link href="<?php echo e(asset('https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700i&display=swap')); ?>" rel="stylesheet">

</head>

<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light">
            <a href="<?php echo e(Storage::disk('s3')->url('mao_amiga_titulo.mp4')); ?>" class="navbar-brand video-popup">
                <img class="logoMaoAmiga" src="<?php echo e(asset('img/svg_logo_branco.svg')); ?>" height="28" alt="CoolBrand">
            </a>
            <button type="button" class="navbar-toggler custom-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse headerText" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="<?php echo e(route('aula.listaIndex')); ?>" class="nav-item nav-link active"><i class="fas fa-home"></i> Início</a>
                    <a href="#" class="nav-item nav-link"><i class="fas fa-info-circle"></i> Sobre</a>
                    <a href="<?php echo e(route('aula.searchList')); ?>" class="nav-item nav-link"><i class="fas fa-video"></i> Aulas</a>
                    <a href="<?php echo e(route('aula.userList')); ?>" class="nav-item nav-link"><i class="fas fa-user"></i> Área do usuário</a>
                </div>
            
                <div class="navbar-nav ml-auto dropdown" style="font-size: 1em">
                    <?php if((Auth::id()!=null)): ?>
                        <a style="font-size: 1.2em" href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                            <?php 
                                list($primeiroNome) = explode(' ', Auth::user()->name); 
                                $avatar = Auth::user()->avatar;
                            ?>
                
                            <img src="<?php echo e(Storage::disk('s3')->url($avatar)); ?>" class="userAvatar">
                            <?php echo $primeiroNome; ?>
                
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                
                            <a class="dropdown-item"
                                href="<?php echo e(route('aula.userList')); ?>">
                                <i class="fas fa-user"></i> Área do usuário
                            </a>
                
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <a class="dropdown-item" :href="route('logout')"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="fas fa-power-off"></i> Sair
                                </a>
                            </form>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e(route('aula.userList')); ?>" class="nav-item nav-link" style="font-size: 1.5em">
                            <i class="fas fa-sign-in-alt"></i> Fazer login
                        </a>
                    <?php endif; ?>
                </div>
            
            </div>
        </nav>

        <div class="container" style="margin-top: 2em">
            <div class="row justify-content-center">
                <div class="col-10 col-xl-10 col-lg-9 col-md-8 col-sm-10 col-xs-7">
                    <p class="header-frase">O portal de aprendizado acessível para surdos</p>
                </div>

                <a class="video-popup" autoplay="autoplay" href="<?php echo e(Storage::disk('s3')->url('mao_amiga_frase.mp4')); ?>">
                    <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video"></div>
                </a>

            </div>
        </div>
    </div>

</body>

<?php $__env->startPush('slideForm'); ?>
    <script src="<?php echo e(asset('js/slideForm.js')); ?>"></script>
<?php $__env->stopPush(); ?>

</html><?php /**PATH C:\xampp\htdocs\portao-mao-amigaLARAVEL\mao-amiga\resources\views/telas/common/header.blade.php ENDPATH**/ ?>