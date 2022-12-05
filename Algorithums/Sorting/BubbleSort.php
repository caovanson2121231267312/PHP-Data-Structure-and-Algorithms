<?php
    function bubble_sort($arr, $array_size){
        for ( $i = 0; $i < $array_size; $i++ ){
            for ($j = 0; $j < $array_size; $j++ ){
                if ($arr[$i] < $arr[$j]){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        return $arr;
    }

    $arr = array(9, 0, 2, 5, -1, 4, 1, 45, 3, 1, 34, 3, 7, 100);
    $array_size = count($arr);
	echo 'Mảng ban đầu: '.implode(' , ', $arr).'<br>';
	$arr = bubble_sort($arr, $array_size);
	echo 'Mảng sau khi được sắp xếp: '.implode(' , ', $arr).'<br>';
?>