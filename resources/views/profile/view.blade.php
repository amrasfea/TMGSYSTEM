@php
    $layout = 'platinum-layout'; // Default layout

    if (Auth::user()->roleType === 'Staff') {
        $layout = 'staff-layout';
    } elseif (Auth::user()->roleType === 'Mentor') {
        $layout = 'mentor-layout';
    }
@endphp

<title>Profile</title>

<x-dynamic-component :component="$layout">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-head {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-head h5 {
            color: #333;
        }
        .nav-tabs {
            margin-bottom: 20px;
        }
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            color: #333;
        }
        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #0062cc;
        }
        .tab-content .row {
            margin-bottom: 10px;
        }
        .row label {
            font-weight: bold;
        }
        .row p {
            margin: 0;
            color: #0062cc;
        }
    </style>

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-head">
                    <h5>{{ $profileUser->name }}</h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profile.view') ? 'active' : '' }}" id="home-tab" href="{{ route('profile.view', $profileUser->id) }}" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        @if ($profileUser->roleType === 'Platinum')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('expert.show') ? 'active' : '' }}" id="expert-tab" href="{{ route('expert.show', $profileUser->id) }}" role="tab" aria-controls="expert" aria-selected="false">Expert</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="tab-content profile-tab" id="myTabContent">
                    @if (request()->routeIs('profile.view'))
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- User info goes here -->
                            <div class="info-section">
                                @if ($profileUser->roleType === 'Platinum')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->id }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->P_phone }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Account Type</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->P_registration_type }}</p>
                                        </div>
                                    </div>
                                    <!-- Add other Platinum-specific fields here -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Supervisor Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->platinum->P_supervisorName }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Supervisor Contact</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->platinum->P_supervisorContact }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Institution</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->platinum->P_Institution }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Department</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->platinum->P_Department }}</p>
                                        </div>
                                    </div>
                                @elseif ($profileUser->roleType === 'Staff')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Position</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->staff->S_position }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Department</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->staff->S_department }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone Number</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->staff->S_phone }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->staff->S_address }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Skills And Expertise</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->staff->S_skills }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Work Experience</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->staff->S_workExperience }}</p>
                                        </div>
                                    </div>
                                @elseif ($profileUser->roleType === 'Mentor')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone Number</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->mentor->M_phoneNum }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Position</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->mentor->M_position }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->mentor->M_title }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Educational Field</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->mentor->M_eduField }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Career Highlights</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{ $profileUser->mentor->M_employementHistory }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @elseif (request()->is('profile/*/expert'))
                        <div class="tab-pane fade show active" id="expert" role="tabpanel" aria-labelledby="expert-tab">
                            <div class="info-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_Name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Title</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->E_title }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_gender }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Education Level</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_edu_level }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Education Field</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_edu_field }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Educational Institute</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_Uni }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Occupation</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_occupation }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Sponsorship</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_sponsorship }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_address }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone No</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_PhoneNum }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_Email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Facebook Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $expert->ED_fbname }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>
