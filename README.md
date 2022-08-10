# Getting Started with Docker

## Vorbereitung:

WSL: Unter Windows wird das Windows Subsystem for Linux (WSL) benötigt: https://docs.microsoft.com/en-us/windows/wsl/install. 

Docker: Wir benötigen ansonsten DockerDesktop: https://www.docker.com/products/docker-desktop/. Achte unter Windows darauf, bei Nachfragen während der Installation die Linux-Container zu aktivieren, die Komponenten für WSL mitzuinstallieren und Docker zum PATH hinzuzufügen. Starte Docker nach der Installation, dann findest Du in der Taskleiste ein Walfisch-Icon, über das Du in die Einstellungen kommst und Container verwalten kannst.

Git-Repositorium: Klone dieses Repositorium in einen Ordner Deiner Wahl.

## Orientierung:

Images enthalten alles, um einen virtuellen Computer zu bauen. Offizielle Images finden sich unter https://hub.docker.com/. Eigene Images werden in Dockerfiles gebaut, indem man von einem bestehenden Image ein neues Image ableitet. Öffne die Datei docker/Dockerfile mit einem Texteditor. Dort ist eine Bauanleitung enthalten, wir leiten von https://hub.docker.com/_/httpd ab. Das Imagewird schließlich mit `docker build` gebaut.

Um das Image zu verwenden, werden Container mit `docker start` gestartet. Jeder Container stellt normalerweise einen bestimmten Dienst zur Verfügung. Wir starten unten einen Webserver, der lokal unter http://localhost:8080 erreichbar ist.

Mehrere Container können mit `docker compose` orchestriert werden, beispielsweise um einen Webserver und einen Datenbankserver zu betreiben.

## 1. Dockerfiles

1. Terminal öffnen (Kommandozeile oder Ubuntu Bash) und im Repositorium in den docker-Ordner gehen:
  ```
  cd docker
  ```

2. Container builden und starten

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

  

## 2. Docker Compose

1. Terminal öffnen (z. B. die Ubuntu Bash) und in das Repositorium gehen:
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
- docker exec -it tut-simple-container /bin/bash   
   
## Troubleshooting

- VirtualBox und Docker

