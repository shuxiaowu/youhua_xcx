var CodeInfoDlg = {
	CodeInfoData: {},
	deptZtree: null,
	pNameZtree: null,
	validateFields: {
		username: {
			validators: {
				notEmpty: {
					message: '名称不能为空'
				},
			}
		},
		mobil: {
			validators: {
				regexp: {
					regexp: /^1[34578]\d{9}$/,
					message: '手机号格式错误'
				},
			}
		},
		email: {
			validators: {
				regexp: {
					regexp: /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/,
					message: '邮箱格式错误'
				},
			}
		},
		price: {
			validators: {
				regexp: {
					regexp: /^([0-9][0-9]*)+(.[0-9]{1,2})?$/,
					message: '积分格式错误'
				},
			}
		},
		amount: {
			validators: {
				regexp: {
					regexp: /^([0-9][0-9]*)+(.[0-9]{1,2})?$/,
					message: '积分格式错误'
				},
			}
		},
	}
}


CodeInfoDlg.clearData = function () {
	this.CodeInfoData = {};
};


CodeInfoDlg.set = function (key, val) {
	this.CodeInfoData[key] = (typeof value == "undefined") ? $("#" + key).val() : value;
	return this;
};


CodeInfoDlg.get = function (key) {
	return $("#" + key).val();
};


CodeInfoDlg.close = function () {
	var index = parent.layer.getFrameIndex(window.name);
	parent.layer.close(index);
};


CodeInfoDlg.collectData = function () {
	this.set('m_id').set('name').set('amount').set('price').set('status').set('startTime').set('endTime').set('headimgurl').set('create_time');
};


CodeInfoDlg.add = function () {
	this.clearData();
	this.collectData();
	if (!this.validate()) {
		return;
	}
	var status = $("input[name = 'status']:checked").val();
	var tip = '添加';
	var ajax = new $ax(Feng.ctxPath + "/Goods/add", function (data) {
		if ('00' === data.status) {
			Feng.success(tip + "成功");
			window.parent.CodeGoods.table.refresh();
			CodeInfoDlg.close();
		} else {
			Feng.error(tip + "失败！" + data.msg + "！");
		}
	}, function (data) {
		Feng.error("操作失败!" + data.msg + "!");
	});
	ajax.set('status', status);
	ajax.set(this.CodeInfoData);
	ajax.start();
};


CodeInfoDlg.update = function () {
	this.clearData();
	this.collectData();
	if (!this.validate()) {
		return;
	}
	var sex = $("input[name = 'sex']:checked").val();
	var status = $("input[name = 'status']:checked").val();
	var tip = '修改';
	var ajax = new $ax(Feng.ctxPath + "/Goods/update", function (data) {
		if ('00' === data.status) {
			Feng.success(tip + "成功");
			window.parent.CodeGoods.table.refresh();
			CodeInfoDlg.close();
		} else {
			Feng.error(tip + "失败！" + data.msg + "！");
		}
	}, function (data) {
		Feng.error("操作失败!" + data.responseJSON.message + "!");
	});
	ajax.set('sex', sex);
	ajax.set('status', status);
	ajax.set(this.CodeInfoData);
	ajax.start();
};


CodeInfoDlg.recharge = function () {
	this.clearData();
	this.collectData();
	if (!this.validate()) {
		return;
	}
	var tip = '操作';
	var ajax = new $ax(Feng.ctxPath + "/Goods/recharge", function (data) {
		if ('00' === data.status) {
			Feng.success(tip + "成功");
			window.parent.CodeGoods.table.refresh();
			CodeInfoDlg.close();
		} else {
			Feng.error(tip + "失败！" + data.msg + "！");
		}
	}, function (data) {
		Feng.error("操作失败!" + data.responseJSON.message + "!");
	});
	ajax.set(this.CodeInfoData);
	ajax.start();
};


CodeInfoDlg.backRecharge = function () {
	this.clearData();
	this.collectData();
	if (!this.validate()) {
		return;
	}
	var tip = '操作';
	var ajax = new $ax(Feng.ctxPath + "/Goods/backRecharge", function (data) {
		if ('00' === data.status) {
			Feng.success(tip + "成功");
			window.parent.CodeGoods.table.refresh();
			CodeInfoDlg.close();
		} else {
			Feng.error(tip + "失败！" + data.msg + "！");
		}
	}, function (data) {
		Feng.error("操作失败!" + data.responseJSON.message + "!");
	});
	ajax.set(this.CodeInfoData);
	ajax.start();
};


CodeInfoDlg.updatePassword = function () {
	this.clearData();
	this.collectData();
	if (!this.validate()) {
		return;
	}
	var tip = '操作';
	var ajax = new $ax(Feng.ctxPath + "/Goods/updatePassword", function (data) {
		if ('00' === data.status) {
			Feng.success(tip + "成功");
			window.parent.CodeGoods.table.refresh();
			CodeInfoDlg.close();
		} else {
			Feng.error(tip + "失败！" + data.msg + "！");
		}
	}, function (data) {
		Feng.error("操作失败!" + data.responseJSON.message + "!");
	});
	ajax.set(this.CodeInfoData);
	ajax.start();
};


CodeInfoDlg.batchUpdate = function () {
	this.clearData();
	this.collectData();
	if (!this.validate()) {
		return;
	}
	var sex = $("input[name = 'sex']:checked").val();
	var status = $("input[name = 'status']:checked").val();
	var tip = '修改';
	var ajax = new $ax(Feng.ctxPath + "/Goods/batchUpdate", function (data) {
		if ('00' === data.status) {
			Feng.success(tip + "成功");
			window.parent.CodeGoods.table.refresh();
			CodeInfoDlg.close();
		} else {
			Feng.error(tip + "失败！" + data.msg + "！");
		}
	}, function (data) {
		Feng.error("操作失败!" + data.responseJSON.message + "!");
	});
	ajax.set('sex', sex);
	ajax.set('status', status);
	ajax.set(this.CodeInfoData);
	ajax.start();
};


CodeInfoDlg.validate = function () {
	$('#CodeInfoForm').data("bootstrapValidator").resetForm();
	$('#CodeInfoForm').bootstrapValidator('validate');
	return $("#CodeInfoForm").data('bootstrapValidator').isValid();
};


$(function () {
	Feng.initValidator("CodeInfoForm", CodeInfoDlg.validateFields);
});


