# Test de RentingCarz

## Recursos
`
Api para usar https://www.football-data.org/
`

## Entregables

    - El proyecto debe estar cargado en el repositorio personal de GitHub del aspirante.
    - El proyecto debe permitir correr docker-compose up que monte todo para revision
    - Debe existir almenos un commit por cada paso importante en los objetivos
    - Debe existir almenos un test unitario, elije el componente que quieras, no olvides dejar informado como correr el test

## Instrucciones
    - Levantar imagen container
    - `docker-compose build`
    - Luego levantar servicios
    - `docker-compose up -d`
    - Entrar a http://localhost:8080 visualizar resultados
    - migrar base de datos 
    - `docker-compose exec app php artisan migrate:fresh`
    - actualizar resultados 
    - `docker-compose exec app php artisan matches:update`