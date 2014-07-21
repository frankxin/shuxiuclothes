<?php
	class OrderModel extends CommonModel
	{
		public function getUnCompleteOrder()
		{
			import('ORG.Util.Page');
			$Page  = new Page($this->table('sx_order o,sx_color c,sx_user u,sx_accessory_type t,sx_clothes_accessory ca')->where("o.caid=ca.id AND ca.accessory_type=t.id AND o.cacolor=c.id AND o.uid=u.uid AND o.complete=0")->count(),50);
			$show = $Page->show();
			$list = $this->table('sx_order o,sx_color c,sx_user u,sx_accessory_type t,sx_clothes_accessory ca')->where("o.caid=ca.id AND ca.accessory_type=t.id AND o.cacolor=c.id AND o.uid=u.uid AND o.complete=0")->field("o.*,u.*,t.type,c.color")->order("o.id")->limit($Page->firstRow.','.$Page->listRows)->select();
			//echo $this->getLastSql();
			return array("show"=>$show,"list"=>$list);
		}

		public function getCompleteOrder()
		{
			import('ORG.Util.Page');
			$Page  = new Page($this->table('sx_order o,sx_color c,sx_user u,sx_accessory_type t,sx_clothes_accessory ca')->where("o.caid=ca.id AND ca.accessory_type=t.id AND o.cacolor=c.id AND o.uid=u.uid AND o.complete=0")->count(),50);
			$show = $Page->show();
			$list = $this->table('sx_order o,sx_color c,sx_user u,sx_accessory_type t,sx_clothes_accessory ca')->where("o.caid=ca.id AND ca.accessory_type=t.id AND o.cacolor=c.id AND o.uid=u.uid AND o.complete=1")->field("o.*,u.*,t.type,c.color")->order("o.id")->limit($Page->firstRow.','.$Page->listRows)->select();
			//echo $this->getLastSql();
			return array("show"=>$show,"list"=>$list);
		}

		public function getOrderByUid($uid)
		{
			import('ORG.Util.Page');
			$Page  = new Page($this->table('sx_order o,sx_color c,sx_user u,sx_accessory_type t,sx_clothes_accessory ca')->where("o.caid=ca.id AND ca.accessory_type=t.id AND o.cacolor=c.id AND o.uid=u.uid AND o.uid=$uid")->count(),50);
			$show = $Page->show();
			$list = $this->table('sx_order o,sx_color c,sx_user u,sx_accessory_type t,sx_clothes_accessory ca')->where("o.caid=ca.id AND ca.accessory_type=t.id AND o.cacolor=c.id AND o.uid=u.uid AND o.uid=$uid")->field("o.*,u.*,t.type,c.color")->order("o.id")->limit($Page->firstRow.','.$Page->listRows)->select();
			//echo $this->getLastSql();
			return array("show"=>$show,"list"=>$list);
		}

		public function inputToCart($uid,$caID,$casize,$cacolor,$startTime,$endTime)
		{
			$cart = M("cart");
			$data['uid'] = $uid;
			$data['caID'] = $caID;
			$data['casize'] = $casize;
			$data['cacolor'] = $cacolor;
			$data['startTime'] = strtotime($startTime);
			$data['endTime'] = strtotime($endTime);
			$cart->add($data);
		}


		public function getSubmitDetial($id,$size,$color,$startTime,$endTime)
		{
			$ca = D("CA");
			$caDetail = $ca->getCAdetail($id);
			$detail['id'] =$id;
			$detail['description'] =$caDetail['description'];
			$detail['size'] = $size;
			$detail['color'] = $color;
			$detail['price'] = $caDetail['price'];
			$detail['startTime'] = date('Y-m-d', $startTime);
			$detail['endTime'] = date('Y-m-d', $endTime);
			$detail['countTime'] = ($endTime - $startTime) / 86400;
			$detail['countPrice'] = $detail['countTime'] * $caDetail['price'];
			return $detail;
		}

		public function inputToOrder($uid)
		{
			$user = D("User");
			$order = M("order");
			$order_detail = M("order_detail");
			$cartReturn = $user->getCartByUid($uid);
			$countPrice = $user->getCountPrice($cartReturn);

			$orderInput['complete'] = 0;
			$orderInput['uid'] = $uid;
			$orderInput['price'] = $countPrice;
			$orderInput['time'] = time();
			$orderID = $order->add($orderInput);
			var_dump($orderID);
			foreach ($cartReturn as $key => $value) {
				$order_detail_Input['orderID'] = $orderID;
				$order_detail_Input['caID'] = $value['id'];
				$order_detail_Input['price'] = $value['price'];
				$order_detail_Input['cacolor'] = $value['color'];
				$order_detail_Input['casize'] = $value['size'];
				$order_detail_Input['startTime'] = $value['startTime'];
				$order_detail_Input['endTime'] = $value['endTime'];
				$order_detail->add($order_detail_Input);
			}
		}
	}