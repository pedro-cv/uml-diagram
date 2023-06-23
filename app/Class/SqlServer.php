<?php

namespace App\Class;

class SqlServer{
    public const MANY = ["invalid", "1..*", "0..*"];
    private const ONE = ["invalid", "0", "1"];
    private $content;
    public $message = "-- Errores encontrados: .\n";

    public function __construct($content)
    {
        $this->content = $content;
    }
    private $tables = "";
    private $foreign = "";
    public function getScript()
    {
        // dd($this->content);
        $this->setContent();
        // dd($this->content);
        return $this->tables . $this->foreign . $this->message;
    }

    private function setContent()
    {
        for ($i = 0; $i < sizeof($this->content); $i++) {
            if ($this->content[$i]->type == "uml.State") {
                $tableContent = $this->getTableContent($this->content[$i]->events);
                $this->tables .= "CREATE TABLE " . $this->content[$i]->name . "(\n" . $tableContent . "\n);\n\n";
            } else {
                $this->foreign .= $this->getTableForeign($this->content[$i]);
            }
        }
    }

    private function getTableContent($content)
    {
        $data = "";
        if (sizeof($content) == 0) {
            return "";
        }
        for ($i = 0; $i < sizeof($content) - 1; $i++) {
            $data .= $content[$i] . ",\n";
        }
        $data .= $content[sizeof($content) - 1];
        return $data;
    }

    private function getTableForeign($content)
    {
        $data = "";
        $labels = $content->labels;
        $source_label = "";
        $target_label = "";
        for ($i = 0; $i < sizeof($labels); $i++) {
            if ($labels[$i]->position > 0) {
                $source_label = $labels[$i]->attrs->text->text;
            }
            if ($labels[$i]->position < 0) {
                $target_label = $labels[$i]->attrs->text->text;
            }
        }
        $relation = "";
        if ($source_label == "" || $target_label == "") {
            $this->message .= "\n-- Error en de relacion entre";
        } else {

            if (array_search("" . $source_label, SqlServer::MANY) + 0 >= 1 && array_search("" . $target_label, SqlServer::MANY) + 0 >= 1) {
                $relation = $this->makeManyToMany($content->source->id, $content->target->id);
            } else {
                if (array_search("" . $source_label, SqlServer::ONE) + 0 >= 1 && array_search("" . $target_label, SqlServer::ONE) + 0 >= 1) {
                    $relation = $this->makeOne($content->source->id, $content->target->id);
                } else {
                    if (array_search("" . $source_label, SqlServer::ONE) + 0 >= 1) {
                        $relation = $this->makeForeign($content->source->id, $content->target->id);
                    } else {
                        $relation = $this->makeForeign($content->target->id, $content->source->id);
                    }
                }
            }
            return $relation;
        }
    }

    private function makeForeign($contentForegin, $foreignId)
    {
        $nameContent = "";
        $primaryContent = "";
        $nameForeign = "";
        $primaryForeign = "";

        for ($i = 0; $i < sizeof($this->content); $i++) {
            if ($this->content[$i]->id == $contentForegin) {
                $nameContent = $this->content[$i]->name;
                $primaryContent = $this->getPrimary($this->content[$i]);
            }
            if ($this->content[$i]->id == $foreignId) {
                $nameForeign = $this->content[$i]->name;
                $primaryForeign = $this->getPrimary($this->content[$i]);
            }
        }

        if (!($nameContent == "" || $nameContent == "" || $primaryForeign == "" || $primaryForeign == "")) {
            $this->message = "-- Una relacion no se pudo realizar por falta de informacion";
        }

        $foreginId = $nameForeign . "_id";

        $typeForeign = substr( $primaryForeign, strpos($primaryForeign, " ")+1, strlen($primaryForeign));
        $typeForeign = substr( $typeForeign, 0, strpos($typeForeign, " "));

        $relation = 'ALTER TABLE '.$nameContent.'
        ADD COLUMN '. $nameForeign . ' ' . $typeForeign. ';

        ALTER TABLE ' . $nameContent . '
        ADD CONSTRAINT fk_' . strtok($foreginId, " ") . ' FOREIGN KEY (' . strtok($foreginId, " ") . ')
        REFERENCES ' . $nameForeign . ' (' . strtok($primaryForeign, " ") . ');' . "\n\n";
        return $relation;
    }

