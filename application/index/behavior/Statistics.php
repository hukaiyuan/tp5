<?php
/**
 * 访问统计行为类
 * 访问记录，计数
 */
namespace app\index\behavior;

class Statistics {
	function run (&$params){
		$ip=request()->ip();
		//过滤微信服务器的访问计数
		if ($ip=='123.151.43.110') {
			return true;
		}
		//访问记录
		$viewinfo = new \app\index\model\ViewInfo();
		$res=$viewinfo->view();
		//访问计数
		$count = new \app\index\model\Count();
		$res=$count->view($params['page']);
		
		return $res;
	}
}