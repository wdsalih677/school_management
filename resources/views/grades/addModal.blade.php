<!-- start add grade modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.add_grade') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grades.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <label class="text-control">{{ trans('main_trans.grade_name_ar') }} :</label>
                        <input type="text" class="form-control" name="name_ar" autocomplete="off">
                    </div>
                    <div class="col">
                        <label class="text-control">{{ trans('main_trans.grade_name_en') }} :</label>
                        <input type="text" class="form-control" name="name_en" autocomplete="off">
                    </div>
                </div>
                <label class="text-control">{{ trans('main_trans.notes') }} :</label>
                <textarea name="notes" class="form-control" cols="10" rows="5"></textarea>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ trans('main_trans.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add grade modal -->