<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Agent;
use App\Models\Customer;
use Carbon\Carbon;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customer=Customer::get();
return view('customer.index',compact('customer'));
    }

    public function create()
    {
        $activity=Activity::get();
        $agent=Agent::get();
        return view('customer.create',compact('activity','agent'));
    }

        public function store(Request $request)
        {
            // Validate the form data

            // Store the data in the database
            Customer::create([
                'customer_name' => $request->input('customer_name'),
                'activity' => $request->input('activity'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'program' => $request->input('program'),
                'agent_id' => $request->input('agent_id'),
                'install_date' => $request->input('install_date'),
                'support_end' => $request->input('support_end'),
                'notes' => $request->input('notes') ?? null,
            ]);

            // Redirect back with a success message
            return redirect()->route('dashboard')->with('success', 'Customer added successfully!');
        }



    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show',compact('customer'));
    }


    public function edit($id)
    {
        $customer=Customer::findOrFail($id);

        $activity=Activity::get();
        return view('customer.edit',compact('customer','activity'));
    }

    public function update(Request $request, $id)
{
    // Validate input data
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'activity' => 'required|string',
        'mobile' => 'required|string|max:20',
        'program' => 'required|string',
        'address' => 'required|string|max:500',
        'agent' => 'nullable|string|max:255',
        'install_date' => 'nullable|date',
        'support_end' => 'nullable|date',
        'notes' => 'nullable|string|max:1000',
    ]);

    // Find the customer
    $customer = Customer::findOrFail($id);

    // Update customer data
    $customer->update([
        'customer_name' => $request->customer_name,
        'activity' => $request->activity,
        'mobile' => $request->mobile,
        'program' => $request->program,
        'address' => $request->address,
        'agent' => $request->agent,
        'install_date' => $request->install_date,
        'support_end' => $request->support_end,
        'notes' => $request->notes,
    ]);

    // Redirect to customer list with success message
    return redirect()->route('customer.index')->with('success', 'تم تحديث بيانات العميل بنجاح');

}


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
         $customer->delete();
         return redirect()->route('customer.index')->with('success','deleteted is ok');
    }
    public function addInfo($id)
    {
        $customer=Customer::findOrFail($id);
        return view('customer.addInfo',compact('customer'));
    }
}
