<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Library;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $today = Carbon::now()->format('Y-m-d');
        $returnToday = Library::where('return_date', $today)->get();
        $loanedToday = Library::where([
            ['date', $today],
            ['return_date', null],
        ])->get();

        return response()->view('index', compact('returnToday', 'loanedToday'));
    }

    /**
     * Display all lending records.
     *
     * @return Response
     */
    public function data(): Response
    {
        $allData = Library::all();
        return response()->view('data', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return response()->view('create');
    }

    /**
     * Store a newly created lending record in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'      => 'required|min:4',
            'nim'       => 'required|min:8',
            'class'     => 'required',
            'booktitle' => 'required|min:6',
            'author'    => 'required|min:5',
            'date'      => 'required|date',
            'teacher'   => 'required|min:3',
        ]);

        Library::create([
            'name'      => $request->name,
            'nim'       => $request->nim,
            'class'     => $request->class,
            'booktitle' => $request->booktitle,
            'author'    => $request->author,
            'date'      => $request->date,
            'teacher'   => $request->teacher,
        ]);

        Alert::success('Success', 'New book borrowing record has been added');

        return redirect()
            ->route('library.data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $lending = Library::findOrFail($id);
        return response()->view('edit', compact('lending'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'return_date' => 'nullable|date',
        ]);

        Library::where('id', $id)->update([
            'return_date' => $request->input('return_date', Carbon::now()->format('Y-m-d')),
        ]);

        Alert::info('Updated', 'Book return has been recorded');

        return redirect()
            ->route('library.data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Library::destroy($id);

        Alert::warning('Deleted', 'Borrowing record has been deleted');

        return redirect()
            ->route('library.data');
    }
}
