<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    // عرض جميع العملاء
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    // عرض نموذج إنشاء جديد
    public function create()
    {
        return view('agents.create');
    }

    // حفظ بيانات العميل الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'Work_area' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        Agent::create($request->all());

        return redirect()->route('agents.index')->with('success', 'تمت إضافة العميل بنجاح');
    }

    // عرض بيانات عميل معين
    public function show(Agent $agent)
    {
        return view('agents.show', compact('agent'));
    }

    // عرض نموذج تعديل العميل
    public function edit($id)
    {
        $agent=Agent::findOrFail($id);
        return view('agents.edit', compact('agent'));
    }

    // تحديث بيانات العميل
    public function update(Request $request, Agent $agent)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'Work_area' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $agent->update($request->all());

        return redirect()->route('agents.index')->with('success', 'تم تحديث بيانات العميل بنجاح');
    }

    // حذف العميل
    public function destroy(Agent $agent)
    {
        $agent->delete();

        return redirect()->route('agents.index')->with('success', 'تم حذف العميل بنجاح');
    }
}
