{{-- add Modal --}}
<div class="modal fade bd-example-modal-lg" id="editTeacher{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.edit_teacher') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-xl-12">
                <div class="card-body">
                    <form action="{{ route('teachers.update', $teacher->id) }}" method="post">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="text" name="id" value="{{ $teacher->id }}">
                       <div class="form-row">
                           <div class="col">
                               <label for="title">{{ trans('main_trans.Email') }} :</label>
                               <input type="email" name="email" class="form-control" value="{{ $teacher->email }}">
                               @error('email')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                           <div class="col">
                               <label for="title">{{ trans('main_trans.Password') }} :</label>
                               <input type="password" name="password" class="form-control" value="{{ $teacher->password }}">
                               @error('password')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>
                       <br>
                       <div class="form-row">
                           <div class="col">
                               <label for="title">{{ trans('main_trans.teacherName_ar') }} :</label>
                               <input type="text" name="name_ar" class="form-control" value="{{ $teacher->getTranslation('name','ar') }}">
                               @error('')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                           <div class="col">
                               <label for="title">{{ trans('main_trans.teacherName_en') }} :</label>
                               <input type="text" name="name_en" class="form-control" value="{{ $teacher->getTranslation('name','en') }}">
                               @error('')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>
                       <br>
                       <div class="form-row">
                           <div class="form-group col">
                               <label for="inputCity">{{ trans('main_trans.gender') }} :</label>
                               <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                   @foreach ( $genders as $gender )
                                        <option value="{{ $gender->id }}" {{ $teacher->genders->id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                                   @endforeach
                               </select>
                               @error('gender_id')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                           <div class="form-group col">
                               <label for="inputState">{{ trans('main_trans.specialty') }}</label>
                               <select class="custom-select my-1 mr-sm-2" name="specialty_id">
                                   @foreach ( $specialties as $specialty )
                                        <option value="{{ $specialty->id }}" {{ $teacher->specialties->id == $specialty->id ? 'selected' : '' }}>{{ $specialty->name }}</option>
                                   @endforeach
                               </select>
                               @error('specialty_id')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>
                       <br>
                       <div class="form-row">
                           <div class="col">
                               <label for="title">{{ trans('main_trans.joining_date') }} :</label>
                               <div class='input-group date'>
                                   <input class="form-control" type="text" value="{{ $teacher->joining_date }}"  id="datepicker-action" name="joining_date" data-date-format="yyyy-mm-dd"  required>
                               </div>
                               @error('joining_date')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                       </div>
                       <br>
                       <div class="form-group">
                           <label for="exampleFormControlTextarea1">{{ trans('main_trans.address') }} :</label>
                           <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="4">{{ $teacher->address }}</textarea>
                           @error('')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <button type="submit" class="button x-small">{{ trans('main_trans.save_updates') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- add Modal --}}