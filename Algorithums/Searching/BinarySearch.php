<?php
    function binarySearch($arr, $x) {
        if (count($arr) === 0) {
            return false;
        }
        $low = 0;
        $high = count($arr) - 1;
        while ($low <= $high) {
            $mid = floor(($low + $high) / 2); // lấy giá trị giữa của mảng
            if($arr[$mid] == $x) {
                return true; // so sánh nếu tồn tại phần tử thì return true
            }
            if ($x < $arr[$mid]) {
                $high = $mid -1;
            } else {
                $low = $mid + 1;
            }
        }
        return false;
    }
    
    $arr = array(1, 2, 3, 4, 5);
    $x = 5;
    if(binarySearch($arr, $x) == true) {
        echo $x . " có tồn tại trong mảng";
    } else {
        echo $x . " không tồn tại";
    }
?>