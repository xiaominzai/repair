<?php

/**
 * Created by PhpStorm.
 * User: xiaomin
 * Date: 16-11-25
 * Time: 下午4:41
 */
class FieldAction extends CommonAction {
    public function index(){
        $list = M("download")->field("id",true)->select();
        p($list);
        $this->display();
    }
    //上传映像文件
    public function upload(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->autoSub = true;
        $upload->subType = "date";
        $upload->dateFormat = 'Y-m';
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Uploads/';// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            $result = array(
                "status" => "0",
                "msg" => $upload->getErrorMsg()
            );
        }else{// 上传成功
            $result = array(
                "status" => "1",
                "msg" => "成功上传"
            );
            $info = $upload->getUploadFileInfo();

            //插入数据库操作
            $data = array(
                "filename" => $info[0]["name"],
                "src" => __ROOT__.ltrim($info[0]["savepath"],".").$info[0]["savename"],
                "creat" => time(),
            );
            $field = array("filename","src","creat");
            M("download")->field($field)->add($data);
        }
        $this->ajaxReturn($result);
    }
    //锁定上传文件
    public function lock(){
        if (!IS_AJAX) $this->error("页面不存在");
        $id = I("post.id");
        $status = M('download')->where("id=%d",$id)->setField("lock",'1');
        $this->ajaxReturn($status);
    }

    //解锁上传文件
    public function unLock(){
        if (!IS_AJAX) $this->error("页面不存在");
        $id = I("post.id");
        $status = M("download")->where("id=%d",$id)->setField("lock","0");
        $this->ajaxReturn($status);
    }

}