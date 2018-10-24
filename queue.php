<?php
    /**
    * 
    * Purpose: queue is a helper file which hold the function to perform action on 
    * the queue
    * 
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    require("unOrderedList.php");
    class Queue
    {
        //to hold 1st value of queue
        public $head = null;
        //to hold last value of queue
        public $tail = null;
        //to count no of node in queue
        public $count = 0;

        /**
         * function enqueue is to add data in the queue
         * 
         * @param data $data hold the data which we want to add in the queue
         */
        public function enqueue($data)
        {
            //n is object of Node class
            $n = new Node($data);
            // if condition to enter 1st value in the queue 
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
         * function dequeu is to remove element from the straing of the queue
         * 
         * @return $temp which hold starting value 
         */
        public function dequeue()
        {
            if ($this->head == null) {
                return;
            }
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
         * function show is to print list
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

        public function size()
        {
            return $this->count;
        }

        public function isEmpty()
        {
            return $this->count == 0;
        }
    }

    // $q = new Queue();
    // $q->enqueue(7);
    // $q->enqueue(5);
    // $q->enqueue(5);
    // $q->enqueue(5);
    // $q->enqueue(5);
    // $q->show();
?>