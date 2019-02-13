<?php
public function run($args)
{
    @set_time_limit(0);
    @ini_set('memory_limit', '2048M');

    $obj_arr = array(5,4,2,3,6,2,3,7,1,5,6,8,9,4,3,13,22,42,14,15);
    $obj_arr = $this->sortArr($obj_arr);
    var_export($obj_arr);
}
public function sortArr($arr){
    $right_arr = array();
    $left_arr = array();
    $length = count($arr);
    if($length <= 1){//只有一个元素的时候终止
        return $arr;
    }
    $pareNum = $arr[0];
    for($i=1;$i<$length;$i++){//从1开始，第一个元素已经有序了
        if($arr[$i] > $pareNum){
            $right_arr[] = $arr[$i];
        }else{
            $left_arr[] = $arr[$i];
        }
    }
    $left_arr = $this->sortArr($left_arr);
    $right_arr = $this->sortArr($right_arr);
    return array_merge($left_arr,array($pareNum),$right_arr);//把中间元素加上
}
