-stop.bat
docker stop docker_php_1
docker rm docker_php_1
docker system prune -a -f
docker ps