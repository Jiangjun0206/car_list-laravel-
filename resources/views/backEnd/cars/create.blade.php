@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> New Cars</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.settings') }}</a> /
                    <a href="">Cars</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("cars")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['carsStore'],'method'=>'POST', 'files' => true ])}}

                <div class="form-group row">
                    <label for="vin"
                           class="col-sm-1 form-control-label">VIN :
                    </label>
                    <div class="col-sm-5">
                        {!! Form::text('vin','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                    <label for="user_name"
                           class="col-sm-1 form-control-label">Client name :
                    </label>
                    <div class="col-sm-5">
                        {!! Form::text('user_name','', array('placeholder' => '','class' => 'form-control','id'=>'user_name','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description"
                           class="col-sm-1 form-control-label">Description :
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('description','', array('placeholder' => '','class' => 'form-control','id'=>'description','required'=>'')) !!}
                    </div>
                </div>
         
                <div class="form-group row">
                    <label for="destination"
                           class="col-sm-1 form-control-label">Destination :
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('destination','', array('placeholder' => '','class' => 'form-control','id'=>'destination','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title"
                           class="col-sm-1 form-control-label">Titile :
                    </label>
                    <div class="col-sm-3">
                        {!! Form::text('title','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                    <label for="key"
                           class="col-sm-1 form-control-label">Key :
                    </label>
                    <div class="col-sm-3">
                        {!! Form::text('key','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                    <label for="price"
                           class="col-sm-1 form-control-label">Price :
                    </label>
                    <div class="col-sm-3">
                        {!! Form::text('price','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status"
                           class="col-sm-1 form-control-label">Status :
                    </label>
                    <div class="col-sm-3">
                        {!! Form::text('status','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                    <label for="status"
                           class="col-sm-1 form-control-label">Terminal :
                    </label>
                    <div class="col-sm-3">
                        {!! Form::text('status','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                    <label for="photo"
                           class="col-sm-1 form-control-label">Car Image :</label>
                    <div class="col-sm-3">
                        {!! Form::file('image', array('class' => 'form-control','id'=>'image','accept'=>'image/*')) !!}
                        <small>
                            <i class="material-icons">&#xe8fd;</i>
                            {!!  trans('backLang.imagesTypes') !!}
                        </small>
                    </div>
                </div>

                
                <div class="form-group row">
                 
                </div>


                <div class="form-group row">
                    <label for="permissions1"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.Permission') !!}</label>
                    <div class="col-sm-10">
                        <select name="permissions_id" id="permissions_id" required class="form-control c-select">
                            <option value="">- - {!!  trans('backLang.selectPermissionsType') !!} - -</option>
                            @foreach ($Permissions as $Permission)
                                <option value="{{ $Permission->id  }}">{{ $Permission->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <strong>{{ trans('backLang.connectEmailToConnect') }}</strong>
                        <hr>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="connect_email"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.connectEmail') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::email('connect_email','', array('placeholder' => '','class' => 'form-control','id'=>'connect_email')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="connect_password"
                           class="col-sm-2 form-control-label">{!!  trans('backLang.connectPassword') !!}
                    </label>
                    <div class="col-sm-10">
                        {!! Form::text('connect_password','', array('placeholder' => '','class' => 'form-control','id'=>'connect_password')) !!}
                    </div>
                </div>

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.add') !!}</button>
                        <a href="{{route("users")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
