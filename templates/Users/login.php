<?php
/**
 *  @var \App\View\AppView $this
 */
$this->disableAutoLayout();
?>
<div class="error-pagewrap" align="center">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <table border="1" cellpadding="0" cellspacing="0">
                <tr><th colspan="2">   <h3>PLEASE LOGIN </h3></th></tr>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <?= $this->Flash->render() ?>
                    <?= $this->Form->create() ?>

                    <div class="form-group">
                        <tr><td>
                        <?= $this->Form->control('email', [
                            'required' => true,
                            'class' => "form-control"
                        ]) ?>

                        </td></tr>
                    </div>
                    <div class="form-group">
                        <tr><td>
                        <?= $this->Form->control('password', [
                            'required' => true,
                            'class' => "form-control"
                        ]) ?>
                            </td></tr>
                        <tr><td align="center">
                        <?= $this->Form->submit('Sign In',
                            [
                                'class' => 'btn btn-primary btn-default btn-block',
                            ]);
                        ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <?= $this->Html->link("Sign up", [
                        'action' => 'add',
                        'class' => 'btn btn-default btn-block'
                    ]) ?></td></tr>
                    </form>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

