<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface $users
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 *  @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $user1
 * @var \App\Model\Entity\User[]
 */
?>

<div class="breadcome-area">
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">

                        <div class="asset-inner">
                            <h3><?= __('Users') ?></h3>
                            <table border="1">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created</th>
                                    <th></th>
                                </tr>
                                <?php foreach ($users as $user){?>
                                    <tr>
                                    <td><?= $user->first_name ?></td>
                                    <td><?= $user->last_name ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?php
                                            if($user->role_id=="2d3dbae4-27ac-4227-aeba-42f1abd787c8")
                                            {
                                             echo "Admin";
                                            }
                                            else
                                                echo "Author";
                                         ?>
                                    </td>
                                    <td><?= $user->created->format(DATE_RFC850) ?></td>
                                    <td>

                                        <?= $this->Html->link("View Profile", ['controller' => 'Users','action' => 'view',$user->id]) ?>
                                        <?= $this->Form->postLink(
                                            'Delete',
                                            ['action' => 'delete', $user->id],
                                            ['confirm' => 'Are you sure ? '])
                                        ?>
                                        </td>
                                        </tr>
                                    <?php }?>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




