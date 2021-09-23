<?php
/**
 * @var \App\Model\Entity\User $User
 */
$cakeDescription = 'CakePHP || BLOG ';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
        blog
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link  href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



    <?= $this->Html->css([
        'all.min.css',
        'tempusdominus-bootstrap-4.min.css',
        'icheck-bootstrap.min.css',
        'jqvmap.min.css',
        'adminlte.min.css',
        'OverlayScrollbars.min.css',
        'daterangepicker.css',
        'summernote-bs4.min.css',

        'bootstrap.min.css',
        'style.css',
        'font-awesome.min.css',
        'owl.carousel.css',
        'owl.theme.css',
        'owl.transitions.css',
        'animate.css',
        'normalize.css',
        'main.css',
        'morrisjs/morris.css',
        'scrollbar/jquery.mCustomScrollbar.min.css',
        'metisMenu/metisMenu.min.css',
        'metisMenu/metisMenu-vertical.css',
        'calendar/fullcalendar.min.css',
        'calendar/fullcalendar.print.min.css',
        'form/all-type-forms.css',
        'responsive.css',
        'style.css'
    ]) ?>
    <?= $this->Html->script([
        'vendor/jquery-1.12.4.min.js',
        'bootstrap.min.js',
        'wow.min.js',
        'jquery-price-slider.js',
        'jquery.meanmenu.js',
        'owl.carousel.min.js',
        'jquery.sticky.js',
        'jquery.scrollUp.min.js',
        'scrollbar/jquery.mCustomScrollbar.concat.min.js',
        'scrollbar/mCustomScrollbar-active.js',
        'metisMenu/metisMenu.min.js',
        'metisMenu/metisMenu-active.js',
        'tab.js',
        'icheck/icheck.min.js',
        'icheck/icheck-active.js',
        'plugins.js','main.js',

    ]) ?>
</head>
<body>

<nav id="sidebar" class="">

    <nav class="sidebar-nav left-sidebar-menu-pro">

        <div class="left-custom-menu-adp-wrap comment-scrollbar" >

            <ul class="metismenu" id="menu1">
                <li>
                    <?= $this->Html->link(__('Categories'), ['controller'=>'Categories','action' => 'index'], ['class' => 'mini-sub-pro']) ?>
                </li>

                <li>
                    <?= $this->Html->link(__('Articles'), ['controller'=>'Articles','action' => 'index'], ['class'=>'mini-click-non']) ?>
                </li>

                <li>
                    <?= $this->Html->link("User Details", ['controller' => 'Users','action' => 'view',$User->id],['class'=>"mini-click-non"]) ?>
                </li>
                <li>
                    <?= $this->Html->link("Logout", ['controller' => 'Users','action' => 'logout'],['class'=>"mini-click-non"]) ?>
                </li>

            </ul>
    </nav>

</nav>


        <main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<?php //echo $content_for_layout ?>

</body>
</html>
