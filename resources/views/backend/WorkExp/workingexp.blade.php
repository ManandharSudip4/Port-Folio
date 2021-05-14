@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Working Experience</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addWorkingexp()">Add Working Experience</a>     
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
                                        <th>Start Year</th>
                                        <th>Post</th>
                                        <th>Institute</th>
                                        <th>Description</th>
                                        <th>Complete Year</th>
                                        <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($workingexps as $key => $workingexp)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $workingexp->startyear }}</td>
                                            <td>{{ $workingexp->post }}</td>
                                            <td>{{ $workingexp->institute }}</td>
                                            <td>{{ $workingexp->description }}</td>
                                            <td>{{ $workingexp->endyear }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editWorkingexp(this)" data-workingexp="{{ json_encode($workingexp)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/WorkExp/{{$workingexp->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this working experience?');">
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
                                                    <h5 class="modal-title" id="title">Add Working Experience</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/WorkExp" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Start Year</label>
                                                        <input type="text" class="form-control" name="startyear" id="startyear" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Post</label>
                                                        <input type="text" class="form-control" name="post" id="post" required="required">
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="">Institute</label>
                                                        <input type="text" class="form-control" name="institute" id="institute" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required="required"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">End Year</label>
                                                        <input type="text" class="form-control" name="endyear" id="endyear" required="required">
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

