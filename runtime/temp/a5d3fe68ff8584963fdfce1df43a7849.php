<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/www/web/edg_leteng_net/public_html/../app/api/view/news/index.html";i:1573551702;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图文详情</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <script src="http://g.tbcdn.cn/mtb/lib-flexible/0.3.2/??flexible_css.js,flexible.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/static/js/admin/css/style.css">
    <link rel="stylesheet" href="__PUBLIC__/static/js/admin/css/iconfont.css">

    <script src="__PUBLIC__/static/js/admin/js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="tbody">
		<div class="tbody_new">
		    <video src="video/xxt.mp4" poster="img/new.png"  controls="controls" webkit-playsinline="" playsinline="" x5-playsinline="" x-webkit-airplay="allow" controls=""></video>
			<div class="h1"><?php echo $article['title']; ?></div>
			<div class="label">
				<div class="item"><?php echo $article['create_time']; ?></div>
				<div class="item"><span class="iconfont icon-kanguo"></span><?php echo $article['hit']; ?></div>
				<div class="mystyle" ><span class="iconfont icon-dianzan"></span><span class="num"><?php echo $article['praise']; ?></span></div>
			</div>
			<div class="content">
				<?php echo $article['detail']; ?>
			</div>
		</div>
	</div>
</body>
<script>
      $(function(){
        var num = $('.label .num').text();
		var content_id = '<?php echo $article['content_id']; ?>';
		var token = '<?php echo $token; ?>';
		var cheshi = '<?php echo $ceshi; ?>';
		var ispaise = '<?php echo $ispaise; ?>';
		if(ispaise){
			$('.mystyle').addClass('icon');
		}
        console.log(cheshi);
        $('.mystyle').on('click',function(){
        	//  num ++;
        	//  console.log('12');
        	//  $('.label .num').text(num);
        	//  $(this).addClass('icon')
			 $.post('<?php echo url('api/information/praiseClick'); ?>',{'content_id':content_id,'token':token},function(reg){
				 console.log(reg);
				if(reg.code==0){
					num ++;
					$('.label .num').text(num);
					$('.mystyle').addClass('icon');
				}else if(reg.code==-1){
					num --;
					$('.label .num').text(num);
					$('.mystyle').removeClass('icon');
				}
				else if(reg.code==1){
					$('.mystyle').removeClass('icon');
				}
			 })
        })
      })
</script>
</html>