---
title: "Archivado y compresión"
linkTitle: "Archivado y compresión"
weight: 40
icon: fas fa-folder-open
---

{{< objetivos  >}}
Transferencia de archivos
Redes
{{< /objetivos >}}
# Transferencia de Archivos y Redes

- {{< color >}} scp {{< /color >}}: Copia archivos de forma segura entre sistemas mediante **SSH** (*secure copy*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  scp [opciones] origen destino
  {{< / highlight >}}
    - Opciones útiles:
        - **`-r`**: Copia directorios de forma recursiva.
        - **`-P [puerto]`**: Especifica un puerto SSH distinto al predeterminado (22).
        - **`-i [archivo_clave]`**: Usa una clave SSH específica para la autenticación.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      scp archivo.txt usuario@servidor:/ruta/remota/ #: Copia "archivo.txt" al servidor remoto.
      scp -r carpeta/ usuario@servidor:/ruta/remota/ #: Copia una carpeta de forma recursiva.
      scp -P 2222 archivo.txt usuario@servidor:/ruta/remota/ #: Usa el puerto 2222 para la transferencia.
      {{< / highlight >}}

- {{< color >}} ftp {{< /color >}}: Conecta y transfiere archivos entre sistemas mediante el protocolo **FTP** (*file transfer protocol*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  ftp [servidor]
  {{< / highlight >}}
    - Comandos útiles en la sesión FTP:
        - **`put [archivo]`**: Sube un archivo al servidor FTP.
        - **`get [archivo]`**: Descarga un archivo del servidor FTP.
        - **`mput / mget`**: Sube o descarga múltiples archivos.
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      ftp servidor.com #: Conecta al servidor FTP.
      ftp> put archivo.txt #: Sube "archivo.txt" al servidor.
      {{< / highlight >}}

- {{< color >}} wget {{< /color >}}: Descarga archivos desde internet mediante HTTP, HTTPS o FTP.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  wget [opciones] URL
  {{< / highlight >}}
    - Opciones útiles:
        - **`-c`**: Continúa una descarga interrumpida.
        - **`-r`**: Descarga de forma recursiva (útil para sitios web).
        - **`-P [directorio]`**: Especifica el directorio de destino para la descarga.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      wget http://ejemplo.com/archivo.zip #: Descarga "archivo.zip" desde la URL.
      wget -c http://ejemplo.com/grande.zip #: Continúa la descarga de "grande.zip" si fue interrumpida.
      wget -r http://ejemplo.com/sitio #: Descarga todo el sitio web de forma recursiva.
      {{< / highlight >}}

- {{< color >}} curl {{< /color >}}: Transfiere datos desde o hacia un servidor mediante varios protocolos (HTTP, HTTPS, FTP, SFTP).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  curl [opciones] URL
  {{< / highlight >}}
    - Opciones útiles:
        - **`-O`**: Guarda el archivo con su nombre original.
        - **`-L`**: Sigue redirecciones (útil para URL que redirigen).
        - **`-u usuario:contraseña`**: Especifica las credenciales para autenticación básica.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      curl -O http://ejemplo.com/archivo.zip #: Descarga y guarda "archivo.zip".
      curl -L http://ejemplo.com/redireccionado #: Sigue redirecciones para acceder al destino final.
      curl -u usuario:clave ftp://servidor.com/archivo.zip #: Descarga con autenticación.
      {{< / highlight >}}
