---
title: "Ficheros"
linkTitle: "comandos de la gestión de ficheros"
weight: 10
icon: fab fa-linux
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

- {{< color >}} grep {{< /color >}}: Busca texto usando patrones (*global regular expression print*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  grep [opciones] pattern [archivos]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      grep -i "error" /var/log/syslog #: Busca "error" en syslog ignorando mayúsculas.
      {{< / highlight >}}

- {{< color >}} awk {{< /color >}}: Procesamiento de texto basado en patrones y acciones (*Aho, Weinberger, Kernighan*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  awk 'pattern { acción }' input-file
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      awk '/error/ {print $1}' /var/log/syslog #: Imprime el primer campo de cada línea que contenga "error".
      {{< / highlight >}}

- {{< color >}} sed {{< /color >}}: Editor de secuencias para filtrado y transformación de texto (*stream editor*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  sed [opciones] 'commands' input-file
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      sed 's/foo/bar/' file.txt #: Reemplaza "foo" con "bar" en "file.txt".
      {{< / highlight >}}

- {{< color >}} sort {{< /color >}}: Ordena líneas de archivos de texto (*sort*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  sort [opciones] [archivo]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      sort -n datos.txt #: Ordena numéricamente el archivo "datos.txt".
      {{< / highlight >}}

- {{< color >}} uniq {{< /color >}}: Filtra líneas repetidas adyacentes (*unique*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  uniq [opciones] [entrada]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      sort datos.txt | uniq #: Elimina líneas duplicadas en "datos.txt" después de ordenar.
      {{< / highlight >}}

- {{< color >}} diff {{< /color >}}: Compara archivos línea por línea (*difference*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  diff [opciones] archivo1 archivo2
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      diff original.txt actualizado.txt #: Muestra diferencias entre "original.txt" y "actualizado.txt".
      {{< / highlight >}}

- {{< color >}} wc {{< /color >}}: Imprime recuento de líneas, palabras y bytes (*word count*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  wc [opciones] [archivo]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      wc reporte.txt #: Muestra el número de líneas, palabras y bytes de "reporte.txt".
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

- {{< color >}} btrfs {{< /color >}}: Comando específico para sistemas de archivos Btrfs (*B-Tree file system*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  btrfs filesystem df [punto de montaje]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      btrfs filesystem df /mnt #: Muestra el uso de espacio en un sistema Btrfs montado en "/mnt".
      {{< / highlight >}}

- {{< color >}} lsof {{< /color >}}: Lista archivos abiertos y ayuda a identificar qué archivos están en uso y consumiendo espacio (*list open files*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  lsof +D [directorio]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      lsof +D /var/log #: Muestra archivos abiertos en "/var/log".
      {{< / highlight >}}



# Agrupación de Comandos de Linux por Funcionalidad

### Administración de Archivos y Directorios**  
   Comandos para la manipulación básica de archivos y directorios.

 - `ls`, `cd`, `cp`, `mv`, `mkdir`, `rm`

2. **Redirección y Manipulación de Flujo**  
   Operadores y comandos que permiten redirigir o canalizar la entrada y salida.
 - `>`, `>>`, `<`, `|`, `tee`, `xargs`

3. **Comandos de Archivado y Compresión**  
   Comandos para comprimir y empaquetar archivos.
 - `tar`, `gzip`, `gunzip`, `zip`, `unzip`

4. **Transferencia de Archivos y Redes**  
   Comandos para la transferencia de datos de forma segura y eficiente.
 - `scp`, `ftp`, `wget`, `curl`

5. **Permisos y Propiedades de Archivos**  
   Administración de permisos y propietarios, importante en sistemas multiusuario.
 - `chmod`, `chown`, `chgrp`

6. **Gestión de Procesos**  
   Comandos para monitorear y gestionar procesos.
 - `ps`, `top`, `htop`, `kill`, `nice`, `renice`

7. **Administración de Usuarios**  
   Comandos para gestionar usuarios y grupos en el sistema.
 - `useradd`, `usermod`, `passwd`, `groupadd`

8. **Comandos de Red**  
   Comandos para configuraciones y diagnósticos de red.
 - `ping`, `ifconfig`/`ip`, `netstat`, `nslookup`, `traceroute`

Para más detalles y ejemplos, puedes revisar la guía completa en [DreamHost](https://www.dreamhost.com).


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