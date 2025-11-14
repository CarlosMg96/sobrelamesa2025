@extends('layouts.master')
@section('title')
    Importar Asociados
@endsection
@section('css')
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <style nonce="newN0nc3ForS3cur1ty" >
        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            background-color: #f8f9fa;
            transition: border-color 0.3s ease;
        }
        .upload-area:hover {
            border-color: #ffc107;
            background-color: #fff3cd;
        }
        .upload-area.dragover {
            border-color: #ffc107;
            background-color: #fff3cd;
        }
        .file-icon {
            font-size: 3rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
        .file-input {
            display: none;
        }
        .file-info {
            margin-top: 1rem;
            padding: 1rem;
            background-color: #e9ecef;
            border-radius: 6px;
            display: none;
        }
        .progress-container {
            margin-top: 1rem;
            display: none;
        }
    </style>
@endsection
@section('page-title')
    Importar Asociados
@endsection
@section('body')
    <body data-layout="horizontal" data-topbar="dark">
@endsection
@section('content')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Importar Asociados desde Excel</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('partners') }}">Directorio</a></li>
                        <li class="breadcrumb-item active">Importar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Subir archivo Excel</h4>
                </div>
                <div class="card-body">
                    <form id="import-form" action="{{ route('partners.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="upload-area" id="upload-area">
                            <div class="file-icon">
                                <i class="bx bx-cloud-upload"></i>
                            </div>
                            <h5>Arrastra y suelta tu archivo Excel aquí</h5>
                            <p class="text-muted">o haz clic para seleccionar un archivo</p>
                            <input type="file" id="excel-file" name="excel_file" class="file-input" accept=".xlsx,.xls,.csv">
                            <button type="button" class="btn btn-outline-warning" onclick="document.getElementById('excel-file').click()">
                                <i class="bx bx-folder-open me-1"></i> Seleccionar archivo
                            </button>
                        </div>

                        <div class="file-info" id="file-info">
                            <div class="d-flex align-items-center">
                                <i class="bx bx-file-blank me-2 text-success"></i>
                                <div class="flex-grow-1">
                                    <strong id="file-name"></strong>
                                    <div class="text-muted small" id="file-size"></div>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-danger" id="remove-file">
                                    <i class="bx bx-x"></i>
                                </button>
                            </div>
                        </div>

                        <div class="progress-container" id="progress-container">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"  nonce="newN0nc3ForS3cur1ty" style="width: 0%" id="upload-progress"></div>
                            </div>
                            <div class="text-center mt-2">
                                <small class="text-muted">Procesando archivo...</small>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="alert alert-info">
                                <h6 class="alert-heading">Formato requerido:</h6>
                                <p class="mb-2">El archivo Excel debe contener las siguientes columnas en este orden:</p>
                                <ul class="mb-0">
                                    <li><strong>Last Name:</strong> Apellido del asociado</li>
                                    <li><strong>First Name:</strong> Nombre del asociado</li>
                                    <li><strong>Number:</strong> Número identificador</li>
                                    <li><strong>Directory Name:</strong> Nombre completo para directorio</li>
                                    <li><strong>Direct Number:</strong> Número directo</li>
                                    <li><strong>Email:</strong> Dirección de correo electrónico (obligatorio)</li>
                                    <li><strong>Position:</strong> Área de práctica o posición</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('partners') }}" class="btn btn-secondary">
                                <i class="bx bx-arrow-back me-1"></i> Cancelar
                            </a>
                            <div>
                                <a href="{{ route('partners.template') }}" class="btn btn-outline-info me-2" target="_blank">
                                    <i class="bx bx-download me-1"></i> Descargar plantilla
                                </a>
                                <button type="submit" class="btn btn-warning" id="submit-btn" disabled>
                                    <i class="bx bx-upload me-1"></i> Importar datos
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="modal fade" tabindex="-1" aria-labelledby="success-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <i class="bx bx-check-circle display-1 text-success"></i>
                    <h4 class="mt-3">¡Importación exitosa!</h4>
                    <p class="text-muted" id="import-message">Los datos se han importado correctamente.</p>
                    <button type="button" class="btn btn-warning" onclick="window.location.href='{{ route('partners') }}'">
                        Ver directorio
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <!-- alertifyjs js -->
    <script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
    <!-- App js -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    
    <script nonce="newN0nc3ForS3cur1ty" >
        $(document).ready(function() {
            const uploadArea = $('#upload-area');
            const fileInput = $('#excel-file');
            const fileInfo = $('#file-info');
            const fileName = $('#file-name');
            const fileSize = $('#file-size');
            const removeFileBtn = $('#remove-file');
            const submitBtn = $('#submit-btn');
            const progressContainer = $('#progress-container');
            const progressBar = $('#upload-progress');

            // Drag and drop functionality
            uploadArea.on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('dragover');
            });

            uploadArea.on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');
            });

            uploadArea.on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');
                
                const files = e.originalEvent.dataTransfer.files;
                if (files.length > 0) {
                    fileInput[0].files = files;
                    handleFileSelect(files[0]);
                }
            });

            // Click to upload
            uploadArea.on('click', function() {
                fileInput.click();
            });

            // File input change
            fileInput.on('change', function() {
                if (this.files && this.files[0]) {
                    handleFileSelect(this.files[0]);
                }
            });

            // Remove file
            removeFileBtn.on('click', function() {
                fileInput.val('');
                fileInfo.hide();
                submitBtn.prop('disabled', true);
                uploadArea.show();
            });

            function handleFileSelect(file) {
                // Validate file type
                const allowedTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'];
                if (!allowedTypes.includes(file.type) && !file.name.match(/\.(xlsx|xls|csv)$/i)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Tipo de archivo no válido',
                        text: 'Por favor selecciona un archivo Excel (.xlsx, .xls) o CSV.'
                    });
                    return;
                }

                // Validate file size (max 10MB)
                if (file.size > 10 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Archivo demasiado grande',
                        text: 'El archivo no puede superar los 10MB.'
                    });
                    return;
                }

                // Show file info
                fileName.text(file.name);
                fileSize.text(formatFileSize(file.size));
                fileInfo.show();
                uploadArea.hide();
                submitBtn.prop('disabled', false);
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            // Form submission
            $('#import-form').on('submit', function(e) {
                e.preventDefault();
                
                if (!fileInput[0].files || fileInput[0].files.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No hay archivo seleccionado',
                        text: 'Por favor selecciona un archivo para importar.'
                    });
                    return;
                }

                const formData = new FormData(this);
                
                // Show progress
                progressContainer.show();
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhr: function() {
                        const xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                const percentComplete = (evt.loaded / evt.total) * 100;
                                progressBar.css('width', percentComplete + '%');
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(response) {
                        progressContainer.hide();
                        if (response.success) {
                            // Build detailed message
                            let detailMessage = response.message || 'Los datos se han importado correctamente.';
                            
                            // Add details if available
                            if (response.imported !== undefined || response.updated !== undefined || response.skipped !== undefined) {
                                detailMessage += '<br><br><strong>Detalles:</strong><br>';
                                if (response.imported > 0) {
                                    detailMessage += `• ${response.imported} nuevos asociados creados<br>`;
                                }
                                if (response.updated > 0) {
                                    detailMessage += `• ${response.updated} asociados actualizados<br>`;
                                }
                                if (response.skipped > 0) {
                                    detailMessage += `• ${response.skipped} filas omitidas<br>`;
                                }
                            }
                            
                            // Show errors if any
                            if (response.errors && response.errors.length > 0) {
                                detailMessage += '<br><strong>Errores encontrados:</strong><br>';
                                detailMessage += '<div  nonce="newN0nc3ForS3cur1ty" style="text-align: left; max-height: 200px; overflow-y: auto;">';
                                response.errors.forEach(function(error) {
                                    detailMessage += `• ${error}<br>`;
                                });
                                detailMessage += '</div>';
                            }
                            
                            $('#import-message').html(detailMessage);
                            $('#success-modal').modal('show');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error en la importación',
                                text: response.message || 'Hubo un problema al importar los datos.'
                            });
                            submitBtn.prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        progressContainer.hide();
                        submitBtn.prop('disabled', false);
                        
                        let errorMessage = 'Hubo un problema al importar los datos.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Error en la importación',
                            text: errorMessage
                        });
                    }
                });
            });
        });
    </script>
@endsection
