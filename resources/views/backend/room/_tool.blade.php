<div class="widget-tools">
    <div class="row">
        <div class="col-sm-6">
            <form action="" class="form-inline">
                <div class="form-group">
                    <div class="btn-group">
                        <input type="text" class="form-control input-sm searchinput" placeholder="Tìm theo mã hoặc tên phòng ban" size="50px" />
                        <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-sm-6 text-right">
            <div class="tool">
                <a href="#newRoom" v-on:click="create" role="button" class="btn btn-sm" data-toggle="modal">
                    <i class="fa fa-plus"></i> Thêm mới
                </a>
            </div>
        </div>
    </div>
</div>
