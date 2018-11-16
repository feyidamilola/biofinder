<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Category;
use App\ParentCategory;
use App\SubCategories;

class CategoryController extends Controller
{
    public function addParentCategory(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            $parent_category = new ParentCategory;
            $parent_category->category_name = $data['parent_category_name'];
            $parent_category->save();
            return redirect('/admin/add-main-category')->with('flash_message_success', 'Main category successfully created.');
        }
        return view('admin.categories.add_parent_category');
    }

    public function viewParentCategories(){ 
        $parentcategories = ParentCategory::get();
        return view('admin.categories.view_parent_categories')->with(compact('parentcategories'));
    }

    public function editParentCategory(Request $request, $id = null){
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "pre>"; print_r($data); die;
            ParentCategory::where(['id'=> $id])->update(['category_name'=>$data['parent_category_name']]);
            return redirect('/admin/main-categories')->with('flash_message_success', 'Main category successfully updaeted.');;
        }
        $parentcategorydetails = ParentCategory::where(['id'=>$id])->first();
        return view('admin.categories.edit_parent_category')->with(compact('parentcategorydetails'));
    }

    public function deleteParentCategory($id = null){
        ParentCategory::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Main Category has been deleted successfully');
    }

    public function addSubCategory(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            $subcategory = new SubCategories;
            $subcategory->category_name = $data['category_name'];
            $subcategory->url = str_slug($data['category_name']);
            $subcategory->parent_category = $data['parent_category'];
            $subcategory->save();
            return redirect('/admin/add-sub-category')->with('flash_message_success', 'Sub Category successfully created.');
        }
        
        $parentcategories = ParentCategory::get();
        // echo "<pre>"; print_r($parentcategories); die;
        return view('admin.categories.add_sub_categories')->with(compact('parentcategories'));
    }

    public function viewSubCategories(){ 
        $subcategories = SubCategories::get();
        return view('admin.categories.view_sub_categories')->with(compact('subcategories'));
    }

    public function editSubCategory(Request $request, $id = null){
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "pre>"; print_r($data); die;
            SubCategories::where(['id'=> $id])->update(['category_name'=>$data['category_name'],'parent_category'=>$data['parent_category']]);
            return redirect('/admin/sub-categories')->with('flash_message_success', 'Sub category successfully updated.');;
        }
        $subcategorydetails = SubCategories::where(['id'=>$id])->first();
        $parentcategories = ParentCategory::get();
        return view('admin.categories.edit_sub_category')->with(compact('subcategorydetails','parentcategories'));
    }

    public function deleteSubCategory($id = null){
        SubCategories::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Sub Category has been deleted successfully');
    }
}
