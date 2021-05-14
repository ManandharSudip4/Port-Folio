@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Reviews</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addReview()">Add Review</a>     
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
                                        <th>Name</th>
                                        <th>Post</th>
                                        <th>Company</th>
                                        <th>Review</th>
                                        <th>Email</th>
                                        <th>Work ID</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reviews as $key => $review)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $review->name }}</td>
                                            <td>{{ $review->post }}</td>
                                            <td>{{ $review->company }}</td>
                                            <td>{{ $review->review }}</td>
                                            <td>{{ $review->email }}</td>
                                            <td>{{ $review->workid }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editReview(this)" data-review="{{ json_encode($review)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Reviews/{{$review->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this review?');">
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
                                                    <h5 class="modal-title" id="title">Add Review</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Reviews" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" class="form-control" name="name" id="name" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Post</label>
                                                        <input type="text" class="form-control" name="post" id="post" required="required">
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="">Company</label>
                                                        <input type="text" class="form-control" name="company" id="company" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Review</label>
                                                        <textarea class="form-control" name="review" id="review" cols="30" rows="10" required="required"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" class="form-control" name="email" id="email" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Work ID</label>
                                                        <input type="text" class="form-control" name="workid" id="workid" required="required">
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

