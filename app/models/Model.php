<?php

namespace app\models;
use core\MysqliDb;

Model::autoload();

class Model{  

    public static $db;
    protected $dbTable;

    public static function autoload(){
        if(empty(self::$db)){
            self::$db = new MysqliDb (DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
        }
    }

    public function get($where='',$limit=null,$coloumns='*',$order_by="",$group_by=""){
        if(!empty($where)){
            Model::$db->where($where);
        }        
        if(!empty($order_by)){
            $orders = explode(",",$order_by);
            foreach($orders as $order){
                if(empty($order)) continue;
                $part = explode(" ",trim($order));
                if(!empty($part[0]) && !empty($part[1])){
                    Model::$db->orderBy($part[0],$part[1]);   
                }else{
                    Model::$db->orderBy($part[0],"asc");
                }
            }            
        }        
        if(!empty($group_by)){
             Model::$db->groupBy($group_by);
        }       
        return Model::$db->get($this->dbTable,$limit,$coloumns);
    }

    public function getOne($where='',$coloumns='*'){
        $rs =  $this->get($where,[0,1],$coloumns);
        return !empty($rs[0]) ? $rs[0] : [];
    }

    public function insert($data){
        return Model::$db->insert ($this->dbTable, $data);
    }

    public function update($data,$where){
        if(empty($where)){
            echo "no object found to update";
            return;
        }
        Model::$db->where($where);
        return Model::$db->update ($this->dbTable, $data);
    }

    public function delete($where){
        if(empty($where)){
            echo "no object found to delete";
            return;
        }
        Model::$db->where($where);
        return Model::$db->delete ($this->dbTable);
    }

    

}
