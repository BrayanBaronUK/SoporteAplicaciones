select * from usuarios_p;

--TABA DE SEGURIDAD DE USUARIOS
CREATE TABLE USUARIOS_SOPORTE_SEG(
USUARIO VARCHAR(30) PRIMARY KEY,
CLAVE VARCHAR(30),
ESTADO VARCHAR(30)
);

SELECT * FROM USUARIOS_SOPORTE_SEG;

--INSERTAR SEGURIDAD
INSERT INTO USUARIOS_SOPORTE_SEG VALUES('BBARON','AVANTEL','A');