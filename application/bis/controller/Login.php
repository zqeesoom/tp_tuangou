<?php

namespace app\bis\controller;

use think\Controller;

/**
 * 商户登录
 * @package app\main\controller
 */
class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}