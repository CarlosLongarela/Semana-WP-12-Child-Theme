# Instrucciones para desarrollo

1. Configurar el editor con [EditorConfig](https://editorconfig.org/)
2. Instalar [phpcs](https://github.com/squizlabs/PHP_CodeSniffer) y las reglas [WordPress Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards)
3. Instalar y configurar [npm](https://www.npmjs.com/)
4. Ejecutar `$ npm install` en el raíz del directorio para instalar las dependencias
5. Para el flujo de Git se utilizará [gitflow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) y trabajaremos sobre la rama `develop`
6. Para realizar el *deploy* se ha configurado este repositorio en [Gitlab](https://gitlab.com) con CI/CD mediante el archivo `gitlab-ci.yml` y para realizar el *deploy* al servidor de Staging se ha creado el alias **deploy** *(se crea en el archivo config del repo, en .git/)*; por lo que si ejecutamos `$ git deploy` se ejecutará la siguiente secuencia:

`!git push && git checkout master && git pull && git merge develop && git push && git checkout develop`

* Enviamos los cambios actuales en la rama *develop* al repo Git
* Nos cambiamos a la rama *master*
* Nos traemos los posibles cambios que pudiese haber en la rama *master* (no debería haber ningún cambio)
* Fusionamos la rama *develop* en la rama actual *master*
* Enviamos los cambios actuales en la rama *master* al repo Git (aquí es donde entra en acción `gitlab-ci.yml` y envía los cambios por FTP al server de staging)
* Volvemos a cambiar a la rama *develop* para seguir trabajando en la rama de desarrollo.

