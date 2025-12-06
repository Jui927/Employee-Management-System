<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmployeeModel;

class Employee extends BaseController
{
     public function index()
    {
        $employeeModel = new EmployeeModel();

        $search = $this->request->getVar('search');

        if ($search) {
            $data['employees'] = $employeeModel
                ->like('name', $search)
                ->orLike('email', $search)
                ->findAll();
        } else {
            $data['employees'] = $employeeModel->findAll();
        }

        return view('employees/index', $data);
    }

    public function create()
    {
        return view('employees/create');
    }

    public function store()
    {
        $employeeModel = new EmployeeModel();

        $employeeModel->save([
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
        ]);

        return redirect()->to('/employees');
    }

    public function edit($id)
    {
        $employeeModel = new EmployeeModel();
        $data['employee'] = $employeeModel->find($id);

        return view('employees/edit', $data);
    }

    public function update($id)
    {
        $employeeModel = new EmployeeModel();

        $employeeModel->update($id, [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
        ]);

        return redirect()->to('/employees');
    }

    public function delete($id)
    {
        $employeeModel = new EmployeeModel();
        $employeeModel->delete($id);

        return redirect()->to('/employees');
    }
}
