<?php

namespace App\Class;

class Html
{
    private $content;

    private $header = '<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>CRUD FROM API</title>
        <style>
            .bg-mynav {
                background-color: #2c3e50;
            }
            body {
                font-size: 1.25rem;
                background-color: #f6f8fa;
            }
            td {
                line-height: 3rem;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-mynav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">My App</a>
            </div>
        </nav>' . "\n";

    private $scripts = "\n" . '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>' . "\n";

    private $functions;
    private $contenthtml;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getScript()
    {
        // dd($this->content);
        $this->setContent();
        // dd($this->content);

        return $this->header . $this->contenthtml . $this->scripts . $this->functions . '</body></html>';
    }

    private function setContent()
    {
        for ($i = 0; $i < sizeof($this->content); $i++) {
            if ($this->content[$i]->type == "uml.State") {
                $this->getTableContent($this->content[$i]);
            }
        }
    }

    private function getTableContent($content)
    {
        $events = $content->events;
        
        $this->contenthtml .= $this->makeContent($content->name, $events) . ",\n";
        $this->functions .= $this->makeFunctions($content->name, $events) . ",\n";
    }

    private function makeContent($name, $content)
    {
        $columns = "";
        for ($i = 0; $i < sizeof($content); $i++) {
            $columns .= '<th scope="col">' . $content[$i] . '</th>' . "\n";
        }

        return '<div class="container mb-3">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight">
                <h2>' . $name . '
            </div>
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-secondary" onclick="show' . $name . '()">Create</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    ' . $columns . '
                    </tr>
                </thead>
                <tbody id="' . $name . '">
                    <tr>
                        <th scope="row" colspan="5">Loading...</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>';
    }

    private function makeFunctions($name, $content)
    {   
        $tableContent = "\n";
        $createContent = "\n";
        $createInput = "\n";
        $jsonInput = "";
        for ($i=0; $i < sizeof($content); $i++) { 
            $tableContent .= 'trHTML += `<td>` + object["'. $content[$i] .'"] + `</td>`;' . "\n";
            $createContent .= '<input id="f'. $content[$i] .'" class="swal2-input" placeholder="'. $content[$i] .'">' . "\n";
            $createInput .= 'const f'.$content[$i].' = document.getElementById("f'. $content[$i] .'").value;' . "\n";
            $jsonInput .= '"f'. $content[$i] .'": f'. $content[$i] .', ';
        }
        return '<script>
        function load'. $name .'() {
            const xhttp = new XMLHttpRequest();
            // xhttp.open("GET", "https://www.mecallapi.com/api/'. $name .'");
            xhttp.open("GET", "Http Api consume");
            xhttp.send();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    var trHTML = "";
                    const objects = JSON.parse(this.responseText);
                    for (let object of objects) {
                        trHTML += `<tr>`;
                        '. $tableContent .'
                        trHTML += `<td><button type="button" class="btn btn-outline-secondary" onclick="show'. $name .'EditBox(` + object["id"] + `)">Edit</button>`;
                        trHTML += `<button type="button" class="btn btn-outline-danger" onclick="'. $name .'Delete(` + object["id"] + `)">Del</button></td>`;
                        trHTML += `</tr>`;
                    }
                    document.getElementById("mytable").innerHTML = trHTML;
                }
            };
        }
        load'. $name .'();

        function show'. $name .'() {
            Swal.fire({
                title: "Create '. $name .'",
                html:
                    `<input id="id" type="hidden">` +
                    `'. $createContent .'`,
                focusConfirm: false,
                preConfirm: () => {
                    '. $name .'Create();
                }
            })
        }

        function ' . $name . 'Create() {
            '. $createInput .'
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "https://www.mecallapi.com/api/'. $name .'/create");
            xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhttp.send(JSON.stringify({
                "fname": fname, "lname": lname, "username": username, "email": email,
            }));
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const objects = JSON.parse(this.responseText);
                    Swal.fire(objects["message"]);
                    loadTable();
                }
            };
        }

        function showUserEditBox(id) {
            console.log(id);
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", "https://www.mecallapi.com/api/users/" + id);
            xhttp.send();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const objects = JSON.parse(this.responseText);
                    const user = objects["user"];
                    console.log(user);
                    Swal.fire({
                        title: "Edit User",
                        html:
                            `<input id="id" type="hidden" value=" + user["id"] + ">` +
                            `'. $createContent .'`,
                        focusConfirm: false,
                        preConfirm: () => {
                            '. $name .'Edit();
                        }
                    })
                }
            };
        }

        function '. $name .'Edit() {
            '. $createInput .'
            const xhttp = new XMLHttpRequest();
            xhttp.open("PUT", "https://www.mecallapi.com/api/users/update");
            xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhttp.send(JSON.stringify({
                "id": id, "fname": fname, "lname": lname, "username": username, "email": email,
                "avatar": "https://www.mecallapi.com/users/cat.png"
            }));
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const objects = JSON.parse(this.responseText);
                    Swal.fire(objects["message"]);
                    loadTable();
                }
            };
        }

        function ' . $name . 'Delete(id) {
            const xhttp = new XMLHttpRequest();
            xhttp.open("DELETE", "https://www.mecallapi.com/api/users/delete");
            xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhttp.send(JSON.stringify({
                "id": id
            }));
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4) {
                    const objects = JSON.parse(this.responseText);
                    Swal.fire(objects["message"]);
                    loadTable();
                }
            };
        }
    </script>';
    }
}
