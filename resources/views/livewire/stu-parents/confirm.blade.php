
@if ($currentStep != 3)
<div style="display: none" class="row setup-content" id="step-3">
    @endif
    <div class="col-xs-12">
        <div class="col-md-12"><br>
            <label class="text-control"><h5 style="color: rgb(0, 153, 255)">{{ trans('main_trans.Choose') }} ...</h5></label>
            <input type="file" class="form-control" wire:model="photos" accept="image/*" multiple>
            <br><br><br><br><br><br>
            <label class="text-control"><h1 style="color: red">{{ trans('main_trans.confirm') }}</h1></label>
            <br><br>
            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                    wire:click="back(2)">{{ trans('main_trans.Back') }}
            </button>
            @if ($updateMode)
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-left" wire:click="updateSubmitForm" type="button">{{trans('main_trans.save_updates')}}</button> 
            @else
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-left" wire:click="submitForm" type="button">{{trans('main_trans.Finish')}}</button>
            @endif
        </div>
    </div>
</div>
