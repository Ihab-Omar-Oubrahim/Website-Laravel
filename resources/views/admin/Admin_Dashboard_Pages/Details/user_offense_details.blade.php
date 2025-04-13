@include('Potato.Layout.headInfo')
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Design/dashboard_rows_design.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Paginator.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/pop-up.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/user_details.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/user_offense_details.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/dashboard_buttons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/Popup Credentials/popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/CSS/Admin/Dashboard_Rows_CSS/Popup Credentials/popup_delete.css') }}">



@auth
    <div class="dashboard_container">
        @include('admin.sidebar')
        @include('Potato.Tools.SuccessMessage')
        <div class="main-content">
            <div class="dashboard_rows_container" id="dashboard_rows_container">
                <div class="dashboard_rows_header">
                    <!-- Left Section: Logo, Title, and Description -->
                    <div class="dashboard_header_left">
                        <div class="dashboard_logo_container">
                            <img src="{{ $user->getImageURL() }}" alt="user_pfp" class="logo" />
                        </div>
                        <div class="dashboard_header_info">
                            <h1 class="header_title"> {{ $user->name }}'s offense details </h1>
                            <p class="header_description">viewing {{ $user->name }}'s offense </p>
                        </div>
                    </div>


                </div>

                <form action="{{ route('offense.delete', ['id' => $offense->id ?? '']) }}" method="POST"
                    enctype="multipart/form-data" class="dashboard_rows_body" id="dashboardContainer" autocomplete="off">
                    @csrf

                    <div class="user_important_info">
                        <div class="suspended_user_img_con">
                            <img src="{{ $user->getImageURL() }}" alt="user_pfp" />
                        </div>
                        <div class="suspended_user_info_con">
                            <h4> {{ $user->name }} </h4>
                            <p> {{ $user->user_id }} </p>
                        </div>
                        <div class="dashboard_user_details_con">
                            <a href="{{ route('dashboard_users_details', ['user_id' => $user->user_id]) }}"
                                class="view_user_btn">
                                <i class="fas fa-user"></i> View User
                            </a>

                        </div>
                        <div class="offense_container">
                            <div class="offense_details">
                                <div class="offense_img_container">
                                    <img src="{{ asset('assets/res/suspension/block.png') }}" alt="banned">
                                </div>

                                <div class="offense_details_info">
                                    <h2>Suspension Details</h2>

                                    <p><strong>Reason:</strong> {{ $offense->reason ?? 'No reason provided' }}</p>


                                    <p><strong>Suspended On:</strong>
                                        {{ \Carbon\Carbon::parse($offense->created_at)->format('F jS, Y') ?? 'Unknown Date' }}
                                    </p>
                                    <p><strong>Time Passed:</strong>
                                        {{ \Carbon\Carbon::parse($offense->created_at)->diffForHumans() ?? 'Unknown' }}
                                    </p>
                                </div>

                                <div class="delete_ban_record_con">
                                    <button class="delete_record_btn" type="submit">
                                        <i class="fas fa-trash-alt"></i> Delete Record
                                    </button>
                                </div>


                            </div>

                            <div class="user_offenses_con">
                                @if ($banHistory->isEmpty())
                                    <p> No additional offenses </p>
                                @else
                                    <h3 id="offense_records_title"> {{$user->name}}'s offense records </h3>

                                    @foreach ($banHistory as $ban)
                                        <div class="selected_user_offense_record">
                                            <p id="ban_record_id"> # {{ $ban->id }} </p>
                                            <p id="ban_record_time">
                                                {{ \Carbon\Carbon::parse($ban->created_at)->diffForHumans() }}
                                            </p>
                                            <button id="ban_record_view_btn" type="button"
                                                onclick="window.location.href='{{ route('dashboard_offense_details', ['user_id' => $ban->user_id, 'offense_id' => $ban->id]) }}'">
                                                View Offense
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="Dashboard_Options">
                        <button class="dashboard-btn save-btn" type="button"
                            onclick="window.location.href='{{ route('dashboard_offense') }}'">
                            <i class="fas fa-arrow-left"></i> Back to Offense List
                        </button>


                        <button class="dashboard-btn print-btn coming-soon" type="button" disabled>
                            <i class="fas fa-print"></i> Print Offense (Coming Soon)
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>


@endauth
@guest
    @include('errors.404')
@endguest

{{-- JavaScript Contact --}}
<script src="{{ asset('assets/JS/Admin/SharedMsgs/Shared.js') }}"></script>
<script src="{{ asset('assets/JS/Scripts/tool-script.js') }}"></script>
