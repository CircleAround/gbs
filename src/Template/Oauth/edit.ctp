<div class="actions columns large-2 medium-3">
    <h3><?= __('登録') ?></h3>
</div>
<div class="threads form large-10 medium-9 columns">
    <?= $this->Form->create($new_user) ?>
    <fieldset>
        <?php
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
