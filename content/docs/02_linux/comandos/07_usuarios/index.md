---
title: "Administración de usuarios"
linkTitle: "Administración de usuarios"
weight: 80
icon: fas fa-users-cog
---

{{< objetivos  >}}
Administración de usuarios
Grupos
{{< /objetivos >}}
# Administración de Usuarios

- {{< color >}} useradd {{< /color >}}: Crea un nuevo usuario en el sistema.
    - **Descripción**: `useradd` se utiliza para crear cuentas de usuario. Puede configurarse con varias opciones, como el directorio de inicio, el grupo, el shell predeterminado, y más.
    - **Opciones útiles**:
        - **`-m`**: Crea automáticamente un directorio de inicio para el usuario.
        - **`-G [grupo]`**: Añade el usuario a uno o más grupos secundarios.
        - **`-s [shell]`**: Define el shell predeterminado del usuario (por ejemplo, `/bin/bash`).
    - **Ejemplo de uso**:
      ```bash
	  sudo useradd -m -s /bin/bash usuario_nuevo  # Crea un usuario con directorio de inicio y shell Bash
	  ```

- {{< color >}} usermod {{< /color >}}: Modifica la información de una cuenta de usuario existente.
    - **Descripción**: `usermod` permite modificar detalles de una cuenta de usuario, como el nombre de usuario, los grupos, el shell, el directorio de inicio, y más.
    - **Opciones útiles**:
        - **`-l [nuevo_nombre]`**: Cambia el nombre del usuario.
        - **`-G [grupo]`**: Añade el usuario a grupos adicionales.
        - **`-s [shell]`**: Cambia el shell predeterminado.
        - **`-d [directorio]`**: Cambia el directorio de inicio del usuario.
    - **Ejemplo de uso**:
      ```bash
	  sudo usermod -l nuevo_usuario usuario_actual  # Cambia el nombre de "usuario_actual" a "nuevo_usuario"
	  ```

- {{< color >}} passwd {{< /color >}}: Cambia o asigna la contraseña de un usuario.
    - **Descripción**: `passwd` permite establecer o modificar la contraseña de un usuario. También se puede utilizar para establecer políticas de caducidad de la contraseña.
    - **Opciones útiles**:
        - **`-e`**: Fuerza el cambio de contraseña en el próximo inicio de sesión.
        - **`-l`**: Bloquea la cuenta de usuario.
        - **`-u`**: Desbloquea la cuenta de usuario.
    - **Ejemplo de uso**:
      ```bash
	  sudo passwd usuario_nuevo  # Asigna una contraseña a "usuario_nuevo"
	  ```

- {{< color >}} groupadd {{< /color >}}: Crea un nuevo grupo en el sistema.
    - **Descripción**: `groupadd` se utiliza para crear un grupo nuevo en el sistema, al cual pueden asignarse usuarios para administrar permisos y accesos en conjunto.
    - **Opciones útiles**:
        - **`-g [GID]`**: Especifica un ID de grupo personalizado.
    - **Ejemplo de uso**:
      ```bash
	  sudo groupadd desarrolladores  # Crea un nuevo grupo llamado "desarrolladores"
	  ```

