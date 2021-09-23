<?php
/**
 *  @var \App\View\AppView $this
 */
$this->disableAutoLayout();
echo $this->Html->css('style');
echo $this->Html->css('bootstrap.min');

?>
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>PLEASE LOGIN </h3>
        </div>
        <br><br>
        <div class="content-error">
            <div class="hpanel">
                <?= $this->Form->create(null,[
                    'controller'=>'Users',
                    'action'=>'login',
                ]) ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label" for="username">Email</label><?= $this->Form->control('email',[
                            'label'=>false,
                            'class'=>'form-control',
                            'required'=>true,
                        ]) ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <?= $this->Form->control('password',[
                            'label'=>false,
                            'class'=>'form-control',
                        ]) ?>
                    </div>
                    <div class="checkbox login-checkbox">
                        <label>
                            <input type="checkbox" class="i-checks"> Remember me
                        </label>
                    </div>
                        <button class = 'btn btn-success btn-block' type="submit">Login</button>
                        <?=  $this->flash->render();?>
                        <?= $this->Html->link("New User", ['action' => 'add']) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

