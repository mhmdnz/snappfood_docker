<?php

namespace App\Console\Commands;

use App\Services\IngredientService;
use Illuminate\Console\Command;

class AddStockCommand extends Command
{
    /**
     * @var IngredientService $ingredient_service
     */
    protected $ingredient_service;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:increasing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command Will Increase The Stock Amount';

    /**
     * AddStockCommand constructor.
     * @param IngredientService $ingredient_service
     */
    public function __construct(IngredientService $ingredient_service)
    {
        parent::__construct();
        $this->ingredient_service = $ingredient_service;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->ingredient_service->getAll()->each(function ($ingredient){
            if ($ingredient->stock == 0)
               $ingredient->stock += 4;
               $ingredient->save();
        });
    }
}
