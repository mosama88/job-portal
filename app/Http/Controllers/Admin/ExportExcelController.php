<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'model' => 'required|string',
        ]);

        $modelExportClass = "App\\Exports\\" . $request->model . 'Export';
        $modelClass = "App\\Models\\" . $request->model;

        if (!class_exists($modelExportClass)) {
            return redirect()->back()->with('error', 'model export not exist!');
        }

        if (!class_exists($modelClass)) {
            return redirect()->back()->with('error', 'model not exist!');
        }

        try {
            $data = $modelClass::all();
            return Excel::download(new $modelExportClass($data), strtolower($request->model) . '.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'error!');
        }
    }
}
