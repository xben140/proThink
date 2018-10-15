<?php

	namespace app\doc\controller;

	class Address extends BackendBase
	{
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$this->param_post['user_id'] = getAdminSessionInfo('user' , 'id');
				$this->jump($this->logic->add($this->param_post));
			}
			else
			{
				return $this->makeView($this);
			}
		}

	}