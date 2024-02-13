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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">First and last name</span>
                    </div>
                    <input type="text" class="form-control">
                    <input type="text" class="form-control">
                </div>
                    <?=$this->Form->control('title');?>
                    <?=$this->Form->control('description');?>
                    <?=$this->Form->control('url');?>
                    <?=$this->Form->control('tag_string');?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
