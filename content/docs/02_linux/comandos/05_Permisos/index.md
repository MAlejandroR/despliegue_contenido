---
title: "Permisos y Propietarios"
linkTitle: "permisos y propietarios"
weight: 50
icon: fas fa-shield-alt
---

{{< objetivos  >}}
Permisos
Propietarios
El comando sudo
{{< /objetivos >}}
# Permisos y Propiedades de Archivos

- {{< color >}} chmod {{< /color >}}: Cambia los permisos de un archivo o directorio (*change mode*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  sudo chmod [opciones] modo archivo
  {{< / highlight >}}
    - Opciones útiles:
        - **`-R`**: Aplica los cambios de forma recursiva a todos los archivos y subdirectorios.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      sudo chmod 755 script.sh #: Otorga permisos de lectura y ejecución para todos, escritura solo al propietario.
      sudo chmod -R 700 carpeta/ #: Cambia permisos de todos los archivos y carpetas dentro de "carpeta" a solo propietario.
      {{< / highlight >}}

- {{< color >}} chown {{< /color >}}: Cambia el propietario y grupo de un archivo o directorio (*change owner*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  sudo chown [opciones] propietario[:grupo] archivo
  {{< / highlight >}}
    - Opciones útiles:
        - **`-R`**: Cambia el propietario y grupo de forma recursiva.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      sudo chown usuario archivo.txt #: Cambia el propietario de "archivo.txt" a "usuario".
      sudo chown usuario:grupo archivo.txt #: Cambia propietario y grupo a "usuario" y "grupo".
      sudo chown -R usuario carpeta/ #: Cambia propietario de todos los archivos dentro de "carpeta" a "usuario".
      {{< / highlight >}}

- {{< color >}} chgrp {{< /color >}}: Cambia el grupo de un archivo o directorio (*change group*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  sudo chgrp [opciones] grupo archivo
  {{< / highlight >}}
    - Opciones útiles:
        - **`-R`**: Aplica los cambios de grupo de forma recursiva.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      sudo chgrp grupo archivo.txt #: Cambia el grupo de "archivo.txt" a "grupo".
      sudo chgrp -R grupo carpeta/ #: Cambia el grupo de todos los archivos dentro de "carpeta" a "grupo".
      {{< / highlight >}}

- {{< color >}} sudo {{< /color >}}: Ejecuta un comando con permisos de superusuario o usuario administrador (*superuser do*).
  {{< highlight php "linenos=table, hl_lines=1" >}}
  sudo comando
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      sudo chmod 755 archivo.txt #: Cambia permisos de "archivo.txt" con privilegios de superusuario.
      sudo chown usuario archivo.txt #: Cambia el propietario de "archivo.txt" a "usuario".
      {{< / highlight >}}
