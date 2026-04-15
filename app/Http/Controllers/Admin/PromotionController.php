<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $query = Promotion::query();
        if ($request->filled('search')){
            $search = $request->search;
            $query->where(function ($q) use ($search){
                $q->where('title','like',"%{$search}%");
            });
        }
        $promotions = $query->latest()->paginate(5)->withQueryString();
        return view("admin.promotions.index",compact("promotions"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'status'      => 'required|boolean',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
        $path = $request->file('image')->store('promotions', 'public');
        $data['image'] = $path;
        }
        Promotion::create($data);
        return redirect()->route('admin.promotions.index')->with('success', 'Banner creado correctamente');
    }

    public function update(Request $request, Promotion $promotion)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'status'      => 'required|boolean',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
        if ($request->hasFile('image')) {
            if ($promotion->image) {
                Storage::disk('public')->delete($promotion->image);
            }
            $data['image'] = $request->file('image')->store('promotions', 'public');
        } else {
            unset($data['image']);
        }
        $promotion->update($data);
        return back();
    }

    public function destroy(Promotion $promotion)
    {
        if ($promotion->image) {
            Storage::disk('public')->delete($promotion->image);
        }
        $promotion->delete();
        return back()->with('success', 'Banner eliminado');
    }
}