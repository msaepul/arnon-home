@extends('main')

@section('judul')
@endsection

@section('isi')
    <link rel="stylesheet"
        href="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://colorlib.com//polygon/adminty/files/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet"
        href="https://colorlib.com//polygon/adminty/files/bower_components/datedropper/css/datedropper.min.css">
    <link rel="stylesheet"
        href="https://colorlib.com//polygon/adminty/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://colorlib.com//polygon/adminty/files/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://colorlib.com//polygon/adminty/files/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" href="https://colorlib.com//polygon/adminty/files/assets/icon/feather/css/feather.css">
    <link rel="stylesheet" href="https://colorlib.com//polygon/adminty/files/assets/css/style.css">
    <link rel="stylesheet" href="https://colorlib.com//polygon/adminty/files/assets/css/jquery.mCustomScrollbar.css">
    <style id="" media="all">
        /* cyrillic-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        /* hebrew */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        /* hebrew */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /* cyrillic-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        /* cyrillic */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        /* greek-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        /* greek */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        /* hebrew */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
            unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 800;
            font-stretch: 100%;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
    <div class="page-body" style="margin-top: -1%">
        <div class="row">
            <div class="col-lg-12">
                <div class="cover-profile">
                    <div class="profile-bg-img">
                        <img class="profile-bg-img img-fluid" style="height:350px"
                            src="{{ asset('/') }}dist/img/photo2.png" alt="bg-img">
                        <div class="card-block user-info">
                            <div class="col-md-12">
                                <div class="media-left">
                                    <img class="user-img img-radius" width="140" height="180"
                                        src="{{ asset('/') }}storage/uploads/img-usr/{{ Auth::user()->foto }}"
                                        alt="user-img">
                                </div>
                                <div class="media-body row">
                                    <div class="col-lg-12">
                                        <div class="user-title">
                                            <h2 class="badge badge-primary btn-sm">{{ Auth::user()->nama_lengkap }}</h2><br>
                                            <span class="badge badge-primary btn-sm">{{ allakses() }}</span>
                                            <h3>
                                                <label class="badge badge-secondary btn-sm">0
                                                    Followers</label>
                                                <label class="badge badge-secondary btn-sm">0
                                                    Following</label>
                                            </h3>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="pull-right cover-btn">
                                            <button type="button" class="btn btn-primary m-r-10 m-b-5"><i
                                                    class="icofont icofont-plus"></i>
                                                Follow</button>
                                            <button type="button" class="btn btn-primary"><i
                                                    class="icofont icofont-ui-messaging"></i>
                                                Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <p class="alert alert-info" style="font-weight: bold;">{{ session('success') }}</p>
        @endif
        <div class="row">
            <div class="col-lg-12">

                <div class="tab-header card">
                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Informasi
                                Pribadi</a>
                            <div class="slide"></div>
                        </li>
                        {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">User's
                            Services</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">User's
                            Contacts</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#review" role="tab">Reviews</a>
                        <div class="slide"></div>
                    </li> --}}
                    </ul>
                </div>


                <div class="tab-content">
                    <div class="tab-pane active" id="personal" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Tentang {{ strtok(Auth::user()->nama_lengkap, ' ') }}</h5>
                                <button id="edit-btn" type="button"
                                    class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                    <i class="icofont icofont-edit"></i>
                                </button>
                            </div>
                            <div class="card-block">
                                <div class="view-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="general-info">
                                                <div class="row">
                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Nama Lengkap
                                                                        </th>
                                                                        <td>{{ Auth::user()->nama_lengkap }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Jenis Kelamin</th>
                                                                        <td>{{ gender() }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Tanggal Lahir
                                                                        </th>
                                                                        <td>{{ tgl(Auth::user()->birth_date) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Status
                                                                        </th>
                                                                        <td>{{ marital() }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Cabang
                                                                        </th>
                                                                        <td>{{ cabangs() }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-xl-6">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Email</th>
                                                                        <td>
                                                                            <a
                                                                                href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Nomor Telpon</th>
                                                                        <td>({{ substr(Auth::user()->no_wa, 0, 3) }}) -
                                                                            ****{{ substr(Auth::user()->no_wa, -3) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Twitter</th>
                                                                        <td>
                                                                            @if (Auth::user()->twitter == null)
                                                                                -
                                                                            @else
                                                                                {{ Auth::user()->twitter }}
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            instagram</th>
                                                                        <td>
                                                                            @if (Auth::user()->instagram == null)
                                                                                -
                                                                            @else
                                                                                {{ Auth::user()->instagram }}
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">
                                                                            Hak Akses</th>
                                                                        <td>{{ allakses() }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="edit-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="general-info">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <form enctype="multipart/form-data" method="POST"
                                                            action="{{ route('update_profile') }}">
                                                            @csrf
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i
                                                                                        class="icofont icofont-user"></i></span>
                                                                                <input type="text" name="nama_lengkap"
                                                                                    id="nama_lengkap" class="form-control"
                                                                                    value="{{ Auth::user()->nama_lengkap }}"
                                                                                    required>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="form-radio">
                                                                                <div class="group-add-on">
                                                                                    <span class="input-group-addon"><i
                                                                                            class="icofont icofont-user"></i>
                                                                                        &nbsp; Jenis Kelamin</span>
                                                                                    <div
                                                                                        class="radio radiofill radio-inline">
                                                                                        <label>
                                                                                            <input type="radio"
                                                                                                name="gender"
                                                                                                id="1"
                                                                                                value="1"
                                                                                                @if (Auth::user()->gender == 1) checked @endif
                                                                                                required><i
                                                                                                class="helper"></i>
                                                                                            Male
                                                                                        </label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="radio radiofill radio-inline">
                                                                                        <label>
                                                                                            <input type="radio"
                                                                                                name="gender"
                                                                                                id="0"
                                                                                                value="0"
                                                                                                @if (Auth::user()->gender == 0) checked @endif
                                                                                                required><i class="helper"
                                                                                                requi></i>
                                                                                            Female
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i
                                                                                        class="icofont icofont-birthday-cake"></i></span>
                                                                                <input id="dropper-default"
                                                                                    class="form-control" type="text"
                                                                                    name="birth_date" id="birth_date"
                                                                                    value="{{ tgl2(Auth::user()->birth_date) }}"
                                                                                    required>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-ring"></i></span>
                                                                                <select name="marital" id="hello-single"
                                                                                    class="form-control" required>
                                                                                    <option value="1"
                                                                                        @if (Auth::user()->marital == 1) selected @endif>
                                                                                        Menikah
                                                                                    </option>
                                                                                    <option value="0"
                                                                                        @if (Auth::user()->marital == 0) selected @endif>
                                                                                        Belum Menikah
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i
                                                                                        class="icofont icofont-location-pin"></i></span>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ cabangs() }}" readonly
                                                                                    placeholder="Address">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="icofont icofont-mobile-phone"></i></span>
                                                                            <input type="text" name="no_wa"
                                                                                id="no_wa" class="form-control"
                                                                                value="{{ Auth::user()->no_wa }}"
                                                                                placeholder="Mobile Number" required>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="icofont icofont-social-twitter"></i></span>
                                                                            <input type="text" name="twitter"
                                                                                id="twitter" class="form-control"
                                                                                value="{{ Auth::user()->twitter }}"
                                                                                required>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="icofont icofont-social-instagram"></i></span>
                                                                            <input type="text" name="instagram"
                                                                                id="instagram" class="form-control"
                                                                                value="{{ Auth::user()->instagram }}"
                                                                                required>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="icofont icofont-earth"></i></span>
                                                                            <input type="text" class="form-control"
                                                                                value=" {{ allakses() }} " readonly
                                                                                placeholder="Hak Akses">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i
                                                                                    class="icofont icofont-picture"></i></span>
                                                                            <input type="file" name="foto"
                                                                                id="foto" class="form-control">
                                                                            <input type="hidden" name="default"
                                                                                value="{{ Auth::user()->foto }}">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                                <div class="text-center">
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light m-r-20">Simpan</button>
                                                    <button type="reset"
                                                        class="btn btn-default waves-effect">Reset</button>
                                                </div>
                                                </form>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Bio</h5>
                                        {{-- <button id="edit-info-btn" type="button"
                                            class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                            <i class="icofont icofont-edit"></i>
                                        </button> --}}
                                    </div>
                                    <div class="card-block user-desc">
                                        <div class="view-desc">
                                            <p>Nothing!</p>
                                        </div>

                                        <form enctype="multipart/form-data" method="POST"
                                            action="{{ route('update_profile') }}">
                                            <div class="edit-desc">
                                                <div class="col-md-12">
                                                    <textarea id="description"><p>Nothing!</p></textarea>
                                                </div>
                                                <div class="text-center">
                                                    <a href="#!"
                                                        class="btn btn-primary waves-effect waves-light m-r-20 m-t-20">Save</a>
                                                    <a href="#!" id="edit-cancel-btn"
                                                        class="btn btn-default waves-effect m-t-20">Cancel</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="binfo" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">User Services</h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card b-l-success business-info services m-b-20">
                                            <div class="card-header">
                                                <div class="service-header">
                                                    <a href="#">
                                                        <h5 class="card-header-text">
                                                            Shivani Hero</h5>
                                                    </a>
                                                </div>
                                                <span class="dropdown-toggle addon-btn text-muted f-right service-btn"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                                    role="tooltip">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                    <a class="dropdown-item" href="#!"><i
                                                            class="icofont icofont-edit"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#!"><i
                                                            class="icofont icofont-ui-delete"></i>
                                                        Delete</a>
                                                    <a class="dropdown-item" href="#!"><i
                                                            class="icofont icofont-eye-alt"></i>
                                                        View</a>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p class="task-detail">Lorem
                                                            ipsum dolor sit amet,
                                                            consectet ur adipisicing
                                                            elit, sed do eiusmod temp or
                                                            incidi dunt ut labore
                                                            et.Lorem ipsum dolor sit
                                                            amet, consecte.</p>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Profit</h5>
                                    </div>
                                    <div class="card-block">
                                        <div id="main" style="height:300px;width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane" id="contacts" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-3">

                                <div class="card">
                                    <div class="card-header contact-user">
                                        <img class="img-radius img-40" src="../files/assets/images/avatar-4.jpg"
                                            alt="contact-user">
                                        <h5 class="m-l-10">John Doe</h5>
                                    </div>
                                    <div class="card-block">
                                        <ul class="list-group list-contacts">
                                            <li class="list-group-item active"><a href="#">All
                                                    Contacts</a>
                                            </li>
                                            <li class="list-group-item"><a href="#">Recent
                                                    Contacts</a>
                                            </li>
                                            <li class="list-group-item"><a href="#">Favourite
                                                    Contacts</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-block groups-contact">
                                        <h4>Groups</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item justify-content-between">
                                                Project
                                                <span class="badge badge-primary badge-pill">30</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Notes
                                                <span class="badge badge-success badge-pill">20</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Activity
                                                <span class="badge badge-info badge-pill">100</span>
                                            </li>
                                            <li class="list-group-item justify-content-between">
                                                Schedule
                                                <span class="badge badge-danger badge-pill">50</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Contacts<span class="f-15"> (100)</span>
                                        </h4>
                                    </div>
                                    <div class="card-block">
                                        <div class="connection-list">
                                            <a href="#"><img class="img-fluid img-radius"
                                                    src="../files/assets/images/user-profile/follower/f-1.jpg"
                                                    alt="f-1" data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Airi Satou">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-9">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Contacts
                                                </h5>
                                            </div>
                                            <div class="card-block contact-details">
                                                <div class="data_table_main table-responsive dt-responsive">
                                                    <table id="simpletable" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Mobileno.</th>
                                                                <th>Favourite</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Garrett Winters</td>
                                                                <td><a href="/cdn-cgi/l/email-protection"
                                                                        class="__cf_email__"
                                                                        data-cfemail="4e2f2c2d7f7c7d0e29232f2722602d2123">[email&#160;protected]</a>
                                                                </td>
                                                                <td>9989988988</td>
                                                                <td><i class="fa fa-star" aria-hidden="true"></i>
                                                                </td>
                                                                <td class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fa fa-cog"
                                                                            aria-hidden="true"></i></button>
                                                                    <div
                                                                        class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-edit"></i>Edit</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-delete"></i>Delete</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye-alt"></i>View</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-tasks-alt"></i>Project</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-ui-note"></i>Notes</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-eye"></i>Activity</a>
                                                                        <a class="dropdown-item" href="#!"><i
                                                                                class="icofont icofont-badge"></i>Schedule</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="review" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Review</h5>
                            </div>
                            <div class="card-block">
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object img-radius comment-img"
                                                    src="../files/assets/images/avatar-1.jpg"
                                                    alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Sortino
                                                media<span class="f-12 text-muted m-l-5">Just
                                                    now</span></h6>
                                            <div class="stars-example-css review-star">
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                            </div>
                                            <p class="m-b-0">Cras sit amet nibh
                                                libero, in gravida nulla. Nulla vel
                                                metus scelerisque ante sollicitudin
                                                commodo. Cras purus odio, vestibulum in
                                                vulputate at, tempus viverra turpis.</p>
                                            <div class="m-b-25">
                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a
                                                        href="#!" class="f-12">Edit</a>
                                                </span>
                                            </div>
                                            <hr>

                                            <div class="media mt-2">
                                                <a class="media-left" href="#">
                                                    <img class="media-object img-radius comment-img"
                                                        src="../files/assets/images/avatar-2.jpg"
                                                        alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Larry
                                                        heading <span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0"> Cras sit amet
                                                        nibh libero, in gravida nulla.
                                                        Nulla vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!"
                                                                class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>

                                                    <div class="media mt-2">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object img-radius comment-img"
                                                                    src="../files/assets/images/avatar-3.jpg"
                                                                    alt="Generic placeholder image">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">
                                                                Colleen Hurst <span class="f-12 text-muted m-l-5">Just
                                                                    now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0">Cras sit
                                                                amet nibh libero, in
                                                                gravida nulla. Nulla vel
                                                                metus scelerisque ante
                                                                sollicitudin commodo.
                                                                Cras purus odio,
                                                                vestibulum in vulputate
                                                                at, tempus viverra
                                                                turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!"
                                                                        class="m-r-10 f-12">Reply</a></span><span><a
                                                                        href="#!" class="f-12">Edit</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="media mt-2">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-radius comment-img"
                                                            src="../files/assets/images/avatar-1.jpg"
                                                            alt="Generic placeholder image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Cedric
                                                        Kelly<span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0">Cras sit amet
                                                        nibh libero, in gravida nulla.
                                                        Nulla vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!"
                                                                class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="media mt-2">
                                                <a class="media-left" href="#">
                                                    <img class="media-object img-radius comment-img"
                                                        src="../files/assets/images/avatar-4.jpg"
                                                        alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Larry
                                                        heading <span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0"> Cras sit amet
                                                        nibh libero, in gravida nulla.
                                                        Nulla vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!"
                                                                class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>

                                                    <div class="media mt-2">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object img-radius comment-img"
                                                                    src="../files/assets/images/avatar-3.jpg"
                                                                    alt="Generic placeholder image">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">
                                                                Colleen Hurst <span class="f-12 text-muted m-l-5">Just
                                                                    now</span></h6>
                                                            <div class="stars-example-css review-star">
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                                <i class="icofont icofont-star"></i>
                                                            </div>
                                                            <p class="m-b-0">Cras sit
                                                                amet nibh libero, in
                                                                gravida nulla. Nulla vel
                                                                metus scelerisque ante
                                                                sollicitudin commodo.
                                                                Cras purus odio,
                                                                vestibulum in vulputate
                                                                at, tempus viverra
                                                                turpis.</p>
                                                            <div class="m-b-25">
                                                                <span><a href="#!"
                                                                        class="m-r-10 f-12">Reply</a></span><span><a
                                                                        href="#!" class="f-12">Edit</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media mt-2">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-radius comment-img"
                                                            src="../files/assets/images/avatar-2.jpg"
                                                            alt="Generic placeholder image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Mark
                                                        Doe<span class="f-12 text-muted m-l-5">Just
                                                            now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0">Cras sit amet
                                                        nibh libero, in gravida nulla.
                                                        Nulla vel metus scelerisque ante
                                                        sollicitudin commodo. Cras purus
                                                        odio, vestibulum in vulputate
                                                        at, tempus viverra turpis.</p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!"
                                                                class="m-r-10 f-12">Reply</a></span><span><a
                                                                href="#!" class="f-12">Edit</a>
                                                        </span>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Right addon">
                                    <span class="input-group-addon"><i class="icofont icofont-send-mail"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js">
    </script>

    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/css-scrollbars.js"></script>

    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
    </script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js">
    </script>

    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js">
    </script>

    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/datedropper/js/datedropper.min.js"></script>

    <script src="https://colorlib.com//polygon/adminty/files/bower_components/datatables.net/js/jquery.dataTables.min.js">
    </script>
    <script
        src="https://colorlib.com//polygon/adminty/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <script
        src="https://colorlib.com//polygon/adminty/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script
        src="https://colorlib.com//polygon/adminty/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>

    <script src="https://colorlib.com//polygon/adminty/files/assets/pages/ckeditor/ckeditor.js"></script>

    <script src="https://colorlib.com//polygon/adminty/files/assets/pages/chart/echarts/js/echarts-all.js"
        type="text/javascript"></script>

    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js">
    </script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js">
    </script>
    <script type="text/javascript"
        src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script src="https://colorlib.com//polygon/adminty/files/assets/pages/user-profile.js"></script>
    <script src="https://colorlib.com//polygon/adminty/files/assets/js/pcoded.min.js"></script>
    <script src="https://colorlib.com//polygon/adminty/files/assets/js/vartical-layout.min.js"></script>
    <script src="https://colorlib.com//polygon/adminty/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/script.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"77ac4a519a52320f","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}'
        crossorigin="anonymous"></script>
@endsection
