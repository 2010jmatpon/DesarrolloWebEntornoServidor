<?php
/*
    function buscar_en_tabla()
    descripcion: busca un valor en una determinada columna de una tabla
    parámetros:
        - tabla
        - nombre de la columna - búsqueda
        - valor - que quiero buscar
    salida:
        - indice del array donde se encuentra el valor
        - false - en caso de no lo encuentre
*/

function buscar_en_tabla($tabla = [], $columna, $valor)
{
    //devuelve array con valores de la columna 
    $columna_valores = array_column($tabla, $columna);
    return array_search($valor, $columna_valores, false);
}
/*
    funcion: eliminar()
    descripción: elimina un elemento de la tabla
    parametros:
        - tabla
        - id del elemento que deseo eliminar
    salida:
        -tabla actualizada
*/

function eliminar ($tabla = [], $id){
   //devuelve array con valores de la columna id
    $lista_id=array_column($tabla,'id');

    //buscar id del libro que deseo eliminar
    $elemento = array_search($id, $lista_id, false);

    unset($tabla[$elemento]);

    return $tabla;
    //eliminar elemento de la tabla
}

function generar_tabla()
{
    $tabla = [
        [
            'id' => 1,
            'descripcion' => 'Portátil - HP 15-DB0074NS',
            'modelo' => 'HP 15-DB0074NS',
            'categoria' => 0,
            'unidades' => 120,
            'precio' => 379
        ],

        [
            'id' => 2,
            'descripcion' => 'Portátil AMD A4-9125, 8 GB RAM, 125 GB',
            'modelo' => 'HP 255 G7, 15.6',
            'categoria' => 0,
            'unidades' => 200,
            'precio' => 20.5
        ],

        [
            'id' => 3,
            'descripcion' => 'PC sobremesa - Lenovo Intel® Core™ i3-8100',
            'modelo' => 'ideacentre 510S-07|CB',
            'categoria' => 1,
            'unidades' => 50,
            'precio' => 12.95
        ],

        [
            'id' => 4,
            'descripcion' => 'PC sobremesa - HP 290 APU AMD Dual-Core',
            'modelo' => 'HP 290-a0002ns',
            'categoria' => 1,
            'unidades' => 90,
            'precio' => 15.95
        ]
    ];
    return $tabla;
}

function generar_tabla_categorias()
{
    $categorias = [
        'Portátil',
        'PC sobremesa',
        'Componente',
        'Pantalla',
        'Impresora'
    ];
    return $categorias;
}

function nuevo ($tabla, $elemento){

    $tabla[] = $elemento;
    return $tabla;

}
?>