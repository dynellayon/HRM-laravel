@extends('layouts.master')
@section('content')
 <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">User Management</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{route('userManagement')}}" class="btn add-btn" ><i class="fa fa-arrow-left"></i> Cancel</a>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
           
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('user/add/save') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label >Full Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                        @error('name')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                                <div class="form-group col-md-6">
                                <label>Email Address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="" name="email" placeholder="Enter Email">
                                    @error('email')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label>Role Name</label>
                                    <select class="select" name="role_name" id="">
                                        <option selected disabled> --Select --</option>
                                        @foreach ($role_name as $role )
                                        <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                        @endforeach
                                    </select>
                                     @error('role')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                                <div class="form-group col-md-6">
                               <label>Position</label>
                                    <select class="select" name="position" id="">
                                        <option selected disabled> --Select --</option>
                                        @foreach ($position as $positions )
                                        <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                                        @endforeach
                                    </select>
                                      @error('position')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                <label>Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" id="" name="phone" placeholder="Enter Phone">
                                        @error('phone')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                                <div class="form-group col-md-6">
                               <label>Department</label>
                                    <select class="select" name="department" >
                                        <option selected disabled> --Select --</option>
                                        @foreach ($department as $departments )
                                        <option value="{{ $departments->department }}">{{ $departments->department }}</option>
                                        @endforeach
                                    </select>
                                     @error('department')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                            </div>
                            <div class="form-row">
                               
                                <div class="form-group col-md-6">
                                
                                <label>Photo</label>
                                    <input class="form-control" type="file"  name="image">
                                     @error('image')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                 <label>Status</label>
                                    <select class="form-control" name="status" >
                                        <option selected disabled> --Select --</option>
                                        @foreach ($status_user as $status )
                                        <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
                                        @endforeach
                                    </select>
                                     @error('status')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                               
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                        @error('password')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                                <div class="form-group col-md-6">
                              <label>Repeat Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Choose Repeat Password">
                                     @error('password_confirmation')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        

        <!-- Add User Modal -->
        <div id="add_user" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">AddNew User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                        @error('name')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                    </div>
                                  
                                </div>
                                <div class="col-sm-6"> 
                                    <label>Emaill Address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="" name="email" placeholder="Enter Email">
                                    @error('email')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <label>Role Name</label>
                                    <select class="select" name="role_name" id="role_name">
                                        <option selected disabled> --Select --</option>
                                        @foreach ($role_name as $role )
                                        <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6"> 
                                    <label>Position</label>
                                    <select class="select" name="position" id="position">
                                        <option selected disabled> --Select --</option>
                                        @foreach ($position as $positions )
                                        <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" id="" name="phone" placeholder="Enter Phone">
                                        @error('phone')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6"> 
                                    <label>Department</label>
                                    <select class="select" name="department" >
                                        <option selected disabled> --Select --</option>
                                        @foreach ($department as $departments )
                                        <option value="{{ $departments->department }}">{{ $departments->department }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <label>Status</label>
                                    <select class="form-control" name="status" >
                                        <option selected disabled> --Select --</option>
                                        @foreach ($status_user as $status )
                                        <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6"> 
                                    <label>Photo</label>
                                    <input class="form-control" type="file"  name="image">
                                </div>
                            </div>
                            <br>
                            <div class="row"> 
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="col-sm-6"> 
                                    <label>Repeat Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Choose Repeat Password">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                

            </div>
        </div>
        <!-- /Add User Modal -->

				
    
    @section('script')





   
    
    @endsection

@endsection