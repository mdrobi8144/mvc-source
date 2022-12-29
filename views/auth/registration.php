<?php
    use App\RobiMvc\Core\Form\Form;
    $this->title = 'PHP-MVC | Registration';
?>
<div class="row" id="mt">
    <div class="offset-md-2 col-md-8">
        <div class="card card-outline card-primary">
            <div class="card-body row">
                <div class="col-md-5" id="hc">
                    <div id="mtofigr">
                        <figure id="fgr">
                            <center><a href="/"><img src="./images/reg.jpg" alt="" width="250" height="auto"></a></center>
                            <figcaption>Sign up for creating of your account and manage your works that you want to handling by this site.</figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mb-3">
                        <h1 class="fht">Create your XYZ Account</h1>
                        <div class="after-fht">
                            <span>to continue with E-mail</span>
                        </div>
                    </div>
                    <?php Form::begin('', "post") ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?= Form::inputField($model, 'first_name')->setLabel() ?>
                            </div>
                            <div class="col-md-6">
                                <?= Form::inputField($model, 'last_name')->setLabel() ?>
                            </div>
                        </div>
                        <?= Form::inputField($model, 'email')->setLabel() ?>
                        <?= Form::inputField($model, 'password')->typePass()->setLabel() ?>
                        <?= Form::inputField($model, 'confirm_password')->typePass()->setLabel() ?>
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary" type="button">Registration</button>
                        </div>
                    <?= Form::end() ?>
                    <p class="m-0"><a href="/login" class="text-center">Already, I have an account!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>