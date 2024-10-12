---
title: "Subredes"
linkTitle: "Subredes"
weight: 30
icon: fas fa-project-diagram
---
{{< objetivos sub_title="Intenet una red de tipo TCP/IP" >}}
Redes y subredes
Protocolo IP
Direccionamiento IP
{{< /objetivos >}}


# Direccionamiento IP

## Protocolo IP
El {{< color >}}protocolo IP{{< /color >}} (Internet Protocol) es responsable de direccionar y enrutar los datos entre dispositivos en una red.  

Cada dispositivo en la red tiene {{< color >}} una dirección IP única {{< /color >}} asignada a su {{< color >}}interfaz de red{{< /color >}}.

### Subredes IP
Las {{< color >}}subredes IP{{< /color >}} permiten dividir una red en redes más pequeñas, mejorando el uso del espacio de direcciones y facilitando la gestión.

### Problemas y soluciones
El direccionamiento IP enfrenta varios problemas, como el {{< color >}}desperdicio de direcciones{{< /color >}} y el {{< color >}}crecimiento de las tablas de encaminamiento{{< /color >}}. 

Las soluciones incluyen el uso de {{< color >}}CIDR (Classless Interdomain Routing){{< /color >}} y {{< color >}}máscaras de subred de longitud variable (VLSM){{< /color >}}.

### Dominios
Los {{< color >}}dominios{{< /color >}} son **nombres** jerárquicos que permiten identificar recursos en la red de manera más fácil que usando direcciones IP numéricas.

Las personas recordamos mucho mejor los nombres que poder recordar una ip

{{< imgproc dominio Fill "420x180" >}}

{{< /imgproc >}}

Por eso en internet trabajamos con nombres de dominio

Pero cuando solicitamos un recurso, lo primero que hay que hacer es obtener la ip de un determinado dominio

{{< imgproc dns_ip Fill "366x257" >}}

{{< /imgproc >}}
### Servicio de identificación de dominios: DNS
El {{< color >}}Sistema de Nombres de Dominio (DNS){{< /color >}} traduce nombres de dominio, como `www.ejemplo.com`, en direcciones IP que los dispositivos en la red pueden usar para comunicarse.

## Direcciones IP

Las {{< color >}}direcciones IP{{< /color >}} se aplican a interfaces de red y están formadas por 32 bits en {{< color >}}IPv4{{< /color >}}. Se dividen en dos partes:

- {{< color >}}Identificador de red{{< /color >}}: Identifica la red a la que pertenece el dispositivo.
- {{< color >}}Identificador de host{{< /color >}}: Identifica un dispositivo específico dentro de la red.

### Clases de Direcciones

Las direcciones IP se clasifican en diferentes {{< color >}}clases{{< /color >}}, dependiendo de la cantidad de bits asignados a la red y al host.

| Clase | Primeros bits | Identificador de red | Identificador de host | Rango del primer byte |
|-------|----------------|----------------------|-----------------------|-----------------------|
| A     | 0              | 7 bits               | 24 bits               | menor que 128         |
| B     | 10             | 14 bits              | 16 bits               | 128 - 191             |
| C     | 110            | 21 bits              | 8 bits                | 192 - 223             |
| D     | 1110           | Reservado para multicast                            |
| E     | 1111           | Reservado para uso futuro                            |

### Ejemplos de clases:
- {{< color >}}Clase A{{< /color >}}: 127 redes con 16,777,214 hosts por red.
- {{< color >}}Clase B{{< /color >}}: 16,383 redes con 65,534 hosts por red.
- {{< color >}}Clase C{{< /color >}}: 2,097,151 redes con 254 hosts por red.

### Direcciones reservadas y privadas:
Las siguientes direcciones están reservadas para uso privado, no se enrutan a través de Internet:

- {{< color >}}10.0.0.0{{< /color >}} hasta {{< color >}}10.255.255.255{{< /color >}}
- {{< color >}}172.16.0.0{{< /color >}} hasta {{< color >}}172.31.255.255{{< /color >}}
- {{< color >}}192.168.0.0{{< /color >}} hasta {{< color >}}192.168.255.255{{< /color >}}

Para acceder a Internet desde una red privada, se utiliza un mecanismo de {{< color >}}traducción de direcciones{{< /color >}} (NAT, Network Address Translation), que permite a varios dispositivos compartir una única dirección IP pública.

### Protocolo IP (RFC 791)

El {{< color >}}Protocolo IP{{< /color >}} es no orientado a conexión, es decir, no garantiza la entrega de los paquetes, delegando esas funciones a protocolos de nivel superior, como TCP.
En este sentido, es en el que se dice que es un protocolo {{< color >}} no seguro {{< /color >}}

