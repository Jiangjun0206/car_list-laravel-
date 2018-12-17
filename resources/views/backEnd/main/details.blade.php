@extends('backEnd.layout')

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
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">View Containers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">My Vehicles</a></li>
                    <li class="nav-item"><a class="nav-link" href="#item-1-3" id="item-1-3-tab" data-toggle="tab" role="tab" aria-controls="item-1-3" aria-selected="false">Statistic</a></li>
                </ul>
             </div>
            <div id="nav-tabContent" class="tab-content">
                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                    @if($Containers->total() > 0)
                    {{Form::open(['route'=>'ContainersUpdateAll','method'=>'post'])}}
                    <div class="table-responsive">
                        <table class="table table-striped  b-t">
                            <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="ui-check m-a-0">
                                        <input id="checkAll" type="checkbox"><i></i>
                                    </label>
                                </th>
                                <td>Image</td>
                                <th>Number</th>
                                <th>Details</th>
                                <th>Shipping line</th>
                                <th>Dates</th>
                                <th>Status</th>
                            
                                <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
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
                                    
                                
                                
        
                                    <td class="text-center">
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


                                    </td>
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
                <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                    <h4>Innovative Product Engineering | Trailblazing Direct Routes to Solutions.</h4>
                    <p>Tailoring existing technologies to meet client demands is a well beaten path in the electronics engineering world. We derive and engineer solutions that are brand new to introduce additional security and robust performance. Existing technology is utilized when appropriate, but never as a starting point. The most powerful solutions are often the application specific ones. From ASICS to Custom Interconnects we're trailblazing to take you directly where you need to go without taking the long way around.</p>
                </div>
                <div id="item-1-3" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-3-tab">
                    <h4>Unified Systems Architecture | Genetic Security. Robust Performance.</h4>
                    <p>With extreme industry-wide growth in connected hardware and software, we're bedding down and focusing on security and uniformity. If a new security solution or performance enhancement is installed in one room of the house it needs to be mirrored in the others without re-engineering entire systems or lengthy deplyoments. Connectivity is the new law and entire product families require compatability and connectivity. These concepts are implemented at the genetic level with our engineering solutions and products.</p>
                </div>
            </div>
        
       

     
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
