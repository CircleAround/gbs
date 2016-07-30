<?php if(!empty($current_user)) {$user = $current_user->toArray();} ?>

    <div class="inner">
    <div id="left">
  			<section>
            <h2>質問内容</h2>
                <div class="qTitleArea qTitlePos">
                    <h3 class="qTitle"><?= h($thread->title) ?>
                    <ul class="niceWrap answerPos">
                        <li><span class="nice c_b">いい質問</span><span class="balloon">12</span></li>
                        <li><span class="nice c_o">いいアドバイス</span><span class="balloon">12</span></li>
                        <li><span class="nice c_g">閲覧数</span><span class="balloon">12</span></li>
                    </ul>
                </div><!-- qTitleArea -->
                <p><?= $this->Text->autoParagraph(h($thread->body)) ?></p>
                <?php if(!empty($current_user)) { ?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $thread->id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $thread->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thread->id)]) ?>
                <?php } ?>


            <h2 class="c_orange">回答</h2>
            <?php foreach ($thread->comments as $comment): ?>
                  <?php if (!empty($current_user) && $comment->actor_id == $user['id']) { ?>
                    <div class="boxR">
                        <div class="boxInner">
                          <div class="updateList upWrap up_c_y">更新日時:<span class="time"><?= h($thread->updated_at) ?></span><span class="user"><?= h($thread->actor_id) ?></span></div>
                            <p class="answerText"><?= h($comment->body) ?></p>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Comments','action' => 'edit', $comment->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments','action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
                        </div><!-- boxInner -->
                    </div><!-- boxR -->
                <?php } else {?>
                    <div class="boxL">
                        <div class="boxInner">
                          <div class="updateList upWrap up_c_b">更新日時:<span class="time"><?= h($thread->updated_at) ?></span><span class="user"><?= h($thread->actor_id) ?></span></div>
                            <p class="answerText"><?= h($comment->body) ?></p>
                        </div><!-- boxInner -->
                    </div><!-- boxL -->
                <?php } ?>
            <?php endforeach; ?>
            <?php if(!empty($current_user)) { ?>
                <div class="arrowGotBtnWrap">
                  <div class="arrowGotBtn">
                    <p class="sabText">わかった！</span>
                    <p class="mainText">ありがとう</span>
                  </div>
                </div>
                <div class="al_R">
                  <?php echo $this->Form->create($add_comment, array(
                    'url' => array('controller' => 'comments', 'action'=>'add'))); ?>
                  <?php echo $this->Form->input('body',['label'=>false,'type'=>'textarea','cols'=>'92','rows'=>'15']); ?>
                  <?php echo $this->Html->link(__('質問を投稿する'),['action'=>'add'],['class'=>'btn cg_b']); ?>
                  <?php echo $this->Form->button(__('アドバイスを投稿'), ['class'=>'btn cg_o']); ?>
                  <?php echo $this->Form->hidden('thread_id',array('value'=>$thread->id)); ?>
                  <?php echo $this->Form->end(); ?>
                </div><!-- al_R -->
            <?php } else {?>
              <div class="al_R">
                <a href="/account/signup" class="btn cg_o">Sign up</a><a href="/oauth/login" target="_blank" class="btn cg_g">Sign in</a>
              </div><!-- al_R -->
            <?php } ?>
          </section><!-- section -->
            </div><!-- left -->
            <div id="right">
               <section>
    				<h2>最近のタグ</h2>
                    <ul id="tagList">
                    	<li><a href="yet.html" class="tagIcon">html</a><span class="tagNum">9</span></li>
                    	<li><a href="yet.html" class="tagIcon">css</a><span class="tagNum">99</span></li>
                        <li><a href="yet.html" class="tagIcon">php</a><span class="tagNum">999</span></li>
                        <li><a href="yet.html" class="tagIcon">java</a><span class="tagNum">9999</span></li>
                        <li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">9</span></li>
                    	<li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">99</span></li>
                        <li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">999</span></li>
                        <li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">9999</span></li>
                        <li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">9</span></li>
                    	<li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">99</span></li>
                        <li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">999</span></li>
                        <li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">9999</span></li>
                        <li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">9</span></li>
                    	<li><a href="yet.html" class="tagIcon">javascript</a><span class="tagNum">99</span></li>
                    </ul>
               </section>
            </div><!-- right -->
            </div><!-- inner -->
