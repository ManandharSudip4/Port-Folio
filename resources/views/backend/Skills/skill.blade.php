@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Skills</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addSkill()">Add Skill</a>     
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
                                        <th>Type</th>
                                        <th>Percentage</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($skills as $key => $skill)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $skill->skillname }}</td>
                                            <td>{{ $skill->skilltype }}</td>
                                            <td>{{ $skill->skillpercent }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editSkill(this)" data-skill="{{ json_encode($skill)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Skills/{{$skill->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this skill information?');">
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
                                                    <h5 class="modal-title" id="title">Add Skill</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Skills" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Skill Name</label>
                                                        <input type="text" class="form-control" name="skillname" id="skillname" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Type</label>
                                                        <select class="form-control" name="skilltype" id="skilltype">
                                                            <option value="Technical">Technical</option>
                                                            <option value="Professional">Professional</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Percentage</label>
                                                        <input type="text" class="form-control" name="skillpercent" id="skillpercent" required="required">
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

