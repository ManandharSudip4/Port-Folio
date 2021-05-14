@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Blogs</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addBlog()">Add Blog</a>     
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
                                        <th>Blog Title</th>
                                        <th>Category Name</th>
                                        <th>Featured</th>
                                        <th>Image</th>
                                        <th>Content</th>
                                        <th>Views</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $key => $blog)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $blog->blogtitle }}</td>
                                            <td>{{ $blog->categoryid }}</td>
                                            <td>{{ $blog->featured }}</td>
                                            <?php
                                                $uploadpath = $_SERVER['DOCUMENT_ROOT'].'/uploads/blog/'.$blog->image; 
                                                if(isset($blog->blogimage) && !empty($blog->blogimage) && file_exists($uploadpath)){
                                                    $thumbnail = asset('uploads/blog/'.$blog->blogimage );
                                                }else{
                                                    $thumnnail = asset('uploads/'.'noimg.png');
                                                }
                                                ?>
                                            <td><img src="<?php echo $thumbnail ?>" alt="" style="width: 300px; height:auto"></td>
                                            <td>{{ $blog->content }}</td>
                                            <td>{{ $blog->view }}</td>   
                                            <td>{{ $blog->status }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editBlog(this)" data-blog="{{json_encode($blog)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Blogs/{{$blog->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?');">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Blogs" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Title</label>
                                                            <input type="text" class="form-control" name="blogtitle" id="blogtitle" >
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
                                                            <label for="">Blog Image</label>
                                                            <input type="file" class="form-control" name="blogimage" id="blogimage" accept="image/*">
                                                        </div>
                                                        <div class="form-group" id="imgid">       
                                                            <img src="" style="width: 300px; height: auto;" id="thumbnail" style="width: 300px; height: auto;">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Content</label>
                                                            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
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

