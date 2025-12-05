export interface Event {
    id: string;
    fecha_cotizacion: string;
    cliente_id: string;
    agente_id: string;
    estatus: string;
    tipo_venta: string;
    tipo_evento: string;
    no_personas: number;
    deposito: number;
    fecha_evento: string;
    hora_evento: string;
    fecha_entrega: string;
    hora_entrega: string;
    fecha_recoleccion: string;
    hora_recoleccion: string;
    tipo_pago: string;
    domicilio_entrega: string;
    domicilio_recoleccion: string;
    status_entrega: string;
    lavado_desinfeccion: string;
    descuento: number;
    correct_datos: boolean;
    accept_politicas: boolean;
    url_seguimiento: string;
    descuento_lavado: number;
    firma_logistica: string;
}