<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
        protected $table = "evento";

        protected $fillable = [
            'fecha_cotizacion',
            'cliente_id',
            'agente_id',
            'estatus',
            'tipo_venta',
            'tipo_evento',
            'no_personas',
            'deposito',
            'fecha_evento',
            'hora_evento',
            'fecha_entrega',
            'hora_entrega',
            'fecha_recoleccion',
            'hora_recoleccion',
            'tipo_pago',
            'domicilio_entrega',
            'domicilio_recoleccion',
            'status_entrega',
            'lavado_desinfeccion',
            'descuento',
            'correct_datos',
            'accept_politicas',
            'url_seguimiento',
            'descuento_lavado',
            'firma_logistica'    
        ];

        public function cliente() {
            return $this->belongsTo(PersonaFisica::class, 'cliente_id');
        }

        public function tipoEvento() {
            return $this->belongsTo(TipoEvento::class, 'tipo_evento');
        }

        public function agente() {
            return $this->belongsTo(User::class, 'agente_id');
        }

        public function detalleEvento() {
            return $this->hasMany(DetalleEvento::class, 'evento_id');
        }
}
