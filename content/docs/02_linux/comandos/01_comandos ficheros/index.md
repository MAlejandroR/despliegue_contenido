---
title: "Ficheros"
linkTitle: "Gestión de ficheros"
weight: 10
icon: fas fa-file
---

{{< objetivos  >}}
Comandos concretos clasficados en el sistema
{{< /objetivos >}}


## Repaso de Comandos Generales de Linux y Redes


# Comandos de Administración de Archivos en Linux
## 1. Navegación y Exploración del Sistema de Archivos

- {{< color >}} cd {{< /color >}}: Cambia de directorio (***c**hange **d**irectory*)
  {{< highlight php "linenos=table, hl_lines=1" >}}
  cd [directorio]
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      cd /usr/local #: Cambia al directorio `/usr/local`.
      cd .. #: Sube un nivel en el sistema de archivos.
      {{< / highlight >}}

  - {{< color >}} ls {{< /color >}}: Lista el contenido de un directorio (**l**i**s**t).
    {{< highlight php "linenos=table, hl_lines=1" >}}
    ls [opciones] [directorio]
    {{< / highlight >}}
      - Opciones útiles:
          - `-l`: Muestra detalles como permisos, propietario, tamaño y fecha de modificación.
          - `-a`: Muestra archivos y directorios ocultos.
          - `-R`: Lista de forma recursiva el contenido de subdirectorios.
          - `-S`: Ordena por tamaño.
          - `-t`: Ordena por tiempo de modificación.
      - Ejemplo:
        {{< highlight php "linenos=table, hl_lines=1" >}}
        ls -l /home/user/documentos
        {{< / highlight >}}

