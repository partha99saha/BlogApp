
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user1
 * @var
 */
?>


<div class="breadcome-area">
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">

                        <div class="asset-inner">
                            <h3><?= __('Categories') ?></h3>
                            <table border="1">
                                <tr>
                                    <th><?= $this->Paginator->sort('name') ?></th>
                                    <th><?= $this->Paginator->sort('description') ?></th>
                                    <th><?= $this->Paginator->sort('created') ?></th>
                                    <th><?= $this->Paginator->sort('modified') ?></th>
                                    <th><?= $this->Paginator->sort('actions') ?></th>
                                </tr>
                                <?php foreach ($categories as $category){ ?>
                                    <tr>
                                        <td><?= h($category->name) ?></td>
                                        <td><?= h($category->description) ?></td>
                                        <td><?= h($category->created) ?></td>
                                        <td><?= h($category->modified) ?></td>
                                        <td>
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>

                                            <?php if($user1->role_id=="2d3dbae4-27ac-4227-aeba-42f1abd787c8"){?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>

                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?= $this->Html->link(__('New Category'), ['action' => 'add'],['class' => 'btn btn-danger']) ?>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    </div>
</div>
