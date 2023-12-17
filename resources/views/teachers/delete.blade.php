<!-- start delete teacher modal -->
<div class="modal fade" id="deleteTeacher{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.delete_section') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">
                    {{ method_field('delete') }}
                    @csrf
                <input type="hidden" name="id" value="{{ $teacher->id }}">
                <div class="row">
                    <div class="col">
                        <label class="text-control">{{ trans('main_trans.teacherName_ar') }} :</label>
                        <input type="text" class="form-control" value="{{ $teacher->getTranslation('name','ar') }}" autocomplete="off" disabled>
                    </div>
                    <div class="col">
                        <label class="text-control">{{ trans('main_trans.teacherName_en') }} :</label>
                        <input type="text" class="form-control" value="{{ $teacher->getTranslation('name','en') }}" autocomplete="off" disabled>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{ trans('main_trans.delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end delete teacher modal -->