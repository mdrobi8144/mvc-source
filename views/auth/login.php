<?php
    use App\RobiMvc\Core\Form\Form;
    $this->title = 'PHP-MVC | Log-in';
?>
<div class="row" id="mt">
    <div class="offset-md-3 col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-body row">
                <div class="col-md-5" id="hc">
                    <div id="mtofigr">
                        <figure id="fgr">
                            <center><a href="/"><img src="./images/reg.jpg" alt="" width="200" height="auto"></a></center>
                            <figcaption>Log-in into your account for handling your works.</figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mb-3">
                        <h1 class="fht">Log-in to access your Account</h1>
                        <div class="after-fht">
                            <span>to continue with E-mail</span>
                        </div>
                    </div>
                    <?php Form::begin('', "post") ?>
                        <?= Form::inputField($model, 'email')->placeHolder('User email') ?>
                        <?= Form::inputField($model, 'password')->typePass()->placeHolder('User password') ?>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember_me">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary" type="button">Log-in</button>
                        </div>
                    <?= Form::end() ?>

                    <p class="m-0"><a href="#">I forgot my password</a></p>
                    <p class="m-0"><a href="/register" class="text-center">I don't have any account!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>