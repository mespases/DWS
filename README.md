# Uso básico de GITHUB

## Creación o copia de repositorio

Iniciamos repositorio
```console
    git init 
```

Clona un repositorio / añade un nuevo repositorio
```console 
    git clone url
    git remote add origin url

```

## Subir un archivo 

Añadimos el archivo/archivos, si queremos añadir todo podemos poner --all
```console
    git add nombre_del_archivo
    git commit -m "mensaje del commit"
```

Seleccionamos la rama main, esto solo se hace la primera vez
```console
    git branch -M main
```

Subimos el archivo a git
```console
    git push origin main
```

**Posible error:**
 falló el push de algunas referencias a 'url del github'

Si queremos forzar la subida podemos usar
```console
    git push origin main --force
```

## Actualizar archivos

```console
    git pull
```

**Posible error:**

La siguiente fusión sobrescribiría los siguientes archivos del árbol de trabajo sin seguimiento

Si no me importa sobreescribir los datos usaremos
```console
    git add *
    git stash
    git pull
```

## Comandos útiles

Muestra el estado de los documentos
```console
    git status
```

Historial de los cambios
```console
    git log
```

Ver lar ramas
```console
    git branch
```