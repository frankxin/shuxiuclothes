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
			$ca = D("Order");
			$detail = $ca->getSubmitDetial($_POST['id'],$_POST['size'],$_POST['color'],strtotime($_POST['startTime']),strtotime($_POST['endTime']));
			if(empty($_SESSION['user']['uid'])){
				//login
			}
			else{
				$ca->inputToCart($_SESSION['user']['uid'],$detail['id'],$detail['size'],$detail['color'],$detail['startTime'],$detail['endTime']);
				$this->assign('detail',$detail);
				$this->display();
			}
		}
	}