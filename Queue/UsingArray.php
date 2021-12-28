<?php
interface Queue {
    public function enqueue(string $item);
    public function dequeue();
    public function peek();
    public function isEmpty();
}
class AgentQueue implements Queue{

    private $limit;
    private $queue;

    public function __construct(int $limit=20)
    {
       $this->limit = $limit;
       $this->queue = []; 
    }
    public function dequeue():string
    {
       if($this->isEmpty()){
           throw new UnderflowException("Queue is Empty");
       }
       else{
           return array_shift($this->queue);
       }
    }
    public function enqueue(string $newItem)
    {
       if(count($this->queue) < $this->limit){
           array_push($this->queue,$newItem);

       } 
       else{
           throw new OverflowException("Queue is Full");
       }
    }
    public function peek():string
    {
       return current($this->queue); 
    }
    public function isEmpty():bool
    {
       return empty($this->queue); 
    }
}
try{
    $agent = new AgentQueue(10);
    $agent->enqueue("CHANDAN");
    $agent->enqueue("SMITH");
    $agent->enqueue("VINOD");
    $agent->enqueue("AK47");
    echo $agent->dequeue()."\n";
    echo $agent->dequeue()."\n";
    echo $agent->peek()."\n";
}
catch(Exception $e){
    echo $e->getMessage()."\n";
}