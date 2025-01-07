<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __construct()
    {
        // Cek role owner untuk semua metode
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role !== 'owner') {
                abort(403, 'Unauthorized access');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $branches = Branch::with('supervisor')->get();
        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        $supervisors = User::where('role', 'supervisor')->get();
        return view('branches.create', compact('supervisors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'supervisor_id' => 'nullable|exists:users,id',
        ]);

        Branch::create($request->all());

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));
    }

    public function edit(Branch $branch)
    {
        $supervisors = User::where('role', 'supervisor')->get();
        return view('branches.edit', compact('branch', 'supervisors'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'supervisor_id' => 'nullable|exists:users,id',
        ]);

        $branch->update($request->all());

        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}
