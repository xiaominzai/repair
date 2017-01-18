<?php
/**
 * Created by PhpStorm.
 * User: xiaomin
 * Date: 16-11-1
 * Time: 下午7:18
 */
Class LoginAction extends Action {
    public function index(){
        $this->display();
    }

    //登录验证
    public function login(){
        if(!IS_AJAX){E("页面不存在");}
        $db = M('user');
        //为了安全，要加预处理
        $user = $db->where("username='%s'",I('username'))->find();
        //验证的状态
        $username = 1;//默认找出
        $password = 1;

        if (!$user ){
            $username = 0;
        }
        if($user['password'] != I('post.password','','md5')){
            $password = 0;
        }


        if($username){
            session('uid',$user['id']);
            session('username',$user['username']);
            session('desc',$user['desc']);
            M('user')->where("username='%s'",I("username"))->setField("logintime",time());
        }
        $result = array(
            "check_username" => $username,
            "check_password"=> $password,
            "id" => $user['id'],
            'username' => $user['username'],
        );
        $this->ajaxReturn($result);


    }

}