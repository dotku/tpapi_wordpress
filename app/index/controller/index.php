<?php
namespace index\controller;

class Index 
{
    public function index()
    {
        $view = new \Think\View();
        return $view->fetch();
    }
    public function test() 
    {
        // 实例化视图类
        $view = new \Think\View();
        // 渲染模板输出
        return $view->fetch();
    }
    public function getBlog() {
        $model = D('posts');
        $output['data'] = $model->select();
        //var_dump($output['data']);
        foreach ($output['data'] as $key =>$val) {
            $output['data'][$key]['post_content'] = nl2br($val['post_content']);
        }
        
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
    }
}