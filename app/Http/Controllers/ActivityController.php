<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function index()
    {
        $activities=Activity::get();
        return view('activity.index',compact('activities'));
    }


    public function create()
    {
        return view('activity.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'activity' => 'required|array|min:1', // Ensure it's an array with at least one value
            'activity.*' => 'required|string|max:255', // Validate each activity
        ]);

        // Loop through activities and insert into database
        foreach ($request->activity as $item) {
            Activity::create([
                'customer_id'=>$request->customer_id,
                'name' => $item,
            ]);
        }


        return response()->json(['message' => 'Activities successfully added.'], 201);
    }


    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activity.show', compact('activity'));
    }


    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activity.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'activity' => 'required|string|max:255',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update([
            'name' => $request->activity,
        ]);

        return redirect()->route('activity.index')->with('success', 'تم تحديث النشاط بنجاح');
    }



    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('activity.index')->with('success', 'تم حذف النشاط بنجاح');
    }

}
