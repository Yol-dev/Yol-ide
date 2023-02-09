Info fonctionnement docker : 

sudo docker run --name ubuntu_container_ssh -i -t ubuntu

docker run hello-world



--detach (-d) (permet au conteneur de rester actif)

-p (pour définir l'utilisation des ports)

docker stop ID_RETOURNÉ_LORS_DU_DOCKER_RUN (pour arreter le docker)


docker system prune (clean le système)

docker build -t ocr-docker-build (build une image)


Commande actuelle :
docker build -t ccompilateur



documentation : 
https://openclassrooms.com/fr/courses/2035766-optimisez-votre-deploiement-en-creant-des-conteneurs-avec-docker/6211458-lancez-votre-premier-conteneur-en-local

