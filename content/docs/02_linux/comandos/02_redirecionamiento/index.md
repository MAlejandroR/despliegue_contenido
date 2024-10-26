---
title: "Redireccionamiento"
linkTitle: "Redireccionamiento"
weight: 20
icon: fas fa-file-export
---

{{< objetivos  >}}
Comandos de redireccionamiento
{{< /objetivos >}}


## Repaso de Comandos Generales de Linux y Redes


# Comandos de redireccionamiento

- {{< color >}} \> {{< /color >}}: Redirige la **salida estándar** a un archivo, sobrescribiendo su contenido si ya existe.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando > archivo
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      lsblk -f > salida.txt #: Guarda la salida de `lsblk -f` en el archivo "salida.txt".
      echo "Hola Mundo" > mensaje.txt #: Crea (o sobrescribe) "mensaje.txt" con el texto "Hola Mundo".
      {{< / highlight >}}

- {{< color >}} \>\> {{< /color >}}: Redirige la **salida estándar** a un archivo, añadiendo al final si ya existe.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando >> archivo
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      lsblk -f >> salida.txt #: Añade la salida de `lsblk -f` al final de "salida.txt".
      echo "Nuevo mensaje" >> mensaje.txt #: Añade "Nuevo mensaje" al final de "mensaje.txt".
      {{< / highlight >}}

- {{< color >}} 2> {{< /color >}}: Redirige la **salida de errores** a un archivo, sobrescribiéndolo si ya existe.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando 2> archivo
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      ls /noexiste 2> error.txt #: Guarda cualquier error en "error.txt".
      {{< / highlight >}}

- {{< color >}} &> {{< /color >}}: Redirige tanto la **salida estándar** como la **salida de errores** a un mismo archivo.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando &> archivo
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      lsblk &> todo.txt #: Guarda toda la salida de `lsblk` (salida y errores) en "todo.txt".
      {{< / highlight >}}

- {{< color >}} | {{< /color >}}: **Tubería**. Envía la salida estándar de un comando como entrada de otro.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando1 | comando2
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      lsblk -f | grep "ext4" #: Muestra solo las líneas que contienen "ext4" en la salida de `lsblk -f`.
      ps aux | wc -l #: Cuenta el número de procesos en ejecución.
      {{< / highlight >}}

- {{< color >}} < {{< /color >}}: Redirige un **archivo como entrada estándar** para un comando.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando < archivo
  {{< / highlight >}}
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1" >}}
      sort < nombres.txt #: Ordena el contenido de "nombres.txt".
      {{< / highlight >}}
- {{< color >}} tee {{< /color >}}: Divide la salida para guardarla en un archivo y enviarla también como entrada de otro comando.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando | tee [opciones] archivo
  {{< / highlight >}}
    - Opciones útiles:
        - **`-a`**: Añade la salida al final del archivo en lugar de sobrescribirlo.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-2" >}}
      lsblk | tee salida.txt #: Guarda la salida de `lsblk` en "salida.txt" y la muestra en pantalla.
      lsblk | tee -a salida.txt #: Añade la salida de `lsblk` al final de "salida.txt" sin sobrescribir.
      {{< / highlight >}}

- {{< color >}} xargs {{< /color >}}: Ejecuta comandos utilizando la salida de otro comando como argumentos.
  {{< highlight php "linenos=table, hl_lines=1" >}}
  comando | xargs [opciones] otro_comando
  {{< / highlight >}}
    - Opciones útiles:
        - **`-I {}`**: Usa `{}` como marcador de posición, reemplazado por cada entrada en la salida del primer comando.
        - **`-n`**: Especifica cuántos argumentos tomar por ejecución del comando.
    - Ejemplos:
      {{< highlight php "linenos=table, hl_lines=1-3" >}}
      find . -name "*.txt" | xargs rm #: Encuentra y elimina todos los archivos ".txt" en el directorio actual.
      find . -name "*.log" | xargs -I {} mv {} /backup #: Mueve cada archivo ".log" encontrado a la carpeta "/backup".
      echo "archivo1 archivo2 archivo3" | xargs -n 1 touch #: Crea cada archivo individualmente.
      {{< / highlight >}}
