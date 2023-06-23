<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Diagrama extends Model
{
    use HasFactory;
    protected $table = 'diagramas';

    protected $fillable = ['nombre', 'descripcion', 'contenido', 'tipo', 'terminado', 'proyecto_id', 'user_id'];
    /* tipo => 1:contexto 2:contendedor 3:componentes 4:codigo */

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'user_diagramas');
    }

    public function user_diagrama()
    {
        return $this->hasMany(User_diagrama::class);
    }

    public function permiso($usuario_id)
    {
        $relacion = $this->user_diagrama()->where('user_id', $usuario_id)->first();
        $relacion = $relacion->editar;
        return $relacion;
    }

    public static function enlace($xml)
    {
        $label = '';
        $id = $xml["Column"][29]["@attributes"]["value"];
        if( $xml["Column"][1]["@attributes"]["value"] != "Source -> Destination" ){
            $label = $xml["Column"][1]["@attributes"]["value"];
            $id = $xml["Column"][28]["@attributes"]["value"];
        }
        $enlace = '{"type": "app.Link","router": {"name": "normal"},"connector": {"name": "normal"},"labels": [{"attrs": {"text": {"text": "' . $label . '"},"rect": {"stroke": "#f6f6f6","fill": "#f6f6f6"}},"position": {"distance": 0.6458057726998969,"offset": 3.0683540505454006,"angle": 0}}],"source": {"id": "' . $xml["Extension"]["@attributes"]["Start_Object_ID"] . '","anchor": {"name": "topLeft","args": {"dx": "50%","dy": "49.999%","rotate": true}}},"target": {"id": "' . $xml["Extension"]["@attributes"]["End_Object_ID"] . '","anchor": {"name": "topLeft","args": {"dx": "50%","dy": "49.999%","rotate": true}}},"id": "' . $id . '","z": ' . $xml["Column"][0]["@attributes"]["value"] . ',"vertices": [],"attrs": {"line": {"strokeWidth": 1}}},';
        return $enlace;
    }

    public static function objeto($objeto, $posicion, $atributo, $operacion)
    {

        $rectangulos = ["[Software System]", "[Container: e.g. SpringBoot, ElasticSearch, etc.]", "[Component: e.g. Spring Service]"];
        $color = '';

        if (!($atributo[1]["@attributes"]["value"] == "[Software System]" || $atributo[1]["@attributes"]["value"] == "[Container: e.g. SpringBoot, ElasticSearch, etc.]" || $atributo[1]["@attributes"]["value"] == "[Component: e.g. Spring Service]")) {
            $url = '';
            $posh = '';
            $possh = '';
            $posc = '';

            if ($atributo[1]["@attributes"]["value"] == '[Person]') {
                $url = asset('assets/image-person.svg');
                $posh = '50';
                $possh = '60';
                $posc = '75';
            } elseif ($atributo[1]["@attributes"]["value"] == '[Container: e.g. Oracle Database 12]') {
                $url = asset('assets/image-data-container.svg');
                $posh = '38';
                $possh = '48';
                $posc = '63';
            } elseif ($atributo[1]["@attributes"]["value"] == '[Container: e.g. Micronaut, etc.]') {
                $url = asset('assets/image-hexagon.svg');
                $posh = '35';
                $possh = '45';
                $posc = '65';
            } elseif ($atributo[1]["@attributes"]["value"] == '[Container: e.g. Apache Kafka, etc.]') {
                $url = asset('assets/image-cylinder-horizontal.svg');
                $posh = '35';
                $possh = '45';
                $posc = '60';
            } elseif ($atributo[1]["@attributes"]["value"] == '[Content: e.g. JavaScript, Angular etc.]') {
                $url = asset('assets/image-web-browser.svg');
                $posh = '36';
                $possh = '45';
                $posc = '62';
            }

            $objetotext = '{"type": "standard.EmbeddedImage","position": {"x": ' . ((int) $posicion[3]["@attributes"]["value"]) . ',"y": ' . -1 * ((int) $posicion[2]["@attributes"]["value"]) . '},"size": {"width": ' . (int) $posicion[4]["@attributes"]["value"] - (int) $posicion[3]["@attributes"]["value"] . ',"height": ' . (int) $posicion[2]["@attributes"]["value"] - (int) $posicion[5]["@attributes"]["value"] . '},"angle": 0,"id": "' . $objeto[25]["@attributes"]["value"] . '","z": ' . $objeto[0]["@attributes"]["value"] . ',"attrs": {"image": {"xlinkHref": "' . $url . '"},"header": {"height": 20,"stroke": "#31d0c6","fill": "transparent","strokeDasharray": "0"},"headerText": {"refY": "'.$posh.'%","fontSize": 8,"fill": "#ffffff","text": "' . $objeto[3]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"subHeader": {"height": 0,"stroke": "transparent","strokeDasharray": "0"},"subHeaderText": {"refY": "'.$possh.'%","fontSize": 4,"fill": "#F9F9F9","text": "' . $atributo[1]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"content": {"height": 0,"stroke": "transparent","strokeDasharray": "0"},"contentText": {"refY": "'.$posc.'%","fontSize": 4,"fill": "#E7E7E7","text": "' . $operacion[2]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"root": {"dataTooltipPosition": "left","dataTooltipPositionSelector": ".joint-stencil"},"body": {"fill": "transparent","stroke": "#31d0c6","strokeWidth": 0,"strokeDasharray": "0"}}},';
        } else {
            if ($atributo[1]["@attributes"]["value"] == '[Software System]') {
                $color = "1061B0";
            } elseif ($atributo[1]["@attributes"]["value"] == '[Container: e.g. SpringBoot, ElasticSearch, etc.]') {
                $color = "23A2D9";
            } elseif ($atributo[1]["@attributes"]["value"] == '[Component: e.g. Spring Service]') {
                $color = "63BEF2";
            }

            $objetotext = '{"type": "standard.Rectangle","position": {"x": ' . ((int) $posicion[3]["@attributes"]["value"]) . ',"y": ' . -1 * ((int) $posicion[2]["@attributes"]["value"]) . '},"size": {"width": ' . (int) $posicion[4]["@attributes"]["value"] - (int) $posicion[3]["@attributes"]["value"] . ',"height": ' . (int) $posicion[2]["@attributes"]["value"] - (int) $posicion[5]["@attributes"]["value"] . '},"angle": 0,"id": "' . $objeto[25]["@attributes"]["value"] . '","z": ' . $objeto[0]["@attributes"]["value"] . ',"attrs": {"body": {"strokeWidth": 0,"stroke": "#31d0c6","fill": "#' . $color . '","rx": 8,"ry": 8,"width": 50,"height": 30},"header": {"height": 20,"stroke": "#31d0c6","fill": "transparent","strokeDasharray": "0"},"headerText": {"refY": "34%","fontSize": 8,"fill": "#ffffff","text": "' . $objeto[3]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"subHeader": {"height": 0,"stroke": "transparent","strokeDasharray": "0"},"subHeaderText": {"refY": "48%","fontSize": 4,"fill": "#F9F9F9","text": "' . $atributo[1]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"content": {"height": 0,"stroke": "transparent","strokeDasharray": "0"},"contentText": {"refY": "65%","fontSize": 4,"fill": "#E7E7E7","text": "' . $operacion[2]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"root": {"dataTooltipPosition": "left","dataTooltipPositionSelector": ".joint-stencil"}}},';
        }
        /* $objetotext = ''; */
        return $objetotext;
    }

    public static function boundary($objeto, $posicion)
    {
        $boundary = '{"type": "standard.Rectangle","position": {"x": ' . ((int) $posicion[3]["@attributes"]["value"]) . ',"y": ' . -1 * ((int) $posicion[2]["@attributes"]["value"]) . '},"size": {"width": ' . (int) $posicion[4]["@attributes"]["value"] - (int) $posicion[3]["@attributes"]["value"] . ',"height": ' . (int) $posicion[2]["@attributes"]["value"] - (int) $posicion[5]["@attributes"]["value"] . '},"angle": 0,"id": "' . $objeto[27]["@attributes"]["value"] . '","z": ' . $objeto[0]["@attributes"]["value"] . ',"attrs": {"body": {"strokeWidth": 1,"stroke": "#666666","fill": "transparent","rx": 8,"ry": 8,"width": 50,"height": 30,"strokeDasharray": "5"},"header": {"height": 20,"stroke": "#31d0c6","fill": "transparent","strokeDasharray": "0"},"headerText": {"textVerticalAnchor": "bottom","textAnchor": "bottom","refX": "4%","refY": "90%","fontSize": 8,"fill": "#000000","text": "' . $objeto[3]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"subHeader": {"height": 0,"stroke": "transparent","strokeDasharray": "0"},"subHeaderText": {"textVerticalAnchor": "bottom","textAnchor": "bottom","refX": "4%","refY": "95%","fontSize": 4,"fill": "#000000","text": "' . $objeto[3]["@attributes"]["value"] . '","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"content": {"height": 0,"stroke": "transparent","strokeDasharray": "0"},"contentText": {"textVerticalAnchor": "bottom","textAnchor": "bottom","refX": "4%","refY": "98%","fontSize": 4,"fill": "#000000","text": "","fontFamily": "Roboto Condensed","fontWeight": "Normal","strokeWidth": 0},"root": {"dataTooltipPosition": "left","dataTooltipPositionSelector": ".joint-stencil"}}},';
        return $boundary;
    }
}
