Info fonctionnement docker : 

sudo docker run --name ubuntu_container_ssh -i -t ubuntu

docker run hello-world



--detach (-d) (permet au conteneur de rester actif)

-p (pour définir l'utilisation des ports)

docker stop ID_RETOURNÉ_LORS_DU_DOCKER_RUN (pour arreter le docker)


docker system prune (clean le système)

docker build -t ocr-docker-build (build une image)


Commande actuelle :
docker build -t ccompilateur docker/Dockerfile2

docker build -t ccompilateur https://github.com/Yol-dev/Yol-ide/blob/9f353e4a1249e39fa889a8fd4ba57f651b9d7864/docker/Dockerfile2

CMD run gcc mono-mcs

documentation : 
https://openclassrooms.com/fr/courses/2035766-optimisez-votre-deploiement-en-creant-des-conteneurs-avec-docker/6211458-lancez-votre-premier-conteneur-en-local

