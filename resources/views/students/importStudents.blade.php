<!-- normal modal -->
<div class="modal fade" id="importStudents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.students_as_excel') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('uploadStudents') }}" method="POST"  enctype='multipart/form-data'>
                @csrf
                <div class="modal-body">
                    <div class="mt-15">
                        <input type="file" class="form-control" name="studentData">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ trans('main_trans.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- normal modal -->