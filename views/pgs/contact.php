<?php
    use App\RobiMvc\Core\Form\Form;
    $this->title = 'PHP-MVC | Contact';
?>
<div class="row" id="mt">
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-5" id="hc">
                    <div id="mtofigr">
                        <figure id="fgr">
                            <center><a href="/"><img src="./images/msg.png" alt="" width="260" height="180"></a></center>
                            <figcaption>Sign up for creating of your account and manage your works that you want to handling by this site.</figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-7">
                    <?php Form::begin('', "post") ?>
                        <?= Form::inputField($model, 'email')->setLabel('Your e-mail')->placeHolder('Enter your email address') ?>
                        <?= Form::inputField($model, 'subject')->setLabel()->placeHolder('Enter your subject or topic') ?>
                        <?= Form::textArea($model, 'message')->setLabel()->placeHolder('Write your message') ?>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Send message">
                        </div>
                    <?= Form::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>