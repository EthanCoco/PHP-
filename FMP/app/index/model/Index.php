<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Index extends Model{
	public static function testInfo(){
		//model中直接输出
		Merror::getInstance()->jsonReturn(['code'=>'dfdsfdsf','msg'=>'fdfdf']);
	}
}
