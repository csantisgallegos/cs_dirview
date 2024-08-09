<p align="center">
    <a href="#" rel="noopener">
        <img src="https://img.icons8.com/ios-filled/100/000000/folder-invoices.png" alt="Project logo" width="100"/>
    </a>
</p>

<h1 align="center">Directory View</h1>
<p align="center">Una aplicación ligera para la visualización eficiente de directorios.</p>

<p align="center">
    <img src="https://img.shields.io/badge/version-1.0-blue.svg" alt="Version" />
</p>

<div align="center">
    <img src="https://img.shields.io/badge/github-carlos%20santis-%23181717.svg?style=for-the-badge&logo=github" alt="GitHub" />
    <img src="https://img.shields.io/badge/php-7.4%2B-%23777BB4.svg?style=for-the-badge&logo=php" alt="PHP Version" />
</div>

---

# Descripción

`cs_DirView` es una aplicación web ligera desarrollada en PHP, diseñada para explorar y visualizar el contenido de directorios de manera eficiente. Utiliza una interfaz moderna basada en Bootstrap 5, que ofrece una experiencia receptiva y personalizable con opciones de tema claro/oscuro y soporte multilingüe.

## Características

- **Visualización de directorios**: Muestra archivos y subdirectorios dentro de la carpeta raíz.
- **Soporte para `README.md`**: Visualiza el archivo `README.md` si está presente en alguna subcarpeta.
- **Interfaz moderna**: Diseño basado en Bootstrap 5 con soporte para temas claro y oscuro.
- **Soporte multilingüe**: Disponible en español e inglés, con opción para cambiar de idioma.
- **Tema personalizable**: Alterna entre tema claro y oscuro con persistencia de la preferencia del usuario.

## Requisitos

- **PHP**: Versión 7.4 o superior.
- **Servidor web**: Apache, Nginx u otro servidor compatible.
- **Bootstrap**: Utiliza Bootstrap 5 (cargado desde CDN).

## Instalación Local

1. **Clona el repositorio**:
    ```bash
    git clone https://github.com/csantisgallegos/cs_dirview.git
    ```

2. **Navega al directorio del proyecto**:
    ```bash
    cd cs_dirview
    ```

3. **Configura el servidor local**:
    - Si usas Laragon, asegúrate de que el servidor esté activo.
    - Copia el archivo `index.php` en la raíz de tus proyectos locales.
    - Para copiar el archivo `index.php` a la carpeta anterior y reemplazar el archivo si ya existe, usa:
    ```bash
    cp -f index.php ../
    ```

4. **Explora el directorio**:
    - Accede a la interfaz web en `http://localhost/` para visualizar los archivos y carpetas.
    - Si una carpeta contiene un archivo `README.md`, verás un enlace para abrirlo directamente.

## Uso

1. **Cambiar de tema**: Usa el ícono de sol/luna en la parte superior para alternar entre tema claro y oscuro.
2. **Cambiar de idioma**: Selecciona el idioma desde el desplegable en la parte superior derecha.
3. **Ver archivos**: Haz clic en los archivos o carpetas para explorar su contenido.

## Contribuciones

Las contribuciones son bienvenidas. Si tienes sugerencias, mejoras o encuentras errores, no dudes en abrir un issue o enviar un pull request. Por favor, sigue las convenciones de codificación y añade pruebas cuando sea posible.

## Licencia

Este proyecto está licenciado bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## Contacto

Puedes contactarme a través de:

- [GitHub](https://github.com/csantisgallegos)
- ✉️ [csantisgallegos@gmail.com](mailto:csantisgallegos@gmail.com)
