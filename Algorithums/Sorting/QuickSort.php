<?php
    function quick_sort($arr) {
		$loe = $gt = array(); // khởi tạo 2 mảng left right
		if(count($arr) < 2) {
			return $arr;
		}
		$pivot_key = key($arr);  // chọn key đầu tiên của mảng làm pivot so sánh
		$pivot = array_shift($arr); // xóa phần tử mảng đầu tiên và trả về phần tử xóa 
		foreach($arr as $val) { // duyệt qua các phần tử của mảng
			if($val <= $pivot) { // nếu phần tử đang sét nhỏ hơn $pivot thì cho sang mảng bên trái
				$loe[] = $val;
			} else if($val > $pivot) { // nếu phần tử đang sét lớn hơn $pivot thì cho sang mảng bên phải
				$gt[] = $val;
			}
		}

		// gộp lại mảng mới thứ tự lần lượt left pivot right
		return array_merge(quick_sort($loe), array($pivot_key=>$pivot), quick_sort($gt));
	}
  
	$arr = array(9, 0, 2, 5, -1, 4, 1, 45, 3, 1, 34, 3, 7, 100);
	echo 'Mảng ban đầu: '.implode(' , ', $arr).'<br>';
	$arr = quick_sort($arr);
	echo 'Mảng sau khi được sắp xếp: '.implode(' , ', $arr).'<br>';
?>