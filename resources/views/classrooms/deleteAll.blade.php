<!-- start delete classroom modal -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.delete_grade') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('delete_all_class') }}" method="POST">
                    {{ method_field('delete') }}
                    @csrf
                <input type="hidden" name="delete_all_id" id="delete_all_id">
                <div class="row">
                    <div class="col">
                        <label class="text-control">{{ trans('main_trans.deleteAllGrades') }}</label>
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
<!-- end delete classroom modal -->