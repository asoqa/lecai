<?php

Class Rules
{
    private static $_redballs=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33);
    private static $_blueballs=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
    public static $excludeRedballsRule; //要排除的红球
    public static $excludeBlueballRule; //要排除的蓝球
    public static $includeRedballRule;  //确定的红球
    public static $includeBlueballRule; //确定的蓝球
    /*
     * 红球和的规则
     * eg:
     * 1. 落在某个闭区间,[99, 105]
     *    array('min'=>'99', 'max'=>'105');
     * 2. 围绕某个值上下波动5%, [96.9, 107.1]=>[97, 107]
     *    array('range'=>array('mean'=>102', percentage=>'5');
     * 3. 只取特定几个值
     *    array('select'=>array(100,101,102))
     */
    public static $sumRedBallsRule; 
    
    /*
     * 设定红球的出现几率
     * eg:
     * 1. 1号球20%的出现几率
     *    array('1'=>'20')
     */
    public static $redBallsWeightRule;
    public static $blueBallsWeightRule; //设定蓝球的出现几率
    
    public static $results=array();
    
    public static function applyExcludeRedBallsRule()
    {
        return self::excludeBalls(self::$_redballs, self::$excludeRedballsRule);
    }
    
    public static function applyExcludeBlueBallsRule()
    {
        return self::excludeBalls(self::$_blueballs, self::$excludeBlueballRule);
    }    
    
    private static function excludeBalls($arr, $excludes)
    {
        switch(gettype($excludes))
        {
            case 'string':
            case 'int':
            case 'float':
                if(!empty($excludes))
                {
                    $pos=array_search($excludes, $arr);
                    if($pos!==false)
                    {
                        array_splice($arr, $pos, 1);
                    }
                }
                break;                
            case 'array':
                foreach($excludes as $ball)
                {
                    $pos=array_search($ball, $arr);
                    if($pos!==false)
                    {
                        array_splice($arr, $pos, 1);
                    }                    
                }
                break;
            default:
                return $arr;
        }
        return $arr;
    }
    
    private static function combination($arr, $len=0, $balls='')
    {
        $arr_len = count($arr);
        if($len == 0){
            $min=isset(self::$sumRedBallsRule['min']) ? self::$sumRedBallsRule['min'] : 0;
            $max=isset(self::$sumRedBallsRule['max']) ? self::$sumRedBallsRule['max'] : 999;  

            $arr=explode(':', $balls);
            $sum=array_sum($arr);
            
            if($sum>=$min && $sum<=$max)
            {
                self::$results[]=$balls;
//                 print $balls."<br/>";
            }
        }else{
            for($i=0; $i<$arr_len-$len+1; $i++){
                $tmp = (int)array_shift($arr);
                self::combination($arr, $len-1, $tmp.':'.$balls);
            }
        }
    }
    
    public static function applySumRedBallsRule($redballs)
    {
        //check rules
        self::combination($redballs, 6);
    }
    
    public static function run()
    {
        $rb=null;
        $bb=null;
        if(!empty(self::$excludeRedballsRule))
            $rb=self::applyExcludeRedBallsRule();
        else
            $rb=self::$_redballs;
        
        if(!empty(self::$excludeBlueballRule))
            $bb=self::applyExcludeBllueBallsRule();
        else
            $bb=self::$_blueballs;
        
//         print_r($rb);
        if(!empty(self::$sumRedBallsRule))
            self::applySumRedBallsRule($rb);
    }
}