<?php
    function insertion_sort($arr){
        for($i=0; $i< count($arr); $i++){
            $val = $arr[$i];
            $j = $i-1;
            while($j>=0 && $arr[$j] > $val){
                $arr[$j+1] = $arr[$j];
                $j--;
            }
            $arr[$j+1] = $val;
        }
        return $arr;
    }

    $arr = array(9, 0, 2, 5, -1, 4, 1, 45, 3, 1, 34, 3, 7, 100);
	echo 'Mảng ban đầu: '.implode(' , ', $arr).'<br>';
	$arr = insertion_sort($arr);
	echo 'Mảng sau khi được sắp xếp: '.implode(' , ', $arr).'<br>';
?>