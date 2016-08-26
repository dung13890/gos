<div id="newProvider" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">@{{ modalTitle }}</h4>
            </div>
            <div class="modal-body">
                <validator name="validation" :classes="{ touched: 'touched-validator', dirty: 'dirty-validator' }">
                    <form action="" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="required-wrapper form-field">
                                    <small>Mã chức vụ</small>
                                    <input type='text' v-model='position.code'
                                        class='form-control input-sm'
                                        value='' />
                                </div>

                                <div class="required-wrapper form-field">
                                    <small>Tên chức vụ</small>
                                    <input type='text' v-model='position.name'
                                        class='form-control input-sm'
                                        value=''
                                    />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="button">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu
                            </button>

                            <button class="btn btn-info" type="button">
                                <span class="glyphicon glyphicon-floppy-disk"></span> Lưu và thêm mới
                            </button>

                            <button class="btn btn-warning" type="reset"><i class="glyphicon glyphicon-ban-circle"></i> Clear</button>
                        </div>
                    </form>
                </validator>
            </div>
        </div>
    </div>
</div>