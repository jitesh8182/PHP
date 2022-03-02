<?php 
namespace App\Models;
use CodeIgniter\Model;
class ExamModel extends Model{
    public function valid_data($val){
        $db = \Config\Database::connect('default');
        $builder = $db->table('login_table');
        $builder->select('*');
        $builder->where('usr_name',$val);
        $qry = $builder->get();
        if(count($qry->getResultArray())==1){
            return $qry->getRowArray();
        }else{
            return false;
        }
    }
    public function insertData($table_name,$categ){        
        $db = \Config\Database::connect('default');
        $builder = $db->table($table_name);
        $builder->ignore(true)->insert($categ);
        echo 'insert';
        return;
    }
    public function getdata(){
        $query = $this->db->query("select *from loan_master order by id desc limit 1");
        $result = $query->getRowArray();
        return $result;
    }
    public function getmindata(){
        $query = $this->db->query("select distance,default1 from loan_master order by distance asc limit 3");
        $result = $query->getResult();
        return $result;
    }
}