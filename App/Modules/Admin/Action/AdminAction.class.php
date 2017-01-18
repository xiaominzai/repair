<?php
/**
 * Created by PhpStorm.
 * User: xiaomin
 * Date: 16-11-9
 * Time: 下午10:13
 */
class AdminAction extends CommonAction  {
    //显示用户列表
    public function index(){
        //读取权限，显示节点
        $username = session("uid");
        $where = array(
            "id"=> $username,
            "power"=> 1
        );
        $power = M('user')->field("power,id")->where($where)->select();
        $this->assign("power",$power[0]["power"]);

        //分页显示
        import('ORG.Util.Page');// 导入分页类
        $id = session('uid');//不能更改自己
        $user = M('user');
        $count = $user->count();
        $show = new Page($count,16);
        $show->setConfig('next','下一页');
        $show->setConfig('first',"第一页");
        $show->setConfig('prev',"上一页");
        $this->list = M('user')->where("id!=$id")->field("psssword",true)->limit($show->firstRow.','.$show->listRows)->select();
        $this->page = $show->show();

        $this->display();
    }
    //添加用户
    public function addAdmin(){
        if (!IS_AJAX) {E("页面不存在");}
        $data = array(
            "username"=> I("post.username"),
            "desc" => I("post.desc"),
            "password"=> I("password","","md5"),
            "power" => I("post.power")
        );
        $db = M('user')->field("id,logintime",true)->add($data);
        $status = $db ? 1 : 0;
        $this->ajaxReturn($status);
    }
    public function delAdmin(){
        if(!IS_AJAX){E("页面不存在");}
        $id = I('post.id','',"int");
        $db = M('user')->where("id=$id")->delete();
        $status = $db ? 1 : 0;
        $this->ajaxReturn($status);
    }
}