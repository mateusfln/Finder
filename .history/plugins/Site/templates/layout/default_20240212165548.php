<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['main.min.css', '../plugins/plugins.min.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->element('header')?>
    <?= $this->fetch('content') ?>
    <?= $this->element('footer')?>
    <?= $this->element('topToBottom')?>
    <?= $this->Html->script(["/js/plugins.min.js","/js/common.js"]) ?>
</head>
</html>
