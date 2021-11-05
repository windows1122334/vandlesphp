<?php
/**
 *
 * Author: vandles
 * Date: 2021/9/10 16:02
 * Email: <vandles@qq.com>
 **/

namespace vandles\controller;

use think\admin\Model;

class MasterBaseController extends BaseController {


    /**
     * @return Model
     */
    public function getModel(){
        return $this->model;
    }
    /**
     * 列表
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index(){
        $this->title = "列表";
//        $query = ShopGoodsCate::mQuery()->like('name')->dateBetween('create_at');
//        $query->equal('status')->where(['deleted' => 0])->order('sort desc,id desc')->page(false);
    }

    /**
     * 列表数据处理
     * @param array $data
     */
    protected function _index_page_filter(array &$data){
//        foreach ($data as &$vo) {
//            $vo['ids'] = join(',', DataExtend::getArrSubIds($data, $vo['id']));
//        }
//        $data = DataExtend::arr2table($data);
    }

    /**
     * 添加
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function add(){
        $this->getModel()::mForm('form');
    }

    /**
     * 编辑
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function edit(){
        $this->getModel()::mForm('form');
    }

    /**
     * 表单数据处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    protected function _form_filter(array &$data){
//        if ($this->request->isGet()) {
//            $data['pid'] = intval($data['pid'] ?? input('pid', '0'));
//            $cates = ShopGoodsCate::mk()->where(['deleted' => 0])->order('sort desc,id desc')->select()->toArray();
//            $this->cates = DataExtend::arr2table(array_merge($cates, [['id' => '0', 'pid' => '-1', 'name' => '顶部分类']]));
//            if (isset($data['id'])) foreach ($this->cates as $cate) if ($cate['id'] === $data['id']) $data = $cate;
//            foreach ($this->cates as $key => $cate) if ((isset($data['spt']) && $data['spt'] <= $cate['spt'])) {
//                unset($this->cates[$key]);
//            }
//        }
    }

    /**
     * 修改状态
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function state(){
        $this->getModel()::mSave($this->_vali([
            'status.in:0,1'  => '状态值范围异常！',
            'status.require' => '状态值不能为空！',
        ]));
    }

    /**
     * 删除
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function remove(){
        $this->getModel()::mDelete();
    }

}