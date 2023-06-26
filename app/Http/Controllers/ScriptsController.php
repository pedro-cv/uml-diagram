<?php

namespace App\Http\Controllers;

use App\Class\Html;
use App\Class\Mysql;
use App\Class\Pgsql;
use App\Class\SqlServer;
use App\Models\Diagrama;

class ScriptsController extends Controller
{

    public function scriptMysql($id){
        
        $diagrama = Diagrama::find($id);
        $path = 'script.sql';
        $diagramaJson = json_decode($diagrama->contenido);
        $mysql = new Mysql($diagramaJson->cells);
        $contenido = $mysql->getScript();

        $fp = fopen($path, "w");
        fclose($fp);
        $ar = fopen($path, "a") or die("Error al crear");
        fwrite($ar, $contenido);
        fclose($ar);
        return response()->download($path);
    }

    public function scriptSqlServer($id){
        $diagrama = Diagrama::find($id);
        $path = 'script.sql';
        $diagramaJson = json_decode($diagrama->contenido);
        $sql = new SqlServer($diagramaJson->cells);
        $contenido = $sql->getScript();
        $fp = fopen($path, "w");
        fclose($fp);
        $ar = fopen($path, "a") or die("Error al crear");
        fwrite($ar, $contenido);
        fclose($ar);
        return response()->download($path);
    }

    public function scriptPgsql($id){
        $diagrama = Diagrama::find($id);
        $path = 'script.sql';
        $diagramaJson = json_decode($diagrama->contenido);
        $sql = new Pgsql($diagramaJson->cells);
        $contenido = $sql->getScript();

        $fp = fopen($path, "w");
        fclose($fp);
        $ar = fopen($path, "a") or die("Error al crear");
        fwrite($ar, $contenido);
        fclose($ar);
        return response()->download($path);
    }

    public function viewHTML($id) {
        $diagrama = Diagrama::find($id);
        $path = 'view.html';
        $diagramaJson = json_decode($diagrama->contenido);
        $html = new Html($diagramaJson->cells);
        $contenido = $html->getScript();

        $fp = fopen($path, "w");
        fclose($fp);
        $ar = fopen($path, "a") or die("Error al crear");
        fwrite($ar, $contenido);
        fclose($ar);
        return response()->download($path);
    }


}