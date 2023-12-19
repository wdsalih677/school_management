{{-- start add section Modal --}}
<div class="modal fade bd-example-modal-lg" id="addSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
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
                    <form action="{{ route('sections.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label class="text-control">{{ trans('main_trans.section_name_ar') }} :</label>
                                <input type="text" name="name_ar" class="form-control">
                                <br>
                                <label class="text-control">{{ trans('main_trans.grade_select') }} :</label>
                                <select class="form-control" name="grade_id">
                                    @foreach ( $grades as $grade )   
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="text-control">{{ trans('main_trans.section_name_en') }} :</label>
                                <input type="text" name="name_en" class="form-control">
                                <br>
                                <label class="text-control">{{ trans('main_trans.class_name') }} :</label>
                                <select class="form-control" name="class_id">
                                    
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col">
                                <label class="text-control">{{ trans('main_trans.teachers_select') }} :</label>
                                <select class="form-control" name="teacher_id[]" multiple>
                                    @foreach ( $teachers as $teacher )   
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                           </div>
                        </div>
                        <br><br>
                        <button type="submit" class="button x-small">
                            {{ trans('main_trans.save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end add section Modal --}}