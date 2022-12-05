<?php
class Stack {
    private $top = -1;
    private $stack = [];
    
    public function __construct() {
        $this->top = -1;
    }

    // kiểm tra stack có trống ko
    public function isEmpty() {
        if($this->top == -1) {
            return true;
        }
        return false;
    }
    
    // thêm 1 item vào cuối stack
    public function push($val) {
        $this->stack[++$this->top] = $val;
    }
    
    // xóa 1 item vào cuối stack
    public function pop() {
        if($this->isEmpty()) {
            echo "Stack is empty";
        }
        $val =$this->stack[$this->top];
        --$this->top;
        return $val;
    }
    
    // trả về item đầu stack 
    public function first() {
        if($this->isEmpty()) {
            echo "Stack is empty";
        }
        return $this->stack[$this->top];
    }
    
    // kích thước stack hiện tại
    public function size() {
        return $this->top + 1;
    }
    
    // lấy ra tất cả item trong stack
    public function get_all_stack() {
        $i = $this->top;
        while($i >=0) {
            echo $this->stack[$i--] . "  ";
        }
    }
}
    $stack = new Stack();
    $stack->push("cao văn sơn 1");
    $stack->push("cao văn sơn 2");
    $stack->push("cao văn sơn 3");
    $stack->push("cao văn sơn 4");
    $stack->push("cao văn sơn 5");
    $stack->push("cao văn sơn 6");
    echo $stack->size();
    echo "<br>";
    $stack->get_all_stack();
    echo "<br>";
    $stack->pop();
    echo "<br>";
    $stack->get_all_stack();
    echo "<br>";
    echo $stack->size();
    echo "<br>";
?>