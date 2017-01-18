<?php

/**
 * Created by PhpStorm.
 * User: xiaomin
 * Date: 16-11-21
 * Time: 下午3:40
 */
class IndexAction extends Action {
    public function index(){
        $this->display();
    }
    //添加预约信息
    public function addRepair(){
        if (!IS_AJAX){E("页面不存在");}
        $link = I("post.link","","int");
        $name = I("post.name");
        $desc = I('post.desc');
        $time = strtotime(I('post.time'));
        $dept = I('post.dept');
        $status = 0;
        if(empty($link) || empty($name) || empty($desc) || empty($time) || empty($dept)){
            //有空值，什么都不做
        }else{
            $data = array(
                'link' => $link,
                'name' => $name,
                'desc' => $desc,
                'time' => $time,
                'dept' => $dept,
                'submit' => time()
            );
            $field = array('link','name','desc','time','dept','submit');
            $db = M('repair')->field($field)->add($data);
            $status = $db ? 1 : 0;
        }
        $this->ajaxReturn($status);
    }
}