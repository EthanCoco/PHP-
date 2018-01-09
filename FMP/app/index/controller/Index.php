<?php
namespace app\index\controller;
use think\Db;
use app\index\model\Index as Home;
use app\index\model\Merror;
class Index extends Base
{
    public function index()
    {
    	//调用model
//  	$data = Home::testInfo();
		//控制器直接输出
    	Merror::getInstance()->jsonReturn(['code'=>3001,'msg'=>'中文']);
    }
}
