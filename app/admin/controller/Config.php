<?php

	namespace app\admin\controller;


	class Config extends PermissionAuth
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


















