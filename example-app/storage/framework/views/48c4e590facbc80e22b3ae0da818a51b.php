<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1"><?php echo e(__('Create Account')); ?></h2>
                        <p class="text-muted"><?php echo e(__('Join us today! Please fill in your information')); ?></p>
                    </div>

                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="form-label text-muted"><?php echo e(__('Full Name')); ?></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input id="name" 
                                    type="text" 
                                    class="form-control bg-light border-start-0 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    name="name" 
                                    value="<?php echo e(old('name')); ?>" 
                                    placeholder="Enter your full name"
                                    required 
                                    autocomplete="name" 
                                    autofocus>
                                <?php $__errorArgs = ['name'];
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

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label text-muted"><?php echo e(__('Email Address')); ?></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" 
                                    type="email" 
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
                                    autocomplete="email">
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
                            <label for="password" class="form-label text-muted"><?php echo e(__('Password')); ?></label>
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
                                    placeholder="Choose a password"
                                    required 
                                    autocomplete="new-password">
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
                            <div class="form-text small mt-2">
                                <?php echo e(__('Password must be at least 8 characters long')); ?>

                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label text-muted"><?php echo e(__('Confirm Password')); ?></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password-confirm" 
                                    type="password" 
                                    class="form-control bg-light border-start-0" 
                                    name="password_confirmation" 
                                    placeholder="Confirm your password"
                                    required 
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Terms Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label text-muted" for="terms">
                                    <?php echo e(__('I agree to the')); ?> 
                                    <a href="#" class="text-decoration-none"><?php echo e(__('Terms of Service')); ?></a> 
                                    <?php echo e(__('and')); ?> 
                                    <a href="#" class="text-decoration-none"><?php echo e(__('Privacy Policy')); ?></a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                <?php echo e(__('Create Account')); ?>

                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-4">
                            <span class="text-muted"><?php echo e(__('Already have an account?')); ?></span>
                            <a href="<?php echo e(route('login')); ?>" class="text-decoration-none ms-1"><?php echo e(__('Login here')); ?></a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Social Registration -->
            <div class="text-center mt-4">
                <p class="text-muted mb-4"><?php echo e(__('Or register with')); ?></p>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/auth/register.blade.php ENDPATH**/ ?>