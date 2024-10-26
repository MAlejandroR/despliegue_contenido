---
title: "Comandos"
linkTitle: "comandos"
weight: 10
icon: fab fa-linux
---

{{< objetivos  >}}
Qué son los comandos linux
Clasificación de diferentes tipos de comandos linux
{{< /objetivos >}}

## Introducción a los Comandos de Linux

Los comandos en Linux {{<color_green>}}son instrucciones que el usuario ejecuta en la terminal{{</color_green>}} para interactuar directamente con el sistema operativo.

Linux, como sistema basado en Unix, ofrece {{<color_green>}}una amplia gama de comandos{{</color_green>}} que permiten realizar tareas de {{<color_green>}}administración, manipulación de archivos, gestión de procesos y redes{{</color_green>}}, entre otros.

Estos comandos forman {{<color_green>}}el núcleo de la interacción en Linux{{</color_green>}}, especialmente para usuarios avanzados, desarrolladores y administradores de sistemas.

## Núcleo de Comandos Linux y Herramientas GNU

El sistema operativo Linux incluye un conjunto básico de comandos integrados en el núcleo. 

Estos comandos básicos, como `ls` (para listar archivos), `cd` (para cambiar de directorio) y `ps` (para listar procesos en ejecución), son esenciales y consisten en una colección relativamente pequeña.

Sin embargo, muchas distribuciones Linux incluyen las **utilidades GNU** (como `chmod`, `grep`, `awk`, y `sed`), un conjunto extensivo de herramientas que amplían enormemente las capacidades de Linux.

Las utilidades GNU son fundamentales en casi todas las distribuciones, aportando entre 400 y 600 comandos adicionales que permiten manipular archivos, gestionar usuarios y grupos, editar textos, y mucho más. 

Las herramientas GNU son esenciales en sistemas Linux modernos y forman el corazón de muchas operaciones en la terminal.

## Distribuciones y Variabilidad de Comandos

La cantidad exacta de comandos disponibles en Linux puede variar significativamente según la distribución y los paquetes instalados. 

Algunas distribuciones como **Ubuntu**, **Debian** y **Red Hat** incluyen sus propias herramientas de administración y gestores de paquetes (`apt`, `yum`, o `dnf`), que agregan comandos específicos. 

Además, herramientas populares como Docker, Git, y Kubernetes, cada una con sus propios subcomandos y opciones, contribuyen al número total de comandos disponibles.

## Un Entorno Extensible

La flexibilidad de Linux permite instalar paquetes y aplicaciones de terceros, lo que significa que el número de comandos disponibles puede extenderse aún más. 

En una instalación básica de Linux, un usuario puede contar con aproximadamente 1,000 comandos, mientras que en una instalación avanzada, el número puede superar los 2,000, o incluso más, dependiendo del software instalado.

Esta extensibilidad y la modularidad del sistema Linux hacen de sus comandos una herramienta poderosa y adaptable a una gran variedad de necesidades, desde la administración de servidores hasta el desarrollo de aplicaciones y el análisis de datos.

En este tema, veremos algunos comandos, si bien, es interesante profundizar y según el objetivo del manejo del sistema, podremos seguramente indagar en nuevas funcionalidades.

### ¿Qué Son los Comandos en Linux?

Los comandos en Linux permiten controlar el sistema desde la **interfaz de línea de comandos** (CLI) en lugar de usar una interfaz gráfica. 

Son instrucciones escritas en texto que, al ser introducidas en el terminal, indican al sistema exactamente qué hacer.

Esto proporciona un control preciso y detallado sobre el sistema, algo que es difícil de lograr solo con el ratón en un entorno gráfico.

Algunas características clave de los comandos en Linux:

- **Distinguen entre mayúsculas y minúsculas**: Por ejemplo, `ls` y `LS` son diferentes, ya que Linux es un sistema sensible a las mayúsculas.
- **Tienen una estructura definida**: Usan la sintaxis de `comando -opciones argumentos`, donde cada comando puede llevar opciones y argumentos específicos.
- **Combinación para tareas avanzadas**: Se pueden combinar para realizar operaciones complejas mediante pipelines (`|`) y redirecciones (`>` y `>>`).
- **Automatización y scripting**: Los comandos permiten crear scripts para automatizar tareas y ejecutar procesos en lote, lo que facilita la gestión y operación del sistema.
- **Acceso directo a recursos del sistema**: Puedes gestionar el sistema de archivos, la red, la memoria y la CPU directamente desde la línea de comandos.
- **Interacción en sistemas de servidor**: La CLI es la base para la administración remota de servidores Linux, permitiendo a los administradores realizar configuraciones, instalaciones y monitoreo de sistemas de forma eficiente.

Usar comandos en Linux es esencial para usuarios avanzados y administradores de sistemas .

# Repaso de Comandos Generales de Linux y Redes

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