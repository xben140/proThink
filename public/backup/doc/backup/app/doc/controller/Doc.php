<?php

	namespace app\doc\controller;

	class Doc extends BackendBase
	{
		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$res = uploadFile('file' , function($result) {
					$returnData = [];
					$isAlreadyUploaded = $this->logic->fileExistsByHash($result['hash']);

					if(!$isAlreadyUploaded)
					{
						//1p巩淑芳--基建档案在高校建设中的作用及管理策略分析  .docx
						$result['name'] = strtr($result['name'] , [
							'P' => 'p' ,
							'Ｐ' => 'p' ,
							' ' => '' ,
							'　' => '' ,
						]);
						preg_match_all('/^(\d+(?:\.\d+)?)p[\s-]*([^-\s]+)(?:(?=\s*-)[\s-]+)([^.\s]+)\.(?:docx?|wps)$/im' , $result['name'] , $metaInfo);

						$title = $metaInfo[3][0];
						$author = $metaInfo[2][0];
						$page = $metaInfo[1][0];
						$t = $this->logic->add([
							'title'     => $title ,
							'uid'       => getAdminSessionInfo(SESSOIN_TAG_USER , 'id') ,
							'file_name' => $page . 'P--' . $author . '--' . $title . '.' . $result['extension'] ,
							'author'    => $author ,
							'path'      => $result['savename'] ,
							'ext'       => $result['extension'] ,
							'hash'      => $result['hash'] ,
							'page'      => $page ,
							'status'    => 1 ,
						]);

						$returnData = $t ? [
							'sign' => '1' ,
							'msg'  => '添加成功' ,
						] : [
							'sign' => '0' ,
							'msg'  => '添加失败，稍后重试' ,
						];
					}
					else
					{
						//文件上传过
						$returnData = [
							'sign' => '2' ,
							'msg'  => '文件已经上传过，已被忽略' ,
						];
					}
					$returnData['is_finished'] = $result['is_finished'];

					return $returnData;
				});

				return json($res);
			}
			else
			{
				return $this->makeView($this);
			}
		}

		public function setDocInfo()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$ids = session(md5(URL_MODULE));
				$this->param['ids'] = $ids;

				return $this->jump($this->logic->updateField($this->param , [
					[
						function($param) {
							$res = true;
							switch ($param['field'])
							{
								case 'deposit' :
								case 'final_payment' :
									$res = !!preg_match('/^\d+(\.\d{1,2})?$/im' , $param['val']);
									break;
								default :

									break;
							}

							return $res;
						} ,
						[$this->param] ,
						'请输入正确格式的价格' ,
					] ,
				]));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		public function edit()
		{
			$this->initLogic();
			if(IS_POST)
			{
				$id = session((URL_MODULE)) ? session((URL_MODULE)) : $this->param['ids'];
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				return $this->makeView($this);
			}
		}


		public function assignAddress()
		{
			$this->initLogic();
			$this->setPageTitle('设置地址');
			if(IS_POST)
			{
				$id = session(md5(URL_MODULE));
				unset($this->param['id']);
				$this->jump($this->logic->edit($this->param , $id));
			}
			else
			{
				return $this->makeView($this);
			}
		}

		public function setField()
		{
			$this->initLogic();

			return $this->jump($this->logic->updateField($this->param , [
				[
					function(&$globalVariable) {
						$res = true;
						if($globalVariable['field'] == 'is_confirm' && ($globalVariable['val'] == 1))
						{
							$docInfo = $this->logic->getInfo(['id' => $globalVariable['ids']])->toArray();
							foreach ($docInfo as $k => $v)
							{
								switch ($k)
								{
									case 'year':
									case 'month':
									case 'journal_name':
									case 'doc_type':
										if(!$v)
										{
											($res = !!$v);
											break 2;
										}
										dufault:;
								}
							}
						}

						return $res;
					} ,
					[] ,
					'稿件状态信息填写不完整，请填写完整' ,
				] ,
			]));
		}

		public function replaceDoc()
		{
			if(isset($_FILES['file']))
			{
				$this->initLogic();

				$res = uploadFile('file' , function($result) {
					$id = session(md5(URL_MODULE . 'id'));
					$docInfo = $this->logic->getInfo(['id' => $id]);

					$this->logic->updateField([
						'ids'   => $id ,
						'val'   => $result['savename'] ,
						'field' => 'path' ,
					]);

					//删除原稿件
					delFile($docInfo['path']);

					return $result;
				});

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


		public function downloadDoc()
		{
			$this->initLogic();
			$docInfo = $this->logic->getInfo($this->param);
			downloadFile(makeFilePath($docInfo['path']) , $docInfo['file_name']);
		}


		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [

				////////////////////////////////
				/// 放置回收站
				////////////////////////////////

				[
					function(&$param) {
						//删除稿件时 删除对应附件
						$ids = explode(',' , $param['ids']);

						foreach ($ids as $v)
						{
							//取出附件，吧所有附件删除
							$attachments = $this->logic__Docattachment->getAttachmentsByDocId(['id' => $v ,]);
							foreach ($attachments as $k1 => $v1)
							{
								$where = [
									'id' => [
										'=' ,
										$v1['id'] ,
									] ,
								];
								delFile($v1['path']);
								$this->logic__Docattachment->model_->del($where);
							}

							return true;
						}
					} ,
					[] ,
				] ,

				[
					function(&$param) {
						$ids = explode(',' , $param['ids']);
						foreach ($ids as $v)
						{
							//取出稿件，删除文件
							$info = $this->logic->getInfo(['id' => $v ,]);
							delFile($info['path']);

							return true;
						}
					} ,
					[] ,
				] ,

			]));
		}

		public function exportExecl()
		{
			$this->initLogic();
			$condition = $this->logic->getSessionInfo('exportExecl_condition');

			if(isset($condition['pagerow'])) unset($condition['pagerow']);

			$data = $this->logic->dataList($condition);
			$journalTypes = $this->logic__Journaltype->getFormatedData(1);

			$titles = [
				'文档名' ,
				'上传者' ,
				'上传时间' ,
				'安排年份' ,
				'安排月份' ,
				'定金' ,
				'尾款' ,
				'总额' ,
				'刊物类型' ,
				'刊物名' ,
				'稿件类型' ,
				'省' ,
				'市' ,
				'县' ,
				'详细地址' ,
				'联系人' ,
				'联系电话' ,
			];

			$list = array_map(function($v) use ($journalTypes) {
				return [
					$v['file_name'] ,
					$v['nickname'] ,
					formatTime($v['time']) ,
					$v['year'] ,
					$v['month'] ,
					$v['deposit'] ,
					$v['final_payment'] ,
					$v['total'] ,
					$journalTypes[$v['journal_type']]['field'] ,
					$v['journal_name'] ,
					$this->logic->model_::$docTypeMap[$v['doc_status']]['field'] ,
					$v['prov_name'] ,
					$v['city_name'] ,
					$v['county_name'] ,
					$v['address'] ,
					$v['contacts'] ,
					$v['tel'] ,

				];
			} , $data);

			array_unshift($list , $titles);

			$fileName = '稿件信息.xlsx';

			$func = function($v , &$data) {
				($data[] = $v);
			};

			exportExcel($list , $fileName , $func = null , 1);
		}
	}