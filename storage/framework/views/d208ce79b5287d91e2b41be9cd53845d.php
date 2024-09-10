<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SupplierApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="<?php echo e(URL('/')); ?>">Supplier App</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('login')) ? 'active' : ''); ?>" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('register')) ? 'active' : ''); ?>" href="<?php echo e(route('register')); ?>">Register</a>
                    </li>
                   
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e((request()->is('home')) ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                    </li>    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo e(Auth::user()->username); ?>

                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" 
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            >Logout</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
          </div>
        </div>
    </nav>    

    
        <?php echo $__env->yieldContent('content'); ?>
    
       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html><?php /**PATH D:\msr\SupplierChain\resources\views/layouts/app.blade.php ENDPATH**/ ?>