
<div class="row">
    <div class="column-responsive column-80">
        <legend align="center"><?= __('Sign Up ') ?></legend>

        <div class="class="form-group">
            <?= $this->Form->create(null,[
                'controller'=>'Users',
                'action'=>'add'])?>

            <fieldset>
                 <?= $this->Form->control('first_name',[
                    'required' => true,
                    'class' => "form-control"
                ]) ?>
                <?= $this->Form->control('last_name',[
                    'required' => true,
                    'class' => "form-control"
                ]) ?>
                <?= $this->Form->control('email',[
                            'required' => true,
                            'class' => "form-control"
                        ]) ?>
                <?= $this->Form->control('password',[
                    'required' => true,
                    'class' => "form-control"
                ]) ?>
                <?= $this->Form->control('role_id', [
                    'type'=>'select',
                    'class' => "form-control",
                    'empty'=>'Select role',
                ]) ?>
            </fieldset>

        <button class = 'btn btn-primary bn-default btn-block' type="submit">Submit</button>
        <?= $this->Html->link("Cancel", [
            'action' => 'login',
            'class' => 'btn btn-default btn-block'
        ]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
