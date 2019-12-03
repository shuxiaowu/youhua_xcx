<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"/www/web/edg_leteng_net/public_html/../app/admin/view/goods/index.html";i:1572882536;s:61:"/www/web/edg_leteng_net/app/admin/view/common/_container.html";i:1571731694;}*/ ?>
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
				<h5>积分管理</h5>
				<button style="float:right; margin-top:-10px;" title="刷新页面" type="button"
					class="btn btn-default btn-outline" onclick="window.location.reload()" id="">
					<i class="fa fa-refresh"></i>
				</button>
			</div>
			<div class="ibox-content">
				<div class="row row-lg">
					<div class="col-sm-12">
						<div class="row" id="searchGroup">
							<!-- search start -->
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle"
											type="button">商品名称</button>
									</div>
									<input type="text" class="form-control" id="goods_name" placeholder="商品名称" />
								</div>
							</div>
							<!-- <div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle"
											type="button">邮箱</button>
									</div>
									<input type="text" class="form-control" id="email" placeholder="邮箱" />
								</div>
							</div> -->
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle"
											type="button">状态</button>
									</div>
									<select class="form-control" id="status">
										<option value="">请选择</option>
										<option value="10">上架</option>
										<option value="0">下架</option>
									</select>
								</div>
							</div>
						</div>
						<script src="__PUBLIC__/static/js/plugins/shengshiqu/distpicker.data.js"></script>
						<script src="__PUBLIC__/static/js/plugins/shengshiqu/distpicker.js"></script>
						<script src="__PUBLIC__/static/js/plugins/shengshiqu/main.js"></script>
						<!-- search end -->
						<div class="col-sm-2">
							<button type="button" class="btn btn-primary " onclick="CodeGoods.search()" id="">
								<i class="fa fa-search"></i>&nbsp;搜索
							</button>
						</div>
					</div>
					<div id="CodeGoodsTableToolbar" role="group">
						<?php if(in_array('/admin/Goods/add',session('admin.nodes')) ||
						session('admin.role') == 1): ?>
						<button type="button" id="add" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
							<i class="fa fa-plus"></i>&nbsp;添加
						</button>
						<?php endif; if(in_array('/admin/Goods/update',session('admin.nodes')) ||
						session('admin.role') == 1): ?>
						<button type="button" id="update" class="btn btn-primary button-margin"
							onclick="CodeGoods.update()">
							<i class="fa fa-edit"></i>&nbsp;修改
						</button>
						<?php endif; if(in_array('/admin/Goods/delete',session('admin.nodes')) ||
						session('admin.role') == 1): ?>
						<button type="button" id="delete" class="btn btn-danger button-margin"
							onclick="CodeGoods.delete()">
							<i class="fa fa-trash"></i>&nbsp;删除
						</button>
						<?php endif; if(in_array('/admin/Goods/forbidden',session('admin.nodes')) ||
						session('admin.role') == 1): ?>
						<button type="button" id="forbidden" class="btn btn-primary button-margin"
							onclick="CodeGoods.forbidden('status|0')">
							<i class="fa fa-edit"></i>&nbsp;下架
						</button>
						<?php endif; if(in_array('/admin/Goods/start',session('admin.nodes')) ||
						session('admin.role') == 1): ?>
						<button type="button" id="start" class="btn btn-primary button-margin"
							onclick="CodeGoods.start('status|10')">
							<i class="fa fa-pencil"></i>&nbsp;上架
						</button>
						<?php endif; if(in_array('/admin/Goods/viewMember',session('admin.nodes')) ||
						session('admin.role') == 1): ?>
						<button type="button" id="viewMember" class="btn btn-primary button-margin"
							onclick="CodeGoods.viewMember()">
							<i class="fa fa-plus"></i>&nbsp;查看数据
						</button>
						<?php endif; ?>
					</div>
					<table id="CodeGoodsTable" data-mobile-responsive="true" data-click-to-select="true">
						<thead>
							<tr>
								<th data-field="selectItem" data-checkbox="true"></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	var CodeGoods = { id: "CodeGoodsTable", seItem: null, table: null, layerIndex: -1 };
	CodeGoods.initColumn = function () {
		return [
			{ field: 'selectItem', checkbox: true },
			// { title: '编号', field: 'm_id', visible: false, align: 'center', valign: 'middle' },
			{ title: '名称', field: 'name', visible: true, align: 'center', valign: 'middle' },
			{ title: '图片', field: 'headimgurl', visible: true, align: 'center', valign: 'middle', formatter: 'CodeGoods.headimgurlFormatter' },
			{ title: '售价', field: 'price', visible: true, align: 'center', valign: 'middle', formatter: 'CodeGoods.amountFormatter' },
			{ title: '定价', field: 'amount', visible: true, align: 'center', valign: 'middle', formatter: 'CodeGoods.amountFormatter' },
			// { title: '邮箱', field: 'email', visible: false, align: 'center', valign: 'middle' },

			{ title: '状态', field: 'status', visible: true, align: 'center', valign: 'middle', formatter: 'CodeGoods.statusFormatter' },
			{ title: '创建时间', field: 'create_time', visible: true, align: 'center', valign: 'middle', formatter: 'CodeGoods.create_timeFormatter' },
			{ title: '操作', field: 'm_id', visible: true, align: 'center', valign: 'middle', formatter: 'CodeGoods.buttonFormatter' },
		];
	};

	CodeGoods.buttonFormatter = function (value, row, index) {
		if (value) {
			var str = '';
			str += '<button type="button" class="btn btn-primary btn-xs" title="修改"  onclick="CodeGoods.update(' + value + ')"><i class="fa fa-edit"></i></button>&nbsp;'
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete(' + value + ')"><i class="fa fa-trash"></i></button>&nbsp;'
			return str;
		}
	}

	CodeGoods.headimgurlFormatter = function (value, row, index) {
		if (value) {
			return "<a href=" + value + " target='_blank'><img height='100' src=" + value + " <?php echo hook('view_big_pic',['type'=>1]); ?>></a>";
		}
	}

	CodeGoods.statusFormatter = function (value, row, index) {
		if (value !== null) {
			var value = value.toString();
			switch (value) {
				case '10':
					return '<span class="label label-primary">上架</span>';
					break;
				case '0':
					return '<span class="label label-danger">下架</span>';
					break;
			}
		}
	}

	CodeGoods.create_timeFormatter = function (value, row, index) {
		if (value) {
			return formatDateTime(value);
		}
	}

	CodeGoods.amountFormatter = function (value, row, index) {
		if (value) {
			return '<span class="label label-success">' + value + '</span>';
		}
	}

	CodeGoods.threeAreaFormatter = function (value, row, index) {
		var areaStr = '';
		if (row.province) {
			areaStr += "-" + row.province;
		}
		if (row.city) {
			areaStr += "-" + row.city;
		}
		if (row.district) {
			areaStr += "-" + row.district;
		}
		areaStr = areaStr.substr(1);
		return areaStr;
	}


	CodeGoods.check = function () {
		var selected = $('#' + this.id).bootstrapTable('getSelections');
		if (selected.length == 0) {
			Feng.info("请先选中表格中的某一记录！");
			return false;
		} else {
			CodeGoods.seItem = selected;
			return true;
		}
	};

	CodeGoods.add = function (value) {
		var url = location.search;
		var index = layer.open({ type: 2, title: '创建数据', area: ['800px', '100%'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/add' + url });
		this.layerIndex = index;
	}


	CodeGoods.update = function (value) {
		if (value) {
			var index = layer.open({ type: 2, title: '编辑数据', area: ['800px', '100%'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/update/m_id/' + value });
		} else {
			if (this.check()) {
				var idx = '';

				$.each(CodeGoods.seItem, function () {
					idx += ',' + this.m_id;
				});

				idx = idx.substr(1);
				if (idx.indexOf(",") !== -1) {
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({ type: 2, title: '编辑数据', area: ['800px', '100%'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/update/m_id/' + idx });
				this.layerIndex = index;
			}
		}
	}


	CodeGoods.recharge = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			var index = layer.open({ type: 2, title: '数值加', area: ['600px', '300px'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/recharge/m_id/' + idx });
			this.layerIndex = index;
		}
	}


	CodeGoods.backRecharge = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			if (idx.indexOf(",") !== -1) {
				Feng.info("请选择单条数据！");
				return false;
			}
			var index = layer.open({ type: 2, title: '数值减', area: ['600px', '250px'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/backRecharge/m_id/' + idx });
			this.layerIndex = index;
		}
	}


	CodeGoods.delete = function (value) {
		if (value) {
			Feng.confirm("是否删除选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Goods/delete", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('m_ids', value);
				ajax.start();
			});
		} else {
			if (this.check()) {
				var idx = '';

				$.each(CodeGoods.seItem, function () {
					idx += ',' + this.m_id;
				});

				idx = idx.substr(1);
				Feng.confirm("是否删除选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/Goods/delete", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg);
						}
					});
					ajax.set('m_ids', idx);
					ajax.start();
				});
			}
		}
	}


	CodeGoods.forbidden = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			Feng.confirm("是否禁用选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Goods/forbidden", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('m_ids', idx);
				ajax.set('statusData', value);
				ajax.start();
			});
		}
	}


	CodeGoods.start = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			Feng.confirm("是否启用选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/Goods/start", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('m_ids', idx);
				ajax.set('statusData', value);
				ajax.start();
			});
		}
	}


	CodeGoods.dumpData = function (value) {
		Feng.confirm("是否确定导出记录?", function () {
			var index = layer.msg('正在导出下载，请耐心等待...', {
				time: 3600000,
				icon: 16,
				shade: 0.01
			});
			var queryData = CodeGoods.formParams();
			queryData['orderby'] = $("#orderby").val();
			window.location.href = Feng.ctxPath + '/Goods/dumpData?action_id=215&' + Feng.parseParam(queryData);
			setTimeout(function () {
				layer.close(index)
			}, 1000);
		});
	}


	CodeGoods.importData = function (value) {
		var index = layer.open({ type: 2, title: '数据导入', area: ['500px', '300px'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/importData' });
		this.layerIndex = index;
	}


	CodeGoods.updatePassword = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			if (idx.indexOf(",") !== -1) {
				Feng.info("请选择单条数据！");
				return false;
			}
			var index = layer.open({ type: 2, title: '修改密码', area: ['600px', '300px'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/updatePassword/m_id/' + idx });
			this.layerIndex = index;
		}
	}


	CodeGoods.batchUpdate = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			var index = layer.open({ type: 2, title: '批量编辑数据', area: ['800px', '300px'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/batchUpdate/m_id/' + idx });
			this.layerIndex = index;
		}
	}


	CodeGoods.carList = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			if (idx.indexOf(",") !== -1) {
				Feng.info("请选择单条数据！");
				return false;
			}
			var index = layer.open({ type: 2, title: '弹窗连接', area: ['600px', '450px'], fix: false, maxmin: true, content: Feng.ctxPath + '/Car/index/?m_id=' + idx });
			this.layerIndex = index;
		}
	}


	CodeGoods.viewMember = function (value) {
		if (this.check()) {
			var idx = '';

			$.each(CodeGoods.seItem, function () {
				idx += ',' + this.m_id;
			});

			idx = idx.substr(1);
			var index = layer.open({ type: 2, title: '查看数据', area: ['800px', '100%'], fix: false, maxmin: true, content: Feng.ctxPath + '/Goods/viewMember/m_id/' + idx });
			this.layerIndex = index;
		}
	}

	CodeGoods.formParams = function () {
		var queryData = {};
		queryData['goods_name'] = $("#goods_name").val();
		queryData['status'] = $("#status").val();

		return queryData;
	}

	CodeGoods.search = function () {
		CodeGoods.table.refresh({ query: CodeGoods.formParams() });
		console.log(CodeGoods.formParams());
	};

	CodeGoods.orderby = function () {
		var queryData = CodeGoods.formParams();
		queryData['orderby'] = $("#orderby").val();
		CodeGoods.table.refresh({ query: queryData });
	};

	$(function () {
		var defaultColunms = CodeGoods.initColumn();
		var url = location.search;
		var table = new BSTable(CodeGoods.id, Feng.ctxPath + "/Goods/index" + url, defaultColunms, 20);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();

	});
</script>

    </div>
    <script src="__PUBLIC__/static/js/content.js?v=1.0.0"></script>
    
</body>

</html>