<?php

namespace App\Test\TestCase\Model\Enum;

use App\Model\Enum\Reactions;
use Cake\TestSuite\TestCase;

class ReactionsTest extends TestCase
{
  public function testSenario(){
    // Enumが動作するかを調べているだけなので、一旦この形式だけです。
    $this->assertEquals(0, Reactions::$UNKNOWN->value);
    $this->assertEquals('UNKNOWN', Reactions::$UNKNOWN->name);

    // Enumは型安全なので、下記のように動作します。
    // $this->typedMethod(Reactions::$UNKNOWN); //正常に通ります
    // $this->typedMethod(0); // 型が合っていないのでエラーになります
  }

  // 型を引数で指定したメソッド
  private function typedMethod(Reactions $reaction){

  }

}
