<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\ProductosController;
use App\Models\Producto;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;

class TestTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insercion tabla producto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $productoController = new ProductosController();

        $producto = new Request();

        $producto->nombre =  date("Y-m-d H:i");
        $producto->descripcion =  'Producto por cronjobs ';
        $producto->precio =  random_int(100,500);
        $producto->estado =  random_int(0,1);

        $productoController->store($producto);
    }
}