Hay otros protocolos también de nivel de red, que se encargan de comunicar al emisor que su paquete se ha perdido.
En este sentido tenemos a {{< color >}} ICMP (Internet Control Message Protocol) {{< /color >}} como el protocolo de nivel de red encargado de esta función. 
**ICMP** se utiliza para enviar mensajes de control y diagnóstico en redes IP, incluyendo el caso en que un paquete expira porque su TTL (Time to Live) ha llegado a 0.

{{< alert title="Ejemplo típico ICMP" color="dark" >}}
Cuando el TTL de un paquete IP se reduce a 0 en un router, este envía un mensaje ICMP "Time Exceeded" al remitente, informando que el paquete no pudo llegar a su destino porque su tiempo de vida ha expirado. ICMP también es responsable de otras funciones como:

* Enviar un mensaje de error si un host o red no es alcanzable (ICMP Destination Unreachable).
* Realizar pruebas de conectividad (como con el comando ping).

{{< /alert >}}

Esto lo haría el último router, en donde el TTL se estableció a 0, y por lo tanto el paquete ya no tiene tiempo de vida y expira

El {{< color >}}datagrama IP{{< /color >}} es la unidad básica de transmisión en las redes. Sus principales funciones incluyen:
- {{< color >}}Direccionamiento{{< /color >}}: Identificación de origen y destino.
- {{< color >}}Encaminamiento{{< /color >}}: Transporte de datos hacia dispositivos remotos.
- {{< color >}}Fragmentación y reensamblaje{{< /color >}}: Dividir grandes datagramas en fragmentos que pueden ser transportados a través de redes de tamaño limitado.

### Datagrama IP

{{< imgproc datagrama Fill "608x385" >}}
https://www.profesores.frc.utn.edu.ar/sistemas/ingsanchez/redes/Archivos/datagramaIP.asp
{{< /imgproc >}}
El datagrama IP contiene los siguientes campos:

| Campo              | Tamaño (bits) | Descripción                                                                               |
|--------------------|---------------|-------------------------------------------------------------------------------------------|
| {{< color >}}Versión{{< /color >}}         | 4             | Especifica la versión del protocolo (IPv4 o IPv6).                                         |
| {{< color >}}Longitud Cabecera{{< /color >}} | 4             | Longitud de la cabecera IP en palabras de 32 bits.                                         |
| {{< color >}}Tipo de Servicio{{< /color >}} | 8             | Define parámetros como fiabilidad, prioridad y retardo.                                    |
| {{< color >}}Longitud Total{{< /color >}}   | 16            | Longitud total del datagrama, incluidos los datos.                                         |
| {{< color >}}Identificación{{< /color >}}   | 16            | Identifica de manera única cada datagrama para reensamblaje si es fragmentado.             |
| {{< color >}}Flags{{< /color >}}           | 3             | Controla la fragmentación del datagrama.                                                   |
| {{< color >}}Fragment Offset{{< /color >}}  | 13            | Indica la posición del fragmento en el datagrama original.                                 |
| {{< color >}}TTL{{< /color >}}             | 8             | Tiempo de vida, define el número máximo de saltos que puede hacer el datagrama antes de ser descartado. |
| {{< color >}}Protocolo{{< /color >}}       | 8             | Indica el protocolo de nivel superior (TCP, UDP).                                          |
| {{< color >}}Checksum Cabecera{{< /color >}}| 16            | Verificación de la integridad de la cabecera.                                              |
| {{< color >}}Dirección de origen{{< /color >}} | 32         | Dirección IP del dispositivo emisor.                                                      |
| {{< color >}}Dirección de destino{{< /color >}} | 32        | Dirección IP del dispositivo receptor.                                                    |
| {{< color >}}Opciones{{< /color >}}        | Variable      | Opcional, incluye información adicional.                                                   |
| {{< color >}}Datos{{< /color >}}           | Variable      | Los datos del nivel superior que se transportan en el datagrama.                           |

## Subredes IP

### Problemas:
El {{< color >}}espacio de direcciones{{< /color >}} IP puede desperdiciarse si no se optimiza su uso.

### Solución:
Las {{< color >}}subredes{{< /color >}} permiten dividir redes grandes en redes más pequeñas, llamadas {{< color >}}subredes{{< /color >}}, mejorando el uso de las direcciones. Esto se logra utilizando una {{< color >}}máscara de subred{{< /color >}}, que distingue entre la parte de red y la parte de host de una dirección IP.

