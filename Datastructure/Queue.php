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