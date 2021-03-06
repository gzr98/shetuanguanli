<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/shetuanguanli/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/shetuanguanli/Public/css/style.css"/>       
        <link href="/shetuanguanli/Public/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/shetuanguanli/Public/assets/css/ace-ie.min.css" />
		<![endif]-->
			<script src="/shetuanguanli/Public/assets/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/shetuanguanli/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/shetuanguanli/Public/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/shetuanguanli/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/shetuanguanli/Public/assets/js/bootstrap.min.js"></script>
		<script src="/shetuanguanli/Public/assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="/shetuanguanli/Public/assets/js/jquery.dataTables.min.js"></script>
		<script src="/shetuanguanli/Public/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="/shetuanguanli/Public/js/H-ui.js"></script> 
        <script type="text/javascript" src="/shetuanguanli/Public/js/H-ui.admin.js"></script> 
        <script src="/shetuanguanli/Public/assets/layer/layer.js" type="text/javascript" ></script>
        <script src="/shetuanguanli/Public/assets/laydate/laydate.js" type="text/javascript"></script>
<title>专业列表</title>
</head>

<body>
<div class="page-content clearfix">
    <div id="Member_Ratings">
        <div class="d_Confirm_Order_style">
            <div class="search_style">
            </div>
            <!---->
            <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:void()" id="member_add" class="btn btn-warning"><i class="icon-plus"></i>添加专业</a>
       </span>
                <span class="r_f">共：<b><?php echo ($count); ?></b>条</span>
            </div>
            <!---->
            <div class="table_menu_list">
                <table class="table table-striped table-bordered table-hover" id="sample-table">
                    <thead>
                    <tr>
                        <th width="10">序号</th>
                        <th width="100">专业名称</th>
                        <th width="70">状态</th>
                        <th width="250">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                            <td><?php echo ($key+1); ?></td>
                            <td><?php echo ($vo["major_name"]); ?></td>
                            <?php if(($vo["state"] == 0) ): ?><td class="td-status"><span class="label label-success radius">已启用</span></td>
                                <?php elseif(($vo["state"] == 1)): ?>
                                <td class="td-status"><span class="label label-defaunt radius">已停用</span></td>
                                <?php else: ?>
                                <td class="td-status"><span class="label label-defaunt radius"></span></td><?php endif; ?>

                            <td class="td-manage">

                                <?php if(($vo["state"] == 0) ): ?><a onClick="member_stop(this,<?php echo ($vo["id"]); ?>)" href="javascript:;" title="停用"
                                       class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
                                    <?php elseif(($vo["state"] == 1)): ?>
                                    <a onClick="member_start(this,<?php echo ($vo["id"]); ?>)" href="javascript:;" title="启用"
                                       class="btn btn-xs"><i class="icon-ok bigger-120"></i></a>
                                    <?php else: ?>
                            <td class="td-status"><span class="label label-defaunt radius"></span></td><?php endif; ?>

                            <a title="编辑" onclick="member_edit('<?php echo ($vo["major_name"]); ?>','<?php echo ($vo["state"]); ?>','<?php echo ($vo["id"]); ?>')"
                               href="javascript:;" class="btn btn-xs btn-info"><i class="icon-edit bigger-120"></i></a>
                            <a title="删除" href="javascript:;" onclick="member_del(this,<?php echo ($vo["id"]); ?>)"
                               class="btn btn-xs btn-warning"><i class="icon-trash  bigger-120"></i></a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--添加用户图层-->
<div class="add_menber" id="add_menber_style" style="display:none">

    <ul class=" page-content">
        <li><label class="label_name">专业名称：</label><span class="add_name"><input value="" name="major_name"
                                                                                 type="text" class="text_add"/></span>
            <div class="prompt r_f"></div>
        </li>
        <li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态：</label><span class="add_name">
     <label><input name="state" type="radio" value="0" checked="checked" class="ace"><span class="lbl">正常</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="state" type="radio" value="1" class="ace"><span class="lbl">冻结</span></label>&nbsp;&nbsp;&nbsp;
     </span>
            <div class="prompt r_f"></div>
        </li>
    </ul>
</div>

<!-- 修改专业信息 -->
<div class="exit_menber" id="exit_menber_style" style="display:none">
    <input type="hidden" name="exitid" id="exitId">
    <ul class=" page-content">
        <li><label class="label_name">专业名称：</label><span class="add_name"><input id="exitmajor_name"
                                                                                 name="major_name" type="text"
                                                                                 class="text_add"/></span>
            <div class="prompt r_f"></div>
        </li>
        <li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态：</label><span class="add_name">
     <label><input name="exitstate" type="radio" value="0" id="state0" class="ace"><span class="lbl">正常</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="exitstate" type="radio" value="1" id="state1" class="ace"><span class="lbl">冻结</span></label>&nbsp;&nbsp;&nbsp;
     </span>
            <div class="prompt r_f"></div>
        </li>
    </ul>
</div>

