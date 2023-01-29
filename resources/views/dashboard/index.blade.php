@extends('layout.master')
@section('contents')
    @push('custom-style')

        <ol class="breadcrumb breadcrumb-bg-deep-orange align-right">
            <li class="active"><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        </ol>

        <div class="card grid-margin">
            <div class="header">
                Buttons
            </div>
            <div class="card-body" style="padding:2%">
                <section>

                    <div class="panel panel-danger bg-danger">
                        <div class="panel-heading" role="tab" id="headingThree_2">
                            <h4 class="panel-title">

                                <div class="text-right">



                                    <button type="button" class="btn btn-danger btn-xs waves-effect waves-float addBtn">
                                        <i class="material-icons">add</i>
                                    </button>

                                </div>


                            </h4>
                        </div>
                        <div id="collapseThree_2" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree_2" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                {{-- Add --}}
                                <div class="add-form" id="addForm">
                                    <form enctype="multipart/form-data" action="{{ route('action.add') }}" method="POST">
                                        @csrf

                                        <div class="row clearfix">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="action_name" class="form-control"
                                                            placeholder="Action Button Name" value="{{ old('action_name') }}">
                                                    </div>
                                                    <span class="text-danger">{{ $errors->first('action_name') }}</span>

                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="action_path" class="form-control"
                                                            placeholder="path" value="{{ old('action_path') }}">
                                                    </div>
                                                    <span class="text-danger">{{ $errors->first('action_path') }}</span>

                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-line">
                                                    <div class="form-group">



                                                        <input type="file" name="img" accept="image/*"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                                <button type="submit"
                                                    class="btn btn-danger btn-lg m-l-15 waves-effect">ADD</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- Edit --}}
                                <div class="edit-form" id="editForm">

                                </div>
                            </div>
                        </div>
                    </div>

                </section>

                <div class="open">
                    @foreach ($action_buttons as $button)
                        <button type="button" path="{{ $button->action_path }}" class="btn waves-effect actionBtn"
                            style="margin-left: 10px">
                            <img src="{{ !empty($button->img) ? Storage::url($button->img) : asset('assets/images/icon.png') }}"
                                style="width:30px; height:30px">
                            <span>{{ $button->action_name }}</span>
                            <i class="material-icons hidden-edit-btn hidden-edit-btn-hide"
                                id="{{ $button->id }}">edit</i>
                            <i class="material-icons hidden-dlt-btn hideen-dlt-btn-hide"
                                id="{{ $button->id }}">delete</i>
                        </button>
                    @endforeach
                </div>


            </div>


        </div>
        @push('custom-scripts')
            <script>
                var Url = '{{ route('action.open') }}';
                var deleteUrl = '{{ route('action.delete') }}';
                var editUrl = "{{ route('action.edit') }}";
            </script>
            <script src="{{ asset('assets/js/buttons/open.js') }}"></script>

            @if ($errors->count() > 0)
                <script>
                    $(document).ready(function() {
                        $(".addBtn").click();

                    })
                </script>
            @endif
        @endpush
    @endsection
