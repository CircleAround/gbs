<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Thread'), ['action' => 'edit', $thread->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Thread'), ['action' => 'delete', $thread->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thread->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Threads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Thread'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="threads view large-10 medium-9 columns">
    <h2><?= h($thread->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($thread->title) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($thread->id) ?></p>
            <h6 class="subheader"><?= __('Actor Id') ?></h6>
            <p><?= $this->Number->format($thread->actor_id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created At') ?></h6>
            <p><?= h($thread->created_at) ?></p>
            <h6 class="subheader"><?= __('Updated At') ?></h6>
            <p><?= h($thread->updated_at) ?></p>
        </div>
    </div> 
    <div class="row texts">
        <div class="columns large-9">
<!--            <h6 class="subheader"><?= __('Body') ?></h6> -->
            <?= $this->Text->autoParagraph(h($thread->body)) ?>
        </div>
    </div>



 <div class="comments index large-10 medium-9 columns">
    <h3>Comment</h3>
    <?php
        echo $this->Form->create($comment,['action'=>'comment_add']);
        echo $this->Form->input('body');
        echo $this->Form->button(__('Submit'));
        echo $this->Form->hidden('thread_id',array('value'=>$thread->id));
        echo $this->Form->end();        
    ?>

    <table cellpadding="0" cellspacing="0">
<!--    <thead>コメント一覧</thead> -->
    <tbody>
    <?php foreach ($thread->comments as $comment): ?>
        <tr>
            <td><?= h($comment->body) ?></td>
            <td><?= h($comment->created_at) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Comments','action' => 'view', $comment->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments','action' => 'edit', $comment->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments','action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>

</div>
