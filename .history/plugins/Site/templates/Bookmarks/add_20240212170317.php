<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark $bookmark
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 */
?>
<div class="col-12 col-md-10 text-center wow fadeInUp">
    <aside class="column">
    </aside>
    <div class="column-responsive column-80">
        <div class="bookmarks form content">
            <?= $this->Form->create($bookmark) ?>
            <fieldset>
                <legend><?= __('Add Bookmark') ?></legend>
                
                    //echo $this->Form->control('user_id', ['options' => $users]);
                    <?=$this->Form->control('title');?>
                    <?=$this->Form->control('description');?>
                    <?=$this->Form->control('title');?>
                    <?=$this->Form->control('title');?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
