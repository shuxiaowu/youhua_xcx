<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/web/edg_leteng_net/public_html/../app/admin/view/catagory/index.html";i:1570457892;s:61:"/www/web/edg_leteng_net/app/admin/view/common/_container.html";i:1571731694;}*/ ?>
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
				<h5>分类管理</h5>
				<button style="float:right; margin-top:-10px;" title="刷新页面" type="button" class="btn btn-default btn-outline" onclick="window.location.reload()" id="">
					<i class="fa fa-refresh"></i>
				</button>
			</div>
			<div class="ibox-content">
				<div class="row row-lg">
					<div class="col-sm-12">

						<div id="CodeGoodsTableToolbar" role="group">
							<?php if(in_array('/admin/Catagory/add',session('admin.nodes')) || session('admin.role') == 1): ?>
							<button type="button" id="add" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
								<i class="fa fa-plus"></i>&nbsp;添加
							</button>
							<?php endif; if(in_array('/admin/Catagory/update',session('admin.nodes')) || session('admin.role') == 1): ?>
							<button type="button" id="update" class="btn btn-primary button-margin" onclick="CodeGoods.update()">
								<i class="fa fa-edit"></i>&nbsp;修改
							</button>
							<?php endif; if(in_array('/admin/Catagory/delete',session('admin.nodes')) || session('admin.role') == 1): ?>
							<button type="button" id="delete" class="btn btn-danger button-margin" onclick="CodeGoods.delete()">
								<i class="fa fa-trash"></i>&nbsp;删除
							</button>
							<?php endif; ?>
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

	CodeGoods.initColumn = function () {
 		return [
 			{field: 'selectItem', checkbox: true},
 			{title: '编号', field: 'class_id', visible: true, align: 'center', valign: 'middle'},
			{title: '排序', field: 'class_id', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.arrowFormatter'},
 			{title: '分类名称', field: 'class_name', visible: true, align: 'left', valign: 'middle',formatter: 'CodeGoods.class_nameFormatter'},
 			{title: '栏目属性', field: 'type', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.typeFormatter'},
 			{title: '排序', field: 'sortid', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.sortFormatter'},
			{title: '绑定模型', field: 'extend_name', visible: true, align: 'center', valign: 'middle'},
 			{title: '状态', field: 'status', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.statusFormatter'},
 			{title: '操作', field: 'class_id', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.buttonFormatter'},
 		];
 	};
	
	CodeGoods.arrowFormatter = function(value,row,index) {
		return '<i class="fa fa-long-arrow-up" onclick="CodeGoods.sort('+value+',1)" style="cursor:pointer;" title="上移"></i>&nbsp;<i class="fa fa-long-arrow-down" style="cursor:pointer;" onclick="CodeGoods.sort('+value+',2)"  title="下移"></i>';
	}
	
	CodeGoods.sortFormatter = function(value,row,index) {
		return '<input type="text" value="'+value+'" onblur="CodeGoods.upsort('+row.class_id+',this.value)" style="width:50px; border:1px solid #ddd; text-align:center">';
	}
	
	CodeGoods.class_nameFormatter = function(value,row,index) {
		return "<a style=\"color:#666\" href='"+Feng.ctxPath + '/Content/index?class_id='+row.class_id+"'>"+value+"</a>";
	}

	CodeGoods.buttonFormatter = function(value,row,index) {
		if(value){
			var str= '';
			str += '<button type="button" class="btn btn-primary btn-xs" title="添加子分类"  onclick="CodeGoods.add('+value+')"><i class="fa fa-outdent"></i></button>&nbsp;'
			str += '<button type="button" class="btn btn-primary btn-xs" title="修改"  onclick="CodeGoods.update('+value+')"><i class="fa fa-pencil"></i></button>&nbsp;'
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete('+value+')"><i class="fa fa-trash"></i></button>&nbsp;'
			return str;
		}
	}

	CodeGoods.typeFormatter = function(value,row,index) {
		if(value !== null){
			var value = value.toString();
			switch(value){
				case '1':
					return '<span class="label label-primary">频道</span>';
				break;
				case '2':
					return '<span class="label label-success">列表</span>';
				break;
			}
		}
	}


	CodeGoods.statusFormatter = function(value,row,index) {
		if(value !== null){
			var value = value.toString();
			switch(value){
				case '10':
					return '<span class="label label-primary">正常</span>';
				break;
				case '1':
					return '<span class="label label-danger">禁用</span>';
				break;
			}
		}
	}

	CodeGoods.formParams = function() {
		var queryData = {};
		queryData['pid'] = $("#pid").val();
		queryData['class_name'] = $("#class_name").val();
		queryData['type'] = $("#type").val();
		queryData['status'] = $("#status").val();
		return queryData;
	}

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
		var index = layer.open({type: 2,title: '创建数据',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Catagory/add/class_id/'+value});
		this.layerIndex = index;
	}
	


	CodeGoods.update = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '编辑数据',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Catagory/update/class_id/'+value});
		}else{
			if (this.check()) {
				var idx = '';

				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.class_id;
				});

				idx = idx.substr(1);
				if(idx.indexOf(",") !== -1){
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({type: 2,title: '编辑数据',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Catagory/update/class_id/'+idx});
				this.layerIndex = index;
			}
		}
	}
	
	CodeGoods.upsort = function(class_id,sortid)
    {
		var ajax = new $ax(Feng.ctxPath + "/Catagory/updateSort", function (data) {
			if ('00' === data.status) {
			} else {
				Feng.error(data.msg);
			}
		});
		ajax.set('sortid', sortid);
		ajax.set('class_id', class_id);
		ajax.start();
    }
	
	CodeGoods.sort = function (value,type) {
		var ajax = new $ax(Feng.ctxPath + "/Catagory/setSort", function (data) {
			if ('00' === data.status) {
					Feng.success(data.msg);
					CodeGoods.table.refresh();
			} else {
				Feng.error(data.msg);
			}
		});
		ajax.set('class_id', value);
		ajax.set('type', type);
		ajax.start();
	}


	CodeGoods.delete = function (value) {
		if(value){
			Feng.confirm("是否删除选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Catagory/delete", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('class_ids', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = '';

				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.class_id;
				});

				idx = idx.substr(1);
				Feng.confirm("是否删除选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/Catagory/delete", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg);
						}
					});
					ajax.set('class_ids', idx);
					ajax.start();
				});
			}
		}
	}

	CodeGoods.search = function() {
		CodeGoods.table.refresh({query : CodeGoods.formParams()});
	};

	CodeGoods.orderby = function() {
		var queryData = CodeGoods.formParams();
		queryData['orderby'] = $("#orderby").val();
		CodeGoods.table.refresh({query : queryData});
	};

	$(function() {
		var defaultColunms = CodeGoods.initColumn();
		var url = location.search;
		var table = new BSTable(CodeGoods.id, Feng.ctxPath+"/Catagory/index"+url,defaultColunms,100);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
</script>

    </div>
    <script src="__PUBLIC__/static/js/content.js?v=1.0.0"></script>
    
</body>

</html>