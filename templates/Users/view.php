<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface $user
 * @var \App\Model\Entity\User[]
 */
?>


<h1>User Detail<?= h($user->title) ?></h1>
<p>First Name: <?= ($user->first_name ) ?></p><br>
<p>Last Name: <?= h($user->last_name) ?></p><br>
<p>Email: <?= ($user->email) ?></p><br>
<p>Role: <?php
    if($user->role_id=="2d3dbae4-27ac-4227-aeba-42f1abd787c8")
    {
        echo "Admin";
    }
    else
    {
        echo "Author";
    }
    ?></p><br>
<p><small>Created : <?= $user->created ?></small></p>
<p><small>Modified : <?= $user->created ?></small></p>

<?= $this->Html->link("edit", ['controller' => 'Users','action' => 'edit',$user->id]) ?><br>
<?= $this->Form->postLink(
    'Delete',
    ['action' => 'delete', $user->id],
    ['confirm' => 'Are you sure ? '])
?>
