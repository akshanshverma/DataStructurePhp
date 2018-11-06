<?php
    require("utility.php");
    class Stack
    {
        //to hold 1st value of stack
        public $head = null;
        //to hold last value of stack
        public $tail = null;
        //to count no of node in stack
        public $count = 0;

        /**
         * function push is to add data in the stack
         * 
         * @param data $data hold the data which we want to push in the stack
         */
        public function push($data)
        {
            //n is object of Node class
            $n = new Node($data);
            // if condition to enter 1st value in the stack 
            // if head is null then it will make 1st value as head and and tail will aslo 
            // point the 1st value at that time 
            // and next of node will be null 
            if ($this->head == null) 
            {
                $this->head = $n;
                $this->tail = $this->head;
                $n->next = null;
                $this->count++;
                return;
            }

            //if head is not null the all value will add in the tail and that value change to tail
            //and break the method 
            $this->tail->next = $n;
            $this->tail = $n;
            $this->count++;
            return;
        }

        public function pop()
        {
            if ($this->count == 0) {
                return;
            }
            $temp = $this->tail->data;
            if ($this->head == $this->tail) {
                $temp = $this->tail->data;
                $this->head = null;
                $this->tail = null;
                $this->count--;
                return $temp;
            }
            $temp2 = $this->head;
            for ($i=1; $i < $this->count-1; $i++) { 
                $temp2 = $temp2->next;
            }
            //1245
            $this->tail = $temp2;
            $temp2->next = null;
            $this->count--;
            return $temp;
        }

        public function peek()
        {
            if ($this->count == 0) {
                echo "no data to peek\n";
                return;
            }
            return $this->tail->data;
        }

        public function show()
        {
            //temp to hold the head value so that main head value will not change 
            $temp = $this->head;
            //for loop to display all data
            for ($i=0; $i < $this->count; $i++) 
            { 
                echo $temp->data."\n";
                $temp = $temp->next;
            }
        }

        public function size()
        {
            return $this->count;
        }

        public function isEmpty()
        {
            return $this->count == 0;
        }
    }
?>