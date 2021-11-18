<?php
namespace App\Http;

class Caracteristicas{
    public static function desarrollos(){
        return [
            'servicios' => [1, 2, 3, 4, 6, 7, 8, 9, 12, 13],
            'generales' => [1, 2, 3, 4, 7, 13, 19, 22, 27, 28, 29],
            'amenidades' => [1, 2, 3, 4, 6, 9, 7, 8, 10],
            'exteriores' => [1, 2, 3, 6],
            'restricciones' => [1, 2],
        ];
    }

    public static function todas(){
        $data = [
            'servicios' => static::servicios(),
            'generales' => static::generales(),
            'exteriores' => static::exteriores(),
            'amenidades' => static::amenidades(),
            'restricciones' => static::restricciones(),
            'esconder_mantenimiento' => [14, 15, 16],
            'esconder_recamaras' => [1, 2, 15, 16, 10, 11, 12, 14, 9, 7],
            'esconder_banios' => [1, 2, 14, 15, 16],
            'esconder_medios_banios' => [1, 2, 14, 15, 16],
            'esconder_estacionamientos' => [1, 2, 14, 15, 16],
            'esconder_piso' => [1, 2, 3, 11, 12, 14, 15, 16, 5, 4, 9, 7],
            'esconder_cantidad_pisos' => [1, 2, 3, 10, 11, 12, 14, 15, 16, 5, 4, 9],
            'esconder_fondo_terreno' => [3, 5, 6, 11, 9, 12],
            'esconder_frente_terreno' => [3, 5, 6, 11, 9, 12],
            'esconder_forma_terreno' => [9, 12],

            'mostrar_forma_entrega' => [1, 10, 6, 11, 12, 9],
            'mostrar_uso_suelo' => [2, 14, 15],
            'mostrar_numero_frentes' => [15],
            'mostrar_ubicacion_manzana' => [10, 15],
            'mostrar_elevadores' => [9, 10, 7],
            'mostrar_total_locales_comerciales' => [10],
            'mostrar_metros_altura' => [1],
            'mostrar_numero_casas' => [5],
            'mostrar_anios_antiguedad' => [3, 6, 7, 10, 11],
            'mostrar_niveles_construidos' => [4],
            'mostrar_numero_oficinas' => [4],
            'mostrar_numero_departamentos' => [6],
        ];

        return $data;
    }

    public static function restricciones(){
        /*
        1	No se Aceptan Mascotas
        2	Prohibido Fumar
         */
        return [
            'show_in' => [1, 3, 4, 5, 6, 7, 8, 9, 10],
            'data' => [
                1 => [1, 2],
                2 => [],
                3 => [1, 2],
                4 => [1, 2],
                5 => [1, 2],
                6 => [1, 2],
                7 => [1, 2],
                8 => [1, 2],
                9 => [1, 2],
                10 => [1, 2],
                11 => [],
                12 => [],
                13 => [],
                14 => [1, 2],
                15 => [1, 2],
                16 => [1, 2],
            ]
        ];
    }

    public static function amenidades(){
        /*
        1	Bodega
        2	Salón de fiestas
        3	Cuarto de TV
        4	Sala de música y cine
        5	Salón de usos multiples
        6	Estudio
        7	Gimnasio
        8	Chimenea
        9	Alberca
        10	Jacuzzi
        11	Cancha de squash
        12	Cancha de futbol
         */
        return [
            'show_in' => [3, 4, 5, 6, 7, 9, 10],
            'data' => [
                1 => [],
                2 => [],
                3 => [1, 2, 3, 4, 5, 6],
                4 => [1],
                5 => [1, 2, 3, 4, 5, 6],
                6 => [1, 2, 3, 4, 5, 6],
                7 => [1],
                8 => [],
                9 => [1],
                10 => [1],
                11 => [],
                12 => [],
                13 => [],
                14 => [],
                15 => [],
                16 => [],
            ]
        ];
    }

