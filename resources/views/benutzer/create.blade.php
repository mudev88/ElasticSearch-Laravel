{{-- BENUTZER CREATE --}}

@extends('master')

@section('page-title')
Benutzer anlegen
@stop

@section('content')

<fieldset class="form-group">
    <div class="box-wrapper">
        {!! Form::open(['route' => 'benutzer.store', 'enctype' => 'multipart/form-data']) !!}
        
        <h4 class="title">{{ trans('benutzerForm.baseInfo') }}</h4>
        <div class="box">
            <div class="row">
        
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('username', '', old('username'), trans('benutzerForm.username'), trans('benutzerForm.username'), true) !!}
                    </div>   
                </div>
        
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('password', '', '', trans('benutzerForm.password'), trans('benutzerForm.password'), true, 'password') !!}
                    </div>   
                </div>
        
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('password_repeat', '', '', trans('benutzerForm.password_repeat'), trans('benutzerForm.password_repeat'), true, 'password') !!}
                    </div>   
                </div>
            
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {{-- !! ViewHelper::setCheckbox('active', '', old('active'), trans('benutzerForm.active'), false) !! --}}
                        <div class="checkbox">
                           <input type="checkbox" value="1" name="active" id="active" checked><label for="active">{{ trans('benutzerForm.active') }}</label>
                        </div>
                    </div>   
                </div>
            
            </div>
        
            <div class="row">
                <div class="col-lg-3"> 
                    <div class="form-group">
                        <label class="control-label">{{trans('benutzerForm.title')}}</label>
                        <select name="title" class="form-control select">
                            <option value="Frau">Frau</option>
                            <option value="Herr">Herr</option>
                        </select>
                        
                    </div>   
                </div>
        
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('first_name', '', old('first_name'), trans('benutzerForm.first_name'), trans('benutzerForm.first_name'), true) !!}
                    </div>   
                </div>
        
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('last_name', '', old('last_name'), trans('benutzerForm.last_name'), trans('benutzerForm.last_name'), true) !!}
                    </div>   
                </div>
        
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('birthday', '', old('birthday'), trans('benutzerForm.birthday'), trans('benutzerForm.birthday'), false, 'text', ['datetimepicker']) !!}
                    </div>   
                </div>
                
                <div class="clearfix"></div>
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('short_name', '', old('short_name'), trans('benutzerForm.short_name'), trans('benutzerForm.short_name'), false) !!}
                    </div>   
                </div>
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('username_sso', '', old('username_sso'), trans('benutzerForm.username_sso'), trans('benutzerForm.username_sso'), false) !!}
                    </div>   
                </div>
                
                 <div class="col-lg-3"> 
                    <div class="form-group">
                        <!-- Telefon -->
                        {!! ViewHelper::setInput('phone', '', old('phone'), trans('benutzerForm.phone'), trans('benutzerForm.phone'), false) !!}
                    </div>
                </div>
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                        <!-- Kurzwahl -->
                        {!! ViewHelper::setInput('phone_short', '', old('phone_short'), trans('benutzerForm.phone_short'), trans('benutzerForm.phone_short'), false) !!}
                    </div>
                </div>
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                       {!! ViewHelper::setInput('email', '', old('email'), trans('benutzerForm.email'), trans('benutzerForm.email'), true, 'email') !!}
                    </div>   
                </div>
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                       <!--{!! ViewHelper::setCheckbox('email_reciever', '', old('email_reciever'), trans('benutzerForm.email_reciever')) !!}-->
                        <div class="checkbox">
                            <input type="checkbox" value="1" name="email_reciever" id="email_reciever"  checked><label for="email_reciever">{{ trans('benutzerForm.email_reciever') }}</label>
                        </div>
                    </div>   
                </div>
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                        {!! ViewHelper::setInput('active_from', '', old('active_from'), trans('benutzerForm.active_from'), trans('benutzerForm.active_from'), false, 'text', ['datetimepicker']) !!}
                    </div>   
                </div>
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                        {!! ViewHelper::setInput('active_to', '', old('active_to'), trans('benutzerForm.active_to'), trans('benutzerForm.active_to'), false, 'text', ['datetimepicker']) !!}
                    </div>   
                </div>

            </div>
            
            <div class="row">
                
                <div class="col-lg-3"> 
                    <div class="form-group">
                        <label>{{ trans('benutzerForm.picture') }}</label>
                        <input type="file" id="image-upload" name="picture"/><br/>
                        <img id="image-preview" class="img-responsive" src="{{url('/img/user-default.png')}}"/>
                    </div>   
                </div>
        
            </div>
            
            <div class="clearfix"></div> <br>
            
            <div class="row">
                <div class="col-lg-6">
                    <button class="btn btn-white no-margin-bottom" type="reset">{{ trans('benutzerForm.reset') }}</button>
                    <button class="btn btn-primary no-margin-bottom" type="submit">{{ trans('benutzerForm.save') }}</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div> <!-- end box-wrapper -->
</fieldset>


<div class="clearfix"></div> <br>

@stop