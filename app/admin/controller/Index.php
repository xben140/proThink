<?php

	namespace app\admin\controller;

	class Index extends PermissionAuth
	{

		public function index()
		{
			//exception('kljsdfjsdlfj');
			//print_r(config('default_timezone'));exit;;
			return $this->makeView($this);
		}


		/**
		 * 单图片更新统一方法
		 * @throws \LogicException
		 * @throws \RuntimeException
		 * @throws \think\image\Exception
		 */

		//?condition=user/profile_pic/3
		public function updateImage()
		{
			//$this->initLogic();
			if(isset($_FILES['image']))
			{
				$param = session(SESSION_TAG_ADMIN . 'updateImage_condition');
				$this->logic = $this->{$param['logic']};

				$res = uploadImg('image' , function($result) use ($param) {
					$result['url'] = URL_PICTURE . DS . $result['savename'];

					$info = $this->logic->getInfo(['id' => $param['id']]);

					$this->logic->updateField([
						'ids'   => $param['id'] ,
						'val'   => $result['savename'] ,
						'field' => $param['field'] ,
					]);

					//$imageUrl = generateProfilePicPath($info[$param['field']] , 0);

					//删除原图
					delImg($info[$param['field']]);
					$this->logic->updateSessionByUsername(getAdminSessionInfo(SESSOIN_TAG_USER , 'user'));

					return $result;
				} , [
					200 ,
					200 ,
					1 ,
				]);

				if($res['is_finished'])
				{
					return $this->result($res , 1 , '更新成功' , 'json');
				}
				else
				{
					return $this->error();
				}
			}
			else
			{
				return $this->makeView($this);
			}
		}

		public function main()
		{
			return $this->makeView($this);
		}
	}
