<?
class main extends amain{
     function get_body(){

         if($_GET['path']){
             $path = $_GET['path'];


             $obj = dir_view::get_instance($path);


         }else{
             $obj = dir_view::get_instance();

         }
         return $obj->dirs_to_array();


     }
    
}