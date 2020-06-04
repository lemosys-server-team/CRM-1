<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use Form;

use App\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
                'email'               => 'required|email',
                'contact_number'      => 'required',
                'address'             => 'required',
                'app_version'         => 'required',
                'version_code'        => 'required',
                'ios_app_version'     => 'required',
                'bismillah_logo'      => 'image',
                'logo'                => 'image',
                'footer_logo'         => 'image',
                'favicon'             => 'file|mimes:jpeg,png,jpg,ico',
                'app_store'        => 'nullable|url|active_url',
                'instagram_url'       => 'nullable|url|active_url',
                'google_play'         => 'nullable|url|active_url',
                'notice_contact_no1'  => 'nullable',
                'notice_contact_no2'  => 'nullable',
                'notice_description'  => 'nullable',
                'notice_image'        => 'image',
                'terms_condition_title' => 'nullable',
                'terms_condition_description'  => 'nullable',
                'shahadat_LD_image'   => 'image',
                'shahadat_LD_audio'   => [  
                    'file',
                    new \makbari\validator\rules\Audio()
                ],
                'shahadat_arabic_image'   => 'image',
                'shahadat_arabic_audio'   => [  
                    'file',
                    new \makbari\validator\rules\Audio()
                ],
                'marquee_text'  => 'nullable',
                'auto_miqaat_enable'  => '',
                'auto_friday_nail_enable'  => '',
                'auto_schedule_sms_enable'  => '',
                'remind_later'  => '',
                'is_force_update'  => '',
                'ios_remind_later'  => '',
                'ios_is_force_update'  => '',
                'advertisement_request_title'=> 'nullable',
                'advertisement_request_mobileno'=> 'nullable',
                'advertisement_request_description'=> 'nullable',
                'advertisement_google_ad1'=> 'nullable',
                'advertisement_google_ad2'=> 'nullable',
                'advertisement_google_ad3'=> 'nullable',
        ];

        $request->validate($rules, [], []);
        
        $data = array(
                        array('option_name'=>'email','option_value'=>$request->email),
                        array('option_name'=>'contact_number','option_value'=>$request->contact_number),
                        array('option_name'=>'address','option_value'=>$request->address),
                        array('option_name'=>'app_version','option_value'=>$request->app_version),
                        array('option_name'=>'version_code','option_value'=>$request->version_code),
                        array('option_name'=>'remind_later','option_value'=>$request->remind_later),
                        array('option_name'=>'ios_app_version','option_value'=>$request->ios_app_version),
                        array('option_name'=>'is_force_update','option_value'=>$request->is_force_update),
                        array('option_name'=>'ios_remind_later','option_value'=>$request->ios_remind_later),
                        array('option_name'=>'ios_is_force_update','option_value'=>$request->ios_is_force_update),
                        array('option_name'=>'app_store','option_value'=>$request->app_store),
                        array('option_name'=>'instagram_url','option_value'=>$request->instagram_url),
                        array('option_name'=>'google_play','option_value'=>$request->google_play),
                        array('option_name'=>'logo','option_value'=>$request->logo),
                        array('option_name'=>'bismillah_logo','option_value'=>$request->bismillah_logo),
                        array('option_name'=>'footer_logo','option_value'=>$request->footer_logo),
                        array('option_name'=>'favicon','option_value'=>$request->favicon),
                        array('option_name'=>'notice_contact_no1','option_value'=>$request->notice_contact_no1),
                        array('option_name'=>'notice_contact_no2','option_value'=>$request->notice_contact_no2),
                        array('option_name'=>'notice_description','option_value'=>$request->notice_description),
                        array('option_name'=>'notice_image','option_value'=>$request->notice_image),
                        array('option_name'=>'terms_condition_title','option_value'=>$request->terms_condition_title),
                        array('option_name'=>'terms_condition_description','option_value'=>$request->terms_condition_description),
                        array('option_name'=>'shahadat_LD_image','option_value'=>$request->shahadat_LD_image),
                        array('option_name'=>'shahadat_LD_audio','option_value'=>$request->shahadat_LD_audio),
                        array('option_name'=>'shahadat_arabic_image','option_value'=>$request->shahadat_arabic_image),
                        array('option_name'=>'shahadat_arabic_audio','option_value'=>$request->shahadat_arabic_audio),
                        array('option_name'=>'marquee_text','option_value'=>$request->marquee_text),
                        array('option_name'=>'auto_miqaat_enable','option_value'=>$request->auto_miqaat_enable),
                        array('option_name'=>'auto_friday_nail_enable','option_value'=>$request->auto_friday_nail_enable),
                        array('option_name'=>'auto_schedule_sms_enable','option_value'=>$request->auto_schedule_sms_enable),
                        array('option_name'=>'auto_schedule_notification_enable','option_value'=>$request->auto_schedule_notification_enable),
                        array('option_name'=>'advertisement_request_title','option_value'=>$request->advertisement_request_title),
                        array('option_name'=>'advertisement_request_mobileno','option_value'=>$request->advertisement_request_mobileno),
                        array('option_name'=>'advertisement_request_description','option_value'=>$request->advertisement_request_description),
                        array('option_name'=>'advertisement_google_ad1','option_value'=>$request->advertisement_google_ad1),
                        array('option_name'=>'advertisement_google_ad2','option_value'=>$request->advertisement_google_ad2),
                        array('option_name'=>'advertisement_google_ad3','option_value'=>$request->advertisement_google_ad3),
                        array('option_name'=>'download_google_ad1','option_value'=>$request->download_google_ad1),
                        array('option_name'=>'download_google_ad2','option_value'=>$request->download_google_ad2),
                        array('option_name'=>'download_google_ad3','option_value'=>$request->download_google_ad3),


                    );
        if (!empty($data)) {
            foreach ($data as $row) {
                $is_file = FALSE;
                if ($row['option_name']=='logo') {
                    $is_file = TRUE;
                    if ($request->hasFile('logo')){
                        $file = $request->file('logo');
                        $customimagename  = time() . 'logo.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }
                if($row['option_name']=='footer_logo') {
                    $is_file = TRUE;
                    if ($request->hasFile('footer_logo')){
                        $file = $request->file('footer_logo');
                        $customimagename  = time() . 'footer_logo.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }else if ($row['option_name']=='favicon') {
                    $is_file = TRUE;
                    if ($file = $request->hasFile('favicon')){
                        $file = $request->file('favicon');
                        $customimagename  = time() . 'favicon.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    }
                }
                
                if ($row['option_name']=='bismillah_logo') {
                    $is_file = TRUE;
                    if ($request->hasFile('bismillah_logo')){
                        $file = $request->file('bismillah_logo');
                        $customimagename  = time() . 'bismillah_logo.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }
                if ($row['option_name']=='notice_image') {
                    $is_file = TRUE;
                    if ($request->hasFile('notice_image')){
                        $file = $request->file('notice_image');
                        $customimagename  = time() . 'notice_image.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }
                if ($row['option_name']=='shahadat_LD_image') {
                    $is_file = TRUE;
                    if ($request->hasFile('shahadat_LD_image')){
                        $file = $request->file('shahadat_LD_image');
                        $customimagename  = time() . 'shahadat_LD_image.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }
                if ($row['option_name']=='shahadat_LD_audio') {
                    $is_file = TRUE;
                    if ($request->hasFile('shahadat_LD_audio')){
                        $file = $request->file('shahadat_LD_audio');
                        $customimagename  = time() . 'shahadat_LD_audio.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }
                if ($row['option_name']=='shahadat_arabic_image') {
                    $is_file = TRUE;
                    if ($request->hasFile('shahadat_arabic_image')){
                        $file = $request->file('shahadat_arabic_image');
                        $customimagename  = time() . 'shahadat_arabic_image.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }
                if ($row['option_name']=='shahadat_arabic_audio') {
                    $is_file = TRUE;
                    if ($request->hasFile('shahadat_arabic_audio')){
                        $file = $request->file('shahadat_arabic_audio');
                        $customimagename  = time() . 'shahadat_arabic_audio.' . $file->getClientOriginalExtension();
                        $file->storeAs(config('constants.SETTING_IMAGE_URL'), $customimagename);
                        $setting=Setting::where(array('option_name'=>$row['option_name']))->first();
                        if (isset($setting->option_value) && $setting->option_value!='' && \Storage::exists(config('constants.SETTING_IMAGE_URL').$setting->option_value)) {
                            \Storage::delete(config('constants.SETTING_IMAGE_URL').$setting->option_value);
                        }
                        $row['option_value'] = $customimagename;
                    } 
                }
                if (isset($row['option_value']) && $row['option_value']!='') {
                    setSetting($row['option_name'],$row['option_value']);
                }else{
                    if ($is_file == FALSE) {
                        Setting::where('option_name',$row['option_name'])->delete();
                    }    
                }
            }
        }

        // For set setting in cache
        Cache::put('app_settings', Setting::get());

        $request->session()->flash('success',__('global.messages.update'));
        return redirect()->route('admin.settings.index');
    }
}