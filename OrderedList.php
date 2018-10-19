<?php
    require("utility.php");
    class OrderedList
    {
        public $head = null;
        public $tail = null;
        public $count = 0;
        
        public function add($data)
        {
            $n = new Node($data);
            if ($this->head == null) {
                $this->head = $n;
                $this->tail = $this->head;
                $this->count++;
                return;
            }

            if ($this->head->data > $data) {
                $n->next = $this->head;
                $this->head = $n;
                $this->$count++;
                return;
            }
            if($data > $this->tail){
                $this->tail->next = $n;
                $this->tail = $n;
                $this->count++;
                return;
            }
            $temp = $this->head->next;
            $temp2 = $this->head;
            while ($data < $temp->data) {
                $temp = $temp->next;
                $temp2 = $temp2->next;
            }
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
    }
    
    $os = new OrderedList();
    $os->add(1);
    $os->add(5);
    $os->add(4);
    $os->add(3);
    $os->show();

?>