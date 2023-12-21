@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.students_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.students_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a></li>
                <li class="breadcrumb-item active"> {{ trans('main_trans.students_list') }}</li>
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
                <!--student data-table -->
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0" data-page-length="10"
                                        style="text-align: right">
                                        <thead>
                                            <tr class="alert-success">
                                                <th>#</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ trans('main_trans.operation') }}<i class="fa fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#edit" ><i
                                                                class="text-primary fa fa-edit"></i>
                                                                {{ trans('main_trans.edit') }}
                                                            </button>
                                                            <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#delete" ><i
                                                                class="text-danger fa fa-trash"></i>
                                                                {{ trans('main_trans.delete') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- data-table -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
