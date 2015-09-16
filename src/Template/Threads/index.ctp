<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Thread'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="threads index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('actor_id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('created_at') ?></th>
            <th><?= $this->Paginator->sort('updated_at') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($threads as $thread): ?>
        <tr>
            <td><?= $this->Number->format($thread->id) ?></td>
            <td><?= $this->Number->format($thread->actor_id) ?></td>
            <td><?= h($thread->title) ?></td>
            <td><?= h($thread->created_at) ?></td>
            <td><?= h($thread->updated_at) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $thread->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $thread->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $thread->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thread->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
