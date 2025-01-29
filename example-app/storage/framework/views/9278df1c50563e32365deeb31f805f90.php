<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1"><?php echo e(__('Welcome Back!')); ?></h2>
                        <p class="text-muted"><?php echo e(__('Please login to your account')); ?></p>
                    </div>

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label text-muted"><?php echo e(__('Email Address')); ?></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" type="email" 
                                    class="form-control bg-light border-start-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    name="email" 
                                    value="<?php echo e(old('email')); ?>" 
                                    placeholder="Enter your email"
                                    required 
                                    autocomplete="email" 
                                    autofocus>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label text-muted"><?php echo e(__('Password')); ?></label>
                                <?php if(Route::has('password.request')): ?>
                                    <a class="text-decoration-none small" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Password?')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" 
                                    type="password" 
                                    class="form-control bg-light border-start-0 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    name="password" 
                                    placeholder="Enter your password"
                                    required 
                                    autocomplete="current-password">
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                    <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="form-check-label text-muted" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                <?php echo e(__('Sign In')); ?>

                            </button>
                        </div>

                        <!-- Register Link -->
                        <?php if(Route::has('register')): ?>
                            <div class="text-center mt-4">
                                <span class="text-muted"><?php echo e(__("Don't have an account?")); ?></span>
                                <a href="<?php echo e(route('register')); ?>" class="text-decoration-none ms-1"><?php echo e(__('Register here')); ?></a>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <!-- Social Login -->
            <div class="text-center mt-4">
                <p class="text-muted mb-4"><?php echo e(__('Or sign in with')); ?></p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="#" class="btn btn-outline-light border p-2 rounded-circle">
                        <i class="fab fa-google text-danger"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light border p-2 rounded-circle">
                        <i class="fab fa-facebook text-primary"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light border p-2 rounded-circle">
                        <i class="fab fa-github text-dark"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add this to your layout file if not already present -->
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/auth/login.blade.php ENDPATH**/ ?>