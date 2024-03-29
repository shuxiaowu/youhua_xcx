<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/www/web/edg_leteng_net/public_html/../app/admin/view/form_data/index.html";i:1572924861;s:61:"/www/web/edg_leteng_net/app/admin/view/common/_container.html";i:1571731694;}*/ ?>
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
        
<div class="row">
	<div class="col-sm-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5><?php echo $extendInfo['title']; ?></h5>
				<button style="float:right; margin-top:-10px;" title="刷新页面" type="button" class="btn btn-default btn-outline" onclick="window.location.reload()" id="">
					<i class="fa fa-refresh"></i>
				</button>
			</div>
			<div class="ibox-content">
				<div class="row row-lg">
					<div class="col-sm-12">
						<div class="row" id="searchGroup">
							<!-- search start -->	
							<?php echo $searchGroup; ?>
							<!-- search end -->

						</div>
						<div id="CodeGoodsTableToolbar" role="group">
							<?php if(in_array('add',explode(',',$extendInfo['action']))): if(in_array('/admin/FormData/add/extend_id/'.$extend_id.'.html',session('admin.nodes')) || session('admin.role') == 1): ?>
								<button type="button" id="add" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
									<i class="fa fa-plus"></i>&nbsp;添加
								</button>
								<?php endif; endif; if(in_array('update',explode(',',$extendInfo['action']))): if(in_array('/admin/FormData/update/extend_id/'.$extend_id.'.html',session('admin.nodes')) || session('admin.role') == 1): ?>
								<button type="button" id="update" class="btn btn-primary button-margin" onclick="CodeGoods.update()">
									<i class="fa fa-edit"></i>&nbsp;修改
								</button>
								<?php endif; endif; if(in_array('view',explode(',',$extendInfo['action']))): if(in_array('/admin/FormData/view/extend_id/'.$extend_id.'.html',session('admin.nodes')) || session('admin.role') == 1): ?>
								<button type="button" id="vew" class="btn btn-success button-margin" onclick="CodeGoods.view()">
									<i class="fa fa-plus"></i>&nbsp;查看数据
								</button>
								<?php endif; endif; if(in_array('importData',explode(',',$extendInfo['action']))): if(in_array('/admin/FormData/importData/extend_id/'.$extend_id.'.html',session('admin.nodes')) || session('admin.role') == 1): ?>
								<button type="button" id="vew" class="btn btn-success button-margin" onclick="CodeGoods.importData()">
									<i class="fa fa-upload"></i>&nbsp;数据导入
								</button>
								<?php endif; endif; if(in_array('dumpData',explode(',',$extendInfo['action']))): if(in_array('/admin/FormData/dumpData/extend_id/'.$extend_id.'.html',session('admin.nodes')) || session('admin.role') == 1): ?>
								<button type="button" id="vew" class="btn btn-success button-margin" onclick="CodeGoods.dumpData()">
									<i class="fa fa-download"></i>&nbsp;数据导出
								</button>
								<?php endif; endif; if(in_array('delete',explode(',',$extendInfo['action']))): if(in_array('/admin/FormData/delete/extend_id/'.$extend_id.'.html',session('admin.nodes')) || session('admin.role') == 1): ?>
								<button type="button" id="delete" class="btn btn-danger button-margin" onclick="CodeGoods.delete()">
									<i class="fa fa-trash"></i>&nbsp;删除
								</button>
								<?php endif; endif; ?>
							
						</div>
						<table id="CodeGoodsTable" data-mobile-responsive="true" data-click-to-select="true">
							<thead><tr><th data-field="selectItem" data-checkbox="true"></th></tr></thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var CodeGoods = {id: "CodeGoodsTable",seItem: null,table: null,layerIndex: -1};

	<?php echo $formStr; ?>
	
	
	CodeGoods.buttonFormatter = function(value,row,index) {
		if(value){
			var str= '';
			
			<?php if(in_array('update',explode(',',$extendInfo['action']))): ?>
			str += '<button type="button" class="btn btn-primary btn-xs" title="修改"  onclick="CodeGoods.update('+value+')"><i class="fa fa-edit"></i></button>&nbsp;';
			<?php endif; if(in_array('delete',explode(',',$extendInfo['action']))): ?>
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete('+value+')"><i class="fa fa-trash"></i></button>&nbsp;';
			<?php endif; ?>
			
			return str;
		}
	}
	
	<?php echo $queryParam; ?>

	CodeGoods.check = function () {
		var selected = $('#' + this.id).bootstrapTable('getSelections');
		if(selected.length == 0){
			Feng.info("请先选中表格中的某一记录！");
			return false;
		}else{
			CodeGoods.seItem = selected;
			return true;
		}
	};

	CodeGoods.add = function (value) {
		var index = layer.open({type: 2,title: '创建数据',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/FormData/add/extend_id/<?php echo $extend_id; ?>'});
		this.layerIndex = index;
	}


	CodeGoods.update = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '编辑数据',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/FormData/update/extend_id/<?php echo $extend_id; ?>/data_id/'+value});
		}else{
			if (this.check()) {
				var idx = '';

				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.data_id;
				});

				idx = idx.substr(1);
				if(idx.indexOf(",") !== -1){
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({type: 2,title: '编辑数据',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/FormData/update/extend_id/<?php echo $extend_id; ?>/data_id/'+idx});
				this.layerIndex = index;
			}
		}
	}
	
	CodeGoods.view = function (value) {

		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function() {
				idx += ',' + this.data_id;
			});

			idx = idx.substr(1);
			if(idx.indexOf(",") !== -1){
				Feng.info("请选择单条数据！");
				return false;
			}
			var index = layer.open({type: 2,title: '查看数据',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/FormData/view/extend_id/<?php echo $extend_id; ?>/data_id/'+idx});
			this.layerIndex = index;
		}
		
	}


	CodeGoods.delete = function (value) {
		if(value){
			Feng.confirm("是否删除选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/FormData/delete", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('data_ids', value);
				ajax.set('extend_id', '<?php echo $extend_id; ?>');
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = '';

				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.data_id;
				});

				idx = idx.substr(1);
				Feng.confirm("是否删除选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/FormData/delete", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg);
						}
					});
					ajax.set('data_ids', idx);
					ajax.set('extend_id', '<?php echo $extend_id; ?>');
					ajax.start();
				});
			}
		}
	}
	
	CodeGoods.importData = function (value) {
		var index = layer.open({type: 2,title: '数据导入',area: ['500px', '300px'],fix: false, maxmin: true,content: Feng.ctxPath + '/FormData/importData?extend_id=<?php echo $extend_id; ?>'});
		this.layerIndex = index;
	}
	
	CodeGoods.dumpData = function (value) {
		Feng.confirm("是否确定导出记录?", function() {
			var index = layer.msg('正在导出下载，请耐心等待...', {
				time : 3600000,
				icon : 16,
				shade : 0.01
			});
			var queryData = CodeGoods.formParams();
			window.location.href = Feng.ctxPath + '/FormData/dumpData?extend_id=<?php echo $extend_id; ?>&' + Feng.parseParam(queryData);
			setTimeout(function() {
				layer.close(index)
			}, 1000);
		});
	}


	CodeGoods.search = function() {
		CodeGoods.table.refresh({query : CodeGoods.formParams()});
	};

	$(function() {
		var defaultColunms = CodeGoods.initColumn();
		var url = location.search;
		var table = new BSTable(CodeGoods.id, Feng.ctxPath+"/FormData/index/extend_id/<?php echo $extend_id; ?>"+url,defaultColunms,20);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
</script>

    </div>
    <script src="__PUBLIC__/static/js/content.js?v=1.0.0"></script>
    
</body>

</html>