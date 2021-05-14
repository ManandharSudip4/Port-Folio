@extends('layouts.admin')
@section('content')
<div class="">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <div class="x_title">
                        <h2>Personal Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                                        <th>Display Picture</th>
                                        <th>Profession</th>
                                        <th>Quote</th>
                                        <th>Bio</th>
                                        <th>Cover Picture</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $info[0]->id }}</td>
                                            <td>{{ $info[0]->name }}</td>
                                             
                                            <?php 
                                                if(isset($info[0]->pp) && !empty($info[0]->pp) ){
                                                    $ppthumbnail = asset('uploads/pp/'.$info[0]->pp );
                                                }else{
                                                    $ppthumnnail = asset('uploads/'. 'noimg.png');
                                                }
                                            ?>
                                        
                                            <td><img src="<?php echo $ppthumbnail ?>" alt="" style="width: 300px; height:auto"></td>
                                            <td>{{ $info[0]->profession }}</td>
                                            <td>{{ $info[0]->quote }}</td>
                                            <td>{{ $info[0]->bio }}</td>

                                            <?php 
                                                if(isset($info[0]->cp) && !empty($info[0]->cp) ){
                                                    $cpthumbnail = asset('uploads/cp/'.$info[0]->cp );
                                                }else{
                                                    $cpthumnnail = asset('uploads/'. 'noimg.png');
                                                }
                                            ?>
                                            <td><img src="<?php echo $cpthumbnail ?>" alt="" style="width: 300px; height:auto"></td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info" onclick="editInfo(this)" data-perInfo="{{json_encode($info)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr> 
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Personal Informations</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/backend/perInfo" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Full Name</label>
                                                        <input type="text" class="form-control" name="fullname" id="fullname" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Profile Picture</label>
                                                        <input type="file" class="form-control" name="pp" id="pp" accept="image/*">
                                                    </div>
                                                    <div class="form-group" id="ppimgid">       
                                                        <img src="" style="width: 300px; height: auto;" id="ppthumbnail" style="width: 300px; height: auto;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Profession</label>
                                                        <input type="text" class="form-control" name="profession" id="profession" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Quotes</label>
                                                        <textarea class="form-control" name="quote" id="quote" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Bio</label>
                                                        <textarea class="form-control" name="bio" id="bio" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Cover Picture</label>
                                                        <input type="file" class="form-control" name="cp" id="cp" accept="image/*">
                                                    </div> 
                                                    <div class="form-group" id="cpimgid">       
                                                        <img src="" style="width: 300px; height: auto;" id="cpthumbnail" style="width: 300px; height: auto;">
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

