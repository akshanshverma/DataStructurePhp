<?php
    /**
    * 
    * Purpose:  Deque is to perfrom action on linked list which have function 
    * addFront, addRear, removeFront, removeRear etc
    *
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    require("utility.php");
    class Deque
    {
        //to hold 1st value of Deque
        public $head = null;
        //to hold last value of Deque
        public $tail = null;
        //to count no of node in Deque
        public $count = 0;

        /**
         * function addFront is to add data int the front of the queue
         * 
         * @param $data which we want to add 
         */
        public function addFront($data)
        {
            //object of node
            $n = new Node($data);
            //if no data in the queue it will add in the front 
            if ($this->head == null) 
            {
                $this->head = $n;
                $this->tail = $this->head;
                $n->next = null;
                $this->count++;
                return;
            }
            $n->next = $this->head;
            $this->head = $n;
            $this->count++;
            return;            
        }

        /**
         * function addRear is to add data in the Deque
         * 
         * @param data $data hold the data which we want to add in the Deque
         */
        public function addRear($data)
        {
            //n is object of Node class
            $n = new Node($data);
            // if condition to enter 1st value in the Deque 
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

        /**
         * function removeFront will remove the front value of deque
         * 
         * @return $temp which hold the front data of queue
         */
        public function removeFront()
        {
            //if queue have nothing then it will do nothing
            if ($this->head == null) {
                return;
            }
            //$temp to hold head value to return 
            $temp = $this->head;
            if ($this->head == $this->tail) {
                $this->head = null;
                $this->tail = null;
                $this->count--;
                return $temp->data;
            }
            $this->head = $this->head->next;
            $this->count--;
            return $temp->data;
        }

        /**
         * function removeRear will remove the rear value of deque
         * 
         * @return $temp which hold the rear data of queue
         */
        public function removeRear()
        {
            //if queue have nothing then it will do nothing 
            if ($this->count == 0) {
                return;
            }
            //$temp to hold tail value to return
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
            $temp2 = $this->tail;
            $this->count--;
            return $temp;
        }

        /**
         * function show is to print all the value in the list
         */
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

        /**
         * function size is to return the size of deque
         * @return size of deque
         */
        public function size()
        {
            return $this->count;
        }

        /**
         * function isEmpty is to check deque is empty or not
         * 
         * @return boolean 
         */
        public function isEmpty()
        {
            return $this->count == 0;
        }
    }
?>