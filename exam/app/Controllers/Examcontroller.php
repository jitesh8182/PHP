<?php 
namespace App\Controllers;
use App\Models\ExamModel;

use function PHPSTORM_META\type;

class ExamController extends BaseController{
    public $obj;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->obj = new ExamModel();
        $this->session = session();
    }
    public function redictUsr(){
        $session = session();
        if($this->request->getVar('loginout')){
            $session->remove('User');
            session_destroy();
            return redirect()->to(site_url().'/examcontroller/');
        }
        if($session->has('User')){
            if($this->request->getVar('submit')){
                $age=$this->request->getVar('age');
                $loan=$this->request->getVar('loan');   
                // $delt=$this->request->getVar('dft'); 
                $tabdata=$this->obj->getdata();    
                $tabdata['age'];
                $tabdata['loan'];
                $val = sqrt(pow((int)$age-(int)$tabdata['age'],2)+pow((int)$loan-(int)$tabdata['loan'],2));
                $tabd=$this->obj->getmindata();  
                $cnt=0;
                foreach($tabd as $res){
                    if($res->default1=="Y"){
                        $cnt+=1;
                    }
                }
                $def=($cnt==2)?'Y':'N';
                if($def=='Y'){
                    echo "not giving loan";
                }else{
                    echo "give loan";
                }
                $data = [
                    'age'=>$age,
                    'loan'=>$loan,
                    'default1'=>$def,
                    'distance'=>$val
                ];
                $this->obj->insertData('loan_master',$data);
                echo "<br>"."insert";
            }
            echo view('usr');
        }else{
            return redirect()->to(site_url().'/examcontroller/');
        }
    }
    public function index(){
        if($this->request->getMethod()=="post"){
            $uname=$this->request->getVar('username');
            $pass=$this->request->getVar('password');
            $usrdata=$this->obj->valid_data($uname);
            if ($usrdata) {
                if (strcmp($pass,$usrdata['usr_pass'])==0) {
                    $this->session->set('User',$usrdata['usr_name'],time()+365);
                    return redirect()->to(site_url().'/examcontroller/redictUsr');
                }else{
                    return redirect()->to(current_url());
                    echo 'userid or password do not match';
                }
            }else{
                echo 'email not exist..!';
                return redirect()->to(current_url());
            }
        }
        echo view('login_page'); 
    }
}