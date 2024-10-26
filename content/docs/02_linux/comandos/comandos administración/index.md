---
title: "Listado"
linkTitle: "comandos"
weight: 10
icon: fab fa-linux
---

{{< objetivos  >}}
Comandos concretos clasficados en el sistema
{{< /objetivos >}}


## Repaso de Comandos Generales de Linux y Redes

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