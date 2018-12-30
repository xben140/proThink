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



	namespace app\admin\controller;


	class Config extends BackendBase
	{
		public function _initialize()
		{
			parent::_initialize();
			$this->initLogic();
		}


		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function setField()
		{
			

			return $this->jump($this->logic->updateField($this->param , [
				[
					function(&$globalVariable) {
						//如果是更新值
						if($globalVariable['field'] == 'value')
						{
							$info = $this->logic->getInfo(['id' => $this->param['ids'] ,]);
							$res = true;
							//为4的时候是更新option类型
							switch ($info['type'])
							{
								case '4' :
									$t = $this->logic::makeOptionsVal($info);
									array_walk($t['options'] , function(&$v , $k) use ($globalVariable) {
										($k == $globalVariable['val']) && ($v .= '!!--!!');
									});
									$globalVariable['val'] = implode("\r\n" , $t['options']);

									break;
								default :
									break;
							}

							return $res;
						}
					} ,
					[] ,
					'' ,
				] ,
			]));
		}

	}


















