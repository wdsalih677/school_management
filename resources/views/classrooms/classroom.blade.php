@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.classroom_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.classroom') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.classroom') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.classroom_list') }}</li>
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
                <button type="button" class="button x-small" data-toggle="modal" data-target="#classroomModal">
                    {{ trans('main_trans.add') }}
                </button>
                <button type="button" class="button x-small" id="btn_delete_all" >
                    {{ trans('main_trans.deleteAll') }}
                </button>
                <br><br>
                <form action="{{ route('fillterClass') }}" method="POST">
                    @csrf
                    <select class="form-control" name="grade_id" onchange="this.form.submit()" required style="width: 20%; height: 50px; background-color: #84ba3f; border-radius: 4px; color: white;">
                        <option selected disabled>{{ trans('main_trans.search_grade') }}</option>
                        @foreach ( $grades as $grade )
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>
                </form>
                <br>
                <br>
                {{-- end add grade bottun --}}
                <!--classroom data-table -->
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0 text-center" data-page-length="10"
                                        style="text-align: right">
                                        <thead>
                                            <tr class="alert-success">
                                                <th><input type="checkbox" name="" id="example-select-all" onclick="checkAll('box1', this)"></th>
                                                <th>#</th>
                                                <th>{{ trans('main_trans.class_name') }}</th>
                                                <th>{{ trans('main_trans.school_grade') }}</th>
                                                <th>{{ trans('main_trans.operation') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>

                                            @if (isset($searchClass))

                                                <?php $class_lists = $searchClass ?>

                                            @else

                                                <?php $class_lists = $schoolClasses ?>

                                            @endif


                                            @foreach ( $class_lists as $schoolClass )
                                            <tr>
                                                <?php $i++ ?>
                                                <td><input type="checkbox" value="{{ $schoolClass->id }}" class="box1"></td>
                                                <td>{{ $i }}</td>
                                                <td>{{ $schoolClass->name }}</td>
                                                <td>{{ $schoolClass->grades->name }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button aria-expanded="false" aria-haspopup="true"class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ trans('main_trans.operation') }}<i class="fa fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#editClassroomModal{{ $schoolClass->id }}" ><i
                                                                class="text-primary fa fa-edit"></i>
                                                                {{ trans('main_trans.edit') }}
                                                            </button>
                                                            <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#classroomDelete{{ $schoolClass->id }}" ><i
                                                                class="text-danger fa fa-trash"></i>
                                                                {{ trans('main_trans.delete') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('classrooms.editModal')
                                            @include('classrooms.deleteModal')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--classroom data-table -->
                @include('classrooms.addModal')
                @include('classrooms.deleteAll')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection