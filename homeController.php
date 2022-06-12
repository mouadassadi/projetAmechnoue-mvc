<?php


    class homeController{
        public function index($page){
            include('Views/'.$page.'.php');
        }
    }