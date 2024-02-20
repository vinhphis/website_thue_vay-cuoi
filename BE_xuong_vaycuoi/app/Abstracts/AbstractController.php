<?php

namespace Vinhphis\Templateadmin\Abstracts;
abstract class AbstractController
{
    abstract public function inThongTin();

    abstract public function view_themThongTin();

    abstract public function themThongTin();

    abstract public function xoaThongTin();

    abstract public function view_capNhatThongTin();

    abstract public function capNhatThongTin();
}