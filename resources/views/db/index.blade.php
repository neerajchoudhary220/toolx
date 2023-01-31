@extends('layout.master')
@section('contents')
    <ol class="breadcrumb breadcrumb-bg-deep-orange align-right">
        <li class="active"><a href="javascript:void(0);"><i class="material-icons">storage</i> DB</a></li>
    </ol>

    <div class="card grid-margin">
        <div class="header">
            <h3 style="    color: #ff5722;"> Database Operation</h3>
        </div>
        <div class="card-body" style="padding:2%">
            <div class="panel panel-danger bg-danger">
                <div class="panel-heading" role="tab" id="headingTwo_1">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1"
                            href="#collapseTwo_1" aria-expanded="false" aria-controls="collapseTwo_1">
                            DB LIST ({{ count($dblist) }})
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1"
                    aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">


                        <div class="row">
                            @foreach ($dblist as $db)

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box bg-deep-orange hover-expand-effect" style="cursor: pointer">
                                        <div class="icon">
                                            <i class="material-icons">storage</i>
                                        </div>
                                        <div class="content">
                                            <div class="text">{{ ucfirst($db->Database) }}</div>
                                            @php

                                                DB::select("use `$db->Database`");
                                                $tb = DB::select('show tables');
                                            @endphp
                                            <div class="number">{{ count($tb) }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
