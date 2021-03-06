<?php
	class CAModel extends CommonModel
	{
		protected $tableName = 'clothes_accessory';
		private $keyMapCA = array("type","accessory_type","price","gender","description","status","total","serial"); 
		private $keyMapColor = array("color");
		private $keyMapSize = array("size");
		private $keyMapImg = array("img");
		private $PK=0;

		public function addCA()
		{
			$map = $this->getKeyMap($this->keyMapCA);
			$mapColor = $this->getKeyMap($this->keyMapColor);
			$mapSize = $this->getKeyMap($this->keyMapSize);
			$mapImg = $this->getKeyMap($this->keyMapImg,$_POST);
			$result = $this->add($map);
			if($result!==false)
				$this->PK = $result;
			else
				return false;
			$this->addExtra("color",$mapColor['color']);
			$this->addExtra("size",$mapSize['size']);
			$this->addExtra("clothes_accessory_image",$mapImg['img'],'imgurl');
			return true;
		}

		public function addExtra($tablename,$arr,$pr=null,$model=null)
		{
			if($this->PK==0||$this->PK==false)
				return false;
			$data = array();
			$pr = empty($pr)?$tablename:$pr;
			foreach($arr as $value)
			{
				$data[] = array('id'=>$this->PK,$pr=>$value);
			}
			return empty($model)?M($tablename)->addAll($data):$model->addAll($data);
		}

		public function delCA($id)
		{
			$map = "id=".$id;
			if($this->where($map)->delete()===false)
				return false;
			else
				return true;
		}

		public function getPaginateData($type='',$accessory_type='',$gender='',$num=30)
		{
			import('ORG.Util.Page');
			$map['status'] = 1;
			if($type=='0' or $type=='1') $map['type'] = $type;
			if(!empty($accessory_type)) $map['accessory_type'] = $accessory_type;
			if($gender=='0' or $gender=='1') $map['gender'] = $gender;
			$count = $this->where($map)->count();
			//var_dump($map,$count);
			$Page  = new Page($count,$num);
			$Page->setConfig("theme","<li>%upPage%</li>  <li>%linkPage%</li> <li>%downPage%</li>");
			$show  = $Page->show();
			$list = $this->where($map)->order("id desc")->limit($Page->firstRow.','.$Page->listRows)->select();
			return array("show"=>$show,"list"=>$list);
		}

		public function getImgs($id)
		{
			return M("clothes_accessory_image")->where(array("id"=>$id))->select();
		}

		public function getUnitArray($array,$name)
		{

			foreach ($array as $key => $value) {
				$return[]=$value[$name];
			}
			return $return;
		}

		public function getCAdetail($id)
		{
			$clothesDetail = M("clothes_accessory")->where(array("id"=>$id))->select();
			$imgaeDetail = M("clothes_accessory_image")->where(array("id"=>$id))->select();
			$colorDetail = M("color")->where(array("id"=>$id))->select();
			$sizeDetail = M("size")->where(array("id"=>$id))->select();
			$detail=$clothesDetail[0];
			
			$detail["image"]=$this->getUnitArray($imgaeDetail,"imgurl");
			$detail["color"]=$this->getUnitArray($colorDetail,"color");
			$detail["size"]=$this->getUnitArray($sizeDetail,"size");
			//var_dump($detail);
			return $detail;
		}
	}