@extends('layouts.master')
@section('css')

@section('title')
{{ trans('main_trans.show_student') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('main_trans.show_student') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.students') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.show_student') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

  <div class="col-md-12 mb-30">
      <div class="card card-statistics h-100">
          <div class="card-body">
              <div class="card-body">
                  <div class="tab nav-border">
                      <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                 role="tab" aria-controls="home-02"
                                 aria-selected="true"><i class="fa fa-user"></i>  {{trans('main_trans.details_student')}}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                 role="tab" aria-controls="profile-02"
                                 aria-selected="false"><i class="fa fa-picture-o"></i>  {{trans('main_trans.attach_student')}}</a>
                          </li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane fade active show" id="home-02" role="tabpanel" aria-labelledby="home-02-tab">
                            <h4 class="text-control text-primary">{{ trans('main_trans.personal_information') }}</h4>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id" value="{{ $students->id }}">
                                    <label class="text-control">{{ trans('main_trans.Email') }} :</label>
                                    <input type="text" value="{{ $students->email }}" name="email" class="form-control" disabled>
                                    <br>
                                    <label class="text-control">{{ trans('main_trans.student_name_ar') }} :</label>
                                    <input type="text" value="{{ $students->getTranslation('name','ar') }}" name="name_ar" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <label class="text-control">{{ trans('main_trans.Password') }} :</label>
                                    <input type="password" value="{{ $students->password }}" name="password" class="form-control" disabled>
                                    <br>
                                    <label class="text-control">{{ trans('main_trans.student_name_en') }} :</label>
                                    <input type="text" value="{{ $students->getTranslation('name','en') }}" name="name_en" class="form-control" disabled>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.Nationality_id') }} :</label>
                                        <select class="custom-select mr-sm-2" name="nationality_id"  disabled>
                                            @foreach ( $Nationalities as $Nat )
                                                <option value="{{ $Nat->id }}" {{ $Nat->id == $students->nationality_id ? 'select' : '' }}>{{ $Nat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.gender') }} :</label>
                                        <select class="custom-select mr-sm-2" name="gender_id"  disabled>
                                            @foreach ( $genders as $gender )
                                                <option value="{{ $gender->id }}" {{ $gender->id == $students->gender_id ? 'select' : '' }}>{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.Blood_Type_id') }} :</label>
                                        <select class="custom-select mr-sm-2" name="blood_id"  disabled>
                                            @foreach ( $bloods as $blood )
                                                <option value="{{ $blood->id }}" {{ $blood->id == $students->blood_id ? 'select' : '' }}>{{ $blood->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.date_birth') }} :</label>
                                        <input class="form-control date-picker-default" value="{{ $students->date_birth }}" type="text"  id="datepicker-action" name="date_birth"  disabled>
                                        
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
                                        <select class="custom-select mr-sm-2" name="garde_id"  disabled>
                                            @foreach ( $grades as $grade )
                                                <option value="{{ $grade->id }}" {{ $grade->id = $students->grade_id ? 'select' : '' }}>{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.class_select') }} :</label>
                                        <select class="custom-select mr-sm-2" name="class_id" disabled>
                                            @foreach ( $schoolClasses as $i )
                                                <option value="{{ $i->id }}" {{ $i->id == $students->class_id ? 'select' : '' }}>{{ $i->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.section_select') }} :</label>
                                        <select class="custom-select mr-sm-2" name="section_id" disabled>
                                            @foreach ( $sections as $section )
                                                <option value="{{ $section->id }}" {{ $section->id == $students->section_id ? 'select' : ''}}>{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.student_parent') }} :</label>
                                        <select class="custom-select mr-sm-2" name="parent_id" disabled>
                                            @foreach ( $stu_parents as $stu_parent )
                                                <option value="{{ $stu_parent->id }}" {{ $stu_parent->id == $students->parent_id ? 'select' : '' }}>{{ $stu_parent->fa_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-control">{{ trans('main_trans.academic_year') }} :</label>
                                        <select class="custom-select mr-sm-2" name="academic_year"  disabled>
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
                          </div>

                          <div class="tab-pane fade" id="profile-02" role="tabpanel"
                               aria-labelledby="profile-02-tab">
                              <div class="card card-statistics">
                                  <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="{{ route('upload_attachment') }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <label class="text-control text-primary">{{ trans('main_trans.Choose') }}...</label>
                                                                <input type="file" class="form-control" name="photo[]" accept="image/*" multiple>
                                                                <input type="hidden" name="student_id" value="{{ $students->id  }}">
                                                                <input type="hidden" name="student_name" value="{{ $students->name }}">
                                                                <br><br>
                                                                <button class="btn btn-primary" type="submit ">{{ trans('main_trans.save') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="table-responsive">
                                                        <table id="datatable1" class="table  table-hover table-sm table-bordered p-0" data-page-length="10"
                                                            style="text-align: center">
                                                            <thead>
                                                                <tr class="alert-success">
                                                                    <th>#</th>
                                                                    <th>{{trans('main_trans.attach_student')}}</th>
                                                                    <th>{{trans('main_trans.operation')}}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              @foreach ( $students->images as $attch )
                                                              <tr>
                                                                  <td>{{ $loop->iteration }}</td>
                                                                  <td>{{ $attch->filename }}</td>
                                                                  <td>
                                                                      <div class="dropdown">
                                                                          <button aria-expanded="false" aria-haspopup="true"class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ trans('main_trans.operation') }}<i class="fa fa-caret-down ml-1"></i></button>
                                                                          <div class="dropdown-menu tx-13">
                                                                              <a class="dropdown-item" href="{{ route('download_attach' , $attch->imageable->name , $attch->filename ) }}"><i class="text-primary fa fa-download"></i>
                                                                                  {{ trans('main_trans.download') }}
                                                                              </a>
                                                                              <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#delete" ><i
                                                                                  class="text-danger fa fa-trash"></i>
                                                                                  {{ trans('main_trans.delete') }}
                                                                              </button>
                                                                          </div>
                                                                      </div>
                                                                  </td>
                                                              </tr>
                                                              @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
<!-- row closed -->
@endsection
@section('js')

@endsection
