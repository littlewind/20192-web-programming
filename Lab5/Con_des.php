<?php
    class BaseClass {
        protected $name = "BaseClass";

        function __construct() {
            print("In".$this->name." constructor<br>");
        }

        function __destruct() {
            print("Destroying".$this->name."<br>");
        }
    }

    class SubClass extends BaseClass {
        function _construct() {
            $this->name = "SubClass";
            parent::_construct();
        }

        function _destruct() {
            parent::_destruct();
        }
    }

    $obj1 = new SubClass();
    $obj2 = new BaseClass();
?>