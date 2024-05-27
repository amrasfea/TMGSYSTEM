@php
    $layout = 'platinum-layout'; // Default layout

    if (Auth::user()->roleType === 'Staff') {
        $layout = 'staff-layout';
    } elseif (Auth::user()->roleType === 'Mentor') {
        $layout = 'mentor-layout';
    } elseif (Auth::user()->roleType === 'Platinum') {
        $layout = 'platinum-layout';
    }
@endphp

<x-dynamic-component :component="$layout">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>

<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
  <style>
    body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}


</style>

<div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'default_profile_picture_url' }}" alt="Profile Photo"/>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>{{ $user->name }}</h5>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                        <a href="{{ route('profile.edit') }}" class="profile-edit-btn" name="btnAddMore">Edit Profile</a>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-4">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @if ($user->roleType === 'Platinum')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_phone }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Account Type</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_registration_type}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Identity Number</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_identity_card }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Education Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_edu_level }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Educational Field</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_edu_field }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Occupation</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_occupation }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Study Sponsorship</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_sponsorship }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_address }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone Number</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_phone }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Facebook Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_fb_name }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Program</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_program }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Batch</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_batch }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Referral</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_referral }}</p>
                                </div>
                            </div>

                            @elseif ($user->roleType === 'Staff')

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->P_phone }}</p>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Position</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->staff->S_position }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Department</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->staff->S_department }}</p>
                                    </div>
                                </div>
                            @elseif ($user->roleType === 'Mentor')
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->mentor->M_phoneNum }}</p>
                                    </div>
                                </div>
                            @elseif ($user->roleType === 'Platinum' && $user->platinum)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Registration Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_registration_type }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Title</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_title }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Identity Card</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_identity_card }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_gender }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Religion</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_religion }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Race</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_race }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Citizenship</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_citizenship }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Educational Level</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_edu_level }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Educational Field</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_edu_field }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Educational Institute</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_edu_institute }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Occupation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_occupation }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Sponsorship</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_sponsorship }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_address }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Facebook Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_fb_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Program</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_program }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Batch</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_batch }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Referral</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_referral ? 'Yes' : 'No' }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Referral Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_referral_name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Referral Batch</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $user->platinum->P_referral_batch }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>           
    </div>
</x-dynamic-component>
