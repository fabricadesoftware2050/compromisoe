<!DOCTYPE html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Seguidores | Compromiso Electoral</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('partials.aside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('partials.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @include('partials.alerts')
                        @if ($accion == 'listar')
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Listar</span> de amigos</h4>
                            <!-- Basic Bootstrap Table -->
                            <div class="card">
                                <h5 class="card-header">Table Basic</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>NOMBRE</th>
                                                <th>Client</th>
                                                <th>Users</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">

                                            @foreach ($seguidores as $seguidor)
                                                <tr>
                                                    <td>
                                                        <img src="{{ $seguidor->foto ?? asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                                                class="rounded-circle">
                                                        <strong>{{ $seguidor->nombre }}</strong>
                                                    </td>
                                                    <td>{{ $seguidor->documento }}</td>
                                                    <td>{{ $seguidor->celular }}</td>
                                                    <td>
                                                        @if ($seguidor->lider)
                                                            <span class="badge bg-label-success">Líder</span>
                                                        @else
                                                            <span class="badge bg-label-secondary">Seguidor</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{ route('seguidores.edit', $seguidor->id) }}"><i
                                                                    class="bx bx-edit-alt me-1"></i> Editar</a>
                                                                    <form action="{{ route('seguidores.destroy', $seguidor->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="bx bx-trash me-1"></i> Borrar</button>
                                                                    </form>
                                                        </div>
                                                    </div>

                                                    </td>
                                                </tr>
                                            @endforeach
<tr>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Basic Bootstrap Table -->
                        @elseif ($accion == 'crear')
                            <div class="row">
                                <div class="col-xxl">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0">Basic with Icons</h5>
                                            <small class="text-muted float-end">Merged input group</small>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('seguidores.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                {{-- Nombre --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="nombre">Nombre *</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-user"></i></span>
                                                            <input type="text" class="form-control" id="nombre"
                                                                name="nombre" placeholder="Nombre completo" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Documento --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="documento">Documento *</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-id-card"></i></span>
                                                            <input type="text" class="form-control" id="documento"
                                                                name="documento" placeholder="Número de documento"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>



                                                {{-- Celular --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="celular">Celular</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-phone"></i></span>
                                                            <input type="text" class="form-control" id="celular"
                                                                name="celular" placeholder="300 123 4567">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Correo --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="correo">Correo
                                                        electrónico</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-envelope"></i></span>
                                                            <input type="email" class="form-control" id="correo"
                                                                name="correo" placeholder="correo@ejemplo.com">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Dirección --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="direccion">Dirección</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-home"></i></span>
                                                            <input type="text" class="form-control" id="direccion"
                                                                name="direccion"
                                                                placeholder="Dirección de residencia">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Municipio --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="municipio">Municipio</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-map"></i></span>
                                                            <input type="text" class="form-control" id="municipio"
                                                                name="municipio"
                                                                placeholder="Municipio de residencia">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Puesto de votación --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="puesto">Puesto de
                                                        votación</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-building-house"></i></span>
                                                            <input type="text" class="form-control" id="puesto"
                                                                name="puesto" placeholder="Nombre del puesto">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Mesa --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="mesa">Mesa</label>
                                                    <div class="col-sm-10">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i
                                                                    class="bx bx-grid-alt"></i></span>
                                                            <input type="text" class="form-control" id="mesa"
                                                                name="mesa" placeholder="Número de mesa">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Foto --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label" for="foto">Foto</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" id="foto"
                                                            name="foto" accept="image/*">
                                                    </div>
                                                </div>

                                                {{-- Líder --}}
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"
                                                        for="lider">Líder</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-check form-switch mb-2">
                                                            <input name="lider" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault">Es de los líderes que me apoyan?</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Botón de envío --}}
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Guardar
                                                            Seguidor</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with ❤️ by
                                <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-bolder">ThemeSelection</a>
                            </div>
                            <div>
                                <a href="https://themeselection.com/license/" class="footer-link me-4"
                                    target="_blank">License</a>
                                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                                    Themes</a>

                                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                    target="_blank" class="footer-link me-4">Documentation</a>

                                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                    target="_blank" class="footer-link me-4">Support</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
