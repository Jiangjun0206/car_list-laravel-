@extends('backEnd.layout')

 
 
	 
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> New Containers</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.settings') }}</a> /
                    <a href="">Containers</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("containers")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['containersStore'],'method'=>'POST', 'files' => true ])}}

                <div class="form-group row">
                    <label for="vin"
                           class="col-sm-1 form-control-label">Number
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('number','', array('placeholder' => '','class' => 'form-control typeahead tm-input tm-input-info','id'=>'number','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_name"
                           class="col-sm-1 form-control-label">Client Name : </label>
                    <div class="col-sm-11">
                        <select name="user_id" id="user_id" required class="form-control c-select">
                            <option value="">- - User name - -</option>
                            @foreach ($Users as $User)
                                <option value="{{ $User->id  }}">{{ $User->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_name"
                           class="col-sm-1 form-control-label">Car VIN : </label>
                    <div class="col-sm-11">
                        <select name="car_id" id="car_id" required class="form-control c-select">
                            <option value="">- - Car VIN - -</option>
                            @foreach ($Cars as $Car)
                                <option value="{{ $Car->id  }}">{{ $Car->vin }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="details"
                           class="col-sm-1 form-control-label">Details
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('details','', array('placeholder' => '','class' => 'form-control','id'=>'details','required'=>'')) !!}
                    </div>
                </div>
         
                <div class="form-group row">
                    <label for="destination"
                           class="col-sm-1 form-control-label">Shipping line
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('shipping_line','', array('placeholder' => '','class' => 'form-control','id'=>'shipping_line','required'=>'')) !!}
                    </div>
                </div>

                

                <div class="form-group row">
                     <label for="price"
                           class="col-sm-1 form-control-label">Dates
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('dates','', array('placeholder' => '','class' => 'form-control','id'=>'dates','required'=>'')) !!}
                    </div>
                </div>

            
                <div class="form-group row">
                    <label for="status"
                           class="col-sm-1 form-control-label">Status
                    </label>
                    <div class="col-md-11">
                    <select name="status" id="status_id" required class="form-control c-select">
                            <option value="">- - Status - -</option>
                            <option value="New">New</option>
                             <option value="At Terminal">At Terminal</option>
                             <option value="Booked">Booked</option>
                             <option value="Loaded">Loaded</option>
                             <option value="Shipped">Shipped</option>
                             <option value="Delivered">Delivered</option>
                             <option value="Released to Cliendt">Released to Client</option>
                        </select>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label for="photo"
                           class="col-sm-1 form-control-label">Image :</label>
                    <div class="col-sm-11">
                        {!! Form::file('image', array('class' => 'form-control','id'=>'image','accept'=>'image/*')) !!}
                        <small>
                            <i class="material-icons">&#xe8fd;</i>
                            {!!  trans('backLang.imagesTypes') !!}
                        </small>
                    </div>
                </div>
                
                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-1 col-sm-11">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.add') !!}</button>
                        <a href="{{route("containers")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>
                
  
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
