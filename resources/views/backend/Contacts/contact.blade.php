@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Contact Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addContact()">Add Contact Information</a>     
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
                                        <th>Content</th>
                                        <th>Icon Name</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->content }}</td>
                                            <td>{{ $contact->iconname }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editContact(this)" data-contact="{{ json_encode($contact)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Contacts/{{$contact->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact information?');">
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
                                                    <h5 class="modal-title" id="title">Add Contact</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Contacts" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Contact Name</label>
                                                        <input type="text" class="form-control" name="name" id="name" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Content</label>
                                                        <input type="text" class="form-control" name="contents" id="contents" required="required">
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

