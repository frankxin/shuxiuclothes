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
        <div class="btn-group locate" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="gender" id="option1" value="男性" >男性
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="gender" id="option2" value="女性"> 女性
          </label>
        </div>
        <div class="btn-group locate type" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="type" id="option1" value="正装" > 正装
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="type" id="option2" value="配件"> 配件
          </label>
        </div>
        <div class="btn-group locate peijian" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="peijian_type" id="option1" value="鞋"> 鞋
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="peijian_type" id="option2" value="领带"> 领带
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="peijian_type" id="option3" value="衬衫"> 衬衫
          </label>
        </div>
        <div class="btn-group locate clothes_size" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option1" value="34"> 155
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option2" value="35"> 160
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="36"> 165
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="37"> 170
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="38"> 175
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="39"> 180
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="40"> 185
          </label>
        </div>
        <div class="btn-group locate  shoe_size" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option1" value="34"> 34
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option2" value="35"> 35
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="36"> 36
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="37"> 37
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="38"> 38
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="39"> 39
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="40"> 40
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="41"> 41
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="42"> 42
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="size" id="option3" value="43"> 43
          </label>
        </div>
        <div class="btn-group locate" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option1" value="黑色"> 黑色
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option2" value="花色"> 花色
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option2" value="花色"> 蓝色
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option2" value="花色"> 褐色
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option2" value="花色"> 灰色
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option3" value="白色"> 白色
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option3" value="红"> 红
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option3" value="粉"> 粉
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="color" id="option3" value="深蓝"> 深蓝
          </label>
        </div> 
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
    $(".clothes_size").css("display","none");
    $(".peijian").css("display","none");
    $(".shoe_size").css("display","none");
    $(".type label").click(function(){
        if($(this).children("input").val() == '正装'){
            $(".clothes_size").css("display","inline-block");
            $(".peijian").css("display","none");
        }else{
            $(".clothes_size").css("display","none");
            $(".peijian").css("display","inline-block");
        }
    })

</script>
</body>
</html>