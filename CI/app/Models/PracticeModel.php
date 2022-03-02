<?php 
namespace App\Models;
use CodeIgniter\Model;
class PracticeModel extends Model{
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
    public function updateData($data,$table_name,$id){        
        // $db = \Config\Database::connect('default');
        // $builder = $db->table($table_name);
        // $builder->db->where('itm_id', $id);
        // $builder->db->update($table_name, $data);
        $query = $this->db->query("update ".$table_name." SET ".$data." where itm_id=".$id."");
        return;
    }
    public function getCategory($table_name){
        $query = $this->db->query("select * from ".$table_name."");
        return $query->getResult();
    }
    public function getDataField($table_name,$fields){
        $query = $this->db->query("select ".$fields." from ".$table_name."");
        return $query->getResult();
    }
    public function getdataby_id($table_name,$id){
		$query=$this->db->query("select *from ".$table_name." where itm_id=".$id."");
		return $query->getResult();
    }
    public function getIdData($table_name,$id){
        $db = \Config\Database::connect('default');
        $builder = $db->table($table_name);
        $builder->select('name');
        $builder->where('cat_id',$id);
        $qry = $builder->get();
        if (count($qry->getResultArray())==1) {
            return $qry->getRowArray();
        }else{
            return false;
        }
    }
    public function getCategoryWhere($table_name){
        $query = $this->db->query("select * from ".$table_name[0]." as i," .$table_name[1]." as c where c.cat_id=i.cat_id");
        return $query->getResult();  
    }
}
?>