#### Ventajas de las subredes:
- Ocultan la organización interna de la red, simplificando las tablas de enrutamiento.
- Descentralizan la administración de direcciones.
- Permiten superar limitaciones de distancia entre redes físicas, conectándolas a través de routers.

### Máscaras por defecto:
- {{< color >}}Clase A{{< /color >}}: 255.0.0.0 (8 bits)
- {{< color >}}Clase B{{< /color >}}: 255.255.0.0 (16 bits)
- {{< color >}}Clase C{{< /color >}}: 255.255.255.0 (24 bits)

### Ejemplo de cálculo de subred:
- {{< color >}}Dirección IP{{< /color >}}: 172.24.100.45
- {{< color >}}Máscara de subred{{< /color >}}: 255.255.255.224
    - Red: 172.24.100.32
    - Host: 45

## Soluciones avanzadas: CIDR y VLSM

Existen varias soluciones avanzadas que abordan los problemas de escalabilidad y eficiencia en el uso del espacio de direcciones IP. Entre ellas destacan:

### Classless Interdomain Routing (CIDR)

CIDR permite una asignación más eficiente de direcciones IP al eliminar las clases fijas de direcciones (A, B, C). En lugar de usar clases con límites rígidos, CIDR utiliza **máscaras de longitud variable** para ajustar el tamaño de las subredes a las necesidades reales. Esto permite **agregar rutas (supernetting)**, consolidando múltiples direcciones en un solo bloque de direcciones.

Ejemplo de agregación de rutas:
- Uso de las direcciones **220.220.1.0 a 220.220.255.0** puede resumirse como **220.220.0.0/16**.

### Variable-length Subnet Mask (VLSM)

**VLSM** permite utilizar máscaras de subred de longitud variable dentro de una red. Con VLSM, es posible dividir una red en subredes más pequeñas según las necesidades específicas de cada segmento de la red, optimizando el uso del espacio de direcciones. Esto evita el desperdicio de direcciones que ocurre cuando se utilizan máscaras de subred fijas.

### Protocolo IP - CIDR y VLSM: Ejemplo práctico

Imaginemos que una empresa necesita direcciones para **400 hosts**. Dos posibles soluciones serían:

- **Solución A**: Pedir una clase B, lo cual proporcionaría **65,534 hosts**, lo cual resulta ineficiente.
- **Solución B**: Pedir dos clases C, que proporcionarían **508 hosts** (254 hosts por cada clase C), lo cual sería suficiente para cubrir la necesidad.

Con CIDR y VLSM, se podría usar un bloque de direcciones como **207.21.54.0/23**, lo que permite una asignación más eficiente.

### IPv6

**IPv6** es la nueva versión del protocolo IP, diseñada para solucionar los problemas de agotamiento de direcciones en **IPv4**. Las direcciones en IPv6 tienen **128 bits** de longitud, lo que proporciona un espacio prácticamente ilimitado de direcciones.

#### Características de IPv6:
- **Cabecera simplificada**: Mejora la eficiencia en el enrutamiento.
- **Autenticación y seguridad**: Integración de mecanismos de seguridad nativos.
- **Compatibilidad con subredes**: Las direcciones de **128 bits** se dividen en **64 bits para la red** y **64 bits para el host**, permitiendo una mayor flexibilidad para las subredes.

#### Formato de las direcciones IPv6

Una dirección IPv6 está formada por **32 valores hexadecimales**, organizados en grupos de cuatro dígitos (16 bits cada uno). Los grupos se llaman **hextetos**.

Ejemplos de direcciones IPv6:
- **2001:0DB8:0000:1111:0000:0000:0000:0200**
- **FE80:0000:0000:0000:0123:4567:89AB:CDEF**

Es posible reducir los ceros iniciales en las direcciones para simplificarlas. Por ejemplo, la dirección **2001:0DB8::ABCD:1234** es equivalente a **2001:0DB8:0000:0000:0000:0000:ABCD:1234**.

#### Tipos de direcciones IPv6 más comunes:
- **Unicast Global**: Direcciones globalmente únicas, utilizadas para la comunicación en Internet. Empiezan con **2001**.
- **Link Local**: Utilizadas en redes locales, no se enrutan en Internet. Empiezan con **FE80**.

### Soluciones adicionales

Además de **CIDR** e **IPv6**, otras soluciones incluyen:

- **Variable-length Subnet Masks (VLSM)**: Permite usar máscaras de subred de longitud variable dentro de una red, mejorando la eficiencia del direccionamiento.
- **Direccionamiento privado**: Uso de direcciones reservadas para redes privadas (10.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16), que requieren **NAT (Network Address Translation)** para acceder a Internet.
