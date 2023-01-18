<?php 
    class Admin extends BaseController {
        public function index() {
            return $this -> view('admin.index');
        }
    }