/**
 * Created by xiaomin on 16-11-1.
 */
function change_code(obj, url) {
    var handleUrl = url + "/";
    $("#code").attr("src", handleUrl + Math.random());
    return false;
}

//查看和处理的修改
function update(id, handle, t, url) {
    var data = {'id': id, 'handle': handle};
    var handleTo = handle ? 0 : 1;
    var newUrl = url;
    layer.load();
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function (result) {
            layer.closeAll();
            if (result.handle == "handle") {
                $(t).parents('tr').find('.handle').html(result.msg);
                $(t).parents('tr').find('.admin').text(result.admin);
                $(t).attr("onclick", "update(" + id + "," + handleTo + "," + "this," + "'" + newUrl + "'" + ")");
                layer.msg("更改成功");
            } else if (result.handle == "check") {
                $(t).html(result.msg);
                $(t).removeAttr("onclick");
                layer.msg("更改成功");
            } else {
                alert('失败');
            }
        }
    })
}
//退出登录
function loginout(url) {
    var load = layer.load();
    $.get(url).done(function (data) {
        layer.close(load);
        layer.msg('退出成功');
        window.location.href = data
    })
}
//弹出详情窗口
function layer1(url) {
    layer.open({
        type: 2,
        title: ['维修详情', true],
        area: ['70%', '90%'],
        content: url
    })
}
//删除预约信息
function del(id, t, url) {
    var data = {'id': id};
    layer.confirm(
        '是否删除？',
        {icon: 3, title: '提示'},
        function (index) {
            layer.load();
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function (result) {
                    layer.closeAll();
                    if (result.status) {
                        layer.close(index);
                        layer.msg("删除成功");
                        $(t).parents("tr").empty();
                    }
                }
            });
        });
}
//恢复回收站
function reTrash(id, t, url) {
    layer.open({
        type: 3
    });
    $.ajax({
        type: "POST",
        data: {"id": id},
        url: url,
        success: function (result) {
            layer.closeAll();
            if (result) {
                $(t).parents("tr").empty();
            }
        }
    })
}

//添加管理员
function addUser(url) {
    layer.open({
        content:"<form method='post'><label>账&nbsp;&nbsp;号：</label><input type='text' name='username' required><br><br> <label >密&nbsp;&nbsp;码：</label> <input type='text' name='password' required> <br> <br> <label >姓&nbsp;&nbsp;名：</label> <input type='text' name='desc' required> <br> <br> <input type='radio' name='power' value='1'>有权限 <input type='radio' name='power' checked='checked' value='0'>没权限",
        btn:['确定','取消'],
        yes:function(index,layero){
            var username = $("input[name=username]").val();
            var password = $("input[name=password]").val();
            var desc = $("input[name=desc]").val();
            var power = $("input[name=power]:checked").val();
            var load = layer.load();
            $.ajax({
                type:'POST',
                url:url,
                data:{"username":username,"password":password,"desc":desc,"power":power},
                success:function (result) {
                    layer.close(load);
                    layer.msg("添加成功");
                    //有空在做填充
                }
            })
        }
    })
}
//删除用户
function delUser(t,id,url) {
    var data = {'id': id};
    layer.confirm(
        '是否删除该管理员？',
        {icon: 3, title: '警告'},
        function (index) {
            layer.open({
                type: 3
            });
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function (result) {
                    layer.closeAll();
                    if (result) {
                        //关闭加载层
                        layer.close(index);
                        if(result){
                            layer.msg("删除成功");
                            $(t).parents("tr").empty();
                        }
                    }
                }
            });
        });
}