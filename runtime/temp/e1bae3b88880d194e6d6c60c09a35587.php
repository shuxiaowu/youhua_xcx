<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/www/web/edg_leteng_net/public_html/../app/admin/view/foods/info.html";i:1573541646;s:61:"/www/web/edg_leteng_net/app/admin/view/common/_container.html";i:1571731694;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit" /><!-- 让360浏览器默认选择webkit内核 -->

    <!-- 全局css -->
    <link rel="shortcut icon" href="__PUBLIC__/static/favicon.ico">
    <link href="__PUBLIC__/static/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__PUBLIC__/static/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="__PUBLIC__/static/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="__PUBLIC__/static/css/plugins/validate/bootstrapValidator.min.css" rel="stylesheet">
    <link href="__PUBLIC__/static/css/animate.css" rel="stylesheet">
    <link href="__PUBLIC__/static/css/style.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="__PUBLIC__/static/js/plugins/layui/css/layui.css?ver=170803" media="all">
    
    <link href="__PUBLIC__/static/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="__PUBLIC__/static/css/plugins/webuploader/webuploader.css" rel="stylesheet">
    <link href="__PUBLIC__/static/css/plugins/ztree/zTreeStyle.css" rel="stylesheet">
    <link href="__PUBLIC__/static/css/plugins/jquery-treegrid/css/jquery.treegrid.css" rel="stylesheet" />
    <!-- <link href="__PUBLIC__/static/css/plugins/ztree/demo.css" rel="stylesheet"> -->

    <!-- 全局js -->
    <script src="__PUBLIC__/static/js/jquery.min.js?v=2.1.4"></script>
    <script src="__PUBLIC__/static/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__PUBLIC__/static/js/plugins/ztree/jquery.ztree.all.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/validate/bootstrapValidator.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/validate/zh_CN.js"></script>
    <script src="__PUBLIC__/static/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/jquery-treegrid/js/jquery.treegrid.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/jquery-treegrid/js/jquery.treegrid.bootstrap3.js"></script>
    <script src="__PUBLIC__/static/js/plugins/jquery-treegrid/extension/jquery.treegrid.extension.js"></script>
    <script src="__PUBLIC__/static/js/plugins/layer/layer.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/iCheck/icheck.min.js"></script>
    <script src="__PUBLIC__/static/js/plugins/layer/laydate/laydate.js"></script>
    <script src="__PUBLIC__/static/js/plugins/webuploader/webuploader.min.js"></script>
    <script src="__PUBLIC__/static/js/common/ajax-object.js"></script>
    <script src="__PUBLIC__/static/js/common/bootstrap-table-object.js"></script>
    <script src="__PUBLIC__/static/js/common/tree-table-object.js"></script>
    <script src="__PUBLIC__/static/js/common/web-upload-object.js"></script>
    <script src="__PUBLIC__/static/js/common/ztree-object.js"></script>
    <script src="__PUBLIC__/static/js/common/Feng.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/js/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" src="__PUBLIC__/static/js/xheditor/xheditor-1.2.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/js/xheditor/xheditor_lang/zh-cn.js"></script>
    <script type="text/javascript">

        Feng.addCtx("<?php echo str_replace('.html','',url('@'.request()->module()))?>");
        Feng.sessionTimeoutRegistry();
    </script>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        
