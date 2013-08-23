<?php

class CUtils
{

    /**
	 * get $times rand int and thest int must not repeat
	 * @param int $max
	 * @param array $notArr
	 */
    public static function randIntArrNotRepeat ($max, $times)
    {

        $intArr = array();
        for ($i = 0; $i < $times; $i ++) {
            $intArr[] = self::randIntWithNot($max, $intArr);
        }
        return $intArr;
    }

    /**
	 * rand int and this int not in notArr
	 * @param int $max
	 * @param array $notArr
	 */
    public static function randIntWithNot ($max, $notArr)
    {

        while (1) {
            $int = mt_rand(0, $max);
            if (array_search($int, $notArr) === false) {
                return $int;
            }
        }
    }

    /**
     * 
     * @param unknown_type $value
     * @return string
     * 
     * @author Sam Xiao
     * @since 1.0
     */
    public static function formatDate ($value)
    {

        return $value != '' ? date("m/d/Y", $value) : '';
    }
    /**
     * Camel-Case
     * 
     * format string like foo_bar to fooBar
     * 
     * @param string $name
     * @return string
     * 
     * @author Sam Xiao
     * @since 1.0
     */
    public static function formatCamelCaseName($name){
        $return='';
        $first=true;
        foreach(explode('_',$name) as $item)
        {
            if($item!==''){
                if($first){
                    $return.=strtolower($item);
                    $first = false;
                }else{
                    $return.=ucfirst(strtolower($item));
                }
            }
        }
        return $return;
    }
}