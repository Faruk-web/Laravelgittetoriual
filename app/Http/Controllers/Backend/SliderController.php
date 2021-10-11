<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Slider;
use Image;
class SliderController extends Controller
{
    //slider mathoed

    public function SliderView(){

        $sliders = Slider::latest()->get();
		return view('backend.slider.slider_view',compact('sliders'));
    }// end method

     // Store Slider
     public function SliderStore(Request $request){   
      
        // validation 
            $request->validate([
              
                'slider_img' => 'required',       
              ],[ 
                'slider_img.required' => 'Input The Slider Img',
             
              ]);
    
              // img upload and save
              $image = $request->file('slider_img');
              $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
              $save_url = 'upload/slider/'.$name_gen;
    
           // Brand Insert    
              Slider::insert([
               'title' => $request->title,
               'description' => $request->description,
               'slider_img' => $save_url,
    
              ]);
    
              $notification = array(
                'message' =>  'Slider Add Sucessyfuly',
                'alert-type' => 'success'
            ); 
    
            return redirect()->back()->with($notification);
    
              
    
      } // end method 
    
            // slider  edit
            public function SliderEdit($id){
            $sliders = Slider::findOrFail($id);
            return view('backend.slider.slider_edit',compact('sliders'));
            }
    
            // slider Update
            public function SliderUpdate(Request $request){
    
                $slider_id = $request->id;
                $old_img = $request->old_img;
    
                if ($request->file('slider_img')) {
    
                unlink($old_img);
                $image = $request->file('slider_img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
                $save_url = 'upload/slider/'.$name_gen;
    
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
    
                ]);
    
                $notification = array(
                    'message' => 'Slider Updated Successfully',
                    'alert-type' => 'info'
                );
    
                return redirect()->back()->with($notification);
    
                }else{
    
                Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
    
    
                ]);
    
                $notification = array(
                    'message' => 'Slider Updated Without Image Successfully',
                    'alert-type' => 'info'
                );
    
                return redirect()->back()->with($notification);
    
                } // end else 
            } // end method 
    
    
           // Delete Slider
            public function SliderDelete($id){
                $slider = Slider::findOrFail($id);
                $img = $slider->slider_img;
                unlink($img);
                Slider::findOrFail($id)->delete();
        
                $notification = array(
                    'message' => 'Slider Delectd Successfully',
                    'alert-type' => 'info'
                );
        
                return redirect()->back()->with($notification);
        
            } // end method
    
    
    
    
                // Deactive Slider
                public function SliderDeactive($id){
                    Slider::findOrFail($id)->update([ 'status' => 0, ]);
    
                    // pass the sms
                    $notification = array(
                        'message' => 'Slider Deactive Successfully',
                        'alert-type' => 'info'
                    );
    
                    return redirect()->back()->with($notification);
                }// end mathod 
    
    
                // Active Slider
                    public function SliderActive($id){
                        Slider::findOrFail($id)->update([ 'status' => 1, ]);
    
                        // pass the sms
                        $notification = array(
                            'message' => 'Slider Active Successfully',
                            'alert-type' => 'info'
                        );
    
                        return redirect()->back()->with($notification);
                    }// end mathod 
    
    
    }
    
