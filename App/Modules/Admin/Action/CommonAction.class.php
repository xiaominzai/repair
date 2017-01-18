<?php
/**
 * Created by PhpStorm.
 * User: xiaomin
 * Date: 16-11-1
 * Time: 下午8:51
 */
Class CommonAction extends Action  {

    public function _initialize(){
        if (!isset($_SESSION['uid'])){
            $this->redirect(GROUP_NAME.'/Login/index');
        }
    }

}