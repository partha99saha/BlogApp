<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface $user
 * @var \App\Model\Entity\User[]
 */
?>


<div class="row">
    <div class="column-responsive column-80">
        <legend><?= __('Edit User Detail') ?></legend>

        <div class= "form-group">
        <?=  $this->Form->create($user ,[
            'action'=>\Cake\Routing\Router::url([
                'controller'=>'Users',
                'action'=>'view',
                $user->id,
            ])
        ]);?>

        <fieldset>
            <?= $this->Form->control('first_name',['class' => "form-control"]) ?>
            <?= $this->Form->control('last_name', ['class' => "form-control"]) ?>
            <?= $this->Form->control('email',['class' => "form-control"]) ?>
        </fieldset>

        <button class='btn btn-primary bn-default btn-block' type="submit">Save</button>
        <?=  $this->Flash->render();?><br><br>
        <?= $this->Html->link("Change Password", ['controller' => 'Users','action' => 'password',$user->id]) ?>

        <?= $this->Form->end() ?>
    </div>
</div>
</div>



