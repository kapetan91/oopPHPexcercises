<?php

class StackItem {
   public $data;
   public $previousItem;

   public function __construct($data, $previousItem = null)
   {
       $this->data = $data;
       $this->previousItem = $previousItem;
   }
}

class Stack {
   private $topItem;

   public function push($data)
   {
       $newTopItem = new StackItem($data, $this->topItem);
       $this->topItem = $newTopItem;
   }

   public function pop()
   {
       $dataToReturn = $this->topItem->data;
       $this->topItem = $this->topItem->previousItem;
       return $dataToReturn;
   }
}

$stack = new Stack();

$stack->push('111');
$stack->push('222');
$stack->push('333');
$stack->push('444');

$top = $stack->pop();

echo "Top is: " . $top . "<br/>";

$top = $stack->pop();

echo "Top is: " . $top . "<br/>";
