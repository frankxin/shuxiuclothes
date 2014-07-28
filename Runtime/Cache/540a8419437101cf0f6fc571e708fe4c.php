<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
     <title></title>
     <meta charset="utf-8"/>
     <link rel="stylesheet" href="../Public/css/bootstrap.css">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Public/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <style type="text/css">
    body{
        background:url('../Public/images/light_honey.png');
    }
    </style>
</head>
<body>
<div>
	<table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>用户名</th>
                    <th>电话</th>
                    <th>衣服信息</th>
                    <th>尺码</th>
                    <th>颜色</th>
                    <th>价格</th>
                    <th>租赁时间</th>
                    <th>状态</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>frankxin</td>
                    <td>18380421239</td>
                    <td>黑丝袜正装</td>
                    <td>170</td>
                    <td>红</td>
                    <td>12</td>
                    <td>2014-7-13到2014-7-14</td>
                    <td>
                        <select class="form-control">
                          <option>未付款</option>
                          <option>已付款进行中</option>
                          <option>已完成订单</option>
                        </select>
                    </td>
                </tr>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["real_name"]); ?></td>
                        <td><?php echo ($vo["phone"]); ?></td>
                        <td><?php echo ($vo["type"]); ?></td>
                        <td><?php echo ($vo["casize"]); ?></td>
                        <td><?php echo ($vo["color"]); ?></td>
                        <td><?php echo ($vo["price"]); ?></td>
                        <td><?php echo (date("Y:m:d",$vo["from"])); ?>到<?php echo (date("Y:m:d",$vo["end"])); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo ($page); ?>
</div>
</body>
</html>