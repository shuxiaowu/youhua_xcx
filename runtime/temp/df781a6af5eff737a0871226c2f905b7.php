<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"/www/web/edg_leteng_net/public_html/../app/admin/view/unit/info.html";i:1573523164;s:61:"/www/web/edg_leteng_net/app/admin/view/common/_container.html";i:1571731694;}*/ ?>
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
.left_input{padding-right:0!important}
.right_input{padding-left:0!important}
.unit_box{text-align:center;background:#ccc;padding-right:0!important;}
</style>
<div class="ibox float-e-margins">
<input type="hidden" name='frament_id' id='frament_id' value="<?php echo $info['frament_id']; ?>" />
	<div class="ibox-content layui-form">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="col-sm-12">
				<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">名称：</label>
						<div class="col-sm-9">
							<input type="text" id="title" value="<?php echo $info['title']; ?>" name="title" class="form-control" placeholder="请输入名称">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">换率：</label>
						<div class="col-sm-4 left_input" >
							<input type="number" id="transform_unit" value="<?php echo $info['transform_unit']; ?>" name="protein" class="form-control" placeholder="换率">
						</div>
						<div class="col-sm-1 right_input">
							<!-- <input type="text" id="protein" class="form-control" value="克" > -->
							<div class="form-control unit_box">克</div>
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-2 control-label">内容：</label>
						<div class="col-sm-9">
								<textarea id="content" name="content" style="width: 100%; height:300px;"><?php echo $info['content']; ?></textarea>
								<script type="text/javascript">$('#content').xheditor({html5Upload:false,upLinkUrl:"<?php echo url('admin/Upload/editorUpload',['immediate'=>1]); ?>",upLinkExt:"zip,rar,txt,doc,docx,pdf,xls,xlsx",tools:'simple',upImgUrl:"<?php echo url('admin/Upload/editorUpload',['immediate'=>1]); ?>",upImgExt:"jpg,jpeg,gif,png"});</script>
						</div>
					</div> -->
				<!-- form end -->
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-9 col-sm-offset-1">
					<button type="button" class="btn btn-primary" onclick="<?php if($info['frament_id'] != ''): ?>CodeInfoDlg.update()<?php else: ?>CodeInfoDlg.add()<?php endif; ?>" id="ensure">
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
<script src="__PUBLIC__/static/js/admin/Unit.js?t=<?php echo rand(1000, 9999)?>" charset="utf-8"></script>
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
</script>



    </div>
    <script src="__PUBLIC__/static/js/content.js?v=1.0.0"></script>
    
</body>

</html>