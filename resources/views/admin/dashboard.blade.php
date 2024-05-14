<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>AdminLTE 3 | Dashboard 3</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    {{-- data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    {{-- Sweet Alert 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<style>
    .buttons-copy {
        background-color: #343a40;
        color: #fff;
        display: inline-block;
        font-weight: 400;
        color: #ffffff;
        text-align: center;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .buttons-csv {
        background-color: #343a40;
        color: #fff;
        display: inline-block;
        font-weight: 400;
        color: #ffffff;
        text-align: center;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-between">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('index') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <a href="{{ route('logout') }}" class="btn btn-danger"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('index') }}" class="brand-link">
                <img src="/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/images/aldo.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Rinaldo Bimantara</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="row">
                    <div class="mx-auto col-xl-11 col-md-11">
                        <div class="card" style="border-radius: 12px">
                            <div class="card-body">
                                <button class="btn btn-dark mb-3" id="add-button">Add News</button>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0" id="news-table" style="width: 100%;">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>News Title</th>
                                                <th>News Tagline</th>
                                                <th>News Description</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        @include('admin.add-news-modal')
        @include('admin.edit-news-modal')

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/js/adminlte.js"></script>
    {{-- data table js --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Datatable button --}}
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    {{-- LOGIC --}}

    <script>
        var newsTable;
        $(document).ready(function() {
            newsTable = $('#news-table').DataTable({

                processing: true,
                serverSide: true,
                language: {
                    paginate: {
                        previous: '<i class="fas fa-chevron-left"></i>',
                        next: '<i class="fas fa-chevron-right"></i>'
                    }
                },
                ajax: {
                    type: 'ajax',
                    method: 'GET',
                    url: '{{ route('admin.news.data') }}',
                    data: function(d) {
                        d._token = @json(csrf_token());
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "kelola",
                        name: "kelola",
                        orderable: false,
                        searchable: false,
                        width: "120"
                    },
                    {
                        data: "name",
                        name: "name",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "tagline",
                        name: "tagline",
                        orderable: true,
                        searchable: true,
                        render: function(data, type, row) {
                            return data.substr(0, 40) + '...';
                        }
                    },
                    {
                        data: "description",
                        name: "description",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return data.substr(0, 20) + '...';
                        }
                    }
                ],
                pageLength: 10,
            });

            /**
             * Fungsi ini digunakan untuk menampilkan error pada form tergantung formnya
             *
             * @param errors adalah error dari response xhr.responseJSON.errors
             * @param form adalah id dari form, #form-add_modal, #form-edit_modal
             */
            function displayErrors(errors, form) {
                $(".invalid-feedback").remove();
                $(".is-invalid").removeClass("is-invalid");

                for (var field in errors) {
                    var errorMessage = errors[field][0];
                    var inputField = form.find('[name="' + field + '"]');
                    var errorContainer = inputField.closest('.form-modal');
                    errorContainer.append('<span class="invalid-feedback">' +
                        errorMessage + '</span>');
                    inputField.addClass('is-invalid');
                }
            }

            // Cancel Button
            $(document).on('click', '#cancel-button', function() {
                $(".invalid-feedback").remove();
                $(".is-invalid").removeClass("is-invalid");

                $('#form-add_news')[0].reset();
                $('#add-news_modal').modal('hide');
            });

            $(document).on('click', '#edit-cancel_button', function() {
                $(".invalid-feedback").remove();
                $(".is-invalid").removeClass("is-invalid");

                $('#form-edit_news')[0].reset();
                $('#edit-news_modal').modal('hide');
            });


            // ---------------------------------------------------------------
            //                              CRUD
            // ---------------------------------------------------------------
            $('#add-button').click(function() {
                $('#add-news_modal').modal('show');
            });

            $('#form-add_news').submit(function(e) {
                e.preventDefault();
                $('.is-invalid').removeClass('is-invalid');

                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.news.store') }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.meta.code == 200) {
                            let successMsg = response.meta.message;
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#add-news_modal').modal('hide');
                            newsTable.draw();
                        }
                    },
                    error: function(xhr, textStatus, errorMessage) {
                        if (xhr.status == 422) {
                            let validationErrors = xhr.responseJSON.errors;
                            displayErrors(validationErrors, $('#form-add_news'));
                        } else {
                            Swal.fire('Error', 'Failed to save News', 'error');
                        }
                    }
                });
            });

            // ------------------------------------------------------------
            // UPDATE DATA
            // ------------------------------------------------------------
            $('#news-table').on('click', '.edit-btn', function(e) {
                e.preventDefault();
                let newsId = $(this).data('id');
                $('#form-edit_news').data('newsId', newsId);

                $.ajax({
                    url: '/admin/news/edit/' + newsId,
                    method: 'GET',
                    success: function(response) {
                        var newsData = response.newsData[0];

                        $('#edit_name').val(newsData.name);
                        $('#edit_tagline').val(newsData.tagline);
                        $('#edit_description').val(newsData.description);

                        var categories = newsData.categories;
                        categories.forEach(function(category) {
                            $('#edit_category' + category.id).prop('checked', true);
                        });

                        $('#edit_image').files = newsData.image;
                        if (newsData.image) {
                            $('#edit-image-preview').attr('src', '/images/' + newsData.image);
                            $('#edit-image-preview-container').removeClass('d-none');
                        } else {
                            $('#edit-image-preview').attr('src', '/images/');
                            $('#edit-image-preview-container').addClass('d-none');
                        }

                        $('#edit-news_modal').modal('show');
                    },
                    error: function(xhr, textStatus, errorMessage) {
                        Swal.fire('Error', 'Failed to retrieve news data', 'error');
                    },
                });
            });

            $("#form-edit_news").submit(function(event) {
                event.preventDefault();
                var newsId = $('#form-edit_news').data('newsId');
                prosesEdit(newsId);
            });

            function prosesEdit(newsId) {
                var formData = new FormData(document.getElementById('form-edit_news'));

                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');

                $.ajax({
                    url: '/admin/news/update/' + newsId,
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.meta.code == 200) {
                            let successMsg = response.meta.message;
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#edit-news_modal').modal('hide');
                            newsTable.draw();
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status == 422) {
                            let validationErrors = xhr.responseJSON.errors;
                            displayErrors(validationErrors, $('#form-edit_news'));
                        } else {
                            Swal.fire('Error', 'Failed to update news', 'error');
                        }
                    },
                });
            }

            // ------------------------------------------------------------
            // DELETE DATA
            // ------------------------------------------------------------
            $('#news-table').on('click', '.delete-btn', function(e) {
                e.preventDefault();
                let newsId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteData(newsId);
                    }
                });
            });

            function deleteData(newsId) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/news/destroy/' + newsId,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.meta.code == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                            });

                            newsTable.draw();
                        }
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.meta) {
                            let errorMsg = xhr.responseJSON.meta.message;
                            Swal.fire(errorMsg.title, errorMsg.body, 'error');
                        } else {
                            Swal.fire('Error', 'Failed to delete News data', 'error');
                        }
                    },
                });
            }
        });
    </script>

    {{-- STYLE --}}
    <script>
        /**
         * Memuat dan menampilkan image preview saat memilih gambar
         * menggunakan input file.
         *
         * @param {HTMLInputElement}  
         * <input type="file" class="form-control-file" 
         * id="image" name="image" accept="image/*" 
         * onchange="previewImage(this)">
         */
        function previewImage(input, targetImage, targetContainer) {
            var imagePreview = document.getElementById(targetImage);
            var imagePreviewContainer = document.getElementById(targetContainer);

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.classList.remove('d-none');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
