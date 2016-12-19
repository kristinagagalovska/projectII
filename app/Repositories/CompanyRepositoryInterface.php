<?php

namespace app\Repositories;

interface CompanyRepositoryInterface {

    //public function add($name, $logo, $user_id);

    public function all();

    public function store($name, $logo, $user_id);

    public function find($id);

}