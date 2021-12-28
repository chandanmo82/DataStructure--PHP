<?php
// Php program for
// Implementation stack using linked list

// Stack Node
class StackNode
{
	public $data;
	public $next;
	public	function __construct($data, $top)
	{
		$this->data = $data;
		$this->next = $top;
	}
}
class MyStack
{
	public $top;
	public $count;
	public	function __construct()
	{
		$this->top = NULL;
		$this->count = 0;
	}
	// Returns the number of element in stack
	public	function size()
	{
		return $this->count;
	}
	public	function isEmpty()
	{
		if ($this->size() > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	// Add a new element in stack
	public	function push($data)
	{
		// Make a new stack node
		// And set as top
		$this->top = new StackNode($data, $this->top);
		// Increase node value
		$this->count++;
	}
	// Add a top element in stack
	public	function pop()
	{
		$temp = 0;
		if ($this->isEmpty() == false)
		{
			// Get remove top value
			$temp = $this->top->data;
			$this->top = $this->top->next;
			// Reduce size
			$this->count--;
		}
		return $temp;
	}
	// Used to get top element of stack
	public	function peek()
	{
		if (!$this->isEmpty())
		{
			return $this->top;
		}
		else
		{
			return 0;
		}
	}
	public function display()
    {

        $list = $this->top;
        if ($list != null) {
            while ($list != null) {
                echo $list->data . " ";
                $list = $list->next;
            }
        }
        echo "\n";
    }
}
$obj = new MyStack();
echo "\n Is empty : ", ($obj->isEmpty() == 1 ? "true" : "false"), "\n";
// Add element
$obj->push(15);
$obj->push(14);
$obj->push(31);
$obj->push(21);
$obj->push(10);
$obj->display();
//echo $obj->peek(). "\n";
// Delete Stack Element
$data = $obj->pop();
echo "\n Pop element ", ($data), "\n";
$obj->display();
$data = $obj->pop();
echo "\n Pop element ", ($data), "\n";
$obj->display();
echo $obj->size();
?>
