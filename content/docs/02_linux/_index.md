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
* {{< color >}}Automatizar{{< /color >}} la instalación de software, lo que permite que todos los miembros del equipo de desarrollo trabajen en un entorno idéntico, evitando problemas de "funciona en mi máquina".


{{< alert title="En resumen" color="success" >}}
Vagrant nos facilita la configuración y el despliegue de entornos de desarrollo de manera rápida, repetible y escalable, simplificando la administración de **infraestructuras virtuales**.
{{< /alert >}}

### Instalación en Windows
<br />

* Necesitamos tener instalados tanto {{< color >}} [Virtualbox](https://www.virtualbox.org/wiki/Downloads) {{< /color >}} como {{< color >}} [Vagrant](https://developer.hashicorp.com/vagrant/install?product_intent=vagrant) {{< /color >}}.

* Lo primero será lo descargamos y posteriormente procedemos a la instalación
 
* Seleccionaremos en función del sistema operativo.

* {{< color >}} En windows {{< /color >}}, lo instalaremos  siguiendo las instrucciones del asistente de instalación (El proceso es sencillo).
 
### Instalación en ubuntu

Cómo siempre, lo primero {{< color >}} Actualizar el sistema {{< /color >}}

```bash
sudo apt update
sudo apt upgrade -y
```

*Como hemos comentado, {{< color >}} vagrant {{< /color >}} requiere tener instaladas algunas dependencias, como {{< color >}} VirtualBox {{< /color >}}, que es el proveedor de virtualización más común que Vagrant utiliza.

{{< highlight php "linenos=table, hl_lines=1" >}}
sudo apt install virtualbox -y
{{< / highlight >}}

Ahora vamos {{< color >}} a descargar e instalar Vagrant {{< /color >}}. 

Es posible que  vagrant no está en el repositorio de ubuntu, por lo que descargaríamos el fichero {{< color >}} .deb {{< /color >}} para proceder a la instalación 

{{< color >}} Añadiendo el repositorio de HashiCorp {{< /color >}}
*   Añadir la clave GPG 
{{< highlight php "linenos=table, hl_lines=1" >}}
curl -fsSL https://apt.releases.hashicorp.com/gpg | sudo apt-key add -
{{< / highlight >}}
 * Añadir el repositorio de HashiCorp a tu lista de fuentes 
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo apt-add-repository "deb [arch=amd64] https://apt.releases.hashicorp.com $(lsb_release -cs) main"

{{< / highlight >}}

Con el repositorio añadido, instalamos Vagrant :
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo apt update
sudo apt install vagrant 

{{< / highlight >}}

Para asegurarte de que Vagrant se ha instalado correctamente, miramos su versión 
{{< highlight php "linenos=table, hl_lines=1" >}}
vagrant --version
{{< / highlight >}}



### Configuración y uso de vagrant

Una vez instalado, da lo mismo que tengamos windows o linux, funcionaremos de la misma forma.
* Abrimos un terminal (en windows mucho mejor un power shell)
* Crea un directorio para nuestro proyecto de vagrant (es una forma de hablar, vamos a crear una virtualización de una máquina, gestinándolo con vagrant)

{{< highlight php "linenos=table, hl_lines=1" >}}
mkdir vagrant-proyecto
cd vagrant-proyecto

{{< / highlight >}}

*Inicializa un nuevo entorno de Vagrant con una caja (box) básica:

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
En el archivo Vagrantfile, puedes personalizar la configuración de tu entorno.
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
Aunque en este ejemplo usamos VirtualBox como proveedor, también puedes usar otros como VMware o Hyper-V

{{< /alert >}}
## Instalación base

### Partimos de una configuración base

### Ejemplos personalizados

Vamos a especificar un {{< color >}} Vagrantfile {{< /color >}} que cumple con los requisitos que has mencionado:

{{< color >}} Instala Apache y PHP. {{< /color >}}
* Comparte la carpeta local ./app con /var/www/html en la máquina virtual.
* Mapea el puerto 8888 de la máquina anfitriona con el puerto 80 de la máquina virtual.
{{< highlight php "linenos=table, hl_lines=1" >}}
  Vagrant.configure("2") do |config|

* # Usar la imagen base de Ubuntu
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



