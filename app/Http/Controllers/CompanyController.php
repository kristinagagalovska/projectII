<?php

namespace App\Http\Controllers;

use App\Requests\StoreCompanyRequest;
use App\Requests\UpdateCompanyLogoRequest;
use App\Requests\UpdateCompanyNameRequest;
use App\Services\CompanyService;
use App\Services\ImageService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    private $companies;
    private $images;

    public function __construct(
        CompanyService $companyService,
        ImageService $imageService
    )
    {
        $this->companies = $companyService;
        $this->images = $imageService;
    }

    public function all()
    {
        $companies = $this->companies->all();

        return view('company.all', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $name = $request->name;
        $logo = $request->file('logo');
        $logoName = $this->images->upload($logo)->getFilename();

        $this->companies->add($name, $logoName, $user->id);

        return redirect('allCompanies');
    }

    public function edit($id)
    {
        $company = $this->companies->find($id);

        return view('company.edit', compact('company'));
    }

    public function updateName(Request $request)
    {
        $id = $request->id;
        $name = $request->name;

        $this->companies->updateName($id, $name);

        return redirect('allCompanies');
    }

    public function updateLogo(Request $request)
    {
        $id = $request->id;

        $logoName = $this->companies->find($id)->images;
        $this->images->delete($logoName);

        $newLogoFile = $request->file('logo');
        $logoName = $this->images->upload($newLogoFile)->getFilename();

        $this->companies->updateLogo($id, $logoName);

        return redirect('allCompanies');
    }

    public function delete($id)
    {
        $logoName = $this->companies->find($id)->images;
        $this->images->delete($logoName);
        $this->companies->delete($id);

        return redirect('allCompanies');
    }
}