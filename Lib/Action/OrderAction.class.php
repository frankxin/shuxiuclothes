<?php
	class OrderAction extends Action
	{
		public function index()
		{
			if($_GET['gender']){
				$gender = $_GET['gender'];
			}
			if($_GET['type']){
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
			$detail = $ca->getCAdetail($_GET['id']);
			var_dump($detail);
			//$_SESSION['user']
			$this->assign('detail',$detail);
			$this->display();
		}

		public function peijian()
		{
			$this->display();
		}

		public function submit()
		{
			$ca = D("CA");
			$detail = $ca->getCAdetail($_GET['id']);
			var_dump($_POST);
			$this->assign('detail',$detail);
			$this->display();
		}
		// public function Bucket()
		// {
		// 	var_dump("adfasdfasdf");
		// 	$cart = D("Order");

		// 	var_dump($_SESSION['user']['uid']);
		// 	if($_SESSION['user']['uid']){
		// 		$cartReturn = $cart->getCartByUid($_SESSION['user']['uid']);
		// 		var_dump($_SESSION['user']['uid']);
		// 	}
		// 	else{
		// 		//login
		// 	}
		// 	$this->assign('cartReturn',$cartReturn);
		// 	$this->display();
		// }
	}