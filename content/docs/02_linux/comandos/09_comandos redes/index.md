---
title: "Redes"
linkTitle: "Redes"
weight: 90
icon: fas fa-network-wired
---

{{< objetivos  >}}
Comandos concretos clasficados en el sistema
{{< /objetivos >}}
# Comandos de Red

- {{< color >}} ping {{< /color >}}: Verifica la conectividad de red con otro host.
    - **Descripción**: `ping` envía paquetes ICMP a una dirección IP o dominio para comprobar si está accesible. Es útil para diagnosticar problemas de conectividad.
    - **Opciones útiles**:
        - **`-c [número]`**: Especifica el número de paquetes que se enviarán.
        - **`-i [segundos]`**: Establece el intervalo entre envíos.
    - **Ejemplo de uso**:
      ```bash
	  ping -c 4 google.com  # Envía 4 paquetes para comprobar la conectividad con google.com
	  ```

- {{< color >}} ifconfig {{< /color >}} / {{< color >}} ip {{< /color >}}: Muestra o configura interfaces de red.
    - **Descripción**: `ifconfig` (deprecated) y `ip` son comandos para ver y configurar interfaces de red. `ip` es la versión moderna recomendada para la gestión de conexiones y rutas.
    - **Instalación**:
        - `ifconfig` requiere el paquete **`net-tools`** en distribuciones recientes de Ubuntu.
          ```bash
		  sudo apt update
		  sudo apt install net-tools
		  ```
    - **Opciones útiles para `ip`**:
        - **`addr`**: Muestra la configuración de direcciones IP en cada interfaz.
        - **`link`**: Muestra información sobre las interfaces físicas.
    - **Ejemplo de uso**:
      ```bash
	  ip addr show  # Muestra la configuración IP de todas las interfaces
	  ```

- {{< color >}} netstat {{< /color >}}: Muestra conexiones de red, tablas de enrutamiento y estadísticas.
    - **Descripción**: `netstat` es útil para ver conexiones activas, puertos abiertos, estadísticas de red y la tabla de enrutamiento. Es comúnmente utilizado en diagnóstico de redes y seguridad.
    - **Instalación**: `netstat` también requiere **`net-tools`** en distribuciones modernas de Ubuntu.
    - **Opciones útiles**:
        - **`-tuln`**: Muestra puertos TCP y UDP que están escuchando en el sistema.
        - **`-r`**: Muestra la tabla de enrutamiento.
    - **Ejemplo de uso**:
      ```bash
	  netstat -tuln  # Lista puertos TCP/UDP en escucha
	  ```

- {{< color >}} nslookup {{< /color >}}: Consulta información de DNS sobre un dominio o IP.
    - **Descripción**: `nslookup` permite realizar consultas DNS, obteniendo la IP asociada a un dominio o el dominio asociado a una IP. Es útil para resolver problemas de nombres de dominio.
    - **Instalación**: `nslookup` forma parte del paquete **`dnsutils`**.
      ```bash
	  sudo apt update
	  sudo apt install dnsutils
	  ```
    - **Ejemplo de uso**:
      ```bash
	  nslookup google.com  # Obtiene la dirección IP de google.com
	  ```

- {{< color >}} traceroute {{< /color >}}: Rastrea la ruta que toma un paquete hasta su destino.
    - **Descripción**: `traceroute` muestra cada salto intermedio (router o dispositivo de red) que un paquete atraviesa para llegar a su destino. Es útil para diagnosticar problemas de latencia o rutas en la red.
    - **Instalación**: `traceroute` requiere el paquete **`traceroute`**.
      ```bash
	  sudo apt update
	  sudo apt install traceroute
	  ```
    - **Opciones útiles**:
        - **`-n`**: Muestra las direcciones IP sin intentar resolverlas en nombres de dominio.
        - **`-m [saltos]`**: Establece el número máximo de saltos.
    - **Ejemplo de uso**:
      ```bash
	  traceroute google.com  # Muestra la ruta hasta google.com
	  ```

