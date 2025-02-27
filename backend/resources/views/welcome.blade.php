<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/swagger-ui-dist@4.13.2/swagger-ui.css">
        <script src="https://unpkg.com/swagger-ui-dist@4.13.2/swagger-ui-standalone-preset.js"></script>
        <script src="https://unpkg.com/swagger-ui-dist@4.13.2/swagger-ui-bundle.js"></script>
    </head>

    <body>
    <div id="swagger-ui"></div>
    <style>
        body {
            margin: 0;
        }
    </style>
    <script>
        window.onload = function() {
            const url = window.location.protocol + '//' + window.location.hostname + '/openapi/doc.yml?'+ Math.random().toFixed(2);
            const ui = SwaggerUIBundle({
                url: url,
                dom_id: '#swagger-ui',
                deepLinking: true,
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset,
                ],
                layout: 'StandaloneLayout',
            });
            window.ui = ui;
        };
    </script>
    </body>
</html>
