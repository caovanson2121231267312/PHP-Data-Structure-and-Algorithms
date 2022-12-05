# PHP-Data-Structure-and-Algorithms

## Merge sort - Thuật toán sắp xếp trộn

- Hiệu suất của bubble sort O(n):
- Trường hợp tốt nhất: n log n
- Trường hợp tệ nhất: n log n
- Ưu điểm: Hiệu suất của merge sort rất cao
- Nhược điểm: Code thuật toán này khá phức tạp
- Thuật toán merge sort: Thuật toán này chia mảng cần sắp xếp thành 2 nửa. Tiếp tục lặp lại việc này ở các nửa mảng đã chia. Sau cùng gộp các nửa đó thành mảng đã sắp xếp. Hàm merge() được sử dụng để gộp hai nửa mảng. Hàm merge( $left, $right) là tiến trình quan trọng nhất sẽ gộp hai nửa mảng thành 1 mảng sắp xếp, các nửa mảng là arr[l…m] và arr[m+1…r] sau khi gộp sẽ thành một mảng duy nhất đã sắp xếp.

```php
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
```

## Quick sort - Thuật toán sắp xếp nhanh

- Hiệu suất của quick sort O(n):
- Trường hợp tốt nhất: n log n
- Trường hợp tệ nhất: n^2
- Ưu điểm: Tuỳ cách chọn pivot mà tốc độ của thuật toán nhanh hay chậm
- Nhược điểm: Code khá phức tạp
- Thuật toán Quick sort: Chọn một phần tử trong mảng làm điểm đánh dấu(pivot). Thuật toán sẽ thực hiện chia mảng thành các mảng con dựa vào pivot đã chọn. Di chuyển tất cả các phần tử của mảng mà nhỏ hơn pivot sang bên trái vị trí của pivot, và di chuyển tất cả các phần tử của mảng mà lớn hơn pivot sang bên phải vị trí của pivot. Tiếp tục công việc với mỗi mảng con(chọn pivot, phân đoạn) cho tới khi mảng được sắp xếp.

```php
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
```

## Bubble sort - Thuật toán sắp xếp nổi bọt

- Hiệu suất của bubble sort O(n):
- Trường hợp tốt nhất: n
- Trường hợp tệ nhất: n^2
- Ưu điểm: Code ngắn gọn nhất
- Nhược điểm: Hiệu suất thấp nhất
- Thuật toán Bubble sort: Thuật toán sắp xếp bubble sort thực hiện sắp xếp dãy số bằng cách lặp lại công việc đổi chỗ 2 số liên tiếp nhau nếu chúng đứng sai thứ tự (số sau bé hơn số trước với trường hợp sắp xếp tăng dần) cho đến khi dãy số được sắp xếp.

```php
<?php
    function bubble_sort($arr, $array_size){
        for ( $i = 0; $i < $array_size; $i++ ){// so sánh 2 phần tử liền nhau trong mảng
            for ($j = 0; $j < $array_size; $j++ ){
                if ($arr[$i] < $arr[$j]){ // so sánh 2 phần tử liền nhau nếu $arr[$i] < $arr[$j] thì tiến hành đổi chỗ
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
```

## Insert sort - Thuật toán sắp xếp chèn

- Hiệu suất của insert sort O(n):
- Trường hợp tốt nhất: n
- Trường hợp tệ nhất: n^2
- Ưu điểm: Chạy nhanh khi mảng nhỏ hay được sắp xếp một phần
- Nhược điểm: Hiệu suất thấp
- Thuật toán Insert sort: So sánh phần tử hiện tại với phần tử trước của nó. Nếu phần tử chính nhỏ hơn phần tử trước của nó, hãy so sánh nó với các phần tử trước đó. Di chuyển các phần tử lớn hơn lên một vị trí để tạo khoảng trống cho phần tử được hoán đổi.

```php
<?php
    function insertion_sort($arr){
        for($i=0; $i< count($arr); $i++){
            $val = $arr[$i];
            $j = $i-1;
            while($j>=0 && $arr[$j] > $val){// so sánh phần tử đang sét với các phần tử trước nó
                $arr[$j+1] = $arr[$j]; // di chuyển các phần tử lớn hơn lên một vị trí để tạo khoảng trống cho phần tử được hoán đổi
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
```

## Selection sort - Thuật toán sắp xếp chọn

