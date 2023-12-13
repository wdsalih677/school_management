<!--parents data-table -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showformadd" type="button">{{ trans('main_trans.add_parents') }}</button><br><br><br>
                <div class="table-responsive">
                    <table id="datatable1" class="table  table-hover table-sm table-bordered p-0 text-center" data-page-length="10"
                        style="text-align: right">
                        <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>{{ trans('main_trans.Name_Father') }}</th>
                                <th>{{ trans('main_trans.Email') }}</th>
                                <th>{{ trans('main_trans.National_ID_Father') }}</th>
                                <th>{{ trans('main_trans.Passport_ID_Father') }}</th>
                                <th>{{ trans('main_trans.Phone_Father') }}</th>
                                <th>{{ trans('main_trans.job_Father') }}</th>
                                
                                <th>{{ trans('main_trans.Name_Mother') }}</th>
                                <th>{{ trans('main_trans.National_ID_Mother') }}</th>
                                <th>{{ trans('main_trans.Passport_ID_Mother') }}</th>
                                <th>{{ trans('main_trans.Phone_Mother') }}</th>
                                <th>{{ trans('main_trans.job_Mother') }}</th>
                                <th>{{ trans('main_trans.operation') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach ( $stu_parents as $stu_parent )
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $stu_parent->fa_name }}</td>
                                    <td>{{ $stu_parent->email  }}</td>
                                    <td>{{ $stu_parent->fa_national_id }}</td>
                                    <td>{{ $stu_parent->fa_passport_id }}</td>
                                    <td>{{ $stu_parent->fa_phone }}</td>
                                    <td>{{ $stu_parent->fa_job }}</td>
                                    <td>{{ $stu_parent->mo_name }}</td>
                                    <td>{{ $stu_parent->mo_national_id }}</td>
                                    <td>{{ $stu_parent->mo_passport_id }}</td>
                                    <td>{{ $stu_parent->mo_phone }}</td>
                                    <td>{{ $stu_parent->mo_job }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                            class="btn ripple btn-info btn-sm" data-toggle="dropdown" 
                                            type="button">{{ trans('main_trans.operation') }}
                                            <i class="fa fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <button class="dropdown-item" wire:click="editParent({{ $stu_parent->id }})"><i class="text-primary fa fa-edit"></i>{{ trans('main_trans.edit') }}</button>
                                                <button class="dropdown-item"><i class="text-danger fa fa-trash"></i>{{ trans('main_trans.delete') }}</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--parents data-table -->