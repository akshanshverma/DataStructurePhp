<?php
    /**
     * Node class is a Node type class which hold data and the address of next value
     */
    class Node
    {
        //data on node
        public $data;
        //hold address of next node or null 
        public $next = null;

        public function Node($data)
        {
            $this->data = $data;
        }
    }
    ?>