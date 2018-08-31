<?
class dir_view{
    private $list_dirs;
    private $path;
    static $_instanse;

    static function get_instance($path = FALSE){
        if(self::$_instanse instanceof self){
            return self::$_instanse;
        }
        return self::$_instanse = new self($path);
    }
    private function __construct($path){
        if($path){
            /*if ($path == '.' or $path == '..'or $path == './'or$path == '../'or$path == '..//'){
                include_once $_SERVER['DOCUMENT_ROOT'].'/alert.html';

            }*/

            $str= preg_match('/^\./', $path);
                        if ($str===1) {
                include_once $_SERVER['DOCUMENT_ROOT'].'/alert.html';
                die();
            }


            $this->path=$path.'/';//data
            $path='/'.$path;
        }
        $this->list_dirs = new DirectoryIterator($_SERVER['DOCUMENT_ROOT'].$path);
        return $this->list_dirs;
    }
    public function dirs_to_array(){
        $arr = array();
        $i=0;
        foreach($this->list_dirs as $res){
            if(!$res->isDot()){

                $file_name = $res->getFilename();
                if($res->isDir()){
                    $arr['dirs'][$i][$file_name] = $this->path.$file_name;
                }else{
                    $arr['files'][$i][$file_name]=$res->getSize();
                }
                $i++;
            }

        }
        $arr['old_path'] = substr($this->path,0,strrpos($this->path, '/', -1));
        return $arr;
    }
}