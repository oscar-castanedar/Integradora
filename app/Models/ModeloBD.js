usuario({
    nombre: String,
    primer_apellidos: String,
    segundo_apellidos: String,
    email: String,
    password: String,
    nivel_educativo: String,
    semestre: String,
    turno: String,
    rol: String,
    status_usuario: Boolean,
    codigo_confirmacion: String,
    confirmado: Boolean,
})

grupo({
    nombre_grupo: String,
    semestre: String,
    carrera: String,
    turno: String,
    alumnos:[
        id_usuario
    ]
})

actividad({
    tiempo_restante: Number,
    fecha_entrega: Date,
    ultima_modificacion: Date,
    status_entrega: Boolean,
    nombre_actividad: String,
    status_calificacion: Boolean,
    link_archivo: String
})

asignatura({
    nombre_asignatura: String,
    temario: String,
    descripcion: String,
    semestre: String,
    carrera:String,
    competencias: String,
    horas: Number 
})

periodo({
    nombre_periodo: String,
    fecha_inicio: Date,
    fecha_fin: Date,
    status_periodo: Boolean,
    cursos: [{
        id_asignatura: String,
        nombre:String,
        fecha:Date,
        estado_curso:String,
        resumen_curso:String,
        no_parcial:Number,
        activado:String,
        tema:{
            id_tema:Number
        }
    }]
})

tema({
    nombre_tema:String,
    preguntas:[{
        id_pregunta: Number,
    }],
    examenes:[{
        id_examen: Number
    }],
    recursos:[{
        id_recurso: Number
    }],
    actividades:[{
        id_actividad: Number,
        valor: Number
    }],
    recurso: [{
        enlace:String,
        video:String,
        infografia:String,
        valor_recurso: Number
    }]
})

examen({
    valor_examen: Number,
    intentos: Number,
    fecha_inicio: Date,
    fecha_final: Date,
    hora_inicio: Number,
    hora_final: Number,
    numero_reactivos: Number,
    preguntas: [id_pregunta]
})

pregunta({
    descripcion:String,
    tipo:String,
    imagen:String,
    respuestas: [{
        puntaje: Number,
        opcion_respuesta: Number,
        retroalimentacion:String
    }]
})

progreso({
    id_usuario:Number,
    id_Curso:Number,
    porcentaje: Number,
    fecha:Date,
})

notificacion({
    asunto:String,
    fecha:Date,
    status:String,
    usuarios: [id_usuario]
})

leerNotificacion({
    asunto:String,
    fecha:Date,
    status:String,
})

calificacion({
    id_usuario:String,
    examenes: [{
        id_examen:String,
        calificacion: Number,
    }],
})

calificacionActividad({
    id_docente: Number,
    calificaciones: [{ 
        id_actividad: String,
        id_usuario: String,
        calificacion: Number,
        retro_alimentacion: String,
        fecha_envio: Date
    }]
})
