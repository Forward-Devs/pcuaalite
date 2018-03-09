<?php

return [

    /**
     *
     * Traducciones compartidas.
     *
     */
    'title' => 'Instalador de PCUAA',
    'next' => 'Siguiente',
    'finish' => 'Instalar',
    'back' => 'Anterior',
    'forms' => [
        'errorTitle' => 'Los siguientes errores han ocurrido:',
    ],

    /**
     *
     * Traducciones de la página principal.
     *
     */
    'welcome' => [
        'templateTitle' => 'Bienvenido',
        'title'   => 'Bienvenido al instalador',
        'message' => 'Bienvenido al asistente de configuración',
        'next'    => 'Ver Requisitos',
    ],


    /**
     *
     * Tranducciones de la página de requisitos.
     *
     */
    'requirements' => [
        'title' => 'Requisitos',
        'templateTitle' => 'Etapa 1 | Requisitos',
        'next'    => 'Ver Permisos',
    ],


    /**
     *
     * Traducciones de la pagina de permisos.
     *
     */
    'permissions' => [
        'title' => 'Permisos',
        'templateTitle' => 'Etapa 2 | Permisos',
        'next' => 'Configurar Entorno',
    ],


    /**
     *
     * Traducciones de la página de entorno.
     *
     */
    'environment' => [
      'menu' => [
          'templateTitle' => 'Etapa 3 | Configuración de Entorno',
          'title' => 'Configuración de Entorno',
          'desc' => 'Por favor seleccione como desea editar el archivo <code>.env</code>.',
          'wizard-button' => 'Formulario',
          'classic-button' => 'Editor de texto',
      ],
      'wizard' => [
          'templateTitle' => 'Etapa 3 | Configuración de Entorno | Formulario',
          'title' => 'Configuración guiada de <code>.env</code>',
          'tabs' => [
              'environment' => 'Entorno',
              'database' => 'Base de datos',
              'application' => 'Aplicación'
          ],
          'form' => [
              'name_required' => 'Un nombre de entorno es necesario',
              'app_name_label' => 'Nombre de Aplicación (Sin espacios)',
              'app_name_placeholder' => 'Nombre de Aplicación',
              'app_environment_label' => 'Entorno de aplicación',
              'app_environment_label_local' => 'Local',
              'app_environment_label_developement' => 'Desarrollo',
              'app_environment_label_qa' => 'Qa',
              'app_environment_label_production' => 'Producción',
              'app_environment_label_other' => 'Otro',
              'app_environment_placeholder_other' => 'Selecciona un entorno...',
              'app_debug_label' => 'Depurar errores',
              'app_debug_label_true' => 'Habilitato',
              'app_debug_label_false' => 'Deshabilitado',
              'app_log_level_label' => 'Nivel de registros log.',
              'app_log_level_label_debug' => 'debug',
              'app_log_level_label_info' => 'info',
              'app_log_level_label_notice' => 'notice',
              'app_log_level_label_warning' => 'warning',
              'app_log_level_label_error' => 'error',
              'app_log_level_label_critical' => 'critical',
              'app_log_level_label_alert' => 'alert',
              'app_log_level_label_emergency' => 'emergency',
              'app_url_label' => 'URL de la aplicación',
              'app_url_placeholder' => 'URL',
              'db_connection_label' => 'Conexión de la base de datos',
              'db_connection_label_mysql' => 'mysql',
              'db_connection_label_sqlite' => 'sqlite',
              'db_connection_label_pgsql' => 'pgsql',
              'db_connection_label_sqlsrv' => 'sqlsrv',
              'db_host_label' => 'Host de la DB',
              'db_host_placeholder' => 'Host de la DB',
              'db_port_label' => 'Puerto de la DB',
              'db_port_placeholder' => 'Puerto de la DB',
              'db_name_label' => 'Nombre de la DB',
              'db_name_placeholder' => 'Nombre de la DB',
              'db_username_label' => 'Usuario de la DB',
              'db_username_placeholder' => 'Usuario de la DB',
              'db_password_label' => 'Contraseña de la DB',
              'db_password_placeholder' => 'Contraseña de la DB',

              'app_tabs' => [
                  'more_info' => 'Más información',
                  'broadcasting_title' => 'Broadcasting, Cacheo, Sesiones, &amp; Queue',
                  'broadcasting_label' => 'Broadcast Driver',
                  'broadcasting_placeholder' => 'Broadcast Driver',
                  'cache_label' => 'Cache Driver',
                  'cache_placeholder' => 'Cache Driver',
                  'session_label' => 'Session Driver',
                  'session_placeholder' => 'Session Driver',
                  'queue_label' => 'Queue Driver',
                  'queue_placeholder' => 'Queue Driver',
                  'redis_label' => 'Redis Driver',
                  'redis_host' => 'Redis Host',
                  'redis_password' => 'Redis Password',
                  'redis_port' => 'Redis Port',

                  'mail_label' => 'Mail',
                  'mail_driver_label' => 'Mail Driver',
                  'mail_driver_placeholder' => 'Mail Driver',
                  'mail_host_label' => 'Mail Host',
                  'mail_host_placeholder' => 'Mail Host',
                  'mail_port_label' => 'Mail Port',
                  'mail_port_placeholder' => 'Mail Port',
                  'mail_username_label' => 'Mail Username',
                  'mail_username_placeholder' => 'Mail Username',
                  'mail_password_label' => 'Mail Password',
                  'mail_password_placeholder' => 'Mail Password',
                  'mail_encryption_label' => 'Mail Encryption',
                  'mail_encryption_placeholder' => 'Mail Encryption',

                  'pusher_label' => 'Pusher',
                  'pusher_app_id_label' => 'Pusher App Id',
                  'pusher_app_id_palceholder' => 'Pusher App Id',
                  'pusher_app_key_label' => 'Pusher App Key',
                  'pusher_app_key_palceholder' => 'Pusher App Key',
                  'pusher_app_secret_label' => 'Pusher App Secret',
                  'pusher_app_secret_palceholder' => 'Pusher App Secret',
              ],
              'buttons' => [
                  'setup_database' => 'Configurar Base de datos',
                  'setup_application' => 'Configurar Aplicación',
                  'install' => 'Instalar',
              ],
          ],
      ],
      'classic' => [
          'templateTitle' => 'Etapa 3 | Configuracion de Entorno | Editor Clásico',
          'title' => 'Configuraciones del entorno',
          'save' => 'Guardar archivo .env',
          'back' => 'Usar Formulario',
          'install' => 'Guardar e Instalar',
      ],

        'success' => 'Los cambios en tu archivo .env han sido guardados.',
        'errors' => 'No es posible crear el archivo .env, por favor intentalo manualmente.',
    ],

    'installed' => [
        'success_log_message' => 'PCUAA correctamente instalado en ',
    ],

    /**
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Finalizado.',
        'templateTitle' => 'Instalación Finalizada',
        'finished' => 'La aplicación ha sido instalada con éxito!',
        'migration' => 'Resultados de las Migraciones &amp; Semillas:',
        'console' => 'Resultados de la consola:',
        'log' => 'Entradas del LOG:',
        'env' => 'Archivo .env Final:',
        'exit' => 'Haz click aquí para salir.',
    ],

];
