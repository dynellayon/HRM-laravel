@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <!-- /Page Header -->
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">
                                            <img alt="" src="{{ URL::to('/assets/images/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ Session::get('name') }}</h3>
                                                <h6 class="text-muted">{{ Session::get('department') }}</h6>
                                                <small class="text-muted">{{ Session::get('position') }}</small>
                                                <div class="staff-id">User's ID : {{ Session::get('user_id') }}</div>
                                                <div class="small doj text-muted">Date of Join : {{ Session::get('join_date') }}</div>
                                                <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="">{{ Session::get('phone_number') }}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href="">{{ Session::get('email') }}</a></div>
                                                </li>
                                                @if(!empty($information))
                                                    <li>
                                                        @if(Auth::user()->user_id == $information->user_id)
                                                        <div class="title">Birthday:</div>
                                                        <div class="text">{{date('d F, Y',strtotime($information->birth_date)) }}</div>
                                                        @else
                                                        <div class="title">Birthday:</div>
                                                        <div class="text">N/A</div>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if(Auth::user()->user_id == $information->user_id)
                                                        <div class="title">Address:</div>
                                                        <div class="text">{{ $information->address }}</div>
                                                        @else
                                                        <div class="title">Address:</div>
                                                        <div class="text">N/A</div>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if(Auth::user()->user_id == $information->user_id)
                                                        <div class="title">Gender:</div>
                                                        <div class="text">{{ $information->gender }}</div>
                                                        @else
                                                        <div class="title">Gender:</div>
                                                        <div class="text">N/A</div>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <div class="title">Reports to:</div>
                                                        <div class="text">
                                                            <div class="avatar-box">
                                                                <div class="avatar avatar-xs">
                                                                    <img src="{{ URL::to('/assets/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                                                </div>
                                                            </div>
                                                            <a href="#">
                                                                {{ Auth::user()->name }}
                                                            </a>
                                                        </div>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <div class="title">Birthday:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Address:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Gender:</div>
                                                        <div class="text">N/A</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Reports to:</div>
                                                        <div class="text">
                                                            <div class="avatar-box">
                                                                <div class="avatar avatar-xs">
                                                                    <img src="{{ URL::to('/assets/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                                                </div>
                                                            </div>
                                                            <a href="#">
                                                                {{ Auth::user()->name }}
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endif    
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
					
           
           
        </div>
        <!-- /Experience Modal -->

        <!-- /Page Content -->

          @if(!empty($information))
        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile/information/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="{{ URL::to('/assets/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file" id="image" name="images">
                                            <input type="hidden" name="hidden_image" id="e_image" value="{{ Auth::user()->avatar }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->user_id }}">
                                                <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text" id="birthDate" name="birthDate" value="{{ $information->birth_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="select form-control" id="gender" name="gender">
                                                    <option value="{{ $information->gender }}" {{ ( $information->gender == $information->gender) ? 'selected' : '' }}>{{ $information->gender }} </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $information->address }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" id="state" name="state" value="{{ $information->state }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" class="form-control" id="" name="country" value="{{ $information->country }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ $information->pin_code }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $information->phone_number }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select class="select" id="department" name="department">
                                            <option value="{{ $information->department }}" {{ ( $information->department == $information->department) ? 'selected' : '' }}>{{ $information->department }} </option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="IT Management">IT Management</option>
                                            <option value="Marketing">Marketing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <select class="select" id="" name="designation">
                                            <option value="{{ $information->designation }}" {{ ( $information->designation == $information->designation) ? 'selected' : '' }}>{{ $information->designation }} </option>
                                            <option value="Web Designer">Web Designer</option>
                                            <option value="Web Developer">Web Developer</option>
                                            <option value="Android Developer">Android Developer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reports To <span class="text-danger">*</span></label>
                                        <select class="select" id="" name="reports_to">
                                            <option value="{{ $information->reports_to }}" {{ ( $information->reports_to == $information->reports_to) ? 'selected' : '' }}>{{ $information->reports_to }} </option>
                                            @foreach ($user as $users )
                                            <option value="{{ $users->name }}">{{ $users->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
        <!-- /Profile Modal -->
        @else
        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile/information/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="{{ URL::to('/assets/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file" id="upload" name="upload">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->user_id }}">
                                                <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birth Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text" id="birthDate" name="birthDate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="select form-control" id="gender" name="gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" id="state" name="state">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" class="form-control" id="" name="country">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input type="text" class="form-control" id="pin_code" name="pin_code">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" id="phoneNumber" name="phone_number">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Department <span class="text-danger">*</span></label>
                                        <select class="select" id="department" name="department">
                                            <option selected disabled>Select Department</option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="IT Management">IT Management</option>
                                            <option value="Marketing">Marketing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation <span class="text-danger">*</span></label>
                                        
                                        <select class="select" id="" name="designation">
                                            <option selected disabled>Select Designation</option>
                                            <option value="Web Designer">Web Designer</option>
                                            <option value="Web Developer">Web Developer</option>
                                            <option value="Android Developer">Android Developer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reports To <span class="text-danger">*</span></label>
                                        <select class="select" id="" name="reports_to">
                                            <option selected disabled>-- select --</option>
                                            @foreach ($user as $users )
                                            <option value="{{ $users->name }}">{{ $users->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
        <!-- /Profile Modal -->
        @endif
    
        @if (!empty($userInformation))
        <!-- Personal Info Modal -->
        <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user/information/save') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ Session::get('user_id') }}" readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport No</label>
                                        <input type="text" class="form-control @error('passport_no') is-invalid @enderror" name="passport_no" value="{{ $userInformation->passport_no }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport Expiry Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker @error('passport_expiry_date') is-invalid @enderror" type="text" name="passport_expiry_date" value="{{ $userInformation->passport_expiry_date }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tel</label>
                                        <input class="form-control @error('tel') is-invalid @enderror" type="text" name="tel" value="{{ $userInformation->tel }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nationality <span class="text-danger">*</span></label>
                                        <input class="form-control @error('nationality') is-invalid @enderror" type="text" name="nationality" value="{{ $userInformation->nationality }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <div class="form-group">
                                            <input class="form-control @error('religion') is-invalid @enderror" type="text" name="religion" value="{{ $userInformation->religion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marital status <span class="text-danger">*</span></label>
                                        <select class="select form-control @error('marital_status') is-invalid @enderror" name="marital_status">
                                            <option value="{{ $userInformation->marital_status }}" {{ ( $userInformation->marital_status == $userInformation->marital_status) ? 'selected' : '' }}> {{ $userInformation->marital_status }} </option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employment of spouse</label>
                                        <input class="form-control @error('employment_of_spouse') is-invalid @enderror" type="text" name="employment_of_spouse" value="{{ $userInformation->employment_of_spouse }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. of children </label>
                                        <input class="form-control @error('children') is-invalid @enderror" type="text" name="children" value="{{ $userInformation->children }}">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Personal Info Modal -->
        @else
         <!-- Personal Info Modal -->
        <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Personal Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('user/information/save') }}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="user_id" value="{{ Session::get('user_id') }}" readonly>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport No</label>
                                        <input type="text" class="form-control @error('passport_no') is-invalid @enderror" name="passport_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passport Expiry Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker @error('passport_expiry_date') is-invalid @enderror" type="text" name="passport_expiry_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tel</label>
                                        <input class="form-control @error('tel') is-invalid @enderror" type="text" name="tel">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nationality <span class="text-danger">*</span></label>
                                        <input class="form-control @error('nationality') is-invalid @enderror" type="text" name="nationality">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <div class="form-group">
                                            <input class="form-control @error('religion') is-invalid @enderror" type="text" name="religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marital status <span class="text-danger">*</span></label>
                                        <select class="select form-control @error('marital_status') is-invalid @enderror" name="marital_status">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employment of spouse</label>
                                        <input class="form-control @error('employment_of_spouse') is-invalid @enderror" type="text" name="employment_of_spouse">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. of children </label>
                                        <input class="form-control @error('children') is-invalid @enderror" type="text" name="children">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Personal Info Modal -->
        @endif
    </div>
@endsection