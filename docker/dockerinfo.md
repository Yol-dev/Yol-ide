Info fonctionnement docker : 

sudo docker run --name ubuntu_container_ssh -i -t ubuntu

docker run hello-world

mot de passe database: 
WqKr27jNi662Fn

--detach (-d) (permet au conteneur de rester actif)

-p (pour définir l'utilisation des ports)

docker stop ID_RETOURNÉ_LORS_DU_DOCKER_RUN (pour arreter le docker)


docker system prune (clean le système)

docker build -t ocr-docker-build (build une image)


Commande actuelle :

docker run [OPTIONS] IMAGE [COMMAND] [ARG...]
https://docs.docker.com/engine/reference/commandline/run/


docker build -t ccompilateur docker/Dockerfile2
docker build . -t ccompilateur

CMD run gcc mono-mcs
RUN apt-get -y install gcc mono-mcs

documentation : 
https://openclassrooms.com/fr/courses/2035766-optimisez-votre-deploiement-en-creant-des-conteneurs-avec-docker/6211458-lancez-votre-premier-conteneur-en-local

