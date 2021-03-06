@extends('backend.layout.master')
@section('title')
  Danh Mục Sản Phẩm
@endsection()

@section('content') 
 <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="col-3 m-0 font-weight-bold text-primary" style="float: left;">Chủng Loại</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Chủng Loại</th>
                        <th>Slug</th>
                        <th>Trạng Thái</th>
                        <th><button class="btn btn-info delete" class="m-0 font-weight-bold text-primary"><a>Thêm mới</a></button></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên Chủng Loại</th>
                        <th>Slug</th>
                        <th>Trạng Thái</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </tfoot>
                <tbody>
                  @foreach($department as $key=>$value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->slug}}</td>
                        <td>
                          @if($value->status==1)
                            {{"Hiển Thị"}}
                          @else
                            {{"Không Hiển Thị"}} 
                          @endif
                        </td>
                        <td>
                          <button class="btn btn-primary edit" title="{{ 'Sửa '.$value->name}}" data-toggle="modal" data-target="#edit" data-id="{{$value->id}}"><i class="fas fa-edit" ></i>Sửa</button>

                          <button class="btn btn-danger delete" title="{{'Xóa '.$value->name}}" data-toggle="modal" data-target="#delete" data-id="{{$value->id}}"><i class="fas fa-trash-alt" ></i>Xóa</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pull-right">{{$department->links()}}</div>
        </div>
    </div>
</div>

    <!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa category <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin:5px">
                        <div class="col-lg-12">
                            <form role="form">
                       
                                <!-- Cach 2 -->
                                <!-- <input type="hidden" name="csrf-token" value="{{csrf_token()}}"> -->
                                <fieldset class="form-group">
                                    <label>Name</label>
                                    <input class="form-control name" name="name" placeholder="Nhập tên category">
                                    <span class="error" style="color:red; font-size: 1rem"></span>
                                </fieldset>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control status" name="status">
                                        <option value="1" class="ht">Hiển Thị</option>
                                        <option value="0" class="kht">Không Hiển Thị</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">Save</button>
                    <button type="reset" class="btn btn-primary">Làm Lại</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success del">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection()