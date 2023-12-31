<!-- Template Main CSS File -->
<link href="assetsWeb/css/style.css" rel="stylesheet">
<title>Page: profile</title>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/dashboad" class="logo d-flex align-items-center">
            <img src="assetsWeb/img/logo.svg" alt="" style="margin-top: 10px; margin-bottom: 12px; margin-right: 12px">
            <span class="d-none d-lg-block">ZenFemina</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assetsWeb/img/profile/<?=$profileImg;?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?=$fullName;?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?=$fullName;?></h6>
                        <span>Admin</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/profile">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" style="cursor:pointer;"  data-bs-toggle="modal" data-bs-target="#basicModal4">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- Sign Out -->
<form method="post" action="/profile">
    <div class="modal fade" id="basicModal4" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header" style="padding-top: 0.6rem; padding-bottom: 0.3rem;">
                        <i class="bi bi-exclamation-circle" style="color: red; font-size: 1.5rem; margin-left: 15px; margin-right: 8px" ></i>
                        <h5 style="margin-top: 9px">Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        Apakah Anda yakin ingin keluar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"  id="sign-out" name="sign-out">Sign out</button>
                    </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
</form>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Home</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Menu</li>
        <li class="nav-item">
            <a class="nav-link collapsed " href="/userTable">
                <i class="bi bi-people"></i>
                <span>User</span>
            </a>
        </li><!-- End User Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-book-mark-fill"></i><span>Education</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/article">
                        <i class="bi bi-circle"></i><span>Articles</span>
                    </a>
                </li>
                <li>
                    <a href="/uploadArticle">
                        <i class="bi bi-circle"></i><span>Upload New Article</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Education Nav -->

        <li class="nav-heading">Profile</li>
        <li class="nav-item">
            <a class="nav-link " href="/profile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assetsWeb/img/profile/<?=$profileImg;?>" alt="Profile" class="rounded-circle">
                        <h2><?=$fullName;?></h2>
                        <h3>Admin</h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8" style="color: #868e96;"><?= $fullName; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">User Name</div>
                                    <div class="col-lg-9 col-md-8" style="color: #868e96;"><?= $userName; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8" style="color: #868e96;">Admin</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8" style="color: #868e96;"><?= $email; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8" style="color: #868e96;"><?= $phone; ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="post" action="/profile" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assetsWeb/img/profile/<?=$profileImg;?>" id="previewImage" alt=<?=$profileImg;?>>
                                            <input type="hidden" id="inputImg" name="inputImg" value="<?=$profileImg;?>">
                                            <div class="pt-2">
                                                    <label for="fileUpload" class="custom-button">
                                                       <i  style="background-color: #4085FF; color: white; border-color: #4085FF; padding: 4px 10px; font-size: 12px; border-radius: 5px; cursor: pointer; margin-left: 0px " >Choose File</i>
                                                   </label>
                                                   <input type="file" id="fileUpload" name="fileUpload" style="display: none;" onchange="handleFileUploadProfile(this)" value="<?=$profileImg;?>">
                                            </div>
                                        </div>
                                    </div>


                                    <script>
                                        function handleFileUploadProfile(input) {
                                            const file = input.files[0];
                                            const previewImage = document.getElementById('previewImage');

                                            if (file) {
                                                const reader = new FileReader();
                                                reader.onload = function(e) {
                                                    previewImage.setAttribute('src', e.target.result);
                                                }
                                                reader.readAsDataURL(file);
                                            }
                                        }
                                    </script>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName" name="fullname" style="color: #868e96;" value="<?= $fullName; ?>" >
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="userName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="userName" type="text" class="form-control" id="userName" name="userName" style="color: #868e96;" value=<?= $userName; ?>>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="role" class="col-md-4 col-lg-3 col-form-label">Role</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="role" type="text" class="form-control" id="role" style="color: #868e96;" value="Admin">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" name="Email" style="color: #868e96;" value=<?= $email; ?>>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" name="Phone" style="color: #868e96;" value=<?= $phone; ?>>
                                        </div>
                                    </div>

                                    <div style="text-align: right;">
                                        <input type="submit" class="btn btn-primary" style="font-size: 12px;" value="Save Changes">
                                    </div>
                                </form><!-- End Profile Edit Form -->

                                <div class="modal fade" id="basicModal3" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="/userTable" novalidate>
                                                <div class="modal-header" style="padding-top: 0.6rem; padding-bottom: 0.3rem;">
                                                    <i class="bi bi-exclamation-circle" style="color: red; font-size: 1.5rem; margin-left: 15px; margin-right: 8px" ></i>
                                                    <h5 style="margin-top: 9px">Warning</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="text-align: center;">
                                                    Apakah Anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                    <input type="hidden" name="user_id_delete" id="user_id_delete" >
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form class="needs-validation" method="POST" action="/profile" novalidate>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label" style="color: #6C757D;">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="currentPassword" type="password" class="form-control" id="currentPassword" required>
                                            <div class="invalid-feedback">Please enter your current password</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label" style="color: #6C757D;">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="firstPassword" type="password" class="form-control" id="firstPassword" required>
                                            <div class="invalid-feedback">Please enter your New password</div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label" style="color: #6C757D;">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="secondPassword" type="password" class="form-control" id="secondPassword" required>
                                            <div class="invalid-feedback">Please Re-enter your New password</div>
                                        </div>
                                    </div>

                                    <div style="text-align: right;">
                                        <button type="submit" class="btn btn-primary" style="font-size: 14px; margin-bottom: 10px;" id="changePassword" name="changePassword" >Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
