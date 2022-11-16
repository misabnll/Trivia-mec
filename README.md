# Trivia-mec
Juego de preguntas y respuestas desarrollado en PHP,MYSQL,HTML5, entre otras tecnologías

La parte administrador de este proyecto funciona con una base de datos mysql.
Pueden descargar la base de datos en este mismo repositorio, contiene datos para fines de prueba.
Credenciales de administrador son:
User: administrador@trivia-mec.com
Password: Root2018

Notas:
La clave del sistema para acceder a administrador esta encriptada con el siguiente script.
echo password_hash("Root2018", PASSWORD_BCRYPT)
La cual genera un hash en la db.

Asegurece que su apache este activo el modulo mod_rewrite
ya que, si no lo esta deben de modificar manualmente el archivo .htaccess

LINKS DEL SISTEMA
localhost/session   Para administrador.
localhost           Para el juego

Suponiendo que se corra en local.

De tener dificultad escriba a este correo:
misabnll@gmail.com

JUEGO ONLINE PARA PROBARLO!!
Lamentablmente ya no tengo un demo de este juego, puesto que no renove más el dominio. Instalen local para probar.

SALUDOS!!

