<?php

namespace App\Http\Controllers\Api;

use App\Models\Todo;
use App\Exports\TodoExport;
use App\Imports\TodoImport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\Api\TodoResource;
use App\Http\Requests\ImportedExcelRequest;
use App\Http\Requests\Api\Todo\StoreAndUpdateRequest;
use App\Models\ImportReport;
use Illuminate\Http\Resources\Json\ResourceCollection;


class ToDoController extends Controller
{
    public function index(): ResourceCollection
    {
        return TodoResource::collection(Todo::latest('id')->paginate(5));
    }

    public function store(StoreAndUpdateRequest $request): JsonResponse
    {
        //dd($request->all();
        $todo = new Todo();
        $validatedData = $request->validated();

        $todo->title = $validatedData['title'];
        $request->has('description') && $todo->description = $validatedData['description'];

        $todo->save();

        return TodoResource::make($todo)->response()->setStatusCode(201);
    }

    public function show(Todo $todo): TodoResource
    {
        return TodoResource::make($todo);
    }

    public function update(StoreAndUpdateRequest $request, Todo $todo): TodoResource
    {
        $validatedData = $request->validated();

        $todo->title = $validatedData['title'];
        $todo->description = $validatedData['description'];
        $todo->done = $validatedData['done'];

        $todo->save();

        return TodoResource::make($todo);
    }

    public function destroy(Todo $todo): Response
    {
        $todo->delete();
        return response(null, 204);
    }

    public function toggle(Todo $todo): TodoResource
    {
        $todo->done = !$todo->done;

        $todo->save();

        return TodoResource::make($todo);
    }

    public function import(ImportedExcelRequest $request)
    {

        $file = $request->file('file');
    
        Excel::import(new TodoImport, $file);

        ImportReport::create([
            'filename' => $file->getClientOriginalName(),
        ]);

        return view('app');
    }

    public function export(Request $request)
    {
        $status = $request->export;

        return (new TodoExport($request->export))->download('todos.xlsx');
    }

    public function pdf(Request $request)
    {
        $date1 = $request->get('date1');
        $date2 = $request->get('date2');
        
        $query = DB::table('todos')
                ->whereBetween('updated_at', [$date1, $date2])
                ->get();
        
        $data = $query->toArray();

        $pdf = PDF::loadView('pdfgenerate', ['data' => $data]);

        //return view('pdfgenerate')->with(['data' => $data]);

        return $pdf->download('busqueda.pdf');
    }

}
