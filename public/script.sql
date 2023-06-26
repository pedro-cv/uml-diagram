CREATE TABLE tabla2(
id serial PRIMARY KEY,
create()
);

CREATE TABLE tabla1(
id VARCHAR(10) PRIMARY KEY,
create()
);

CREATE TABLE tabla3(
id_Tabla1 INT PRIMARY KEY,
create()
);

CREATE TABLE tabla4(
id INT PRIMARY KEY,
create()
);

ALTER TABLE tabla1
        ADD CONSTRAINT fk_id FOREIGN KEY (id)
        REFERENCES tabla3 (id_Tabla1);

CREATE TABLE tabla1tabla2 (
            id VARCHAR(10) PRIMARY KEYtabla1,
            id serial PRIMARY KEYtabla2,
            PRIMARY KEY (id, id)
        );
        ALTER TABLE tabla1tabla2
        ADD CONSTRAINT fk_id FOREIGN KEY (id) REFERENCES tabla1(id);
        ALTER TABLE tabla1tabla2
        ADD CONSTRAINT fk_id FOREIGN KEY (id) REFERENCES tabla2(id);

ALTER TABLE tabla4
        ADD COLUMN tabla3 INT;

        ALTER TABLE tabla4
        ADD CONSTRAINT fk_tabla3_id FOREIGN KEY (tabla3_id)
        REFERENCES tabla3 (id_Tabla1);

-- Errores encontrados: .
-- Una relacion no se pudo realizar por falta de informacion
-- Una relacion no se pudo realizar por falta de informacion
-- Una relacion no se pudo realizar por falta de informacion
