@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.add_student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.add_student') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.add_student') }}</li>
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
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h4 class="text-control text-primary">{{ trans('main_trans.personal_information') }}</h4>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="text-control">{{ trans('main_trans.Email') }} :</label>
                            <input type="text" name="email" class="form-control">
                            <br>
                            <label class="text-control">{{ trans('main_trans.student_name_ar') }} :</label>
                            <input type="text" name="name_ar" class="form-control">
                        </div>
                        <div class="col">
                            <label class="text-control">{{ trans('main_trans.Password') }} :</label>
                            <input type="password" name="password" class="form-control">
                            <br>
                            <label class="text-control">{{ trans('main_trans.student_name_en') }} :</label>
                            <input type="text" name="name_en" class="form-control">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.Nationality_id') }} :</label>
                                <select class="custom-select mr-sm-2" name="nationality_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach ( $Nationalities as $Nat )
                                        <option value="{{ $Nat->id }}">{{ $Nat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.gender') }} :</label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach ( $genders as $gender )
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.Blood_Type_id') }} :</label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach ( $bloods as $blood )
                                        <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.date_birth') }} :</label>
                                <input class="form-control date-picker-default" type="text"  id="datepicker-action" name="date_birth">
                                
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
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach ( $grades as $grade )
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.class_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="class_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.section_select') }} :</label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.student_parent') }} :</label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach ( $stu_parents as $stu_parent )
                                        <option value="{{ $stu_parent->id }}">{{ $stu_parent->fa_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="text-control">{{ trans('main_trans.academic_year') }} :</label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @php
                                    $current_year = date("Y");
                                    @endphp
                                    @for ($year = $current_year; $year<=$current_year +1 ;$year++ )
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <label class="text-control"><h5 style="color: rgb(0, 153, 255)">{{ trans('main_trans.Choose') }} ...</h5></label>
                        <input type="file" class="form-control" name="photos[]" accept="image/*" multiple>
                    </div>
                    <br><br>
                    <button type="submit" class="button x-small">{{ trans('main_trans.save') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('select[name="garde_id"]').on('change', function () {
            var garde_id = $(this).val();
            if (garde_id) {
                $.ajax({
                    url: "{{ URL::to('getSchoolClass') }}/" + garde_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('select[name="class_id"]').on('change', function () {
            var class_id = $(this).val();
            if (class_id) {
                $.ajax({
                    url: "{{ URL::to('getSection') }}/" + class_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
