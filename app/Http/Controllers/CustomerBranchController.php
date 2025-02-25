<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\CustomerBranch;
use Illuminate\Http\Request;

class CustomerBranchController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

    }



        public function store(Request $request)
        {
            $data = $request->validate([
                'customer_id' => 'required|integer',
                'activity_id' => 'required|array',
                'representative' => 'required|array',
                'address' => 'required|array',
                'install_date' => 'required|array',
                'support_end' => 'required|array',
                'notes' => 'nullable|array',
                'support_status' => 'required|array',
            ]);

            // Check if all arrays have matching lengths
            $lengths = array_map('count', [
                $data['activity_id'],
                $data['representative'],
                $data['address'],
                $data['install_date'],
                $data['support_end'],
                $data['notes'],
                $data['support_status']
            ]);

            if (count(array_unique($lengths)) === 1) {
                foreach ($data['install_date'] as $index => $install_date) {
                    CustomerBranch::create([
                        'customer_id' => $data['customer_id'],
                        'activity_id' => $data['activity_id'][$index],
                        'representative' => $data['representative'][$index],
                        'address' => $data['address'][$index],
                        'install_date' => $install_date,
                        'support_end' => $data['support_end'][$index],
                        'notes' => $data['notes'][$index] ?? null,
                        'support_status' => $data['support_status'][$index],
                    ]);
                }

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Branches added successfully!');
            } else {
                // Redirect back with an error message
                return redirect()->back()->withErrors('All arrays must have matching lengths.');
            }

        }


    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        $activity=Activity::get();
        $agent=Agent::get();
        return view('branch.create',compact('activity','agent','customer'));

    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('branch.create',compact('customer'));
    }


    public function update(Request $request, CustomerBranch $customerBranch)
    {
        //
    }


    public function destroy(CustomerBranch $customerBranch)
    {
        //
    }
}
