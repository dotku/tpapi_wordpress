<?php
namespace index\controller;

class Index extends \Think\Controller
{
    public function index()
    {
        return $this->fetch();
    }
    
    public function getBlog_bug(){
        $model = D('posts');
        $map_post['post_status'] = 'publish';
        
        // [!] 无法直接查询
        $model->where($map_post)->select();
    }
    
    public function getBlog() {
        $model = D('posts');
        $model_cate_map = D('term_relationships');
        $model_cate = D('terms');
        $output['data'] = $model->where('post_status = "publish"')->select();
        
        foreach ($output['data'] as $key =>$val) {
            $output['data'][$key]['post_content'] = $val['post_content'];
            
            // 获得文章与分类的关系
            $map_cate_map['object_id'] = $val['id'];
            $info_cate_map = $model_cate_map->where($map_cate_map)->find();
            
            // 获得分类名称
            $map_cate['term_id'] = $info_cate_map['term_taxonomy_id'];
            $info_cate = $model_cate->where($map_cate)->find();
            $output['data'][$key]['post_cate'] = $info_cate['name'];
        }
        
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
    }
}