<style>
.video,.tag{display:none;}
.weiliang>div{margin:5px 0;overflow:hidden;}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
}
.createFollowCheck input[type="number"] {
	-moz-appearance: textfield;
}
.add_delbtn{display:flex;line-height:34px;float:left}
.add_delbtn>div{padding-right:5px;}
.add_delbtn>div>img:hover{cursor: pointer;}
.add_delbtn>div>img{height:16px;width:16px;}
.left_input{padding-right:0!important}
.right_input{padding-left:0!important}
.unit_box{text-align:center;background:#ccc}
</style>
<div class="ibox float-e-margins">
<input type="hidden" name='content_id' id='content_id' value="<?php echo $info['content_id']; ?>" />
	<div class="ibox-content layui-form">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row" style="margin-top:-20px;">
				<div class="layui-tab layui-tab-brief" lay-filter="test">
					<ul class="layui-tab-title">
						<li class="layui-this">基本信息</li>
						<li>拓展信息</li>
					</ul>
					<div class="layui-tab-content" style="margin-top:10px;">
						<div class="layui-tab-item layui-show">
							<div class="col-sm-12">
							<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">名称：</label>
						<div class="col-sm-9">
							<input type="text" id="title" value="<?php echo $info['title']; ?>" name="title" class="form-control" placeholder="名称">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">蛋白质：</label>
						<div class="col-sm-4 left_input" >
							<input type="text" id="protein" value="<?php echo $info['protein']; ?>" name="protein" class="form-control" placeholder="蛋白质">
						</div>
						<div class="col-sm-1 right_input">
							<!-- <input type="text" id="protein" class="form-control" value="克" > -->
							<div class="form-control unit_box">克</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">脂肪：</label>
						<div class="col-sm-4 left_input">
							<input type="text" id="axunge" value="<?php echo $info['axunge']; ?>" name="axunge" class="form-control" placeholder="脂肪">
						</div>
						<div class="col-sm-1 right_input">
							<!-- <input type="text" id="protein" class="form-control" value="克" > -->
							<div class="form-control unit_box">克</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">碳水化合物：</label>
						<div class="col-sm-4 left_input">
							<input type="text" id="carbohydrate" value="<?php echo $info['carbohydrate']; ?>" name="carbohydrate" class="form-control" placeholder="碳水化合物">
						</div>
						<div class="col-sm-1 right_input">
							<!-- <input type="text" id="protein" class="form-control" value="克" > -->
							<div class="form-control unit_box">克</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">所属类别：</label>
						<div class="col-sm-9">
							<select lay-ignore name="class_id" class="form-control" id="class_id">
								<option value="">请选择</option>
								<?php $_result=db()->query('select class_id,class_name,pid from cd_catagory_foods');if($_result)$_result = formartList(explode(",","class_id,pid,class_name,class_name"),$_result);foreach($_result as $key=>$sql):?>
									<option value="<?php echo $sql['class_id']; ?>" <?php if($info['class_id'] == $sql['class_id']): ?>selected<?php endif; ?>><?php echo $sql['class_name']; ?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">能量：</label>
						<div style="display:inline-block;padding-left:15px;">
							<input type="number" id="energy_value" value="<?php echo $info['energy_value']; ?>" name="energy_value" placeholder="" style="text-align:center; border-bottom:1px solid #000!important; width:100px;border-left:none;border-right:none;border-top:none;padding: 6px 0px;">
							<span>千卡/</span>
						</div>
						<div style="display:inline-block;">
							<input type="number" id="weight" value="<?php echo $info['weight']; ?>" name="weight" placeholder="" style="text-align:center; border-bottom:1px solid #000!important;width:80px;border-left:none;border-right:none;border-top:none;padding: 6px 0px;display:inline-block;">
							<input type="text" id="unit" value="<?php echo $info['unit']; ?>" name="unit"  placeholder="单位:千克" style="width:80px;border:none;padding: 6px 0px;display:inline-block;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">缩略图：</label>
						<div class="col-sm-6">
							<input type="text" id="pic" value="<?php echo $info['pic']; ?>" name="pic" <?php echo hook('view_big_pic',['type'=>2]); ?> class="form-control" placeholder="请输入缩略图">
							<span class="help-block m-b-none">请先选择栏目，再上传才能生成相应的缩略图</span>
						</div>
						<div class="col-sm-2" style="position:relative; right:30px;">
							<span id="pic_upload"></span>
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-2 control-label">文章详情：</label>
						<div class="col-sm-9">
							<script id="detail" type="text/plain" name="detail" style="width:100%;height:300px;"></script>
							<script type="text/javascript">
								var ue = UE.getEditor('detail');
								scaleEnabled:true
							</script>
						</div>
					</div> -->
					<div class="form-group">
					<label class="col-sm-2 control-label">营养元素：</label>
					<div class="col-sm-9 weiliang">

						<?php if(is_array($info['tracedata']) || $info['tracedata'] instanceof \think\Collection || $info['tracedata'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['tracedata'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?>
						<div class="microelement_item">
								<div class="add_delbtn">
									<div class="add_btn"><img src="__PUBLIC__/static/js/admin/img/add.png"></div>
									<div class="del_btn"><img src="__PUBLIC__/static/js/admin/img/del.png"></div>
								</div>
								<?php if(is_array($obj) || $obj instanceof \think\Collection || $obj instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($obj) ? array_slice($obj,0,1, true) : $obj->slice(0,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
								<div class="col-sm-4">
									<!-- <input type="text" id="wlname" value="" name="wlname[]" class="form-control" placeholder="微量元素名称"> -->
									<select lay-ignore name="class_id" class="form-control" id="wlname">
										<option value="">请选择</option>
											<?php $_result=db()->query('select title,frament_id from cd_microelement');if($_result)foreach($_result as $key=>$sql):?>
												<option value="<?php echo $sql['frament_id']; ?>" name="wlname[]" <?php if($sql['frament_id'] == $vo): ?>selected<?php endif; ?>><?php echo $sql['title']; ?></option>
											<?php endforeach?>
									</select>
								</div>
								<?php endforeach; endif; else: echo "" ;endif; if(is_array($obj) || $obj instanceof \think\Collection || $obj instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($obj) ? array_slice($obj,1,1, true) : $obj->slice(1,1, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
								<div class="col-sm-4">
									<input type="text" id="wlvalue" value="<?php echo $vo; ?>" name="wlvalue[]" class="form-control" placeholder="含量">
								</div>
								<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<script>
						var html ='';
						$(function(){
							if($('.microelement_item').size()==0){
								html ='';
								html+='<div class="microelement_item">';
								html+='<div class="add_delbtn">';
								html+='<div class="add_btn"><img src="__PUBLIC__/static/js/admin/img/add.png"></div>';
								html+='<div class="del_btn"><img src="__PUBLIC__/static/js/admin/img/del.png"></div>';
								html+='</div>';
								html+='<div class="col-sm-4">';
								html+='<select lay-ignore name="class_id" class="form-control" id="wlname" data-bv-field="class_id" style="display: inline-block;">';
								html+='<option value="">请选择</option>';
								<?php $_result=db()->query('select title,frament_id from cd_microelement');if($_result)foreach($_result as $key=>$sql):?>
									html+='<option value="<?php echo $sql['frament_id']; ?>"  name="wlname[]"><?php echo $sql['title']; ?></option>';
								<?php endforeach?>
								html+='</select>';
								html+='</div>';
								html+='<div class="col-sm-4">';
								html+='<input type="text" id="wlvalue" value="" name="wlvalue[]" class="form-control" placeholder="含量">';
								html+='</div>';
								html+='</div>';
								$(html).appendTo($('.weiliang'));
							}
						})
						$('body').on('click','.add_btn',function(){
							
							html+='<div class="microelement_item">';
							html+='<div class="add_delbtn">';
							html+='<div class="add_btn"><img src="__PUBLIC__/static/js/admin/img/add.png"></div>';
							html+='<div class="del_btn"><img src="__PUBLIC__/static/js/admin/img/del.png"></div>';
							html+='</div>';
							html+='<div class="col-sm-4">';
							html+='<select lay-ignore name="class_id" class="form-control" id="wlname" data-bv-field="class_id" style="display: inline-block;">';
							html+='<option value="">请选择</option>';
							<?php $_result=db()->query('select title,frament_id from cd_microelement');if($_result)foreach($_result as $key=>$sql):?>
								html+='<option value="<?php echo $sql['frament_id']; ?>"  name="wlname[]"><?php echo $sql['title']; ?></option>';
							<?php endforeach?>
							html+='</select>';
							html+='</div>';
							html+='<div class="col-sm-4">';
							html+='<input type="text" id="wlvalue" value="" name="wlvalue[]" class="form-control" placeholder="含量">';
							html+='</div>';
							html+='</div>';
							$(html).appendTo($('.weiliang'));
						})
						$('body').on('click','.del_btn',function(){
							if($('.microelement_item').size()>=2){
									$(this).parent().parent('.microelement_item').remove();
								}
								else{
                                    Feng.error("需要保留一个!");
                                }
								
							})
						
					</script>
					<div id="extend"></div>
							<!-- form end -->
							</div>
						</div>
						<div class="layui-tab-item">
							<div class="col-sm-12">
							<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">文章状态：</label>
						<div class="col-sm-9">
							<?php if (!isset($info['status'])) {
    $info['status'] = 10;
}; ?>
							<input name="status" value="10" type="radio" <?php if($info['status'] == '10'): ?>checked<?php endif; ?> title="发布">
							<input name="status" value="danger" type="radio" <?php if($info['status'] == 'danger'): ?>checked<?php endif; ?> title="不发布">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">来源：</label>
						<div class="col-sm-9">
							<?php if (!isset($info['author'])) {
    $info['author'] = 'admin';
}; ?>
							<input type="text" id="author" value="<?php echo $info['author']; ?>" name="author" class="form-control" placeholder="请输入来源">
						</div>
					</div>
					
							<!-- form end -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-10">
					<button type="button" class="btn btn-primary" onclick="<?php if($info['content_id'] != ''): ?>CodeInfoDlg.update()<?php else: ?>CodeInfoDlg.add()<?php endif; ?>" id="ensure">
						<i class="fa fa-check"></i>&nbsp;确认提交
					</button>
					<button type="button" class="btn btn-danger" onclick="CodeInfoDlg.close()" id="cancel">
						<i class="fa fa-eraser"></i>&nbsp;取消
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="__PUBLIC__/static/js/admin/Foods.js?t=<?php echo rand(1000, 9999)?>" charset="utf-8"></script>
<script src="__PUBLIC__/static/js/upload.js" charset="utf-8"></script>
<script src="__PUBLIC__/static/js/plugins/layui/layui.js?t=1498856285724" charset="utf-8"></script>

<script>

layui.config({dir: '__PUBLIC__/static/js/plugins/layui/'});
	layui.use(['layer', 'form'], function () {
	window.layer = layui.layer;
	window.form = layui.form();
});
layui.use('element', function(){
	var element = layui.element();
	element.on('tab(test)', function(elem){
	});
});

uploader('pic_upload','pic','image',false,'','<?php echo url("admin/Upload/uploadImages"); ?>');


	$('#class_idss').change(function() {
		uploader('pic_upload','pic','image',false,'','<?php echo url("admin/Upload/uploadImages"); ?>?class_id=' + $("#class_id option:selected").val()); //此段主要是为了加载当前class_id  否则可以不用写
		var ajax = new $ax(Feng.ctxPath + "/Content/getExtends", function (data) {
			$("#extend").html(data.data);
			var fieldList = data.fieldList;
			for(var p in fieldList){
				//单图上传
				if(fieldList[p]['type'] == 8){
					uploader(fieldList[p]['field']+'_upload',fieldList[p]['field'],'image',false,'','<?php echo url("admin/Upload/uploadImages"); ?>');
				}
				//多图上传
				if(fieldList[p]['type'] == 9){
					var images = $("#"+fieldList[p]['field']).val();
					var default_value;
					var images = images.substr(0,images.length-1);
					
					if(images !== ''){
						var images_value;
						if(images.indexOf("|") == -1){
							images_value = '["'+images+'"]';
						}else{
							images_value = JSON.stringify(images.split("|"));
						}
						default_value = images_value;				
					}else{
						default_value = '';
					}
					
					uploader(fieldList[p]['field']+'_upload',fieldList[p]['field'],'image',true,default_value,'<?php echo url("admin/Upload/uploadImages"); ?>');
				}
				//文件上传
				if(fieldList[p]['type'] == 10){				
					uploader(fieldList[p]['field']+'_upload',fieldList[p]['field'],'file',false,'','<?php echo url("admin/Upload/uploadImages"); ?>');
				}
				
				layui.config({dir: '__PUBLIC__/static/js/plugins/layui/'});
					layui.use(['layer', 'form'], function () {
					window.layer = layui.layer;
					form = layui.form();
					form.render();
				});
				
				
			}
			
		});
		ajax.set('class_id', $(this).find('option:selected').val());
		ajax.set('content_id', $("#content_id").val());
		ajax.start();
	<?php if($info['content_id'] != ''): ?>
	$('#class_id').change();
	<?php endif; ?>
})

</script>



    </div>
    <script src="__PUBLIC__/static/js/content.js?v=1.0.0"></script>
    
</body>

</html>