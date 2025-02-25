<?php

namespace App\Http\Controllers;

use App\Models\CustomerNote;
use Illuminate\Http\Request;

class CustomerNoteController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'date' => 'required|array',
            'date.*' => 'nullable|date',
            'additional_notes' => 'required|array',
            'additional_notes.*' => 'nullable|string',
            'customer_id' => 'required|exists:customers,id',
        ]);
        foreach ($validated['date'] as $index => $date) {
            CustomerNote::create([
                'customer_id' => $validated['customer_id'],
                'date' => $date,
                'note' => $validated['additional_notes'][$index] ?? null,
            ]);
        }

        // Redirect back with a success message
        return redirect()->route('customer.index')->with('success', 'تم حفظ البيانات بنجاح');
    }



    public function show(CustomerNote $customerNote)
    {
        //
    }


    public function edit(CustomerNote $customerNote)
    {
        //
    }


    public function update(Request $request, CustomerNote $customerNote)
    {
        //
    }


    public function destroy(CustomerNote $customerNote)
    {
        //
    }
}
