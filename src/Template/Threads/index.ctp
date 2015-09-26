<?= $this->Html->css(['bootstrap/bootstrap.min', 'bootstrap/styles']) ?>
<?= $this->Html->script(['jquery/jquery', 'bootstrap/bootstrap.min']) ?>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1><?= __('Actions') ?></h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="no-gutter row">
    <div class="col-md-2">
      <div class="panel panel-default" id="sidebar">
      <div class="panel-heading" style="background-color:#888;color:#fff;">Sidebar</div> 
      <div class="panel-body">
      <ul class="nav nav-stacked">
        <li><?= $this->Html->link(__('New Thread'), ['action' => 'add']) ?></li>
      </ul>
      </div>
      </div>
    </div>
    <div class="col-md-7" id="content">
      <div class="panel">
        <div class="panel-heading" style="background-color:#111;color:#fff;">Threads</div>   
          <div class="panel-body">
            <div class="row">
              <div class="col-md-8">
                <table class="table" cellpadding="0" cellspacing="0">
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
                <div class="pagination">
                  <ul class="pager">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                  </ul>
                  <p style="margin-left:70px;"><?= $this->Paginator->counter() ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
