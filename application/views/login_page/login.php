<main>
<div id="mainWrraper">

<p id="error"><?php if (isset($error)){echo $error['message'];}?></p>
    <?php echo form_open('Login_controller/auth'); ?>
        <fieldset>
        <legend>Login User:</legend>
        <div class="inputWrapper"><label>Username: </label><input class="formInput" type="text" name="user"></div>
        <div class="inputWrapper"><label>Password: </label><input class="formInput" type="password" name="Password"></div>
        <div class="inputWrapper"><input id="submit" type="submit" value="login" name="submit">
            <input id="register" type="button" value="register" name="register" onclick="window.location='<?php echo site_url(); ?>/Login_controller/register'"></div>
  </fieldset>

</form>

</div>
</main>
