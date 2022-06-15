<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Services\ImageService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.employee.index')->withUsers(Employee::withTrashed()->latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request, ImageService $imageService)
    {
        $user = Employee::create($request->validated());

        $imageService->uploadImage($user);

        alert()->success('Успешно!', 'Сотрдуник успешно добавлен!');

        return redirect()->route('employees.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employee.edit')->withEmployee($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee, ImageService $imageService)
    {
        $employee->update($request->validated());

        $imageService->uploadImage($employee);

        alert()->success('Успешно!', 'Сотрдуник успешно обновлен!');

        return redirect()->route('employees.index');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        alert()->success('Успешно!', 'Сотрдуник успешно удален!');

        return back();
    }

    public function restore($employee)
    {
        Employee::onlyTrashed()->findOrFail($employee)->restore();

        alert()->success('Успешно!', 'Сотрудник успешно восстановлен!');

        return back();
    }

}
