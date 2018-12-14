<?php

	namespace app\common\logic;

	class Oplog extends LogicBase
	{
		public static $logPath = PATH_PUBLIC . 'oplog.log';

		public function __construct()
		{
			$this->initBaseClass();
		}

		/**
		 * 同步日志
		 */
		public function syncLog()
		{
			$logs = file_get_contents(static::$logPath);
			$val = preg_split('/[\r\n]/im' , $logs , -1 , PREG_SPLIT_NO_EMPTY);

			$data = array_map(function($v) {
				return json_decode($v , 1);
			} , $val);

			$this->model_->insertAll($data);
			file_put_contents(static::$logPath , '');
			$this->retureResult['message'] = '日志同步成功';

			return $this->retureResult;
		}


		/**
		 * 日志写入文件
		 * 写入规则，如果定义闭包，返回假时不写入
		 *
		 * @param callable|null $rule
		 */
		public static function pushLogToFile(callable $rule = null)
		{
			$log = static::makeOplog();
			is_callable($rule) && ($log = $rule($log));
			$log && file_put_contents(static::$logPath , json_encode($log) . "\r\n" , 8);
		}

		/**
		 *生成访问日志数据
		 */
		public static function makeOplog(): array
		{
			return [
				'uid'        => getAdminSessionInfo('user' , 'id') ,
				'module'     => MODULE_NAME ,
				'controller' => CONTROLLER_NAME ,
				'action'     => ACTION_NAME ,
				'url'        => request()->url() ,
				'referer'    => isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '' ,
				'method'     => request()->method() ,
				'ip'         => IP ,
				'time'       => TIME_NOW ,
				'is_ajax'    => (int)IS_AJAX ,
				'exe_time'   => number_format(microtime(true) - THINK_START_TIME , 10) ,
				'exe_memory' => memory_get_usage() - THINK_START_MEM ,
				'remark'     => db('privilege')->where([
					'module'     => MODULE_NAME ,
					'controller' => CONTROLLER_NAME ,
					'action'     => ACTION_NAME ,
				])->value('name') ,
				'params'     => json_encode([
					'data'   => input() ,
					'get'    => request()->get() ,
					'post'   => request()->post() ,
					'file'   => request()->file() ,
					'cookie' => request()->cookie() ,
					'server' => request()->server() ,
				]) ,
			];
		}

		public function getFormatedDateil($param)
		{
			$info = $this->getInfo($param);
			$t = json_decode($info['params'] , 1);
			$params = [];

			array_walk($t , function($v , $k) use (&$params) {
				if(is_array($v))
				{
					array_walk($v , function($v1 , $k1) use ($k , &$params) {
						$params[$k . '----' . $k1] = $v1;
					});
				}
			});
			$info['exe_memory'] = formatBytes($info['exe_memory']);
			unset($info['params']);

			return array_merge($info->toArray() , $params);

		}


		protected function makeCondition($param)
		{
			$where = [];
			$order = [];
			$join = [];
			$field = [];


			$reg_time_begin = 0;
			$reg_time_end = 99999999999999;

			$order_filed = $this->model_::makeSelfAliasField('id');
			$order_ = 'desc';

			foreach ($param as $k => $v)
			{
				switch ($k)
				{
					case 'user' :
						$v != '' && $where['b.user'] = [
							'=' ,
							$v ,
						];
						break;

					case 'method' :
						$v != '' && $where[$k] = [
							'=' ,
							$v ,
						];
						break;

					case 'order_filed' :
						$v != '' && $order_filed = $v;
						break;

					case 'order' :
						$v != '' && $order_ = $v;
						break;

					case 'nickname' :
						$v != '' && $where['b.nickname'] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'ip' :
					case 'module' :
					case 'controller' :
					case 'remark' :
					case 'params' :
					case 'action' :
						$v != '' && $where[$k] = [
							'like' ,
							"%" . $v . "%" ,
						];
						break;

					case 'reg_time_begin' :
						$v != '' && $reg_time_begin = strtotime($v);
						break;

					case 'reg_time_end' :
						$v != '' && $reg_time_end = strtotime($v);
						break;

					case 'is_ajax' :
						if($v != -1)
						{
							$where[$this->model_::makeSelfAliasField($k)] = [
								'=' ,
								$v ,
							];
						}
						break;

					default :
						#...
						break;
				}
			}

			$where[$this->model_::makeSelfAliasField('time')] = [
				'between' ,
				[
					$reg_time_begin ,
					$reg_time_end ,
				] ,
			];

			$order[$order_filed] = $order_;

			$join[] = [
				'ithink_user b' ,
				$this->model_::makeSelfAliasField('uid') . '  = b.id ' ,
				'left' ,
			];

			$field[] = $this->model_::makeSelfAliasField('*');
			$field[] = 'b.user,b.nickname';

			return $condition = [
				'where' => $where ,
				'order' => $order ,
				'join'  => $join ,
				'field' => implode(', ' , $field) ,
			];
		}

	}