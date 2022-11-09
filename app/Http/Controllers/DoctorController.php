<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Doctorbook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Array_;

class DoctorController extends Controller
{


         public function doctorList()
         {
             $common_data = new Array_();
             $common_data->title = 'Doctor List';
             $common_data->page_title = 'Doctor List';

             $doctorList=Doctor::get();

             return view('doctor.index')->with(compact('doctorList'));


         }

         public function doctorStore(Request $request){
             $request->validate([
                 'name' => 'required',
                 'email' => 'required|unique:doctors',
                 'password' => 'required|min:6',
                 'phone' => 'required',

             ]);

             $doctor=new Doctor();
             $doctor->name=$request->name;
             $doctor->phone=$request->phone;
             $doctor->email=$request->email;
             $doctor->degree=$request->degree;
             $doctor->password=Hash::make($request->password);
             $doctor->specialist=$request->specialist;
             if($request->image){
                 $image = $request->image;
                 $imageName = time() . '.' . $image->extension();

                 $image->storeAs('images', $imageName);

                 $image->move(public_path('images'), $imageName);
                 $doctor->image='images'.'/'.$imageName;

             }
             $doctor->save();

             return redirect()->back()->with('success','Doctor Successfully Created');



         }

         public function doctorBook(Request $request){

//             $request->start_time
                  $doctorBookingTime=Doctorbook::where('id',$request->doctor_id)->where('book_date',$request->date)->get();

                  $not_free=0;

                  foreach ($doctorBookingTime as $itemlist){
                      $pre_start=$itemlist->book_start_time;
                      $pre_endtime=$itemlist->book_end_time;
                      if(($request->start_time >= $pre_start)&& ($request->start_time <= $pre_endtime)){
                          $not_free=1;
                      }
                      else if(($request->end_time <= $pre_start)&& ($request->end_time >= $pre_endtime)){
                          $not_free=1;
                      }

                  }
                  if($not_free){
                      return redirect()->back()->with('error','This time already booked');
                  }



             $doctorBook=new Doctorbook();
             $doctorBook->doctor_id=$request->doctor_id;
             $doctorBook->patient_name=$request->patient_name;
             $doctorBook->patient_phone=$request->phone;
             $doctorBook->patient_address=$request->address;
             $doctorBook->book_date=$request->date;
             $doctorBook->book_start_time=$request->start_time;
             $doctorBook->book_end_time=$request->end_time;
             $doctorBook->book_start_date_time=Carbon::now();
             $doctorBook->book_end_date_time=Carbon::now();
             $doctorBook->save();
             return redirect()->back()->with('success','Doctor booking completed');

         }

         public function doctorAvailableTimeSrc(Request $request){

             $available_time=[];
             $time_duration_list=[];
             if($request->doctor_id){
                $time_lit=Doctorbook::where('doctor_id',$request->doctor_id)
                    ->where('book_date',$request->date)
                    ->orderBy('book_start_time','ASC')
                    ->get();

                 array_push($time_duration_list,[strtotime('10:00 AM'),strtotime('5:00 PM')]);
                foreach ($time_lit as $time){
                    $time_duration=[strtotime($time->book_start_time),strtotime($time->book_end_time)];
                    array_push($time_duration_list,$time_duration);
                }




             $array_size=sizeof($time_duration_list);
             $i=0;

             $start_point=0;
             $endpoint=0;

             if($array_size>1) {
                 while ($i < $array_size) {
                     if ($i == 0) {
                         $start_point = $time_duration_list[$i][0];
                         $endpoint = $time_duration_list[$i + 1][0];
                     } else if (($i + 1) == $array_size) {
                         $start_point = $time_duration_list[$i][1];
                         $endpoint = $time_duration_list[0][1];
                     } else {
                         $start_point = $time_duration_list[$i][1];
                         $endpoint = $time_duration_list[$i + 1][0];

                     }

                     if ($endpoint > $start_point) {
                         array_push($available_time, [$start_point, $endpoint]);
                     }


                     $i++;
                 }
             }else{
                 array_push($available_time, [$time_duration_list[0][0], $time_duration_list[0][1]]);
             }
             }

             $doctor_let=Doctor::get();

             return view('doctor_available_time')->with(compact('available_time','doctor_let'));

         }

         public function freeCommonTime(Request $request){

             $available_time=[];
             $time_duration_list=[];
             if($request->date){
                 $time_lit=Doctorbook::where('book_date',$request->date)
                     ->orderBy('book_start_time','ASC')
                     ->get();

                 array_push($time_duration_list,[strtotime('10:00 AM'),strtotime('5:00 PM')]);
                 foreach ($time_lit as $time){
                     $time_duration=[strtotime($time->book_start_time),strtotime($time->book_end_time)];
                     array_push($time_duration_list,$time_duration);
                 }

                 $array_size=sizeof($time_duration_list);
                 $i=0;

                 $start_point=0;
                 $endpoint=0;

                 if($array_size>1) {
                     while ($i < $array_size) {
                         if ($i == 0) {
                             $start_point = $time_duration_list[$i][0];
                             $endpoint = $time_duration_list[$i + 1][0];
                         } else if (($i + 1) == $array_size) {
                             $start_point = $time_duration_list[$i][1];
                             $endpoint = $time_duration_list[0][1];
                         } else {
                             $start_point = $time_duration_list[$i][1];
                             $endpoint = $time_duration_list[$i + 1][0];

                         }

                         if ($endpoint > $start_point) {
                             array_push($available_time, [$start_point, $endpoint]);
                         }

                         $i++;
                     }
                 }else{
                     array_push($available_time, [$time_duration_list[0][0], $time_duration_list[0][1]]);
                 }
             }


             $doctor_let=Doctor::get();

             return view('doctor_common_free_time')->with(compact('available_time','doctor_let'));


         }





         public function get_free_time_array($doctor_id,$date){

             $available_time=[];
             $time_duration_list=[];
             if($date){
                 $time_lit=Doctorbook::where('doctor_id',$doctor_id)->where('book_date',$date)
                     ->orderBy('book_start_time','ASC')
                     ->get();

                 array_push($time_duration_list,[strtotime('10:00 AM'),strtotime('5:00 PM')]);
                 foreach ($time_lit as $time){
                     $time_duration=[strtotime($time->book_start_time),strtotime($time->book_end_time)];
                     array_push($time_duration_list,$time_duration);
                 }

                 $array_size=sizeof($time_duration_list);
                 $i=0;

                 $start_point=0;
                 $endpoint=0;

                 if($array_size>1) {
                     while ($i < $array_size) {
                         if ($i == 0) {
                             $start_point = $time_duration_list[$i][0];
                             $endpoint = $time_duration_list[$i + 1][0];
                         } else if (($i + 1) == $array_size) {
                             $start_point = $time_duration_list[$i][1];
                             $endpoint = $time_duration_list[0][1];
                         } else {
                             $start_point = $time_duration_list[$i][1];
                             $endpoint = $time_duration_list[$i + 1][0];

                         }

                         if ($endpoint > $start_point) {
                             array_push($available_time, [$start_point, $endpoint]);
                         }

                         $i++;
                     }
                 }else{
                     array_push($available_time, [$time_duration_list[0][0], $time_duration_list[0][1]]);
                 }
             }

             return $available_time;


         }


}
