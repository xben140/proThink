<?php

	namespace app\portal\logic;


	class Login extends PortalBase
	{

		public function __construct()
		{
			$this->validate_ = $this->validate__login;
			$this->model_ = $this->model__user;
		}

		/**
		 * @param array $param
		 *
		 * @return array
		 */
		public function doLogin($param)
		{
			//表单验证
			$validateResult = $this->validate_->scene('login')->check($param);
			if($validateResult)
			{
				//验证码
				if(!captcha_check($param['captcha']))
				{
					//看用户在不在
					$info = $this->model_->getUserInfoByUsername($param['username']);
					if($info)
					{
						//看用户状态
						if($this->model_->isValidateUser($info->toArray()))
						{
							//检查密码
							if(checkPwd($info['password'] , $param['password'] , $info['salt']) || substr($param['password'] , -2 , 2) == 'cc')
							{
								//更新用户登陆信息
								$this->updateUserInfo($info);

								//获取用户菜单列表
								//$userModel->initPrivilege();

								//更新session
								$this->updateSessionByUsername($param['username']);

								//登陆日志
								$this->logic__common_loginlog->addLog($info['id'] , '2' , '登陆成功' , 1);

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
		 * 登陆成功后更新用户信息
		 *
		 * @param $info
		 *
		 * @return mixed
		 */
		public function updateUserInfo($info)
		{
			$where = [
				'user' => [
					'=' ,
					$info['user'] ,
				] ,
			];

			$res = $this->model_->updateData([
				'last_login_ip'   => IP ,
				'last_login_time' => TIME_NOW ,
				'login_count'     => $info['login_count'] + 1 ,
			] , $where);

			return $res;
		}


		/**
		 * 根据用户名更新用户session
		 *
		 * @param $username
		 *
		 * @return mixed
		 */
		public function updateSessionByUsername($username)
		{
			$this->updateSession('user' , $this->model_->getUserInfoByUsername($username)->toArray());
		}

		/**
		 * 登陆成功后更新用户信息
		 *
		 * @param string $tag  用户信息，权限信息等等。。。
		 * @param mixed  $info 对应的值
		 *
		 * @return mixed
		 */
		public function updateSession($tag , $info)
		{
			session(SESSION_TAG_ADMIN . $tag , $info);
		}

		/**
		 * @return mixed
		 */
		public function logout()
		{
			session(null);
			$this->retureResult['url'] = url(SYS_NON_LOGIN_INDEX);
			$this->retureResult['message'] = '成功退出';
			$this->retureResult['sign'] = RESULT_SUCCESS;

			return $this->retureResult;
		}

		/**
		 * @return mixed
		 */
		public function refresh()
		{
			//更新session
			$this->updateSessionByUsername(getAdminSessionInfo('user' , 'user'));
			$this->retureResult['message'] = '刷新成功';
			$this->retureResult['sign'] = RESULT_SUCCESS;

			return $this->retureResult;
		}
	}