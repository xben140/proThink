<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/



	namespace app\____ID__\controller;

	/**
	 * 后台控制器模板
	 */
	class ____CONTEOLLER_NAME__ extends BackendBase
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * 添加数据
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->jump($this->logic->add($this->param_post , [
					//添加数据方法前置处理回调
					/*
						[
							//$param 为 $this->param_post 传入的值，也是将会写入库的值，这里可以在写入之前处理，返回false将会输出
							function(&$param) {

							} ,
							//参数
							[] ,
							//错误信息
							'错误信息' ,
						] ,
					*/
				] , [
					//添加数据方法后置处理回调
					/*
						[
							//
							function(&$param) {

							} ,
							//参数
							[] ,
							//错误信息
							'错误信息' ,
						] ,
					*/

				]));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * 修改表数据方法
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function edit()
		{
			$this->initLogic();

			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$this->jump($this->logic->edit($this->param , $id , [
					//添加数据方法前置处理回调
					/*
						[
							//$param 为 $this->param 传入的值，也是将会更新入库的值，这里可以在写入之前处理，返回false将会输出
							function(&$param) {

							} ,
							//参数
							[] ,
							//错误信息
							'错误信息' ,
						] ,
					*/
				] , [
					//编辑数据方法后置处理回调
					/*
						[
							//
							function(&$param) {

							} ,
							//参数
							[] ,
							//错误信息
							'错误信息' ,
						] ,
					*/

				]));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * 更新字段方法
		 * ids:1,2,3        要更新的id条件
		 * val:1            要更新的值
		 * field:gender        要更新的字段
		 * 即把当前控制器对应表字段gender中，id为1,2,3的记录值更新为1
		 * @return mixed
		 */
		public function setField()
		{
			$this->initLogic();
			return $this->jump($this->logic->updateField($this->param , [
				//更新字段方法前置处理回调
				/*
					[
						//$param 为 $this->param 传入的值，也是将会更新入库的值，这里可以在写入之前处理，返回false将会输出
						function(&$param) {

						} ,
						//参数
						[] ,
						//错误信息
						'错误信息' ,
					] ,
				*/

			] , [
				//更新字段方法后置处理回调
				/*
					[
						//
						function(&$param) {

						} ,
						//参数
						[] ,
						//错误信息
						'错误信息' ,
					] ,
				*/

			]));
		}


		/**
		 * 表的列表显示方法
		 * 这个方法可以删除，会自动调用 common\ControllerBase中的 dataList 方法
		 * @return mixed
		 * @throws \ReflectionException
		 */
		public function dataList()
		{
			$this->initLogic();
			return $this->makeView($this);
		}


		/**
		 * 根据id删除数据方法
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();
			return $this->jump($this->logic->delete($this->param , [
				//添加数据方法前置处理回调
				/*
					[
						//$param 为 $this->param 传入的值，也是将会更新入库的值，这里可以在写入之前处理，返回false将会输出
						function(&$param) {

						} ,
						//参数
						[] ,
						//错误信息
						'错误信息' ,
					] ,
				*/
			] , [
				//编辑数据方法后置处理回调
				/*
					[
						//
						function(&$param) {

						} ,
						//参数
						[] ,
						//错误信息
						'错误信息' ,
					] ,
				*/

			] , false));
		}

	}


















