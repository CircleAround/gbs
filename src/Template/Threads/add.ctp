<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Threads'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="threads form large-10 medium-9 columns">
    <?= $this->Form->create($thread) ?>
    <fieldset>
        <legend><?= __('Add Thread') ?></legend>
        <?php
            echo $this->Form->input('actor_id');
            echo $this->Form->input('title');
            echo $this->Form->input('body');
            echo $this->Form->input('created_at');
            echo $this->Form->input('updated_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
