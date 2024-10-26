---
title: "Gestión de procesos"
linkTitle: "gestión de procesos"
weight: 60
icon: fas fa-microchip
---

{{< objetivos  >}}
Procesos
Control y gestión 
Prioridades
{{< /objetivos >}}
# Gestión de Procesos

- {{< color >}} ps {{< /color >}}: Muestra una lista de procesos en ejecución.
    - **Descripción**: `ps` (process status) se utiliza para ver detalles de los procesos en ejecución en el sistema. La salida incluye el ID de proceso (PID), el usuario que ejecuta el proceso, y el uso de CPU y memoria.
    - **Opciones útiles**:
        - **`aux`**: Muestra todos los procesos en el sistema con información detallada.
        - **`-ef`**: Otra forma de listar todos los procesos con sus detalles.
    - **Ejemplo de uso**:
      ```bash
	  ps aux  # Muestra todos los procesos con información detallada
	  ```

- {{< color >}} top {{< /color >}}: Muestra información en tiempo real sobre los procesos y el uso del sistema.
    - **Descripción**: `top` muestra una lista dinámica de procesos que se actualiza constantemente, mostrando el uso de CPU, memoria y tiempo de ejecución. Es útil para monitorear el rendimiento del sistema en tiempo real.
    - **Opciones útiles**:
        - **`-u [usuario]`**: Muestra solo los procesos de un usuario específico.
        - **`-d [segundos]`**: Establece la frecuencia de actualización en segundos.
    - **Ejemplo de uso**:
      ```bash
	  top  # Inicia la monitorización en tiempo real
	  ```

- {{< color >}} htop {{< /color >}}: Versión mejorada de `top` con una interfaz más amigable.
    - **Descripción**: `htop` es similar a `top`, pero ofrece una interfaz más visual y fácil de usar para monitorear procesos y recursos del sistema. Permite navegar y terminar procesos directamente.
    - **Ejemplo de uso**:
      ```bash
	  htop  # Inicia el monitor de procesos con una interfaz gráfica en terminal
	  ```

- {{< color >}} kill {{< /color >}}: Finaliza un proceso mediante su ID (PID).
    - **Descripción**: `kill` envía una señal a un proceso, generalmente para finalizarlo. Puedes usar el PID (ID de proceso) obtenido con `ps` o `top` para detener un proceso específico.
    - **Opciones útiles**:
        - **`-9`**: Envía una señal SIGKILL, forzando la finalización inmediata del proceso.
        - **`-15`**: Envía una señal SIGTERM, solicitando la finalización (esta es la señal por defecto).
    - **Ejemplo de uso**:
      ```bash
	  kill -9 1234  # Fuerza la terminación del proceso con PID 1234
	  ```

- {{< color >}} xkill {{< /color >}}: Herramienta gráfica para finalizar aplicaciones congeladas.
    - **Descripción**: `xkill` permite seleccionar una ventana gráfica para forzar su cierre. Es útil para detener aplicaciones que no responden en entornos de escritorio.
    - **Ejemplo de uso**:
      ```bash
	  xkill  # Tras ejecutar, haz clic en la ventana que deseas cerrar
	  ```

- {{< color >}} nice {{< /color >}}: Inicia un proceso con una prioridad ajustada.
    - **Descripción**: `nice` permite iniciar un proceso con una prioridad específica, controlando cuántos recursos consume en comparación con otros procesos. Los valores de "nice" van de -20 (mayor prioridad) a 19 (menor prioridad).
    - **Ejemplo de uso**:
      ```bash
	  nice -n 10 comando  # Inicia "comando" con una prioridad menor (10)
	  ```

- {{< color >}} renice {{< /color >}}: Cambia la prioridad de un proceso en ejecución.
    - **Descripción**: `renice` permite ajustar la prioridad de un proceso ya en ejecución, aumentando o disminuyendo su prioridad en el uso de CPU. Como `nice`, los valores pueden variar entre -20 y 19.
    - **Ejemplo de uso**:
      ```bash
	  renice 5 -p 1234  # Cambia la prioridad del proceso con PID 1234 a 5
	  ```

