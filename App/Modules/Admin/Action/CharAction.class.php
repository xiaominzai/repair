<?php
/**
 * Created by PhpStorm.
 * User: xiaomin
 * Date: 16-11-16
 * Time: 下午4:08
 */

class CharAction extends CommonAction  {
    //显示图表列表
    public function index(){
        //读取权限，显示节点
        $id = session("uid");
        $where = array($id,1);
        $power = M('user')->field("power,id")->where("id='%d' and power='%d'",$where)->select();
        $this->assign("power",$power[0]["power"]);
        $this->display();
    }

    //异步加载图表信息
    public function showMonth(){
        if(!IS_AJAX){E('页面不存在');}
        //生成x轴数据
        $thismonth = date('m');
        $x = array();
        for($i = 11,$j = 0;$i >= 0;$i--,$j++){
            $tmp = ($thismonth - $i + 12)%12;
            if($tmp == 0){
                $tmp = 12;
                $x[$j] = $tmp.'月';
            }else{
                $x[$j] = $tmp.'月';
            }

        }
        //y轴数组
        $y = array();
        for($i = 11,$j = 0;$i >= 0;$i--,$j++){
            $y[$j] = M('repair')->where("period_diff(date_format(now(),'%Y%m'),from_unixtime(`submit`,'%Y%m')) = $i")->count();
        }
        $result = array(
            'x' => $x,
            'y' => $y
        );
        $this->ajaxReturn($result);
    }
    //显示季度
    public function showQuarter(){
        if (!IS_AJAX)E('页面不存在');
        for($i = 1;$i <= 4;$i++){
            $month[$i-1] = M('repair')->where("QUARTER(from_unixtime(`submit`,'%Y%m%d'))=$i")->count();
        }
        $result = array(
            'x' => array("第一季度","第二季度","第三季度","第四季度"),
            'y' => $month
        );
        $this->ajaxReturn($result);

    }

    //显示宿舍分布
    public function showDept(){
        if (!IS_AJAX) E('页面不存在');

        //遍历生成宿舍数组
        $tmp = M('repair')->distinct(true)->field('dept')->select();
        $name = array();
        foreach ($tmp as $key => $value){
            foreach ($value as $k => $v){
                $name[] = $v;
            }
        }


        //宿舍个数
        $deptcount = count($name);
        //每个宿舍的比例
        $value = array();
        for ($i = 0;$i < $deptcount;$i++){
            $value[] = M('repair')->where("dept='%s'",$name[$i])->count() ;
        }


        //将结果压入返回数组中
        $result = array();
        for ($i = 0;$i < $deptcount;$i++){
            $result[] = array(
                "value" => $value[$i],
                "name" => $name[$i]
            );
        }
        $this->ajaxReturn($result);

    }

    //显示处理人分布
    public function showHandle(){
        //读取所有的管理员
        $admin = M('user')->field("desc")->select();
        $name = array();
        foreach ($admin as $v){
            foreach ($v as $v1){
                $name[] = $v1;
            }
        }


        //查询管理员占的比例
        $admincount = count($name);
        $value = array();
        for ($i = 0;$i < $admincount;$i++){
            $value[] = M('repair')->where(array("handle"=>1,"admin"=>$name[$i]))->count() ;
        }


        //压入结果数组中
        $result = array();
        for ($i = 0;$i < $admincount;$i++){
            $result[] = array(
                "value" => $value[$i],
                "name" => $name[$i]
            );
        }

        $this->ajaxReturn($result);

    }
}