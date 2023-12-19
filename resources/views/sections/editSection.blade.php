{{-- start add section Modal --}}
<div class="modal fade bd-example-modal-lg" id="editSection{{ $grade_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.add_section') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-xl-12">
                <div class="card-body">
                    <form action="{{ route('sections.update',$grade_list->id) }}" method="POST">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="hidden" name="id" value="{{ $grade_list->id }}">
                        <div class="row">
                            <div class="col">
                                <label class="text-control">{{ trans('main_trans.section_name_ar') }} :</label>
                                <input type="text" name="name_ar" class="form-control" value="{{ $grade_list->getTranslation('name','ar') }}">
                                <br>
                                <label class="text-control">{{ trans('main_trans.grade_select') }} :</label>
                                <select class="form-control" name="grade_id">
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @foreach ( $grade_lists as $grade )   
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="text-control">{{ trans('main_trans.section_name_en') }} :</label>
                                <input type="text" name="name_en" class="form-control" value="{{ $grade_list->getTranslation('name','en') }}">
                                <br>
                                <label class="text-control">{{ trans('main_trans.class_name') }} :</label>
                                <select class="form-control" name="class_id">
                                    <option value="{{ $grade_list->schoolClasses->id }}">{{ $grade_list->schoolClasses->name }}</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <div class="control-group" id="toastTypeGroup">
                                <div class="controls">
                                <label class="d-block mb-2">{{ trans('main_trans.status') }}  :</label>
                                <label class="radio mb-2">
                                    <input type="radio" name="status" value="1" {{ $grade_list->status === 1 ? 'checked' : '' }} />{{ trans('main_trans.active') }}
                                </label>
                                <label class="radio mb-2">
                                    <input type="radio" name="status" value="0" {{ $grade_list->status === 0 ? 'checked' : '' }} />{{ trans('main_trans.not_active') }}
                                </label>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col">
                                <label class="text-control">{{ trans('main_trans.teachers_select') }} :</label>
                                <select class="form-control" name="teacher_id[]" multiple>
                                    @php
                                        $selectedTeacherId = $grade_list->teachers['id'] ?? null;
                                    @endphp
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $selectedTeacherId == $teacher->id ? 'selected' : '' }} >{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" class="button x-small">
                            {{ trans('main_trans.save_updates') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end add section Modal --}}