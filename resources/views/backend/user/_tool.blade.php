<div class="widget-tools">
    <div class="row">
        <div class="col-sm-6">
            <form action="" class="form-inline">
                <div class="form-group" id="user-search">
                    <div class="btn-group">
                        <input type="search" aria-controls="table-index" class="form-control input-sm searchinput" 
                            placeholder="Tìm theo mã, tên, email hoặc phòng ban" size="40px" />
                        <span class="glyphicon glyphicon-remove-circle searchclear"></span>
                    </div>

                    <div class="btn-group">
                        <span class="btn btn-default btn-sm">{{ $room->name or 'Tất cả phòng ban' }}</span>
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" >
                            <i class="caret"></i>
                        </button>
                        <ul class="dropdown-menu pull-left">
                            <li><a href="{{ route('user.index') }}">Tất cả phòng ban</a></li>
                                @foreach ($listRooms->slice(1) as $id => $name)
                            <li><a href="{{ route('user.room', $id) }}">{{ $name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6 text-right">
            <div class="tool">
                <a href="{{ route('user.index') }}" role="button" class="btn btn-sm">
                    <i class="fa fa-plus"></i> {{ trans('repositories.create') }}
                </a>
            </div>
            <div class="tool">
                <a href="javascript:;" class="btn btn-sm">
                    <i class="fa fa-sign-out"></i> Import
                </a>
            </div>
            <div class="tool">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle" aria-expanded="false">
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