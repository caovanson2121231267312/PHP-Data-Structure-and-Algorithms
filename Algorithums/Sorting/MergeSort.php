<?php
    function merge_sort($my_array){ 
		if(count($my_array) == 1 ) return $my_array;  // mảng sẽ phân tách ra cho đến khi còn 1 phần tử mảng
		$mid = count($my_array) / 2; // cưa đôi mảng ra
		$left = array_slice($my_array, 0, $mid); // mảng trái bắt đầu từ index 0 tới $mid
		$right = array_slice($my_array, $mid); // mảng phải là các phần tử còn lại từ $mid
		$left = merge_sort($left);  // gọi lại merge_sort cho đến khi kích thước các mảng con là 1
		$right = merge_sort($right); // gọi lại merge_sort cho đến khi kích thước các mảng con là 1
		return merge($left, $right); // tiến trình gộp sẽ bắt đầu thực hiện gộp lại các mảng này cho tới khi hoàn thành và chỉ còn một mảng đã sắp xếp
	}

	function merge($left, $right){
		$res = array();  // khởi tạo mảng
		while (count($left) > 0 && count($right) > 0){
			// vòng lặp chạy khi cả 2 mảng bên trái và phải có ít nhất 1 phần tử
			if($left[0] > $right[0]){
				$res[] = $right[0]; // nếu $left[0] > $right[0] tức $right[0] bé hơn và sẽ được ghi vào mảng $res[]
				$right = array_slice($right , 1); // sau khi đẩy phần tử bé hơn lên thì cắt mảng từ phần tử đã thứ nhất
			}else{
				$res[] = $left[0];
				$left = array_slice($left, 1);
			}
		}
		// Với trường hợp khi 2 mảng con chỉ có 1 phần tử, ta chỉ việc xem phần tử nào nhỏ hơn và đẩy lên đầu, phần tử còn lại đặt phía sau. Do vậy, các mảng con cần gộp lại có tính chất luôn được sắp tăng dần.
		while (count($left) > 0){  
			$res[] = $left[0];  
			$left = array_slice($left, 1);  
		}
		while (count($right) > 0){  
			$res[] = $right[0];  
			$right = array_slice($right, 1);  
		}
		return $res;  
	}

	$arr = array(4, 34, 2, 7, -7, 100, 1, 4, 9);  
	echo "Mảng ban đầu:<br>";  
	echo implode(', ',$arr );  // chuyển đổi mảng về chuỗi
	echo "<br>Mảng đã qua sắp xếp:<br>";  
	echo implode(', ',merge_sort($arr))."<br>"; 
?>