@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.edit_student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.edit_student') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.edit_student') }}</li>
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
                <form action="{{ route('students.update' , $students->id) }}" method="POST">
                    {{ method_field('patch') }}
                    @csrf
                    <h4 class="text-control text-primary">{{ trans('main_trans.personal_information') }}</h4>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id" value="{{ $students->id }}">
                            <label class="text-control">{{ trans('main_trans.Email') }} :</label>
                            <input type="text" value="{{ $students->email }}" name="email" class="form-control">
                            <br>
                            <label class="text-control">{{ trans('main_trans.student_name_ar') }} :</label>
                            <input type="text" value="{{ $students->getTranslation('name','ar') }}" name="name_ar" class="form-control">
                        </div>
                        <div class="col">
                            <label class="text-control">{{ trans('main_trans.Password') }} :</label>
                            <input type="password" value="{{ $students->password }}" name="password" class="form-control">
                            <br>
                            <label class="text-control">{{ trans('main_trans.student_name_en') }} :</label>
                            <input type="text" value="{{ $students->getTranslation('name','en') }}" name="name_en" class="form-control">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.Nationality_id') }} :</label>
                                <select class="custom-select mr-sm-2" name="nationality_id">
                                    @foreach ( $Nationalities as $Nat )
                                        <option value="{{ $Nat->id }}" {{ $Nat->id == $students->nationality_id ? 'select' : '' }}>{{ $Nat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.gender') }} :</label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    @foreach ( $genders as $gender )
                                        <option value="{{ $gender->id }}" {{ $gender->id == $students->gender_id ? 'select' : '' }}>{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.Blood_Type_id') }} :</label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    @foreach ( $bloods as $blood )
                                        <option value="{{ $blood->id }}" {{ $blood->id == $students->blood_id ? 'select' : '' }}>{{ $blood->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.date_birth') }} :</label>
                                <input class="form-control date-picker-default" value="{{ $students->date_birth }}" type="text"  id="datepicker-action" name="date_birth">
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-control text-primary">{{ trans('main_trans.student_information') }}</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.grade_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="garde_id">
                                    @foreach ( $grades as $grade )
                                        <option value="{{ $grade->id }}" {{ $grade->id = $students->grade_id ? 'select' : '' }}>{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.class_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="class_id">
                                    @foreach ( $schoolClasses as $i )
                                        <option value="{{ $i->id }}" {{ $i->id == $students->class_id ? 'select' : '' }}>{{ $i->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.section_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    @foreach ( $sections as $section )
                                        <option value="{{ $section->id }}" {{ $section->id == $students->section_id ? 'select' : ''}}>{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.student_parent') }} :</label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    @foreach ( $stu_parents as $stu_parent )
                                        <option value="{{ $stu_parent->id }}" {{ $stu_parent->id == $students->parent_id ? 'select' : '' }}>{{ $stu_parent->fa_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.academic_year') }} :</label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for ($year = $current_year; $year<=$current_year +1 ;$year++ )
                                        <option value="{{ $year }}" {{ $year == $students->academic_year ? 'select' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="button x-small">{{ trans('main_trans.save_updates') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
