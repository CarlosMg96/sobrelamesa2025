<div class="h-100 w-100">
    <div class="text-center h-100 w-100">

        <div id="floor-contentZoom" class="position-relative w-100 level-floor-content">
            <div class="svg-zoom-container level-svg-container">
                <div class="svg-container" id="svgContainer">
                    <object id="planoPiso26" data="{{ URL::asset('images/svgMaps/Piso_26_(22Ago25_12pm).svg?v=1') }}"
                        type="image/svg+xml"></object>
                </div>
            </div>
            <div id="zona-modal" class="level-modal">
                <div class="level-modal-content">
                    <span id="modal-icon" class="level-modal-icon"></span>
                    <div class="level-modal-text">
                        <h5 id="modal-title" class="level-modal-title"></h5>
                        <p id="modal-content" class="level-modal-description"></p>
                    </div>
                    <button type="button" id="modal-close" class="close level-modal-close">×</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script nonce="newN0nc3ForS3cur1ty" >
        // Funciones auxiliares para manejo de estilos sin CSP
        function showModalElement(modal) {
            modal.classList.remove('js-modal-hide');
            modal.classList.add('js-modal-show', 'js-modal-fixed');
        }

        function hideModalElement(modal) {
            modal.classList.remove('js-modal-show', 'js-modal-fixed');
            modal.classList.add('js-modal-hide');
        }

        function positionModal(modal, x, y) {
            const posX = Math.max(0, Math.min(x + 5, window.innerWidth - modal.offsetWidth - 5)) || 0;
            const posY = Math.max(0, Math.min(y + 5, window.innerHeight - modal.offsetHeight - 5)) || 0;
            modal.style.left = `${posX}px`;
            modal.style.top = `${posY}px`;
        }

        function fadeOutModal(modal) {
            modal.classList.add('js-modal-transition', 'js-modal-fade');
            setTimeout(() => {
                hideModalElement(modal);
            }, 300);
        }

        @if (isset($usersBySection) && is_iterable($usersBySection))
            @php
                $usersData = [];
                foreach ($usersBySection as $section => $users) {
                    $usersData[$section] = $users
                        ->map(function ($user) {
                            return [
                                'first_name' => $user['first_name'],
                                'last_name' => $user['last_name'],
                                'position' => $user['position'],
                                'practice_areas' => array_map(function ($area) {
                                    return ['name' => $area['name']];
                                }, $user['practice_areas']),
                            ];
                        })
                        ->toArray();
                }

                // Debug output
                // echo '<pre>';
                // print_r($usersData);
                // echo '</pre>';

                // Log to Laravel log
                // \Log::info('Users with practice areas', ['data' => $usersData]);

            @endphp

            window.usersBySection = @json($usersData);
        @else
            console.warn('No users data available');
            window.usersBySection = {};
        @endif
        // Asegurarse de que la variable global exista
        if (typeof window.seccionesPiso26 === 'undefined') {
            window.seccionesPiso26 = [];
        }

        // Configuración de las áreas del mapa
        window.seccionesPiso26 = window.seccionesPiso26.concat([{
                id: 'p26-1',
                code: 'A1',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-2',
                code: 'A2',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-3',
                code: 'A3',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-4',
                code: 'A4',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-5',
                code: 'A5',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-6',
                code: 'A6',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-7',
                code: 'A7',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-8',
                code: 'A8',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-9',
                code: 'A9',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-10',
                code: 'A10',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-11',
                code: 'A11',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-12',
                code: 'A12',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-13',
                code: 'A13',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-14',
                code: 'A14',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-15',
                code: 'A15',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-16',
                code: 'A16',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-17',
                code: 'A17',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-18',
                code: 'A18',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-19',
                code: 'A19',
                nombre: 'Sala de juntas',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-20',
                code: 'A20',
                nombre: 'Café Mimbre',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-21',
                code: 'A21',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-22',
                code: 'A22',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-23',
                code: 'A23',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-24',
                code: 'A24',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-25',
                code: 'A25',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-26',
                code: 'A26',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-27',
                code: 'A27',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-28',
                code: 'A28',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-29',
                code: 'A29',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-30',
                code: 'A30',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-31',
                code: 'A31',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-32',
                code: 'A32',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-33',
                code: 'A33',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-34',
                code: 'A34',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-35',
                code: 'A35',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-36',
                code: 'A36',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-37',
                code: 'A37',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-38',
                code: 'A38',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-39',
                code: 'A39',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-40',
                code: 'A40',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-41',
                code: 'A41',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-42',
                code: 'A42',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-43',
                code: 'A43',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-44',
                code: 'A44',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-45',
                code: 'A45',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-46',
                code: 'A46',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-47',
                code: 'A47',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-48',
                code: 'A48',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-49',
                code: 'A49',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-50',
                code: 'A50',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-51',
                code: 'A51',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-52',
                code: 'A52',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-53',
                code: 'A53',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-54',
                code: 'A54',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-55',
                code: 'A55',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-56',
                code: 'A56',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-57',
                code: 'A57',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-58',
                code: 'A58',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-59',
                code: 'A59',
                nombre: 'Área de copiado, impresión y reciclaje',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-60',
                code: 'A60',
                nombre: 'Phone Booth',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-61',
                code: 'A61',
                nombre: 'Baño con regadera',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-62',
                code: 'A62',
                nombre: 'Closet de limpieza',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-63',
                code: 'A63',
                nombre: 'Baño interno',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-64',
                code: 'A64',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-65',
                code: 'A65',
                nombre: 'Oficina privada',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-66',
                code: 'A66',
                nombre: 'Baños privados',
                horario: '',
                icono: ''
            },
            {
                id: 'p26-67',
                code: 'A67',
                nombre: 'Baños privados',
                horario: '',
                icono: ''
            }
        ]);

        // Ensure this is called *after* the SVG is loaded *and* the content is ready.
        function loadAndInitializeSVG() {
            // console.log('=== Inicializando SVG ===');
            const svgObject = document.getElementById('planoPiso26');

            if (!svgObject) {
                console.error('No se encontró el elemento SVG');
                return;
            }

            // console.log('Elemento SVG encontrado, esperando a que cargue...');

            svgObject.addEventListener('load', function() {
                // console.log('SVG cargado, configurando manejadores...');
                setupAreaClickHandlers(svgObject.contentDocument);

                // Inicializar las secciones
                if (typeof window.seccionesPiso26 !== 'undefined' && Array.isArray(window.seccionesPiso26)) {
                    // console.log('Inicializando secciones desde seccionesPiso26. Total:', window.seccionesPiso26
                        // .length);
                    window.secciones = [...window.seccionesPiso26];

                    // Llamar a cargarSecciones si existe en el ámbito global
                    if (typeof window.cargarSecciones === 'function') {
                        // console.log('Llamando a cargarSecciones...');
                        window.cargarSecciones();
                    } else {
                        // console.warn('La función cargarSecciones no está disponible en el ámbito global');
                    }
                } else {
                    console.error('No se encontraron secciones en window.seccionesPiso26');
                }
            });

            // Forzar la recarga del SVG si tarda demasiado
            setTimeout(() => {
                if (!window.secciones || window.secciones.length === 0) {
                    console.warn('Tiempo de espera agotado para cargar las secciones');
                    if (svgObject.contentDocument && svgObject.contentDocument.documentElement) {
                        // console.log('Forzando inicialización del SVG...');
                        setupAreaClickHandlers(svgObject.contentDocument);
                    }
                }
            }, 5000);
        }

        // Llamar a la función de inicialización cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            // console.log('DOM cargado, inicializando...');
            loadAndInitializeSVG();

            // También intentar inicializar las secciones después de un breve retraso
            setTimeout(() => {
                if (typeof window.seccionesPiso26 !== 'undefined' && Array.isArray(window
                        .seccionesPiso26)) {
                    window.secciones = [...window.seccionesPiso26];
                    if (typeof window.cargarSecciones === 'function') {
                        window.cargarSecciones();
                    }
                }
            }, 1000);
        });
        //     try {
        //         console.log('intento de metodo ios');
        //         svgDoc = svgObject.contentDocument;
        //         console.log('sale el svgDoc', svgDoc);

        //         if (!svgDoc) {
        //             console.error('No se pudo acceder al documento SVG.');
        //             return;
        //         }

        //         if (!svgDoc.documentElement) {
        //             console.error('El documento SVG está vacío.');
        //             return;
        //         }

        //         console.log('SVG loaded and ready for initialization.');
        //         initSVGContent();


        //     } catch (error) {
        //         console.error('Error al inicializar el SVG:', error);
        //         console.log('intento de metodo otros navegadores');
        //         // First, ensure we have the SVG object and its contentDocument
        //         if (!svgObject || !svgObject.contentDocument) {
        //             console.error('No se pudo acceder al documento SVG.');
        //             // Retry after a short delay
        //             return setTimeout(() => initializeSVG(svgObject), 100);
        //         }

        //         // Store the SVG document in our global variable
        //         svgDoc = svgObject.contentDocument;

        //         // Check if the SVG document is fully loaded
        //         if (svgDoc.readyState === 'complete' || svgDoc.readyState === 'interactive') {
        //             initSVGContent();
        //         } else {
        //             // If not ready, wait for the load event
        //             svgObject.addEventListener('load', initSVGContent, {
        //                 once: true
        //             });
        //         }
        //     }
        // }




        function initializeSVG(svgObject) {
            // console.log('intento de metodo otros navegadores');
            // First, ensure we have the SVG object and its contentDocument
            if (!svgObject || !svgObject.contentDocument) {
                console.error('SVG object or contentDocument not available');
                // Retry after a short delay
                return setTimeout(() => initializeSVG(svgObject), 100);
            }

            // Store the SVG document in our global variable
            svgDoc = svgObject.contentDocument;

            // Check if the SVG document is fully loaded
            if (svgDoc.readyState === 'complete' || svgDoc.readyState === 'interactive') {
                initSVGContent();
            }
        }

        //Initialize SVG content once it's fully loaded
        function initSVGContent() {
            if (!svgDoc || !svgDoc.documentElement) {
                console.error('SVG document is not properly loaded');
                return;
            }



            // Initialize map areas and click handlers
            try {
                initMapAreas(svgDoc);
                setupAreaClickHandlers(svgDoc);

                // Check if a section needs highlighting from URL parameters
                const urlParams = new URLSearchParams(window.location.search);
                const section = urlParams.get('section');

                if (section) {
                    // console.log('Highlighting section from URL:', section);
                    // Use a small delay to ensure everything is initialized
                    setTimeout(() => window.resaltarArea(section, 0), 300);
                }
            } catch (error) {
                console.error('Error initializing SVG content:', error);
            }
        }

        function setupAreaClickHandlers(svgDocument, retryCount = 0) {
            const maxRetries = 10;
            const retryDelay = 200;

            // Si no hay svgDocument, intentar obtenerlo
            if (!svgDocument) {
                const svgObject = document.getElementById('planoPiso26');
                if (svgObject && svgObject.contentDocument) {
                    svgDocument = svgObject.contentDocument;
                } else {
                    console.warn('Cannot set up click handlers: svgDoc is not available');
                    if (retryCount < maxRetries) {
                        // console.log(`Reintentando setupAreaClickHandlers (${retryCount + 1}/${maxRetries})...`);
                        setTimeout(() => setupAreaClickHandlers(null, retryCount + 1), retryDelay);
                    }
                    return;
                }
            }

            // Asegurarse de que seccionesPiso26 existe
            if (!window.seccionesPiso26 || !Array.isArray(window.seccionesPiso26)) {
                console.error('seccionesPiso26 no está definido o no es un array');
                return;
            }

            window.seccionesPiso26.forEach(section => {
                const area = svgDocument.getElementById(section.id);
                if (area) {
                    area.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const rect = this.getBoundingClientRect();
                        const x = rect.left + window.scrollX + (rect.width / 2);
                        const y = rect.top + window.scrollY + (rect.height / 2);

                        window.resaltarArea(section.id);
                        window.showModal(
                            section.nombre,
                            `Código: ${section.code}`,
                            x,
                            y,
                            section.icono,
                            section.id
                        );
                    });
                } else {
                    // console.warn(`Area with id "${section.id}" not found in SVG.`); // ADDED
                }
            });

            // Manejador de clic para cerrar el modal al hacer clic fuera
            function handleDocumentClick(e) {
                const modal = document.getElementById('zona-modal');
                if (modal && !modal.contains(e.target) && !e.target.closest('[data-zona]')) {
                    closePopup();
                }
            }

            // Asegurarse de no agregar múltiples listeners
            document.removeEventListener('click', handleDocumentClick);
            document.addEventListener('click', handleDocumentClick);
        }

        function initMapAreas(svgDocument) {

            if (!svgDocument) {
                console.error('Cannot initialize areas: svgDoc is not available');
                return;
            }

            seccionesPiso26.forEach(section => {
                const area = svgDocument.getElementById(section.id);
                if (area) {
                    area.setAttribute('data-zona', section.nombre || 'Sin nombre');
                    area.setAttribute('data-zona-icon', section.icono || ' ');
                    area.classList.add('area');
                    area.classList.add('js-area-cursor-pointer');
                } else {
                    // console.warn(`Area with id "${section.id}" not found in SVG.`); //ADDED
                }
            });
            return true;
        }

        window.resaltarArea = function(areaId, retryCount = 0, showModal = true) {
            const maxRetries = 10; // Aumentamos el número de reintentos
            const retryDelay = 200; // 200ms entre reintentos

            const svgObject = document.getElementById('planoPiso26');
            if (!svgObject) {
                console.error('No SVG object found.');
                if (retryCount < maxRetries) {
                    // console.log(`Reintentando (${retryCount + 1}/${maxRetries})...`);
                    setTimeout(() => window.resaltarArea(areaId, retryCount + 1, showModal), retryDelay);
                }
                return;
            }

            const svgDoc = svgObject.contentDocument;
            if (!svgDoc) {
                console.error('SVG document not loaded');
                if (retryCount < maxRetries) {
                    // console.log(`Reintentando (${retryCount + 1}/${maxRetries})...`);
                    setTimeout(() => window.resaltarArea(areaId, retryCount + 1, showModal), retryDelay);
                }
                return;
            }
            try {
                const area = svgDoc.getElementById(areaId);
                if (!area) {
                    console.error('Area not found in SVG:', areaId);
                    return;
                }

                const areas = svgDoc.querySelectorAll('[id^="p26-"]');
                areas.forEach(a => {
                    if (a.classList) {
                        a.classList.remove('areaSeleccionada');
                    }
                });

                if (area.classList) {
                    area.classList.add('areaSeleccionada');
                }

                const rect = area.getBoundingClientRect();

                // Scroll the area into view
                area.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center',
                    inline: 'center'
                });

                const seccion = window.seccionesPiso26 ? window.seccionesPiso26.find(s => s.id === areaId) : null;
                if (seccion && showModal) {
                    try {
                        const updatedRect = area.getBoundingClientRect();
                        const centerX = updatedRect.left + updatedRect.width / 2;
                        const centerY = updatedRect.top + updatedRect.height / 2;

                        window.showModal(
                            seccion.nombre,
                            `Código: ${seccion.code}`,
                            centerX,
                            centerY,
                            seccion.icono || ' ',
                            areaId
                        );
                    } catch (e) {
                        console.error('Error al mostrar el modal:', e);
                    }
                }
                return true;

            } catch (error) {
                console.error('Error highlighting the area:', error);
                return false;
            }
        };

        // Hacer la función showModal disponible globalmente
        // Pasar los usuarios al contexto de JavaScript
        @php
            $usersData = [];
            if (isset($usersBySection) && count($usersBySection) > 0) {
                foreach ($usersBySection as $section => $users) {
                    $usersData[$section] = $users
                        ->map(function ($user) {
                            return [
                                'first_name' => $user['first_name'],
                                'last_name' => $user['last_name'],
                                'position' => $user['position'],
                                'practice_areas' => array_map(function ($area) {
                                    return ['name' => $area['name']];
                                }, $user['practice_areas']),
                            ];
                        })
                        ->toArray();
                }
            }
        @endphp

        window.usersBySection = @json($usersData);

        window.showModal = function(title, content, x, y, icon = ' ', sectionId = '') {
            const modal = document.getElementById('zona-modal');
            const modalTitle = document.getElementById('modal-title');
            const modalContent = document.getElementById('modal-content');
            const modalIcon = document.getElementById('modal-icon');

            if (!modal || !modalTitle || !modalContent || !modalIcon) {
                console.error('No se encontraron los elementos del modal:', {
                    modal: !!modal,
                    modalTitle: !!modalTitle,
                    modalContent: !!modalContent,
                    modalIcon: !!modalIcon
                });
                return;
            }

            // Always show section code at the top
            let modalHTML = `<div class="section-code level-section-code-hidden">${content}</div>`;

            // Check if there are users in this section
            if (window.usersBySection && sectionId && window.usersBySection[sectionId] && window.usersBySection[
                    sectionId].length > 0) {
                const users = window.usersBySection[sectionId];
                const userCount = users.length;
                modalHTML += `
                    <div class="mt-3">
                        <ul class="list-unstyled mt-2">`;

                users.forEach((user, index) => {
                    if (!user) return;
                    // console.log(`User ${index + 1}:`, user);
                    const fullName = [user.first_name, user.last_name].filter(Boolean).join(' ');



                    // Verificar si practice_areas existe y tiene al menos un elemento
                    const practiceArea = user.practice_areas?.[0]?.name || 'Sin equipo';
                    modalHTML += `
                            <li class="py-2">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user me-2"></i>
                                    <div>
                                        <div class="fw-medium">${fullName}</div>
                                        ${user.position ? `<div class="text-muted small">${user.position}</div>` : ''}
                                        <div class="p-1 rounded-3 mt-1">
                                            <span class="fw-medium text-white"> ${practiceArea}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>`;
                });

                modalHTML += `
                        </ul>
                    </div>`;
            }

            // Actualizar el contenido del modal
            if (window.usersBySection && sectionId && window.usersBySection[sectionId] && window.usersBySection[
                    sectionId].length > 0) {
                // Hide title when there are people
                modalTitle.classList.add('js-modal-title-hide');
            } else {
                // Show title when there are no people
                modalTitle.classList.remove('js-modal-title-hide');
                modalTitle.textContent = title;
            }

            modalContent.innerHTML = modalHTML;
            modalIcon.textContent = icon;

            // Usar clases CSS en lugar de estilos inline
            showModalElement(modal);
            modal.style.position = 'fixed';

            function showPopup(x, y, zonaId) {
                const modal = document.getElementById('zona-modal');
                if (!modal) return;

                // Mostrar el modal
                showModalElement(modal);

                // Posicionar el modal
                const posX = Math.max(0, Math.min(x + 5, window.innerWidth - modal.offsetWidth - 5)) || 0;
                const posY = Math.max(0, Math.min(y + 5, window.innerHeight - modal.offsetHeight - 5)) || 0;

                modal.style.left = `${posX}px`;
                modal.style.top = `${posY}px`;

                // Hacer scroll hasta el área seleccionada
                const area = svgDoc.querySelector(`[id="${zonaId}"]`);
                if (area) {
                    const rect = area.getBoundingClientRect();
                    window.scrollTo({
                        top: window.scrollY + rect.top - 100, // 100px de margen superior
                        behavior: 'smooth'
                    });
                }


            }

            // Posicionar el modal
            const posX = Math.max(0, Math.min(x + 5, window.innerWidth - modal.offsetWidth - 5)) || 0;
            const posY = Math.max(0, Math.min(y + 5, window.innerHeight - modal.offsetHeight - 5)) || 0;

            modal.style.left = `${posX}px`;
            modal.style.top = `${posY}px`;


        }

        function removeHighlight() {
            const svgObject = document.getElementById('planoPiso26');
            if (svgObject && svgObject.contentDocument) {
                const svgDoc = svgObject.contentDocument;
                svgDoc.querySelectorAll('.areaSeleccionada').forEach(area => {
                    area.classList.remove('areaSeleccionada');
                });
            } else {
                console.warn('Cannot remove highlight: SVG document is not loaded');
            }
        }

        window.closePopup = function() {
            const modal = document.getElementById('zona-modal');
            if (modal) {
                fadeOutModal(modal);
                removeHighlight();
            }
        }

        const closeButton = document.getElementById('modal-close');
        if (closeButton) {
            closeButton.addEventListener('click', closePopup);
        }

        function loadAndInitializeSVG() {
            const svgObject = document.getElementById('planoPiso26');

            if (!svgObject) {
                console.error('SVG object not found.');
                return;
            }

            // Load Event Listener
            svgObject.addEventListener('load', () => {
                // console.log('SVG load event triggered.');

                // Add a small delay before initializing (critical for iOS Safari)
                setTimeout(() => {
                    if (svgObject.contentDocument) {
                        // console.log('Initializing SVG after load event and delay.');
                        initializeSVG(svgObject);
                    } else {
                        console.error(
                            'SVG contentDocument is still null after load event and delay.');
                    }
                }, 200); // Adjust delay (100-200ms) as needed
            });

            // Failsafe Timeout
            setTimeout(() => {
                if (!svgObject.contentDocument) {
                    console.warn('SVG load timeout reached. Attempting initialization anyway.');
                    if (svgObject.contentDocument) {
                        initializeSVG(svgObject);
                    } else {
                        console.error('Failed to load SVG. Displaying error message.');
                        // Optionally, display an error message to the user
                        const errorContainer = document.getElementById('svg-error-message');
                        if (errorContainer) {
                            errorContainer.textContent =
                                'Failed to load the floor plan. Please try refreshing the page.';
                            errorContainer.classList.add('js-error-display');
                        }
                    }

                }
            }, 5000);
        }


        // Inicializar las secciones globales
        window.secciones = [];

        // Esperar a que se cargue el DOM para asegurar que seccionesPiso26 esté definido
        document.addEventListener('DOMContentLoaded', function() {
            loadAndInitializeSVG();
            if (typeof window.seccionesPiso26 !== 'undefined' && Array.isArray(window.seccionesPiso26)) {
                window.secciones = [...window.seccionesPiso26];
            } else {
                console.error('No se pudo cargar la configuración de secciones');
            }

            // Configurar manejadores de eventos del SVG
            const svgObject = document.getElementById('planoPiso26');

            // Función para inicializar el SVG
            function initSVG() {

                if (!svgObject || !svgObject.contentDocument) {
                    console.error('El objeto SVG no está disponible');
                    return false;
                }

                const svgDoc = svgObject.contentDocument;

                // Verificar si el SVG tiene contenido
                if (!svgDoc.documentElement) {
                    console.error('El documento SVG está vacío');
                    return false;
                }

                // Configurar las áreas del SVG
                seccionesPiso26.forEach(section => {
                    const area = svgDoc.getElementById(section.id);
                    if (area) {
                        area.setAttribute('data-zona', section.nombre);
                        area.setAttribute('data-zona-icon', section.icono);
                        area.classList.add('area');
                        area.classList.add('js-area-cursor-pointer');
                    } else {
                        // console.warn(`Área no encontrada: ${section.id}`);
                    }
                });

                // Configurar manejadores de clic
                setupAreaClickHandlers();

                return true;
            }

            // Inicializar el SVG cuando esté listo
            if (svgObject.contentDocument.readyState === 'complete') {
                initSVG();
            } else {
                svgObject.addEventListener('load', function() {
                    initSVG();
                });
            }

            document.addEventListener('click', function(e) {
                if (!e.target.closest('[data-zona]') && !e.target.closest('#zona-modal')) {
                    closePopup();
                }
            });

            // También intentar inicializar después de un breve retraso
            setTimeout(initSVG, 1000);
        });
    </script>
@endpush

@push('styles')
    <style nonce="newN0nc3ForS3cur1ty">
        /* Modal styles */
        #zona-modal {
            z-index: 1050;
            max-width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        #modal-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .section-code {
            font-size: 0.95rem;
            color: #ffffff;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        #zona-modal .list-unstyled {
            max-height: 200px;
            overflow-y: auto;
            margin: 0.5rem 0;
            padding-right: 0.5rem;
        }

        #zona-modal .list-unstyled li {
            padding: 0.5rem 0.75rem;
            margin: 0.25rem 0;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        /*
                                                                                            #zona-modal .list-unstyled li:hover {
                                                                                                background-color: #e9ecef;
                                                                                            } */

        #zona-modal .text-muted {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .map-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
            position: relative;
        }

        .svg-container {
            width: 100%;
            overflow: hidden;
            position: relative;
            padding-bottom: 75%;
            /* Proporción 4:3 */
            height: 0;
            background-color: #f8f9fa;
        }

        .svg-container object {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease;
            transform-origin: 0 0;
            max-width: 100%;
            max-height: 100%;
        }

        .areaSeleccionada {
            fill: rgba(13, 110, 253, 0.3);
            stroke: #0d6efd;
            stroke-width: 2px;
        }
    </style>
@endpush