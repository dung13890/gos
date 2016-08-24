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
                <a href="#newProvider" v-on:click="create" role="button" class="btn btn-sm" data-toggle="modal">
                    <i class="fa fa-plus"></i> Thêm mới
                </a>
            </div>
            <div class="tool">
                <a href="javascript:;" class="btn btn-sm">
                    <i class="fa fa-sign-out"></i> Import
                </a>
            </div>
            <div class="tool">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
                        <span class="fa fa-sign-out"></span>
                        Export
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Excel</a></li>
                        <li><a href="#">PDF</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>