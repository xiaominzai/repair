<?php
/**
 * Created by PhpStorm.
 * User: xiaomin
 * Date: 16-11-1
 * Time: 下午7:07
 */
Class IndexAction extends CommonAction    {
    //显示所有未处理
    public function index(){
        $user = M('repair');
        $count = $user->where(array('handle' => 0,'del' => 0))->count();

        import('ORG.Util.Page');// 导入分页类
        $show = new Page($count,15);
        $show->setConfig('next','下一页');
        $show->setConfig('first',"首页");
        $show->setConfig('prev',"上一页");
        $this->page = $show->show();
        $this->list = $user->order("id desc")->field("submit,desc",true)->where(array('handle' => 0,'del' => 0))->limit($show->firstRow.','.$show->listRows)->select();

        //读取权限，显示节点
        $id = session("uid");
        $where = array($id,1);
        $power = M('user')->field("power,id")->where("id='%d' and power='%d'",$where)->select();
        $this->assign("power",$power[0]["power"]);

        $this->display();
    }
    //显示所有的维修记录
    public function allRepair(){
        $user = M('repair');
        $count = $user->where("del=0")->count();
        import('ORG.Util.Page');// 导入分页类
        $show = new Page($count,15);
        $show->setConfig('next','下一页');
        $show->setConfig('first',"首页");
        $show->setConfig('prev',"上一页");
        $page = $show->show();
        $list = $user->order("id desc")->where("del=0")->field("desc,submit",true)->limit($show->firstRow.','.$show->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page);

        //读取权限，显示节点
        $id = session("uid");
        $where = array($id, 1);
        $power = M('user')->field("power,id")->where("id='%d' and power='%d'",$where)->select();
        $this->assign("power",$power[0]["power"]);

        $this->display('index');
    }
    //所有修理好的
    public function haveRepair(){
        $user = M('repair');
        $where = array(
            'del' => 0,
            'handle'=>1
        );
        $count = $user->where($where)->count();
        import('ORG.Util.Page');// 导入分页类
        $show = new Page($count,15);
        $show->setConfig("next","下一页");
        $show->setConfig('first',"首页");
        $show->setConfig('prev','上一页');
        $page = $show->show();
        $list = $user->where($where)->order("id desc")->field("desc,submit",true)->limit($show->firstRow.','.$show->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page);

        //读取权限，显示节点
        $id = session("uid");
        $where = array($id,1);
        $power = M('user')->field("power,id")->where("id='%d' and power='%d'",$where)->select();
        $this->assign("power",$power[0]["power"]);

        $this->display('index');
    }
    //显示详情
    public function detail(){
        $id = I('id');
        $field = array('name','link','time','dept','desc','submit');
        $this->list = M('repair')->field($field)->where("id='%d'",$id)->select();
        $this->display();
    }

    //修改处理
    public function handle(){
        if(!IS_AJAX){E("页面不存在");}
        $id = I('id');
        $handle = I('handle');
        $db = M('repair')->where("id='%d'",array($id));
        $msg = null;
        $admin = session("desc");
        switch ($handle){
            case 0:
                $data = array(
                    'handle' => 1,
                    'admin' => $admin
                );
                $res = $db->setField($data);
                $msg = $res ? "未处理" : 0;
                break;
            case 1:
                $data = array(
                    'handle' => 0,
                    'admin' => $admin
                );
                $res = $db->setField($data);
                $msg = $res ? "处理中" : 0;
                break;
            default:
                break;
        }
        $resule = array(
            'handle' => 'handle',
            'msg' => $msg,
            'admin'=> $admin
        );
        $this->ajaxReturn($resule);
    }
    public function trash(){
        $user = M('repair');
        $count = $user->where("del=1")->count();
        import('ORG.Util.Page');// 导入分页类
        $show = new Page($count,15);
        $show->setConfig('next','下一页');
        $show->setConfig('first',"第一页");
        $show->setConfig('prev',"上一页");
        $this->page = $show->show();
        $this->list = M('repair')->field('desc,submit',true)->where('del=1')->select();

        //读取权限，显示节点
        $id = session("uid");
        $where = array($id,1);
        $power = M('user')->field("power,id")->where("id='%d' and power='%d'",$where)->select();
        $this->assign("power",$power[0]["power"]);

        $this->display();
    }
    //删除预约信息
    public function del(){
        if(!IS_AJAX){E("页面不存在");}
        $id = I('post.id');
        $res = M('repair')->where("id='%d'",array($id))->setField("del","1");
        $status =  $res ? 1 : 0;
        $msg = $res ? "删除成功" : "删除错误";
        $result = array(
            'status' => $status,
            'msg' => $msg
        );
        $this->ajaxReturn($result);
    }
    //删除回收站的信息
    public function deltrash(){
        if (!IS_AJAX){E('页面不存在');}
        $id = I("post.id");
        $res = M('repair')->where("id='%d'",array($id))->delete();
        $msg = $res ? "删除成功" : "删除失败";
        $status = $res ? 1 : 0;
        $result = array(
            'status' => $status,
            'msg' => $msg
        );
        $this->ajaxReturn($result);
    }
    //清空回收站
    public function delAlltarsh(){
        if(!IS_AJAX){E("页面不存在");}
        $res = M('repair')->where("del=1")->delete();
        $status = $res ? 1 : 0;
        $msg = $status ? "成功删除" : "删除失败";
        $result = array(
            "status" => $status,
            "msg" => $msg
        );
        $this->ajaxReturn($result);
    }

    //恢复某项
    public function resTrash(){
        if (!IS_AJAX){E('页面不存在');}
        $id = I("post.id");
        $res = M("repair")->where("id='%d'",array($id))->setField("del",0);
        $status = $res ? 1 : 0;
        $this->ajaxReturn($status);
    }


    //退出登录
    public function loginout(){
        session_unset();
        session_destroy();
        $result = "{:U(GROUP_NAME.'/Login/index')}";
        $this->ajaxReturn($result);
    }
}