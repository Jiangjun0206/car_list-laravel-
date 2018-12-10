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
                    <div class="col-sm-11">
                        {!! Form::text('vin','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
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
                    <label for="key" class="col-sm-1 form-control-label">Title:</label>
                    <div class="col-sm-11">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('title','1','checked', array('id'=>'title1', 'class'=>'form-control')) !!}
                                <i class="dark-white"></i>
                                YES
                            </label> &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('title','0', array('id'=>'title2', 'class'=>'form-control')) !!}
                                <i class="dark-white"></i>
                                NO
                            </label>
                        </div>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="key" class="col-sm-1 form-control-label">Key:</label>
                    <div class="col-sm-11">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('key','1','checked', array('id'=>'key1', 'class'=>'form-control')) !!}
                                <i class="dark-white"></i>
                                YES
                            </label> &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('key','0', array('id'=>'key2', 'class'=>'form-control')) !!}
                                <i class="dark-white"></i>
                                NO
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                     <label for="price"
                           class="col-sm-1 form-control-label">Price :
                    </label>
                    <div class="col-sm-11">
                        {!! Form::number('price','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                </div>

                

                <div class="form-group row">
                    <label for="status"
                           class="col-sm-1 form-control-label">Terminal :
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('terminal','', array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status"
                           class="col-sm-1 form-control-label">Status :
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
                    <label for="delivery_data" class="col-sm-1 form-control-lable">Delivery Date : </label>
                    <div class="col-sm-2">

                        {!! Form::date('delivery_data','', array('class'=>'form-control','id'=>'date','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo"
                           class="col-sm-1 form-control-label">Car Image :</label>
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
                        <a href="{{route("cars")}}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! trans('backLang.cancel') !!}</a>
                    </div>
                </div>
                
  
                {{Form::close()}}
            </div>
        </div>
    </div>

@endsection
