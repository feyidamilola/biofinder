<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Service;
use Image;

class ServicesController extends Controller
{
    //
    public function createService(Request $request){
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            if(empty($data['title'])) {
              return redirect()->back()->with('flash_message_error','Service title cannot be empty');
            } 
            if(empty($data['image'])) {
                return redirect()->back()->with('flash_message_error','Service image cannot be empty');
              } 

            $service = new Service;
            $service->title = $data['title'];
            $service->description = $data['description'];

            if($request->hasFile('image')){
            	$image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    // Upload Images after Resize
                    $extension = $image_tmp->getClientOriginalExtension();
	                $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/services/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/services/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/services/small'.'/'.$fileName;  

	                Image::make($image_tmp)->save($large_image_path);
 					Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
     				Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

     				$service->image = $fileName; 

                }
            } else {

            }
            
            $service->save();
            
            return redirect()->back()->with('flash_message_success', 'Service has been created successsfully');
        }

        return view('admin.services.create_service');
    }

    public function viewService(Request $request){
        $services = Service::get();
        $services = json_decode(json_encode($services));
        return view('admin.services.all_services')->with(compact('services'));
    }

    public function editService(Request $request, $id = null) {
        if($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
           
           // Upload Image
           if($request->hasFile('image')){
            $image_tmp = Input::file('image');
            if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $large_image_path = 'images/backend_images/services/large'.'/'.$fileName;
                $medium_image_path = 'images/backend_images/services/medium'.'/'.$fileName;  
                $small_image_path = 'images/backend_images/services/small'.'/'.$fileName;  

                Image::make($image_tmp)->save($large_image_path);
                 Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                 Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

            }
        }else if(!empty($data['current_image'])){
            $fileName = $data['current_image'];
        }else{
            $fileName = '';
        }

        Service::where(['id'=>$id])->update(['title'=>$data['title'],
                                        'description'=>$data['description'],
                                        'image'=>$fileName]);
            
            return redirect()->back()->with('flash_message_success', 'Service successfully updated');
        }
        $servicedetail = Service::where('id','=',$id)->get()->first();

        return view('admin.services.edit_service')->with(compact('servicedetail'));
    }

    public function deleteService($id = null){
        Service::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Service has been deleted successfully');
    }

}
