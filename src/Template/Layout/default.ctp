<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
<?= $this->Html->charset() ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>GBS｜ログイン前後</title>

<?= $this->Html->meta('icon') ?>

<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('cake.css') ?>
<?= $this->Html->css('reset.css') ?>
<?= $this->Html->css('common.css') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
</head>

<body>
    <header>
        <div class="inner">
            <h1><a href="/"><img src="/img/logo.png" width="119" height="35" alt="答えを教えないオンライントレーニングGBS"></a></h1>
            <nav>
                <ul>
                  <li><a href="/threads/add">質問</a></li>
                  <li><a href="../../../../../design/01/tag.html">タグ</a></li>
                  <li><a href="../../../../../design/01/yet.html">未回答</a></li>
                  <li><a href="../../../../../design/01/explain.html">使い方</a></li>
                </ul>
            </nav>
            <div id="boutton">
                <?php if(!empty($current_user)) { ?>
                <a href="/" class="btn cg_g">Sign out</a>
                <?php } else { ?>
                <a href="/oauth/login" class="btn cg_o">Sign up</a><a href="/" target="_blank" class="btn cg_g">Sign in</a>
                <?php } ?>
            </div><!-- boutton -->
        </div><!-- inner -->
    </header><!-- header -->

    <div id="container">
        <div id="content">
            <?= $this->Flash->render() ?>

            <div class="row">
                <?= $this->fetch('content') ?>
            </div><!-- row -->
        </div><!-- content -->
        <footer>
            <div class="inner">
            	  <a href="/" class="logo"><img src="/img/logo.png" width="119" height="35" alt="GBS"></a>
            	  <ul id="fNav">
                	  <li><a href="../../../../../design/01/summary.html">利用規約</a></li>
                    <li><a href="../../../../../design/01/summary.html">プライバシーポリシー</a></li>
                    <li><a href="../../../../../design/01/summary.html">ヘルプ</a></li>
                    <li><a href="../../../../../design/01/summary.html">Special Thanks</a></li>
                    <li><a href="../../../../../design/01/summary.html">運営会社</a></li>
                </ul>
                <small>© 2015 GBS,Inc.All rights reserved.</small>
            </div><!-- inner -->
        </footer>
        </div><!-- content -->
    </div><!-- container -->
</body>
</html>
