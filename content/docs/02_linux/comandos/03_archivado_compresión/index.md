---
title: "Archivado y compresión"
linkTitle: "Archivado y compresión"
weight: 30
icon: fas fa-expand-alt
---

{{< objetivos  >}}
Archivando ficheros
Copias de seguridad
Comprimiendo y descomprimiendo
{{< /objetivos >}}
# Comandos de Archivado y Compresión

- {{< color >}} tar {{< /color >}}: Crea, extrae y manipula archivos comprimidos en formato `.tar` (tape archive).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  tar [opciones] archivo.tar [archivos o directorio]
  {{< / highlight >}}
    - Opciones útiles:
        - **`-c`**: Crea un nuevo archivo tar.
        - **`-x`**: Extrae el contenido de un archivo tar.
        - **`-v`**: Muestra detalles durante la creación o extracción.
        - **`-f`**: Especifica el nombre del archivo tar.
        - **`-z`**: Comprime o descomprime con `gzip`.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      tar -cvf archivos.tar directorio/ #: Crea "archivos.tar" con el contenido de "directorio".
      tar -xvf archivos.tar #: Extrae el contenido de "archivos.tar".
      tar -czvf archivos.tar.gz directorio/ #: Crea y comprime en "archivos.tar.gz" usando gzip.
      {{< / highlight >}}

- {{< color >}} gzip {{< /color >}}: Comprime archivos en el formato `.gz` (GNU zip).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  gzip [archivo]
  {{< / highlight >}}
    - Opciones útiles:
        - **`-k`**: Conserva el archivo original sin eliminarlo.
        - **`-r`**: Comprime archivos dentro de un directorio de forma recursiva.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      gzip archivo.txt #: Comprime "archivo.txt" en "archivo.txt.gz".
      gzip -k archivo.txt #: Comprime "archivo.txt" pero conserva el original.
      {{< / highlight >}}

- {{< color >}} gunzip {{< /color >}}: Descomprime archivos `.gz` (gzip).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  gunzip [archivo.gz]
  {{< / highlight >}}
    - Ejemplo:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      gunzip archivo.txt.gz #: Descomprime "archivo.txt.gz" a "archivo.txt".
      {{< / highlight >}}

- {{< color >}} zip {{< /color >}}: Comprime archivos y directorios en formato `.zip`.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  zip [opciones] archivo.zip [archivos o directorios]
  {{< / highlight >}}
    - Opciones útiles:
        - **`-r`**: Comprime directorios de forma recursiva.
        - **`-e`**: Protege el archivo zip con contraseña.
        - **`-q`**: Silencia la salida de la terminal.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      zip archivos.zip archivo1 archivo2 #: Crea "archivos.zip" con archivo1 y archivo2.
      zip -r proyecto.zip directorio/ #: Comprime el directorio completo en "proyecto.zip".
      {{< / highlight >}}

- {{< color >}} unzip {{< /color >}}: Extrae archivos comprimidos en formato `.zip`.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  unzip [archivo.zip]
  {{< / highlight >}}
    - Opciones útiles:
        - **`-d [directorio]`**: Especifica el directorio de destino para los archivos extraídos.
        - **`-l`**: Lista el contenido del archivo zip sin extraerlo.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      unzip archivos.zip #: Extrae el contenido de "archivos.zip" en el directorio actual.
      unzip -d /destino archivos.zip #: Extrae "archivos.zip" en el directorio "/destino".
      {{< / highlight >}}
