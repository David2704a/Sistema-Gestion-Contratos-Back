<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {nombre}';
    protected $description = 'Crea un servicio y su implementación';

    /**
     * Ejecutar el comando.
     *
     * @return void
     */
    public function handle()
    {
        // Obtenemos el nombre del servicio pasado como argumento
        $nombre = $this->argument('nombre');

        // Definir rutas de las carpetas
        $carpetaServices = app_path('Services');
        $carpetaImplementations = $carpetaServices . '/Implementations';

        // Crear las carpetas si no existen
        if (!File::exists($carpetaServices)) {
            File::makeDirectory($carpetaServices);
            $this->info("Carpeta Services creada.");
        }

        if (!File::exists($carpetaImplementations)) {
            File::makeDirectory($carpetaImplementations);
            $this->info("Carpeta Implementations creada.");
        }

        // Crear el archivo [nombre]Service.php
        $serviceFile = $carpetaServices . '/' . $nombre . 'Service.php';
        if (!File::exists($serviceFile)) {
            $serviceContent = "<?php\n\nnamespace App\Services;\n\n";
            $serviceContent .= "interface " . $nombre . "Service {\n";
            $serviceContent .= "    // Definir los métodos del servicio\n";
            $serviceContent .= "}\n";

            File::put($serviceFile, $serviceContent);
            $this->info($nombre . 'Service.php creado.');
        }

        // Crear el archivo [nombre]ServiceImpl.php
        $implFile = $carpetaImplementations . '/' . $nombre . 'ServiceImpl.php';
        if (!File::exists($implFile)) {
            $implContent = "<?php\n\nnamespace App\Services\Implementations;\n\n";
            $implContent .= "use App\Services\\" . $nombre . "Service;\n\n";
            $implContent .= "class " . $nombre . "ServiceImpl implements " . $nombre . "Service {\n";
            $implContent .= "    // Implementar los métodos del servicio\n";
            $implContent .= "}\n";

            File::put($implFile, $implContent);
            $this->info($nombre . 'ServiceImpl.php creado.');
        }

        // Añadir el binding al ServiceProvider
        $this->addBindingToProvider($nombre);
    }

    /**
     * Agrega el binding al ServiceProvider si no existe.
     *
     * @param string $nombre
     */
    private function addBindingToProvider($nombre)
    {
        // Ruta al archivo ServiceProvider
        $providerFile = app_path('Providers/AppServiceProvider.php');

        // Verificamos si el archivo existe
        if (File::exists($providerFile)) {
            // Cargar el contenido del archivo
            $providerContent = File::get($providerFile);

            // El binding que necesitamos agregar
            $binding = '$this->app->bind(\'App\Services\\' . $nombre . 'Service\', \'App\Services\Implementations\\' . $nombre . 'ServiceImpl\');';

            // Verificar si el binding ya está presente
            if (strpos($providerContent, $binding) === false) {
                // Buscar la posición de las llaves del método register
                $startPos = strpos($providerContent, 'public function register()');
                $endPos = strpos($providerContent, '}', $startPos);

                // Si encontramos las llaves correctamente
                if ($startPos !== false && $endPos !== false) {
                    // Buscar la posición justo antes de la llave de cierre
                    $insertPos = $endPos;

                    // Añadir el binding dentro de las llaves con la indentación correcta
                    $providerContent = substr_replace($providerContent, "\n        " . $binding . "\n    ", $insertPos, 0);

                    // Guardar el archivo actualizado
                    File::put($providerFile, $providerContent);
                    $this->info("Binding agregado a ServiceProvider.");
                } else {
                    $this->error("No se pudo encontrar el método register() en ServiceProvider.");
                }
            } else {
                $this->info("El binding ya está registrado en el ServiceProvider.");
            }
        } else {
            $this->error("No se encontró el archivo ServiceProvider.");
        }
    }
}
