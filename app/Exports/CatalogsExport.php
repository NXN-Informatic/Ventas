<?php

namespace App\Exports;

use App\Producto;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CatalogsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    private $idpuesto;

    public function __constructor($puestoid)
    {
        $this->idpuesto = $puestoid;
    }

    public function query()
    {
        $this->idpuesto = 12;
        $ret = Producto::query()->join('grupos', 'grupos.id', '=', 'productos.grupo_id')->join('puesto_subcategorias', 'puesto_subcategorias.id', '=', 'grupos.puestosubcategoria_id')->join('puestos', 'puestos.id', '=', 'puesto_subcategorias.puesto_id')->join('imagen_productos', 'productos.id', '=', 'imagen_productos.producto_id')->where('puestos.id',$this->idpuesto);       
        return $ret;
    }
    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->description,
            $row->disponible,
            $row->stock,
            $row->condicion,
            $row->precio,
            $row->producto_url,
            $row->imagen_url,
            $row->marca,
            $row->preciooferta
        ];
    }
    public function headings(): array
    {
        return [
            'id',
            'title',
            'description',
            'availability',
            'inventory',
            'condition',
            'price',
            'link',
            'image_link',
            'brand',
            'sale_price'
        ];
    }
}
