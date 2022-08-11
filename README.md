# Getting Started with Docker

## Anwendungsfälle
- Webserver
- Datenbanken
- Testsysteme (z.B. Behat)
- Parallelisierung auf High Performance Computing-Clustern

## Vorbereitung:

**WSL:** Unter Windows wird das Windows Subsystem for Linux (WSL) benötigt: https://docs.microsoft.com/en-us/windows/wsl/install. 

**Docker:** Installiere DockerDesktop: https://docs.docker.com/get-docker/. Achte unter Windows darauf, bei Nachfragen während der Installation die Linux-Container zu aktivieren, die Komponenten für WSL mitzuinstallieren und Docker zum PATH hinzuzufügen. Starte Docker nach der Installation, dann findest Du in der Taskleiste ein Walfisch-Icon, über das Du in die Einstellungen kommst und Container verwalten kannst.

**Git-Repositorium**: Klone dieses Repositorium in einen Ordner Deiner Wahl.

## Orientierung

**Images** enthalten alles, um einen virtuellen Computer zu bauen. Offizielle Images finden sich unter https://hub.docker.com/. Eigene Images werden in Dockerfiles gebaut, indem man von einem bestehenden Image ein neues Image ableitet. 

Um das Image zu verwenden, werden **Container** gestartet. Jeder Container stellt normalerweise einen bestimmten Dienst zur Verfügung, zum Beispiel einen Webserver.

Mit **docker compose** können mehrere Container orchestriert und Verzeichnisse zwischen Wirts- und Gastsystem synchronisiert werden. Für die Webentwicklung wird beispielsweise in einem Container ein Webserver und in einem anderen Container ein Datenbankserver betrieben.

## 1. Anwendungen von der Kommandozeile starten

1. Terminal öffnen und im Repositorium in den neo4j-Ordner gehen:
  ```
  cd neo4j
  ```
2. Container starten

Mac & Linux:
```
docker run -dit --name tut-neo4j -p 80:80 -v "$PWD":/data neo4j
```

Windows:
```
docker run -dit --name tut-neo4j -p 80:80 -v "%CD%":/data neo4j
```

## 2. Dockerfiles

1. Terminal öffnen und im Repositorium in den docker-Ordner gehen:
  ```
  cd docker
  ```

2. Image builden, Container createn und starten

  ```
  docker build -t tut-simple-image .
  docker run -dit --name tut-simple-container -p 8080:80 tut-simple-image
  ```

3. Im Browser http://localhost:8080 aufrufen.  

4. Container stoppen und entfernen
  ```
  docker stop tut-simple-container
  docker rm tut-simple-container
  ```

  

## 3. Docker Compose

1. Terminal öffnen und in das Repositorium gehen:
  ```
  cd compose
  ```
  
2. Container starten:
   ```
   docker compose up -d
   ```

3. Im Browser http://localhost aufrufen.  

4. In den Container gehen und die SQL-Datenbank füllen:
  ```
  docker exec -it server_php /bin/bash
  ```
  ```
  mysql --host=sql --user=root --password=root myfirstdb < pages.sql
  ``` 
  ```
  exit
  ```

5. Container stoppen
   ```
   docker compose stop
   ```
   
## Docker Commands

- docker image ls
- docker container ls
   
## Troubleshooting

- VirtualBox und Docker

