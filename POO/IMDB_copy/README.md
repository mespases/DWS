# IMDB copy

## Crea una página que proporcione información sobre Películas -> Página IMDB

### Crear
- Crear clases "objetos"
- Crear y diseñar una base de datos

### Requisitos:
- Introducir películas (20 mínimo)
- Filtrar por género y año
- Crear un diseño web y un diseño para cada película


# SQL
### Películas
- Id
- Título
- Año
- Valoración
- Imagen
- Tráiler

### Géneros
- Id
- Nombre

### Actores
- Id
- Nombre
- Edad
- Nacionalidad
- Imagen

### Directores
- Id
- Nombre
- Edad
- Nacionalidad

### Peliculas_Actores
- id_película fk
- id_actor fk

### Películas_Directores
- id_película fk
- id_director fk

### Películas_Generos
- id_película fk
- id_genero fk