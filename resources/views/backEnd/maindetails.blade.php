@extends('backEnd.layout')
 
  <style>
    .icc{
        padding-top: 10px!important;
    }
    .nav-text{
        margin-top:15px!important;
    }
    th, td{
        font-size:14px;
    }
  </style>
@section('content')
    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Main Details</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">Main Details</a>
                </small>
            </div>
            <div class="">
                  <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 5px solid #5aaf5a;">
                    <li class="nav-item" style="background-color:#64d664;">
                        <a class="nav-link active" id="ccontainer-tab" role="tab" data-toggle="tab" href="#ccontainer" aria-controls="home" aria-selected="true">View Containers</a></li>
                    <li class="nav-item"  style="background-color:#64d664;">
                        <a class="nav-link" id="vehicle-tab" role="tab" data-toggle="tab" href="#vehicle" aria-controls="home" aria-selected="false">My Vehicle</a></li>
                    <li class="nav-item"  style="background-color:#64d664;">
                        <a class="nav-link" id="statistic-tab" role="tab" data-toggle="tab" href="#statistic" aria-controls="home" aria-selected="false">Statistic</a></li>
                </ul>
             </div>
            <div class="tab-content" id="myTabContent">
                <div id="ccontainer" class="tab-pane fade in active" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row" style="padding:2%">
                        <h6>Container list</h6>
                        <div class="col-xs-12 col-md-2 col-sm-2">
                            <div class="form-group">
                                <select name="" id="" class="form-group form-control">
                                    <option value="">-- Port --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-2 col-sm-2">
                           <div class="form-group">
                                <select name="" id="" class="form-group form-control">
                                    <option value="">-- Status --</option>
                                </select>
                            </div>
                        </div>
                     
                   
                        <div class="col-xs-12 col-md-1 col-sm-1" style="padding-top:10px">
                            <input type="checkbox"> Only 
                            unpaid
                        </div>
                        <div class="col-xs-12 col-md-2 col-sm-2">
                            <input type="text" class="form-control" placeholder="Search Now...">
                        </div>
                        <div class="col-xs-12 col-md-1 col-sm-1">
                            <button class="btn btn-success">Search</button>
                        </div>
                       
                    </div>
                    @if($Containers->total() > 0)
                    {{Form::open(['route'=>'ContainersUpdateAll','method'=>'post'])}}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered b-t">
                            <thead>
                            <tr style="background-color:lightgray">
                                <th style="width:20px;">
                                    <label class="ui-check m-a-0">
                                        <input id="checkAll" type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Image</td>
                                <th>Number</th>
                                <th>Details</th>
                                <th>Shipping line</th>
                                <th>Dates</th>
                                <th>Status</th>
                                <th>Send E-mail</th>
                                <!-- <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th> -->
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($Containers as $Container)
                                <tr>
                                    <td><label class="ui-check m-a-0">
                                            <input type="checkbox" name="ids[]" value="{{ $Container->id }}"><i
                                                    class="dark-white"></i>
                                            {!! Form::hidden('row_ids[]',$Container->id, array('class' => 'form-control row_no')) !!}
                                        </label>
                                    </td>
                                    <td><img src="/uploads/containers/{!! $Container->image  !!}" alt="" width="50px" height="40px" style="border-radius:1em"></td>

                                    <td>
                                    
                                            {!! $Container->number   !!}
                                
                                    </td>

                                    <td>
                                        <small>{!! $Container->details   !!}</small>
                                    </td>
                                    <td>
                                        <small>{!! $Container->shipping_line   !!}</small>
                                    </td>
                                    <td>
                                        <small>
                                            
                                        {!! $Container->dates   !!}
                                        </small>
                                    </td>
                                    <td>
                                        <small>{!! $Container->status   !!}</small>
                                    </td>
                                    
                                
                                    <td style="text-align:center"><a href ><i class="fa fa-envelope-o" style="font-size:20px"></i></a></td>
        
                                    <!-- <td class="text-center">
                                        <a class="btn btn-sm success"
                                        href="{{ route("containersEdit",["id"=>$Container->id]) }}">
                                            <small><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.edit') }}
                                            </small>
                                        </a>
                                        @if(@Auth::user()->permissionsGroup->webmaster_status)
                                            <button class="btn btn-sm warning" data-toggle="modal"
                                                    data-target="#m-{{ $Container->id }}" ui-toggle-class="bounce"
                                                    ui-target="#animate">
                                                <small><i class="material-icons">&#xe872;</i> {{ trans('backLang.delete') }}
                                                </small>
                                            </button>
                                        @endif
                                    </td> -->
                                </tr>
                                <!-- .modal -->
                                <div id="m-{{ $Container->id }}" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog" id="animate">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                            </div>
                                            <div class="modal-body text-center p-lg">
                                                <p>
                                                    {{ trans('backLang.confirmationDeleteMsg') }}
                                                    <br>
                                                    <strong>[ {{ $Container->number }} ]</strong>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark-white p-x-md"
                                                        data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                                <a href="{{ route("containersDestroy",["id"=>$Container->id]) }}"
                                                class="btn danger p-x-md">{{ trans('backLang.yes') }}</a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- / .modal -->
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <footer class="dker p-a">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <!-- .modal -->
                                <div id="m-all" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog" id="animate">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                            </div>
                                            <div class="modal-body text-center p-lg">
                                                <p>
                                                    {{ trans('backLang.confirmationDeleteMsg') }}
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark-white p-x-md"
                                                        data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                                <button type="submit"
                                                        class="btn danger p-x-md">{{ trans('backLang.yes') }}</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- / .modal -->
                                @if(@Auth::user()->permissionsGroup->webmaster_status)
                                    <select name="action" id="action" class="input-sm form-control w-sm inline v-middle"
                                            required>
                                        <option value="">{{ trans('backLang.bulkAction') }}</option>
                                    
                                        <option value="delete">{{ trans('backLang.deleteSelected') }}</option>
                                    </select>
                                    <button type="submit" id="submit_all"
                                            class="btn btn-sm white">{{ trans('backLang.apply') }}</button>
                                    <button id="submit_show_msg" class="btn btn-sm white" data-toggle="modal"
                                            style="display: none"
                                            data-target="#m-all" ui-toggle-class="bounce"
                                            ui-target="#animate">{{ trans('backLang.apply') }}
                                    </button>
                                @endif
                            </div>

                            <div class="col-sm-3 text-center">
                                <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $Containers->firstItem() }}
                                    -{{ $Containers->lastItem() }} {{ trans('backLang.of') }}
                                    <strong>{{ $Containers->total()  }}</strong> {{ trans('backLang.records') }}</small>
                            </div>
                            <div class="col-sm-6 text-right text-center-xs">
                                {!! $Containers->links() !!}
                            </div>
                        </div>
                    </footer>
                    {{Form::close()}}

                    <script type="text/javascript">
                        $("#checkAll").click(function () {
                            $('input:checkbox').not(this).prop('checked', this.checked);
                        });
                        $("#action").change(function () {
                            if (this.value == "delete") {
                                $("#submit_all").css("display", "none");
                                $("#submit_show_msg").css("display", "inline-block");
                            } else {
                                $("#submit_all").css("display", "inline-block");
                                $("#submit_show_msg").css("display", "none");
                            }
                        });
                    </script>
                    @endif
                </div>
                <div id="vehicle" class="tab-pane fade" role="tabpanel" aria-labelledby="vehicle-tab">                   
                    <div class="row" style="padding:2%">
                    <h6>Vehicle list</h6>
                        <div class="col-xs-12 col-md-2 col-sm-2">
                            <div class="form-group">
                                <label class="form-group">Terminal</label>
                                <select name="" id="" class="form-group form-control">
                                    <option value="">-- All --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-2 col-sm-2">
                           <div class="form-group">
                                <label class="form-group">Status</label>
                                <select name="" id="" class="form-group form-control">
                                    <option value="">-- All --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-1 col-sm-1">
                            <div class="form-group">
                                <label class="form-group">Delivery Date</label>
                              <input type="text" class="form-control" placeholder="From">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-1 col-sm-1">
                            <div class="form-group">
                                <label class="form-group">To:</label>
                                 <input type="text" class="form-control" placeholder="To">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-1 col-sm-1"><br><br>
                            <input type="checkbox"> Only<br>
                            unpaid
                        </div>
                        <div class="col-xs-12 col-md-2 col-sm-2"><br><br>
                            <input type="text" class="form-control" placeholder="Search Now...">
                        </div>
                        <div class="col-xs-12 col-md-1 col-sm-1"><br><br>
                            <button class="btn btn-success">Search</button>
                        </div>
                       
                    </div>
                    @if($Cars->total() > 0)
                    {{Form::open(['route'=>'carsUpdateAll','method'=>'post'])}}
                    <div class="table-responsive">
                        <table class="table table-striped  b-t" style="font-size:10px">
                            <thead>
                            <tr style="">
                           
                                <th>Image</th>
                                <th>Delivery Date</th>
                                <th>Description</th>
                                <th>VIN</th>
                                <th>Client Name</th>
                                <th>Destination</th>
                                <th>Title</th>
                                <th>Keys</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Terminal</th>
                                <!-- <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th> -->
                                <th>Notes</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($Cars as $Car)
                                <tr>                                  
                                    <td><img src="/uploads/cars/{!! $Car->image  !!}" alt="" width="40px" height="33px" style="border-radius:1em"></td>
                                    <td>{!! $Car->delivery_data !!} </td>

                                    <td><small>{!! $Car->description   !!}</small></td>
                                    <td><small>{!! $Car->vin  !!}</small></td>
                                    <td><small>                  
                                            <?php 
                                                $user = DB::table('users')->where('id', $Car->user_id)->get();                                        
                                               echo  $user[0]->name;
                                            ?>
                                        </small>
                                    </td>
                                    <td><small>{!! $Car->destination  !!}</small></td>

                                    @if($Car->title==1)
                                    <td>
                                        <small>YES<small>
                                    </td>
                                    @else
                                    <td style="background-color:#cc6969">
                                        <small>NO</small>
                                    </td>
                                    @endif

                                    @if($Car->key==1)
                                    <td>
                                        <small>YES<small>
                                    </td>
                                    @else
                                    <td style="background-color:#cc6969">
                                        <small>NO</small>
                                    </td>
                                    @endif
                                    <td><small>$  {!! $Car->price  !!}</small></td>
                                    <td><small>{!! $Car->status  !!}</small></td>
                                    <td><small>{!! $Car->terminal  !!}</small></td>

                                    <!-- <td class="text-center">
                                        <a class="btn btn-sm success"
                                        href="{{ route("carsEdit",["id"=>$Car->id]) }}">
                                            <small><i class="material-icons">&#xe3c9;</i> {{ trans('backLang.edit') }}
                                            </small>
                                        </a>
                                        @if(@Auth::user()->permissionsGroup->webmaster_status)
                                            <button class="btn btn-sm warning" data-toggle="modal"
                                                    data-target="#m-{{ $Car->id }}" ui-toggle-class="bounce"
                                                    ui-target="#animate">
                                                <small><i class="material-icons">&#xe872;</i> {{ trans('backLang.delete') }}
                                                </small>
                                            </button>
                                        @endif


                                    </td> -->
                                    <td><div class="form-group">
                                      <textarea class="form-control" name="" id="" rows="1" cols="2"></textarea>
                                    </div></td>
                                </tr>
                                <!-- .modal -->
                                <div id="m-{{ $Car->id }}" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog" id="animate">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                            </div>
                                            <div class="modal-body text-center p-lg">
                                                <p>
                                                    {{ trans('backLang.confirmationDeleteMsg') }}
                                                    <br>
                                                    <strong>[ {{ $Car->vin }} ]</strong>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark-white p-x-md"
                                                        data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                                <a href="{{ route("carsDestroy",["id"=>$Car->id]) }}"
                                                class="btn danger p-x-md">{{ trans('backLang.yes') }}</a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- / .modal -->
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <footer class="dker p-a">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <!-- .modal -->
                                <div id="m-all" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog" id="animate">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                            </div>
                                            <div class="modal-body text-center p-lg">
                                                <p>
                                                    {{ trans('backLang.confirmationDeleteMsg') }}
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark-white p-x-md"
                                                        data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                                <button type="submit"
                                                        class="btn danger p-x-md">{{ trans('backLang.yes') }}</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- / .modal -->
                                @if(@Auth::user()->permissionsGroup->webmaster_status)
                                    <select name="action" id="action" class="input-sm form-control w-sm inline v-middle"
                                            required>
                                        <option value="">{{ trans('backLang.bulkAction') }}</option>
                                        <option value="delete">{{ trans('backLang.deleteSelected') }}</option>
                                    </select>
                                    <button type="submit" id="submit_all"
                                            class="btn btn-sm white">{{ trans('backLang.apply') }}</button>
                                    <button id="submit_show_msg" class="btn btn-sm white" data-toggle="modal"
                                            style="display: none"
                                            data-target="#m-all" ui-toggle-class="bounce"
                                            ui-target="#animate">{{ trans('backLang.apply') }}
                                    </button>
                                @endif
                            </div>

                            <div class="col-sm-3 text-center">
                                <small class="text-muted inline m-t-sm m-b-sm">{{ trans('backLang.showing') }} {{ $Cars->firstItem() }}
                                    -{{ $Cars->lastItem() }} {{ trans('backLang.of') }}
                                    <strong>{{ $Cars->total()  }}</strong> {{ trans('backLang.records') }}</small>
                            </div>
                            <div class="col-sm-6 text-right text-center-xs">
                                {!! $Cars->links() !!}
                            </div>
                        </div>
                    </footer>
                    {{Form::close()}}
 
                @endif
                </div>
                <div id="statistic" class="tab-pane fade" role="tabpanel" aria-labelledby="statistic-tab">
                    <div class="" style="padding:2% 0% 5% 2%">
                    Containers : <br>
                    Count :
                    </div>
                </div>
            </div>
        
       

     
        </div>
    </div>
 
@endsection
@section('footerInclude')
                        
    <script type="text/javascript">
       $( window ).load(function() {
            if (window.location.href.indexOf('reload')==-1) {
                window.location.replace(window.location.href+'?reload');
            }
        });
     
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#action").change(function () {
            if (this.value == "delete") {
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });
    </script>
@endsection
