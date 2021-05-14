@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Social Media Links</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addMedia()">Add Social Media</a>     
                        </li>
                        </ul>
                        <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                        <th>SN</th>
                                        <th>Media Name</th>
                                        <th>Link</th>
                                        <th>Icon Name</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($medias as $key => $media)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $media->name }}</td>
                                            <td>{{ $media->link }}</td>
                                            <td>{{ $media->iconname }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editMedia(this)" data-media="{{ json_encode($media)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Medias/{{$media->id}}" class="btn btn-danger" >
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="title">Add Media</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Medias" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Media Name</label>
                                                        <input type="text" class="form-control" name="medianame" id="medianame" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Link</label>
                                                        <input type="text" class="form-control" name="link" id="link" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Icon Name</label>
                                                        <input type="text" class="form-control" name="iconname" id="iconname" required="required">
                                                    </div>   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" id="id" name="id">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- modal ends here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

