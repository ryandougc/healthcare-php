<?php 

class DoctorController{

    private $model;
    
        public function __construct($model) {
            $this->model = $model;
        }
}