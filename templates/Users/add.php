<?php
$this->disableAutoLayout();
echo $this->Html->css('style');
echo $this->Html->css('bootstrap.min');
?>
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>Signup </h3>
        </div>
        <br><br>
        <div class="content-error">
            <div class="hpanel">
        <div class="class="form-group">
            <?= $this->Form->create(null,[
                'controller'=>'Users',
                'action'=>'add'])?>

            <fieldset>
                 <?= $this->Form->control('first_name',[
                    'required' => true,
                    'class' => "form-control"
                ]) ?>
                <br>
                <?= $this->Form->control('last_name',[
                    'required' => true,
                    'class' => "form-control"
                ]) ?>
                <br>
                <?= $this->Form->control('email',[
                            'required' => true,
                            'class' => "form-control"
                        ]) ?>
                <br>
                <?= $this->Form->control('password',[
                    'required' => true,
                    'class' => "form-control"
                ]) ?>
                <br>
                <?= $this->Form->control('role_id', [
                    'type'=>'select',
                    'class' => "form-control",
                    'empty'=>'Select role',
                ]) ?>
            </fieldset>
        <br><br>
        <button class = 'btn btn-success btn-block' type="submit">Submit</button>
        <?= $this->Html->link("Cancel", [
            'action' => 'login',
            'class' => 'btn btn-default btn-block'
        ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    </div>
</div>
</div>
