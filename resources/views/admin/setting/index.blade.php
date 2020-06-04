@extends('admin.layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('global.setting.setting') }}</h1>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        {!! Form::open(['method' => 'POST', 'files'=>true, 'route' => ['admin.settings.store'], 'class' => 'form-horizontal', 'id' => 'frmSetting']) !!}
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('global.setting.edit_setting') }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group {{$errors->has('email') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="email">{{ __('global.setting.contact_email') }} <span style="color:red">*</span></label>
                        <div class="col-md-12">
                            {!! Form::text('email',old('email',getSetting('email')), ['class' => 'form-control', 'placeholder' => __('global.setting.contact_email')]) !!}
                            @if($errors->has('email'))
                            <strong for="email" class="help-block">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group {{$errors->has('contact_number') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="contact_number">{{ __('global.setting.contact_number') }} <span style="color:red">*</span></label>
                        <div class="col-md-12">
                            {!! Form::text('contact_number',old('contact_number',getSetting('contact_number')), ['class' => 'form-control', 'placeholder' => __('global.setting.contact_number')]) !!}
                            @if($errors->has('contact_number'))
                            <strong for="contact_number" class="help-block">{{ $errors->first('contact_number') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
             <div class="col-6">
            <div class="form-group {{$errors->has('address') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                <label class="col-md-12" for="address">{{__('global.setting.address') }} <span style="color:red">*</span></label>
                 <div class="col-md-12">
                    {!! Form::textarea('address', old('address',getSetting('address')), ['rows'=>'3','class' => 'form-control', 'placeholder' => __('global.setting.address')]) !!}
                    @if($errors->has('address'))
                    <strong for="address" class="help-block">{{ $errors->first('address') }}</strong>
                    @endif
                </div>
            </div>
            </div>
             <div class="col-6">
               
             </div>
            </div>

            <div class="row mb-2">
                <div class="col-6">
                    <div class="form-group {{$errors->has('app_store') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="app_store">{{__('global.setting.app_store') }} <span style="color:red"></span></label>
                         <div class="col-md-12">
                            {!! Form::text('app_store', old('app_store',getSetting('app_store')), ['class' => 'form-control', 'placeholder' => __('global.setting.app_store')]) !!}
                            @if($errors->has('app_store'))
                            <strong for="app_store" class="help-block">{{ $errors->first('app_store') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group {{$errors->has('google_play') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="google_play">{{ __('global.setting.google_play') }} <span style="color:red"></span></label>
                         <div class="col-md-12">
                            {!! Form::text('google_play', old('google_play',getSetting('google_play')), ['class' => 'form-control', 'placeholder' => __('global.setting.google_play')]) !!}
                            @if($errors->has('google_play'))
                            <strong for="google_play" class="help-block">{{ $errors->first('google_play') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group {{$errors->has('instagram_url') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="instagram_url">{{__('global.setting.instagram_url') }} <span style="color:red"></span></label>
                         <div class="col-md-12">
                            {!! Form::text('instagram_url', old('instagram_url',getSetting('instagram_url')), ['class' => 'form-control', 'placeholder' => __('global.setting.instagram_url')]) !!}
                            @if($errors->has('instagram_url'))
                            <strong for="instagram_url" class="help-block">{{ $errors->first('instagram_url') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="row">
                <div class="col-3">
                    @php $logo = getSetting('logo'); @endphp
                    @if(isset($logo) && $logo!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$logo)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                            <img width="100" height="50" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$logo) }}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('logo') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.logo') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('logo') }}
                            @if($errors->has('logo'))
                            <strong for="logo" class="help-block">{{ $errors->first('logo') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    @php $footer_logo = getSetting('footer_logo'); @endphp
                    @if(isset($footer_logo) && $footer_logo!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$footer_logo)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                            <img width="100" height="50" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$footer_logo) }}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('footer_logo') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.footer_logo') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('footer_logo') }}
                            @if($errors->has('footer_logo'))
                            <strong for="footer_logo" class="help-block">{{ $errors->first('footer_logo') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    @php $bismillah_logo = getSetting('bismillah_logo'); @endphp
                    @if(isset($bismillah_logo) && $bismillah_logo!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$bismillah_logo)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                            <img width="100" height="50" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$bismillah_logo) }}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('bismillah_logo') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="bismillah_logo">{{__('global.setting.bismillah_logo') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('bismillah_logo') }}
                            @if($errors->has('bismillah_logo'))
                            <strong for="bismillah_logo" class="help-block">{{ $errors->first('bismillah_logo') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    @php $favicon = getSetting('favicon'); @endphp
                    @if(isset($favicon) && $favicon!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$favicon)) 
                    <div class="form-group">
                        <div class="col-md-12">
                            <img width="50" height="50" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$favicon) }}">
                        </div>
                    </div>
                    @endif

                    <div class="form-group {{$errors->has('favicon') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.favicon') }} </label>
                        <div class="col-md-12">
                            {{ Form::file('favicon') }}
                            @if($errors->has('favicon'))
                            <strong for="favicon" class="help-block">{{ $errors->first('favicon') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Notification Notice</h6>
                </div>
                 <div class="col-6"> 
                     <div class="form-group {{$errors->has('notice_contact_no1') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="notice_contact_no1">{{ __('global.setting.notice_contact_no1') }} </label>
                        <div class="col-md-12">
                            {!! Form::text('notice_contact_no1',old('notice_contact_no1',getSetting('notice_contact_no1')), ['class' => 'form-control', 'placeholder' => __('global.setting.notice_contact_no1')]) !!}
                            @if($errors->has('notice_contact_no1'))
                            <strong for="notice_contact_no1" class="help-block">{{ $errors->first('notice_contact_no1') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                 <div class="col-6"> 
                      <div class="form-group {{$errors->has('notice_contact_no2') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="notice_contact_no2">{{ __('global.setting.notice_contact_no2') }} </label>
                        <div class="col-md-12">
                            {!! Form::text('notice_contact_no2',old('notice_contact_no2',getSetting('notice_contact_no2')), ['class' => 'form-control', 'placeholder' => __('global.setting.notice_contact_no2')]) !!}
                            @if($errors->has('notice_contact_no2'))
                            <strong for="notice_contact_no2" class="help-block">{{ $errors->first('notice_contact_no2') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                 <div class="col-6">
                 <div class="form-group {{$errors->has('notice_description') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                <label class="col-md-12" for="notice_description">{{__('global.setting.notice_description') }} </label>
                 <div class="col-md-12">
                    {!! Form::textarea('notice_description', old('notice_description',getSetting('notice_description')), ['rows'=>'3','class' => 'form-control', 'placeholder' => __('global.setting.notice_description')]) !!}
                    @if($errors->has('notice_description'))
                    <strong for="notice_description" class="help-block">{{ $errors->first('notice_description') }}</strong>
                    @endif
                </div>
              </div>
            </div>
            <div class="col-6">
                    @php $notice_image = getSetting('notice_image'); @endphp
                    @if(isset($notice_image) && $notice_image!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$notice_image)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                            <img width="50" height="50" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$notice_image) }}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('notice_image') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.notice_image') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('notice_image') }}
                            @if($errors->has('notice_image'))
                            <strong for="notice_image" class="help-block">{{ $errors->first('notice_image') }}</strong>
                            @endif
                        </div>
                    </div>
            </div>
          </div>
          <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Terms & Conditions</h6>
                </div>
                 <div class="col-6">
                     <div class="form-group {{$errors->has('terms_condition_title') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="terms_condition_title">{{ __('global.setting.terms_condition_title') }} </label>
                        <div class="col-md-12">
                            {!! Form::text('terms_condition_title',old('terms_condition_title',getSetting('terms_condition_title')), ['class' => 'form-control', 'placeholder' => __('global.setting.terms_condition_title')]) !!}
                            @if($errors->has('terms_condition_title'))
                            <strong for="terms_condition_title" class="help-block">{{ $errors->first('terms_condition_title') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                  <div class="col-6">
                    <div class="form-group {{$errors->has('terms_condition_description') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                    <label class="col-md-12" for="terms_condition_description">{{__('global.setting.terms_condition_description') }} </label>
                     <div class="col-md-12">
                        {!! Form::textarea('terms_condition_description', old('terms_condition_description',getSetting('terms_condition_description')), ['rows'=>'3','class' => 'form-control', 'placeholder' => __('global.setting.terms_condition_description')]) !!}
                        @if($errors->has('terms_condition_description'))
                        <strong for="terms_condition_description" class="help-block">{{ $errors->first('terms_condition_description') }}</strong>
                        @endif
                    </div>
                  </div>

                 </div>
          </div>
          <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Shahadat LD</h6>
                </div>
                 <div class="col-6"> 
                  @php $shahadat_LD_image = getSetting('shahadat_LD_image'); @endphp
                    @if(isset($shahadat_LD_image) && $shahadat_LD_image!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$shahadat_LD_image)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                            <img width="100" height="50" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$shahadat_LD_image) }}">

                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('shahadat_LD_image') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.shahadat_LD_image') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('shahadat_LD_image') }}
                            @if($errors->has('shahadat_LD_image'))
                            <strong for="shahadat_LD_image" class="help-block">{{ $errors->first('shahadat_LD_image') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                 <div class="col-6"> 
                    @php $shahadat_LD_audio = getSetting('shahadat_LD_audio'); @endphp
                    @if(isset($shahadat_LD_audio) && $shahadat_LD_audio!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$shahadat_LD_audio)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                           <audio controls="1" height="250" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$shahadat_LD_audio) }}" width="100%"></audio>
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('shahadat_LD_audio') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.shahadat_LD_audio') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('shahadat_LD_audio') }}
                            @if($errors->has('shahadat_LD_audio'))
                            <strong for="shahadat_LD_audio" class="help-block">{{ $errors->first('shahadat_LD_audio') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
          </div>   
           <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Shahadat Arabic</h6>
                </div>
                 <div class="col-6"> 
                  @php $shahadat_arabic_image = getSetting('shahadat_arabic_image'); @endphp
                    @if(isset($shahadat_arabic_image) && $shahadat_arabic_image!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$shahadat_arabic_image)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                            <img width="100" height="50" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$shahadat_arabic_image) }}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('shahadat_arabic_image') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.shahadat_arabic_image') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('shahadat_arabic_image') }}
                            @if($errors->has('shahadat_arabic_image'))
                            <strong for="shahadat_arabic_image" class="help-block">{{ $errors->first('shahadat_arabic_image') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                 <div class="col-6"> 
                    @php $shahadat_arabic_audio = getSetting('shahadat_arabic_audio'); @endphp
                    @if(isset($shahadat_arabic_audio) && $shahadat_arabic_audio!=''  && \Storage::exists(config('constants.SETTING_IMAGE_URL').$shahadat_arabic_audio)) 
                    <div class="form-group">
                        <div class="col-md-12">                            
                           <audio controls="1" height="250" src="{{ \Storage::url(config('constants.SETTING_IMAGE_URL').$shahadat_arabic_audio) }}" width="100%"></audio>
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{$errors->has('shahadat_arabic_audio') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="title">{{__('global.setting.shahadat_arabic_audio') }} </label>
                        <div class="col-md-12">
                             {{ Form::file('shahadat_arabic_audio') }}
                            @if($errors->has('shahadat_arabic_audio'))
                            <strong for="shahadat_arabic_audio" class="help-block">{{ $errors->first('shahadat_arabic_audio') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
          </div> 
            <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Marquee Text</h6>
                </div>
                 <div class="col-12"> 
                     <div class="form-group {{$errors->has('marquee_text') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="marquee_text"> 
                        @php $marquee_text = getSetting('marquee_text');
                        $marquee_text=isset($marquee_text)?$marquee_text:'';
                       echo config('constants.MARQUEE_TXT'). $marquee_text; 
                         @endphp
                  </label>
                        <div class="col-md-6">
                            {!! Form::text('marquee_text',old('marquee_text',getSetting('marquee_text')), ['class' => 'form-control', 'placeholder' => __('global.setting.marquee_text')]) !!}
                            @if($errors->has('marquee_text'))
                            <strong for="marquee_text" class="help-block">{{ $errors->first('marquee_text') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
            </div>  
            <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Auto Miqaat / Friday nail / Auto Schedule SMS / Auto</h6>
                </div>
                <div class="col-12">
                <div class="col-3">
                        <label>{{ Form::checkbox('auto_miqaat_enable', '1', old('auto_miqaat_enable',getSetting('auto_miqaat_enable')),['id'=>'auto_miqaat_enable']) }} Auto Miqaat Enable</label>
                </div>
                <div class="col-3">
                        <label>{{ Form::checkbox('auto_friday_nail_enable', '1', old('auto_friday_nail_enable',getSetting('auto_friday_nail_enable')),['id'=>'auto_friday_nail_enable']) }} Auto Friday-nail notification Enable</label>
                </div>
                <div class="col-3">
                        <label>{{ Form::checkbox('auto_schedule_sms_enable', '1', old('auto_schedule_sms_enable',getSetting('auto_schedule_sms_enable')),['id'=>'auto_schedule_sms_enable']) }} Auto Schedule SMS Enable</label>
                </div>
                <div class="col-3">
                        <label>{{ Form::checkbox('auto_schedule_notification_enable', '1', old('auto_schedule_notification_enable',getSetting('auto_schedule_notification_enable')),['id'=>'auto_schedule_notification_enable']) }} Auto Schedule notification Enable</label>
                </div>
              </div>
            </div>

             <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Android App</h6>
                </div>
                 <div class="col-6"> 
                     <div class="form-group {{$errors->has('app_version') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="app_version">{{ __('global.setting.app_version') }} <span style="color:red">*</span></label>
                        <div class="col-md-12">
                            {!! Form::text('app_version',old('app_version',getSetting('app_version')), ['class' => 'form-control', 'placeholder' => __('global.setting.app_version')]) !!}
                            @if($errors->has('app_version'))
                            <strong for="app_version" class="help-block">{{ $errors->first('app_version') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                 <div class="col-6"> 
                     <div class="form-group {{$errors->has('version_code') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="version_code">{{ __('global.setting.version_code') }} <span style="color:red">*</span></label>
                        <div class="col-md-12">
                            {!! Form::text('version_code',old('version_code',getSetting('version_code')), ['class' => 'form-control', 'placeholder' => __('global.setting.version_code')]) !!}
                            @if($errors->has('version_code'))
                            <strong for="version_code" class="help-block">{{ $errors->first('version_code') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-3"> 
                  <label class="col-md-12">{{ Form::checkbox('remind_later', '1', old('remind_later',getSetting('remind_later')),['id'=>'remind_later']) }} Remind Later</label>
                </div>
                <div class="col-3"> 
                  <label class="col-md-12">{{ Form::checkbox('is_force_update', '1', old('is_force_update',getSetting('is_force_update')),['id'=>'is_force_update']) }} Force Update</label>
                </div>
            </div> 

            <div class="row">
                <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Ios App</h6>
                </div>

                 <div class="col-6"> 
                     <div class="form-group {{$errors->has('ios_app_version') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="ios_app_version">{{ __('global.setting.app_version') }} <span style="color:red">*</span></label>
                        <div class="col-md-12">
                            {!! Form::text('ios_app_version',old('ios_app_version',getSetting('ios_app_version')), ['class' => 'form-control', 'placeholder' => __('global.setting.app_version')]) !!}
                            @if($errors->has('ios_app_version'))
                            <strong for="ios_app_version" class="help-block">{{ $errors->first('ios_app_version') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                 
                 <div class="col-6"> 
                 </div>
                 <div class="col-3"> 
                  <label class="col-md-12">{{ Form::checkbox('ios_remind_later', '1', old('ios_remind_later',getSetting('ios_remind_later')),['id'=>'ios_remind_later']) }} Remind Later</label>
                </div>
                <div class="col-3"> 
                  <label class="col-md-12">{{ Form::checkbox('ios_is_force_update', '1', old('ios_is_force_update',getSetting('ios_is_force_update')),['id'=>'ios_is_force_update']) }} Force Update</label>
                </div>
            </div> 
            <div class="row">
            <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Front Advertisement here</h6>
                </div>

                 <div class="col-6"> 
                     <div class="form-group {{$errors->has('advertisement_request_title') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="advertisement_request_title">{{ __('global.setting.advertisement_request_title') }} <span style="color:red">*</span></label>
                        <div class="col-md-12">
                            {!! Form::text('advertisement_request_title',old('advertisement_request_title',getSetting('advertisement_request_title')), ['class' => 'form-control', 'placeholder' => __('global.setting.advertisement_request_title')]) !!}
                            @if($errors->has('advertisement_request_title'))
                            <strong for="app_version" class="help-block">{{ $errors->first('advertisement_request_title') }}</strong>
                            @endif
                        </div>
                    </div>
                 </div>
                 <div class="col-6"> 
                     <div class="form-group {{$errors->has('advertisement_request_mobileno') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                        <label class="col-md-12" for="advertisement_request_mobileno">{{ __('global.setting.advertisement_request_mobileno') }} <span style="color:red">*</span></label>
                        <div class="col-md-12">
                            {!! Form::text('advertisement_request_mobileno',old('advertisement_request_mobileno',getSetting('advertisement_request_mobileno')), ['class' => 'form-control', 'placeholder' => __('global.setting.advertisement_request_mobileno')]) !!}
                            @if($errors->has('advertisement_request_mobileno'))
                            <strong for="advertisement_request_mobileno" class="help-block">{{ $errors->first('advertisement_request_mobileno') }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                 <div class="col-6">
                 <div class="form-group {{$errors->has('advertisement_request_description') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                <label class="col-md-12" for="advertisement_request_description">{{__('global.setting.advertisement_request_description') }} </label>
                 <div class="col-md-12">
                    {!! Form::textarea('advertisement_request_description', old('advertisement_request_description',getSetting('advertisement_request_description')), ['rows'=>'3','class' => 'form-control', 'placeholder' => __('global.setting.advertisement_request_description')]) !!}
                    @if($errors->has('advertisement_request_description'))
                    <strong for="advertisement_request_description" class="help-block">{{ $errors->first('advertisement_request_description') }}</strong>
                    @endif
                </div>
              </div>
            </div>


            </div>
            <div class="row">
            <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Front Home Page Google Advertisement</h6>
                </div>
                <div class="col-6">
                 <div class="form-group {{$errors->has('advertisement_google_ad1') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                  <label class="col-md-12" for="advertisement_google_ad1">{{__('global.setting.advertisement_google_ad1') }} </label>
                         <div class="col-md-12">
                            {!! Form::textarea('advertisement_google_ad1', old('advertisement_google_ad1',getSetting('advertisement_google_ad1')), ['rows'=>'3','class' => 'form-control']) !!}
                            @if($errors->has('advertisement_google_ad1'))
                            <strong for="advertisement_google_ad1" class="help-block">{{ $errors->first('advertisement_google_ad1') }}</strong>
                            @endif
                         </div>
                 </div>
                </div>
                <div class="col-6">
                 <div class="form-group {{$errors->has('advertisement_google_ad2') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                  <label class="col-md-12" for="advertisement_google_ad2">{{__('global.setting.advertisement_google_ad2') }} </label>
                         <div class="col-md-12">
                            {!! Form::textarea('advertisement_google_ad2', old('advertisement_google_ad2',getSetting('advertisement_google_ad2')), ['rows'=>'3','class' => 'form-control']) !!}
                            @if($errors->has('advertisement_google_ad2'))
                            <strong for="advertisement_google_ad2" class="help-block">{{ $errors->first('advertisement_google_ad2') }}</strong>
                            @endif
                         </div>
                 </div>
                </div>
                <div class="col-6">
                 <div class="form-group {{$errors->has('advertisement_google_ad3') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                  <label class="col-md-12" for="advertisement_google_ad3">{{__('global.setting.advertisement_google_ad3') }} </label>
                         <div class="col-md-12">
                            {!! Form::textarea('advertisement_google_ad3', old('advertisement_google_ad3',getSetting('advertisement_google_ad3')), ['rows'=>'3','class' => 'form-control']) !!}
                            @if($errors->has('advertisement_google_ad3'))
                            <strong for="advertisement_google_ad3" class="help-block">{{ $errors->first('advertisement_google_ad3') }}</strong>
                            @endif
                         </div>
                 </div>
                </div>

            </div>
            <div class="row">
            <div class="col-12">
                <h6 class=" m-3 font-weight-bold text-primary">Front Download Page Google Advertisement</h6>
                </div>
                <div class="col-6">
                 <div class="form-group {{$errors->has('download_google_ad1') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                  <label class="col-md-12" for="download_google_ad1">{{__('global.setting.advertisement_google_ad1') }} </label>
                         <div class="col-md-12">
                            {!! Form::textarea('download_google_ad1', old('download_google_ad1',getSetting('download_google_ad1')), ['rows'=>'3','class' => 'form-control']) !!}
                            @if($errors->has('download_google_ad1'))
                            <strong for="download_google_ad1" class="help-block">{{ $errors->first('download_google_ad1') }}</strong>
                            @endif
                         </div>
                 </div>
                </div>
                <div class="col-6">
                 <div class="form-group {{$errors->has('download_google_ad2') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                  <label class="col-md-12" for="download_google_ad2">{{__('global.setting.advertisement_google_ad2') }} </label>
                         <div class="col-md-12">
                            {!! Form::textarea('download_google_ad2', old('download_google_ad2',getSetting('download_google_ad2')), ['rows'=>'3','class' => 'form-control']) !!}
                            @if($errors->has('download_google_ad2'))
                            <strong for="download_google_ad1" class="help-block">{{ $errors->first('download_google_ad2') }}</strong>
                            @endif
                         </div>
                 </div>
                </div>
                <div class="col-6">
                 <div class="form-group {{$errors->has('download_google_ad3') ? config('constants.ERROR_FORM_GROUP_CLASS') : ''}}">
                  <label class="col-md-12" for="advertisement_google_ad3">{{__('global.setting.advertisement_google_ad3') }} </label>
                         <div class="col-md-12">
                            {!! Form::textarea('download_google_ad3', old('download_google_ad3',getSetting('download_google_ad3')), ['rows'=>'3','class' => 'form-control']) !!}
                            @if($errors->has('download_google_ad3'))
                            <strong for="download_google_ad3" class="help-block">{{ $errors->first('download_google_ad3') }}</strong>
                            @endif
                         </div>
                 </div>
                </div>

            </div>


        </div> 
        <div class="card-footer">
            <button type="submit" class="btn btn-responsive btn-primary btn-sm">{{ __('Submit') }}</button>
            <a href="{{route('admin.dashboard')}}"  class="btn btn-responsive btn-danger btn-sm">{{ __('Cancel') }}</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#frmSetting').validate({
        rules: {
            email: {
                required: true,
                email:true
            },
            contact_number: {
                required: true
            },
            version_code: {
                required: true
            },
            app_version: {
                required: true
            },
            ios_app_version: {
                required: true
            },
            address: {
                required: true
            }
        }
    });
});
</script>
@endsection