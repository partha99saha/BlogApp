<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $user
 */
echo $this->Html->css('style');
?>


<div class="row">
    <div class="column-responsive column-80">
        <legend><?= __('Change Password') ?></legend>
        <br><br>
        <div class="form-group">
            <?= $this->Form->create($user, [
                'action' => \Cake\Routing\Router::url([
                    'controller'=>'Users',
                    'action'=>'password',
                    $user->id,
                ]),
            ]);
            ?>
            <fieldset>
                <?= $this->Form->control('current_password', ['class' => "form-control"]) ?>
                <?= $this->Form->control('new_password', ['class' => "form-control"]) ?>
                <?= $this->Form->control('confirm_password', ['class' => "form-control"]) ?>
            </fieldset>
            <br><br>
            <button class='btn btn-success btn-block' type="submit">Save</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>




