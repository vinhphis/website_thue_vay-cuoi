<?php

namespace Vinhphis\Templateadmin\Interfaces;
interface InterfaceController
{
    public function success_add();

    public function success_update();

    public function success_xoa();

    public function error_add();

    public function error_update();
}