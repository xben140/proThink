<?php

	namespace app\admin\controller;

	class Image extends PermissionAuth
	{
		public function _initialize()
		{
			parent::_initialize();
		}

		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$res = uploadImg('image' , function($result) {
					$returnData = [];
					$result['url'] = URL_PICTURE . DS . $result['savename'];

					$isAlreadyUploaded = $this->logic->fileExistsByHash($result['hash']);

					if(!$isAlreadyUploaded)
					{
						$t = $this->logic->add([
							'group_id' => 1 ,
							'ext'      => $result['extension'] ,
							'path'     => $result['savename'] ,
							'hash'     => $result['hash'] ,
							'status'   => 1 ,
						]);

						if($t)
						{
							$result['sign'] = 1;
							$result['msg'] = '添加成功';
						}
						else
						{
							$result['sign'] = 0;
							$result['msg'] = '添加失败，稍后重试';
						}
					}
					else
					{
						//文件上传过
						$result['sign'] = 2;
						$result['msg'] = '文件已经上传过，已被忽略';
					}

					return $result;
				} , [
					200 ,
					200 ,
					1 ,
				]);

				return json($res);
			}
			else
			{
				return $this->makeView($this);
			}
		}
	}