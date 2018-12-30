<?php

/*
+---------------------------------------------------------------------+
| iThinkphp     | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThinkphp            |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/


//视图分配规则配置文件
	return [
		'doc/doc/datalist' => [


			//排序
			'order' => [
				'VIEW_ASSIGE_TAG_ROLE' ,
				'VIEW_ASSIGE_TAG_IS_CONFIRM' ,
				'VIEW_ASSIGE_TAG_STATUS' ,
			] ,

			//缩写
			'abbr'  => [
				//属性状态
				'___STATUS_MAP_00'                          => [
					'is_display' => 0 ,
					'is_enable'  => 0 ,
				] ,
				'___STATUS_MAP_01'                          => [
					'is_display' => 0 ,
					'is_enable'  => 1 ,
				] ,
				'___STATUS_MAP_10'                          => [
					'is_display' => 1 ,
					'is_enable'  => 0 ,
				] ,
				'___STATUS_MAP_11'                          => [
					'is_display' => 1 ,
					'is_enable'  => 1 ,
				] ,


				//所有状态可见
				'___VIEW_ASSIGE_TAG_STATUS__all_enable'     => [
					'VIEW_ASSIGE_ELEMENTS_year'               => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_month'              => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_deposit'            => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_final_payment'      => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_journal_type'       => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_doc_type'           => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_journal_name'       => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_preview_attachment' => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_delete'             => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_doc_status'         => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_doc_set_stay'       => '___STATUS_MAP_00' ,
				] ,

				//采编上传稿件后没确认的状态 ， 除了稿件状态不能改，其他都可以改等状态
				'___VIEW_ASSIGE_TAG_STATUS__all__1'         => [
					'VIEW_ASSIGE_ELEMENTS_year'               => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_month'              => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_deposit'            => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_final_payment'      => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_journal_type'       => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_doc_type'           => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_journal_name'       => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_preview_attachment' => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_delete'             => '___STATUS_MAP_11' ,
					'VIEW_ASSIGE_ELEMENTS_doc_status'         => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_doc_set_stay'       => '___STATUS_MAP_00' ,
				] ,

				//采编上传稿件后确认了的状态 ， 所有不能改
				'___VIEW_ASSIGE_TAG_STATUS__all__2'         => [
					'VIEW_ASSIGE_ELEMENTS_year'               => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_month'              => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_deposit'            => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_final_payment'      => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_journal_type'       => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_doc_type'           => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_journal_name'       => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_preview_attachment' => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_delete'             => '___STATUS_MAP_00' ,
					'VIEW_ASSIGE_ELEMENTS_doc_status'         => '___STATUS_MAP_10' ,
					'VIEW_ASSIGE_ELEMENTS_doc_set_stay'       => '___STATUS_MAP_00' ,
				] ,


				//不论是否确认可见
				'___VIEW_ASSIGE_TAG_IS_CONFIRM__all_enable' => [
					0  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					1  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					2  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					3  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					4  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					5  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					6  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					7  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					8  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					9  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					10 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					11 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					12 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					13 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
				] ,

			] ,


			//具体规则
			'data'  => [

				//全站管理
				1 => [
					0 => '___VIEW_ASSIGE_TAG_IS_CONFIRM__all_enable' ,
					1 => '___VIEW_ASSIGE_TAG_IS_CONFIRM__all_enable' ,
				] ,

				//普通管理
				2 => [
					0 => '___VIEW_ASSIGE_TAG_IS_CONFIRM__all_enable' ,
					1 => '___VIEW_ASSIGE_TAG_IS_CONFIRM__all_enable' ,
				] ,

				//编辑
				3 => [
					//没确认时看稿件不会出来
					0 => '___VIEW_ASSIGE_TAG_IS_CONFIRM__all_enable' ,

					1 => [
						0  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						1  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						2  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						3  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						4  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						5  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						6  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						7  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						8  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						9  => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						10 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						11 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						12 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
						13 => '___VIEW_ASSIGE_TAG_STATUS__all_enable' ,
					] ,
				] ,

				//采编
				4 => [
					0 => [
						0  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						1  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						2  => [
							'VIEW_ASSIGE_ELEMENTS_year'               => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_month'              => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_deposit'            => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_final_payment'      => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_journal_type'       => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_doc_type'           => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_journal_name'       => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_preview_attachment' => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_delete'             => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_doc_status'         => '___STATUS_MAP_10' ,

							'VIEW_ASSIGE_ELEMENTS_doc_set_stay' => '___STATUS_MAP_11' ,
						] ,
						3  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						4  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						5  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						6  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						7  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						8  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						9  => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						10 => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						11 => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						12 => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
						13 => '___VIEW_ASSIGE_TAG_STATUS__all__1' ,
					] ,
					1 => [
						0  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						1  => [
							'VIEW_ASSIGE_ELEMENTS_year'               => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_month'              => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_deposit'            => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_final_payment'      => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_journal_type'       => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_doc_type'           => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_journal_name'       => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_preview_attachment' => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_delete'             => '___STATUS_MAP_00' ,
							'VIEW_ASSIGE_ELEMENTS_doc_status'         => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_doc_set_stay'       => '___STATUS_MAP_00' ,
						] ,
						2  => [
							'VIEW_ASSIGE_ELEMENTS_year'               => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_month'              => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_deposit'            => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_final_payment'      => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_journal_type'       => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_doc_type'           => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_journal_name'       => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_is_confirm'         => '___STATUS_MAP_11' ,
							'VIEW_ASSIGE_ELEMENTS_upload_attachment'  => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_preview_attachment' => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_delete'             => '___STATUS_MAP_00' ,
							'VIEW_ASSIGE_ELEMENTS_doc_status'         => '___STATUS_MAP_10' ,
							'VIEW_ASSIGE_ELEMENTS_doc_set_stay'       => '___STATUS_MAP_11' ,

						] ,
						3  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						4  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						5  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						6  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						7  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						8  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						9  => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						10 => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						11 => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						12 => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
						13 => '___VIEW_ASSIGE_TAG_STATUS__all__2' ,
					] ,
				] ,
			] ,
		] ,
	];;

	array(
		1 => array(
			0 => array(
				'id'   => 1 ,
				'name' => '全站管理员' ,
			) ,
			1 => array(
				'id'   => 2 ,
				'name' => '管理员' ,
			) ,
			2 => array(
				'id'   => 3 ,
				'name' => '编辑' ,
			) ,
			3 => array(
				'id'   => 4 ,
				'name' => '采编' ,
			) ,
		) ,
		2 => array(
			0  => array(
				'id'   => '0' ,
				'name' => '待定' ,
			) ,
			1  => array(
				'id'   => '11' ,
				'name' => '审稿' ,
			) ,
			2  => array(
				'id'   => '1' ,
				'name' => '录用' ,
			) ,
			3  => array(
				'id'   => '2' ,
				'name' => '修改' ,
			) ,
			4  => array(
				'id'   => '4' ,
				'name' => '退款' ,
			) ,
			5  => array(
				'id'   => '12' ,
				'name' => '黄稿' ,
			) ,
			6  => array(
				'id'   => '5' ,
				'name' => '上报' ,
			) ,
			7  => array(
				'id'   => '6' ,
				'name' => '写作' ,
			) ,
			8  => array(
				'id'   => '7' ,
				'name' => '排版' ,
			) ,
			9  => array(
				'id'   => '8' ,
				'name' => '自审校' ,
			) ,
			10 => array(
				'id'   => '9' ,
				'name' => '社审校' ,
			) ,
			11 => array(
				'id'   => '3' ,
				'name' => '已收款' ,
			) ,
			12 => array(
				'id'   => '13' ,
				'name' => '已出' ,
			) ,
			13 => array(
				'id'   => '10' ,
				'name' => '完成' ,
			) ,
		) ,
		3 => array(
			0 => array(
				'id'   => 0 ,
				'name' => '未确认' ,
			) ,
			1 => array(
				'id'   => 1 ,
				'name' => '已确认' ,
			) ,
		) ,
	);