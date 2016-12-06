<div class="content">
    <div class="inner">
        <article>
            <header>
                <h2>答えを教えずに、ヒントだけで誘導するオンライントレーニング!</h2>
            </header>
        <div id="left">
            <section>
                <h2>質問内容</h2>
                <?php foreach ($threads as $thread): ?>
                    <div class="box">
                        <h3 class="boxTitle">
                            <a <?= $this->Html->link(__(h($thread->title) ), ['action' => 'view', $thread->id])  ?>                      <!--  <?= $this->Html->link(__('h($thread->title) '), ['action' => 'view', $thread->id]) ?>-->
                            </a>
                        </h3>
                        <ul class="niceWrap listPos">
                            <li><span class="nice c_b">いい質問</span><span class="balloon">12</span></li>
                            <li><span class="nice c_o">いいアドバイス</span><span class="balloon">12</span></li>
                            <li><span class="nice c_g">閲覧数</span><span class="balloon">12</span></li>
                        </ul>
                        <div class="updateList posB">更新日時:<span class="time"><?= h($thread->updated_at) ?></span><span class="user"><?= h($thread->actor->name) ?></span></div>
                    </div><!-- box -->
                <?php endforeach; ?>

                <div class="pagination">
                    <div class="left">
                        <?= $this->Paginator->prev('< ' . __('prev')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </div><!-- left -->
                    <div class="right">
                        <span class="page active">10</span>
                        <a href="#" class="page">30</a>
                        <a href="#" class="page">50</a>
                        <span>件/ページ</span>
                    </div><!-- right -->
                </div><!-- pagination -->

            </section>
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
        </article>
      </div><!-- inner -->
</div><!-- content -->