    public static function exteriores(){
        /*
        1	Asador
        2	Cancha de tenis
        3	Cancha de squash
        4	Estacionamiento de visitas
        5	Báscula
        6   Jardín
        7	Balcón
        8	Roof garden
        9	Terraza
         */
        return [
            'show_in' => [1, 3, 4, 5, 6, 9, 10, 12],
            'data' => [
                1 => [5],
                2 => [],
                3 => [1, 2, 3],
                4 => [6],
                5 => [1, 2, 3, 4],
                6 => [1, 2, 3, 4, 7, 8, 9],
                7 => [],
                8 => [],
                9 => [4],
                10 => [6, 4, 7, 8, 9],
                11 => [],
                12 => [7, 8, 9],
                13 => [],
                14 => [1],
                15 => [6],
                16 => [],
            ]
        ];
    }

    public static function generales(){
        /*
        1	Centros comerciales cercanos
        2	Escuelas cercanas
        3	Acceso discapacitados
        4	Acceso tercera edad
        5	Bodega
        6	Circuito cerrado
        7	Cuarto de servicio
        8	Elevador
        9	Sistema de ventilación
        10	Cisterna
        11	Calentador de agua
        12	Servivios básicos
        13	Amueblado
        14	Asador
        15	Aire acondicionado
        16  Andenes para tráiler
        17  Caseta de guardia
        18  Zona industrial
        19  Chimenea
        20  Alberca
        21  Jacuzzi
        22  Cocina integral
        23  Dentro de mercado
        24  Drenaje
        25  Área de juegos
        26  Seguridad
        */
        return [
            'show_in' => [1, 2, 3, 4, 5, 6, 7, 9, 10, 11, 12, 14, 15, 16],//en que tipo de inmuebles se muestran generales
            'data' => [
                1 => [1, 2, 16, 17, 18],//general que contiene cada tipo de inmueble
                2 => [1, 2, 24],
                3 => [1, 2, 19, 20, 21, 22, 7, 13, 3, 4, 6],
                4 => [1, 2, 19, 22, 13, 6, 7],
                5 => [1, 2, 19, 20, 21, 22, 3, 4, 6],
                6 => [1, 2, 3, 4, 19, 21, 20, 7, 8, 13],
                7 => [1, 2],
                8 => [],
                9 => [1, 2, 3, 4, 6, 23],
                10 => [1, 2, 3, 4, 25],
                11 => [1, 2],
                12 => [1, 2, 26, 8, 15, 26],
                13 => [],
                14 => [1, 2, 24],
                15 => [1, 2, 24],
                16 => [1, 2, 24],
            ]
        ];
    }

    public static function servicios(){
        /* servicios
        1	Gas
        2	Aire acondicionado
        3	Cisterna
        4	Área de juegos infantiles
        5	Calefacción
        6	Gimnasio
        7	Seguridad privada
        8	Calentador de agua
        9	Línea telefónica
        10	Planta eléctrica
        11	Cancha de tenis
        12	Sistema de ventilación
        13	Servicios básicos (agua/luz)
        14	Conmutador
        15	Seguridad contra incendios
        16  Generador eléctrico
        */
        return [
            'show_in' => [1, 3, 4, 5, 6, 7, 9, 10, 11, 12],//en que tipo de inmuebles se muestran servicios
            'data' => [
                1 => [1, 3, 12, 13, 14, 15],//servicios que contiene cada tipo de inmueble
                2 => [],
                3 => [1, 2, 3, 4, 6, 7, 8, 9, 12],
                4 => [1, 2, 3, 5, 7, 8, 9, 14],
                5 => [1, 2, 3, 4, 5, 6, 7, 8, 9],
                6 => [1, 2, 3, 4, 5, 6, 7, 8, 9],
                7 => [1, 2, 3, 7, 8, 9, 5, 14, 16],
                8 => [],
                9 => [1, 2, 7, 9, 14],
                10 => [1, 2, 7, 9, 14],
                11 => [1],
                12 => [1],
                13 => [],
                14 => [],
                15 => [],
                16 => [],
            ]
        ];
    }
}