    private function makeOne($idSource, $idTarget)
    {

        $nameSource = "";
        $primaryTarget = "";
        $nameTarget = "";
        $primaryTarget = "";

        for ($i = 0; $i < sizeof($this->content); $i++) {
            if ($this->content[$i]->id == $idSource) {
                $nameSource = $this->content[$i]->name;
                $primarySource = $this->getPrimary($this->content[$i]);
            }
            if ($this->content[$i]->id == $idTarget) {
                $nameTarget = $this->content[$i]->name;
                $primaryTarget = $this->getPrimary($this->content[$i]);
            }
        }

        if (!($nameSource == "" || $nameTarget == "" || $primarySource == "" || $primaryTarget == "")) {
            $this->message = "-- Una relacion no se pudo realizar por falta de informacion";
        }

        $relation = 'ALTER TABLE ' . $nameTarget . '
        ADD CONSTRAINT fk_'. strtok($primaryTarget, " ") . ' FOREIGN KEY (' . strtok($primaryTarget, " ") . ')
        REFERENCES ' . $nameSource . ' (' . strtok($primarySource, " ") . ');' . "\n\n";
        return $relation;
    }

    private function makeManyToMany($idSource, $idTarget)
    {
        $nameSource = "";
        $nameTarget = "";
        $primarySource = "";
        $primaryTarget = "";
        $relation = "";
        $primarySourceId = "";
        $primaryTargetId = "";
        $tableName = "";

        for ($i = 0; $i < sizeof($this->content); $i++) {
            if ($this->content[$i]->id == $idSource) {
                $nameSource = $this->content[$i]->name;
                $primarySource = $this->getPrimary($this->content[$i]);
            }
            if ($this->content[$i]->id == $idTarget) {
                $nameTarget = $this->content[$i]->name;
                $primaryTarget = $this->getPrimary($this->content[$i]);
            }
        }
        if (!($nameSource == "" || $nameTarget == "" || $primarySource == "" || $primaryTarget == "")) {
            $this->message = "-- Una relacion no se pudo realizar por falta de informacion";
        }

        $primarySourceId = $primarySource . $nameSource;
        $primaryTargetId = $primaryTarget . $nameTarget;
        $tableName = $nameSource . $nameTarget;

        $relation .= 'CREATE TABLE ' . $tableName . ' (
            ' . $primarySourceId . ',
            ' . $primaryTargetId . ',
            PRIMARY KEY (' . strtok($primarySourceId, " ") . ', ' . strtok($primaryTargetId, " ") . ')
        );
        ALTER TABLE ' . $tableName . '
        ADD CONSTRAINT fk_'. strtok($primarySourceId, " ") .' FOREIGN KEY (' . strtok($primarySourceId, " ") . ') REFERENCES ' . $nameSource . '(' . strtok($primarySource, " ") . ');
        ALTER TABLE ' . $tableName . '
        ADD CONSTRAINT fk_'. strtok($primaryTargetId, " ") .' FOREIGN KEY (' . strtok($primaryTargetId, " ") . ') REFERENCES ' . $nameTarget . '(' . strtok($primaryTarget, " ") . ');' . "\n\n";
        return $relation;
    }

    private function getPrimary($content)
    {
        $events = $content->events;
        for ($i = 0; $i < sizeof($events); $i++) {
            if (strpos($events[$i], "PRIMARY")) {
                // dd($events[$i]);
                return $events[$i];
            }
        }
        $this->message .= "-- Elemento " . $content->name . " sin llave primaria, las relaciones con esta tabla no seran implementadas";
        return "";
    }
}
