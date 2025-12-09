<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
            'model' => 'required|string',
        ]);

        $modelImportClass = "App\Imports\\" . $request->model . 'Import';
        if (!class_exists($modelImportClass)) return redirect()->back()->with('error', 'model import not exist!');
        try {
            Excel::import(new $modelImportClass, $request->file('file'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'error happended while importing file' . $th->getMessage());
        }
        return back()->with('success', 'The file was imported successfully.');
    }
}