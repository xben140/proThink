<?php

	namespace app\install\controller;

	/**
	 * ******************************************************************************************
	 * ******************************************************************************************
	 *                                安装框架
	 * ******************************************************************************************
	 * ******************************************************************************************
	 */
	class Index extends FrontendBase
	{
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * 安装页面
		 * @return mixed
		 */
		public function install()
		{
			return $this->fetch();
		}

		/**
		 * 环境检测
		 */
		public function evnCheck()
		{
			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			//return json($res);
			$this->success('' , null , $res);
		}

		/**
		 * 环境数据库连接
		 */
		public function dbCheck()
		{
			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			//return json($res);
			$this->success('' , null , $res);

		}

		/**
		 * 建表
		 * @return mixed
		 */
		public function createDb()
		{
			sleep(3);
			$res = [
				'sign' => 1 ,
				'msg'  => '操作成功' ,
			];
			//return json($res);
			$this->success('' , null , $res);
		}
	}