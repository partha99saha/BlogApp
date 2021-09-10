<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 * @var \Cake\Collection\CollectionInterface|string[] $parentCategories
 */
?>


<div class="row">
    <div class="column-responsive column-80">
        <legend align="center"><?= __('Add Category') ?></legend>

        <div class="class=" form-group
        ">
        <?= $this->Form->create($category) ?>

        <fieldset>

            <?= $this->Form->control('name',['class' => "form-control"]) ?>
            <?= $this->Form->control('description',['class' => "form-control"]) ?>

        </fieldset>

        <button class='btn btn-primary bn-default btn-block' type="submit">Save Category</button>

        <?= $this->Form->end() ?>
    </div>
</div>
</div>



