---
title: "Ejercicios"
linkTitle: "Ejercicios para practicar"
weight: 10
icon: fas fa-tasks
---
# Ejercicios de Comandos Básicos en Linux

{{< color >}} 1. Navegación y Visualización de Archivos {{< /color >}}
- **1.1. Cambia de directorio**  
  Usa `cd` para navegar al directorio `/home` y luego vuelve al directorio raíz `/`.
{{<form solucion="cd /home">}}
 
{{</form>}}

- **1.2. Lista el contenido del directorio**  
  Usa `ls` para listar los archivos y carpetas en `/home`. Prueba también las opciones `-l` y `-a` para ver información detallada y archivos ocultos.

## 2. Creación y Eliminación de Archivos/Directorios
- **2.1. Crea directorios y archivos**  
  Crea un directorio llamado `proyecto` en tu `home` con `mkdir` y, dentro de él, crea tres archivos vacíos (`index.html`, `style.css`, `app.js`) usando `touch`.

- **2.2. Elimina un archivo**  
  Usa `rm` para borrar `style.css` y confirma que se eliminó listando los archivos dentro de `proyecto`.

- **2.3. Elimina un directorio**  
  Crea un directorio llamado `temporal` dentro de `proyecto` y luego elimínalo con `rm -r`.

## 3. Copia y Movimiento de Archivos
- **3.1. Copia un archivo**  
  Usa `cp` para copiar `index.html` y renómbralo como `index_backup.html` en el mismo directorio `proyecto`.

- **3.2. Mueve un archivo**  
  Usa `mv` para mover `app.js` a tu `home`. Luego, vuelve a moverlo a `proyecto`.

- **3.3. Renombra un archivo**  
  Con `mv`, cambia el nombre de `index_backup.html` a `index_viejo.html`.

## 4. Visualización de Contenido
- **4.1. Visualiza el contenido de un archivo**  
  Usa `cat` para ver el contenido de `index.html`. Luego, agrega un poco de texto en el archivo usando `echo "Contenido ejemplo" > index.html` y vuelve a visualizarlo con `cat`.

- **4.2. Lee archivos grandes con `more` y `less`**  
  Si tienes archivos grandes en el sistema, usa `more` y `less` para navegar por el contenido de esos archivos.

## 5. Permisos y Propiedades de Archivos
- **5.1. Cambia permisos de un archivo**  
  Usa `chmod` para hacer que `index.html` sea solo de lectura (`chmod 444`) y luego cambia los permisos para que sea ejecutable (`chmod +x`).

- **5.2. Verifica los permisos**  
  Usa `ls -l` para verificar los permisos de `index.html` y comprueba los cambios realizados.

## 6. Comandos para Información del Sistema
- **6.1. Verifica el espacio en disco**  
  Usa `df -h` para ver cuánto espacio libre queda en el disco.

- **6.2. Muestra la memoria en uso**  
  Usa `free -h` para ver la memoria RAM en uso.

## 7. Otros Comandos Útiles
- **7.1. Usa `history` para ver comandos anteriores**  
  Ejecuta `history` para ver los últimos comandos que has usado. Repite el comando número 5 en la lista con `!5`.

- **7.2. Limpia la pantalla**  
  Usa `clear` para limpiar la pantalla y mantener el terminal organizado.
