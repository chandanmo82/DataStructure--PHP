<?php

/**
 * php program for 
 * Implementing Queue using Linked List
 */
class QueueNode
{
    public $data;
    public $next;
    public function __construct($value)
    {
        $this->data = $value;
        $this->next = NULL;
    }
}
class MyQueue
{
    public $head;
    public $tail;
    public $count;

    public function __construct()
    {
        $this->head = NULL;
        $this->tail = NULL;
        $this->count = 0;
    }
    //Enqueue Function 
    //Add new node of queue
    public function enqueue($value)
    {
        $newNode = new QueueNode($value);
        /**
         * if the queue is empty then add node at first
         */
        if ($this->head == NULL) {

            $this->head = $newNode;
        } else {
            //Add node at the end using tail
            $this->tail->next = $newNode;
        }
        $this->count++;
        $this->tail = $newNode;
    }
    /**
     * Dequeue Function 
     * Delete a element into queue
     */
    public function dequeue()
    {

        if ($this->head == NULL) {
            echo "Queue is Empty\n";
            return -1;
        }
        $temp = $this->head;
        $this->head = $this->head->next;
        $this->count--;
        return $temp->data;
    }
    //Get present Front node
    public function peek()
    {
        if ($this->head == NULL) {
            echo "The queue is empty\n";
            return -1;
        }
        return $this->head->data;
    }
    public function size()
    {
        return $this->count;
    }
    public function isEmpty()
    {
        if ($this->head == NULL) {
            return true;
        } else {
            return false;
        }
    }
    public function display()
    {

        $list = $this->head;
        if ($list != null) {
            while ($list != null) {
                echo $list->data . " ";
                $list = $list->next;
            }
        }
        echo "\n";
    }
}
//Testing The code
$queueObject = new MyQueue();
$queueObject->enqueue(20);
$queueObject->enqueue(30);
$queueObject->enqueue(40);
$queueObject->enqueue(50);
$queueObject->enqueue(60);
$queueObject->display();
echo "Size is : " . $queueObject->size() . "\n";
echo "Current front node data : " . $queueObject->peek() . "\n";
echo "Dequeue : " . $queueObject->dequeue() . "\n";
echo "Size is : " . $queueObject->size() . "\n";
echo "Current front node data : " . $queueObject->peek() . "\n";
?>
