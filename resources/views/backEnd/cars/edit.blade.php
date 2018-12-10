@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Edit Car</h3>
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
                {{Form::open(['route'=>['carsUpdate',$Cars->id],'method'=>'POST', 'files' => true])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-1 form-control-label">VIN
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('vin',$Cars->vin, array('placeholder' => '','class' => 'form-control','id'=>'vin','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description"
                           class="col-sm-1 form-control-label">Description
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('description',$Cars->description, array('placeholder' => '','class' => 'form-control','id'=>'descripion','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="destination"
                           class="col-sm-1 form-control-label">Destination
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('destination',$Cars->destination, array('placeholder' => '','class' => 'form-control','id'=>'destination','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price"
                           class="col-sm-1 form-control-label">Price
                    </label>
                    <div class="col-sm-11">
                        {!! Form::number('price',$Cars->price, array('placeholder' => '','class' => 'form-control','id'=>'price','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="terminal"
                           class="col-sm-1 form-control-label">Terminal
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('terminal',$Cars->terminal, array('placeholder' => '','class' => 'form-control','id'=>'terminal','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date"
                           class="col-sm-1 form-control-label">Delivery Date
                    </label>
                    <div class="col-sm-11">
                        {!! Form::date('delivery_data',$Cars->delivery_data, array('class' => 'form-control','id'=>'delivery_data','required'=>'')) !!}
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="image"
                           class="col-sm-2 form-control-label">Car image</label>
                    <div class="col-sm-10">
                        @if($Cars->image!="")
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="photo" class="col-sm-4 box p-a-xs">
                                        <a target="_blank"
                                           href="{{ URL::to('uploads/cars/'.$Cars->image) }}"><img
                                                    src="{{ URL::to('uploads/Cars/'.$Cars->image) }}"
                                                    class="img-responsive">
                                            {{ $Cars->image }}
                                        </a>
                                        <br>
                                        <a onclick="document.getElementById('photo').style.display='none';document.getElementById('image_delete').value='1';document.getElementById('undo').style.display='block';"
                                           class="btn btn-sm btn-default">{!!  trans('backLang.delete') !!}</a>
                                    </div>
                                    <div id="undo" class="col-sm-4 p-a-xs" style="display: none">
                                        <a onclick="document.getElementById('photo').style.display='block';document.getElementById('image_delete').value='0';document.getElementById('undo').style.display='none';">
                                            <i class="material-icons">&#xe166;</i> {!!  trans('backLang.undoDelete') !!}
                                        </a>
                                    </div>

                                    {!! Form::hidden('image_delete','0', array('id'=>'image_delete')) !!}
                                </div>
                            </div>
                        @endif

                        {!! Form::file('image', array('class' => 'form-control','id'=>'image','accept'=>'image/*')) !!}
                        <small>
                            <i class="material-icons">&#xe8fd;</i>
                            {!!  trans('backLang.imagesTypes') !!}
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_id" class="col-sm-1 form-control-label">Client Name</label>
                    <div class="col-sm-11">
                        <div class="radio">
                            <select name="user_id" id="user_id" required class="form-control c-select">
                                <option value="">-- Client Name --</option>
                                @foreach ($Users as $User)
                                    <option value="{{ $User->id }}" {!! ($User->id==$Cars->user_id) ? "selected='selected'":"" !!}>{{ $User->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_id" class="col-sm-1 form-control-label">Status</label>
                    <div class="col-sm-11">
                        <div class="radio">
                            <select name="status" id="status" required class="form-control c-select">
                                <option value="{{$Cars->status}}">{{$Cars->status}}</option>
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
                </div>
                <div class="form-group row">
                    <label for="link_status" class="col-sm-1 form-control-label">Title</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('title','1',($Cars->title==1) ? true : false, array('id'=>'title1', 'class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                YES
                            </label> &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('title','0',($Cars->title==0) ? true : false, array('id'=>'title2', 'class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                NO
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="link_status" class="col-sm-1 form-control-label">Keys</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('key','1',($Cars->key==1) ? true : false, array('id'=>'key1', 'class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                YES
                            </label> &nbsp; &nbsp;
                            <label class="ui-check ui-check-md">
                                {!! Form::radio('key','0',($Cars->key==0) ? true : false, array('id'=>'key2', 'class'=>'has-value')) !!}
                                <i class="dark-white"></i>
                                NO
                            </label>
                        </div>
                    </div>
                </div>
               
               

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.update') !!}</button>
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
