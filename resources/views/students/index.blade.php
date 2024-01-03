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
                                <button type="button" class="button x-small" data-toggle="modal" data-target="#importStudents">
                                    {{ trans('main_trans.import_students_as_excel') }}
                                </button>
                                <div class="table-responsive">
                                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0" data-page-length="10"
                                        style="text-align: center">
                                        <thead>
                                            <tr class="alert-success">
                                                <th>#</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>gender</th>
                                                <th>grade</th>
                                                <th>classroom</th>
                                                <th>section</th>
                                                <th>opration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $students as $student)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->genders->name }}</td>
                                                <td>{{ $student->grades->name }}</td>
                                                <td>{{ $student->schoolClasses->name }}</td>
                                                <td>{{ $student->sections->name }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ trans('main_trans.operation') }}<i class="fa fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <a class="dropdown-item" href="{{ route('students.edit',$student->id) }}"><i
                                                                class="text-primary fa fa-edit"></i>
                                                                {{ trans('main_trans.edit') }}
                                                            </a>
                                                            <a class="dropdown-item" href="{{ route('students.show',$student->id) }}"><i
                                                                class="text-success fa fa-eye"></i>
                                                                {{ trans('main_trans.show') }}
                                                            </a>
                                                            <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#deleteStudent{{ $student->id }}" ><i
                                                                class="text-danger fa fa-trash"></i>
                                                                {{ trans('main_trans.delete') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('students.deleteStudent')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @include('students.importStudents')
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
