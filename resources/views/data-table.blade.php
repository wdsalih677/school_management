<!-- data-table -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0" data-page-length="10"
                        style="text-align: right">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                            </tr>
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true"class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ trans('main_trans.operation') }}<i class="fa fa-caret-down ml-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#edit" ><i
                                            class="text-primary fa fa-edit"></i>
                                            {{ trans('main_trans.edit') }}
                                        </button>
                                        <button class="dropdown-item" data-reg_id="" data-toggle="modal" data-target="#delete" ><i
                                            class="text-danger fa fa-trash"></i>
                                            {{ trans('main_trans.delete') }}
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- data-table -->