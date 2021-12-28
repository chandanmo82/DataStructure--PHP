<?php

include "/Applications/XAMPP/xamppfiles/htdocs/PHP CFP Practice/DataStructure/LinkedList/Node.php";

/**
 * Class LinkedList
 */
class LinkedList
{
    public $head;

    public function __construct()
    {
        $this->head = NULL;
    }

    /**
     * add element at first
     */
    public function addAtFirst($item)
    {
        if ($this->head == null) {
            $this->head = new Node($item);
        } else {
            $temp = new Node($item);

            $temp->next = $this->head;

            $this->head = $temp;
        }
    }
    /**
     * Add element at last
     */
    public function addAtLast($item)
    {
        if ($this->head == null) {
            $this->head = new Node($item);
        } else {
            $temp = $this->head;
            while ($temp->next != null) {
                $temp = $temp->next;
            }

            $temp->next = new Node($item);
        }
    }

    /**
     * Delete the node which value matched with provided key
     * 
     */
    public function Delete($key)
    {
        $current = $previous = $this->head;

        while ($current->data != $key) {
            $previous = $current;
            $current = $current->next;
        }

        // For the Single node
        if ($current == $previous) {
            $this->head = $current->next;
        }

        $previous->next = $current->next;
    }
    /**
     * Delete At First position
     */
    public function deleteAtFirst()
    {
        if ($this->head == null) {
            echo "List is Empty\n";
        } else {
            $temp = $this->head;
            $this->head = $this->head->next;
            $temp = null;
        }
    }
    /**
     * Delete At last Position
     */
    public function deleteAtLast()
    {
        if ($this->head == null) {
            echo "List is Empty\n";
        } elseif ($this->head->next == null) {
            $this->head = null;
        } else {
            $temp = $this->head;
            while ($temp->next->next != null) {
                $temp = $temp->next;
            }
            $last = $temp->next;
            $temp->next = null;
            $last = null;
        }
    }
    /**
     * Sorting The LinkedList Element
     */
    public function sortLinkedList()
    {

        if ($this->head == null) {
            echo "List is Empty\n";
        } else {
            $currentValue = $this->head;
            $index = null;

            //While Loop For Traversing Throug Elements
            while ($currentValue != null) {
                $index = $currentValue->next;
                while ($index != null) {
                    if ($currentValue->data > $index->data) {
                        $temp = $currentValue->data;
                        $currentValue->data = $index->data;
                        $index->data = $temp;
                    }
                    $index = $index->next;
                }
                $currentValue = $currentValue->next;
            }
        }
    }

    /**
     * Print the link list as string like 1->3-> ...
     */
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

$linkedlist = new LinkedList();

$linkedlist->addAtLast(32);
$linkedlist->addAtLast(45);
$linkedlist->addAtLast(11);
$linkedlist->addAtLast(65);
$linkedlist->display();
$linkedlist->addAtFirst(89);
$linkedlist->addAtFirst(100);
$linkedlist->addAtFirst(199);
$linkedlist->addAtFirst(500);
$linkedlist->display();
$linkedlist->deleteAtFirst();
$linkedlist->display();
$linkedlist->Delete(45);
$linkedlist->display();
$linkedlist->deleteAtLast();
$linkedlist->display();
$linkedlist->sortLinkedList();
$linkedlist->display();
?>
