<?php
    /**
    * 
    * Purpose: OrderedList is to make sorted linked list and perform action on sorted linked 
    * list 
    * 
    *  @author  Akshansh Verma
    *  @version 1.0
    *  @since   22-10-2018
    */
    //require("utility.php");
    require_once("Node.php");
    class OrderedList
    {
        //to hold 1st value of OrderedList
        public $head = null;
        //to hold last value of OrderedList
        public $tail = null;
        //to count no of node in OrderedList
        public $count = 0;
        
        /**
         * function add is to add element in the ordered linked list 
         * 
         * @param  $data data which we want to add
         */
        public function add($data)
        {
            //object of node
            $n = new Node($data);
            //if no data in the list it will add in the front 
            if ($this->head == null) {
                $this->head = $n;
                $this->tail = $this->head;
                $this->count++;
                return;
            }
            //if data is lower the head then it will add in front of list and make it head
            if ($this->head->data > $data) {
                $n->next = $this->head;
                $this->head = $n;
                $this->count++;
                return;
            }
            //if data is greater then tail then it will add data in the end and make it tail
            if($data > $this->tail->data){
                $this->tail->next = $n;
                $this->tail = $n;
                $this->count++;
                return;
            }
            //temp is to hold next value 
            $temp = $this->head->next;
            //temp2 is to hold previous value
            $temp2 = $this->head;
            while ($data > $temp->data) {
                $temp = $temp->next;
                $temp2 = $temp2->next;
            }
            $temp2->next = $n;
            $n->next = $temp;
            $this->count++;
            return;
        }
        
        /**
         * function search is to find data in list 
         * 
         * @param $sdata element which we want to search
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

        /**
         * function pop is to pop data from the list and return the data 
         * 
         * @return $temp which hold the data 
         */
        public function pop()
        {
            //if no data present 
            if ($this->count == 0) {
                echo "no data\n";
                return;
            }
            //$temp hold tail data
            $temp = $this->tail->data;
            //if tail and null are same the all next will become null
            if ($this->head == $this->tail) {
                $temp = $this->tail->data;
                $this->head = null;
                $this->tail = null;
                $this->count--;
                return $temp;
            }
            //temp2 to hold head data 
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
         * function remove will remove the data from linked list 
         * @param data $data hold the data which we want to remove from linked list
         */
        public function remove($data)
        {
            
            if (!$this->search($data)) {
                echo "data not found\n";
                return;
            }
            
            //echo "cant run";
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
         * getStr to convert the value of list in the form of single string
         */
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

    // $os = new OrderedList();
    // $os->add(3);
    // $os->add(1);
    // $os->add(2);
    // $os->add(7);
    // $os->show();
    // echo "\n".$os->popD(7);
    // $os->show();
?>