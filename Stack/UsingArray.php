<?php
interface Stack{
    public function push($item);
    public function pop();
    public function top();
    public function isEmpty();
}
class Books implements Stack{

    private $limit;
    private $stack;

    public function __construct(int $limit =20)
    {
        $this->limit = $limit;
        $this->stack = [];
    }

    public function pop():string {
        if ($this->isEmpty()){
            throw new UnderflowException("Stack is Empty");
        }
        else {
            return array_pop($this->stack);
        }

    }
    public function push($newItem){
        if(count($this->stack)<$this->limit){
            array_push($this->stack,$newItem);
        }
        else{
            throw new OverflowException("Stack is Full");
        }
    }
    public function top():string{
        return end($this->stack);
    }
    public function isEmpty():bool{
        return empty($this->stack);
    }
    
}
try {
    $bookName = new Books(10);
    $bookName->push("Half Girlfriend");
    $bookName->push("Introduction to Space");
    $bookName->push("Mastering JavaScript");
    $bookName->push("Space-x");
    echo $bookName->pop()."\n";
    echo $bookName->top()."\n";
}
catch(Exception $e) {
    echo $e-> getMessage();

}
?>

