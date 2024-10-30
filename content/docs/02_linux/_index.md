---
title: "Linux"
linkTitle: "Linux"
weight: 20
icon: fab fa-linux
---
# :penguin:

{{<objetivos sub_title="Repaso y práctica con comandos  de linux" >}}
Creando una virtualización con vagrant
Comando de linux
Comandos básicos
Comandos de ficheros
Comandos de redes
Comandos de seguridad

{{</objetivos>}}


# Instalación de vagrant

## Qué es vagrant
**Vagrant** es una herramienta de código abierto diseñada para la creación y gestión de entornos virtualizados de forma eficiente.

Su principal objetivo es proporcionar una forma fácil y reproducible de configurar, lanzar y gestionar {{< color >}}máquinas virtuales{{< /color >}}.

{{< color >}} Características de vagrant {{< /color >}}

* Definir la configuración de una máquina virtual en un archivo llamado {{< color >}}Vagrantfile{{< /color >}}.
* Crear entornos virtuales en pocos minutos con {{< color >}}configuraciones personalizadas{{< /color >}} (sistemas operativos, software, redes, etc.).
* Usar {{< color >}}proveedores de virtualización{{< /color >}} como VirtualBox, VMware, Docker, entre otros.
* {{< color >}}Automatizar{{< /color >}} la instalación de software, lo que permite que todos los miembros del equipo de desarrollo trabajen en un entorno idéntico, evitando problemas de "funciona en mi máquina", ideal para que independientemente de las máquinas que tenemos, todos podamos funcionar de la misma manera.


{{< alert title="En resumen" color="success" >}}
Vagrant nos facilita la configuración y el despliegue de entornos de desarrollo de manera rápida, repetible y escalable, simplificando la administración de **infraestructuras virtuales**.
{{< /alert >}}

### Instalación en Windows
<br />

