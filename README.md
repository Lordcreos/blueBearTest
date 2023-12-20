# blueBearTest
 Blue Bear Test Leonardo Sanchez 


## Requisitos Previos

Antes de comenzar, asegúrate de tener instalados los siguientes requisitos:

-   PHP 8 o superior 
-   Composer
-   Node.js y npm (para manejar assets y dependencias front-end vuejs , inertia ) 
-   base de datos Mysql
-   mailtrap (recoemndado para hacer uso de mails en desarrollo ) 

## Configuración del Entorno

1. **Clona el Repositorio:**

    ```bash
    git clone https://github.com/Lordcreos/blueBearTest
    cd blueBearTest
    ```

2. **Instala las Dependencias de PHP:**

    ```bash
    composer install
    ```

3. **Configura el Archivo de Entorno:**

    - Copia el archivo `.env.example` a `.env`:
        ```bash
        cp .env.example .env
        ```
    - Abre el archivo `.env` y configura los valores necesarios.

4. **Generar base de datos de la app:**

    ```bash
    php artisan migrate
    ```

5. **Instala las Dependencias de Node.js:**

    ```bash
    npm install
    ```

6. **Compila Assets Front-end:**
    ```bash
    npm run dev
    ```

## Ejecución

8. **Inicia el Servidor Local:**

    ```bash
    php artisan serve
    ```

    La aplicación estará disponible en [http://localhost:8000](http://localhost:8000).

## Detener la Aplicación

Para detener el servidor de desarrollo, simplemente presiona `Ctrl+C` en la terminal donde se está ejecutando.
