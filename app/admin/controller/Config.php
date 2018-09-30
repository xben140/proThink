<?php

	namespace app\admin\controller;


	class Config extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->jump($this->logic->add($this->param_post));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function edit()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session(URL_MODULE);
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				return $this->makeView($this);
			}
		}


		/**
		 * @return mixed
		 * @throws \Exception
		 */
		public function setField()
		{
			$this->initLogic();

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


