- {{< color >}} pwd {{< /color >}}: Muestra la ruta del directorio actual (***p**rint **w**orking **d**irectory*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  pwd
  {{< / highlight >}}

- {{< color >}} tree {{< /color >}}: Muestra la estructura de directorios en forma de árbol (*tree*).
    - Nota: Por defecto, `tree` no suele estar instalado. Para instalarlo:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      sudo apt update
      sudo apt install tree
      {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      tree [directorio] #: Muestra la estructura completa del directorio.
      tree -L 2 /home/user #: Muestra solo dos niveles de profundidad en el directorio /home/user.
      tree -L 1 /var/log #: Muestra únicamente el primer nivel de subdirectorios en /var/log.
      {{< / highlight >}}

- {{< color >}} find {{< /color >}}: Busca archivos y directorios en el sistema (*find*).
  - Este comando es muy potente y habría que practicarlo un poco, pues puede ser de mucha ayuda en momentos concretos.
    {{< highlight php "linenos=table, hl_lines=1" >}}
    find [ruta] [opciones] [criterio]
    {{< / highlight >}}
      - Opciones comunes:
          - `-name [nombre]`: Busca archivos o directorios que coincidan con el nombre especificado (sensible a mayúsculas).
          - `-iname [nombre]`: Igual que `-name`, pero insensible a mayúsculas.
          - `-type [tipo]`: Especifica el tipo de archivo a buscar:
              - `f` para archivos regulares.
              - `d` para directorios.
          - `-mtime [+n/-n]`: Busca archivos modificados hace más (`+n`) o menos (`-n`) de `n` días.
          - `-size [tamaño]`: Busca archivos de un tamaño específico, por ejemplo, `+10M` para archivos mayores a 10 MB.
          - `-user [usuario]`: Busca archivos que pertenezcan a un usuario específico.
          - `-exec [comando] {} \;`: Ejecuta un comando sobre cada archivo encontrado, reemplazando `{}` por el nombre del archivo.

      - Ejemplos:
        {{< highlight php "linenos=table, hl_lines=1" >}}
        find /home/user -name "archivo.txt" #: Busca el archivo "archivo.txt" en el directorio /home/user.
        find / -iname "*.pdf" #: Busca archivos PDF en el sistema de forma insensible a mayúsculas.
        find /var/log -type f -size +10M #: Busca archivos en /var/log mayores a 10 MB.
        find . -type f -mtime +30 #: Busca archivos modificados hace más de 30 días en el directorio actual.
        find /tmp -user nombre_usuario #: Busca archivos en /tmp pertenecientes al usuario especificado.
        find /home -name "*.log" -exec rm {} \; #: Busca y elimina todos los archivos .log en /home.
        {{< / highlight >}}



- {{< color >}} locate {{< /color >}}: Busca archivos rápidamente (*locate*).
    - Nota: `locate` no suele estar instalado en el sistema, por lo que hay que instalarlo y actualizar la base de datos para poder proceder a búsquedas rápidas:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      sudo apt update
      sudo apt install locate
      sudo updatedb
      {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      locate index.html #: Busca archivos llamados "index.html" en el sistema.
      locate -i documento.pdf #: Realiza una búsqueda insensible a mayúsculas de "documento.pdf".
      locate /etc/apt/sources.list #: Encuentra la ubicación del archivo "sources.list" en el sistema.
      {{< / highlight >}}


## 2. Manipulación de Archivos y Directorios

- {{< color >}} cp {{< /color >}}: Copia archivos o directorios (*copy*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  cp [opciones] /origen/ /destino/
  {{< / highlight >}}
    - Opciones útiles:
        - `-r`: Copia directorios de forma recursiva.
        - `-i`: Pide confirmación antes de sobrescribir.
        - `-v`: Muestra detalles de los archivos copiados.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      cp -r /home/user/documents /backups/ #: Copia el directorio "documents" al directorio "backups".
      {{< / highlight >}}

- {{< color >}} mv {{< /color >}}: Mueve o renombra archivos y directorios (*move*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  mv [opciones] /origen/ /destino/
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      mv folder1 folder2 #: Renombra "folder1" a "folder2".
      mv /tmp/file.txt /home/user/ #: Mueve "file.txt" al directorio "/home/user/".
      {{< / highlight >}}

- {{< color >}} rm {{< /color >}}: Elimina archivos y directorios (*remove*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  rm [opciones] /nombre/
  {{< / highlight >}}
    - Opciones útiles:
        - `-r`: Elimina directorios recursivamente.
        - `-f`: Fuerza la eliminación sin confirmación.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      rm -rf temp #: Elimina el directorio "temp" y su contenido sin confirmación.
      {{< / highlight >}}

- {{< color >}} mkdir {{< /color >}}: Crea un nuevo directorio (*make directory*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  mkdir [opciones] <directorio>
  {{< / highlight >}}
    - Opciones:
        - `-p`: Crea directorios principales según sea necesario.
        - `-v`: Muestra el directorio creado.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      mkdir -v ~/project/code #: Crea el subdirectorio "code" dentro de "project" y muestra el resultado.
      {{< / highlight >}}

- {{< color >}} touch {{< /color >}}: Crea un archivo vacío o actualiza la fecha de modificación (*touch*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  touch [opciones] /nombredearchivo
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      touch /home/user/nuevoarchivo.txt #: Crea un archivo vacío llamado "nuevoarchivo.txt" en "/home/user".
      {{< / highlight >}}

- {{< color >}} rmdir {{< /color >}}: Elimina un directorio vacío (*remove directory*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  rmdir [opciones] <directorio>
  {{< / highlight >}}
    - Opciones:
        - `-v`: Muestra el directorio eliminado.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      rmdir -v ~/project/code #: Elimina el directorio "code" dentro de "project" y muestra el resultado.
      {{< / highlight >}}
## 3. Visualización y Edición de Archivos

- {{< color >}} cat {{< /color >}}: Muestra el contenido de un archivo (*concatenate*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  cat [archivo]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      cat documento.txt #: Muestra el contenido completo de "documento.txt".
      {{< / highlight >}}

- {{< color >}} less / more {{< /color >}}: Visualiza archivos largos de forma paginada (*less* y *more*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  less [archivo]
  more [archivo]
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      less log.txt #: Muestra "log.txt" permitiendo desplazarse con las teclas.
      more log.txt #: Muestra "log.txt" avanzando una pantalla a la vez.
      {{< / highlight >}}

- {{< color >}} head {{< /color >}}: Muestra las primeras líneas de un archivo (*head*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  head [opciones] [archivo]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      head -n 5 notas.txt #: Muestra las primeras 5 líneas de "notas.txt".
      {{< / highlight >}}

- {{< color >}} tail {{< /color >}}: Muestra las últimas líneas de un archivo (*tail*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  tail [opciones] [archivo]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      tail -n 10 log.txt #: Muestra las últimas 10 líneas de "log.txt".
      tail -f log.txt #: Muestra en tiempo real las nuevas líneas añadidas a "log.txt".
      {{< / highlight >}}

- {{< color >}} nano, vim, gedit {{< /color >}}: Editores de texto en terminal.
  {{< highlight php "linenos=table, hl_lines=1-3" >}}
  nano [archivo]
  vim [archivo]
  gedit [archivo]
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      nano notas.txt #: Abre "notas.txt" para editar en nano.
      vim config.php #: Abre "config.php" para editar en vim.
      gedit texto.txt &: Abre "texto.txt" en gedit en segundo plano.
      {{< / highlight >}}



## 4. Análisis y Procesamiento de Archivos
{{< objetivos title="Comandos más complejos" sub_title="Practica y verifica sus opciones" >}}
Estas opciones son más complejas
En muchas ocasiones son parte de otros comandos
O pueden ser utilizados como programación (ver awk)
{{< /objetivos >}}
{{% line width="6px" color="green"%}}
<br />  

* {{< color >}} grep {{< /color >}}: Busca texto usando patrones (***g**lobal **r**egular **e**xpression **p**rint*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  grep [opciones] pattern [archivos]
  {{< / highlight >}}
    - Opciones útiles:
        - `-i`: Ignora mayúsculas y minúsculas en el patrón de búsqueda.
        - `-r` o `-R`: Busca de forma recursiva en todos los archivos de un directorio.
        - `-c`: Muestra solo el número de líneas que coinciden en cada archivo.
        - `-l`: Lista solo los nombres de archivos que contienen coincidencias.
        - `-n`: Muestra los números de línea donde se encuentran las coincidencias.
        - `-v`: Invierte la búsqueda, mostrando solo las líneas que **no** coinciden con el patrón.
        - `-w`: Coincide solo palabras completas, en lugar de cadenas parciales.
        - `-A [número]`: Muestra `n` líneas **después** de una coincidencia.
        - `-B [número]`: Muestra `n` líneas **antes** de una coincidencia.
        - `-C [número]`: Muestra `n` líneas de contexto **antes y después** de una coincidencia.

    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-8" >}}
      grep -i "error" /var/log/syslog #: Busca "error" en syslog ignorando mayúsculas.
      grep -r "TODO" ~/proyecto/ #: Busca "TODO" en todos los archivos de la carpeta "proyecto".
      grep -c "warning" logs.txt #: Muestra el número de líneas que contienen "warning" en logs.txt.
      grep -l "success" *.log #: Lista solo los archivos .log que contienen "success".
      grep -n "error" server.log #: Muestra el número de línea donde aparece "error" en server.log.
      grep -v "DEBUG" app.log #: Muestra las líneas de app.log que no contienen "DEBUG".
      grep -w "user" usuarios.txt #: Busca la palabra completa "user" en usuarios.txt.
      grep -A 3 "ERROR" server.log #: Muestra las 3 líneas siguientes a cada "ERROR" en server.log.
      {{< / highlight >}}


* {{< color >}} awk {{< /color >}}: Procesamiento de texto basado en patrones y acciones (***A**ho, **W**einberger, **K**ernighan*).

{{< alert title="Datos curiosos" color="success" >}}
{{< color >}} Alfred Aho {{< /color >}}
* Es un influyente científico informático y académico, principalmente reconocido por su trabajo en lenguajes de programación y algoritmos. Con Jeffrey Ullman, desarrolló **Compiladores: Principios, Técnicas y Herramientas**, conocido como **el libro del dragón** por su portada. Esta obra es una referencia esencial en la teoría y práctica de la construcción de compiladores. Aho también hizo contribuciones en los algoritmos de búsqueda y emparejamiento de patrones que son la base de herramientas de Unix.

{{< color >}} Peter Weinberger {{< /color >}}
 
* Weinberger, también un destacado científico informático, fue fundamental en la creación de herramientas de procesamiento de datos en Unix. Su trabajo en los laboratorios Bell ayudó a optimizar el rendimiento en sistemas de datos, y sus aportes son cruciales para las bases del procesamiento eficiente en sistemas Unix.
 
* Weinberger también fue responsable del famoso "W" en `awk` y contribuyó al desarrollo de herramientas y utilidades para Unix, orientadas a la administración de sistemas y manipulación de datos.

{{< color >}} Brian Kernighan{{< /color >}}
* Kernighan es conocido por su participación en la creación del lenguaje **C** junto a Dennis Ritchie, un hito en la programación moderna. Coautor del libro **“The C Programming Language”**, que es considerado el texto clásico para el aprendizaje de C, Kernighan también ha desarrollado herramientas de software y es coautor de varios otros libros de referencia sobre Unix y sus sistemas. 
 
* Su visión y trabajo en la programación estructurada y la eficiencia en código son claves en la evolución del desarrollo de software.
{{< /alert >}}

{{< highlight php "linenos=table, hl_lines=1" >}}
awk 'pattern { acción }' input-file
{{< / highlight >}}

- Opciones comunes:
    - **`-F`**: Especifica el delimitador de campo.
    - **`-v`**: Define variables externas para usarlas dentro de `awk`.

- Ejemplos:
  {{< highlight php "linenos=table, hl_lines=1-4" >}}
  awk '/error/ {print $1}' /var/log/syslog #: Imprime el primer campo de cada línea que contenga "error".
  awk -F":" '{print $1}' /etc/passwd #: Imprime el primer campo (nombre de usuario) de cada línea de /etc/passwd.
  awk '$3 > 1000 {print $1}' datos.txt #: Imprime el primer campo de líneas donde el tercer campo es mayor que 1000.
  awk -v ORS=", " '{print $1}' items.txt #: Imprime el primer campo de cada línea, separado por comas.
  {{< / highlight >}}

* {{< color >}} sed {{< /color >}}: Editor de secuencias para filtrado y transformación de texto (*stream editor*).

{{< alert title="Datos curiosos" color="success" >}}
- **Origen**: `sed` fue desarrollado en 1973 por **Lee E. McMahon** en los laboratorios Bell. Es una de las primeras herramientas de procesamiento de texto de Unix y se considera revolucionaria por su capacidad para realizar transformaciones de texto sin abrir un editor de archivos, aplicando cambios "en flujo" directamente sobre la salida.

- **Funcionalidad**: A diferencia de los editores de texto interactivos, `sed` se usa en la línea de comandos para realizar modificaciones masivas de texto mediante expresiones regulares y comandos específicos. Esta capacidad lo convierte en una herramienta ideal para automatizar tareas de procesamiento de texto, como reemplazos masivos o eliminación de líneas en scripts.

- **Ventajas**: `sed` es eficiente y rápido, ya que lee las líneas del archivo una a una y aplica los cambios en flujo. Su diseño "streaming" le permite manejar grandes volúmenes de texto con un bajo uso de recursos, siendo especialmente útil en procesos de scripting y administración de sistemas.

{{< /alert >}}

{{< highlight php "linenos=table, hl_lines=1" >}}
sed [opciones] 'commands' input-file
{{< / highlight >}}

- Opciones comunes:
    - **`-e`**: Permite ejecutar múltiples comandos de edición en una sola línea.
    - **`-i`**: Modifica el archivo en el lugar, haciendo los cambios permanentes.
    - **`-n`**: Suprime la salida automática; útil para imprimir solo líneas seleccionadas.

- Ejemplos:
  {{< highlight php "linenos=table, hl_lines=1-5" >}}
  sed 's/foo/bar/' file.txt #: Reemplaza la primera aparición de "foo" con "bar" en cada línea de "file.txt".
  sed 's/foo/bar/g' file.txt #: Reemplaza todas las apariciones de "foo" con "bar" en cada línea.
  sed -n '/error/p' log.txt #: Imprime solo las líneas que contienen "error".
  sed '2,5d' file.txt #: Elimina las líneas de la 2 a la 5 en "file.txt".
  sed -i 's/http/https/g' urls.txt #: Reemplaza "http" con "https" directamente en "urls.txt".
  {{< / highlight >}}


* {{< color >}} sort {{< /color >}}: Ordena líneas de archivos de texto (*sort*).

  {{< highlight php "linenos=table, hl_lines=1" >}}
  sort [opciones] [archivo]
  {{< / highlight >}}

    - Opciones comunes:
        - **`-n`**: Ordena numéricamente, en lugar de alfabéticamente.
        - **`-r`**: Invierte el orden de la clasificación (de mayor a menor).
        - **`-k [columna]`**: Ordena por una columna específica (útil para archivos con datos en columnas).
        - **`-u`**: Omite líneas duplicadas en la salida (solo muestra líneas únicas).
        - **`-t [delimitador]`**: Define un delimitador específico para dividir las columnas (por defecto es el espacio o tabulación).
        - **`-M`**: Ordena por nombre de mes (por ejemplo, de enero a diciembre).

    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-5" >}}
      sort -n datos.txt #: Ordena numéricamente el archivo "datos.txt".
      sort -r nombres.txt #: Ordena alfabéticamente en orden inverso.
      sort -k 3 empleados.txt #: Ordena el archivo "empleados.txt" por la tercera columna.
      sort -u lista.txt #: Muestra líneas únicas de "lista.txt".
      sort -t, -k 2 precios.csv #: Ordena "precios.csv" por la segunda columna usando coma como delimitador.
      {{< / highlight >}}

- {{< color >}} uniq {{< /color >}}: Filtra líneas repetidas adyacentes (*unique*).

  {{< highlight php "linenos=table, hl_lines=1" >}}
  uniq [opciones] [entrada]
  {{< / highlight >}}

    - Opciones comunes:
        - **`-c`**: Muestra un recuento de ocurrencias para cada línea única.
        - **`-d`**: Muestra solo las líneas que están duplicadas.
        - **`-u`**: Muestra solo las líneas únicas (sin duplicados).

    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      sort datos.txt | uniq #: Elimina líneas duplicadas en "datos.txt" después de ordenar.
      sort datos.txt | uniq -c #: Muestra cada línea única con el número de veces que aparece.
      sort datos.txt | uniq -d #: Muestra solo las líneas duplicadas.
      {{< / highlight >}}

- {{< color >}} diff {{< /color >}}: Compara archivos línea por línea (*difference*).

  {{< highlight php "linenos=table, hl_lines=1" >}}
  diff [opciones] archivo1 archivo2
  {{< / highlight >}}

    - Opciones comunes:
        - **`-u`**: Muestra las diferencias con contexto, incluyendo unas líneas anteriores y posteriores a la diferencia.
        - **`-y`**: Muestra las diferencias en formato de dos columnas (lado a lado).
        - **`-i`**: Ignora las diferencias en mayúsculas y minúsculas.

    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      diff original.txt actualizado.txt #: Muestra diferencias entre "original.txt" y "actualizado.txt".
      diff -u original.txt actualizado.txt #: Muestra las diferencias con contexto.
      diff -y archivo1.txt archivo2.txt #: Muestra las diferencias en dos columnas.
      {{< / highlight >}}

- {{< color >}} wc {{< /color >}}: Imprime recuento de líneas, palabras y bytes (*word count*).

  {{< highlight php "linenos=table, hl_lines=1" >}}
  wc [opciones] [archivo]
  {{< / highlight >}}

    - Opciones comunes:
        - **`-l`**: Cuenta solo el número de líneas.
        - **`-w`**: Cuenta solo el número de palabras.
        - **`-c`**: Cuenta solo el número de bytes.

    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      wc reporte.txt #: Muestra el número de líneas, palabras y bytes de "reporte.txt".
      wc -l reporte.txt #: Muestra solo el número de líneas de "reporte.txt".
      wc -w archivo.txt #: Muestra solo el número de palabras en "archivo.txt".
      {{< / highlight >}}



## 5. Análisis de Espacio de Disco

- {{< color >}} du {{< /color >}}: Estima el uso del espacio de un archivo o directorio (*disk usage*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  du [opciones] [ruta]
  {{< / highlight >}}
    - Opciones útiles:
        - `-h`: Muestra los tamaños en un formato legible para humanos (KB, MB, GB).
        - `-s`: Muestra solo el tamaño total de un directorio.
        - `-a`: Muestra el tamaño de cada archivo individual.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      du -sh pictures #: Muestra el tamaño total de la carpeta "pictures".
      {{< / highlight >}}

- {{< color >}} df {{< /color >}}: Muestra el uso de espacio en disco para cada sistema de archivos montado (*disk free*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  df [opciones]
  {{< / highlight >}}
    - Opciones útiles:
        - `-h`: Muestra el uso de espacio en formato legible para humanos.
        - `-T`: Muestra el tipo de sistema de archivos.
        - `-i`: Muestra el uso de inodos en lugar de bloques de disco.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      df -h #: Muestra el uso de espacio en disco en un formato amigable.
      {{< / highlight >}}

- {{< color >}} lsblk {{< /color >}}: Lista los dispositivos de bloques (discos y particiones) (*list block devices*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  lsblk [opciones]
  {{< / highlight >}}
    - Opciones útiles:
        - `-f`: Muestra el sistema de archivos de cada dispositivo.
        - `-l`: Muestra la lista en un formato lineal.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      lsblk -f #: Muestra todos los dispositivos y sus sistemas de archivos.
      {{< / highlight >}}

- {{< color >}} fdisk {{< /color >}}: Muestra y administra la tabla de particiones de discos (*format disk*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  fdisk [opciones] [dispositivo]
  {{< / highlight >}}
    - Opciones útiles:
        - `-l`: Lista las particiones de todos los discos.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      fdisk -l #: Muestra las particiones de todos los discos disponibles.
      {{< / highlight >}}

- {{< color >}} ncdu {{< /color >}}: Analiza el espacio en disco con una interfaz visual (*NCurses Disk Usage*).
    - Nota: `ncdu` requiere instalación previa:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      sudo apt update
      sudo apt install ncdu
      {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      ncdu /home/user #: Muestra el uso de espacio en "/home/user" de forma interactiva.
      {{< / highlight >}}

- {{< color >}} lsof {{< /color >}}: Lista archivos abiertos y ayuda a identificar qué archivos están en uso y consumiendo espacio (*list open files*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  lsof +D [directorio]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      lsof +D /var/log #: Muestra archivos abiertos en "/var/log".
      {{< / highlight >}}



## Comandos Generales

### 1. `ls`
Lista los archivos y directorios en el directorio actual.
{{< highlight php "linenos=table, hl_lines=1" >}}
ls -la

{{< / highlight >}}

- `-l`: lista en formato largo.
- `-a`: incluye archivos ocultos.

### 2. `cd`
Cambia de directorio.
{{< highlight php "linenos=table, hl_lines=1" >}}
cd /ruta/del/directorio

{{< / highlight >}}


### 3. `cp`
Copia archivos o directorios.
{{< highlight php "linenos=table, hl_lines=1" >}}
 cp archivo_origen archivo_destino

{{< / highlight >}}

- `-r`: para copiar directorios de forma recursiva.

### 4. `mv`
Mueve o renombra archivos o directorios.
{{< highlight php "linenos=table, hl_lines=1" >}}
mv archivo_origen archivo_destino

{{< / highlight >}}


### 5. `rm`
Elimina archivos o directorios.
{{< highlight php "linenos=table, hl_lines=1" >}}
rm archivo

{{< / highlight >}}

- `-r`: elimina directorios de forma recursiva.
- `-f`: fuerza la eliminación sin confirmación.

### 6. `cat`
Muestra el contenido de un archivo.

{{< highlight php "linenos=table, hl_lines=1" >}}
cat archivo

{{< / highlight >}}

### 7. `grep`
Busca texto dentro de archivos.
{{< highlight php "linenos=table, hl_lines=1" >}}
grep 'texto' archivo

{{< / highlight >}}


### 8. `chmod`
Cambia permisos de archivos o directorios.

{{< highlight php "linenos=table, hl_lines=1" >}}
chmod 755 archivo

{{< / highlight >}}


### 9. `chown`
Cambia el propietario de archivos o directorios.
{{< highlight php "linenos=table, hl_lines=1" >}}
chown usuario

{{< / highlight >}}

### 10. `find`
Busca archivos en el sistema.
{{< highlight php "linenos=table, hl_lines=1" >}}
find /ruta -name 'archivo*'

{{< / highlight >}}


## Comandos de Redes y Comunicaciones

### 1. `ifconfig`
Muestra o configura las interfaces de red.
{{< highlight php "linenos=table, hl_lines=1" >}}
ifconfig

{{< / highlight >}}

### 2. `ip`
Muestra o manipula rutas, dispositivos y políticas de red.
{{< highlight php "linenos=table, hl_lines=1" >}}
ip addr show

{{< / highlight >}}

- `ip route`: muestra la tabla de rutas.
- `ip link`: muestra o configura dispositivos de red.

### 3. `ping`
Envía paquetes ICMP para verificar la conectividad con una IP o dominio.
{{< highlight php "linenos=table, hl_lines=1" >}}
ping google.com

{{< / highlight >}}


### 4. `netstat`
Muestra conexiones de red, tablas de enrutamiento y estadísticas.

{{< highlight php "linenos=table, hl_lines=1" >}}
netstat -tuln

{{< / highlight >}}
- `-t`: muestra conexiones TCP.
- `-u`: muestra conexiones UDP.
- `-l`: muestra servicios en escucha.

### 5. `ss`
Muestra información sobre sockets de red.
{{< highlight php "linenos=table, hl_lines=1" >}}
ss -tuln

{{< / highlight >}}


### 6. `traceroute`
Muestra la ruta que siguen los paquetes hasta un host.
{{< highlight php "linenos=table, hl_lines=1" >}}
traceroute google.com

{{< / highlight >}}


### 7. `nslookup`
Interroga a servidores DNS para obtener información de dominios o IPs.
{{< highlight php "linenos=table, hl_lines=1" >}}
nslookup google.com

{{< / highlight >}}


### 8. `dig`
Realiza consultas DNS más detalladas.
{{< highlight php "linenos=table, hl_lines=1" >}}
dig google.com

{{< / highlight >}}


### 9. `ftp` / `sftp`
Transfiere archivos entre sistemas mediante los protocolos FTP/SFTP.
{{< highlight php "linenos=table, hl_lines=1" >}}
ftp usuario@servidor sftp usuario@servidor

{{< / highlight >}}


### 10. `scp`
Copia archivos entre sistemas de forma segura.
{{< highlight php "linenos=table, hl_lines=1" >}}
scp archivo usuario@servidor:/ruta/destino

{{< / highlight >}}


### 11. `curl`
Realiza peticiones HTTP desde la terminal.
{{< highlight php "linenos=table, hl_lines=1" >}}
curl https://ejemplo.com

{{< / highlight >}}


### 12. `wget`
Descarga archivos de una URL.
{{< highlight php "linenos=table, hl_lines=1" >}}
wget https://ejemplo.com/archivo.tar.gz

{{< / highlight >}}


### 13. `nmap`
Escanea redes y puertos.
{{< highlight php "linenos=table, hl_lines=1" >}}
nmap -sP 192.168.1.0/24

{{< / highlight >}}


### 14. `ssh`
Conexión remota segura a otro sistema.
{{< highlight php "linenos=table, hl_lines=1" >}}
ssh usuario@servidor

{{< / highlight >}}


### 15. `iptables`
Configura las reglas del cortafuegos en el sistema.

{{< highlight php "linenos=table, hl_lines=1" >}}
iptables -L

{{< / highlight >}}


## Comandos Útiles para Configuración de Redes

### 1. `hostname`
Muestra o cambia el nombre del host del sistema.

{{< highlight php "linenos=table, hl_lines=1" >}}
****
{{< / highlight >}}


### 2. `systemctl`
Gestiona servicios en el sistema.

{{< highlight php "linenos=table, hl_lines=1" >}}
systemctl restart servicio

{{< / highlight >}}

- `start`: inicia un servicio.
- `stop`: detiene un servicio.
- `status`: muestra el estado de un servicio.

### 3. `nmcli`
Configura y gestiona la red mediante NetworkManager desde la terminal.
{{< highlight php "linenos=table, hl_lines=1" >}}
nmcli dev status

{{< / highlight >}}


## Comandos para Diagnóstico de Red

### 1. `mtr`
Combina `ping` y `traceroute` para diagnosticar la red.
{{< highlight php "linenos=table, hl_lines=1" >}}
mtr google.com

{{< / highlight >}}


### 2. `tcpdump`
Captura y muestra tráfico de red.

{{< highlight php "linenos=table, hl_lines=1" >}}
tcpdump -i eth0

{{< / highlight >}}


### 3. `ethtool`
Muestra o cambia los ajustes de las interfaces de red.
{{< highlight php "linenos=table, hl_lines=1" >}}
ethtool dev
{{< / highlight >}}