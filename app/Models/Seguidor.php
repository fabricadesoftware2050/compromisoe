<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguidor extends Model
{
    protected $table = 'seguidores';
    /**
     *$table->id();
            $table->string('nombre');
            $table->string('documento')->unique();
            $table->boolean('lider')->default(0);
            $table->string('celular')->nullable();
            $table->string('correo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('municipio')->nullable();
            $table->string('puesto')->nullable();
            $table->string('mesa')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps(); /
     * @var array
     */
    protected $fillable = [
        'nombre',
        'documento',
        'lider',
        'celular',
        'correo',
        'direccion',
        'municipio',
        'puesto',
        'mesa',
        'foto',
    ];
}
