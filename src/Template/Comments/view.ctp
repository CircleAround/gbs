<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
      <?php if(!empty($current_user)) { ?>
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?> </li>
      <?php } ?>
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
      <?php if(!empty($current_user)) { ?>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
      <?php } ?>
        <li><?= $this->Html->link(__('List Threads'), ['controller' => 'Threads', 'action' => 'index']) ?> </li>
      <?php if(!empty($current_user)) { ?>
        <li><?= $this->Html->link(__('New Thread'), ['controller' => 'Threads', 'action' => 'add']) ?> </li>
      <?php } ?>
    </ul>
</div>
<div class="comments view large-10 medium-9 columns">
    <h2><?= h($comment->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Thread') ?></h6>
            <p><?= $this->Number->format($comment->thread_id) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($comment->id) ?></p>
            <h6 class="subheader"><?= __('Actor Id') ?></h6>
            <p><?= $this->Number->format($comment->actor_id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created At') ?></h6>
            <p><?= h($comment->created_at) ?></p>
            <h6 class="subheader"><?= __('Updated At') ?></h6>
            <p><?= h($comment->updated_at) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Body') ?></h6>
            <?= $this->Text->autoParagraph(h($comment->body)) ?>
        </div>
    </div>
</div>
