<?php
//echo $this->element('sidebar');
//?>

<div class="row">
    <div class="column-responsive column-80">
        <legend align="center"><?= __('Add Article') ?></legend>

        <div class="class=" form-group
        ">
        <?=  $this->Form->create(null,[
            'controller'=>'Articles',
            'action'=>'add',
        ]);?>

        <fieldset>
            <?=  $this->Form->control('category_id',[
                'empty'=>'Select Categories','class' => "form-control"
            ]) ?>
            <?= $this->Form->control('title',['class' => "form-control"]) ?>
            <?= $this->Form->control('body', ['rows' => '3','class' => "form-control"]) ?>

        </fieldset>

        <button class='btn btn-primary bn-default btn-block' type="submit">Save Article</button>

        <?= $this->Form->end() ?>
    </div>
</div>
</div>


