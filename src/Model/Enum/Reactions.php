<?php

namespace App\Model\Enum;

class Reactions
{
    use Enum;

    public static $UNKNOWN;
    public static $GOOD_QUESTION;
    public static $NICE_ADVISE;
    public static $ANSWER;

    public static function _initialize()
    {
      static::$UNKNOWN = new Reactions('UNKNOWN', 0);
      static::$GOOD_QUESTION = new Reactions('GOOD_QUESTION', 1);
      static::$NICE_ADVISE = new Reactions('NICE_ADVISE', 2);
      static::$ANSWER = new Reactions('UNKNOWN', 99);
    }
}

Reactions::_initialize();
