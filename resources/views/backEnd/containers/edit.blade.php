@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe3c9;</i>Edit Container</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.settings') }}</a> /
                    <a href="">Container</a>
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
                {{Form::open(['route'=>['containersUpdate',$Containers->id],'method'=>'POST', 'files' => true])}}

                <div class="form-group row">
                    <label for="name"
                           class="col-sm-1 form-control-label">Number
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('number',$Containers->number, array('placeholder' => '','class' => 'form-control','id'=>'number','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description"
                           class="col-sm-1 form-control-label">Details
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('details',$Containers->details, array('placeholder' => '','class' => 'form-control','id'=>'details','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="destination"
                           class="col-sm-1 form-control-label">Shipping Line
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('shipping_line',$Containers->shipping_line, array('placeholder' => '','class' => 'form-control','id'=>'shipping_line','required'=>'')) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price"
                           class="col-sm-1 form-control-label">Dates
                    </label>
                    <div class="col-sm-11">
                        {!! Form::text('dates',$Containers->dates, array('placeholder' => '','class' => 'form-control','id'=>'dates','required'=>'')) !!}
                    </div>
                </div>
              
                
                <div class="form-group row">
                    <label for="image"
                           class="col-sm-2 form-control-label">Container image</label>
                    <div class="col-sm-10">
                        @if($Containers->image!="")
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="photo" class="col-sm-4 box p-a-xs">
                                        <a target="_blank"
                                           href="{{ URL::to('uploads/containers/'.$Containers->image) }}"><img
                                                    src="{{ URL::to('uploads/Containers/'.$Containers->image) }}"
                                                    class="img-responsive">
                                            {{ $Containers->image }}
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
                    <label for="user_id" class="col-sm-1 form-control-label">Owner Name</label>
                    <div class="col-sm-11">
                        <div class="radio">
                            <select name="user_id" id="user_id" required class="form-control c-select">
                                <option value="">-- Owner Name --</option>
                                @foreach ($Users as $User)
                                    <option value="{{ $User->id }}" {!! ($User->id==$Containers->users) ? "selected='selected'":"" !!}>{{ $User->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_id" class="col-sm-1 form-control-label">Owner Car</label>
                    <div class="col-sm-11">
                        <div class="radio">
                            <select name="user_id" id="user_id" required class="form-control c-select">
                                <option value="">-- Owner Car --</option>
                                @foreach ($Cars as $Car)
                                    <option value="{{ $Car->id }}" {!! ($Car->id==$Containers->cars) ? "selected='selected'":"" !!}>{{ $Car->vin}}</option>
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
                             <option value="{{$Containers->status}}">{{$Containers->status}}</option>
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
               
               
               

                <div class="form-group row m-t-md">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! trans('backLang.update') !!}</button>
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
