<!-- start edit grade modal -->
<div class="modal fade" id="edit{{ $grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.add_grade') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grades.update',$grade->id) }}" method="POST">
                    {{ method_field('patch') }}
                    @csrf
                <input type="hidden" name="id" value="{{ $grade->id }}">
                <div class="row">
                    <div class="col">
                        <label class="text-control">{{ trans('main_trans.grade_name_ar') }} :</label>
                        <input type="text" class="form-control" name="name_ar" value="{{ $grade->getTranslation('name','ar') }}" autocomplete="off">
                    </div>
                    <div class="col">
                        <label class="text-control">{{ trans('main_trans.grade_name_en') }} :</label>
                        <input type="text" class="form-control" name="name_en" value="{{ $grade->getTranslation('name','en') }}" autocomplete="off">
                    </div>
                </div>
                <label class="text-control">{{ trans('main_trans.notes') }} :</label>
                <textarea name="notes" class="form-control" cols="10" rows="5">{{ $grade->notes }}</textarea>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ trans('main_trans.save_updates') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end edit grade modal -->