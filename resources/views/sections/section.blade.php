@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.sections') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.sections_lists') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.sections') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.sections_lists') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="button" class="button x-small" data-toggle="modal" data-target="#addSection">
                    {{ trans('main_trans.add_section') }}
                </button><br><br>
                <div class="accordion accordion-border">
                    @foreach ( $grades as $grade )
                    <div class="acd-group">
                        <a href="#" class="acd-heading">{{ $grade->name }}</a>
                        <!-- data-table -->
                        <div class="row">
                            <div class="col-md-12 mb-30">
                                <div class="card card-statistics h-100">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="table" class="table  table-hover table-sm table-bordered p-0 text-center" data-page-length="10" style="text-align: right">
                                                <thead>
                                                    <tr class="alert-success">
                                                        <th>#</th>
                                                        <th>{{ trans('main_trans.sections') }}</th>
                                                        <th>{{ trans('main_trans.classroom') }}</th>
                                                        <th>{{ trans('main_trans.status') }}</th>
                                                        <th>{{ trans('main_trans.operation') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach ( $grade->sections as $grade_list)
                                                    <tr>
                                                        <?php $i++ ?>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $grade_list->name }}</td>
                                                        <td>{{ $grade_list->schoolClasses->name }}</td>
                                                        <td>
                                                            @if ($grade_list->status == 0)
                                                                <label class="text-danger">{{ trans('main_trans.not_active') }}</label>
                                                            @else
                                                                <label class="text-primary">{{ trans('main_trans.active') }}</label>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button aria-expanded="false" aria-haspopup="true"class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ trans('main_trans.operation') }}<i class="fa fa-caret-down ml-1"></i></button>
                                                                <div class="dropdown-menu tx-13">
                                                                    <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#editSection{{ $grade_list->id }}" ><i
                                                                        class="text-primary fa fa-edit"></i>
                                                                        {{ trans('main_trans.edit') }}
                                                                    </button>
                                                                    <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#deleteSection{{ $grade_list->id }}" ><i
                                                                        class="text-danger fa fa-trash"></i>
                                                                        {{ trans('main_trans.delete') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('sections.editSection')
                                                    @include('sections.deleteSection')
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    @endforeach
                </div>
                @include('sections.addSection')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('select[name="grade_id"]').on('change', function () {
            var grade_id = $(this).val();
            if (grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
