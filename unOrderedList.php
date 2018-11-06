<?php
    require_once("Node.php");
    /**
     * 
     * Purpose: unOrderedList.php is to perform task on linked list it have two class 
     * one Node which hold data and address 
     * and other class which perform actions
     *
     *  @author  Akshansh Verma
     *  @version 1.0
     *  @since   19-10-2018
     */

    

    /**
     * UnOrderedList is to perform action on linked list 
     * like search add remove show
     */
    class UnOrderedList
    {
        //to hold 1st value of linked list
        public $head = null;
        //to hold last value of linked list
        public $tail = null;
        //to count no of node in linked list
        public $count = 0;

        /**
         * function add is to add data in the linked list
         * 
         * @param data $data hold the data which we want to add in the linked list
         */
        public function add($data)
        {
            //n is object of Node class
            $n = new Node($data);
            // if condition to enter 1st value in the linked list 
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
         * function show will display all the data in the linked list 
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
         * function remove will remove the data from linked list 
         * @param data $data hold the data which we want to remove from linked list
         */
        public function remove($data)
        {
            //check the linked list have data of not 
            if ($this->head == null) {
                echo "no data";
                return;
            }
            //if data is equal to head data then is will make next data as head
            if ($this->head->data == $data) {
                $this->head = $this->head->next;
                $this->count--;
                return;
            }

            //temp to hold head data 
            $temp = $this->head;
            $i;
            //for loop to store next node of data node
            for ($i=1; $i <= $this->count ; $i++) { 
                //if temp data is equal to data then it will break tha loop
                if ($temp->data == $data) {
                    //and if data is in the last index the it will not increment the temp value 
                    if ($i == $this->count) {
                        break;
                    }
                    $temp = $temp->next;
                    break;
                }
                $temp = $temp->next;
            }

            //temp2 to hold privious node
            $temp2 = $this->head;
            //for loop to store privious node in temp
            for ($j=1; $j < $i-1; $j++) { 
                $temp2 = $temp2->next;
            }

            //if the data is in last index thin it will remove and 
            //privious node of last index will change to tail
            if ($this->count == $i) {
                $temp2->next = null;
                $this->tail = $temp2;
                $this->count--;
                return;
            }
            //point privious to the next node of tha node
            $temp2->next = $temp;
            $this->count--;
            return;
        }

        /**
         * function search is to find data is in linked list of not
         * @return boolean 
         */
        public function search($data)
        {
            //temp to hold head node
            $temp = $this->head;
            //for loop to check data one by one 
            for ($i=0; $i < $this->count; $i++) { 
                //if temp data is equal to data in it will return true
                if ($temp->data == $data) {
                    return true;
                }
                $temp = $temp->next;
            }
            return false;
        }

        public function getStr()
        {
            $temp = $this->head;
            $str = "";
            for ($i=0; $i < $this->count ; $i++) { 
                $str = $str.$temp->data." ";
                $temp = $temp->next;
            }
            
            $str = substr($str,0,-1);
            return $str;
        }
    }
    // $ls = new UnOrderedList();
    // $ls->add("a");
    // $ls->add("a");
    // $ls->add("a");
    // $ls->add("a");
    // echo $ls->getStr();
?>