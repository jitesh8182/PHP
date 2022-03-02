<?php 
namespace App\Controllers;
use App\Models\PracticeModel;

class PracticeController extends BaseController{
    public $obj;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->obj = new PracticeModel();
        $this->session = session();
    }
    public function cartdata(){
        $session = session();
        if($session->has('User')){
            if(isset($_POST['save'])){
                foreach($_POST['indexes'] as $i){
                    $_SESSION['qty_array'][$i]=$_POST['qty_'.$i];
                }
                $_SESSION['message'] = 'Cart updated successfully';
                $this->viewdata(0);
            }else if(isset($_GET['data'])) {
                unset($_SESSION['cart']);
                $_SESSION['message'] = 'Cart cleared successfully';
                echo view('items_cart/viewcart');
            }else{
                $this->viewdata(0);
            }
        }else{
            return redirect()->to(site_url().'/practicecontroller/');
        }
    }
    public function redictUsr(){
        $session = session();
        if($this->request->getVar('loginout')){
             $session->remove('User');
             session_destroy();
        }
        if($this->request->getVar('addcart')){
            if(!in_array($_POST['id'],$_SESSION['cart'])){
                array_push($_SESSION['cart'],$_POST['id']);
                $_SESSION['message']="Product added to cart";
                $this->viewdata(1);
            }else{
                $_SESSION['message']="Product already in cart";
            }
            $this->add_cart_data();
        }else{
            if($session->has('User')){
                if(isset($_GET['delid']) && isset($_GET['index'])){
                    $key = array_search($_GET['delid'], $_SESSION['cart']);
	                unset($_SESSION['cart'][(int)$key]);
	                unset($_SESSION['qty_array'][$_GET['index']]);
	                $_SESSION['qty_array'] = array_values($_SESSION['qty_array']);
	                $_SESSION['message'] = "Product deleted from cart";
                    $this->viewdata(0);
                    return redirect()->to(site_url().'/practicecontroller/cartdata');
                }else{
                    $this->add_cart_data();
                }
            }else{
                return redirect()->to(site_url().'/practicecontroller/');
            }
        }
    }
    public function add_cart_data(){
        $data['products']=$this->obj->getDataField('item_table','itm_id,itm_name,itm_price,itm_img');
        echo view('items_cart/usrpage',$data);
    }
    public function viewdata($n){
        $arr['rslt']=array();
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        for($i=0;$i<count($_SESSION['cart']);$i++){
            $data['catdata']=$this->obj->getdataby_id('item_table',$_SESSION['cart'][$i]);
            array_push($arr['rslt'],$data['catdata']);
        }
        if($n==0){
            echo view('items_cart/viewcart',$arr);
        }
    }
    public function redictAdmin(){
        $session = session();
        if($this->request->getVar('logout')){
            $session->remove('admin');
        }
        if($this->request->getVar('add')){
            $cat=$this->request->getVar('category');
            $data = [
                'name'=>$cat
            ];
            $this->obj->insertData('cate_table',$data);
        }
        if($this->request->getVar('addi')){
            $name = $this->request->getVar('name');
            $price = $this->request->getVar('price');
            $qty = $this->request->getVar('qty');
            $cat = $this->request->getVar('categr');
            $file = $this->request->getFile('image');
            $newfilename = $file->getRandomName();
            if($file->move(FCPATH.'upload/',$newfilename)){
                $path = 'upload/'.$newfilename;
                $data = [
                    'itm_name'=>$name,
                    'itm_price'=>$price,
                    'itm_qty'=>$qty,
                    'cat_id'=>$cat,
                    'itm_img'=>$path
                ];
                $this->obj->insertData('item_table',$data);
            }
        }
        if($this->request->getVar('updatebtn')){
            $id = $this->request->getVar('id');
            $name = $this->request->getVar('name');
            $price = $this->request->getVar('price');
            $qty = $this->request->getVar('qty');
            $cat = $this->request->getVar('categr');
            if ($_FILES['image']['size'] > 0){
                $str = str_replace('\\', '/', getcwd()); 
                unlink($str .'/'.$this->request->getVar('myimg'));
            }
            $file = $this->request->getFile('image');
            $newfilename = $file->getRandomName();
            if($file->move(FCPATH.'upload/',$newfilename)){
                $path = 'upload/'.$newfilename;
                $data = [
                    'itm_name'=>$name,
                    'itm_price'=>$price,
                    'itm_qty'=>$qty,
                    'cart_id'=>NULL,
                    'cat_id'=>$cat,
                    'itm_img'=>$path
                ]; 
                $data = "itm_name='".$name."',itm_price='".$price."',itm_qty='".$qty."',cat_id='".$cat."',itm_img='".$path."'";
                $this->obj->updateData($data,'item_table',$id);
            }
        }
        if($session->has('admin') || $this->request->getVar('search')){
            $data['category']=$this->obj->getCategory('cate_table');
            $tables = array("item_table","cate_table");
            $data['display']=$this->obj->getCategoryWhere($tables);
            $value = $this->request->getVar('cate');
            $data['search_data']=$this->obj->getIdData('cate_table',$value);
            echo view('items_cart/adminpage',$data);
        }else{
            return redirect()->to(site_url().'/practicecontroller/');
        }
    }
    public function openupdform(){
        if (isset($_GET['update_id'])) {
            $upid = base64_decode($_GET['update_id']);
            $data['itemdata']=$this->obj->getdataby_id('item_table','itm_id='.$upid.'');
            echo view('items_cart/adminpage',$data);
        }else{
            echo 'id not found';
        }
    }
    public function index(){
        if($this->request->getMethod()=="post"){
            $uname=$this->request->getVar('username');
            $pass=$this->request->getVar('password');
            $usrdata=$this->obj->valid_data($uname);
            if ($usrdata) {
                if (strcmp($pass,$usrdata['usr_pass'])==0 && $usrdata['usr_type']=="user") {
                    $this->session->set('User',$usrdata['usr_name'],time()+365);
                    return redirect()->to(site_url().'/practicecontroller/redictUsr');
                }elseif(strcmp($pass,$usrdata['usr_pass'])==0 && $usrdata['usr_type']=="admin") {
                    $this->session->set('admin',$usrdata['usr_name'],time()+365);
                    return redirect()->to(site_url().'/practicecontroller/redictAdmin');
                }else{
                    echo 'userid or password do not match';
                    return redirect()->to(current_url());
                }
            }else{
                echo 'email not exist..!';
                return redirect()->to(current_url());
            }
        }
        echo view('items_cart/login_page');    
    }
    public function get_login_data(){
        $model = new PracticeModel();
        $name = $this->request->getVar('name');
        echo $name;
    }
}
?>