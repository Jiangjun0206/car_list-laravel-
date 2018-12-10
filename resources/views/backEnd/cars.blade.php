@extends('backEnd.layout')

@section('content')
    

    <div class="padding">
        <div class="box">

            <div class="box-header dker">
                <h3>Cars</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ trans('backLang.home') }}</a> /
                    <a href="">{{ trans('backLang.settings') }}</a>
                </small>
            </div>

            @if($Cars->total() >0)
                @if(@Auth::user()->permissionsGroup->webmaster_status)
                    <div class="row p-a pull-right" style="margin-top: -70px;">
                        <div class="col-sm-12">
                            <a class="btn btn-fw primary" href="{{route("carsCreate")}}">
                                <i class="fa fa-plus" style="font-size:70%"></i> <i class="fa fa-car"></i>
                                &nbsp; New Car
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            @if($Cars->total() == 0)
                <div class="row p-a">
                    <div class="col-sm-12">
                        <div class=" p-a text-center ">
                            {{ trans('backLang.noData') }}
                            <br>
                            @if(@Auth::user()->permissionsGroup->webmaster_status)
                                <br>
                                <a class="btn btn-fw primary" href="{{route("carsCreate")}}">
                                    <i class="fa fa-car"></i> 
                                    &nbsp; New Car
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            @if($Cars->total() > 0)
                {{Form::open(['route'=>'carsUpdateAll','method'=>'post'])}}
                <div class="table-responsive">
                    <table class="table table-striped  b-t">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="ui-check m-a-0">
                                    <input id="checkAll" type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Car Image</th>
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
                            <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($Cars as $Car)
                            <tr>
                                <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="{{ $Car->car_id }}"><i
                                                class="dark-white"></i>
                                        {!! Form::hidden('row_ids[]',$Car->car_id, array('class' => 'form-control row_no')) !!}
                                    </label>
                                </td>
                                <td><img src="/uploads/cars/{!! $Car->image  !!}" alt="" width="40px" height="40px" style="border-radius:3em"></td>
                                <td>
                                 
                                        {!! $Car->delivery_data   !!}
                               
                                </td>

                                <td>
                                    <small>{!! $Car->description   !!}</small>
                                </td>
                                <td>
                                    <small>{!! $Car->vin  !!}</small>
                                </td>
                                <td>
                                    <small>{!! $Car->user_id  !!}</small>
                                </td>
                                <td>
                                    <small>{!! $Car->destination  !!}</small>
                                </td>
                                <td>
                                    <small>
                                    @if($Car->title==1)
                                        YES
                                    @else
                                        NO
                                    @endif</small>
                                </td>
                                <td>
                                    <small>
                                    @if($Car->key==1)
                                        YES
                                    @else
                                        NO
                                    @endif
                                    </small>
                                </td>
                                <td>
                                    <small>$  {!! $Car->price  !!}</small>
                                </td>
                                <td>
                                    <small>{!! $Car->status  !!}</small>
                                </td>
                                <td>
                                    <small>{!! $Car->terminal  !!}</small>
                                </td>
                            
                               
    
                                <td class="text-center">
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


                                </td>
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
                                    <option value="activate">{{ trans('backLang.activeSelected') }}</option>
                                    <option value="block">{{ trans('backLang.blockSelected') }}</option>
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
    </div>
 
@endsection
@section('footerInclude')
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
@endsection
