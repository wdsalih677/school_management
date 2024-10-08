                {{--start add classroom Modal --}}
                <div class="modal fade bd-example-modal-lg" id="classroomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                    {{ trans('main_trans.add_classroom') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body col-xl-12">
                                <div class="card-body">
                                    <form action="{{ route('school_classrooms.store') }}" method="POST">
                                        @csrf
                                        <div class="repeater">
                                            <div data-repeater-list="class_lists">
                                                <div data-repeater-item>
                                                    <div class=" row mb-30">
                                                        <div class="col">
                                                            <label class="text-control">{{ trans('main_trans.class_name_en') }} :</label>
                                                            <input class="form-control" type="text" name="name_en"/>
                                                        </div>
                                                        <div class="col">
                                                            <label class="text-control">{{ trans('main_trans.class_name_ar') }} :</label>
                                                            <input class="form-control" type="text" name="name_ar"/>
                                                        </div>
                                                        <div class="col">
                                                            <div class="box">
                                                                <label class="text-control">{{ trans('main_trans.grade_select') }} :</label>
                                                                <select name="grade_id" class="fancyselect">
                                                                    @foreach ( $grades as $grade )   
                                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="d-grid">
                                                                <input class="btn btn-danger mt-40" data-repeater-delete type="button" value="{{ trans('main_trans.delete') }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-20">
                                                <div class="col-12">
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                        <input class="button" data-repeater-create type="button" value="{{ trans('main_trans.add') }}"/>
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