<?php
namespace app\index\controller;
use think\Db;
use Mpdf\Mpdf;
// 
//  Tools.php
//  pdf打印
//  
//  Created by lijianlin on 2018-01-09.
//  Copyright 2018 lijianlin. All rights reserved.
// 

class Tools extends Base
{
    public function printBirt(){
		$data = [
			'name'=>'李建林',
			'gender'=>'男',
			'nation'=>'汉',
			'phone'=>'13658452142',
			'idcard'=>'362330199208122410',
		];
		
		$birtID = $this->request->post('birtID',1);
		$birtInfo = Db::name('birt')->field('birtName,birtFilePath,birtDorI,birtFormat')->where(['birtID'=>$birtID,'birtStatus'=>1])->find();	
		
		if(!empty($birtInfo)){
			$file_options = [
				'render_page' => $this->fetch(APP_PATH.request()->module().'/view/public/pdf/'.$birtInfo['birtFilePath'],['jsonData'=>$data]),
				'file_name' => $birtInfo['birtName'],
				'view_type' => $birtInfo['birtDorI'],
			];
			$param_opstions = [
				'format' => $birtInfo['birtFormat'],
			];
		}else{
			return jsonReturn(['code' => 3002,'msg'=>'报表不存在']);
		}
		
		$this->printPdf($file_options,$param_opstions);
    }
	
	
	private function printPdf($fileOptions = [],$options = []){
		$options_base = [
			'mode' => '',
			'format' => 'A4',
			'default_font_size' => 0,
			'default_font' => '',
			'margin_left' => 15,
			'margin_right' => 15,
			'margin_top' => 16,
			'margin_bottom' => 16,
			'margin_header' => 9,
			'margin_footer' => 9,
			'orientation' =>'P',
			'autoScriptToLang' => true,
        	'ignore_invalid_utf8' => true,
        	'tabSpaces' => 4,
        	'title' => '中文',
	        'autoLangToFont' => true,    
	        'autoScriptToLang' => true,  
	        'autoVietnamese' => true,    
	        'autoArabic' => true,   
       	];
		
		$file_options_base = [
			//渲染需要打印的页面
			'render_page' => '',
			//追加引用的css文件
			'css_file' => '../web/pdfcss/pdf.css',
			//追加额外css样式，非文件形式
			'css_line_extra' => '',
			//导出下载时文件名称
			'file_name' => time().'.pdf',
			//展示的效果【I=浏览器预览，D=浏览器下载】
			'view_type' => 'I',
		];
		
		$stylesheet = '';
		
		$options = array_merge($options_base,$options);
		
		$fileOptions  = array_merge($file_options_base,$fileOptions);
		
		$mpdf = new Mpdf($options);
	   	
		if(!empty($fileOptions['css_file'])){
			if(!file_exists($fileOptions['css_file'])){
				echo json_encode(['code'=>3001,'msg'=>$fileOptions['css_file'].'文件不存在']);
				exit;
			}
			$stylesheet .= file_get_contents($fileOptions['css_file']);
		}
		
		if(!empty($fileOptions['css_line_extra']))
			$stylesheet .= $fileOptions['css_line_extra'];
		
		if(!empty($stylesheet))
			$mpdf->WriteHTML($stylesheet, 1);
		
		$mpdf->WriteHTML($fileOptions['render_page'],2);
		$mpdf->Output($fileOptions['file_name'],$fileOptions['view_type']);
		exit;
	}
	
	
	
}
