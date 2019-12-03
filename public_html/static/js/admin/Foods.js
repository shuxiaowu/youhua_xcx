var CodeInfoDlg = {
    CodeInfoData: {},
    deptZtree: null,
    pNameZtree: null,
    validateFields: {

        class_id: {
            validators: {
                notEmpty: {
                    message: '所属栏目不能为空'
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
    this.set('content_id').set('protein').set('axunge').set('carbohydrate').set('energy_value').set('weight').set('unit').set('title').set('tag').set('weixin').set('class_name').set('class_id').set('pic').set('content').set('video_url').set('jumpurl').set('create_time').set('keyword').set('description').set('views').set('sortid').set('author');
};

// function arrayToJson(arr) {
//     var res = '{';
//     for (var key in arr) {
//         res += '"' + key + '":"' + arr[key] + '",'
//     }
//     res = res.substr(0, res.lastIndexOf(','));
//     res += '}';
//     return res;
// }
function arrayToJson(o) {
    var r = [];
    if (typeof o == "string") return "\"" + o.replace(/([\'\"\\])/g, "\\$1").replace(/(\n)/g, "\\n").replace(/(\r)/g, "\\r").replace(/(\t)/g, "\\t") + "\"";
    if (typeof o == "object") {
        if (!o.sort) {
            for (var i in o)
                r.push(i + ":" + arrayToJson(o[i]));
            if (!!document.all && !/^\n?function\s*toString\(\)\s*\{\n?\s*\[native code\]\n?\s*\}\n?\s*$/.test(o.toString)) {
                r.push("toString:" + o.toString.toString());
            }
            r = "{" + r.join() + "}";
        } else {
            for (var i = 0; i < o.length; i++) {
                r.push(arrayToJson(o[i]));
            }
            r = "[" + r.join() + "]";
        }
        return r;
    }
    return o.toString();
}
CodeInfoDlg.add = function () {
    this.clearData();
    this.collectData();
    if (!this.validate()) {
        return;
    }
    // var detail = UE.getEditor('detail').getContent();
    var status = $("input[name = 'status']:checked").val();
    // var wlname = $("input[name = 'wlname[]']");
    var wlname = $("option[name = 'wlname[]']");
    var wlvalue = $("input[name = 'wlvalue[]']");
    var wljson = new Array();
    $.each(wlname, function (i, val) {
        var itemname = $(this).val();
        if ($(this).val() != '') {
            $.each(wlvalue, function (j, value) {
                if (i == j) {
                    var arr = new Array(itemname, $(this).val());

                    // console.log(itemname + '-' + $(this).val());
                    wljson.push(arr);
                }

            })
        }

    })
    var tracedata = arrayToJson(wljson);
    // console.log(tracedata);
    var position = '';
    $('input[name="position"]:checked').each(function () {
        position += ',' + $(this).val();
    });
    position = position.substr(1);
    var tip = '添加';
    var ajax = new $ax(Feng.ctxPath + "/Foods/add", function (data) {
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

    // ajax.set('status', status);
    // ajax.set('position', position);
    ajax.set('tracedata', tracedata);
    ajax.set(this.CodeInfoData);

    var entend = new $ax(Feng.ctxPath + "/Foods/getExtends", function (data) {
        var fieldList = data.fieldList;
        for (var p in fieldList) {
            var type = fieldList[p]['type'];
            if (type == 3) {
                ajax.set(fieldList[p]['field'], $("input[name = '" + fieldList[p]['field'] + "']:checked").val());
            } else if (type == 4) {

                var checkData = '';
                $('input[name="' + fieldList[p]['field'] + '"]:checked').each(function () {
                    checkData += ',' + $(this).val();
                });
                checkData = checkData.substr(1);

                ajax.set(fieldList[p]['field'], checkData);
            } else if (type == 16) {
                ajax.set(fieldList[p]['field'], UE.getEditor('' + fieldList[p]['field'] + '').getContent());
            } else {
                ajax.set(fieldList[p]['field'], $("#" + fieldList[p]['field']).val());
            }
        }

    });
    entend.set('class_id', $("#class_id option:selected").val());
    entend.start();

    ajax.start();
};




CodeInfoDlg.update = function () {
    this.clearData();
    this.collectData();
    if (!this.validate()) {
        return;
    }
    // var detail = UE.getEditor('detail').getContent();
    var status = $("input[name = 'status']:checked").val();
    // var wlname = $("input[name = 'wlname[]']");
    var wlname = $("option[name = 'wlname[]']");
    var wlvalue = $("input[name = 'wlvalue[]']");
    var wljson = new Array();
    $.each(wlname, function (i, val) {
        var itemname = $(this).val();
        if ($(this).val() != '') {
            $.each(wlvalue, function (j, value) {
                if (i == j) {
                    var arr = new Array(itemname, $(this).val());

                    // console.log(itemname + '-' + $(this).val());
                    wljson.push(arr);
                }

            })
        }

    })
    var tracedata = arrayToJson(wljson);
    var position = '';
    $('input[name="position"]:checked').each(function () {
        position += ',' + $(this).val();
    });
    position = position.substr(1);
    var tip = '修改';
    var ajax = new $ax(Feng.ctxPath + "/Foods/update", function (data) {
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


    ajax.set('status', status);
    // ajax.set('position', position);
    ajax.set('tracedata', tracedata);
    ajax.set(this.CodeInfoData);

    var entend = new $ax(Feng.ctxPath + "/Foods/getExtends", function (data) {
        var fieldList = data.fieldList;
        for (var p in fieldList) {
            var type = fieldList[p]['type'];

            if (type == 3) {
                ajax.set(fieldList[p]['field'], $("input[name = '" + fieldList[p]['field'] + "']:checked").val());
            } else if (type == 4) {
                var checkData = '';
                $('input[name="' + fieldList[p]['field'] + '"]:checked').each(function () {
                    checkData += ',' + $(this).val();
                });
                checkData = checkData.substr(1);

                ajax.set(fieldList[p]['field'], checkData);
            } else if (type == 16) {
                ajax.set(fieldList[p]['field'], UE.getEditor('' + fieldList[p]['field'] + '').getContent());
            } else if (type == 17) {
                var areaaddress = fieldList[p]['field'].split('|');
                for (var i = 0; i < areaaddress.length; i++) {
                    ajax.set(areaaddress[i], $("#" + areaaddress[i]).val());
                }
            } else {
                ajax.set(fieldList[p]['field'], $("#" + fieldList[p]['field']).val());
            }
        }

    });

    entend.set('class_id', $("#class_id option:selected").val());
    entend.start();

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