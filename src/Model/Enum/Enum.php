<?php

namespace App\Model\Enum;

/**
 * Enumを実現するためのtrait
 * @see http://f-retu.hatenablog.com/entry/2013/08/29/231226
 */
trait Enum
{
    /** 生成したEnumを保持する配列 */
    public static $values = array();

    /** 名称 */
    public $name;

    /** 実値 */
    public $value;

    /**
     * コンストラクタ
     *
     * @param string $name  名称
     * @param mixed  $value 実値
     */
    protected function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
        self::$values[] = $this;
    }

    /**
     * 実値と等価のEnumオブジェクトを返します。見つからない場合、nullを返します。
     *
     * @return mixed Enumオブジェクト
     */
    public static function ofSafe($value)
    {
        foreach (self::$values as $enum) {
            if ($value === $enum->value) {
                return $enum;
            }
        }

        return null;
    }

    /**
     * 実値と等価のEnumオブジェクトを返します。見つからない場合、Exceptionをthrowします。
     *
     * @return mixed Enumオブジェクト
     */
    public static function of($value)
    {
       $result = self::ofSafe($value);
       if (is_null($result)) {
            throw new \Exception("IleegalArgument. value=$value");
       }

       return $result;
    }

    /**
     * オブジェクトの情報を文字列として返します。
     * 
     * @return string オブジェクトの情報を文字列
     */
    public function __toString()
    {
        $result = get_class($this) . ':';
        $result .= 'name=';
        $result .= $this->name . ',';
        $result .= 'value=';
        $result .= $this->value;

        return $result;
    }
}
