<?php
    function swap(&$a, &$b){
        $c = $a;
        $a = $b;
        $b = $c;
    }

    function selection_sort($arr){
        $len = count($arr);
        for ($i = 0; $i < $len - 1; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$i] > $arr[$j]) {
                    swap($arr[$i], $arr[$j]);
                }
            }
        }
        return $arr;
    }

    $arr = array(9, 0, 2, 5, -1, 4, 1, 45, 3, 1, 34, 3, 7, 100);
	echo 'Mảng ban đầu: '.implode(' , ', $arr).'<br>';
	$arr = selection_sort($arr);
	echo 'Mảng sau khi được sắp xếp: '.implode(' , ', $arr).'<br>';
?>