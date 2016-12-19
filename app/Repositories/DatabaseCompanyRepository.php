<?php

namespace App\Repositories;

use App\Company;

class DatabaseCompanyRepository implements CompanyRepositoryInterface {

    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function store($name, $logo, $user_id)
    {
        //$this->company->create(['name'=>$name, 'images' => $logo, 'user_id'=>$user_id]);

        $company = new Company;
        $company->name = $name;
        $company->user_id = $user_id;
        $company->images = $logo;
        $company->save();
    }

    public function all()
    {
        $companies = Company::all()->all();
        return $companies;
    }

    public function find($id)
    {
        $company = Company::find($id);

        return $company;
    }
}