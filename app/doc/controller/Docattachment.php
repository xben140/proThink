<?php

	namespace app\doc\controller;

	class Docattachment extends BackendBase
	{

		public function add()
		{
			$this->initLogic();
			if(IS_POST)
			{
				//上传接口
				if(isset($_FILES['file']))
				{
					$res = uploadFile('file' , function($result) {
						//附件信息
						session(md5(URL_MODULE . 'attachment') , json_encode($result));

						return $result;
					});

					return json($res);
				}
				else
				{
					//保存

					$id = session(md5(URL_MODULE . 'id'));
					//附件信息
					$attachment = json_decode(session(md5(URL_MODULE . 'attachment')) , 1);

					$t = $this->logic->add([
						'doc_id'    => $id ,
						'path'      => $attachment ? $attachment['savename'] : '' ,
						'file_name' => $attachment ? $attachment['name'] : '' ,
						'remark'    => $this->param['remark'] ,
						'status'    => 1 ,
					]);

					return $this->jump($t);
				}
			}
			else
			{
				return $this->makeView($this);
			}
		}

		public function downloadAttachment()
		{
			$this->initLogic();
			$docInfo = $this->logic->getInfo($this->param);
			downloadFile(makeFilePath($docInfo['path']) , $docInfo['file_name']);
		}


		/**
		 * @throws \Exception
		 */
		public function delete()
		{
			$this->initLogic();

			return $this->jump($this->logic->delete($this->param , [

				/*
								[
									////////////////////////////////
									/// 放置回收站
									////////////////////////////////

									function(&$param) {
										//删除对应附件
										$data = $this->logic->getAttachmentsByIds($param);
										foreach ($data as $k => $v) delFile($v['path']);

										return true;
									} ,
									[] ,
								] ,
				*/
				[
					////////////////////////////////
					/// 放置回收站
					////////////////////////////////

					function(&$param) {
						$res = true;
						//删除对应附件
						$data = $this->logic->getAttachmentsByIds($param);
						foreach ($data as $k => $v)
						{
							$docInfo = $this->logic__doc->getInfo(['id' => $v['doc_id']]);
							if(in_array($docInfo['doc_status'] , [10]))
							{
								$res = false;
								break;
							}
							else
							{
								delFile($v['path']);
							}
						}

						return $res;
					} ,
					[] ,
					'稿件已经为完成状态，附件不允许删除',
				] ,

			]));
		}


	}