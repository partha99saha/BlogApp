<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 *
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user
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
                                    <h3><?= __('Articles') ?></h3>
                                    <table border="1">
                                        <tr>
                                            <th>Tittle</th>
                                            <th>Body</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                        <?php foreach ($articles as $article){?>
                                        <tr>
                                            <td><?= $article->title ?></td>
                                            <td><?= $article->body ?></td>
                                            <td><?= $article->created->format(DATE_RFC850) ?></td>
                                            <td>

                                                <?= $this->Html->link("view", ['controller' => 'Articles','action' => 'view',$article->id]) ?>

                                                <?php if($user==$article->user_id || $user1->role_id=="2d3dbae4-27ac-4227-aeba-42f1abd787c8" ){?>

                                                <?= $this->Html->link("edit", ['controller' => 'Articles','action' => 'edit',$article->id]) ?>

                                                <?= $this->Form->postLink(
                                                    'Delete',
                                                    ['action' => 'delete', $article->id],
                                                    ['confirm' => 'Are you sure?'])
                                                ?>
                                            </td>
                                        </tr>
                                         <?php }?>
                                        <?php }?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Html->link("add articles", ['controller' => 'Articles','action' => 'add'],['class' => 'btn btn-danger']) ?>

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




