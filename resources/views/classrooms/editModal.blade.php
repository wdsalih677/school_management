{{--start edit classroom Modal --}}
<div class="modal fade bd-example-modal-lg" id="editClassroomModal{{ $schoolClass->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('main_trans.edit_classroom') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-xl-12">
                <div class="card-body">
                    <form action="{{ route('school_classrooms.update','id') }}" method="POST">
                        {{ method_field('patch') }}
                        @csrf
                        <input type="hidden" name="id" value="{{ $schoolClass->id }}">
                        <div class="repeater">
                            <div data-repeater-list="class_lists">
                                <div data-repeater-item>
                                    <div class=" row mb-30">
                                        <div class="col">
                                            <label class="text-control">{{ trans('main_trans.class_name_en') }} :</label>
                                            <input class="form-control" type="text" value="{{ $schoolClass->getTranslation('name','en') }}" name="name_en"/>
                                        </div>
                                        <div class="col">
                                            <label class="text-control">{{ trans('main_trans.class_name_ar') }} :</label>
                                            <input class="form-control" type="text" value="{{ $schoolClass->getTranslation('name','ar') }}" name="name_ar"/>
                                        </div>
                                        <div class="col">
                                            <div class="box">
                                                <label class="text-control">{{ trans('main_trans.grade_select') }} :</label>
                                                <select name="grade_id" class="fancyselect">
                                                    <option value="{{ $schoolClass->grades->id }}">{{ $schoolClass->grades->name }}</option>
                                                    @foreach ( $grades as $grade )
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button x-small">
                            {{ trans('main_trans.save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end add classroom Modal --}}