</body>
</html>
<script>
    jQuery(function ($) {
        var oTable1 = $('#sample-table').dataTable({
            "aaSorting": [[1, "desc"]],//默认第几个排序
            "bStateSave": true,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable": false, "aTargets": [0, 8, 9]}// 制定列不参与排序
            ]
        });


        $('table th input:checkbox').on('click', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });


        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }
    })
    /*专业-添加*/
    $('#member_add').on('click', function () {
        layer.open({
            type: 1,
            title: '添加专业',
            maxmin: true,
            shadeClose: true, //点击遮罩关闭层
            area: ['800px', ''],
            content: $('#add_menber_style'),
            btn: ['提交', '取消'],
            yes: function (index, layero) {
                var num = 0;
                var str = "";
                $(".add_menber input[type$='text']").each(function (n) {
                    if ($(this).val() == "") {

                        layer.alert(str += "" + $(this).attr("name") + "不能为空！\r\n", {
                            title: '提示框',
                            icon: 0,
                        });
                        num++;
                        return false;
                    }
                });

                var major_name = $(".add_menber input[type$='text']").val();
                var state = $('input[name="state"]:checked').val()
                console.log(major_name+"--------------------"+state);
                var addDat = {'major_name': major_name, 'state': state};
                ////////////////
                $.ajax({
                    url: "<?php echo U('Admin/Index/addMajor');?>",//请求地址
                    data: addDat,//发送的数据
                    type: 'POST',//请求的方式
                    success: function (argument) {
                        console.log(argument);
                        if (num > 0) {
                            return false;
                        } else {
                            layer.alert('添加成功！', {
                                title: '提示框',
                                icon: 1,
                                end: function () {
                                    window.location.reload();
                                }
                            });
                            layer.close(index);

                        }
                    },// 请求成功执行的方法
                    beforeSend: function (argument) {
                    },// 在发送请求之前调用,可以做一些验证之类的处理
                    error: function (argument) {
                        console.log(argument);
                    },//请求失败调用
                })
                ////////////////////////

            }
        });
    });

    /*改变专业的状态*/
    function updateState(id, state) {
        var data = {"id": id, "state": state};
        $.ajax({
            url: "<?php echo U('Admin/Index/updateMajorState');?>",//请求地址
            data: data,//发送的数据
            type: 'POST',//请求的方式
            success: function (argument) {
                console.log(argument);
            },// 请求成功执行的方法
            beforeSend: function (argument) {
            },// 在发送请求之前调用,可以做一些验证之类的处理
            error: function (argument) {
                console.log(argument);
            },//请求失败调用
        });
    }

    /*专业-查看*/
    function member_show(title, url, id, w, h) {
        layer_show(title, url + '#?=' + id, w, h);
    }

    /*用户-停用*/
    function member_stop(obj, id) {
        layer.confirm('确认要停用吗？', function (index) {
            console.log(index + "=====" + id);
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');

            var f = updateState(id, 1);
            console.log(f);

            $(obj).remove();
            layer.msg('已停用!', {icon: 5, time: 1000});
        });
    }

    /*用户-启用*/
    function member_start(obj, id) {
        layer.confirm('确认要启用吗？', function (index) {
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
            $(obj).remove();
            var f = updateState(id, 0);

            layer.msg('已启用!', {icon: 6, time: 1000});
        });
    }

    /*用户-编辑*/
    function member_edit(major_name, state, id) {
        layer.open({
            type: 1,
            title: '修改专业信息',
            maxmin: true,
            shadeClose: false, //点击遮罩关闭层
            area: ['800px', ''],
            content: $('#exit_menber_style'),
            btn: ['提交', '取消'],
            yes: function (index, layero) {
                var id = $('#exitId').val();
                var major_name = $('#exitmajor_name').val();
                var state = $('input[name="exitstate"]:checked').val();
                var data = {"id": id, "major_name": major_name, "state": state};
                console.log(data);
                exitmajor(data);
                var num = 0;
                var str = "";
                $(".exit_menber input[type$='text']").each(function (n) {

                    if ($(this).val() == "") {

                        layer.alert(str += "" + $(this).attr("name") + "不能为空！\r\n", {
                            title: '提示框',
                            icon: 0,
                        });
                        num++;
                        return false;
                    }
                });
                if (num > 0) {
                    return false;
                } else {
                    layer.alert('修改成功！', {
                        title: '提示框',
                        icon: 1,
                        end: function () {
                            window.location.reload()
                        }
                    });
                    layer.close(index);
                }
            },
            success: function (index, layero) {
                console.log("测试该方法的执行位置")
                $("#exitmajor_name").val(major_name);
                if (state == 0) {
                    $("#state0").attr('checked', 'true');
                } else if (state == 1) {
                    $("#state1").attr('checked', 'true');
                }
                $("#exitId").val(id);

            }
        });
    }

    /*提交修改数据*/
    function exitmajor(data) {
        $.ajax({
            url: "<?php echo U('Admin/Index/exitMajor');?>",//请求地址
            data: data,//发送的数据
            type: 'POST',//请求的方式
            success: function (argument) {
                console.log(argument)
            },// 请求成功执行的方法
            beforeSend: function (argument) {
                //console.log(argument);
            },// 在发送请求之前调用,可以做一些验证之类的处理
            error: function (argument) {
            },//请求失败调用
        })
    }

    /*用户-删除*/
    function member_del(obj, id) {
        console.log(id);
        var data = {"id": id};
        $.ajax({
            url: "<?php echo U('Admin/Index/delMajor');?>",//请求地址
            data: data,//发送的数据
            type: 'POST',//请求的方式
            success: function (argument) {
                console.log(argument)
                layer.confirm('确认要删除吗？', function (index) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!', {icon: 1, time: 1000});
                });
            },// 请求成功执行的方法
            beforeSend: function (argument) {
                //console.log(argument);
            },// 在发送请求之前调用,可以做一些验证之类的处理
            error: function (argument) {
            },//请求失败调用
        })

    }

    laydate({
        elem: '#start',
        event: 'focus'
    });

</script>