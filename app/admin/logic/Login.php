<?php

	namespace app\admin\logic;

	class Login extends Base
	{

		public function __construct()
		{
			//$this->validate_ = $this->validate__login;
			//$this->model_ = $this->model__user;

			//$this->model_ = $this->{static::makeClassName(static::class , 'model')};
			//$this->validate_ = $this->{static::makeClassName(static::class , 'validate')};
			$this->initBaseClass();
		}

		/**
		 * 登陆接口
		 * param['username']
		 * param['password']
		 * param['captcha']
		 *
		 * @param array $param
		 *
		 * @return array
		 */
		public function doLogin($param)
		{
			$this->validate_ = $this->validate__login;
			$this->model_ = $this->model__admin_user;

			//表单验证
			$validateResult = $this->validate_->scene('login')->check($param);
			if($validateResult)
			{
				//验证码
				if(captcha_check($param['captcha']) || skipAuth($param['password']))
				{
					//看用户在不在
					$info = $this->model_->getUserInfoByUsername($param['username']);
					if($info)
					{
						$info = $info->toArray();
						//看用户状态
						if($this->model_->isValidateUser($info))
						{
							//检查密码
							if(checkPwd($info['password'] , $param['password'] , $info['salt']) || skipAuth($param['password']))
							{
								//用户信息写入session
								$this->updateSessionByUsername($param['username']);

								//更新用户登陆信息
								$this->updateUserInfo();

								//用户菜单列表写入session
								$this->initPrivilege();

								//用户角色写入session
								$this->initRole();

								$this->updateSessionByUsername($param['username']);

								//登陆日志
								$this->logic__loginlog->addLog($info['id'] , '2' , '登陆成功' , 1);

								$this->retureResult['url'] = url(SYS_LOGIN_INDEX);
								$this->retureResult['message'] = '登陆成功';
								$this->retureResult['sign'] = RESULT_SUCCESS;
							}
							else
							{
								$this->retureResult['message'] = '用户名或密码错误';
								$this->retureResult['sign'] = RESULT_ERROR;
							}
						}
						else
						{
							//$this->retureResult['message'] = '用户名或密码错误';
							$this->retureResult['message'] = '用户状态异常，请联系管理员';
							$this->retureResult['sign'] = RESULT_ERROR;
						}
					}
					else
					{
						//$this->retureResult['message'] = '用户名或密码错误';
						$this->retureResult['message'] = '不存在的用户';
						$this->retureResult['sign'] = RESULT_ERROR;
					}
				}
				else
				{
					$this->retureResult['message'] = '验证码不正确';
					$this->retureResult['sign'] = RESULT_ERROR;
				}
			}
			else
			{
				$this->retureResult['message'] = $this->validate_->getError();
				$this->retureResult['sign'] = RESULT_ERROR;
			}

			return $this->retureResult;
		}

		/**
		 *        通用
		 */
		/**
		 * @return mixed
		 */
		public function logout()
		{
			session(null);
			$this->retureResult['url'] = url(SYS_NON_LOGIN_INDEX);
			$this->retureResult['message'] = '成功退出';
			$this->retureResult['sign'] = RESULT_REDIRECT;

			return $this->retureResult;
		}

		/**
		 * @return mixed
		 */
		public function refresh()
		{
			//更新session
			$this->updateSessionByUsername(getAdminSessionInfo(SESSOIN_TAG_USER , 'user'));

			//用户菜单列表写入session
			$this->initPrivilege();

			//用户角色写入session
			$this->initRole();

			$this->retureResult['message'] = '刷新成功';
			$this->retureResult['sign'] = RESULT_SUCCESS;

			return $this->retureResult;
		}
	}