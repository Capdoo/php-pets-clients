CREATE TABLE USUARIOS(
    ID INT(8) PRIMARY KEY AUTO_INCREMENT,

    APELLIDO_PATERNO VARCHAR(50) NOT NULL,
    APELLIDO_MATERNO VARCHAR(50) NOT NULL,
    NOMBRES VARCHAR(90) NOT NULL,

    USERNAME VARCHAR(50) NOT NULL,
    PASSWORD VARCHAR(80) NOT NULL,
    EMAIL VARCHAR(80) NOT NULL,
    
    GENERO VARCHAR(50) NOT NULL,
    TELEFONO VARCHAR(50) NOT NULL
);

CREATE TABLE ROLES(
    #ADMINS Y VETERINARIOS
    ID INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    NOMBRE VARCHAR(50) NOT NULL
);


CREATE TABLE USUARIOS_ROLES(
    ID INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    USUARIO_ID INT(8) NOT NULL,
    ROL_ID INT(8) NOT NULL,

    #CONSTRAINTS
    #CONSTRAINT `CS_USUARIO_ROLES_USUARIOS`
    #    FOREIGN KEY `FK_USUARIOS` (USUARIO_ID) REFERENCES USUARIOS(ID)
    #    ON DELETE CASCADE ON UPDATE CASCADE,
    #CONSTRAINT `CS_USUARIO_ROLES_ROLES`
    #    FOREIGN KEY `FK_ROLES` (ROL_ID) REFERENCES ROLES(ID)
    #    ON DELETE CASCADE ON UPDATE CASCADE

    FOREIGN KEY (USUARIO_ID) REFERENCES USUARIOS(ID),
    FOREIGN KEY (ROL_ID) REFERENCES ROLES(ID)

);



#CREATE TABLE VETERINARIOS();

CREATE TABLE APODERADOS(
    ID INT(8) PRIMARY KEY AUTO_INCREMENT,

    APELLIDO_PATERNO VARCHAR(50) NOT NULL,
    APELLIDO_MATERNO VARCHAR(50) NOT NULL,
    NOMBRES VARCHAR(90) NOT NULL,

    USERNAME VARCHAR(50) NOT NULL,
    PASSWORD VARCHAR(80) NOT NULL,
    EMAIL VARCHAR(80) NOT NULL,
    
    GENERO VARCHAR(50) NOT NULL,
    TELEFONO VARCHAR(50) NOT NULL,
    DIRECCION VARCHAR(100) NOT NULL

    #CONSTRAINTS
    #FOREIGN KEY(PERRO_ID) REFERENCES PERROS(ID) ON DELETE CASCADE ON UPDATE CASCADE

);


CREATE TABLE PERROS(
    ID INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    NOMBRE VARCHAR(50) NOT NULL,
    APODERADO_ID INT(8) NOT NULL,
    RAZA VARCHAR(50) NOT NULL,
    GENERO VARCHAR(50) NOT NULL,
    EDAD INT(8) NOT NULL,

    FOREIGN KEY(APODERADO_ID) REFERENCES APODERADOS(ID) 
    #ON DELETE CASCADE ON UPDATE CASCADE

);





CREATE TABLE CONSULTAS(
    ID INT(8) PRIMARY KEY AUTO_INCREMENT,
    PERRO_ID INT(8) NOT NULL,
    VETERINARIO_ID INT(8) NOT NULL,

    SINTOMAS TEXT(100) NOT NULL,
    INSPECCION VARCHAR(255) NOT NULL,
    RESULTADOS TEXT(100) NOT NULL,

    FOREIGN KEY(PERRO_ID) REFERENCES PERROS(ID), 
    #ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(VETERINARIO_ID) REFERENCES USUARIOS(ID) 
    #ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE FACTURAS(
    ID INT(8) PRIMARY KEY AUTO_INCREMENT,
    CONSULTA_ID INT(8) NOT NULL,
    PRECIO DECIMAL(8,2) NOT NULL,

    FECHA DATE NOT NULL,
    #SUCURSAL_ID INT(8) NOT NULL

    FOREIGN KEY(CONSULTA_ID) REFERENCES CONSULTAS(ID) 
    #ON DELETE CASCADE ON UPDATE CASCADE
);


#NUEVO

CREATE TABLE SUCURSALES(
    ID INT(8) PRIMARY KEY AUTO_INCREMENT,
    NOMBRE VARCHAR(50) NOT NULL,
    DISTRITO VARCHAR(50) NOT NULL
);



#INSERTS
INSERT INTO ROLES (NOMBRE) VALUES
('superadmin'),
('administrador'),
('veterinario');
