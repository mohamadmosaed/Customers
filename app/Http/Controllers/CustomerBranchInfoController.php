<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\CustomerBranch;
use App\Models\CustomerBranchInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerBranchInfoController extends Controller
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
           CustomerBranchInfo::create([
                'customer_id' => $validated['customer_id'],
                'date' => $date,
                'note' => $validated['additional_notes'][$index] ?? null,
            ]);
        }

        // Redirect back with a success message
        return redirect()->route('customer.index')->with('success', 'تم حفظ البيانات بنجاح');
    }
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $activity=Activity::get();
        $agent=Agent::get();
        return view('branch.showbranches',compact('customer','activity','agent'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('branch.branchnote',compact('customer'));
    }


    public function update(Request $request,$id)
    {

        $request->validate([
            'customer_id'    => 'required|exists:customers,id',
            'activity'       => 'required|exists:activities,id',
            'representative' => 'required|exists:agents,id',
            'install_date'   => 'nullable|date',
            'address'        => 'required|string|max:500',
            'support_status' => 'required|in:نشط,غيرنشط',
            'support_end'    => 'nullable|date|after_or_equal:install_date',
            'notes'          => 'nullable|string|max:1000',
        ]);


        $customerBranch = CustomerBranch::findOrFail($id);

        // Update customer data
        $customerBranch->update([
            'customer_id' => $request->customer_id,
            'activity' => $request->activity,
            'representative' => $request->representative,
            'install_date' => $request->install_date,
            'address' => $request->address,
            'support_status' => $request->support_status,
            'support_end' => $request->support_end,
            'notes' => $request->notes,
        ]);

        // Redirect to customer list with success message
        return redirect()->route('customer.index')->with('success', 'تم تحديث بيانات العميل بنجاح');
    }

    public function destroy($id)
    {
     DB::table('customer_branches')->where('id',$id)->delete();
return redirect()->route('customer.index')->with('success','branch is deleted successfuly');
    }
}
