<?php

/**
 *      短信充值控制器
 *      [X-Mis] (C)2007-2099  
 *      This is NOT a freeware, use is subject to license terms
 *      http://www.xinyou88.com
 *      tel:400-000-9981
 *      qq:16129825
 */

namespace Home\Controller;
use Think\Controller;

class SmsczController extends CommonController{

   public function _initialize() {
        parent::_initialize();
        $this->dbname = CONTROLLER_NAME;
    }
	
   function _filter(&$map) {
	   if(!in_array(session('uid'),C('ADMINISTRATOR'))){
		   
	   }
	   
	   

	}
	
   public function _befor_index(){ 
     
   }
  
  
  public function _befor_add(){
	  $attid=time();
	  $this->assign('attid',$attid);
    
  }
  
  public function _befor_insert($data){
     M("sms")->where('id='.I("cid"))->setInc('yue',I("shuliang"));
  }
	
   public function _after_add($id){
    
   }


  
  public function _befor_edit(){
     $model = D($this->dbname);
	 $info = $model->find(I('get.id'));
	 $attid=$info['attid'];
	 $this->assign('attid',$attid);
  }
   
  public function _befor_update($data){

  }
  
    public function _after_edit($id){
     
   }

   public function _befor_view($id){
	   
   }
   
   public function _befor_del($id){
	  $cid=M($this->dbname)->where('id='.$id)->getField('cid');
	  $shuliang=M($this->dbname)->where('id='.$id)->getField('shuliang');
	  M("sms")->where('id='.$cid)->setDec('yue',$shuliang); 
   }

   public function outxls() {
		$model = D($this->dbname);
		$map = $this->_search();
		if (method_exists($this, '_filter')) {
			$this->_filter($map);
		}
		$list = $model->where($map)->field('id,cid,title,jine,shuliang,beizhu')->select();
	    $headArr=array('ID','用户ID','客户名称','充值金额','充值条数','备注');
	    $filename='短信充值';
		$this->xlsout($filename,$headArr,$list);
	}
	
	public function fenxi(){
	 $this->display();
	}
	
	

}