* Necesitamos tener instalados tanto {{< color >}} [Virtualbox](https://www.virtualbox.org/wiki/Downloads) {{< /color >}} como {{< color >}} [Vagrant](https://developer.hashicorp.com/vagrant/install?product_intent=vagrant) {{< /color >}}.

* Debemos descargar el programa de instalación para proceder posteriormente a la misma.
 
* Una vez en la web de descargas, seleccionaremos en función del sistema operativo.

* {{< color >}} En windows {{< /color >}}, lo instalaremos  siguiendo las instrucciones del asistente de instalación (El proceso es sencillo).
 
### Instalación en ubuntu

Cómo siempre, lo primero {{< color >}} Actualizar el sistema {{< /color >}}

```bash
sudo apt update
sudo apt upgrade -y
```

*Como hemos comentado, {{< color >}} vagrant {{< /color >}} requiere tener instaladas algunas dependencias, como {{< color >}} VirtualBox {{< /color >}}, que es el proveedor de virtualización más común que Vagrant utiliza, y el que vamos a utilizar nosotros.

{{< highlight php "linenos=table, hl_lines=1" >}}
sudo apt install virtualbox -y
{{< / highlight >}}

A continuación  {{< color >}} descargamos  e instalamos Vagrant {{< /color >}}. 

Es posible que  vagrant no está en el repositorio de ubuntu, por lo que descargaríamos el fichero {{< color >}} .deb {{< /color >}} para proceder a la instalación, o bien añadimos el respositorio de {{< color >}} HashiCorp {{< /color >}}, donde se encuentra este paquete de instalación. 

{{< color >}} Añadiendo el repositorio de HashiCorp {{< /color >}}
*   Añadir la clave GPG 
{{< highlight php "linenos=table, hl_lines=1" >}}
curl -fsSL https://apt.releases.hashicorp.com/gpg | sudo apt-key add -
{{< / highlight >}}
 * Añadir el repositorio de HashiCorp a la lista de fuentes 
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo apt-add-repository "deb [arch=amd64] https://apt.releases.hashicorp.com $(lsb_release -cs) main"

{{< / highlight >}}
Con el repositorio añadido, instalamos Vagrant:
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo apt update
sudo apt install vagrant 

{{< / highlight >}}

Ahora, una vez instalado, si todo ha ido bien podemos mirar su versión 
{{< highlight php "linenos=table, hl_lines=1" >}}
vagrant --version
{{< / highlight >}}



### Configuración y uso de vagrant

Independientemente que lo hayamnos instalado bajo  windows o linux, funcionaremos de la misma forma.
* Abrimos un terminal (en windows mucho mejor un power shell)
* Crea un directorio para nuestro proyecto de vagrant (es una forma de hablar, vamos a crear una virtualización de una máquina, gestinándolo con vagrant)

{{< highlight php "linenos=table, hl_lines=1" >}}
mkdir vagrant-proyecto
cd vagrant-proyecto

{{< / highlight >}}

* Inicializa un nuevo entorno de Vagrant con una caja (box) básica:

* Podemos establecer el box o caja o virtualizacion que queremos
  https://app.vagrantup.com/boxes/search

{{< highlight php "linenos=table, hl_lines=1" >}}
vagrant init ubuntu/bionic64

{{< / highlight >}}
* Esto creará un archivo Vagrantfile con la configuración inicial.

{{< color >}}  Levantar la máquina virtual: {{< /color >}}

* Para crear y ejecutar la máquina virtual, usa el siguiente comando:
{{< highlight php "linenos=table, hl_lines=1" >}}
  vagrant up

{{< / highlight >}}

{{< color >}} Acceder a la máquina virtual: {{< /color >}}

Una vez que la máquina esté levantada, accede a ella mediante SSH:
{{< highlight php "linenos=table, hl_lines=1" >}}
vagrant ssh

{{< / highlight >}}
{{< color >}} Detener o destruir la máquina virtual: {{< /color >}}

Para detener la máquina:

{{< highlight php "linenos=table, hl_lines=1" >}}
vagrant halt

{{< / highlight >}}
{{< color >}} Para destruir la máquina (eliminarla): {{< /color >}}

{{< highlight php "linenos=table, hl_lines=1" >}}
vagrant destroy

{{< / highlight >}}


#### Personalización del Vagrantfile
En el archivo Vagrantfile, se  personaliza la configuración del entorno que vamos a crear.
{{< highlight php "linenos=table, hl_lines=1" >}}
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"      # Define la caja a usar
  config.vm.network "private_network", type: "dhcp"  # Configura la red privada
  config.vm.provider "virtualbox" do |vb|
  vb.memory = "1024"                   # Asigna memoria RAM
  vb.cpus = 2                          # Asigna cantidad de CPUs
end
{{< / highlight >}}

{{< alert title="Proveedor" color="success" >}}
Aunque en este ejemplo usamos VirtualBox como proveedor, también se pueden usar otros, como VMware o Hyper-V

{{< /alert >}}
## Instalación base

### Partimos de una configuración base

### Ejemplos personalizados

Vamos a especificar un {{< color >}} Vagrantfile {{< /color >}} con los siguientes requisitos:
* que tenga instalados los siguientes paquetes (para trabajar con php y apache): 
  * apache2, php y libapache2-mod-php
  * Compartkir la carpeta local ./app (o .\app), es decir una carpeta en el directorio actual llamada {{< color >}} app {{< /color >}} con /var/www/html en la máquina virtual.
  * Mapea el puerto 8888 de la máquina anfitriona con el puerto 80 de la máquina virtual, para poder acceder al apache de nuestra virtualización
{{< highlight php "linenos=table, hl_lines=1" >}}
  Vagrant.configure("2") do |config|

 # Usar la imagen base de Ubuntu
  config.vm.box = "bento/ubuntu-22.04"

  # Mapeo de puertos: 8888 en la máquina local al 80 en la máquina virtual
  config.vm.network "forwarded_port", guest: 80, host: 8888

  # Compartir la carpeta ./app en el host con /var/www/html en la VM
  config.vm.synced_folder "./app", "/var/www/html", owner: "www-data", group: "www-data", mount_options: ["dmode=775", "fmode=664"]

  # Provisionar la máquina virtual para instalar Apache y PHP
  config.vm.provision "shell", inline: <<-SHELL
  sudo apt update
  sudo apt install -y apache2 php libapache2-mod-php
  sudo systemctl enable apache2
  sudo systemctl start apache2

  # Asegurarse de que www-data es el propietario del directorio
  sudo chown -R www-data:www-data /var/www/html
  SHELL
end

{{< / highlight >}}

markdown
Copiar código
# Configuración de Red en Vagrant

Vagrant ofrece varias opciones de configuración de red para gestionar la conectividad de las máquinas virtuales (VMs) y su acceso tanto al host como a redes externas.

## Configuración de Red NAT por Defecto

La configuración de red de Vagrant, por defecto, utiliza una red **NAT (Network Address Translation)**. En este modo:
- La VM puede **acceder a Internet** a través de la interfaz de red del host.
- **No permite la comunicación directa** con la red local del host.

Si necesitas que la VM se comunique directamente con el host o con otros dispositivos en la red local, puedes añadir configuraciones de red adicionales en el archivo `Vagrantfile`.

## Opciones de Red en Vagrant

### 1. Red Privada (Private Network)
La red privada permite que la VM tenga una **dirección IP fija**, accesible solo desde el host y otras VMs en el mismo `Vagrantfile`. Esto facilita la comunicación directa entre el host y la VM sin exponer la VM a la red local completa.

En el archivo `Vagrantfile`, puedes añadir una red privada así:

```ruby
config.vm.network "private_network", ip: "192.168.56.10"
```
#### Detalles:
- **Ventaja**: Permite una conexión directa entre host y VM.
- **Desventaja**: No permite salida directa a Internet sin una interfaz NAT adicional.

Después de añadir esta configuración:
- Usa la IP `192.168.56.10` para comunicarte con la VM desde el host.
- La VM también podrá hacer ping a la IP local del host (como `192.168.1.144`), siempre que ambos dispositivos estén en el mismo rango de red.

### 2. Red en Modo Puente (Bridged Network)
En el modo puente, la VM obtiene una dirección IP de la misma red que el host, como si estuviera conectada directamente a la red física (por ejemplo, al router o switch).

En el `Vagrantfile`, añade:

```ruby
config.vm.network "public_network"
```
#### Detalles:
- **Ventaja**: La VM puede comunicarse con otros dispositivos en la red local y tener acceso a Internet (si la red lo permite).
- **Desventaja**: Expone la VM a toda la red local, lo que puede representar riesgos de seguridad si no se configura adecuadamente.

Ahora, la VM debería poder hacer ping a la IP del host (`192.168.1.144`) y viceversa.

### 3. Red Solo para Host (Host-Only Network)
En el modo solo para host, la VM está conectada exclusivamente al host sin salida a Internet ni conexión con otras redes. Esto es ideal para entornos de desarrollo donde la VM no necesita conectividad externa.

Para configurar una red solo para host:

```ruby
config.vm.network "private_network", type: "dhcp"
```
#### Detalles:
- **Ventaja**: Mantiene la VM completamente aislada de la red externa, mejorando la seguridad.
- **Desventaja**: La VM no tiene salida a Internet y solo puede comunicarse con el host.

### Combinaciones Comunes de Redes en Vagrant
Vagrant permite combinar la red NAT con otras redes (privada o en modo puente) para obtener beneficios de ambas configuraciones. Algunas combinaciones prácticas son:

- **NAT + Red Privada**: La interfaz NAT proporciona salida a Internet, mientras que la red privada permite la comunicación directa entre host y VM.
- **NAT + Red en Modo Puente**: La interfaz NAT permite el acceso a Internet, y la red en modo puente proporciona acceso directo a la red local.

Estas combinaciones permiten que la VM esté accesible tanto desde el host como desde la red local, sin perder la conexión a Internet.

### Ejemplo Completo del `Vagrantfile` con Múltiples Redes
Aquí tienes un ejemplo de un `Vagrantfile` que configura una red NAT y una red en modo puente:

```ruby
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
  
  # Mantiene la interfaz NAT por defecto para el acceso a Internet.
  config.vm.network "private_network", ip: "192.168.56.10"  # Red privada para conexión host-VM
  # O bien:
  # config.vm.network "public_network"  # Modo puente para obtener IP en red local
end
```
### Verificación de Conectividad
Para comprobar el acceso a Internet desde la VM, ejecuta:

```bash
ping google.com
```
Si funciona, entonces la interfaz NAT sigue operativa para la salida a Internet.

Para aplicar cambios de red en el archivo `Vagrantfile`, reinicia la VM con:

```bash
vagrant reload
```
Una vez reiniciada, puedes verificar la IP asignada a cada interfaz en la VM usando:

```bash
ifconfig
# o bien
ip addr
```
