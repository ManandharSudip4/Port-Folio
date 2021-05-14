@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Work Category</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="javascript:;" class="btn btn-primary" onclick="addWorkCat()">Add Work Category</a>     
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
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Category Picture</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($workCats as $key => $workCat)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $workCat->catname }}</td>
                                            <td>{{ $workCat->description }}</td>   
                                            <?php
                                                $uploadpath = $_SERVER['DOCUMENT_ROOT'].'/uploads/workCat/'.$workCat->catimage; 
                                                if(isset($workCat->catimage) && !empty($workCat->catimage) && file_exists($uploadpath)){
                                                    $thumbnail = asset('uploads/workCat/'.$workCat->catimage );
                                                }else{
                                                    $thumnnail = asset('uploads/'.'noimg.png');
                                                }
                                            ?>
                                            <td><img src="<?php echo $thumbnail ?>" alt="" style="width: 300px; height:auto"></td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editWorkCat(this)" data-workcat="{{json_encode($workCat)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="/backend/Workss/{{$workCat->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Work Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/Workss" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Category Name</label>
                                                            <input type="text" class="form-control" name="catname" id="catname" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Description</label>
                                                            <input type="text" class="form-control" name="description" id="description" required="required">
                                                        </div>   
                                                        <div class="form-group">
                                                            <label for="">Category Image</label>
                                                            <input type="file" class="form-control" name="catimage" id="catimage" accept="image/*">
                                                        </div>
                                                        <div class="form-group" id="imgid">       
                                                            <img src="" style="width: 300px; height: auto;" id="thumbnail" style="width: 300px; height: auto;">
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

