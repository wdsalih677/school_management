@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.promotion_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.promotion_students') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.promotion_students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.promotion_students') }}</li>
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
                <form action="{{ route('stuPromotions.store') }}" method="post">
                    @csrf
                    <h4 class="text-control text-danger">{{ trans('main_trans.back_grade') }}</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.grade_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="garde_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach ( $grades as $grade )
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.class_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="class_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.section_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <h4 class="text-control text-primary">{{ trans('main_trans.next_grade') }}</h4>
                    <br> 
                    <div class="row">                     
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.grade_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="garde_id_new">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach ( $grades as $grade )
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.class_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="class_id_new">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.section_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="section_id_new">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ trans('main_trans.save') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