- Hiệu suất của selection sort O(n):
- Trường hợp tốt nhất: n^2
- Trường hợp tệ nhất: n^2
- Ưu điểm: Thuật toán chạy nhanh hơn khi mảng sắp xếp một phần
- Nhược điểm: Hiệu suất không cao
- Thuật toán selection sort: Ban đầu, phần được sắp xếp là trống và phần chưa được sắp xếp là toàn bộ danh sách ban đầu. Phần tử nhỏ nhất được lựa chọn từ mảng chưa được sắp xếp và được tráo đổi với phần bên trái nhất và phần tử đó trở thành phần tử của mảng được sắp xếp. Tiến trình này tiếp tục cho tới khi toàn bộ từng phần tử trong mảng chưa được sắp xếp đều được di chuyển sang mảng đã được sắp xếp.

```php
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
```


## Thuật toán tìm kiếm

### Thuật toán Linear Search

- Đây là thuật toán đơn giản nhất trong tất cả các thuật toán tìm kiếm. Trong kiểu tìm kiếm này, một hoạt động tìm kiếm liên tiếp được diễn ra qua tất cả từng phần tử. Mỗi phần tử đều được kiểm tra và nếu tìm thấy bất kỳ kết quả nào thì phần tử cụ thể tại vị trí đó được trả về; nếu không tìm thấy thì quá trình tìm kiếm tiếp tục diễn ra cho tới khi tìm kiếm hết dữ liệu.

```php
<?php
    function linear_search($arr, $x) {
        for($i = 0; $i < sizeof($arr); $i++) {
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
```

### Thuật toán Binary Search

- Binary Search còn gọi là tìm kiếm nửa khoảng, là một thuật toán tìm kiếm xác định vị trí của một giá trị cần tìm trong một mảng đã được sắp xếp. Thuật toán tiến hành so sánh giá trị cần tìm với phần tử đứng giữa mảng.

```php
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
```

## Datastructure

###  Hàng đợi (queue)

- Hàng đợi (queue) là một cấu trúc dữ liệu hoạt động theo cơ chế FIFO (First In First Out)

```php
<?php
class Queue {
    private $queue=[];
    private $front;
    private $rear;
    
    public function __construct() {
        $this->front = -1;
        $this->rear = -1;
    }
    
    public function isEmpty() {
        if($this->front == -1 || $this->front > $this->rear) {
            return true;
        }
        return false;
    }
    // thêm 1 phần tử vào cuối queue
    public function enqueue($val) {
        if($this->front == -1) {
            $this->front = 0;
        }
        ++$this->rear;
        $this->queue[$this->rear] = $val;
    }

    // thêm nhiều phần tử vào cuối queue
    public function enqueues($arr) {
        foreach($arr as $val){
            $this->enqueue($val);
        }
    }

    // xóa phần tử đầu tiên trong queue
    public function dequeue () {
        if($this->isEmpty()) {
            echo "Queue is empty";
        }
        $val =$this->queue[ $this->front];
        ++$this->front;
        return $val;
    }

    public function size() {
        return $this->rear - $this->front + 1;
    }

    // lấy ra phần tử cuối cùng trong queue
    public function last() {
        if($this->isEmpty()) {
            echo "Queue is empty";
        }
        return $this->queue[$this->rear];
    }

    // lấy ra phần tử đầu tiên trong queue
    public function first() { 
        if($this->isEmpty()) {
            echo "Queue is empty";
        }
        return $this->queue[$this->front];
    }
    
    // lấy ra tất cả phần tử trong queue
    public function get_all_queue(){
        if($this->isEmpty()) {
            echo "Queue is empty";
        } else {
            for($i = $this->front; $i <= $this->rear; $i++) {
                echo $this->queue[$i] . "  ";
            }
        }
    } 
}

    $arr = ["cao văn sơn", "học lập trình", "php"];

    $queue = new Queue(); // khởi tạo Queue
    $queue->enqueue("456"); 
    $queue->enqueue("abc");
    $queue->enqueues($arr);
    
    $queue->get_all_queue();
    echo "<br>";
    echo $queue->first();
    echo "<br>";
    echo $queue->last();
    echo "<br>";
    $queue->dequeue();
    echo "<br>";
    $queue->get_all_queue();
    echo "<br>";
    echo "Kích thước queue hiện tại: " . $queue->size();
?>
```

### stack (ngăn xếp)

- Stack (Ngăn xếp) là một linear data structure. Stack hoạt động theo cơ chế LIFO (Last In First Out). Tức là, phần tử nào được thêm vào đầu tiên thì sẽ được lấy ra sau cùng

* Các thao tác cơ bản của Stack gồm có:
    * **Push:** Thêm một phần tử vào Stack.
    * **Pop:** Xóa một phần tử được thêm vào gần nhất khỏi Stack, và trả về phần tử đó.
    * **Peek hoặc Top:** Trả về phần tử ở đỉnh của Stack.
    * **isEmpty:** Trả về true nếu Stack đang rỗng, ngược lại trả về false.

```php

```