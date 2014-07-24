<?php
	class OrderAction extends Action
	{
		public function index()
		{
			if($_GET['gender']=='0' or $_GET['gender']=='1'){
				$gender = $_GET['gender'];
			}
			if($_GET['type']=='0' or $_GET['type']=='1'){
				$type = $_GET['type'];
			}
			if($_GET['accessory_type']){
				$accessory_type = $_GET['accessory_type'];
			}
			$ca = D("CA");
			$data = $ca->getPaginateData($type,$accessory_type,$gender,15);
			foreach ($data["list"] as $key=>$value) {
				$data["list"][$key]["imgs"] = $ca->getImgs($value["id"]);
				$data["list"][$key]["imgs"] = $data["list"][$key]["imgs"][0];
			}
			$this->assign('list',$data["list"]);
			$this->assign('page',$data["show"]);
			$this->display();
		}

		public function detail()
		{
			$ca = D("CA");
			var_dump($GLOBALS['HTTP_RAW_POST_DATA']);
			$detail = $ca->getCAdetail($_GET['id']);
			//$_SESSION['user']
			$this->assign('psot',$_POST);
			$this->assign('detail',$detail);
			$this->display();
		}

		public function peijian()
		{
			$this->display();
		}

		public function submit()
		{
			$ca = D("Order");
			var_dump($_POST['aa']);
			$detail = $ca->getSubmitDetial($_POST['id'],$_POST['size'],$_POST['color'],strtotime($_POST['startTime']),strtotime($_POST['endTime']));
			if(empty($_SESSION['user']['uid'])){
				var_dump("login");
			}
			else{
				if($ca->inputToCart($_SESSION['user']['uid'],$detail['id'],$detail['size'],$detail['color'],$detail['startTime'],$detail['endTime'])){
					var_dump("已经买过该商品");
				}
				//$ca->inputToCart($_SESSION['user']['uid'],$detail['id'],$detail['size'],$detail['color'],$detail['startTime'],$detail['endTime']);
				else {
					$detail['startTime'] = date('Y年m月d日',strtotime($detail['startTime']));
					$detail['endTime'] = date('Y年m月d日',strtotime($detail['endTime']));
					$this->assign('detail',$detail);
					$this->display();
				}
				
			}
		}

		public function order()
		{
			$ca = D("Order");
			if(empty($_SESSION['user']['uid'])){
				var_dump("login");
			}
			else{
				$ca->inputToOrder($_SESSION['user']['uid']);
			}
			$this->display();
		}

		public function delete()
		{
			$ca = D("Order");
			$ca->deleteCaFromCart($_GET['id']);
			$this->display();
		}

		public function post()
		{
			$post = $_POST['name'];
			$_POST['post'] = $post;
		}
	}