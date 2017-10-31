ENCUESTAS
=========


RUTAS
-----

* GET: /api/preguntas/cuestionario/{id}
* POST: /api/respuesta



**Para el ejercicio, obtener el cuestionario del servidor
la ruta seria**

GET: /api/preguntas/cuestionario/1

```javascript
{

    "id_cuestionario": 1,
    "titulo_cuestionario": "Seguridad Ciudadana",
    "desc_cuestionario": "Se tiene como base la muestra de 384 encuestas a ser realizadas en la ciudad de El Alto, para lo cual se vieron factibles varias opciones para llevar a cabo la implementación de la prueba piloto ",
    "preguntas": [
        {
            "id_pregunta": 1,
            "pregunta": "Zona en la que vive?",
            "tipo": "OPEN",
            "orden": 1,
            "n": 1,
            "q": "Zona en la que vive?",
            "opciones": [ ]
        },
        {
            "id_pregunta": 2,
            "pregunta": "Considera que vivir en esta zona es…",
            "tipo": "SINGLE",
            "orden": 2,
            "n": 2,
            "q": "Considera que vivir en esta zona es…",
            "opciones": [
                {
                    "id_opcion": 1,
                    "opcion": "Seguro",
                    "accion": null,
                    "referencia": null,
                    "l": "Seguro"
                },
                {
                    "id_opcion": 2,
                    "opcion": "Inseguro",
                    "accion": null,
                    "referencia": null,
                    "l": "Inseguro"
                },
                {
                    "id_opcion": 3,
                    "opcion": "No sabe/ No contesta",
                    "accion": null,
                    "referencia": null,
                    "l": "No sabe/ No contesta"
                }
            ]
        },
        {
            "id_pregunta": 3,
            "pregunta": "En su opinión ¿Cuáles son las principales deficiencias en su zona en cuanto a seguridad?",
            "tipo": "MULTIPLE",
            "orden": 3,
            "n": 3,
            "q": "En su opinión ¿Cuáles son las principales deficiencias en su zona en cuanto a seguridad?",
            "opciones": [
                {
                    "id_opcion": 4,
                    "opcion": "Ausencia o control policial mínimo",
                    "accion": null,
                    "referencia": null,
                    "l": "Ausencia o control policial mínimo"
                },
                {
                    "id_opcion": 5,
                    "opcion": "Presencia de bares y licorerías en la zona",
                    "accion": null,
                    "referencia": null,
                    "l": "Presencia de bares y licorerías en la zona"
                },
                {
                    "id_opcion": 6,
                    "opcion": "Falta de alumbrado público",
                    "accion": null,
                    "referencia": null,
                    "l": "Falta de alumbrado público"
                },
                {
                    "id_opcion": 7,
                    "opcion": "Otro (especifique).",
                    "accion": "Especifique",
                    "referencia": 0,
                    "l": "Otro (especifique).",
                    "o": true
                }
            ]
        },
        /*....
	.. etc ...
	.....*/
        {
            "id_pregunta": 5,
            "pregunta": "¿Realizó la denuncia del hecho?",
            "tipo": "SINGLE",
            "orden": 5,
            "n": 5,
            "q": "¿Realizó la denuncia del hecho?",
            "opciones": [
                {
                    "id_opcion": 19,
                    "opcion": "Si (pasa a la 6)",
                    "accion": null,
                    "referencia": null,
                    "l": "Si (pasa a la 6)"
                },
                {
                    "id_opcion": 20,
                    "opcion": "No (pasa a la 7)",
                    "accion": "saltar",
                    "referencia": 7,
                    "l": "No (pasa a la 7)",
                    "j": 7
                }
            ]
        },
	/* ..............
	........etc ........
	...........*/
        
    ]

}
```


**Para el envio de las respuestas hacia la base de datos:**


POST: /api/respuesta

```javascript
{

"id_pregunta":2,
"id_usuario":999,
"id_opciones":[4,5,6],
"respuesta_abierta": "respuesta descrptiva u opcion otro"

}
```

retorna json
```javascript
{"mensaje":"ok","id":7}
```





