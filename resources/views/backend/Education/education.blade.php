@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Academics </h2>                      
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addEducation()">Add Academic Qualification</a>     
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
                                        <th>Complete Year</th>
                                        <th>Qualifications</th>
                                        <th>Institute</th>
                                        <th>Board/University</th>
                                        <th>Description</th>
                                        <th>GPA/Percentage</th>
                                        <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($educations as $key => $education)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $education->startyear }}</td>
                                            <td>{{ $education->endyear }}</td>
                                            <td>{{ $education->qualification }}</td>
                                            <td>{{ $education->institute }}</td>
                                            <td>{{ $education->boarduni }}</td>
                                            <td>{{ $education->description }}</td>
                                            <td>{{ $education->gpa }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editEducation(this)" data-education="{{ json_encode($education)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Educations/{{$education->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this academic qualification?');">
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
                                                    <h5 class="modal-title" id="title">Add Academic Qualification</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Educations" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Start Year</label>
                                                        <input type="text" class="form-control" name="startyear" id="startyear" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">End Year</label>
                                                        <input type="text" class="form-control" name="endyear" id="endyear" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Qualifications</label>
                                                        <input type="text" class="form-control" name="qualifications" id="qualifications" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Institute</label>
                                                        <input type="text" class="form-control" name="institute" id="institute" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Board/University</label>
                                                        <input type="text" class="form-control" name="boarduni" id="boarduni" required="required">
                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required="required"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">GPA/Percentage</label>
                                                        <input type="text" class="form-control" name="gpa" id="gpa" required="required">
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

