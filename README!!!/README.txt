Si se quiere Actualizar todo el archivo 
en Github insertar el siguiente codigo 
en el Terminal 


git add .
git commit -m "Actualización GITHUB"
git push


Si se quiere Actualizar todo el archivo 
en VS-Code insertar el siguiente comando 
en el terminal 


git pull


Para subir los archivos a la BdD, Firebase
se usa desde el powershell
usar 
esto sirve para que se pueda usar desde
cualquier dispositivo

cd ..
cd ..
cd 'C:\Users\JosephA\Desktop\SENA\Ins Jhon Freddy Gerente de ficha\Github\Proyecto-Registro'

firebase deploy 


Actualizar firebase CLI

objeto binario independiente: Descarga la versión nueva 
"https://firebase.tools/bin/win/instant/latest" y reemplázala en tu sistema.
npm: 
Ejecuta 
npm install -g firebase-tools.

Desinstalar firebase CLI

npm: 
Ejecuta 
npm uninstall -g firebase-tools

RECOMENDACION

Si se quiere usar un proyecto diferente 
en firebase 
primero:

firebase projects:list
para saber que proyectos tiene en firebase 

luego copiar el id de el proyecto deseado
y usar el siguiente comando 

firebase use (el proyecto deseado con el id)

luego verificar si esta bien conectado con 

firebase use