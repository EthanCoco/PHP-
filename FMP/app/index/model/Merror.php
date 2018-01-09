<?php
namespace app\index\model;
// 
//  Merror.php
//  模型输出错误信息或数据在控制器或者model类中
//  
//  Created by lijianlin on 2018-01-09.
//  Copyright 2018 lijianlin. All rights reserved.
// 

class Merror {
	private static $_instance ;
	/*禁止外部实例化*/
	private function __construct(){}
	
	/*防止克隆*/
	private function __clone(){}
	
	/*提供外部静态调用方法*/
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	
	/*信息输出*/
	public function jsonReturn($data = []){
		die(json_encode($data));
	}
}
