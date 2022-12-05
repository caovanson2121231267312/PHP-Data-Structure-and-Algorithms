<?php
    function linear_search($arr, $x) {
        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i] == $x){
                return $i; // duyệt lần lượt các phần tử của mảng nếu tìm thấy kết quả khớp thì trả về
            }
        }
        return;
    }
    $arr = array(4, 2, 5, 6, 14, 7, 15, 3);
    $x = 14;
    if(linear_search($arr, $x)){
        echo "vị trí số cần tìm trong mảng là: " . linear_search($arr, $x);
    }else{
        echo "Không có số cần tìm trong mảng ";
    }
?>