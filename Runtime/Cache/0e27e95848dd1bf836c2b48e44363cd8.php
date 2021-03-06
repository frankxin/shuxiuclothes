<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../Public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../Public/css/item-up.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Public/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript">
    window.onload=function(){
            var odiv1=document.getElementById('display-control1');
            var odiv2=document.getElementById('display-control2');
            var aInput=document.getElementsByName('type');
            if (aInput[0].checked) {
                odiv1.style.display='block';
                odiv2.style.display='none';
            }
            else
            {
                odiv2.style.display='block';
                odiv1.style.display='none';
            }
            for(var i=0 ;i<2 ;i++)
            {
                aInput[i].onclick=function(){
                if (aInput[0].checked) {
                odiv1.style.display='block';
                odiv2.style.display='none';
                }
                else
                {
                    odiv2.style.display='block';
                    odiv1.style.display='none';
                }
                }
            }
    }
    </script>
    <style type="text/css">
    body{
        background:url('../Public/images/light_honey.png');
    }
    </style>
</head>
<body>
<div class="position">
    <form method="post" action="<?php echo U("CA/add");?>" enctype="multipart/form-data">
	<div class="positive-clothes">
		<div style="font-size:24px;font-weight:bold;color:#fff;">商品发布</div>
		<div class="form-group">
    		<label for="FirstInputFile">主页展示图</label>
    		<input type="file" name="img[]" id="FirstInputFile">
 		</div>
        <div class="form-group">
            <label>编号</label>
            <input type="text" name="serial" value="<?php echo ($item["serial"]); ?>"/>
        </div>
        <div class="form-group">
            <label>数量</label>
            <input type="text" name="total" value="<?php echo ($item["total"]); ?>"/>
        </div>
 		<div class="form-group">
    		<label>信息介绍</label>
    		<textarea cols="30" name="description" rows="5"><?php echo ($item["description"]); ?></textarea>
 		</div>
 		<div class="form-group">
    		<label>价格（元/每天）</label>
    		<input type="text" name="price" value="<?php echo ($item["price"]); ?>"/>
 		</div>
 		<div class="form-group">
 			<label for="SecondInputFile">具体页面图片展示1</label>
 			<input type="file" name="img[]" id="SecondInputFile">
 		</div>
 		<div class="form-group">
 			<label for="ThirdInputFile">具体页面图片展示2</label>
 			<input type="file" name="img[]" id="ThirdInputFile">
 		</div>
 		<?php
 if($edit) echo "<h4 style='color:red'>请重新编辑以下信息，或点击返回键取消编辑</h4>"; ?>
        <label>选择性别：</label>        
        <select class="form-control">
          <option></option>
          <option>男</option>
          <option>女</option>
        </select>
        <label>选择类型</label>
        <select class="form-control form-check">
          <option></option>
          <option>正装</option>
          <option>配件</option>
        </select>
        <div class="form-display">
          <label>请选择配件类型</label>
          <select class="form-control">
            <option></option>
            <option>鞋子</option>
            <option>衬衫</option>
            <option>领带</option>
          </select>
        </div>
        <label>选择尺寸</label>
        <select class="form-control">
          <option></option>
          <option>--正装尺码--</option>
          <option>155</option>
          <option>160</option>
          <option>165</option>
          <option>170</option>
          <option>175</option>
          <option>180</option>
          <option>185</option>
          <option>--鞋子尺码--</option>
          <option>34</option>
          <option>35</option>
          <option>36</option>
          <option>37</option>
          <option>38</option>
          <option>39</option>
          <option>40</option>
          <option>41</option>
          <option>42</option>
          <option>43</option>
        </select>
        <label>选择颜色</label>
        <select class="form-control">
          <option></option>
          <option>黑色</option>
          <option>花色</option>
          <option>蓝色</option>
          <option>褐色</option>
          <option>灰色</option>
          <option>白色</option>
          <option>红</option>
          <option>粉</option>
          <option>深蓝</option>
        </select>
        <div>
            <button class="ibutton">确认发布</button>
            <?php if($edit){ ?>
                <input type="button" class="ibutton" onclick="location.href='<?php echo U("Admin/positive_manage");?>'" value="返回"></input>
            <?php } ?>
        </div>
	</div>
    </form>
</div>
<script type="text/javascript">
    $(".form-display").css("display","none");
    $(".form-check").blur(function(){
      if ($(".form-check option:selected").text() == '配件') {
        $(".form-display").css("display","block");
      }else{
        $(".form-display").css("display","none");
      }
    })
</script>
</body>
</html>