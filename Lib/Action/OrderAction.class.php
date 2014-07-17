<?php
	class OrderAction extends Action
	{
		public function index()
		{
			$gender = empty($_REQUEST['gender'])?0:1;
			$ca = D("CA");
			$data = $ca->getPaginateData(0,array('gender'=>$gender),15);
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
			var_dump($detail);
			$this->assign('detail',$detail);
			$this->display();
		}
		public function Bucket()
		{
			$this->display();
		}
	}