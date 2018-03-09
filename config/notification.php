<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Session key
    |--------------------------------------------------------------------------
    |
    | Session key for messages.
    |
    */
    'session_key'                           => 'notifications',

    /*
    |--------------------------------------------------------------------------
    | Default container name
    |--------------------------------------------------------------------------
    |
    | This name will be used to name default container (when calling it with null value).
    |
    */
    'default_container'                     => 'default',

    /*
    |--------------------------------------------------------------------------
    | Default types for dynamic containers.
    |--------------------------------------------------------------------------
    |
    | These types will be added for new containers.
    |
    */
    'default_types'                         => array('info', 'success', 'warning', 'error'),

    /*
    |--------------------------------------------------------------------------
    | Types for containers
    |--------------------------------------------------------------------------
    |
    | Specify available types for each container separately.
    |
    */
    'types'                                 => array(),

    /*
    |--------------------------------------------------------------------------
    | Default message format
    |--------------------------------------------------------------------------
    |
    | This format will be used when no format is specified.
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'default_format'                        => '<script type="text/javascript">
    		toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    };

    toastr.:type(":message", "Notificación");
    		</script>',

    /*
    |--------------------------------------------------------------------------
    | Default message format for containers
    |--------------------------------------------------------------------------
    |
    | This format will be used to override global default format for each container.
    |
    | 'format' => array(
    |       'myContainer' => ':message - :type',
    | )
    |
    |
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'format'                                => array(),

    /*
    |--------------------------------------------------------------------------
    | Default message formats for types
    |--------------------------------------------------------------------------
    |
    | These formats can override default format for each type of message (error, warning, info, success).
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'default_formats'                       => array(
        'info'                  => '<script type="text/javascript">
        		toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };

        toastr.info(":message", "Notificación");
        		</script>',
        'success'               => '<script type="text/javascript">
        		toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };

        toastr.sucess(":message", "Notificación");
        		</script>',
        'warning'               => '<script type="text/javascript">
        		toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };

        toastr.warning(":message", "Notificación");
        		</script>',
        'error'                 => '<script type="text/javascript">
        		toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };

        toastr.danger(":message", "Notificación");
        		</script>',
    ),

    /*
    |--------------------------------------------------------------------------
    | Message formats for types and container types
    |--------------------------------------------------------------------------
    |
    | These formats can override default format for each type of message (error, warning, info, success).
    | You can set formats for each container by using this syntax:
    |
    | 'formats' => array(
    |       'myContainer' => array(
    |           'info' => ':key - :message'
    |       )
    |   )
    |
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'formats'                       => array(),

);
