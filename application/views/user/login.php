<h1 class="text-center login-title">Sign in to continue ..</h1>
<div class="login-card">
<img src="<?php echo base_url('assets/avatar_2x.png'); ?>" class="profile-img-card">
<p class="profile-name-card"> </p>

<?php $class = array('class' => 'form-signin'); ?>
<?php echo form_open('user/index', $class); ?>
   <input name="email" class="form-control" type="text" required="" placeholder="Username" autofocus="" id="inputEmail">
   <input name="password" class="form-control" type="password" required="" placeholder="Password" id="inputPassword">

    <?php $fail = $this->session->flashdata('FailLogin'); ?>
    <?php if (isset($fail)): ?>
    <p style="color: red"><?php echo $fail; ?>.</p> 
    <!-- <p style="color: red"><a href="login/forgot">Forgot Password?</a></p>    -->
    <?php endif ?>
   <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Login </button>
</form>
</div>