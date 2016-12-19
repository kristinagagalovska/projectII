<?php

namespace App\Services;

use App\Company;
use App\Repositories\CompanyRepositoryInterface;
use app\Repositories\DatabaseCompanyRepository;



class CompanyService {

//    private $companiesRepo;
//
//    public function __construct(DatabaseCompanyRepository $companiesRepo)
//    {
//        $this->companiesRepo = $companiesRepo;
//    }

    public function all()
    {
        $companies = Company::all()->all();
        return $companies;
    }

//    public function add($name, $logo, $user_id)
//    {
//        $this->companiesRepo->add($name, $logo, $user_id);
//    }

    public function add($name, $logo, $user_id)
    {
        $company = new Company;
        $company->name = $name;
        $company->user_id = $user_id;
        $company->images = $logo;
        $company->save();
    }

    public function find($id)
    {
        $company = Company::find($id);

        return $company;
    }

    public function updateName($id, $name)
    {
        $company = Company::find($id);
        $company->name = $name;
        $company->save();
    }

    public function updateLogo($id, $logo)
    {
        $company = Company::find($id);
        $company->images = $logo;
        $company->save();
    }

    public function delete($id)
    {
        Company::destroy($id);
    }
}