@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.school_grade') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.school_grade_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.school_grade') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.school_grade_list') }}</li>
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
                {{-- start add grade bottun --}}
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('main_trans.add') }}
                </button>
                <br>
                <br>
                {{-- end add grade bottun --}}
                {{-- start grade data-table --}}
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0 text-center" data-page-length="10"
                                        style="text-align: right">
                                        <thead>
                                            <tr class="alert-success">
                                                <th>#</th>
                                                <th>{{ trans('main_trans.grades') }}</th>
                                                <th>{{ trans('main_trans.notes') }}</th>
                                                <th>{{ trans('main_trans.operation') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0 ?>
                                            @foreach ( $grades as $grade )
                                            <tr>
                                                <?php $i++ ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $grade->name }}</td>
                                                <td>{{ $grade->notes }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ trans('main_trans.operation') }}<i class="fa fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#edit{{ $grade->id }}" ><i
                                                                class="text-primary fa fa-edit"></i>
                                                                {{ trans('main_trans.edit') }}
                                                            </button>
                                                            <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#delete{{ $grade->id }}" ><i
                                                                class="text-danger fa fa-trash"></i>
                                                                {{ trans('main_trans.delete') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                                @include('grades.editModal')
                                                @include('grades.deleteModale')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end grade data-table --}}
                @include('grades.addModal')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
