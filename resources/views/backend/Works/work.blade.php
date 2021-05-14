@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Works</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addWork()">Add Work</a>     
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
                                        <th>Title</th>
                                        <th>Category Name</th>
                                        <th>Featured</th>
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>Content</th>
                                        <th>Views</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($works as $key => $work)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $work->title }}</td>
                                            <td>{{ $work->categoryid }}</td>
                                            <td>{{ $work->featured }}</td>
                                            <td>{{ $work->link }}</td>
                                            <?php
                                                $uploadpath = $_SERVER['DOCUMENT_ROOT'].'/uploads/work/'.$work->image; 
                                                if(isset($work->workimage) && !empty($work->workimage) && file_exists($uploadpath)){
                                                    $thumbnail = asset('uploads/work/'.$work->workimage );
                                                }else{
                                                    $thumnnail = asset('uploads/'.'noimg.png');
                                                }
                                                ?>
                                            <td><img src="<?php echo asset('uploads/work/'.$work->workimage ) ?>" alt="" style="width: 300px; height:auto"></td>
                                            <td>{{ html_entity_decode($work->content) }}</td>
                                            <td>{{ $work->view }}</td>   
                                            <td>{{ $work->status }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editWork(this)" data-work="{{json_encode($work)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Works/{{$work->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this work?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                    <!-- modal for form -->
                                    <!-- Button trigger modal -->
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Launch demo modal
                                        </button> -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Work</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Works" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Title</label>
                                                            <input type="text" class="form-control" name="wtitle" id="wtitle" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Category ID</label>
                                                            <select class="form-control" name="categoryid" id="categoryid">
                                                                @foreach($workCats as $key => $workCat)
                                                                    <option value="{{$workCat->id}}">{{$workCat->catname}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Featured</label>
                                                            <select class="form-control" name="featured" id="featured">
                                                                <option value="Featured">Featured</option>
                                                                <option value="notFeatured">Not Featured</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Link</label>
                                                            <input type="text" class="form-control" name="link" id="link" required="required">
                                                        </div>   
                                                        <div class="form-group">
                                                            <label for="">Work Image</label>
                                                            <input type="file" class="form-control" name="workimage" id="workimage" accept="image/*">
                                                        </div>
                                                        <div class="form-group" id="imgid">       
                                                            <img src="" style="width: 300px; height: auto;" id="thumbnail" style="width: 300px; height: auto;">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Content</label>
                                                            <textarea class="form-control" name="content" id="content"  cols="30" rows="10"></textarea>
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

