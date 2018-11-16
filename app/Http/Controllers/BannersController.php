<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Banner;
use Image;

class BannersController extends Controller
{
    public function addBanner(Request $request)    {
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if(empty($data['title'])) {
              return redirect()->back()->with('flash_message_error','Banner title cannot be empty');
            } 
            if(empty($data['image'])) {
                return redirect()->back()->with('flash_message_error','Banner image cannot be empty');
            } 

            if(empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }

            $banner = new Banner;
            $banner->title = $data['title'];
            $banner->caption = $data['caption'];
            $banner->url = str_slug($data['title']);
            $banner->status = $status;

            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/frontend_images/banners'.'/'.$fileName; 

	                Image::make($image_tmp)->resize(1500, 500)->save($large_image_path);

     				$banner->image = $fileName; 

                }
            } else {

            }
            
            $banner->save();
            
            return redirect()->back()->with('flash_message_success', 'Banner has been created successfully');
        }

        return view('admin.banners.addbanners');
    }

    public function allBanners()    {
        $banners = Banner::paginate(10);
        return view('admin.banners.allbanners')->with(compact('banners'));
    }

    public function editBanner(Request $request, $id = null) {

        if($request->isMethod('post')) {
            $data = $request->all();
           
           // Upload Image
           if($request->hasFile('image')){
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $large_image_path = 'images/frontend_images/banners'.'/'.$fileName;  
                Image::make($image_tmp)->resize(1500, 500)->save($large_image_path);

            }
        } else if(!empty($data['current_image'])){
            $fileName = $data['current_image'];
        } else{
            $fileName = '';
        }

        if(empty($data['status'])) {
            $status = 0;
        } else {
            $status = 1;
        }

        Banner::where(['id'=>$id])->update(['title'=>$data['title'],
                                        'caption'=>$data['caption'],
                                        'status'=>$status,
                                        'image'=>$fileName]);
            
            return redirect()->back()->with('flash_message_success', 'Banner successfully updated');
        }
        $bannerdetail = Banner::where('id','=',$id)->get()->first();

        return view('admin.banners.editbanner')->with(compact('bannerdetail'));
    }

    public function deleteBanner($id = null){
        Banner::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Banner has been deleted successfully');
    }
}
