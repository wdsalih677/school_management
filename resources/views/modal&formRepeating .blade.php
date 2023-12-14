<!-- normal modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">العنوان</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">حفظ</button>
            </div>
        </div>
    </div>
</div>
<!-- normal modal -->

{{-- normal modal bottun --}}
<button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
     normal modal
</button>
{{-- normal modal bottun --}}


{{-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}


{{-- Larg Modal --}}
<div class="modal fade bd-example-modal-lg" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    العنوان
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-xl-12">
                <div class="card-body">
                    <button type="submit" class="button x-small">
                        موافق
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Larg Modal --}}

{{-- larg maodal bottun --}}
<button type="button" class="button x-small" data-toggle="modal" data-target="#addTeacher">
    Lg Modal
</button>

{{-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
        <h5 class="card-title">Repeating Forms </h5>
        <div class="repeater">
            <div data-repeater-list="group-a">
                <div data-repeater-item>
                    <form class=" row mb-30">
                        <div class="col-lg-2">
                            <input class="form-control" type="text" placeholder="Name" />
                        </div>
                        <div class="col-lg-2">
                            <input class="form-control" type="text" placeholder="Email" />
                        </div>
                        <div class="col-lg-2">
                            <textarea class="form-control" placeholder="Your Message">Your Message</textarea>
                        </div>
                        <div class="col-lg-2">
                            <input class="form-control" type="text" value="+(704) 279-1249" />
                        </div>
                        <div class="col-lg-2">
                            <div class="box">
                            <select name="select-input" class="fancyselect">
                                <option value="1">Sex</option>
                                <option value="2">Male</option>
                                <option value="3">Female</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="d-grid">
                            <input class="btn btn-danger" data-repeater-delete type="button" value="Delete"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-20">
            <div class="col-12">
                <input class="button" data-repeater-create type="button" value="Add new"/>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>