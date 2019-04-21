<?php

namespace app\bis\controller;

use think\Controller;

/**
 * 商户后台首页
 * @package app\main\controller
 */
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}
